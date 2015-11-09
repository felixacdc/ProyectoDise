
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
      fnVerifyDataGeneral(arraydata, element, id, 'CallRecordMG','Degree');
      break;
    case 'Section':
      arraydata[0] = $(element).val();
      fnVerifyDataGeneral(arraydata, element, id, 'CallRecordMG','Section');
      break;
    case 'AssignSection':
      $(elementSelect).each(function(i, element) {
        arraydata[i] = $(element).val()
      });
      fnVerifyDataGeneral(arraydata, elementSelect, id, 'CallRecordMG','AssignSection');
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
function fnValidateDegree(element, id){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (element.val()==""){
      fnValidateOne(element, 'Datos Vacios')
		}

		if(ejecutar)
		{
			fnVerifyDegree(element, id);
		}

}
/*--------------------------------------
				FIN FUNCIONES PARA GRADOS
-----------------------------------------*/


/*--------------------------------------
					FUNCIONES PARA SECCIONES
-----------------------------------------*/
function fnValidateSection(element, id){
		ejecutar=true;
		limpiarInputMG();
		resetClassMG();

		if (element.val()==""){
      fnValidateOne(element, 'Datos Vacios')
		}

		if(ejecutar)
		{
			fnVerifySection(element, id);
		}

}
/*--------------------------------------
				FIN FUNCIONES PARA SECCIONES
-----------------------------------------*/
