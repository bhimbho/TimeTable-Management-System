<?php
include "includes/header.php";
include "includes/sidebar.php";
$lecturer->check_lecturer();
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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-xl-4">
                    <?php
                         $day=date('l');
                         date_default_timezone_set("Africa/Lagos");
                         $time1=date('H');
                         if($time1%2==1){
                            $time1+=1;
                         }
                         else{
                            $time1=$time1+2;
                         }
                         $new_time=$time1.":00";
                         // $new_endtime=($time1+2).":00";
                        $day_id=$time->get_day_id($day);
                        $time_id=$time->get_time_id($new_time);
                        $day_schedule=$time->schedule_checker($time_id,$day_id,$_SESSION['lecturer_id']);
                        ?>
                            
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Next Lecture Time</h4>
                        <h2 class="text-dark my-4 text-center"><i class="fa fa-clock text-dark"></i> <span data-plugin=""><?php echo $new_time?></span></br></h2>
                    </div> <!-- end card-box-->
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Next Lecture Course</h4>
                        <h2 class="text-dark my-4 text-center"><i class="fa fa-book text-dark"></i> <span data-plugin=""><?php if(isset($day_schedule->course_title)){echo $day_schedule->course_title.'('.$day_schedule->course_unit.')';}else{echo "No Lecture in the next hour";}?></span></h2>
                    </div> <!-- end card-box-->
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Next Lecture Venue</h4>
                        <h2 class="text my-4 text-center"><i class="fa fa-home text-dark"></i> <span data-plugin=""><?php if(isset($day_schedule->room_title)){echo $day_schedule->room_title;}else{echo "No lecture";}?></span></h2>
                    </div> <!-- end card-box-->
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->
<?php
include "includes/footer.php";
?>