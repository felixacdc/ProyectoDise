<div class="alert alert-info animated bounceIn retraso-2" role="alert" id="alert"></div>
<div class="alert alert-danger animated bounceIn retraso-2" role="alert" id="alertE"></div>

<div id="page-inner" class="animated zoomIn retraso-1">
  <!-- Alertas -->


  <!-- Fin de alertas -->
    <div class="row">
        <div class="col-md-12">
         <h2>Seccion de Pagos</h2>
            <h5>Bienvenido director, la seccion de pagos. </h5>
        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
    <div class="row">
        <div class="col-md-12">

          <!-- TABS -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tabRpagos" data-toggle="tab" id="tab-rPagos">Pagos</a></li>
          </ul>
          <!-- END TABS -->

          <!-- BEGIN CONTENT-TABS -->
          <div id="my-tab-content" class="tab-content">
            <!-- Form Elements GRADO-->
            <div class="panel panel-default tab-pane in active animated rollIn retraso-1 " id="tabRpagos">
                <!-- <div class="panel-heading">
                    Formulario de mantenimiento grados
                </div> -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">

                            <h3>Realizar Pago</h3>
                            <hr>

                            <!-- **************** FORMULARIO CARNET **************** -->
                            <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmCarnet">
                                <div class="form-group" id="ErrorCarnetdiv">
                                  <label class="control-label control-label-input-group" id="ErrorCarnetlbl" for="ErrorCarnetlbl"></label>
                                  <div class="input-group">
                                    <input type="text" name="txtCarnet" class="form-control" id="txtCarnet" placeholder="Ingrese el Carnet del estudiante" autocomplete="off">
                                    <span class="form-group input-group-btn">
                                      <button class="btn btn-danger" type="button" id="buttonPago"><i class="fa fa-search"></i></button>
                                    </span>
                                  </div>
                                </div>
                                <input type="hidden" name="frm" value="frmPago"/>
                            </form>

                            <!-- *************** FORMULARIO TRANSACCION *********************** -->
                            <div id="Transacciones" class="oculto-T animated bounceInDown">
                              <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmTransacciones">

                                <div class="form-group" id="ErrorPstuddiv">
                                  <label class="control-label control-label-input-group" id="ErrorPstudlbl" for="ErrorPstudlbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input type="text" name="txtPstudy" class="form-control" id="txtPstudy" Disabled>
                                  </div>
                                </div>

                                <div class="form-group" id="ErrorCboTipoPdiv">
                                  <label class="control-label control-label-input-group" id="ErrorCboTipoPlbl" for="ErrorCboTipoPlbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                      <SELECT NAME="CboTipoP" class="form-control" SIZE=0 id="CboTipoP" ></SELECT>
                                  </div>
                                </div>

                                <div class="form-group" id="ErrorCboNivelAdiv">
                                  <label class="control-label control-label-input-group" id="ErrorCboNivelAlbl" for="ErrorCboNivelAlbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-battery-half"></i></span>
                                      <SELECT NAME="CboNivelA" class="form-control" SIZE=0 id="CboNivelA"></SELECT>
                                  </div>
                                </div>

                                <div class="form-group" id="ErrorDateTdiv">
                                  <label class="control-label control-label-input-group" id="ErrorDateTlbl" for="ErrorDateTlbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                      <input type="date" name="txtDateT" class="form-control" id="txtDateT" autocomplete="off">
                                  </div>
                                </div>

                                <input type="hidden" name="frm" value="frmTransacciones"/>

                                <button type="button" class="btn btn-danger" id="buttonTransac" >Realizar Transaccion</button>
                                <button type="button" class="btn btn-default" id="btnCanP">Cancelar</button>
                              </form>
                            </div>

                            <!-- **************** FORMULARIO DETALLE TRANSACCION ************** -->
                            <div id="DetalleTransaccion" class="oculto-T animated bounceInDown">
                              <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="frmDetTransacciones">

                                <div class="form-group" id="ErrorMesdiv">
                                  <label class="control-label control-label-input-group" id="ErrorMeslbl" for="ErrorMeslbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                      <input type="text" name="txtMes" class="form-control" id="txtMes" Disabled>
                                  </div>
                                </div>

                                <div class="form-group" id="ErrorCicloEdiv">
                                  <label class="control-label control-label-input-group" id="ErrorCicloElbl" for="ErrorCicloElbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                      <input type="text" name="txtCicloE" class="form-control" id="txtCicloE" Disabled>
                                  </div>
                                </div>

                                <div class="form-group" id="ErrorSubTotaldiv">
                                  <label class="control-label control-label-input-group" id="ErrorSubTotallbl" for="ErrorSubTotallbl"></label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                      <input type="text" name="txtSubTotal" class="form-control" id="txtSubTotal" Disabled>
                                  </div>
                                </div>

                                <input type="hidden" name="frm" value="frmDetTransacciones"/>

                                <button type="button" class="btn btn-danger" id="buttonDtransac" >Pagar</button>
                                <button type="button" class="btn btn-default" id="btnCanP">Cancelar</button>
                              </form>
                            </div>

                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements GRADOS -->
          </div>
          <!-- END CONTENT-TABS -->
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->
