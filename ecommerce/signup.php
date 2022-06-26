<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<style>
  	.error{
    	color: red;
        font-style: italic;
    }
  </style>
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/pexels-photo-6068960.jpeg" alt="">
				</div>
				<form action="php/signup.php" method = "post" id = "registration">
					<h3>Registration Form</h3>
					
					<div class="form-group">
					
						<input type="text" minlength="3" name = "first_name" placeholder="First Name" class="form-control">
						<input type="text" minlength="3" name = "last_name" placeholder="Last Name" class="form-control">
					</div>
					
					<?php
					/* If email is already taken, print a danger alert that tells "email is already taken"*/
                    if (!empty($_SESSION["flash"])){
					?>
					<div class="alert alert-warning" role="alert">
					<?php
                    $x = $_SESSION["flash"];
                    echo $x;
					header( "refresh:3;url=signup.php" );
					$_SESSION["flash"] = ""; 
				
					?>
					</div>
					<?php
					}
					?>
					<div class="form-wrapper">
						<input id = "formEmail" type="text" name= "email" placeholder="Email Address" class="form-control">
						
					</div>
					<div class="form-wrapper">
					<h4><strong>Gender</strong></h4>
						<select name="gender" id="" class="form-control">
							
							<option value="1">Male</option>
							<option value="0">Female</option>
							
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input id ="password" type="password" name = "password" placeholder="Password" class="form-control">
						
					</div>
					<div class="form-wrapper">
						<input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control">
						
					</div>
					<div class="form-wrapper">
					<h4><strong>Are you a shop Owner Or Customer</strong></h4>
						<select name="is_seller" id="" class="form-control">
							
							<option value="1">Shop Owner</option>
							<option value="0">Customer</option>
							
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/register.js"></script>
	</body>
</html>