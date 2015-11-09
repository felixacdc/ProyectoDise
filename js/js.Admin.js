function fnInicio(){
	$("#page-wrapper").load('VwAdmin/VwInscripcion.php');
	$('select option').remove();
	$('a').removeClass('active-menu');
	$('#op1').addClass('active-menu');
}

function fnLoadDegree() {
	$("#page-wrapper").load('VwAdmin/VwMantGrados.php');
	$('a').removeClass('active-menu');
	$('#op2').addClass('active-menu');
}

function fnLoadCourses() {
	$("#page-wrapper").load('VwAdmin/VwCursos.php');
	$('a').removeClass('active-menu');
	$('#op5').addClass('active-menu');
}

$(document).ready(function(){

	$('#CloseSession').on('click',function(){
		window.location.href = '../Functions/CallVwUsers.php?close=1';
	});

	fnInicio();

	$('#op1').on('click',fnInicio);

	$('#op2').on('click',fnLoadDegree);

	$('#op3').on('click',function(){
		$("#page-wrapper").load('VwAdmin/VwMantCat.php');
		$('a').removeClass('active-menu');
		$('#op3').addClass('active-menu');
	});

	$('#op4').on('click',cargarPaginaPagos);

	$('#op5').on('click',fnLoadCourses);

	$('#opRi').on('click',function(){
		$("#page-wrapper").load('VwAdmin/VwReinscripcion.php');
		$('a').removeClass('active-menu');
		$('#opRi').addClass('active-menu');
	});


});

/*--------------------------------------
			Verificacion de datos
-----------------------------------------*/

function verifyData(register, idLabel, idDiv, fileRegister, idForm)
{
	$.ajax({
		url: '../Functions/CallVerifyData.php',
		type: 'POST',
		data:{
			data: register,
			conditional: idForm
		},
	}).done(function(answer){
		if (answer != '') {
			$(idDiv).addClass("has-error has-feedback");
			$(idLabel).text(answer);
			$(idLabel).addClass("animated bounceIn retraso-2");
			$(idLabel).fadeIn();
		} else {

			switch (idForm) {
				case '#frmProfe':
					generarRegistro(fileRegister, idForm);
					vaciarInputMCat();
					break;
				case '#frmCourse':
					generarRegistro(fileRegister, idForm);
					fnLoadCourses();
					fnEmptyCourse();
			}

		}
	});
}

/*--------------------------------------
			Verificacion de datos
-----------------------------------------*/
function verifyDataTwo(arrayData, fileRegister, idForm)
{
	$.ajax({
		url: '../Functions/CallVerifyData.php',
		type: 'POST',
		data:{
			data: arrayData,
			conditional: idForm
		},
	}).done(function(answer){
		if (answer != '') {
			$('#alertE').text(answer);
			$('#alertE').show();
			$('#alertE').delay(3000).hide(600);
		} else {

			switch (idForm) {
				case '#frmAssignCourses':
					generarRegistro(fileRegister, idForm);
					fnEmptyCourse();
			}

		}
	});
}
