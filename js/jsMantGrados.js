/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var verifyOneMG = /^[a-zA-Z0-9. ñáéíóú]*$/;

var Grado;
var Seccion;

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInputMG(){
	Grado=$("#txtGrad").val().trim();
	Seccion=$("#txtSec").val().trim();

	$("#txtGra").val(Grado);
	$("#txtSec").val(Seccion);
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

function fnvaliGMG(){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (Grado==""){
      		$("#ErrorGradiv").addClass("has-error has-feedback");
			$("#ErrorGralbl").text("Ingrese el Grado");
			$("#ErrorGralbl").addClass("animated bounceIn retraso-2");
			$('#ErrorGralbl').fadeIn();
			ejecutar=false;
		} else if (!verifyOneMG.test(Grado)){
			$("#ErrorGradiv").addClass("has-error has-feedback");
			$("#ErrorGralbl").text("Caractires invalidos");
			$("#ErrorGralbl").addClass("animated bounceIn retraso-2");
			$('#ErrorGralbl').fadeIn();
			ejecutar=false;
		}

		if(ejecutar)
		{
			verifyG(Grado);
		}

}

function fnvaliSMG(){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (Seccion==""){
      		$("#ErrorSecdiv").addClass("has-error has-feedback");
			$("#ErrorSeclbl").text("Ingrese el nombres");
			$("#ErrorSeclbl").addClass("animated bounceIn retraso-2");
			$('#ErrorSeclbl').fadeIn();
			ejecutar=false;
		} else if (!verifyOneMG.test(Seccion)){
			$("#ErrorSecdiv").addClass("has-error has-feedback");
			$("#ErrorSeclbl").text("Ingrese solo letras");
			$("#ErrorSeclbl").addClass("animated bounceIn retraso-2");
			$('#ErrorSeclbl').fadeIn();
			ejecutar=false;
		}

		if(ejecutar)
		{
			verifyS(Seccion);
		}
}

/*--------------------------------------
			Verificacion de datos
-----------------------------------------*/

function verifyG(Grad)
{
	$.ajax({
		url: '../Functions/CallRecordMG.php',
		type: 'POST',
		data:{
			rGrad: Grad
		},
	}).done(function(answer){
		if (answer != '') {
			alert(answer);
			// $('.MensajeError').text(answer);
			// $(".MensajeError").fadeIn();
		} else {
			/*REGISTRAR GRADO*/
		}
	});
}

function verifyS(Sec)
{
	$.ajax({
		url: '../Functions/CallRecordMG.php',
		type: 'POST',
		data:{
			rSec: Sec
		},
	}).done(function(answer){
		if (answer != '') {
			alert(answer);
			// $('.MensajeError').text(answer);
			// $(".MensajeError").fadeIn();
		} else {
			/*REGISTRAR GRADO*/
		}
	});
}

$(document).ready(function(){

		$(document).delegate('#buttonG','click',fnvaliGMG);
		$(document).delegate('#buttonS','click',fnvaliSMG);

});