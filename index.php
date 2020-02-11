<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Xeria - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" /> -->
    </head>
<body>
	<div class="container-fluid main-body">
		<div class="row main">
			<div class="col-md-12">
				<h2 class="text-center text-white text-uppercase" style="font-family: rockwell extrabold">Time table management system</h2>
			</div>

			<div class="col-md-4 d-flex align-items-center justify-content-center">
				<div class="row">
					<div class="col-md-12 text-center">
						<i class="la la-user la-5x text-center"></i>
					</div>
					<div class="col-md-12 text-center">
						<a href="admin/index.php" class="h4 text-white text-capitalize text-center">login as admin</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex align-items-center justify-content-center">
				<div class="row">
					<div class="col-md-12 text-center">
						<i class="la la-user la-5x text-center"></i>
					</div>
					<div class="col-md-12 text-center">
						<a href="lecturer/index.php" class="h4 text-white text-capitalize text-center">login as Lecturer</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex align-items-center justify-content-center">
				<div class="row">
					<div class="col-md-12 text-center">
						<i class="la la-user la-5x text-center"></i>
					</div>
					<div class="col-md-12 text-center">
						<a href="student/index.php" class="h4 text-white text-capitalize text-center">login as Student</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<?php 
			if(isset($_SESSION['check_error'])){
				echo "<div class='alert alert-danger'>".$_SESSION['check_error']."</div>";
			}
			?>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				 <footer class="footer footer-alt text-white">
            2020 &copy; Developed by <a href="" class="text-white">Me</a> 
        </footer>
			</div>
		</div>
		
	</div>	
	

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
</body>
</html>
<style type="text/css">
	body{
		overflow-x: hidden;
	}
	.main-body{
		background-image: url(assets/images/background.jpg) !important;
		background-size: cover !important;
		background-position: center !important;
		width: 100vw;
		height: 100vh;
	}
	.main{
		width: 60%;
		height: 40vh;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
	}
	footer{
		position: fixed;
		bottom: 5px;
		left: 38%;
		text-align: center !important;
	}
	@media (max-width: 575px){
		h2{
			font-size: 16px;
			
		}
		.main{
			height: 80vh;
			width: 80vw;
			
		}
		footer{
			margin-top: 100px;
			left: 15%;
		}
	}
</style>