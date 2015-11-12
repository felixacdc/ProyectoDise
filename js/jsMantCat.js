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
			generalValidacion('#ErrorProdiv', '#ErrorProlbl', 'Ingrese la Profecion');
		} else if (!verifyOne.test(Profecion)){
			generalValidacion('#ErrorProdiv', '#ErrorProlbl', 'Caractires invalidos');
		}

		if(ejecutar)
		{
			verifyData(Profecion, '#ErrorProlbl', "#ErrorProdiv", 'CallRecordMCat.php', "#frmProfe");
		}

}


function fnvalidacionCat(){
		ejecutar=true;
		limpiarInputCat();
		resetClass();

		// ************ VALIDACION CATEDRATICO ****************

		if (nombreCat==""){
			generalValidacion('#ErrorCatdiv', '#ErrorCatlbl', 'Ingrese el nombre');
		} else if (!verifyOne.test(nombreCat)){
			generalValidacion('#ErrorCatdiv', '#ErrorCatlbl', 'Ingrese solo letras');
		}

		if (direccionCat==""){
			generalValidacion('#ErrorDirCadiv', '#ErrorDirCalbl', 'Ingrese la Direccion');
		} else if (!verifyFore.test(direccionCat)){
			generalValidacion('#ErrorDirCadiv', '#ErrorDirCalbl', 'Caracteres Incorrectos');
		}

		if (emailCat==""){
			generalValidacion('#ErrorEmaCadiv', '#ErrorEmaCalbl', 'Ingrese el correo electronico');
		} else if (!verifyThree.test(emailCat)){
			generalValidacion('#ErrorEmaCadiv', '#ErrorEmaCalbl', 'Correo Electronico invalido');
		}

		if (phoneCat==""){
			generalValidacion('#ErrorTelCadiv', '#ErrorTelCalbl', 'Ingrese el telefono');
		} else if (!verifyTwo.test(phoneCat)){
			generalValidacion('#ErrorTelCadiv', '#ErrorTelCalbl', 'Ingrese solo numeros');
		} else if (phoneCat.length != 8){
			generalValidacion('#ErrorTelCadiv', '#ErrorTelCalbl', 'Ingrese un numero con 8 digitos');
		}

		if (cboProf == null){
			generalValidacion('#ErrorCprodiv', '#ErrorCprolbl', 'Seleccione la Profecion');
		}

		if(ejecutar)
		{
			fnMasterRecord('CallRecordMCat.php', "#frmCat");
		}

}


$(document).ready(function(){

			$(document).delegate('#tab-Cat','click',function(){
				$('#cbopro option').remove();
				$('.cbopro option').remove();

				generarCargaCombos('cboProfec', '.cbopro');
				generarCargaCombos('cboProfec', '#cbopro');
			});

			$(document).delegate('#buttonPro','click',fnvaliPro);
			$(document).delegate("#buttonCat","click",fnvalidacionCat);
			$(document).delegate('#btnAcceptMaster','click',fnAcceptingRegistrationMaster);

});

/*-----------------------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO INSCRIPCION
----------------------------------------------------------*/

function fnMasterRecord(nameArchivo, identificador){
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
					document.getElementById('btnModalA').id = "btnAcceptMaster";
					$('#btnModalC').fadeOut(1);
					$('#myModalLabel').text('Catedratico Registrado Correctamente');
					content = '<p>Su Usuario es: <strong>' + campos.usuario + '</strong></p><p>Su Contraseña es: <strong>' + campos.contraseña + '</strong></p>';
					document.getElementById('myModalContenido').innerHTML = content;
					$('#myModal').modal('show');
			});
	  }
	});
}

/*-----------------------------
			ACEPTACION DE INSCRIPCION
---------------------------------*/

function fnAcceptingRegistrationMaster(){
	$('#myModal').modal('hide');
	document.getElementById('btnAcceptMaster').id = "btnModalA";
	$('#btnModalC').fadeIn(2000);
	$('#myModalLabel').text(' ');
	document.getElementById('myModalContenido').innerHTML = ' ';
	vaciarInputMCat();
}
