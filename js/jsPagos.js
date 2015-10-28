/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var carnet;
var idEstudiante;
var tipoPago;
var nivelAcademico;
var fecha;
var ronda = 0;
var totalT = 0;

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInputPagos(){
	carnet = $("#txtCarnet").val().trim();
  tipoPago = $("#CboTipoP").val();
  nivelAcademico = $("#CboNivelA").val();
  fecha = $("#txtDateT").val();
	totalT = 0;
	ronda = 0;

	$('#txtCarnet').val(carnet);
}

function vaciarInputPagos(){
	$("#txtCarnet").val(' ');

  $("#txtCarnet").val($("#txtCarnet").val().trim());
}

function ocultoT(){
	$('.oculto-T').fadeOut(2);
	$('.oculto-T').removeClass('bounceOutLeft');
}

/*--------------------------------------
					     VALIDACION
-----------------------------------------*/

function fnvalidacionCarnet(){
		ejecutar=true;
		limpiarInputPagos();
		resetClass();
		ocultoT();

		// ************ VALIDACION ENCARGADO ****************

		if (carnet==""){
      generalValidacion('#ErrorCarnetdiv', '#ErrorCarnetlbl', 'Ingrese el Carnet');
		} else if (!verifyFore.test(carnet)){
			generalValidacion('#ErrorCarnetdiv', '#ErrorCarnetlbl', 'Ingrese Solo Caracteres Validos');
		}

		if(ejecutar)
		{
			searchCarnet(carnet, 'CallPagos.php', 'pagoCarnet');
		}

}

function cargarPaginaPagos(){
	$("#page-wrapper").load('VwAdmin/VwPagos.php');
	$('a').removeClass('active-menu');
	$('#op4').addClass('active-menu');
	borrarTemporal();
}

function fnvalidacionTransaccion(){
		ejecutar=true;
		limpiarInputPagos();
		resetClass();

		// ************ VALIDACION ENCARGADO ****************

		if (tipoPago == null){
      generalValidacion('#ErrorCboTipoPdiv', '#ErrorCboTipoPlbl', 'Seleccion el Tipo de Pago');
		}

    if (nivelAcademico == null){
      generalValidacion('#ErrorCboNivelAdiv', '#ErrorCboNivelAlbl', 'Seleccion el Nivel Academico');
		}

    if (fecha == ''){
      generalValidacion('#ErrorDateTdiv', '#ErrorDateTlbl', 'Seleccion la Fecha');
		}

		if(ejecutar)
		{
			almacenamientoTemporal();
			generarDetalleTransaccion();
		}

}

$(document).ready(function(){

  $(document).delegate("#buttonPago","click",fnvalidacionCarnet);
  $(document).delegate("#buttonTransac","click",fnvalidacionTransaccion);
	$(document).delegate("#buttonDtransac","click",realizarDetalleT);
	$(document).delegate("#btnNuevoDT","click",function(){
		$('#myModal').modal('hide');
		generarDetalleTransaccion();
	});

	$(document).delegate("#btnCerrarFT","click",function(){
		$('#myModal').modal('hide');
		cargarPaginaPagos();
	});

	$(document).delegate("#btnCanP","click",function () {
		cargarPaginaPagos();
	});

	borrarTemporal();
});

function generarDetalleTransaccion(){
	$.ajax({
		url: '../Functions/CallPagos.php',
    dataType: 'json',
		type: 'POST',
		data:{
			estudiante: localStorage.idEstudiante,
      nivelAcademico: localStorage.idNivelAcademico
		},
	}).done(function(data){
    $.each(data,function(index){
      var campos = data[index];
			if (index == 0) {
				$("#txtMes").val(campos.valorMes);
				$("#txtCicloE").val(campos.valorCicloE);
				$("#txtSubTotal").val(campos.valorMensual);
				$("#Transacciones").fadeOut().addClass('bounceOutLeft');
				$("#DetalleTransaccion").fadeIn();

				localStorage.idMes = campos.idMes;
			  localStorage.idCicloE = campos.idCicloE;
			  localStorage.valorMensual =  campos.valorMensual;

				if (!localStorage.idTransaccion) {
					localStorage.idTransaccion = 0;
				}

				ronda = parseInt(ronda) + 1;
			}else {
				cargarPaginaPagos();
				$('#alert').text(campos.mensaje);
				$('#alert').show();
				$('#alert').delay(3000).hide(800);
			}
    });
	});
}


function realizarDetalleT(){
	totalT = parseInt(totalT) + parseInt(localStorage.valorMensual);
	$.ajax({
		dataType: "json",
	  type: "POST",
	  url: "../Functions/CallPagos.php",
	  data: {
			idEstudiante:localStorage.idEstudiante,
			idTipoPago:localStorage.idTipoPago,
			idNivelAcademico:localStorage.idNivelAcademico,
			fecha:localStorage.fechaTransaccion,
			idMes:localStorage.idMes,
			idCicloEscolar:localStorage.idCicloE,
			subTotal:localStorage.valorMensual,
			idTransaccion:localStorage.idTransaccion,
			total:totalT,
			ronda: ronda
		},
	  success: function(data)
	  {
			$.each(data,function(index){
					var campos = data[index];
					if (index == 0) {
						localStorage.idTransaccion = campos.idT;
						$('#myModal').modal('show');
						$('#myModalLabel').text('Pago Realizado Correctamente');
						$('#myModalContenido').text('¿Desea Realizar Otro Pago?');
					}else {
						alert(campos.error);
					}

			});
	  }
	});
}

function almacenamientoTemporal(){
  localStorage.idEstudiante = idEstudiante;
  localStorage.idTipoPago = tipoPago;
  localStorage.idNivelAcademico = nivelAcademico;
  localStorage.fechaTransaccion =  fecha;
}

function borrarTemporal(){

  localStorage.removeItem('idEstudiante');
  localStorage.removeItem('idTipoPago');
  localStorage.removeItem('idNivelAcademico');
  localStorage.removeItem('fechaTransaccion');

	localStorage.removeItem('idMes');
  localStorage.removeItem('idCicloE');
  localStorage.removeItem('valorMensual');
	localStorage.removeItem('idTransaccion');

}

function searchCarnet(value, file, instruction){
  $.ajax({
		url: '../Functions/' + file,
    dataType: 'json',
		type: 'POST',
		data:{
			value: value,
      instruction: instruction
		},
	}).done(function(data){
    $.each(data,function(index){
      var campos = data[index];
      if (campos.id != 0) {
        $("#txtPstudy").val(campos.descripcion);
        idEstudiante = campos.id;
        $('select option').remove();
        generarCargaCombos('CboTipoP', '#CboTipoP');
				generarCargaCombos('CboNivelA', '#CboNivelA');
				$("#Transacciones").fadeIn();
				$("#txtCarnet").prop('disabled', true);
				$("#buttonPago").prop('disabled', true);
      }else {
      	generalValidacion('#ErrorCarnetdiv', '#ErrorCarnetlbl', campos.descripcion);
      }
    });
	});
}
