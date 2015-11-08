<div id="page-inner" class="animated zoomIn retraso-1">
  <!-- Alertas -->


  <!-- Fin de alertas -->
    <div class="row">
        <div class="col-md-12">
         <h2>Mantenimiento de grados</h2>
            <h5>Bienvenido director, al mantenimiento de grados. </h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tabGrad" data-toggle="tab" id="tab-G">Grados</a></li>
            <li role="presentation"><a href="#tabSec" data-toggle="tab" id="tab-S">Secciones</a></li>
            <li role="presentation"><a href="#tabAsig" data-toggle="tab" id="tab-AGS">Asignacion de Secciones</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">
            <!-- Form Elements GRADO-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1 " id="tabGrad">
                <!-- <div class="panel-heading">
                    Formulario de mantenimiento grados
                </div> -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">

                            <h3>Registro Grado</h3>
                            <hr>

                            <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmGrado">
                                <div class="form-group" id="ErrorGradiv">
                                  <label class="control-label control-label-input-group" id="ErrorGralbl" for="ErrorGralbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                      <input type="text" name="txtGradE" class="form-control" id="txtGrad" placeholder="Nombre Del Grado" autocomplete="off">
                                  </div>
                                </div>

                                <input type="hidden" name="frm" value="frmGrado"/>

                                <button type="button" class="btn btn-danger" id="buttonG" >Registrar</button>
                            </form>

                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-10">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Grados</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    require_once '../../classes/class.fnFillingTables.php';
                                    require_once '../../classes/class.Connection.php';

                                    $fnFillingTable = new FillingTables();
                                    echo $fnFillingTable->fnFillingDegree();
                                   ?>

                                </tbody>
                            </table>
                        </div>

                      </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements GRADOS -->

            <!-- Form Elements Seccion-->
            <div class="panel panel-default tab-pane animated rollIn retraso-1 " id="tabSec">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                      <h3>Registro Secciones</h3>
                      <hr>

                      <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmSec">
                        <div class="form-group" id="ErrorSecdiv">
                          <label class="control-label control-label-input-group" id="ErrorSeclbl" for="ErrorSeclbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                              <input type="text" name="NameS" class="form-control" id="txtSec" placeholder="Nombre De La Seccion" autocomplete="off">
                          </div>
                        </div>

                        <input type="hidden" name="frm" value="frmSeccion"/>

                        <button type="button" class="btn btn-danger" id="buttonS" >Registrar</button>
                      </form>
                    </div>
                  </div>
              </div>
              </div>
              <!-- End Form Elements SECCIONES -->

              <!-- Form Elements Asginacion Seccion-->
              <div class="panel panel-default tab-pane animated rollIn retraso-1 " id="tabAsig">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-6">
                        <h3>Asignacion de Secciones</h3>
                        <hr>

                        <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmRegAsiGS">
                          <div class="form-group" id="ErrorCboGdiv">
                            <label class="control-label control-label-input-group" id="ErrorCboGlbl" for="ErrorCboGlbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                <SELECT NAME="cboGrado" class="form-control" SIZE=0 id="cboGrado" ></SELECT>
                            </div>
                          </div>

                          <div class="form-group" id="ErrorCboSecdiv">
                            <label class="control-label control-label-input-group" id="ErrorCboSeclbl" for="ErrorCboSeclbl"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                                <SELECT NAME="cboseccion" class="form-control" SIZE=0 id="cboseccion"></SELECT>
                            </div>
                          </div>

                          <input type="hidden" name="frm" value="frmAsignacionSeccion"/>

                          <button type="button" class="btn btn-danger" id="buttonASG" >Registrar</button>
                        </form>
                      </div>
                    </div>
                </div>
                </div>
                <!-- End Form Elements Asignacion Seccion -->
          </div>
          <!-- END CONTENT-TABS -->
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#dataTables-example').dataTable();
});
