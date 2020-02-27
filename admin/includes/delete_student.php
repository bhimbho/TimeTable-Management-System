<?php
session_start();
include '../../class/allclass.php';
$student=new student;
$student_id=filter_var($_GET['student_id'], FILTER_SANITIZE_STRING);
if($student->del_student($student_id)){
	db::redirect("../view-student.php");
}
?>