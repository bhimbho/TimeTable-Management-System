<?php
// require "db.class.php";
class room extends db
{
        //-------------topics Upload Function------------
    
    
    public function add_room($room,$capacity)
    {
        $query=PARENT::p("INSERT INTO `rooms` VALUES (NULL,?,?)");
        return $query->execute([$room,$capacity]);
    }
    public function list_room()
    {
        $query=PARENT::p("SELECT * FROM `rooms` ORDER BY room_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function filter_assigned_venue($session,$semester)
    {
        // echo $semester;
        $query=PARENT::p("SELECT * FROM `rooms` WHERE `room_id`ORDER BY room_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_all_possible_schedule()
    {
        $query=PARENT::p("SELECT * FROM `rooms` LEFT JOIN time ORDER BY room_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    // public function list_topics_admin()
    // {
    //     $query=PARENT::p("SELECT * FROM topics LEFT JOIN department ON topics.dept_id=department.dept_id ORDER BY topic_id DESC");
    //     $query->execute([]);
    //     return $row=$query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    public function del_room($room_id)
    {
        $query=PARENT::p("DELETE FROM `rooms` WHERE `room_id`=?");
        return $query->execute([$room_id]);
    }

   
    
}

?>