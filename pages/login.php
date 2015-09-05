<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/login.css">
	<style>
		body{
			background:url("../assets/img/header_login.jpg");
		}
		.sombra{
			text-shadow: black 0.1em 0.1em 0.1em;
		}
	</style>
	<link rel="stylesheet" href="../font-awesome-4.4.0/css/font-awesome.min.css">
</head>
<body>
	<form action="">
	  <h1><span class="fa fa-sign-in"></span><span class="sombra"> Login</span></h1>
	  <button class="submit"><span class="fa fa-unlock-alt"></span></button>
	  <span class="fa fa-user inputUserIcon"></span>
	  <input type="text" class="user" placeholder="ursername"/>
	  <span class="fa fa-key inputPassIcon"></span>
	  <input type="password" class="pass"placeholder="password"/>
	</form>
	
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/login.js"></script>
</body>
</html>