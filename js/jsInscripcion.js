/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var verifyOne = /^[a-zA-Z ñáéíóú]*$/;
var verifyTwo = /^\d*$/;
var verifyThree = /^([a-z]+[a-z0-9._-]*)@{1}([a-z1-9\.]{2,})\.([a-z]{2,3})$/;
var verifyFore = /^[a-zA-Z0-9_-]+$/;
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

	$("#txtNameE").val(nombreE);
	$("#txtAddressE").val(direccionE);
	$("#txtemailE").val(emailE);
	$("#txtPhoneE").val(phoneE);
  $("#txtNameS").val(nombreE);
	$("#txtAddressS").val(direccionE);
	$("#txtemailS").val(emailE);
	$("#txtPhoneS").val(phoneE);
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

function fnvalidacion(){
		ejecutar=true;
		limpiarInput();
		resetClass();

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
		} else if (!verifyOne.test(direccionE)){
			$("#ErrorDirdiv").addClass("has-error has-feedback");
			$("#ErrorDirlbl").text("Ingrese solo letras");
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

		// ************** ESTUDIANTE ************************+

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
		} else if (!verifyOne.test(direccionS)){
			$("#ErrorDirSdiv").addClass("has-error has-feedback");
			$("#ErrorDirSlbl").text("Ingrese solo letras");
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

$(document).ready(function(){

	  	$(document).delegate('input','click',function(){
				$(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
				$(this).parent().parent().removeClass('has-error has-feedback');
			});

			$(document).delegate('select','focus',function(){
				$(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
				$(this).parent().parent().removeClass('has-error has-feedback');
			});

			$(document).delegate('#buttone','click',fnvalidacion);

});
