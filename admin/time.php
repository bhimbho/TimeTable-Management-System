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
                                <li class="breadcrumb-item active">Add/Modify Time</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Time</h4>
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
                                            <div class="form-group">
                                                <?php
                                                    if(isset($_POST['add_time'])){
                                                        $str= $_POST['start_time'];
                                                        $end= $_POST['end_time'];
                                                        $hr= $_POST['hour'];
                                                        if($time->add_time($str,$end,$hr)){
                                                            echo '<div class="alert alert-success">Time Added</div>';
                                                        }
                                                        else{
                                                            echo '<div class="alert alert-danger">Time Cannot Be Added</div>';
                                                        }
                                                    }
                                                ?>
                                                <small style="color:red">Kindly use the 24hr format 01:00pm == 13:00</small><br/>
                                                <label>Start Time</label>
                                                <input type="text" class="form-control" name="start_time" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <small style="color:red">Kindly use the 24hr format 01:00pm == 13:00</small><br/>
                                                <label>End Time</label>
                                                <input type="text" class="form-control" name="end_time" placeholder="">
                                            </div>
                                        </div>
                                         <div class="col-md-12">  
                                            <div class="form-group">
                                                <!-- <small style="color:red">Kindly use the 24hr format 01:00pm == 13:00</small><br/> -->
                                                <label>Lecturer Hour</label>
                                                <input type="number" class="form-control" name="hour" placeholder="2">
                                            </div>
                                        </div>
                                                                              
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_time">Add Time</button> 
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
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Lecture Hours</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                        $list_time=$time->list_time();
                                        foreach ($list_time as $list_time) {?>
                                            
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $list_time->start_time?></td>
                                        <td><?php echo $list_time->end_time?></td>
                                        <td><?php echo $list_time->hours?></td>
                                        <td><a href="includes/delete_time.php?time_val=<?php echo $list_time->time_id?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    <?php 
                                        }?>
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