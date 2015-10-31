<?php
  require_once '../classes/class.FnSessions.php';

  $OpenSession = new SessionClass();
  $OpenSession->verifySession(1);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/Admin.css" media="screen" title="no title" charset="utf-8">
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- Animate y font-->
    <link rel="stylesheet" href="../font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
     <!-- GOOGLE FONTS-->
   <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->

</head>
<body>
    <div id="wrapper">
        <nav id="logo" class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="VwUser.php" style="color: write; background-color: #202020">Bienvenido</a>
                <!-- <a class="navbar-brand" href="VwAdmin.php" style="color: write; font-size:25px; background-color: #202020">Bienvenido</a> -->
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float:right; font-size: 16px;">
                <img src="../assets/img/LogoProyecto.png" id="CloseSession">
                <!-- <?php echo '<strong style="color: black">Fecha: </strong>', date('d-M-Y',time()); ?> &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> -->
            </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/userFem.png" class="user-image img-responsive"/>
					</li>


                    <li class="cursor">
                        <a id="op1"><i class="fa fa-odnoklassniki fa-3x"></i>Inscripcion</a>
                    </li>
                     <li class="cursor">
                        <a id="op2"><i class="fa fa-graduation-cap fa-3x"></i>Mantenimiento Grados</a>
                    </li>
                    <li class="cursor">
                        <a id="op3"><i class="fa fa-user-secret fa-3x"></i>Mantenimientos Catedraticos</a>
                    </li>
						        <li>
                        <a id="op4"><i class="fa fa-money fa-3x"></i>Pagos</a>
                    </li>
                      <li  >
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                      </li>
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>
                </ul>

            </div>

        </nav>


        <div class="alert alert-info animated bounceIn retraso-2" role="alert" id="alert"></div>
        <div class="alert alert-danger animated bounceIn retraso-2" role="alert" id="alertE"></div>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >

        </div>
        <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

     <!-- Modal -->
     	<div class="modal fade" id="myModal"  data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     		<div class="modal-dialog">
     		   <div class="modal-content">
     		     <div class="modal-header">
     		       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
     		       <h3 class="modal-title" id="myModalLabel"></h3>
     		    </div>
     		    <div  >
     			    <div class="modal-body scrollit" id="myModalContenido">
     			        <!-- contenido modal -->
     			    </div>
     			    <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnModalA">Aceptar</button>
     			    	<button type="button" class="btn btn-primary" data-toggle="modal" id="btnModalC">Cancelar</button>
     			    </div>
     		   </div>
     		   </div>
     		 </div>
     	</div>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>

    <!-- *************** JS personales ********************* -->

    <!-- JS Admin -->
    <script src="../js/js.Admin.js"></script>
    <!-- JS Inscripcion -->
    <script src="../js/jsInscripcion.js"></script>
    <!-- JS Mantenimiento Grados -->
    <script src="../js/jsMantGrados.js"></script>
    <!-- JS Mantenimiento Catedraticos -->
    <script src="../js/jsMantCat.js"></script>
    <!-- JS Mantenimiento Pagos -->
    <script src="../js/jsPagos.js"></script>
    <!-- *************** Fin JS personales ***************** -->

      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
