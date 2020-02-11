<?php
// require "db.class.php";
class dept extends db
{


//-------------Department Category Function------------

public function add_dept($dept_title)
{
    $query=PARENT::p("INSERT INTO department VALUES (NULL,?,?)");
    return $query->execute([$dept_title,PARENT::now()]);
}
public function list_dept()
{
    $query=PARENT::p("SELECT * FROM department ORDER BY dept_title ASC");
    $query->execute();
    return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function delete_dept($dept_id)
{
    $query=PARENT::p("DELETE FROM department WHERE dept_id=?");
    return $query->execute([$dept_id]);
    // return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function get_dept($dept)
    {
        $query=PARENT::p("SELECT * FROM `department` WHERE dept_id =?");
        $query->execute([$dept]);
        return $row=$query->fetch(PDO::FETCH_OBJ);
    }
public function add_level($level)
{
    $query=PARENT::p("INSERT INTO level VALUES (NULL,?)");
    return $query->execute([$level]);
}
public function list_level()
{
    $query=PARENT::p("SELECT * FROM level ORDER BY level_id ASC");
    $query->execute();
    return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function delete_level($level_id)
{
    $query=PARENT::p("DELETE FROM level WHERE level_id=?");
    return $query->execute([$dept_id]);
    // return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function get_level($level)
    {
        $query=PARENT::p("SELECT * FROM `level` WHERE level_id =?");
        $query->execute([$level]);
        return $row=$query->fetch(PDO::FETCH_OBJ);
    }
	
}

?>