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
                                <li class="breadcrumb-item active">Add/Modify Department</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Department</h4>
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
                                                        $dept_title= $_POST['department'];
                                                        if($dept->add_dept($dept_title)){
                                                            echo '<div class="alert alert-success">Department Added</div>';
                                                        }
                                                        else{
                                                            echo '<div class="alert alert-danger">Department Cannot Be Added</div>';
                                                        }
                                                    }
                                                ?>
                                                <label>Department Title</label>
                                                <input type="text" class="form-control" name="department" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_time">Add Department</button> 
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
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                        $list_dept=$dept->list_dept();
                                        foreach ($list_dept as $list_dept) {?>
                                            
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $list_dept->dept_title?></td>
                                        <td><a href="includes/delete_dept.php?dept_id=<?php echo $list_dept->dept_id?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
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