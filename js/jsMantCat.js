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
			generarRegistro('CallRecordMCat.php', "#frmProfe");
			vaciarInputMCat();
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
			// registarEnc();
		}

}


$(document).ready(function(){

			$(document).delegate('#tab-Cat','click',function(){
				$('select option').remove();
				generarCargaCombos('cboProfec', '#cbopro');
			});

			$(document).delegate('#buttonPro','click',fnvaliPro);
			$(document).delegate("#buttonCat","click",fnvalidacionCat);

});
