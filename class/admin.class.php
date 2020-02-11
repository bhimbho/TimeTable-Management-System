<?php
// require "db.class.php";
class admin extends db
{
	//------------Admin Function -----------------
    public function admin_login($user,$pass)
	{
		$query=PARENT::p("SELECT * FROM admin WHERE admin_username=? AND admin_password=?");
		$query->execute([$user,md5($pass)]);
		if($query->rowCount()==1){
			$row=$query->fetch(PDO::FETCH_OBJ);
			$_SESSION['admin_id']=$row->admin_id;
			$_SESSION['admin_username']=$row->admin_username;
			// $_SESSION['admin_level']=$row->admin_level;
			echo "<script>window.location.href='dashboard.php'</script>";
		}
		else{
			$_SESSION['login_error']="Incorrect Username or Password";
		}
	}
	public function check()
	{
		if(!isset($_SESSION['admin_id'])){			
			echo "<script>window.location.href='index.php'</script>";
		}
	}
	public function add_admin($admin_fname,$admin_username,$admin_pass,$admin_type,$email,$phone)
	{
		echo $admin_type;
		$query=PARENT::p("INSERT INTO `admin` VALUES (NULL,?,?,?,?,?,?,?)");
		return $query->execute([$admin_username,$admin_fname,md5($admin_pass),$admin_type,$email,$phone,PARENT::now()]);
	}
	public function list_admin()
	{
		$query=PARENT::p("SELECT * FROM `admin` ORDER BY admin_id DESC");
		$query->execute();
		return $row=$query->fetchAll(PDO::FETCH_OBJ);
	}

//-------------Software CategoryFunction------------

public function add_soft_cat($software_name)
{
    $query=PARENT::p("INSERT INTO software_cat VALUES (NULL,?,?)");
    return $query->execute([$software_name,PARENT::now()]);
}
public function list_soft_cat()
{
    $query=PARENT::p("SELECT * FROM software_cat");
    $query->execute();
    return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function delete_soft_cat($soft_cat_id)
{
    $query=PARENT::p("DELETE FROM software_cat WHERE soft_cat_id=?");
    return $query->execute([$soft_cat_id]);
    // return $row=$query->fetchAll(PDO::FETCH_OBJ);
}

//-------------Software Upload Function------------

public function count_soft()
{
    $query=PARENT::p("SELECT * FROM software");
    $query->execute();
    return $row=$query->rowCount();
}
public function add_soft($cat,$software_name,$price,$link,$desc,$type,$image,$admin_id)
{
    $query=PARENT::p("INSERT INTO software VALUES (NULL,?,?,?,?,?,?,?,?,?)");
    return $query->execute([$software_name,$price,$link,$cat,$desc,$type,$image,PARENT::now(),$admin_id]);
}
public function list_soft()
{
    $query=PARENT::p("SELECT * FROM software LEFT JOIN software_cat ON software.category=software_cat.soft_cat_id 
	LEFT JOIN `admin` ON software.admin_id=`admin`.`admin_id`
	ORDER BY soft_id");
    $query->execute();
    return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function list_by_cat($search)
{
    $query=PARENT::p("SELECT * FROM software LEFT JOIN software_cat ON software.category=software_cat.soft_cat_id 
	LEFT JOIN `admin` ON software.admin_id=`admin`.`admin_id`
	WHERE soft_cat_name=?");
    $query->execute([$search]);
    return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function get_software($software)
    {
        $query=PARENT::p("SELECT * FROM software 
		LEFT JOIN software_cat ON software.category=software_cat.soft_cat_id LEFT JOIN `admin` ON software.admin_id=`admin`.`admin_id`
        WHERE soft_id = ?
        ORDER BY soft_id DESC");
        $query->execute([$software]);
        return $row=$query->fetch(PDO::FETCH_OBJ);
    }
public function search_software($search)
    {
        $query=PARENT::p("SELECT * FROM software 
						LEFT JOIN software_cat ON software.category=software_cat.soft_cat_id 
						LEFT JOIN `admin` ON software.admin_id=`admin`.`admin_id`
						WHERE software.soft_name LIKE ? 
						ORDER BY soft_id DESC");
        $query->execute(["%".$search."%"]);
        return $row=$query->fetchAll(PDO::FETCH_OBJ);
    }
public function delete_soft($soft_id)
{
    $query=PARENT::p("DELETE FROM software WHERE soft_id=?");
    return $query->execute([$soft_id]);
    // return $row=$query->fetchAll(PDO::FETCH_OBJ);
}


//-------------Department Category Function------------

public function add_dept($software_name)
{
    $query=PARENT::p("INSERT INTO department VALUES (NULL,?,?)");
    return $query->execute([$software_name,PARENT::now()]);
}
public function list_dept()
{
    $query=PARENT::p("SELECT * FROM department ORDER BY dept_name ASC");
    $query->execute();
    return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
public function delete_dept($dept_id)
{
    $query=PARENT::p("DELETE FROM department WHERE dept_id=?");
    return $query->execute([$dept_id]);
    // return $row=$query->fetchAll(PDO::FETCH_OBJ);
}
	//-------------School Related Function------------

	public function add_school($school_name)
	{
		$query=PARENT::p("INSERT INTO schools VALUES (NULL,?,?)");
		return $query->execute([$school_name,PARENT::now()]);
	}
	public function list_school()
	{
		$query=PARENT::p("SELECT * FROM schools");
		$query->execute();
		return $row=$query->fetchAll(PDO::FETCH_OBJ);
	}
	public function delete_school($school_id)
	{
		$query=PARENT::p("DELETE FROM schools WHERE school_id=?");
		return $query->execute([$school_id]);
		// return $row=$query->fetchAll(PDO::FETCH_OBJ);
	}

	//--------------end of school function ----------------------

}

?>