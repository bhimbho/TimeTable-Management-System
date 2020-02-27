<?php
// require "db.class.php";
class course extends db
{
        //-------------topics Upload Function------------
    
    
    public function add_course($title,$code,$dept_id,$level)
    {
        $query=PARENT::p("INSERT INTO `course` VALUES (NULL,?,?,?,?,?)");
        return $query->execute([$title,$code,$dept_id,$level,PARENT::now()]);
    }
    public function list_course()
    {
        $query=PARENT::p("SELECT * FROM `course` LEFT JOIN department ON course.dept_id=department.dept_id 
            LEFT JOIN level ON course.level_id=level.level_id ORDER BY course_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
     public function assign_course($course_id,$lecturer)
    {
        $check=PARENT::p("SELECT * FROM assigned_course WHERE course_id=? AND lecturer_id=?");
        $check->execute();
        if($check->rowCount()>0){
            return false;
        }
        else{
            $query=PARENT::p("INSERT INTO `assigned_course` VALUES (NULL,?,?,?)");
            return $query->execute([$course_id,$lecturer,PARENT::now()]);
        }
    }
    public function filter_assigned_course($session,$semester)
    {
        // echo $session;
        $check=PARENT::p("SELECT * FROM course WHERE course_id NOT IN(SELECT course_id FROM alloc_slots WHERE session_id=? AND semester_id=?)ORDER BY course_id DESC");
        $check->execute([$session,$semester]);
        return $row=$check->fetchAll(PDO::FETCH_OBJ);
        // $query=PARENT::p("SELECT * 
        //     FROM   course
        //     LEFT JOIN alloc_slots
        //       ON course.course_id = alloc_slots.course_id
        //       WHERE alloc_slots.course_id IS NULL AND alloc_slots.session_id <>? AND alloc_slots.semester_id <>?");
        // $query->execute([$session,$semester]);
        // return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function list_assigned_course()
    {
        $query=PARENT::p("SELECT * FROM `assigned_course` LEFT JOIN lecturer ON assigned_course.lecturer_id=lecturer.lecturer_id 
            LEFT JOIN course ON assigned_course.course_id=course.course_id ORDER BY assigned_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function list_assigned_course_lecturer($lecturer_id)
    {
        $query=PARENT::p("SELECT * FROM `assigned_course` LEFT JOIN lecturer ON assigned_course.lecturer_id=lecturer.lecturer_id 
            LEFT JOIN course ON assigned_course.course_id=course.course_id LEFT JOIN department ON course.dept_id=department.dept_id WHERE lecturer.lecturer_id=? ORDER BY assigned_id DESC");
        $query->execute([$lecturer_id]);
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    // public function list_topics_admin()
    // {
    //     $query=PARENT::p("SELECT * FROM topics LEFT JOIN department ON topics.dept_id=department.dept_id ORDER BY topic_id DESC");
    //     $query->execute([]);
    //     return $row=$query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    public function del_course($course_id)
    {
        $query=PARENT::p("DELETE FROM `course` WHERE `course_id`=?");
        return $query->execute([$course_id]);
    }

    public function unassigned_course($course_id)
    {
        $query=PARENT::p("DELETE FROM `assigned_course` WHERE assigned_id=?");
        return $query->execute([$course_id]);
    }
   
    
}

?>