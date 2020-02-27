<?php
class time extends db
{
        //-------------topics Upload Function------------
    
    
    public function add_time($str,$end,$hour)
    {
        $query=PARENT::p("INSERT INTO `time` VALUES (NULL,?,?,?,?)");
        return $query->execute([$str,$end,$hour,PARENT::now()]);
    }
    public function list_time()
    {
        $query=PARENT::p("SELECT * FROM `time` ORDER BY time_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    // public function list_topics_admin()
    // {
    //     $query=PARENT::p("SELECT * FROM topics LEFT JOIN department ON topics.dept_id=department.dept_id ORDER BY topic_id DESC");
    //     $query->execute([]);
    //     return $row=$query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    public function del_time($time_id)
    {
        $query=PARENT::p("DELETE FROM `time` WHERE `time_id`=?");
        return $query->execute([$time_id]);
    }

    public function list_day()
    {
        $query=PARENT::p("SELECT * FROM `day` ORDER BY day_name ASC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add_schedule($course,$venue,$day,$time,$session,$semester)
    {
        echo $venue.'ds';
        $check=PARENT::p("SELECT * FROM `alloc_slots` WHERE  room_id=? AND time_id=? AND session_id=? AND semester_id=?");
        $check->execute([$venue,$time,$session,$semester]);
        //--------get course details -----------
        $get=PARENT::p("SELECT * FROM `course` WHERE course_id=?");
        $get->execute([$course]);
        $row=$get->fetch(PDO::FETCH_OBJ);
        $check1=PARENT::p("SELECT * FROM alloc_slots LEFT JOIN course ON alloc_slots.course_id=course.course_id WHERE course.dept_id=? AND course.level_id=? AND
            alloc_slots.day_id=? AND alloc_slots.time_id=? AND alloc_slots.session_id=? AND alloc_slots.semester_id=?");
        $check1->execute([$row->dept_id,$row->level_id,$day,$time,$session,$semester]);
        if($count=$check->rowCount()>0){
            return 3;
        }
        elseif($count=$check1->rowCount()>0){
            // return 4;
            return 4;
        }
        else{
            // return 1;
            $query=PARENT::p("INSERT INTO `alloc_slots` VALUES (NULL,?,?,?,?,?,?,?)");
            return $query->execute([$course,$venue,$day,$time,$semester,$session,PARENT::now()]);
        }
    }

    public function list_schedule($session,$semester)
    {
        $query=PARENT::p("SELECT * FROM `alloc_slots` LEFT JOIN course ON alloc_slots.course_id=course.course_id 
            LEFT JOIN rooms ON alloc_slots.room_id=rooms.room_id
            LEFT JOIN day ON alloc_slots.day_id=day.day_id
            LEFT JOIN semester ON alloc_slots.semester_id=semester.semester_id
            LEFT JOIN session ON alloc_slots.session_id=session.session_id
            LEFT JOIN `time` ON alloc_slots.time_id=`time`.time_id
            WHERE alloc_slots.session_id=? AND alloc_slots.semester_id=? ORDER BY alloc_id DESC");
        $query->execute([$session,$semester]);
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_schedule($dept,$session,$semester,$level,$time,$day)
    {
        // echo $day;
        $query=PARENT::p("SELECT * FROM `alloc_slots` LEFT JOIN course ON `alloc_slots`.`course_id`=`course`.`course_id` 
            LEFT JOIN rooms ON alloc_slots.room_id=rooms.room_id
            WHERE `course`.`dept_id`=? AND session_id=? AND `alloc_slots`.semester_id=? AND `course`.level_id=? AND `alloc_slots`.time_id=? AND `alloc_slots`.day_id=?");
        $query->execute([$dept,$session,$semester,$level,$time,$day]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function del_schedule($alloc_id)
    {
        // echo $day;
        $query=PARENT::p("DELETE FROM `alloc_slots` WHERE `alloc_id`=?");
        return $query->execute([$alloc_id]);
    }
    
}

?>

             