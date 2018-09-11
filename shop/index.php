<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#5a5252">
	<div class="" bgcolor="green">
		<center>
			<?php 
				include "connection.php";
				if(isset($_POST['login_but'])){
					extract($_POST);
					// echo "if";
					$e_pass = sha1($user_pass);
					$q = "SELECT user_email,user_pass from user where user_email='$user_email' and user_pass='$e_pass'";
					$r_q = mysqli_query($con,$q) or die(mysqli_error($con));
					$count = mysqli_num_rows($r_q);
					if($count >= 1){
						echo "<script> alert('login successfully!') </script>";
						echo "<script> window.open('home.php','_self') </script>";
						session_start();
						
					}else{
						echo "wrong email or password";
					}
				}
			 ?>
			<form id="form" method="post" action="">
			Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="user_email" placeholder="enter your name" required><br>
			Password:<input type="password" name="user_pass" placeholder="enter your password" required><br>
			<input type="submit" value="login" name="login_but">
		<hr><br>Devloped By : Sajjad Balouch
			<span class="develop">Php Web Developer </span>
			<span class="develop">ph# : 0307-8617447	</span>
	</form>

		</center>
	</div>
	
</body>
</html>