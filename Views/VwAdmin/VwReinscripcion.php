<div id="page-inner" class="animated zoomIn retraso-1">
  <div class="row">
      <div class="col-md-12">
       <h2>Reinscripcion de alumnos</h2>
          <h5>Bienvenido director, a Reinscripcion de alumnos. </h5>

      </div>
  </div>

  <hr />

  <div class="row">
      <div class="col-md-12">

        <!-- TABS -->
        <ul class="nav nav-tabs">
          <li role="presentation" id="tab-Reinscripcion" class="active"><a href="#tabReinscripcion" data-toggle="tab">Reinscripcion</a></li>
        </ul>
        <!-- END TABS -->

        <!-- BEGIN CONTENT-TABS -->
        <div id="my-tab-content" class="tab-content">
          <!-- Form Elements Inscripcion-->
          <div class="panel panel-default tab-pane in active animated rollIn retraso-1" id="tabReinscripcion">

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                            echo $fnFillingTable->fnFillingReinscriptions();
                           ?>

                        </tbody>
                    </table>
                </div>

            </div>

          </div>
        </div>


      </div>
  </div>
</div>
 <!-- /. PAGE INNER  -->

 <!-- Modal -->
  <div class="modal fade" id="myModalReinscription"  data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h3 class="modal-title">Datos Estudiantes</h3>
        </div>
        <div  >
          <div class="modal-body scrollit">
            <div class="row">
              <div class="col-md-1">
              </div>
              <div class="col-md-10">
                <!-- contenido modal -->
                <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmInsc">

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

                      <!-- Ingreso de Grado -->
                      <div class="form-group" id="ErrorAsiGRdiv">
                        <label class="control-label control-label-input-group" id="ErrorAsiGRlbl" for="ErrorAsiGRlbl"></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-language"></i></span>
                            <SELECT NAME="cboAsiGR" class="form-control" multiple SIZE=0 id="cboAsiGR" ></SELECT>
                        </div>
                      </div>

                      <!-- Ingreso de ciclo escolar -->
                      <div class="form-group" id="ErrorCEdiv">
                        <label class="control-label control-label-input-group" id="ErrorCElbl" for="ErrorCElbl"></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                            <SELECT NAME="cboCE" class="form-control" SIZE=0 id="cboCE" ></SELECT>
                        </div>
                      </div>

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
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- JS Mantenimiento Reinscripcion -->
<script src="../js/jsReinscription.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#dataTables-example').dataTable();
});
</script>
