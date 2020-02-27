<?php
session_start();
include '../../class/allclass.php';
$course=new course;
$course_id=filter_var($_GET['course_id'], FILTER_SANITIZE_STRING);
if($course->del_course($course_id)){
	db::redirect("../course.php");
}
?>