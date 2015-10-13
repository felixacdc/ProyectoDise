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
