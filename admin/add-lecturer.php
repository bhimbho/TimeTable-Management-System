<?php
include "includes/header.php";
include "includes/sidebar.php";
?>


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
                                <li class="breadcrumb-item active">Add Lecturer</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Lecturer</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <?php
                                        if(isset($_POST['register'])){
                                            $fname=filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
                                            $lname=filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
                                            $username=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                                            $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                                            $phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
                                            $des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
                                            $dept=filter_var($_POST['dept'], FILTER_SANITIZE_STRING);
                                            // $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                                            if($lecturer->add_lecturer($fname,$lname,$username,$email,$phone,$dept,$des)){
                                                $_SESSION['msg']="lecturer has been added";
                                                echo "<script>window.location.href='add-lecturer.php'</script>";
                                            }
                                            else{
                                                echo "heeeeeeeeeeeeeeeeelo";
                                            }
                                        }
                                         if(isset($_SESSION['msg'])){
                                            echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
                                            unset($_SESSION['msg']);
                                        }
                                        // echo $_SESSION['msg'];
                                    ?>
                                    <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>FIrst Name</label>
                                                <input type="text" class="form-control" name="fname" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" name="phone" placeholder="+234">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                            </div>
                                        </div> -->
                                       <!--  <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="phone" class="form-control" name="phone" placeholder="Phone Number">
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control" name="dept">
                                                    <option selected="" disabled="">Select Department</option>
                                                    <?php
                                                    $dept_list=$dept->list_dept();
                                                    foreach ($dept_list as $dept_list) {?>
                                                        <option value="<?php echo $dept_list->dept_id ?>"><?php echo $dept_list->dept_title ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select class="form-control" name="des">
                                                    <option selected="" disabled="">Select Designation</option>
                                                        <option value="Lecture I">Lecture I</option>
                                                        <option value="Lecture II">Lecture II</option>
                                                        <option value="Senior Lecture I">Senior Lecture I</option>
                                                        <option value="Senior Lecture II">Senior Lecture II</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="register">Add Lecturer</button> 
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->
    <?php
    include "includes/footer.php";
    ?>

