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

			$('#cboGrado option').remove();
			$('#cboseccion option').remove();

			generarCargaCombos('cboG', '#cboGrado');
			generarCargaCombos('cboS', '#cboseccion');

			$('.cboGrado option').remove();
			$('.cboseccion option').remove();

		 generarCargaCombos('cboG', '.cboGrado');
		 generarCargaCombos('cboS', '.cboseccion');

			// $('#tableAssignSection tbody').children('tr').remove()

			// fnFillingTableStudents('CallFillingTables.php', '#tableAssignSection', 'tableAssignSection');

		});




});

// function fnFillingTableStudents(nameArchivo, identificador, conditional){
// 	var url = "../Functions/" + nameArchivo;
// 	$.ajax({
// 		dataType: "json",
// 	  type: "POST",
// 	  url: url,
//    data:{
//      conditional : conditional
//    },
// 	  success: function(data)
// 	  {
// 			$.each(data,function(index){
//        var campos = data[index];
//        if (campos.idAsignacionSeccion) {
//          content = '<tr id="' + campos.idAsignacionSeccion + '">' +
// 	                   '<td><div class="form-group" style="color: transparent">' +
// 										 '<input type="hidden" name="cbos" value="' + campos.idGrado + '"/>' +
// 										 '<SELECT NAME="cbo1" class="form-control cboGrado" SIZE=0 disabled="true"></SELECT>' +
// 										 campos.Grado + '</div></td>' +
// 										 '<td><div class="form-group" style="color: transparent">' +
// 										 '<input type="hidden" name="cbos" value="' + campos.idSeccion + '"/>' +
// 										 '<SELECT NAME="cbo1" class="form-control cboseccion" SIZE=0 disabled="true"></SELECT>' +
// 										 campos.Seccion + '</div></td>' +
// 										 '<td style="text-align: center;" class="btnActions">' +
// 										 	'<div class="btn-group">' +
// 												'<button class="btn btn-primary" onclick="fnModifyGeneral(\'' + campos.idAsignacionSeccion +
// 										 		'\', \'tableAssignSection\')"><i class="fa fa-pencil"></i></button>' +
// 										 		'<button class="btn btn-success" onclick="fnAcceptGeneral(\'' + campos.idAsignacionSeccion +
// 												'\', \'tableAssignSection\', \'AssignSection\')"><i class="fa fa-check"></i></button>' +
// 												'<button class="btn btn-danger" onclick="fnDeleteGeneral(\'' + campos.idAsignacionSeccion +
// 												'\', \'AssignSection\')"><i class="fa fa-trash-o"></i></button></div></td>' +
//                    '</tr>';
//          $(identificador).children('tbody').append(content);
// 				 $('#tableAssignSection').dataTable();
//
// 		 			$('.cboGrado option').remove();
// 		 			$('.cboseccion option').remove();
//
// 				 generarCargaCombos('cboG', '.cboGrado');
// 				 generarCargaCombos('cboS', '.cboseccion');
//        }
// 			});
// 	  }
// 	});
// }
