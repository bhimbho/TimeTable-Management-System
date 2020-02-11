 <?php
 include '../../class/allclass.php';
 $room=new room();
                                            
                                            $room_title=filter_var($_POST['room_title'], FILTER_SANITIZE_STRING);
                                            $room_capacity=filter_var($_POST['room_capacity'], FILTER_SANITIZE_STRING);
                                            // $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                                           echo $room->add_room($room_title,$room_capacity);