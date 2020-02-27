<?php
class student extends db
{
        //-------------topics Upload Function------------
    
    
    public function student_reg($fname,$lname,$matric,$email,$phone,$password,$dept)
    {
        // echo $matric;
        $query1=PARENT::p("SELECT * FROM student WHERE student_matricno=?");
        $query1->execute([$matric]);
        // echo $query1->rowCount();
        if($query1->rowCount()>0){
            return 3;
            // exit();
        }
        else{
            $query=PARENT::p("INSERT INTO `student` VALUES (NULL,?,?,?,?,?,?,?,?,?)");
            return $query->execute([$fname,$lname,$email,$phone,$matric,$password,$dept,0,PARENT::now()]);
        }
    }
    public function list_student()
    {
        $query=PARENT::p("SELECT * FROM `student` LEFT JOIN department ON student.student_dept_id=department.dept_id ORDER BY student_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function student_login($user,$pass)
    {
        $query=PARENT::p("SELECT * FROM student WHERE student_matricno=? AND student_password=?");
        $query->execute([$user,md5($pass)]);
        if($query->rowCount()>0){
            $row=$query->fetch(PDO::FETCH_OBJ);
            $_SESSION['student_id']=$row->student_id;
            $_SESSION['student_matric']=$row->student_matricno;
            $_SESSION['student_dept']=$row->student_dept_id;
            $_SESSION['student_type']=$row->student_type;
            // $_SESSION['admin_level']=$row->admin_level;
            echo "<script>window.location.href='dashboard.php'</script>";
        }
        else{
            $_SESSION['login_error']="Incorrect Username or Password";
        }
    }
    // public function list_topics_admin()
    // {
    //     $query=PARENT::p("SELECT * FROM topics LEFT JOIN department ON topics.dept_id=department.dept_id ORDER BY topic_id DESC");
    //     $query->execute([]);
    //     return $row=$query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    public function del_student($student_id)
    {
        $query=PARENT::p("DELETE FROM `student` WHERE `student_id`=?");
        return $query->execute([$student_id]);
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
    public function check_student()
    {
        
        if(!(isset($_SESSION['student_type']))){
            $_SESSION['check_error']="You need to be logged in";
            echo "<script>window.location.href='../index.php'</script>";            
        }
        else{
            if($_SESSION['student_type']!=0){
            $_SESSION['check_error']="Your are not a student";
            echo "<script>window.location.href='../index.php'</script>";            
            }
        }
    }
    
}

?>