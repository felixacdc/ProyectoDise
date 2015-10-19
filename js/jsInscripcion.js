/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var verifyOne = /^[a-zA-Z ñáéíóú]*$/;
var verifyTwo = /^\d*$/;
var verifyThree = /^([a-zA-Z]+[a-zA-Z0-9._-]*)@{1}([a-z1-9\.]{2,})\.([a-z]{2,3})$/;
var verifyFore = /^[a-zA-Z0-9. _-]*$/;
var nombreE;
var direccionE;
var emailE;
var phoneE;
var nombreS;
var direccionS;
var emailS;
var phoneS;
var AsignacionG;
var CicloE;
var hiBuscEn = 0;
var BuscEn;
var VeryBuscEn = '';

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInput(){
	nombreE=$("#txtNameE").val().trim();
	direccionE=$("#txtAddressE").val().trim();
	emailE=$("#txtemailE").val().trim();
	phoneE=$("#txtPhoneE").val().trim();
	nombreS=$("#txtNameS").val().trim();
	direccionS=$("#txtAddressS").val();
  emailS=$("#txtemailS").val().trim();
  phoneS=$("#txtPhoneS").val().trim();
	AsignacionG = $("#cboAsiGR").val();
	CicloE = $("#cboCE").val();
	BuscEn = $('#txtBuscEn').val().trim();

	$('#txtBuscEn').val(BuscEn);
	$("#txtNameE").val(nombreE);
	$("#txtAddressE").val(direccionE);
	$("#txtemailE").val(emailE);
	$("#txtPhoneE").val(phoneE);
  $("#txtNameS").val(nombreE);
	$("#txtAddressS").val(direccionE);
	$("#txtemailS").val(emailE);
	$("#txtPhoneS").val(phoneE);
}

function vaciarInputIns(){
	$("#txtNameE").val(' ');
	$("#txtAddressE").val(' ');
	$("#txtemailE").val(' ');
	$("#txtPhoneE").val(' ');
	$("#txtNameS").val(' ');
	$("#txtAddressS").val(' ');
	$("#txtemailS").val(' ');
	$("#txtPhoneS").val(' ');
	$('#txtBuscEn').val(' ');

	$("#txtBuscEn").val($("#txtBuscEn").val().trim());
	$("#txtNameE").val($("#txtNameE").val().trim());
	$("#txtAddressE").val($("#txtAddressE").val().trim());
	$("#txtemailE").val($("#txtemailE").val().trim());
	$("#txtPhoneE").val($("#txtPhoneE").val().trim());
  $("#txtNameS").val($("#txtNameS").val().trim());
	$("#txtAddressS").val($("#txtAddressS").val().trim());
	$("#txtemailS").val($("#txtemailS").val().trim());
	$("#txtPhoneS").val($("#txtPhoneS").val().trim());

	$("select#cboCE").val("0");
	$("select#cboAsiGR").val("0");
	hiBuscEn = 0;

}

/*--------------------------------------
				Reset Clases
-----------------------------------------*/

