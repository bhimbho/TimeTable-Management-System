<?php
class lecturer extends db
{
        //-------------topics Upload Function------------
    
    public function lecturer_login($user,$pass)
    {
        $query=PARENT::p("SELECT * FROM lecturer WHERE lecturer_username=? AND lecturer_password=?");
        $query->execute([$user,md5($pass)]);
        if($query->rowCount()>0){
            $row=$query->fetch(PDO::FETCH_OBJ);
            $_SESSION['lecturer_id']=$row->lecturer_id;
            $_SESSION['lecturer_username']=$row->lecturer_username;
            $_SESSION['lecturer_dept']=$row->lecturer_dept;
            $_SESSION['lecturer_type']=$row->lecturer_type;
            // $_SESSION['admin_level']=$row->admin_level;
            echo "<script>window.location.href='dashboard.php'</script>";
        }
        else{
            $_SESSION['login_error']="Incorrect Username or Password";
        }
    }
    public function add_lecturer($fname,$lname,$username,$email,$phone,$dept,$des)
    {
        $query=PARENT::p("INSERT INTO `lecturer` VALUES (NULL,?,?,?,?,?,?,?,?,?,?)");
        return $query->execute([$fname,$lname,$username,md5(12345),$email,$phone,$dept,$des,1,PARENT::now()]);
    }
    public function list_lecturer()
    {
        $query=PARENT::p("SELECT * FROM `lecturer` LEFT JOIN department ON lecturer.lecturer_dept=department.dept_id ORDER BY lecturer_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    // public function list_topics_admin()
    // {
    //     $query=PARENT::p("SELECT * FROM topics LEFT JOIN department ON topics.dept_id=department.dept_id ORDER BY topic_id DESC");
    //     $query->execute([]);
    //     return $row=$query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    public function del_lecturer($lecturer_id)
    {
        $query=PARENT::p("DELETE FROM `lecturer` WHERE `lecturer_id`=?");
        return $query->execute([$lecturer_id]);
    }

    //--------------Semester Function-----------------
    public function add_semester($semester)
    {
        $query=PARENT::p("INSERT INTO semester VALUES (NULL,?,?)");
        return $query->execute([$semester,PARENT::now()]);
    }
    public function list_semester()
    {
        $query=PARENT::p("SELECT * FROM `semester` ORDER BY semester_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function delete_semester($topic_id)
    {
        $query=PARENT::p("DELETE FROM `semester` WHERE `semester_id`=?");
        return $query->execute([$semester_id]);
        // return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function check_lecturer()
    {
        
        if(!(isset($_SESSION['lecturer_type']))){
            $_SESSION['check_error']="You need to be logged in";
            echo "<script>window.location.href='../index.php'</script>";            
        }
        else{
            if($_SESSION['lecturer_type']!=1){
            $_SESSION['check_error']="Your are not a Lecturer";
            echo "<script>window.location.href='../index.php'</script>";            
            }
        }
    }

    
}

?>