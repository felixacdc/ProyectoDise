/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var verifyOneMG = /^[a-zA-Z0-9. ñáéíóú]*$/;
var Grado;
var Seccion;
var ComG;
var ComS;

var Recarga = true;

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInputMG(){
	Grado=$("#txtGrad").val().trim();
	Seccion=$("#txtSec").val().trim();
	ComG = $('#cboGrado').val();
	ComS = $('#cboseccion').val();

	$("#txtGra").val(Grado);
	$("#txtSec").val(Seccion);
}

function vaciarInput(){
	$('#txtGrad').val(' ');
	$("#txtGrad").val($("#txtGrad").val().trim());

	$('#txtSec').val(' ');
	$("#txtSec").val($("#txtSec").val().trim());

	$("select#cboGrado").val("0");
	$("select#cboseccion").val("0");
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
			generalValidacion('#ErrorGradiv', '#ErrorGralbl', 'Ingrese el Grado');
		} else if (!verifyOneMG.test(Grado)){
			generalValidacion('#ErrorGradiv', '#ErrorGralbl', 'Caractires invalidos');
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
			generalValidacion('#ErrorSecdiv', '#ErrorSeclbl', 'Ingrese la seccion');
		} else if (!verifyOneMG.test(Seccion)){
			generalValidacion('#ErrorSecdiv', '#ErrorSeclbl', 'Ingrese solo letras');
		}

		if(ejecutar)
		{
			verifyS(Seccion);
		}
}

function fnvaliAsecMG(){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (ComG == null){
			generalValidacion('#ErrorCboGdiv', '#ErrorCboGlbl', 'Seleccione el Grado');
		}

		if (ComS == null){
			generalValidacion('#ErrorCboSecdiv', '#ErrorCboSeclbl', 'Seleccione la Seccion');
		}

		if(ejecutar)
		{
			verifyAsiGS(ComG, ComS);
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
			generarRegistro('CallRecordMG.php', "#frmGrado");
			fnLoadDegree();
			vaciarInput();
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
			generarRegistro('CallRecordMG.php', "#frmSec");
			fnLoadDegree();
			vaciarInput();
		}
	});
}

function verifyAsiGS(Grad, Sec)
{
	$.ajax({
		url: '../Functions/CallRecordMG.php',
		type: 'POST',
		data:{
			vGrad: Grad,
			vSec: Sec
		},
	}).done(function(answer){
		if (answer != '') {
			$('#alertE').text(answer);
			$('#alertE').show();
			$('#alertE').delay(3000).hide(600);
		} else {
			generarRegistro('CallRecordMG.php', "#frmRegAsiGS");
			fnLoadDegree();
			vaciarInput();
		}
	});
}



$(document).ready(function(){

		$(document).delegate('#buttonG','click',fnvaliGMG);
		$(document).delegate('#buttonS','click',fnvaliSMG);
		$(document).delegate('#buttonASG','click',fnvaliAsecMG);

		$(document).delegate('#tab-AGS','click',function(){
			$('select option').remove();

			generarCargaCombos('cboG', '.cboGrado');
			generarCargaCombos('cboS', '.cboseccion');
			generarCargaCombos('cboG', '#cboGrado');
			generarCargaCombos('cboS', '#cboseccion');

		});


});
