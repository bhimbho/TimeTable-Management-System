<?php
class user extends db
{
    public function count_user()
    {
        $query=PARENT::p("SELECT * FROM user");
        $query->execute();
        return $row=$query->rowCount();
    }   
    public function list_user()
    {
        $query=PARENT::p("SELECT * FROM user ORDER BY user_id DESC");
        $query->execute();
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function reg_user($username,$pass,$fname,$lname,$phone,$email)
    {
        $query=PARENT::p("INSERT INTO user VALUES (NULL,?,?,?,?,?,?,?,?)");
        if($query->execute([$username,md5($pass),$fname,$lname,$phone,$email,date('Y-m-d'),1])){
            return true;
        }
        else{
            return false;
        }
    }
    public function update_user($user_id,$email,$phone)
    {
        $query=PARENT::p("UPDATE `user` SET `phone`=?,`email`=? WHERE `user_id`=?");
        return $query->execute([$email,$phone,$user_id]);
    }
    public function hire_request($fname,$pname,$budget,$phone,$cat,$dept)
    {
        if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];
        }
        else{
            $user_id=0;
        }
        $query=PARENT::p("INSERT INTO request VALUES (NULL,?,?,?,?,?,?,?,?)");
        if($query->execute([$fname,$cat,$pname,$budget,$phone,date('Y-m-d'),$user_id,$dept])){
            return true;
        }
        else{
            return false;
        }
    }
    public function view_user_hire_request($user_id){
		$query=PARENT::p("SELECT * FROM request WHERE user_id=?");
		$query->execute([$user_id]);
		return $count=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function delete_hire_request($request_id,$user_id)
    {
        $query=PARENT::p("DELETE FROM request WHERE request_id=? AND user_id=?");
        return $query->execute([$request_id,$user_id]);
        // return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
    public function login($username,$password){
		$query=PARENT::p("SELECT * FROM user WHERE username=? AND password=?");
		$query->execute([$username,md5($password)]);
		$count=$query->rowCount();
		return $count;
	}
	public function get_user_details($username,$password){
		$query=PARENT::p("SELECT * FROM user WHERE username=? AND password=?");
		$query->execute([$username,md5($password)]);
		return $count=$query->fetch(PDO::FETCH_OBJ);
    }
    public function get_profile_details($user_id){
		$query=PARENT::p("SELECT * FROM user WHERE user_id=?");
		$query->execute([$user_id]);
		return $count=$query->fetch(PDO::FETCH_OBJ);
    }
    public function check_user()
    {
        if(!(isset($_SESSION['user_id']))){
            echo "<script>window.location.href='../index.php';</script>";
            $_SESSION['msg']="Please login";
        }
    }
    
}

?>