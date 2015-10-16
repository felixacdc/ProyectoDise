<div id="page-inner" class="animated zoomIn retraso-1">
  <div class="alert alert-info animated bounceIn retraso-2" role="alert" id="alert">asdfasd asdfasd</div>
    <div class="row">
        <div class="col-md-12">
         <h2>Mantenimiento de grados</h2>
            <h5>Bienvenido director, el mantenimiento de grados. </h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tabGrad" data-toggle="tab">Grados</a></li>
            <li role="presentation"><a href="#tabSec" data-toggle="tab">Secciones</a></li>
            <li role="presentation"><a href="#tabAsig" data-toggle="tab">Asignacion de Secciones</a></li>
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
                                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input type="text" name="txtGradE" class="form-control" id="txtGrad" placeholder="Nombre Del Grado" autocomplete="off">
                                  </div>
                                </div>
                              <button type="button" class="btn btn-danger" id="buttonG" >Registrar</button>
                            </form>

                        </div>
                        <div class="col-md-3">
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
                        <div class="form-group" id="ErrorSecdiv">
                          <label class="control-label control-label-input-group" id="ErrorSeclbl" for="ErrorSeclbl"></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" name="NameS" class="form-control" id="txtSec" placeholder="Nombre De La Seccion" autocomplete="off">
                          </div>
                        </div>
                        <button type="button" class="btn btn-danger" id="buttonS" >Registrar</button>
                    </div>
                  </div>
              </div>
              </div>
              <!-- End Form Elements SECCIONES -->
          </div>
          <!-- END CONTENT-TABS -->
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->
