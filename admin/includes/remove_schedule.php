<?php
session_start();
include '../../class/allclass.php';
$time=new time;
$schedule_id=filter_var($_GET['id'], FILTER_SANITIZE_STRING);
if($time->del_schedule($schedule_id)){
	db::redirect("../gen-time-table.php");
}
?>