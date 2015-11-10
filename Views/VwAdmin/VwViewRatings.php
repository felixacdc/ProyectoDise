<div id="page-inner" class="animated zoomIn retraso-1">
    <div class="row">
        <div class="col-md-12">
         <h2>Visualizacion de Notas</h2>
            <h5>Bienvenido administrador, a visualizacion de notas.</h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active" id="tab-ViewRatings"><a href="#tabViewRatings" data-toggle="tab">ver notas</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">

            <!-- Form Elements Catedraticos-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1"  id="tabViewRatings">
              <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <h3>Consultar Notas de Estudiante</h3>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableViewRatings">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Carnet</th>
                                        <th>Telefono</th>
                                        <th>Usuario</th>
                                        <th>Reinscribir</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php
                                    require_once '../../classes/class.fnFillingTables.php';
                                    require_once '../../classes/class.Connection.php';

                                    $fnFillingTable = new FillingTables();
                                    echo $fnFillingTable->fnFillingViewRatings();
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

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModalViewRatings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h3 class="modal-title" id="myModalLabel">Visualizacion de notas</h3>
      </div>
      <div  >
        <div class="modal-body scrollit" id="contdiv">

          <!-- SELECCION DE CICLO ESCOLAR -->
          <div id="frmSearchOneRatings" class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
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
          </div>

          <br>

          <!-- *************** FORMULARIO 2 *********************** -->
          <div id="frmSearchTwoRatings" class="oculto-T animated bounceInDown">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Primer Bimestre
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="tableBimesterOne">
                      <thead>
                        <tr>
                          <th class="sorting">Curso</th>
                          <th class="sorting">Procedimental</th>
                          <th class="sorting">Actitudinal</th>
                          <th class="sorting">Examen</th>
                          <th class="sorting">Total</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Segundo Bimestre
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="tableBimesterTwo">
                      <thead>
                        <tr>
                          <th class="sorting">Curso</th>
                          <th class="sorting">Procedimental</th>
                          <th class="sorting">Actitudinal</th>
                          <th class="sorting">Examen</th>
                          <th class="sorting">Total</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Tercer Bimestre
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="tableBimesterThree">
                      <thead>
                        <tr>
                          <th class="sorting">Curso</th>
                          <th class="sorting">Procedimental</th>
                          <th class="sorting">Actitudinal</th>
                          <th class="sorting">Examen</th>
                          <th class="sorting">Total</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Cuarto Bimestre
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="tableBimesterFour">
                      <thead>
                        <tr>
                          <th class="sorting">Curso</th>
                          <th class="sorting">Procedimental</th>
                          <th class="sorting">Actitudinal</th>
                          <th class="sorting">Examen</th>
                          <th class="sorting">Total</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary closeModal" data-dismiss="modal">Cerrar</button>
        </div>
     </div>
     </div>
   </div>
</div>


<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- JS Global -->
<script src="../js/ViewRatingsAdmin.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#tableViewRatings').dataTable();
});

</script>
