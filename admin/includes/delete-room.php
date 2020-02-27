<?php
session_start();
include '../../class/allclass.php';
$room=new room;
$room_id=filter_var($_GET['room_id'], FILTER_SANITIZE_STRING);
if($room->del_room($room_id)){
	db::redirect("../venue.php");
}
?>