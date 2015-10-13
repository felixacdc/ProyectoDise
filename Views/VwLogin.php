<?php
  require_once '../classes/class.FnSessions.php';

  session_start();
  if (isset($_SESSION['activado'])) {
  	$OpenSession = new SessionClass();
  	$OpenSession->verifySession('h');	
  }
?>
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

	<form name="Logins" action="../Functions/CallVwUsers.php" class="animated fadeInDown retraso-6" method="post">
	  <h1><span class="fa fa-sign-in"></span><span class="sombra"> Login</span></h1>

	  <button type="button" id="submit" class="button"><span class="fa fa-unlock-alt"></span></button>

	  <span class="fa fa-user inputUserIcon" id="spuser"></span>
	  <input type="text" id="user" class="input" placeholder="Usuario" autocomplete="off"/>

	  <span class="fa fa-key inputPassIcon" id="sppass"></span>
	  <input type="password" id="pass" class="input" placeholder="Contraseña" autocomplete="off"/>
		<input type="hidden" name='hiddenValue' id="hiddenValue" value="0">

	  <button type="button" class="ocultar button" id="submit2"><span class="fa fa-unlock-alt"></span></button>
	</form>

	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/login.js"></script>
</body>
</html>
