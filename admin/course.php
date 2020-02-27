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
                                <li class="breadcrumb-item active">Add/Modify Course</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Course</h4>
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
                                                        $course_title= $_POST['course_title'];
                                                        $course_code= $_POST['course_code'];
                                                        $dept= $_POST['dept'];
                                                        $level= $_POST['level'];
                                                        if($course->add_course($course_title,$course_code,$dept,$level)){
                                                            // echo '<div class="alert alert-success">Course Added</div>';
                                                            echo '<script>window.location.href="course.php"</script>';
                                                        }
                                                        else{
                                                            echo '<div class="alert alert-danger">Course Cannot Be Added</div>';
                                                        }
                                                    }
                                                ?>
                                            <div class="form-group">
                                                <label>Course Title</label>
                                                <input type="text" class="form-control" name="course_title" placeholder="Course Title">
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Course Code</label>
                                                <input type="text" class="form-control" name="course_code" placeholder="Course Code">
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select type="text" class="form-control" name="dept">
                                                    <option selected="" disabled="">Select Department</option>
                                                    <?php
                                                        $list_dept=$dept->list_dept();
                                                        foreach ($list_dept as $list_dept) {?>
                                                            <option value="<?php echo $list_dept->dept_id ?>"><?php echo $list_dept->dept_title ?></option>
                                                    <?php  # code...
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select type="text" class="form-control" name="level">
                                                    <option selected="" disabled="">Select Level</option>
                                                    <?php
                                                        $list_level=$dept->list_level();
                                                        foreach ($list_level as $list_level) {?>
                                                            <option value="<?php echo $list_level->level_id ?>"><?php echo $list_level->level ?></option>
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
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $list_course=$course->list_course();
                                    foreach ($list_course as $list_course) {?>
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $list_course->course_title?></td>
                                        <td><?php echo $list_course->course_unit?></td>
                                        <td><?php echo $list_course->dept_title?></td>
                                        <td><?php echo $list_course->level?></td>
                                        <td><a href="includes/delete-course.php?course_id=<?php echo $list_course->course_id?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
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