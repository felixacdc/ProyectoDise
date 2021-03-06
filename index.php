<?php
  require_once 'classes/class.FnSessions.php';

  session_start();
  if (isset($_SESSION['activado'])) {
  	$OpenSession = new SessionClass();
  	$OpenSession->verifySession('i');
  }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Proyecto</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">



    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	<style>
		.font-v{
			font-size: 14px;
		}
	</style>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">


  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-menu" style="font-size:20px; color:#FFFFFF;"></span>
          </button>
           <img class="hidden-xs hidden-sm logotipo" style="width:40px" src="assets/img/logo.png" alt="">

        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#home" class="smoothScroll">Inicio</a></li>
			<li> <a href="#about" class="smoothScroll"> Acerca De</a></li>
			<li> <a href="#history" class="smoothScroll"> Reseña Historica</a></li>
			<li> <a href="#services" class="smoothScroll">Niveles</a></li>
			<li> <a href="#catedraticos" class="smoothScroll"> Catedráticos</a></li>
			<li> <a href="#contact" class="smoothScroll">Contacto</a></li>
			<li> <a href="Views/VwLogin.php" class="smoothScroll">Login</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>

		<!-- ==== INICIO ==== -->
	    <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
					<img src="assets/img/logo.png" alt="">
	  		 		<p><span>Instituto Mixto de Educación Básica</span></p>
	  		 		<p><span>por Cooperativa</span></p>
	  		 		<h1><span>El Pedregal I</span></h1>
	  		</header>

	    </div><!-- /headerwrap -->

		<!-- ==== ACERDA DE ==== -->
		<div id="greywrap" id="about" name="about">
			<div class="row">
				<div class="col-lg-3 callout">
					<span><img style="width:175px" src="assets/img/mision.png" alt=""></span>
					<p class="text-justify font-v">Educar al individuo para que pueda desenvolverse justa y dignamente en una sociedad que exige cambios. Propiciar las oportunidades de capacitación docente para mejorar el servicio educativo.</p>
				</div><!-- col-lg-4 -->

				<div class="col-lg-3 callout">
					<span><img style="width:175px" src="assets/img/vision.png" alt=""></span>
					<p class="text-justify font-v">El Instituto Mixto de Educación Básica por Cooperativa El “Pedregal”  I, como entidad educativa, presta sus servicios con el propósito de mejorar el nivel académico y la formación Personal de la población estudiantil, para lograr el perfil del hombre que pueda resolver sus propios problemas y un ente productivo de la sociedad.</p>
				</div><!-- col-lg-4 -->

				<div class="col-lg-3 callout">
					<span><img style="width:175px" src="assets/img/metas.png" alt=""></span>
					<p class="text-justify font-v"><strong>•</strong> Visión Brindar docencia  de  calidad en  un  100%  con  personal  altamente  calificado.</br>
					<strong>•</strong> Contribuir diariamente a fortalecer  los valores morales, cívicos y espirituales.</br>
					<strong>•</strong> Lograr  en un 100% al final del ciclo básico estudiantes proactivos y  productivos  para   su comunidad.</br>
					<strong>•</strong> Fomentar el  respeto diariamente a las  culturas e idiomas mayas de nuestro país.</p>
				</div><!-- col-lg-4 -->

				<div class="col-lg-3 callout">
					<span><img style="width:175px" src="assets/img/politicas.png" alt=""></span>
					<p class="text-justify font-v"><strong>•</strong> Brindar servicio educativo con personal altamente calificado, a la población estudiantil no importando su condición económica.</br>
					<strong>•</strong> Fomentar valores morales, cívicos y espirituales para fortalecer la convivencia, la paz, y la formación ciudadana para mejorar la calidad humana.</br>
					<strong>•</strong> Brindar al estudiante conocimientos teóricos  y prácticas en el área de productividad y desarrollo para ofrecer  a la comunidad retalteca mano de obra semi-calificada.</br>
					<strong>•</strong> Formar jóvenes, emprendedores, proactivos  y responsablemente productivos para una mejor calidad de vida.</br>
					<strong>•</strong> Valorar la interculturalidad  y  lo multilingüe en la región donde desarrolle su convivencia estudiantil y laboral.</p>
				</div><!-- col-lg-4 -->
			</div><!-- row -->
		</div><!-- greywrap -->

		<!-- ==== HISTORIA ==== -->
		<div class="container" id="history" name="history">
			<div class="row white">
			<br>
				<h1 class="centered text-primary"><strong>Reseña Historica</strong></h1>
				<hr>

				<div class="col-lg-6 text-justify">
					<p>El Instituto Mixto de Educación Básica por Cooperativa el Pedregal I, ha brindado a la población Retalteca servicios educativos desde el año 1997, fundado a raíz de la necesidad de una institución educativa de nivel medio para que esta contribuyera con el desarrollo académico de los jóvenes de la zona 6 y áreas aledañas de la comunidad de Retalhuleu. Los padres de familia y las autoridades correspondientes se organizan y dan inicio a los procesos respectivos para su creación. La institución privada es avalada por el Licenciado Allan Morán Hurtado con el visto bueno del Licenciado Antonio Garay, Director Regional de Educación con el oficio 10-97 de enero de 1997, he inicia procesos educativos en las instalaciones de la Escuela Oficial Urbana Mixta El Pedregal I.</p>
				</div><!-- col-lg-6 -->

				<div class="col-lg-6 text-justify">
					<p>En el año 1998 según el Acuerdo Ministerial No. 32 de fecha 19 de febrero de 1998, la Ministra de Educación Arabella Castro Quiñonez, autoriza el funcionamiento del establecimiento como Instituto Básico por Cooperativa “El Pedregal I”. Para su funcionamiento se autoriza la subvención económica del Gobierno Central, Municipalidad y Aportes de Padres de Familia, denominándosele a este tipo de financiamiento Plan Tripartito.</p>
				</div><!-- col-lg-6 -->
			</div><!-- row -->
		</div><!-- container -->

		<!-- ==== NIVELES ACADEMICOS==== -->
		<div class="container" id="services" name="services">
			<br>
			<br>
			<div class="row">
				<h2 class="centered text-primary"><strong>Ciclos Nivel Medio</strong></h2>
				<hr>
				<br>
				<div class="col-lg-offset-2 col-lg-8">
					<div class="col-md-4 text-center">
						<h3 class="text-warning"><strong>Primero Básico</strong></h3>
						<hr>
						<p class="text-primary"><strong>Listado de Cursos</strong></p>
						<p>Idioma Español 1</p>
						<p>Matemáticas 1</p>
						<p>Ciencias Naturales 1</p>
						<p>Ciencias Sociales 1</p>
						<p>Formación Musical 1</p>
						<p>Artes Plásticas 1</p>
						<p>Teatro y Danza 1</p>
						<p>Productividad y Desarrollo 1</p>
						<p>Educacion para el Hogar 1</p>
						<p>Idioma Ingles 1</p>
						<p>Contabilidad General 2</p>
						<p>Educación Física 1</p>
					</div>
					<div class="col-md-4 text-center">
						<h3 class="text-warning"><strong>Segundo Básico</strong></h3>
						<hr>
						<p class="text-primary"><strong>Listado de Cursos</strong></p>
						<p>Idioma Español 2</p>
						<p>Matemáticas 2</p>
						<p>Ciencias Naturales 2</p>
						<p>Ciencias Sociales 2</p>
						<p>Formación Musical 2</p>
						<p>Artes Plásticas 2</p>
						<p>Teatro y Danza 2</p>
						<p>Productividad y Desarrollo 2</p>
						<p>Educación para el Hogar 2</p>
						<p>Idioma Ingles 2</p>
						<p>Contabilidad General 2</p>
						<p>Educación Física 2</p>
					</div>
					<div class="col-md-4 text-center">
						<h3 class="text-warning"><strong>Tercero Básico</strong></h3>
						<hr>
						<p class="text-primary"><strong>Listado de Cursos</strong></p>
						<p>Idioma Español 3</p>
						<p>Matemáticas 3</p>
						<p>Ciencias Naturales 3</p>
						<p>Ciencias Sociales 3</p>
						<p>Formación Musical 3</p>
						<p>Artes Plásticas 3</p>
						<p>Teatro y Danza 3</p>
						<p>Productividad y Desarrollo 3</p>
						<p>Educación para el Hogar 3/p>
						<p>Idioma Ingles 3</p>
						<p>Contabilidad General 3</p>
						<p>Educación Física 3</p>
					</div>
				</div><!-- col-lg -->
			</div><!-- row -->

		<!-- ==== CATEDRATICOS ==== -->
		<div class="container" id="catedraticos" name="catedraticos">
		<br>
			<div class="row white centered">
				<h1 class="centered text-primary"><strong>Equipo de Catedráticos</strong></h1>
				<hr>
				<br>
				<br>
				<div class="col-lg-3 centered">
					<img class="img img-circle" src="assets/img/team/team01.jpg" height="120px" width="120px" alt="">
					<br>
					<h4><b>Mauricio Lopez</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Catedrático de Matemáticas y Física Fundamental, graduado en la Universidad San Carlos, con una Licenciatura en Matemáticas y Fisica Fundamental.</p>
				</div><!-- col-lg-3 -->

				<div class="col-lg-3 centered">
					<img class="img img-circle" src="assets/img/team/team02.jpg" height="120px" width="120px" alt="">
					<br>
					<h4><b>Timoteo Quijivir</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Catedrático Educacion Musical, graduado en Conservatorio Nacional, con una Licenciatura en Educacion Musical y Artes Escenicas.</p>
				</div><!-- col-lg-3 -->

				<div class="col-lg-3 centered">
					<img class="img img-circle" src="assets/img/team/team03.jpg" height="120px" width="120px" alt="">
					<br>
					<h4><b>Mishel Galindo Rodas</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Maestra de Educacion para el Hogar, con un Profesorado en Enseñanza Media de Universidad del Valle.</p>
				</div><!-- col-lg-3 -->

				<div class="col-lg-3 centered">
					<img class="img img-circle" src="assets/img/team/team04.jpg" height="120px" width="120px" alt="">
					<br>
					<h4><b>Roberto Lopez Alvarado</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Catedratico de computación, graduado en la Universidad Mariano Galvez, con una Ingenieria en Sistemas.</p>
				</div><!-- col-lg-3 -->

			</div><!-- row -->
		</div><!-- container -->

		<!-- CONTACTOS -->
		<div class="container" id="contact" name="contact">
			<div class="row">
			<br>
				<h1 class="centered text-primary"><STRONG>CONTECTANOS</STRONG></h1>
				<hr>
				<br>
				<br>
				<div class="col-lg-6">
					<h3>Información de Contacto</h3>
					<p><span class="icon icon-home"></span> 11 avenida y 06 Calle Zona 6, Colonia Villas del Pedregal I, Retalhuleu.<br/>
						<span class="icon icon-phone"></span> +34 9884 4893 <br/>
						<span class="icon icon-mobile"></span> +34 59855 9853 <br/>
						<span class="icon icon-envelop"></span> <a href="#">  institutopedregal@hotmail.com</a> <br/>
						<span class="icon icon-twitter"></span> <a href="#"> @blacktie_co </a> <br/>
						<span class="icon icon-facebook"></span> <a href="#"> BlackTie Agency </a> <br/>
					</p>
				</div><!-- col -->

				<div class="col-lg-6">
					<h3>Escribanos</h3>
					<p class="text-justify">Si esta interesado en información sobre nuestra institucion, puede llenar el formulario que se encuentra abajo con los datos solicitados, posteriormente uno de nuestros encargados estara comunicandoce con usted.   ¡Gracias!</p>
					<p>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<form class="form-horizontal" role="form">
						  		<div class="form-group">
						    		<label for="inputEmail1" class="col-lg-4 control-label"></label>
						    		<div class="col-lg-10">
						      			<input type="email" class="form-control" id="inputEmail1" placeholder="Email">
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label for="text1" class="col-lg-4 control-label"></label>
						    		<div class="col-lg-10">
						      			<input type="text" class="form-control" id="text1" placeholder="Your Name">
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<div class="col-lg-10">
						      			<button type="submit" class="btn btn-success">Sign in</button>
						    		</div>
						  		</div>
					   		</form><!-- form -->
						</div>
						<div class="col-md-2"></div>
					</p>
				</div><!-- col -->
			</div><!-- row -->

		</div><!-- container -->

		<div id="footerwrap">
			<div class="container">
				<h4>Created by <a href="http://blacktie.co">BlackTie.co</a> - Copyright 2014</h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  <script type="text/javascript">
    localStorage.clear();
  </script>
  </body>
</html>
