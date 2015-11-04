<div id="page-inner" class="animated zoomIn retraso-1">
    <div class="row">
        <div class="col-md-12">
         <h2>Mantenimiento de Notas</h2>
            <h5>Bienvenido catedratico, al mantenimiento de notas.</h5>

        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active" id="tab-AddRatings"><a href="#tabAddRatings" data-toggle="tab">Ingreso de notas</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">

            <!-- Form Elements Catedraticos-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1"  id="tabAddRatings">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                      <h3>Ingreso de notas</h3>
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

                        <button type="button" class="btn btn-danger" id="btnSearchThree">Buscar</button>
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
