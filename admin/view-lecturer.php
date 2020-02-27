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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lecturer</a></li>
                                <li class="breadcrumb-item active">View Lecturer</li>
                            </ol>
                        </div>
                        <h4 class="page-title">View Lecturer</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                        <th>Phone</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                        $lect=$lecturer->list_lecturer();
                                        foreach ($lect as $lect) {?>
                                        
                                    <tr>
                                        <td><?php echo ++$count?></td>
                                        <td><?php echo $lect->lecturer_username?></td>
                                        <td><?php echo $lect->lecturer_email?></td>
                                        <td><?php echo $lect->lecturer_phone?></td>
                                        <td><?php echo $lect->dept_title?></td>
                                        <td><?php echo $lect->lecturer_level?></td>
                                        <td><a href="includes/delete_lecturer.php?l_id=<?php echo $lect->lecturer_id?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    <?php }
                                        ?>
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