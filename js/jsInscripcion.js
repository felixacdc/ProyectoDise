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
					Funcion Validar
-----------------------------------------*/

function fnvalidacion(){
		ejecutar=true;
		limpiarInput();
		// resetClass();

		if (nombreE==""){
      $("#ErrorNomdiv").addClass("has-error has-feedback");
			$("#ErrorNomlbl").text("Ingrese sus nombres");
			$('#ErrorNomlbl').fadeIn();
			ejecutar=false;
		} // else if (!verifyOne.test(nombreE)){
		// 	$("#helpname").text("Ingrese solo letras");
		// 	$('#helpname').fadeIn();
		// 	ejecutar=false;
		// }
    //
		// if (lastName==""){
		// 	$("#helplast").text("Ingrese sus apellidos");
		// 	$('#helplast').fadeIn();
		// 	ejecutar=false;
		// } else if (!verifyOne.test(lastName)){
		// 	$("#helplast").text("Ingrese solo letras");
		// 	$('#helplast').fadeIn();
		// 	ejecutar=false;
		// }
    //
		// if (email==""){
		// 	$("#helpemail").text("Ingrese su correo electronico");
		// 	$('#helpemail').fadeIn();
		// 	ejecutar=false;
		// } else if (!verifyThree.test(email)){
		// 	$("#helpemail").text("Correo Electronico invalido");
		// 	$('#helpemail').fadeIn();
		// 	ejecutar=false;
		// }
    //
		// if (phone==""){
		// 	$("#helpphone").text("Ingrese su telefono");
		// 	$('#helpphone').fadeIn();
		// 	ejecutar=false;
		// } else if (!verifyTwo.test(phone)){
		// 	$("#helpphone").text("Ingrese solo numeros");
		// 	$('#helpphone').fadeIn();
		// 	ejecutar=false;
		// } else if (phone.length != 8)
		// {
		// 	$("#helpphone").text("Ingrese un numero con 8 digitos");
		// 	$('#helpphone').fadeIn();
		// 	ejecutar=false;
		// }
    //
		// if (plan==null){
		// 	$("#helpplan").text("Seleccione su plan");
		// 	$('#helpplan').fadeIn();
		// 	ejecutar=false;
		// }
    //
		// if (code==""){
		// 	$("#helpcode").text("Ingrese su codigo");
		// 	$('#helpcode').fadeIn();
		// 	ejecutar=false;
		// } else if (!verifyFore.test(code)){
		// 	$("#helpcode").text("Caracteres invalidos");
		// 	$('#helpcode').fadeIn();
		// 	ejecutar=false;
		// }
    //
		// if(ejecutar)
		// {
		// 	verifyCode(code);
		// }

}

$(document).ready(function(){
  $("#buttone").on("click",function(){
		fnvalidacion();
	});
});
