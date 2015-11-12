<div id="page-inner" class="animated zoomIn retraso-1">
    <div class="row">
        <div class="col-md-12">
         <h2>Mantenimiento de Catedraticos</h2>
            <h5>Bienvenido director, al mantenimiento de catedraticos. </h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tabProfe" data-toggle="tab">Profeciones</a></li>
            <li role="presentation" id="tab-Cat"><a href="#tabCat" data-toggle="tab">Catedraticos</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">
            <!-- Form Elements Profeciones-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1" id="tabProfe">
                <!-- <div class="panel-heading">
                    Formulario de mantenimiento grados
                </div> -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">

                            <h3>Registro Profeciones</h3>
                            <hr>

                            <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmProfe">
                                <div class="form-group" id="ErrorProdiv">
                                  <label class="control-label control-label-input-group" id="ErrorProlbl" for="ErrorProlbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                      <input type="text" name="NomPro" class="form-control" id="txtPro" placeholder="Nombre de la Profecion" autocomplete="off">
                                  </div>
                                </div>

                                <input type="hidden" name="frm" value="frmProfecion"/>

                                <button type="button" class="btn btn-danger" id="buttonPro" >Registrar</button>
                            </form>

                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-8">

                        <h3 class="text-center">Mantenimientos Profesiones</h3><br>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableProfession">
                                <thead>
                                    <tr>
                                        <th>Profesiones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    require_once '../../classes/class.fnFillingTables.php';
                                    require_once '../../classes/class.Connection.php';

                                    $fnFillingTable = new FillingTables();
                                    echo $fnFillingTable->fnFillingProfessions();
                                   ?>

                                </tbody>
                            </table>
                        </div>

                      </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements Profeciones -->

            <!-- Form Elements Catedraticos-->
            <div class="panel panel-default tab-pane animated rollIn retraso-1 " id="tabCat">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                      <h3>Registro Catedraticos</h3>
                      <hr>

                      <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmCat">

                        <div class="form-group" id="ErrorCatdiv">
                          <label class="control-label control-label-input-group" id="ErrorCatlbl" for="ErrorCatlbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-male"></i></span>
                              <input type="text" name="NomCat" class="form-control" id="txtCat" placeholder="Nombre del Catedratico" autocomplete="off">
                          </div>
                        </div>

                        <!-- Ingreso de Direccion catedratico -->
                        <div class="form-group" id="ErrorDirCadiv">
                          <label class="control-label control-label-input-group" id="ErrorDirCalbl" for="ErrorDirCalbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                              <input type="text" name="AddressCat" class="form-control" id="txtAddressCat" placeholder="Direccion Catedratico" autocomplete="off">
                          </div>
                        </div>

                        <!-- Ingreso de Telefono catedratico-->
                        <div class="form-group" id="ErrorTelCadiv">
                          <label class="control-label control-label-input-group" id="ErrorTelCalbl" for="ErrorTelCalbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                              <input type="text" name="PhoneCat" class="form-control" id="txtPhoneCat" placeholder="Telefono Catedratico" autocomplete="off">
                          </div>
                        </div>

                        <!-- Ingreso de Email catedratico-->
                        <div class="form-group" id="ErrorEmaCadiv">
                          <label class="control-label control-label-input-group" id="ErrorEmaCalbl" for="ErrorEmaCalbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-at"></i></span>
                              <input type="text" name="EmailCat" class="form-control" id="txtemailCat" placeholder="Email Catedratico" autocomplete="off">
                          </div>
                        </div>

                        <div class="form-group" id="ErrorCprodiv">
                          <label class="control-label control-label-input-group" id="ErrorCprolbl" for="ErrorCprolbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                              <SELECT NAME="cbopro" class="form-control" SIZE=0 id="cbopro" placeholder="Plan"></SELECT>
                          </div>
                        </div>

                        <input type="hidden" name="frm" value="frmCatedratico"/>

                        <button type="button" class="btn btn-danger" id="buttonCat" >Registrar</button>
                      </form>
                    </div>
                  </div>

                  <hr>

                  <div class="row" style="overflow: auto;">
                    <div class="col-md-12" style="overflow: auto;">

                      <h3 class="text-center">Mantenimientos Catedraticos</h3><br>

                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="tableTeacher">
                              <thead>
                                  <tr>
                                    <th>Nombres</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Profesion</th>
                                    <th>Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  require_once '../../classes/class.fnFillingTables.php';
                                  require_once '../../classes/class.Connection.php';

                                  $fnFillingTable = new FillingTables();
                                  echo $fnFillingTable->fnFillingTeachers();
                                 ?>

                              </tbody>
                          </table>
                      </div>

                    </div>
                  </div>


              </div>
              </div>
              <!-- End Form Elements Catedraticos -->

          </div>
          <!-- END CONTENT-TABS -->
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#tableProfession').dataTable();
    $('#tableTeacher').dataTable();
});

</script>
