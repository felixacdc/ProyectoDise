<div id="page-inner" class="animated zoomIn retraso-1">
    <div class="row">
        <div class="col-md-12">
         <h2>Mantenimiento de Cursos</h2>
            <h5>Bienvenido director, al mantenimiento de cursos. </h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tabCourses" data-toggle="tab">Cursos</a></li>
            <li role="presentation" id="tab-AssignCourses"><a href="#tabAssignCourses" data-toggle="tab">Asignacion Cursos</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">
            <!-- Form Elements Profeciones-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1" id="tabCourses">
                <!-- <div class="panel-heading">
                    Formulario de mantenimiento grados
                </div> -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">

                            <h3>Registro Cursos</h3>
                            <hr>

                            <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmCourse">
                                <div class="form-group" id="ErrorCoursediv">
                                  <label class="control-label control-label-input-group" id="ErrorCourselbl" for="ErrorCourselbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-clone"></i></span>
                                      <input type="text" name="NomCourse" class="form-control" id="txtCourse" placeholder="Nombre del curso" autocomplete="off">
                                  </div>
                                </div>

                                <input type="hidden" name="frm" value="frmCourse"/>

                                <button type="button" class="btn btn-danger" id="btnCourse" >Registrar</button>
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

                        <h3 class="text-center">Mantenimientos Cursos</h3><br>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableCourses">
                                <thead>
                                    <tr>
                                        <th>Cursos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    require_once '../../classes/class.fnFillingTables.php';
                                    require_once '../../classes/class.Connection.php';

                                    $fnFillingTable = new FillingTables();
                                    echo $fnFillingTable->fnFillingCourses();
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
            <div class="panel panel-default tab-pane animated rollIn retraso-1 " id="tabAssignCourses">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                      <h3>Registro Asignacion de Cursos</h3>
                      <hr>

                      <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmAssignCourses">

                        <!-- Ingreso de Grado -->
                        <div class="form-group" id="ErrorCboGdiv">
                          <label class="control-label control-label-input-group" id="ErrorCboGlbl" for="ErrorCboGlbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                              <SELECT NAME="cboGrado" class="form-control" SIZE=0 id="cboGrado" ></SELECT>
                          </div>
                        </div>

                        <!-- Ingreso de curo -->
                        <div class="form-group" id="ErrorCboCoursediv">
                          <label class="control-label control-label-input-group" id="ErrorCboCourselbl" for="ErrorCboCourselbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-clone"></i></span>
                              <SELECT NAME="CboCourse" class="form-control" multiple SIZE=0 id="CboCourse" ></SELECT>
                          </div>
                        </div>

                        <!-- Ingreso de catedratico -->
                        <div class="form-group" id="ErrorCboTeacherdiv">
                          <label class="control-label control-label-input-group" id="ErrorCboTeacherlbl" for="ErrorCboTeacherlbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <SELECT NAME="CboTeacher" class="form-control" multiple SIZE=0 id="CboTeacher" ></SELECT>
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

                        <input type="hidden" name="frm" value="frmAssignCourses"/>

                        <button type="button" class="btn btn-danger" id="btnAssignCourses">Registrar</button>
                      </form>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-12">

                      <h3 class="text-center">Mantenimientos Asignacion Cursos</h3><br>

                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                          <button data-toggle="modal" data-target=".bs-example-modal-lg" type="button" class="btn btn-success btn-lg" id="buttonAssignCourses">Visualizar Mantenimientos</button>
                        </div>
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
	<div class="modal fade bs-example-modal-lg" id="myModalAssign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		   <div class="modal-content">
		     <div class="modal-header">
		       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       <h3 class="modal-title" id="myModalLabel">Mantenimientos Asignacion Cursos</h3>
		    </div>
		    <div  >
			    <div class="modal-body scrollit" id="contdiv">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tableAssignCourses">
                    <thead>
                        <tr>
                            <th>Catedratico</th>
                            <th>Curso</th>
                            <th>Grado</th>
                            <th>Ciclo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        require_once '../../classes/class.fnFillingTables.php';
                        require_once '../../classes/class.Connection.php';

                        $fnFillingTable = new FillingTables();
                        echo $fnFillingTable->fnFillingAssignCourses();
                       ?>

                    </tbody>
                </table>
            </div>
			    </div>
			    <div class="modal-footer">
			    	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			    </div>
		   </div>
		   </div>
		 </div>
	</div>







<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#tableCourses').dataTable();
    $('#tableAssignCourses').dataTable();
});

</script>
