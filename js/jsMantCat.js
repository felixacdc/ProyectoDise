/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var verifyOneMG = /^[a-zA-Z0-9. ñáéíóú]*$/;

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

/*--------------------------------------
				Reset Clases
-----------------------------------------*/

function resetClassMG(){
	$('.control-label').removeClass('bounceOutLeft');
}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/
