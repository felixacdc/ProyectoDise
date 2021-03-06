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
    <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <img src="../assets/img/LogoProyecto.png">
                <!-- <?php echo '<strong style="color: black">Fecha: </strong>', date('d-M-Y',time()); ?> &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> -->
            </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
					</li>


                    <li class="cursor">
                        <a id="op1"><i class="fa fa-odnoklassniki fa-3x"></i>Inscripcion</a>
                    </li>
                    <li class="cursor">
                        <a id="opRi"><i class="fa fa-refresh fa-3x"></i>Reinscripcion</a>
                    </li>
                    <li class="cursor">
                        <a id="op4"><i class="fa fa-money fa-3x"></i>Pagos</a>
                    </li>
                    <li  class="cursor">
                      <a id="op6"><i class="fa fa-star fa-3x"></i>Ver Notas</a>
                  </li>
                  <li class="cursor">
                     <a id="opManStudents"><i class="fa fa-user fa-3x"></i>Estudiantes</a>
                 </li>
                     <li class="cursor">
                        <a id="op2"><i class="fa fa-graduation-cap fa-3x"></i>Grados</a>
                    </li>
                    <li class="cursor">
                        <a id="op3"><i class="fa fa-user-secret fa-3x"></i>Catedraticos</a>
                    </li>
                      <li class="cursor">
                        <a  id="op5"><i class="fa fa-clone fa-3x"></i>Cursos</a>
                    </li>
                    <li class="cursor">
                        <a id="CloseSession"><i class="fa fa-sign-out fa-3x"></i>cerrar sesión</a>
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
     		       <h3 class="modal-title" id='myModalLabel'></h3>
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

      <div class="modal fade" id="myModalManStudents"  data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h3 class="modal-title">Datos Estudiantes</h3>
            </div>
              <div class="modal-body scrollit">
                <div class="row">
                  <div class="col-md-1">
                  </div>
                  <div class="col-md-10">
                    <!-- contenido modal -->
                    <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmReinscription">

                        <input type="hidden" name="idStudent" value="" id="txtidStudent"/>

                        <!-- Ingreso de Nombre Estudiante -->
                          <div class="form-group" id="ErrorNomSdiv">
                            <label class="control-label control-label-input-group" id="ErrorNomSlbl" for="ErrorNomSlbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="NameS" class="form-control" id="txtNameS" placeholder="Nombre Estudiante" autocomplete="off">
                            </div>
                          </div>

                          <!-- Ingreso de Direccion Estudiante -->
                          <div class="form-group" id="ErrorDirSdiv">
                            <label class="control-label control-label-input-group" id="ErrorDirSlbl" for="ErrorDirSlbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" name="AddressS" class="form-control" id="txtAddressS" placeholder="Direccion Estudiante" autocomplete="off">
                            </div>
                          </div>

                          <!-- Ingreso de Telefono Estudiante-->
                          <div class="form-group" id="ErrorTelSdiv">
                            <label class="control-label control-label-input-group" id="ErrorTelSlbl" for="ErrorTelSlbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                <input type="text" name="PhoneS" class="form-control" id="txtPhoneS" placeholder="Telefono Estudiante" autocomplete="off">
                            </div>
                          </div>

                          <!-- Ingreso de Email Estudiante-->
                          <div class="form-group" id="ErrorEmaSdiv">
                            <label class="control-label control-label-input-group" id="ErrorEmaSlbl" for="ErrorEmaSlbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                <input type="text" name="EmailS" class="form-control" id="txtemailS" placeholder="Email Estudiante" autocomplete="off">
                            </div>
                          </div>

                          <div class="form-group" id="ErrorEstadodiv">
                            <label class="control-label control-label-input-group" id="ErrorEstadolbl" for="ErrorEstadolbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <SELECT NAME="cboEstado" class="form-control" SIZE=0 id="cboEstado" ></SELECT>
                            </div>
                          </div>


                          <input type="hidden" name="conditional" value="frmManStudents"/>

                    </form>

                  </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnModalR">Aceptar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancelar</button>
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
    <!-- JS Mantenimiento Cursos -->
    <script src="../js/jsCourse.js"></script>
    <!-- JS Mantenimiento De Tablas -->
    <script src="../js/jsMaintenanceOfTables.js"></script>


    <!-- *************** Fin JS personales ***************** -->

      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <!-- <script src="../assets/js/morris/morris.js"></script> -->
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
