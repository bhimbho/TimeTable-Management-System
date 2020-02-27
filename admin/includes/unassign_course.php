<?php
session_start();
include '../../class/allclass.php';
$course=new course;
$course_id=filter_var($_GET['id'], FILTER_SANITIZE_STRING);
if($course->unassigned_course($course_id)){
	db::redirect("../unassigned_course.php");
}
?>