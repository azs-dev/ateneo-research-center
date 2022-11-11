<?php
session_start();
	include_once 'includes/mydbhandler.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ateneo Research Center</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/seal.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="includes/login.inc.php" method="POST" class="login100-form validate-form flex-sb flex-w">
										<div class="index-logo">
							<img src="images/seal.png" alt="Ateneo Seal">
					</div>	
					<span class="login100-form-title p-b-51">
						Ateneo Research Center
					</span>	
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" name="submit" value="submit">
							Login
						</button>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
						</div>

						<div>
							<a href="pages/signup.php" class="txt1">
								Sign up
							</a>
						</div>
					</div>
							<?php
								$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

								if (strpos($fullUrl, "signup=failed") == true) {
									echo "<p class='failed'>Sign up failed!</p>";
									exit();
								}
								elseif (strpos($fullUrl, "submitting=failed") == true) {
									echo "<p class='failed'>Submission failed!</p>";
									exit();
								}
								elseif (strpos($fullUrl, "signup=success") == true) {
									echo "<p class='success'>Sign up successful!</p>";
									exit();
								}
								elseif (strpos($fullUrl, "application=submitted") == true) {
								echo "<p class='success'>Application submitted!</p>";
								exit();
								}
								elseif (strpos($fullUrl, "usernametaken") == true) {
								echo "<p class='failed'>Username already taken!</p>";
								exit();	
								}
								elseif (strpos($fullUrl, "emailtaken") == true) {
								echo "<p class='failed'>Email already taken!</p>";
								exit();	
								}
								elseif (strpos($fullUrl, "invalidpwduid") == true) {
								echo "<p class='failed'>Invalid Username or Password!</p>";
								exit();	
								}
								elseif (strpos($fullUrl, "nouser") == true) {
								echo "<p class='failed'>Invalid Username or Password!</p>";
								exit();	
								}
								elseif (strpos($fullUrl, "emptyfields") == true) {
								echo "<p class='failed'>Empty fields!</p>";
								exit();	
								}
								elseif (strpos($fullUrl, "nologin") == true) {
								echo "<p class='failed'>You are not logged in!</p>";
								exit();	
								}
								elseif (strpos($fullUrl, "noaccess") == true) {
								echo "<p class='failed'>You can't access this page!</p>";
								exit();	
								}							
							?>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>