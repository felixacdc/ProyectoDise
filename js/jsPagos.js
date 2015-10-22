/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var carnet;
var idEstudiante;
var tipoPago;
var nivelAcademico;
var fecha;

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInputPagos(){
	carnet = $("#txtCarnet").val().trim();
  tipoPago = $("#CboTipoP").val();
  nivelAcademico = $("#CboNivelA").val();
  fecha = $("#txtDateT").val();

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
			generarDetalleTransaccion();
		}

}

$(document).ready(function(){

  $(document).delegate("#buttonPago","click",fnvalidacionCarnet);
  $(document).delegate("#buttonTransac","click",fnvalidacionTransaccion);
	$(document).delegate("#btnCanP","click",function () {
		$("#page-wrapper").load('VwAdmin/VwPagos.php');
		$('a').removeClass('active-menu');
		$('#op4').addClass('active-menu');
	});
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
				almacenamientoTemporal();
				$("#Transacciones").fadeOut().addClass('bounceOutLeft');
				$("#DetalleTransaccion").fadeIn();
			}else {
				alert(campos.mensaje);
			}
    });
	});
}

function almacenamientoTemporal(){
  localStorage.idEstudiante = idEstudiante;
  localStorage.idTipoPago = tipoPago;
  localStorage.idNivelAcademico = nivelAcademico;
  localStorage.fechaTransaccion =  fecha;
  // borrarTemporal();
}

function borrarTemporal(){
  localStorage.removeItem('idEstudiante');
  localStorage.removeItem('idTipoPago');
  localStorage.removeItem('idNivelAcademico');
  localStorage.removeItem('fechaTransaccion');
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
