<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>SE Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" >
<!--===============================================================================================-->
</head>


<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form action="php/login.php" method = "post" class="login100-form validate-form p-b-33 p-t-5">
				<?php
				/* If email or password are wrong, print a danger alert that tells "Please check your email or password"*/
				if (!empty($_SESSION["flash"])){
				?>
				<div class="alert alert-danger" role="alert">
				<?php
			
                    $x = $_SESSION["flash"];
					echo $x;
					$_SESSION["flash"] = "";
					/*
					header( "refresh:3;url=index.php" );
					*/
				?>
			</div>
			<?php
			}
			?>
			
					<!--Enter Email-->
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<!--Enter Password-->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<!--Press Login to continue-->
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<!--Press create you account to continue and create your own account-->
					<div class="container-login100-form-btn m-t-32">
						<a class="txt2" href="signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					

				</form>
			</div>
		</div>
	</div>
	
	


</body>
</html>