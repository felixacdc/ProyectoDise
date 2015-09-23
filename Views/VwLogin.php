<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../font-awesome-4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/animate.css">
</head>
<body>

	<div class="MensajeError animated rubberBand retraso-2">Error al ingresar los datos</div>

	<form name="Logins" action="../CallVwUsers.php" class="animated fadeInDown retraso-6">
	  <h1><span class="fa fa-sign-in"></span><span class="sombra"> Login</span></h1>

	  <button type="button" id="submit" class="button"><span class="fa fa-unlock-alt"></span></button>

	  <span class="fa fa-user inputUserIcon" id="spuser"></span>
	  <input type="text" id="user" class="input" placeholder="Usuario" autocomplete="off"/>

	  <span class="fa fa-key inputPassIcon" id="sppass"></span>
	  <input type="password" id="pass" class="input" placeholder="Contraseña" autocomplete="off"/>

	  <button type="button" class="ocultar button" id="submit2"><span class="fa fa-unlock-alt"></span></button>
	</form>

	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/login.js"></script>
</body>
</html>