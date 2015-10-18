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

function fnvaliAsecMG(){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (ComG == null){
      $("#ErrorCboGdiv").addClass("has-error has-feedback");
			$("#ErrorCboGlbl").text("Seleccione el Grado");
			$("#ErrorCboGlbl").addClass("animated bounceIn retraso-2");
			$('#ErrorCboGlbl').fadeIn();
			ejecutar=false;
		}

		if (ComS == null){
			$("#ErrorCboSecdiv").addClass("has-error has-feedback");
			$("#ErrorCboSeclbl").text("Seleccione la Seccion");
			$("#ErrorCboSeclbl").addClass("animated bounceIn retraso-2");
			$('#ErrorCboSeclbl').fadeIn();
			ejecutar=false;
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
			registarAsigSG();
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

function registarAsigSG(){
	var url = "../Functions/CallRecordMG.php"; // El script a dónde se realizará la petición.

	$.ajax({
	  type: "POST",
	  url: url,
	  data: $("#frmRegAsiGS").serialize(), // Adjuntar los campos del formulario enviado.
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
		$(document).delegate('#buttonASG','click',fnvaliAsecMG);

		$(document).delegate('#tab-AGS','click',function(){
			$('select option').remove();
			CargarComboGrado();
			CargarComboSeccion();
		});

});

/*--------------------------------------
						Cargar Combos
-----------------------------------------*/

function CargarComboGrado(){
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboG:'1'},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				// var id;
				if (index == 0) {
					$("#cboGrado").append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$("#cboGrado").append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}

				// $.each(campos,function(_index){
					// if (_index == 'idGrado') {
						// $("#cboGrado").append("<option value='" + campos[_index] +"'>");
						// id = campos[_index];
					// } else {
						// $("#cboGrado").append("<option value='" + id +"'>" + campos[_index] + '</option>');
					// }
				// });
			});
		}
	});
}

function CargarComboSeccion(){
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboS:'1'},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				if (index == 0) {
					$("#cboseccion").append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$("#cboseccion").append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}
			});
		}
	});
}
