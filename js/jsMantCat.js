/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;

var Profecion;
var nombreCat;
var direccionCat;
var emailCat;
var phoneCat;
var ProfecCat;
var cboProf;

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInputCat(){
	nombreCat=$("#txtCat").val().trim();
	direccionCat=$("#txtAddressCat").val().trim();
	emailCat=$("#txtemailCat").val().trim();
	phoneCat=$("#txtPhoneCat").val().trim();
	Profecion=$("#txtPro").val().trim();
  cboProf=$("#cbopro").val();

	$("#txtCat").val(nombreCat);
	$("#txtAddressCat").val(direccionCat);
	$("#txtemailCat").val(emailCat);
	$("#txtPhoneCat").val(phoneCat);
  $("#txtPro").val(Profecion);
}

function vaciarInputMCat(){
	$("#txtCat").val(' ');
	$("#txtAddressCat").val(' ');
	$("#txtemailCat").val(' ');
	$("#txtPhoneCat").val(' ');
	$("#txtPro").val(' ');

	$("#txtCat").val($("#txtCat").val().trim());
	$("#txtAddressCat").val($("#txtAddressCat").val().trim());
	$("#txtemailCat").val($("#txtemailCat").val().trim());
	$("#txtPhoneCat").val($("#txtPhoneCat").val().trim());
  $("#txtPro").val($("#txtPro").val().trim());

	$("select#cbopro").val("0");
}


/*--------------------------------------
					Funcion Validar
-----------------------------------------*/

function fnvaliPro(){
		ejecutar=true;
		limpiarInputCat();
		resetClass();

		if (Profecion==""){
      $("#ErrorProdiv").addClass("has-error has-feedback");
			$("#ErrorProlbl").text("Ingrese la Profecion");
			$("#ErrorProlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorProlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyOne.test(Profecion)){
			$("#ErrorProdiv").addClass("has-error has-feedback");
			$("#ErrorProlbl").text("Caractires invalidos");
			$("#ErrorProlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorProlbl').fadeIn();
			ejecutar=false;
		}

		if(ejecutar)
		{
			registarProfec();
		}

}


function fnvalidacionCat(){
		ejecutar=true;
		limpiarInputCat();
		resetClass();

		// ************ VALIDACION CATEDRATICO ****************

		if (nombreCat==""){
      $("#ErrorCatdiv").addClass("has-error has-feedback");
			$("#ErrorCatlbl").text("Ingrese el nombres");
			$("#ErrorCatlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorCatlbl').fadeIn();
			ejecutar=false;
		} else if (!verifyOne.test(nombreCat)){
			$("#ErrorCatdiv").addClass("has-error has-feedback");
			$("#ErrorCatlbl").text("Ingrese solo letras");
			$("#ErrorCatlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorCatlbl').fadeIn();
			ejecutar=false;
		}

		if (direccionCat==""){
			$("#ErrorDirCadiv").addClass("has-error has-feedback");
			$("#ErrorDirCalbl").text("Ingrese la Direccion");
			$("#ErrorDirCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorDirCalbl').fadeIn();
			ejecutar=false;
		} else if (!verifyFore.test(direccionCat)){
			$("#ErrorDirCadiv").addClass("has-error has-feedback");
			$("#ErrorDirCalbl").text("Caracteres Incorrectos");
			$("#ErrorDirCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorDirCalbl').fadeIn();
			ejecutar=false;
		}

		if (emailCat==""){
			$("#ErrorEmaCadiv").addClass("has-error has-feedback");
			$("#ErrorEmaCalbl").text("Ingrese el correo electronico");
			$("#ErrorEmaCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorEmaCalbl').fadeIn();
			ejecutar=false;
		} else if (!verifyThree.test(emailCat)){
			$("#ErrorEmaCadiv").addClass("has-error has-feedback");
			$("#ErrorEmaCalbl").text("Correo Electronico invalido");
			$("#ErrorEmaCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorEmaCalbl').fadeIn();
			ejecutar=false;
		}

		if (phoneCat==""){
			$("#ErrorTelCadiv").addClass("has-error has-feedback");
			$("#ErrorTelCalbl").text("Ingrese el telefono");
			$("#ErrorTelCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTelCalbl').fadeIn();
			ejecutar=false;
		} else if (!verifyTwo.test(phoneCat)){
			$("#ErrorTelCadiv").addClass("has-error has-feedback");
			$("#ErrorTelCalbl").text("Ingrese solo numeros");
			$("#ErrorTelCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTelCalbl').fadeIn();
			ejecutar=false;
		} else if (phoneCat.length != 8){
			$("#ErrorTelCadiv").addClass("has-error has-feedback");
			$("#ErrorTelCalbl").text("Ingrese un numero con 8 digitos");
			$("#ErrorTelCalbl").addClass("animated bounceIn retraso-2");
			$('#ErrorTelCalbl').fadeIn();
			ejecutar=false;
		}

		if (cboProf == null){
			$("#ErrorCprodiv").addClass("has-error has-feedback");
			$("#ErrorCprolbl").text("Seleccione la Profecion");
			$("#ErrorCprolbl").addClass("animated bounceIn retraso-2");
			$('#ErrorCprolbl').fadeIn();
			ejecutar=false;
		}

		if(ejecutar)
		{
			// registarEnc();
		}

}

/*--------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO
-----------------------------------------*/

function registarProfec(){
	var url = "../Functions/CallRecordMCat.php"; // El script a dónde se realizará la petición.

	$.ajax({
	  type: "POST",
	  url: url,
	  data: $("#frmProfe").serialize(), // Adjuntar los campos del formulario enviado.
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
			vaciarInputMCat();
	  }
	});
}

$(document).ready(function(){

			$(document).delegate('#tab-Cat','click',function(){
				$('select option').remove();
				CargarComboProfec();
			});

			$(document).delegate('#buttonPro','click',fnvaliPro);
			$(document).delegate("#buttonCat","click",fnvalidacionCat);

});

function CargarComboProfec(){
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboProfec:'1'},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				if (index == 0) {
					$("#cbopro").append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$("#cbopro").append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}
			});
		}
	});
}
