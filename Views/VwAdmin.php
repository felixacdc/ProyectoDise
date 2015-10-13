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
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <style media="screen">
    #logo{
      /*background-color:#A70303;*/
      background-color: #FFFFFF;
      height: auto;
    }
  </style>

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


                    <li>
                        <a class="active-menu"  href="VwUser.php"><i class="fa fa-dashboard fa-3x"></i>Inscripcion</a>
                    </li>
                     <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                    </li>
						   <li  >
                        <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
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
        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                         <h2>Inscripcion de alumnos</h2>   
                            <h5>Bienvenido director, a inscribir a alumnos. </h5>
                           
                        </div>
                    </div>
                     <!-- /. ROW  -->
                     <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Form Elements -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Formulario de inscripcion
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">                            
                                        </div>
                                        <div class="col-md-6">    
                                            
                                            <form action="actionrecord.php" name="Registro" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <!-- ******** Datos Estudiante ********* -->
                                            <h3>Datos Encargado</h3>
                                            <hr>
                                            <!-- Ingreso de Nombre Encargado -->
                                              <div class="form-group" id="ErrorNomdiv">
                                                <label class="control-label control-label-input-group" id="ErrorNomlbl" for="inputError1"></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="NameE" class="form-control" id="txtNameE" placeholder="Nombre Encargado" autocomplete="off">
                                                </div>
                                              </div>

                                              <!-- Ingreso de Direccion encargado -->
                                              <div class="form-group" id="ErrorApdiv">
                                                <label class="control-label control-label-input-group" id="ErrorAplbl" for="inputError2"></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="AddressE" class="form-control" id="txtAddressE" placeholder="Direccion Encargado" autocomplete="off">
                                                </div>
                                              </div>

                                              <!-- Ingreso de Telefono Encargado-->
                                              <div class="form-group" id="ErrorTeldiv">
                                                <label class="control-label control-label-input-group" id="ErrorTellbl" for="inputError2"></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                                    <input type="text" name="PhoneE" class="form-control" id="txtPhoneE" placeholder="Telefono Encargado" autocomplete="off">
                                                </div>
                                              </div>

                                              <!-- Ingreso de Email Encargado-->
                                              <div class="form-group" id="ErrorEmadiv">
                                                <label class="control-label control-label-input-group" id="ErrorEmalbl" for="inputError2"></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                                    <input type="text" name="EmailE" class="form-control" id="txtemailE" placeholder="Email Encargado" autocomplete="off">
                                                </div>
                                              </div>

                                              <!-- ******** Datos Estudiante ********* -->
                                                <h3>Datos Estudiantes</h3>
                                                <hr>
                                                <!-- Ingreso de Nombre Encargado -->
                                                  <div class="form-group" id="ErrorNomdiv">
                                                    <label class="control-label control-label-input-group" id="ErrorNomlbl" for="inputError1"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input type="text" name="NameS" class="form-control" id="txtNameS" placeholder="Nombre Estudiante" autocomplete="off">
                                                    </div>
                                                  </div>

                                                  <!-- Ingreso de Direccion encargado -->
                                                  <div class="form-group" id="ErrorApdiv">
                                                    <label class="control-label control-label-input-group" id="ErrorAplbl" for="inputError2"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input type="text" name="AddressS" class="form-control" id="txtAddressS" placeholder="Direccion Estudiante" autocomplete="off">
                                                    </div>
                                                  </div>

                                                  <!-- Ingreso de Telefono Encargado-->
                                                  <div class="form-group" id="ErrorTeldiv">
                                                    <label class="control-label control-label-input-group" id="ErrorTellbl" for="inputError2"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                                        <input type="text" name="PhoneS" class="form-control" id="txtPhoneS" placeholder="Telefono Estudiante" autocomplete="off">
                                                    </div>
                                                  </div>

                                                  <!-- Ingreso de Email Encargado-->
                                                  <div class="form-group" id="ErrorEmadiv">
                                                    <label class="control-label control-label-input-group" id="ErrorEmalbl" for="inputError2"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                                        <input type="text" name="EmailS" class="form-control" id="txtemailS" placeholder="Email Estudiante" autocomplete="off">
                                                    </div>
                                                  </div>

                                                  <!-- Ingreso de Grado -->
                                                  <div class="form-group" id="ErrorPladiv">
                                                    <label class="control-label control-label-input-group" id="ErrorPlalbl" for="inputError2"></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-language"></i></span>
                                                        <SELECT NAME="cboGrado" class="form-control" SIZE=0 id="cboGrado" placeholder="Grado"></SELECT>
                                                    </div>
                                                  </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3">                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- End Form Elements -->
                        </div>
                    </div>
                </div>
             <!-- /. PAGE INNER  -->
            </div>
        <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- JS Admin -->
    <script src="../js/js.Admin.js"></script>
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
