<?php
session_start();
include "../class/allclass.php";
$admin=new admin();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Time Table Management System - Admin Login</title>
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
                if(isset($_POST['login'])){
                    $username=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                    $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                    if(empty(trim($username)) || empty(trim($password))){
                        echo "<div class='alert alert-warning'>Field Cannot Be Empty</div>";
                    }
                    else{
                        $admin->admin_login($username,$password);
                    }
                }
                if(isset($_SESSION['login_error'])){
                    echo "<div class='alert alert-danger'>".$_SESSION['login_error']."</div>";
                    unset($_SESSION['login_error']);
                }
                ?>
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address/Username</label>
                                        <input class="form-control" type="text" id="emailaddress" name="username" placeholder="Enter your Username" required="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required="">
                                    </div>

                                   <!--  <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div> -->

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit" name="login"> Log In </button>
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