<?php
session_start();
include '../class/allclass.php';
$dept=new dept();
$room=new room();
$time=new time();
$course=new course();
$session=new session();
$lecturer=new lecturer();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Lecturer Login</title>
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
                    <div class="col-md-4 col-lg-4 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="auth-title">Sign In</h5>
                                <form action="" method="post">
                                     <?php
                                        if(isset($_POST['submit'])){
                                            $username=$_POST['username'];
                                            $password=$_POST['password'];
                                            $lecturer->lecturer_login($username,$password);
                                        }
                                        if(isset($_SESSION['login_error'])){
                                            echo "<div class='alert alert-danger'>".$_SESSION['login_error']."</div>";
                                        }
                                    ?>
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="text" id="emailaddress" name="username" placeholder="Enter your Username">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                    </div>

                                    

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit" name="submit"> Log In </button>
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