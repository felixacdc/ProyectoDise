
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
