<?php
session_start();
include '../../class/allclass.php';
$lecturer=new lecturer;
$lecture_id=filter_var($_GET['l_id'], FILTER_SANITIZE_STRING);
if($lecturer->del_lecturer($lecture_id)){
	db::redirect("../view-lecturer.php");
}
?>