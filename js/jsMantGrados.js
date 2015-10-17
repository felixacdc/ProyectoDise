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

function vaciarInput(){
	$('#txtGrad').val(' ');
	$("#txtGrad").val($("#txtGrad").val().trim());

	$('#txtSec').val(' ');
	$("#txtSec").val($("#txtSec").val().trim());
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
			$("#ErrorGradiv").addClass("has-error has-feedback");
			$("#ErrorGralbl").text(answer);
			$("#ErrorGralbl").addClass("animated bounceIn retraso-2");
			$('#ErrorGralbl').fadeIn();
		} else {
			registarGrad();
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
			$("#ErrorSecdiv").addClass("has-error has-feedback");
			$("#ErrorSeclbl").text(answer);
			$("#ErrorSeclbl").addClass("animated bounceIn retraso-2");
			$('#ErrorSeclbl').fadeIn();
		} else {
			registarSec();
		}
	});
}

/*--------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO
-----------------------------------------*/

function registarGrad(){
	var url = "../Functions/CallRecordMG.php"; // El script a dónde se realizará la petición.

	$.ajax({
	  type: "POST",
	  url: url,
	  data: $("#frmGrado").serialize(), // Adjuntar los campos del formulario enviado.
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
			vaciarInput();
	  }
	});
}

function registarSec(){
	var url = "../Functions/CallRecordMG.php"; // El script a dónde se realizará la petición.

	$.ajax({
	  type: "POST",
	  url: url,
	  data: $("#frmSec").serialize(), // Adjuntar los campos del formulario enviado.
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
			vaciarInput();
	  }
	});
}



$(document).ready(function(){

		$(document).delegate('#buttonG','click',fnvaliGMG);
		$(document).delegate('#buttonS','click',fnvaliSMG);

});
