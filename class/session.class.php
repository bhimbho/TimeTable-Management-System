<?php
class session extends db
{
        //-------------topics Upload Function------------
    
    
    public function add_session($session)
    {
        $query=PARENT::p("INSERT INTO session VALUES (NULL,?,?)");
        return $query->execute([$session,PARENT::now()]);
    }
    public function list_session()
    {
        $query=PARENT::p("SELECT * FROM `session` ORDER BY session_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_session($session_id)
    {
        $query=PARENT::p("SELECT * FROM `session` WHERE session_id =?");
        $query->execute([$session_id]);
        return $row=$query->fetch(PDO::FETCH_OBJ);
    }
    // public function list_topics_admin()
    // {
    //     $query=PARENT::p("SELECT * FROM topics LEFT JOIN department ON topics.dept_id=department.dept_id ORDER BY topic_id DESC");
    //     $query->execute([]);
    //     return $row=$query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    public function delete_session($topic_id)
    {
        $query=PARENT::p("DELETE FROM `session` WHERE `session_id`=?");
        return $query->execute([$session_id]);
        // return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }

    //--------------Semester Function-----------------
    public function add_semester($semester)
    {
        $query=PARENT::p("INSERT INTO semester VALUES (NULL,?,?)");
        return $query->execute([$semester,PARENT::now()]);
    }
    public function list_semester()
    {
        $query=PARENT::p("SELECT * FROM `semester` ORDER BY semester_title ASC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_semester($semester_id)
    {
        $query=PARENT::p("SELECT * FROM `semester` WHERE semester_id =?");
        $query->execute([$semester_id]);
        return $row=$query->fetch(PDO::FETCH_OBJ);
    }
    public function delete_semester($topic_id)
    {
        $query=PARENT::p("DELETE FROM `semester` WHERE `semester_id`=?");
        return $query->execute([$semester_id]);
        // return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    
}

?>