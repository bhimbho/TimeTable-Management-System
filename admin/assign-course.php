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
                                                    if(isset($_POST['add_course'])){
                                                        $course_id= $_POST['course'];
                                                        $lecturer= $_POST['lecturer'];
                                                        if($course->assign_course($course_id,$lecturer)){
                                                            // echo '<div class="alert alert-success">Course Added</div>';
                                                            echo '<script>window.location.href="assign-course.php"</script>';
                                                        }
                                                        else{
                                                            echo '<div class="alert alert-danger">Course Cannot Be Added</div>';
                                                        }
                                                    }
                                                ?>  
                                            <div class="form-group">
                                                <label>Course /C.Code</label>
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
                                                <label>Course Lecturer</label>
                                                <select class="form-control" name="lecturer">
                                                    <option>--Select Lecturer--</option>
                                                    <?php
                                                        $list_lecturer=$lecturer->list_lecturer();
                                                        foreach ($list_lecturer as $list_lecturer) {?>
                                                            <option value="<?php echo $list_lecturer->lecturer_id ?>"><?php echo $list_lecturer->lecturer_firstname.' '.$list_lecturer->lecturer_lastname ?></option>
                                                    <?php  # code...
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_course">Add Course</button> 
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
                                        <th>Course Code</th>
                                        <th>Lecturer Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $list_assigned_course=$course->list_assigned_course();
                                    foreach ($list_assigned_course as $list_assigned_course) {?>
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $list_assigned_course->course_title?></td>
                                        <td><?php echo $list_assigned_course->course_unit?></td>
                                        <td><?php echo $list_assigned_course->lecturer_firstname.' '.$list_assigned_course->lecturer_lastname?></td>
                                        <td><a href="includes/unassign_course.php?id=<?php echo $list_assigned_course->assigned_id?>" class="btn btn-success"><i class="fa fa-times"></i> Unassign</a></td>
                                    </tr>
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