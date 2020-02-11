<?php
include '../../class/allclass.php';
 $room=new room();
 
                    
	$list_venue=$room->list_room();
	echo json_encode($list_venue);
?>


