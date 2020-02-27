<?php
session_start();
include '../../class/allclass.php';
$time=new time();
$time_val=filter_var($_GET['time_val'], FILTER_SANITIZE_STRING);
if($time->del_time($time_val)){
	db::redirect("../time.php");
}
?>