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
