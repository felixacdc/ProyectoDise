<div id="page-inner" class="animated zoomIn retraso-1">
    <div class="row">
        <div class="col-md-12">
         <h2>Mantenimiento de Notas</h2>
            <h5>Bienvenido catedratico, a la visualizacion de notas.</h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active" id="tab-ViewRatings"><a href="#tabViewRatings" data-toggle="tab">Ver notas</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">

            <!-- Form Elements Catedraticos-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1"  id="tabViewRatings">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                      <h3>Consultar notas</h3>
                      <hr>

                      <div id="frmSearchOne">
                        <!-- Ingreso de ciclo escolar -->
                        <div class="form-group" id="ErrorCEdiv">
                          <label class="control-label control-label-input-group" id="ErrorCElbl" for="ErrorCElbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                              <SELECT NAME="cboCE" class="form-control" SIZE=0 id="cboCE" ></SELECT>
                          </div>
                        </div>

                        <button type="button" class="btn btn-danger" id="btnSearchCe">Buscar</button>
                      </div>


                      <!-- *************** FORMULARIO 2 *********************** -->
                      <div id="frmSearchTwo" class="oculto-T animated bounceInDown">
                        <!-- Ingreso de Grado -->
                        <div class="form-group" id="ErrorAsiGRdiv">
                          <label class="control-label control-label-input-group" id="ErrorAsiGRlbl" for="ErrorAsiGRlbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-language"></i></span>
                              <SELECT NAME="cboAsiGR" class="form-control" multiple SIZE=0 id="cboAsiGR" ></SELECT>
                          </div>
                        </div>

                        <button type="button" class="btn btn-danger" id="btnSearchTwo">Buscar</button>
                      </div>


                      <!-- *************** FORMULARIO 3 *********************** -->
                      <div id="frmSearchThree" class="oculto-T animated bounceInDown">
                        <!-- Ingreso de curo -->
                        <div class="form-group" id="ErrorCboCoursediv">
                          <label class="control-label control-label-input-group" id="ErrorCboCourselbl" for="ErrorCboCourselbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-clone"></i></span>
                              <SELECT NAME="CboCourse" class="form-control" multiple SIZE=0 id="CboCourse" ></SELECT>
                          </div>
                        </div>

                        <!-- Ingreso de Bimestre -->
                        <div class="form-group" id="ErrorBimesterdiv">
                          <label class="control-label control-label-input-group" id="ErrorBimesterlbl" for="ErrorBimesterlbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                              <SELECT NAME="cboBimester" class="form-control" SIZE=0 id="cboBimester" ></SELECT>
                          </div>
                        </div>

                        <button type="button" class="btn btn-danger" id="btnSearchThreeView">Buscar</button>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- *************** Notas *********************** -->
                      <div id="frmAddRatings" class="oculto-T animated bounceInDown">
                        <h3 id="materia"></h3><br>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="tableRatings">
                          <thead>
                            <tr>
                              <th class="sorting">Estudiante</th>
                              <th class="sorting">Procedimental</th>
                              <th class="sorting">Actitudinal</th>
                              <th class="sorting">Examen</th>
                              <th class="sorting">Total</th>
                            </tr>
                          </thead>

                          <tbody>
                          </tbody>
                        </table>
                        <button type="button" class="btn btn-danger" id="btnViewRatings">Aceptar</button>
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
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
