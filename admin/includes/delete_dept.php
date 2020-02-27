<?php
session_start();
include '../../class/allclass.php';
$dept=new dept;
$dept_id=filter_var($_GET['dept_id'], FILTER_SANITIZE_STRING);
if($dept->delete_dept($dept_id)){
	db::redirect("../department.php");
}
?>