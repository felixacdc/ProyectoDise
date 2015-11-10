var cycles;

$(document).ready(function(){
  $(document).delegate('#btnModalR','click',fnValidationReinscription);
});
/*--------------------------------------
					FUNCIONES GENERALES
-----------------------------------------*/

function fnModifyGeneral(id, idtable) {

  element = $(' #' + idtable + ' tbody #' + id).find('td').find('input');
  elementSelect = $(' #' + idtable + ' tbody #' + id).find('td').find('select');

  element.prop('disabled',false);
  elementSelect.prop('disabled',false);

}

function fnAcceptGeneral(id, idtable,functions) {

  element = $(' #' + idtable + ' tbody #' + id).find('td').find('input');
  elementSelect = $(' #' + idtable + ' tbody #' + id).find('td').find('select');

  var arraydata = new Array();

  switch (functions) {
    case 'Degree':
      arraydata[0] = $(element).val();
      fnValidateDegree(arraydata, element, id, 'CallRecordMG','Degree');
      break;
    case 'Section':
      arraydata[0] = $(element).val();
      fnValidateSection(arraydata, element, id, 'CallRecordMG','Section');
      break;
    case 'AssignSection':
      $(elementSelect).each(function(i, element) {
        arraydata[i] = $(element).val()
      });
      fnVerifyDataGeneral(arraydata, elementSelect, id, 'CallRecordMG','AssignSection');
      break;
    case 'Course':
      arraydata[0] = $(element).val();
      fnValidateCoursesMan(arraydata, element, id, 'CallRecordCourse','Course');
      break;
    case 'AssignCourse':
      $(elementSelect).each(function(i, element) {
        arraydata[i] = $(element).val()
      });
      fnVerifyDataGeneral(arraydata, element, id, 'CallRecordCourse','AssignCourse');
      break;

  }
}

function generarModify(arraydata, id, modify) {
  var url = "../Functions/CallMaintenanceOfTable.php";
	$.ajax({
	  type: "POST",
	  url: url,
    data:{
			datas: arraydata,
      id: id,
      modify: modify
		},
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(800);
	  }
	});
}

function fnDeleteGeneral(id, deletes) {
  var url = "../Functions/CallMaintenanceOfTable.php";
	$.ajax({
	  type: "POST",
	  url: url,
    data:{
      id: id,
      delete: deletes
		},
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(900);

      switch (deletes) {
        case 'Degree':
          fnLoadDegree();
          vaciarInput();
          break;
        case 'Section':
          fnLoadDegree();
          vaciarInput();
          break;
        case 'AssignSection':
          fnLoadDegree();
          vaciarInput();
          break;
        case 'Course':
          fnLoadCourses();
          fnEmptyCourse();
          break;
        case 'AssignCourse':
          $('#myModalAssign').modal('hide');
          $('.modal-backdrop').remove();
          fnEmptyCourse();
          break;
      }

	  }
	});
}


function fnValidateOne(element, message) {
  $(element).parent('div').addClass("has-error has-feedback");
  $('#alertE').text(message);
  $('#alertE').show();
  $('#alertE').delay(3000).hide(600);
  ejecutar = false;
}

function fnVerifyDataGeneral(arraydata, element, id, archivo, frm){

  $.ajax({
		url: '../Functions/' + archivo + '.php',
		type: 'POST',
		data:{
			datas: arraydata,
      id: id,
      frm: frm
		},
	}).done(function(answer){
		if (answer != '') {

      switch (frm) {
        case 'AssignSection':
          $(element).each(function(i, element2) {
            fnValidateOne(element2, answer);
          });
          break;
        case 'Section':
          fnValidateOne(element, answer);
          break;
        case 'Degree':
          fnValidateOne(element, answer);
          break;
        case 'Course':
          fnValidateOne(element, answer);
          break;
        case 'AssignCourse':
          $(element).each(function(i, element2) {
            fnValidateOne(element2, answer);
          });
          break;


      }

		} else {

      switch (frm) {
        case 'AssignSection':
          generarModify(arraydata, id, 'AssignSection');
          fnLoadDegree();
          vaciarInput();
          break;
        case 'Degree':
          generarModify(arraydata, id, 'Degree');
          fnLoadDegree();
          vaciarInput();
          break;
        case 'Section':
          generarModify(arraydata, id, 'Section');
          fnLoadDegree();
          vaciarInput();
          break;
        case 'Course':
          generarModify(arraydata, id, 'Course');
          fnLoadCourses();
          fnEmptyCourse();
          break;
        case 'AssignCourse':
          generarModify(arraydata, id, 'AssignCourse');
          $('#myModalAssign').modal('hide');
          $('.modal-backdrop').remove();
          fnEmptyCourse();
          break;

      }

		}
	});


}
/*--------------------------------------
					FINAL FUNCIONES GENERALES
-----------------------------------------*/

/*--------------------------------------
					FUNCIONES PARA GRADOS
-----------------------------------------*/
function fnValidateDegree(arraydata, element, id){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (element.val()==""){
      fnValidateOne(element, 'Datos Vacios')
		}

		if(ejecutar)
		{
      fnVerifyDataGeneral(arraydata, element, id, 'CallRecordMG','Degree');
		}

}
/*--------------------------------------
				FIN FUNCIONES PARA GRADOS
-----------------------------------------*/


