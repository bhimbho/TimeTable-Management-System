<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Assign Course</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Assign Course</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                                    if(isset($_POST['register'])){
                                                        $course_id= $_POST['course'];
                                                        $venue_id= $_POST['venue'];
                                                        $day_id= $_POST['day'];
                                                        $time_id= $_POST['time'];
                                                        $session_id= $_POST['session'];
                                                        $semester_id= $_POST['semester'];
                                                        if($time->add_schedule($course_id,$venue_id,$day_id,$time_id,$session_id,$semester_id)==1){
                                                            // echo '<div class="alert alert-success">Course Added</div>';
                                                            echo '<script>window.location.href="gen-time-table.php"</script>';
                                                        }
                                                        elseif($time->add_schedule($course_id,$venue_id,$day_id,$time_id,$session_id,$semester_id)==4){
                                                            echo '<div class="alert alert-danger">A lecture has been assigned at this time of the day for this department</div>';
                                                        }
                                                        else{
                                                            echo '<div class="alert alert-danger">There is a timetable Conflict</div>';
                                                        }
                                                    }
                                                ?>  
                                            <div class="form-group">
                                                <label>Course /C.Code</label>
                                                    <small style="color:red">Allocated Course for the session and semester will not be seen</small>
                                                <select class="form-control" name="course">
                                                    <option selected="" disabled="">Select Course</option>
                                                   <?php
                                                        $list_course=$course->list_course();
                                                        foreach ($list_course as $list_course) {?>
                                                            <option value="<?php echo $list_course->course_id ?>"><?php echo $list_course->course_title.'('.$list_course->course_unit.')' ?></option>
                                                    <?php  # code...
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Lecture Venue</label>
                                                <small style="color:red">Allocated Venue for the session and semester will not be seen</small>
                                                <select class="form-control" name="venue">
                                                    <option>--Select Venue--</option>
                                                    <?php
                                                        $list_room=$room->list_room();
                                                        foreach ($list_room as $list_room) {?>
                                                            <option value="<?php echo $list_room->room_id ?>"><?php echo $list_room->room_title .'(Capacity:'.$list_room->capacity.')' ?></option>
                                                    <?php  # code...
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Lecture Day</label>
                                                <select class="form-control" name="day">
                                                    <option>--Select Day--</option>
                                                    <?php
                                                        $day=$time->list_day();
                                                        foreach ($day as $day) {?>
                                                            <option value="<?php echo $day->day_id ?>"><?php echo $day->day_name.''.$day->day_id ?></option>
                                                    <?php  # code...
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Lecture Time</label>
                                                <select class="form-control" name="time">
                                                    <option>--Select TIme--</option>
                                                    <?php
                                                        $list_time=$time->list_time();
                                                        foreach ($list_time as $list_time) {?>
                                                            <option value="<?php echo $list_time->time_id ?>"><?php echo $list_time->start_time.'-'.$list_time->end_time ?></option>
                                                    <?php  # code...
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Session</label>
                                                <input type="text" name="" class="form-control" value="<?php echo $session->get_session($_SESSION['session'])->session_year;?>" readonly>
                                                <input type="hidden" name="session" class="form-control" value="<?php echo $session->get_session($_SESSION['session'])->session_id;?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Semester</label>
                                                <input type="text" name="" class="form-control" value="<?php echo $session->get_semester($_SESSION['semester'])->semester_title; ?>" readonly>
                                                <input type="hidden" name="semester" class="form-control" value="<?php echo $session->get_semester($_SESSION['semester'])->semester_id; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="register">Add Schedule</button> 
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            

            
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Session/Semester</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Day</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $sch=$time->list_schedule($_SESSION['session'],$_SESSION['semester']);
                                    foreach ($sch as $sch) {?>
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $sch->course_title?></td>
                                        <td><?php echo $sch->session_year.' | '.$sch->semester_title?></td>
                                        <td><?php echo $sch->start_time.' | '.$sch->end_time?></td>
                                        <td><?php echo $sch->room_title?></td>
                                        <td><?php echo $sch->day_name?></td>
                                        <td><a href="includes/remove_schedule.php?id=<?php echo $sch->alloc_id?>" class="btn btn-success"><i class="fa fa-trash"></i> Remove</a></td>                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

    <?php
    include "includes/footer.php";
    ?>