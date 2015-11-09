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


$(document).ready(function(){

	$(document).delegate('#buttone','click',fnvalidacion);
	$(document).delegate("#buttonEnc","click",fnvalidacionEnc);
	$(document).delegate('#tab-I','click',fnLoadInscription);
	$(document).delegate('#txtBuscEn','keypress',buscarEncargado);
	$(document).delegate('#txtBuscEn','focusout',function(){ $('#myDiv').fadeOut(); });
	$(document).delegate('#btnAceptarIncripcion','click',fnAcceptingRegistration);

	$(document).delegate('input','focus',function(){
		$(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
		$(this).parent().parent().removeClass('has-error has-feedback');
	});

	$(document).delegate('select','focus',function(){
		$(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
		$(this).parent().parent().removeClass('has-error has-feedback');
	});

	$(document).delegate('#myDiv p','click',function(){
		$("#txtBuscEn").val($(this).text());
		VeryBuscEn = $(this).text();
		hiBuscEn = $(this).children('input').val();
		$('#myDiv').fadeOut();
		$('#myDiv').html(' ');
	});
});

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInput(){
	nombreE=$("#txtNameE").val().trim();
	direccionE=$("#txtAddressE").val().trim();
	emailE=$("#txtemailE").val().trim();
	phoneE=$("#txtPhoneE").val().trim();
	nombreS=$("#txtNameS").val().trim();
	direccionS=$("#txtAddressS").val().trim();
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
  $("#txtNameS").val(nombreS);
	$("#txtAddressS").val(direccionS);
	$("#txtemailS").val(emailS);
	$("#txtPhoneS").val(phoneS);
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
function generalValidacion(identificador1, identificador2, msm){
	$(identificador1).addClass("has-error has-feedback");
	$(identificador2).text(msm);
	$(identificador2).addClass("animated bounceIn retraso-2");
	$(identificador2).fadeIn();
	ejecutar=false;
}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/

function fnvalidacionEnc(){
		ejecutar=true;
		limpiarInput();
		resetClass();

		if (nombreE==""){
      generalValidacion('#ErrorNomdiv', '#ErrorNomlbl', 'Ingrese el nombre');
		} else if (!verifyOne.test(nombreE)){
			generalValidacion('#ErrorNomdiv', '#ErrorNomlbl', 'Ingrese solo letras');
		}

		if (direccionE==""){
			generalValidacion('#ErrorDirdiv', '#ErrorDirlbl', 'Ingrese la Direccion');
		} else if (!verifyFore.test(direccionE)){
			generalValidacion('#ErrorDirdiv', '#ErrorDirlbl', 'Caracteres Incorrectos');
		}

		if (emailE==""){
			generalValidacion('#ErrorEmadiv', '#ErrorEmalbl', 'Ingrese el correo electronico');
		} else if (!verifyThree.test(emailE)){
			generalValidacion('#ErrorEmadiv', '#ErrorEmalbl', 'Correo Electronico invalido');
		}

		if (phoneE==""){
			generalValidacion('#ErrorTeldiv', '#ErrorTellbl', 'Ingrese el telefono');
		} else if (!verifyTwo.test(phoneE)){
			generalValidacion('#ErrorTeldiv', '#ErrorTellbl', 'Ingrese solo numeros');
		} else if (phoneE.length != 8){
			generalValidacion('#ErrorTeldiv', '#ErrorTellbl', 'Ingrese un numero con 8 digitos');
		}

		if(ejecutar)
		{
			generarRegistro('CallRecordInsc.php', "#frmEncar");
			vaciarInputIns();
		}

}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/

function fnvalidacion(){
		ejecutar=true;
		limpiarInput();
		resetClass();

		if (hiBuscEn == 0){
			generalValidacion('#ErrorBEndiv', '#ErrorBEnlbl', 'Seleccione un Encargado');
		}else if(BuscEn == '' || BuscEn != VeryBuscEn){
			generalValidacion('#ErrorBEndiv', '#ErrorBEnlbl', 'Seleccione un Encargado');
			hiBuscEn = 0;
		}

		if (nombreS==""){
			generalValidacion('#ErrorNomSdiv', '#ErrorNomSlbl', 'Ingrese el nombre');
		} else if (!verifyOne.test(nombreS)){
			generalValidacion('#ErrorNomSdiv', '#ErrorNomSlbl', 'Ingrese solo letras');
		}

		if (direccionS==""){
			generalValidacion('#ErrorDirSdiv', '#ErrorDirSlbl', 'Ingrese la Direccion');
		} else if (!verifyFore.test(direccionS)){
			generalValidacion('#ErrorDirSdiv', '#ErrorDirSlbl', 'Caracteres Incorrectos');
		}

		if (emailS==""){
			generalValidacion('#ErrorEmaSdiv', '#ErrorEmaSlbl', 'Ingrese el correo electronico');
		} else if (!verifyThree.test(emailS)){
			generalValidacion('#ErrorEmaSdiv', '#ErrorEmaSlbl', 'Correo Electronico invalido');
		}

		if (phoneS==""){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese el telefono');
		} else if (!verifyTwo.test(phoneS)){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese solo numeros');
		} else if (phoneS.length != 8){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese un numero con 8 digitos');
		}

		if (AsignacionG == 0){
			generalValidacion('#ErrorAsiGRdiv', '#ErrorAsiGRlbl', 'Seleccione el Grado');
		}

		if (CicloE == null){
			generalValidacion('#ErrorCEdiv', '#ErrorCElbl', 'Seleccione el Ciclo Escolar');
		}

		if(ejecutar)
		{
			$('#valEncargado').val(hiBuscEn);
			generarRegistroTwo('CallRecordInsc.php', "#frmInsc");
		}

}

/*--------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO
-----------------------------------------*/

function generarRegistro(nameArchivo, identificador){
	var url = "../Functions/" + nameArchivo;
	$.ajax({
	  type: "POST",
	  url: url,
	  data: $(identificador).serialize(),
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
	  }
	});
}

/*-----------------------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO INSCRIPCION
----------------------------------------------------------*/

function generarRegistroTwo(nameArchivo, identificador){
	var url = "../Functions/" + nameArchivo;
	$.ajax({
		dataType: "json",
	  type: "POST",
	  url: url,
	  data: $(identificador).serialize(),
	  success: function(data)
	  {
			$.each(data,function(index){
					var campos = data[index];
					document.getElementById('btnModalA').id = "btnAceptarIncripcion";
					$('#btnModalC').fadeOut(1);
					$('#myModalLabel').text('Inscripcion Realizado Correctamente');
					content = '<p>Su Carnet es: <strong>' + campos.carnet + '</strong></p><p>Su Usuario es: <strong>' + campos.usuario + '</strong></p><p>Su Contraseña es: <strong>' + campos.contraseña + '</strong></p>';
					document.getElementById('myModalContenido').innerHTML = content;
					$('#myModal').modal('show');
			});
	  }
	});
}

/*-----------------------------
			CARGAR COMBOS
---------------------------------*/

function generarCargaCombos(cboPost, identificador)
{
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboPost:cboPost},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				if (index == 0) {
					$(identificador).append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$(identificador).append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}
			});

			$('#tableAssignSection tbody tr td div input').each(function(i, element) {

				element2 = $('#tableAssignSection tbody tr td div select');

				$(element2).eq(i).find("option[value='" + $(element).val() + "']").attr("selected",true);

		  });
		}
	});
}

/*-----------------------------
			BUSCAR ENCARGADO
---------------------------------*/


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

/*-----------------------------
			CARGAR COMBOS INSCRIPCION
---------------------------------*/

function fnLoadInscription(){
	$('select option').remove();
	generarCargaCombos('cboAsigG', '#cboAsiGR');
	generarCargaCombos('cboCE', '#cboCE');
}

/*-----------------------------
			ACEPTACION DE INSCRIPCION
---------------------------------*/

function fnAcceptingRegistration(){
	$('#myModal').modal('hide');
	document.getElementById('btnAceptarIncripcion').id = "btnModalA";
	$('#btnModalC').fadeIn(2000);
	$('#myModalLabel').text(' ');
	document.getElementById('myModalContenido').innerHTML = ' ';
	vaciarInputIns();
}