function resetClass(){
	$('.control-label').removeClass('bounceOutLeft');
}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/
function fnvalidacionEnc(){
		ejecutar=true;
		limpiarInput();
		resetClass();

		// ************ VALIDACION ENCARGADO ****************

		if (nombreE==""){
      $("#ErrorNomdiv").addClass("has-error has-feedback");
			$("#ErrorNomlbl").text("Ingrese el nombres");
			$("#ErrorNomlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorNomlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyOne.test(nombreE)){
			$("#ErrorNomdiv").addClass("has-error has-feedback");
			$("#ErrorNomlbl").text("Ingrese solo letras");
			$("#ErrorNomlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorNomlbl').fadeIn();
			ejecutar=false;
		}

		if (direccionE==""){
			$("#ErrorDirdiv").addClass("has-error has-feedback");
			$("#ErrorDirlbl").text("Ingrese la Direccion");
			$("#ErrorDirlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorDirlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyFore.test(direccionE)){
			$("#ErrorDirdiv").addClass("has-error has-feedback");
			$("#ErrorDirlbl").text("Caracteres Incorrectos");
			$("#ErrorDirlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorDirlbl').fadeIn();
			ejecutar=false;
		}

		if (emailE==""){
			$("#ErrorEmadiv").addClass("has-error has-feedback");
			$("#ErrorEmalbl").text("Ingrese el correo electronico");
			$("#ErrorEmalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorEmalbl').fadeIn();
			ejecutar=false;
		} else if (!verifyThree.test(emailE)){
			$("#ErrorEmadiv").addClass("has-error has-feedback");
			$("#ErrorEmalbl").text("Correo Electronico invalido");
			$("#ErrorEmalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorEmalbl').fadeIn();
			ejecutar=false;
		}

		if (phoneE==""){
			$("#ErrorTeldiv").addClass("has-error has-feedback");
			$("#ErrorTellbl").text("Ingrese el telefono");
			$("#ErrorTellbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTellbl').fadeIn();
			ejecutar=false;
		} else if (!verifyTwo.test(phoneE)){
			$("#ErrorTeldiv").addClass("has-error has-feedback");
			$("#ErrorTellbl").text("Ingrese solo numeros");
			$("#ErrorTellbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTellbl').fadeIn();
			ejecutar=false;
		} else if (phoneE.length != 8){
			$("#ErrorTeldiv").addClass("has-error has-feedback");
			$("#ErrorTellbl").text("Ingrese un numero con 8 digitos");
			$("#ErrorTellbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTellbl').fadeIn();
			ejecutar=false;
		}

		if(ejecutar)
		{
			registarEnc();
		}

}

function fnvalidacion(){
		ejecutar=true;
		limpiarInput();
		resetClass();

		// ************** ESTUDIANTE ************************

		if (hiBuscEn == 0){
      $("#ErrorBEndiv").addClass("has-error has-feedback");
			$("#ErrorBEnlbl").text("Seleccione un Encargado");
			$("#ErrorBEnlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorBEnlbl').fadeIn();
			ejecutar=false;
		}else if(BuscEn == '' || BuscEn != VeryBuscEn){
			$("#ErrorBEndiv").addClass("has-error has-feedback");
			$("#ErrorBEnlbl").text("Seleccione un Encargado");
			$("#ErrorBEnlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorBEnlbl').fadeIn();
			hiBuscEn = 0;
			ejecutar=false;
		}

		if (nombreS==""){
      $("#ErrorNomSdiv").addClass("has-error has-feedback");
			$("#ErrorNomSlbl").text("Ingrese el nombres");
			$("#ErrorNomSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorNomSlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyOne.test(nombreS)){
			$("#ErrorNomSdiv").addClass("has-error has-feedback");
			$("#ErrorNomSlbl").text("Ingrese solo letras");
			$("#ErrorNomSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorNomSlbl').fadeIn();
			ejecutar=false;
		}

		if (direccionS==""){
			$("#ErrorDirSdiv").addClass("has-error has-feedback");
			$("#ErrorDirSlbl").text("Ingrese el Direccion");
			$("#ErrorDirSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorDirSlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyFore.test(direccionS)){
			$("#ErrorDirSdiv").addClass("has-error has-feedback");
			$("#ErrorDirSlbl").text("Caracteres Incorrectos");
			$("#ErrorDirSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorDirSlbl').fadeIn();
			ejecutar=false;
		}

		if (emailS==""){
			$("#ErrorEmaSdiv").addClass("has-error has-feedback");
			$("#ErrorEmaSlbl").text("Ingrese el correo electronico");
			$("#ErrorEmaSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorEmaSlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyThree.test(emailS)){
			$("#ErrorEmaSdiv").addClass("has-error has-feedback");
			$("#ErrorEmaSlbl").text("Correo Electronico invalido");
			$("#ErrorEmaSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorEmaSlbl').fadeIn();
			ejecutar=false;
		}

		if (phoneS==""){
			$("#ErrorTelSdiv").addClass("has-error has-feedback");
			$("#ErrorTelSlbl").text("Ingrese el telefono");
			$("#ErrorTelSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTelSlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyTwo.test(phoneS)){
			$("#ErrorTelSdiv").addClass("has-error has-feedback");
			$("#ErrorTelSlbl").text("Ingrese solo numeros");
			$("#ErrorTelSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTelSlbl').fadeIn();
			ejecutar=false;
		} else if (phoneS.length != 8){
			$("#ErrorTelSdiv").addClass("has-error has-feedback");
			$("#ErrorTelSlbl").text("Ingrese un numero con 8 digitos");
			$("#ErrorTelSlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTelSlbl').fadeIn();
			ejecutar=false;
		}

		if (AsignacionG == 0){
			$("#ErrorAsiGRdiv").addClass("has-error has-feedback");
			$("#ErrorAsiGRlbl").text("Seleccione el Grado");
			$("#ErrorAsiGRlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorAsiGRlbl').fadeIn();
			ejecutar=false;
		}

		if (CicloE == null){
			$("#ErrorCEdiv").addClass("has-error has-feedback");
			$("#ErrorCElbl").text("Seleccione el Ciclo Escolar");
			$("#ErrorCElbl").addClass("animated bounceIn retraso-2");
			$('#ErrorCElbl').fadeIn();
			ejecutar=false;
		}

		// if(ejecutar)
		// {
		// 	verifyCode(code);
		// }

}

/*--------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO
-----------------------------------------*/

function registarEnc(){
	var url = "../Functions/CallRecordInsc.php"; // El script a dónde se realizará la petición.

	$.ajax({
	  type: "POST",
	  url: url,
	  data: $("#frmEncar").serialize(), // Adjuntar los campos del formulario enviado.
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
			vaciarInputIns();
	  }
	});
}


$(document).ready(function(){

	  	$(document).delegate('input','focus',function(){
				$(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
				$(this).parent().parent().removeClass('has-error has-feedback');
			});

			$(document).delegate('select','focus',function(){
				$(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
				$(this).parent().parent().removeClass('has-error has-feedback');
			});

			$(document).delegate('#tab-I','click',function(){
				$('select option').remove();
				CargarComboAsigG();
				CargarComboCE();
			});

			$(document).delegate('#buttone','click',fnvalidacion);
			$(document).delegate("#buttonEnc","click",fnvalidacionEnc);

			$(document).delegate('#txtBuscEn','keypress',buscarEncargado);

			$(document).delegate('#myDiv p','click',function(){
				$("#txtBuscEn").val($(this).text());
				VeryBuscEn = $(this).text();
				hiBuscEn = $(this).children('input').val();
				$('#myDiv').fadeOut();
				$('#myDiv').html(' ');
			});

			$(document).delegate('#txtBuscEn','focusout',function(){
				$('#myDiv').fadeOut();
				$('#myDiv').html(' ');
			});

});

function buscarEncargado(){
	hiBuscEn = 0;
	$('#myDiv').fadeIn();
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {buscarEncar: $('#txtBuscEn').val()},
		success: function(data){
			$('#myDiv').html('');
			$.each(data,function(index){
				var campos = data[index];

				$("#myDiv").append("<p>" + campos.descripcion + "<input type='hidden' name='ID' value=" + campos.id + "></p>");

			});
		}
	});
}

// *************** CARGAR COMBOS *******************

function CargarComboAsigG(){
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboAsigG:'1'},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				if (index == 0) {
					$("#cboAsiGR").append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$("#cboAsiGR").append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}
			});
		}
	});
}

function CargarComboCE(){
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboCE:'1'},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				if (index == 0) {
					$("#cboCE").append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$("#cboCE").append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}
			});
		}
	});
}
