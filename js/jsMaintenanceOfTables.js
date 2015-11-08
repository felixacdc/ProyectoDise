function fnModifyGeneral(id) {

  element = $('#' + id).find('td').find('input');
  elementSelect = $('#' + id).find('td').find('select');

  element.prop('disabled',false);
  elementSelect.prop('disabled',false);

}

function fnAcceptGeneral(id, functions) {

  element = $('#' + id).find('td').find('input');
  elementSelect = $('#' + id).find('td').find('select');

  switch (functions) {
    case 'Degree':
      fnValidateDegree(element, id);
      break;
    default:

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
			$('#alert').delay(3000).hide(600);

      switch (deletes) {
        case 'Degree':
          fnLoadDegree();
          vaciarInput();
          break;          
      }

	  }
	});
}

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

function fnValidateOne(element, message) {
  $(element).parent('div').addClass("has-error has-feedback");
  $('#alertE').text(message);
  $('#alertE').show();
  $('#alertE').delay(3000).hide(600);
  ejecutar = false;
}