/*--------------------------------------
					FUNCIONES PARA SECCIONES
-----------------------------------------*/
function fnValidateSection(arraydata, element, id){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (element.val()==""){
      fnValidateOne(element, 'Datos Vacios')
		}

		if(ejecutar)
		{
			fnVerifyDataGeneral(arraydata, element, id, 'CallRecordMG','Section');
		}

}
/*--------------------------------------
				FIN FUNCIONES PARA SECCIONES
-----------------------------------------*/

/*--------------------------------------
					FUNCIONES PARA CURSOS
-----------------------------------------*/
function fnValidateCoursesMan(arraydata, element, id){
		ejecutar=true;
		fnCleanCourse();
		resetClassMG();

		if (element.val()==""){
      fnValidateOne(element, 'Datos Vacios')
		}

		if(ejecutar)
		{
			fnVerifyDataGeneral(arraydata, element, id, 'CallRecordCourse','Course');
		}

}
/*--------------------------------------
				FIN FUNCIONES PARA CURSOS
-----------------------------------------*/

/*--------------------------------------
					FUNCIONES PARA ESTUDIANTES
-----------------------------------------*/
function fnViewManStudents(id) {


  resetValidate();
  fnEmptyRecords();
  $('#txtidStudent').val(id);

  $('#cboEstado option').remove();
  generarCargaCombos('cboEstado', '#cboEstado');

  fnLoadDataStudent(id);


  $('#myModalManStudents').modal('show');
}

function resetValidate() {
  $('.control-label-input-group').fadeOut();
  $('.form-group').removeClass('has-error has-feedback');
}

function fnLoadDataStudent(id) {
  $.ajax({
		url: '../Functions/CallReinscription.php',
		type: 'POST',
		dataType: "json",
		data: {
      conditional: 'load',
      idStudent: id
    },
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];

        if(campos.name){

          $('#txtNameS').val(campos.name);
          $('#txtAddressS').val(campos.address);
          $('#txtPhoneS').val(campos.phone);
          $('#txtemailS').val(campos.email);
          $("select#cboEstado").val(campos.estado);

        }

			});
		}
	});

  fnSearchCycles(id);
}

function fnSearchCycles(id) {
  $.ajax({
		url: '../Functions/CallReinscription.php',
		type: 'POST',
		dataType: "json",
		data: {
      conditional: 'searchCycles',
      idStudent: id
    },
		success: function(data){

      cycles = data;

		}
	});

}

function fnEmptyRecords(){
	$("#txtNameS").val(' ');
	$("#txtAddressS").val(' ');
	$("#txtemailS").val(' ');
	$("#txtPhoneS").val(' ');

  $("#txtNameS").val($("#txtNameS").val().trim());
	$("#txtAddressS").val($("#txtAddressS").val().trim());
	$("#txtemailS").val($("#txtemailS").val().trim());
	$("#txtPhoneS").val($("#txtPhoneS").val().trim());

  $("select#cboEstado").val("0");

}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/

function fnValidationReinscription(){
		ejecutar=true;
		fnClearInput();
		resetClass();

    if (nombreS==""){
			generalValidacion('#ErrorNomSdiv', '#ErrorNomSlbl', 'Ingrese el nombre');
		} else if (!verifyOne.test(nombreS)){
			generalValidacion('#ErrorNomSdiv', '#ErrorNomSlbl', 'Ingrese solo letras');
		}

		if (direccionS==""){
			generalValidacion('#ErrorDirSdiv', '#ErrorDirSlbl', 'Ingrese la Direccion');
		} else if (!verifyFore.test(direccionS)){
			generalValidacion('#ErrorDirSdiv', '#ErrorDirSlbl', 'Caracteres Incorrectos');
		}

		if (emailS==""){
			generalValidacion('#ErrorEmaSdiv', '#ErrorEmaSlbl', 'Ingrese el correo electronico');
		} else if (!verifyThree.test(emailS)){
			generalValidacion('#ErrorEmaSdiv', '#ErrorEmaSlbl', 'Correo Electronico invalido');
		}

		if (phoneS==""){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese el telefono');
		} else if (!verifyTwo.test(phoneS)){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese solo numeros');
		} else if (phoneS.length != 8){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese un numero con 8 digitos');
		}

    if ($("select#cboEstado").val() == null){
			generalValidacion('#ErrorEstadodiv', '#ErrorEstadolbl', 'Seleccione el Estado');
		}

		if(ejecutar)
		{
			// fnSendReinscription('CallReinscription.php', "#frmReinscription");
		}

}

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function fnClearInput(){
	nombreS=$("#txtNameS").val().trim();
	direccionS=$("#txtAddressS").val().trim();
  emailS=$("#txtemailS").val().trim();
  phoneS=$("#txtPhoneS").val().trim();
	AsignacionG = $("#cboAsiGR").val();
	CicloE = $("#cboCE").val();

  $("#txtNameS").val(nombreS);
	$("#txtAddressS").val(direccionS);
	$("#txtemailS").val(emailS);
	$("#txtPhoneS").val(phoneS);
}


/*--------------------------------------
					FUNCIONES FIN ESTUDIANTES
-----------------------------------------*/
