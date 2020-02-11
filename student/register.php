<?php
session_start();
include '../class/allclass.php';
$dept=new dept();
$room=new room();
$time=new time();
$course=new course();
$session=new session();
$student=new student();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>TTMS Student Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="auth-title">Register</h5>
                                <form action="" method="post">
                                    <?php
                                        if(isset($_POST['submit'])){
                                            // echo 111;
                                            $fname=$_POST['fname'];
                                            $lname=$_POST['lname'];
                                            $matric=$_POST['matric'];
                                            $email=$_POST['email'];
                                            $phone=$_POST['phone'];
                                            $password=md5($_POST['password']);
                                            $dept=$_POST['dept'];
                                            if($student->student_reg($fname,$lname,$matric,$email,$phone,$password,$dept)==1){
                                                echo "<div class='alert alert-success'>Account Has Been Created Successfully</div><script type='text/javascript'>
                                                    setTimeout(function(){ window.location.href='index.php'; }, 3000);
                                                </script>";
                                            }
                                            elseif($student->student_reg($fname,$lname,$matric,$email,$phone,$password,$dept)==3){
                                                echo "<div class='alert alert-danger'>Account Already Exist</div>";
                                            }
                                            else{
                                                echo "<div class='alert alert-danger'>Something Went Wrong</div>";
                                            }
                                        }
                                    ?>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Firstname</label>
                                            <input class="form-control" type="text" id="emailaddress" name="fname" placeholder="Enter your Firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Lastname</label>
                                            <input class="form-control" type="text" id="emailaddress" name="lname" placeholder="Enter your Lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Matric No</label>
                                            <input class="form-control" type="text" id="emailaddress" name="matric" placeholder="Enter your Matric Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" id="password" name="password"  placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email</label>
                                            <input class="form-control" type="Email" id="emailaddress" name="email" placeholder="Enter your Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Phone</label>
                                            <input class="form-control" type="text" id="emailaddress" name="phone" placeholder="Enter your Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Departmnet</label>
                                            <select class="form-control" name="dept">
                                                <option selected="" disabled="">--Select Department--</option>
                                                <?php
                                                    $dept_list=$dept->list_dept();
                                                    foreach ($dept_list as $dept_list) {?>
                                                        <option value="<?php echo $dept_list->dept_id?>"><?php echo $dept_list->dept_title?></option>
                                                     <?php                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-danger btn-block" type="submit" name="submit"> Log In </button>
                                            <a href="index.php">Have an account? Login</a>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2020 &copy; Developed by <a href="" class="text-muted">Me</a> 
        </footer>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>
</html>
