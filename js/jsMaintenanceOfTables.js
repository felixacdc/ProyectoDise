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

  switch (functions) {
    case 'Degree':
      fnValidateDegree(element, id);
      break;
    case 'Section':
      fnValidateSection(element, id);
      break;

  }
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

function fnVerifyDegree(element, id) {
  $.ajax({
		url: '../Functions/CallRecordMG.php',
		type: 'POST',
		data:{
			rGrad: element.val(),
      id: id,
      frm: 'Degree'
		},
	}).done(function(answer){
		if (answer != '') {
			fnValidateOne(element, answer);
		} else {
			generarModify(element.val(), id);
			fnLoadDegree();
			vaciarInput();
		}
	});
}

function generarModify(element, id) {
  var url = "../Functions/CallMaintenanceOfTable.php";
	$.ajax({
	  type: "POST",
	  url: url,
    data:{
			datas: element,
      id: id,
      modify: 'Degree'
		},
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
	  }
	});
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

function fnVerifySection(element, id) {
  $.ajax({
		url: '../Functions/CallRecordMG.php',
		type: 'POST',
		data:{
			Section: element.val(),
      id: id,
      frm: 'Section'
		},
	}).done(function(answer){
		if (answer != '') {
			fnValidateOne(element, answer);
		} else {
			fnGenerateModifySection(element.val(), id);
			fnLoadDegree();
			vaciarInput();
		}
	});
}

function fnGenerateModifySection(element, id) {
  var url = "../Functions/CallMaintenanceOfTable.php";
	$.ajax({
	  type: "POST",
	  url: url,
    data:{
			datas: element,
      id: id,
      modify: 'Section'
		},
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
	  }
	});
}
/*--------------------------------------
				FIN FUNCIONES PARA SECCIONES
-----------------------------------------*/
