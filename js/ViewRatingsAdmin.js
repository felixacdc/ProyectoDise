var ejecutar = true;

function fnViewRatings(id) {

  $('#tableBimesterOne tbody').children('tr').remove();
  $('#tableBimesterTwo tbody').children('tr').remove();
  $('#tableBimesterThree tbody').children('tr').remove();
  $('#tableBimesterFour tbody').children('tr').remove();

  $('#frmSearchTwoRatings').fadeOut();

  localStorage.idStudent = id;

    $('#myModalViewRatings').modal('show');
}

$(document).ready(function(){
  $(document).delegate('#btnSearchCe','click',fnValidateCe);
});

/*--------------------------------------
					VACIAR DATOS
-----------------------------------------*/

function fnEmptyRatings(){
  $("select#cboCE").val("0");
}

/*--------------------------------------
					Funciones Validar
-----------------------------------------*/

function fnValidateCe(){
		ejecutar=true;
		resetClass();

		if ($("#cboCE").val() == null){
			generalValidacion('#ErrorCEdiv', '#ErrorCElbl', 'Seleccione el ciclo escolar');
		}

		if(ejecutar)
		{
      localStorage.idCicloEscolar = $("#cboCE").val();
      dataArray = {ciclo: localStorage.idCicloEscolar, student: localStorage.idStudent};
			fnViewDataRatings(dataArray, 'frmViewRatings', "#frmSearchTwoRatings");
      fnEmptyRatings();
		}

}

/*--------------------------------------
			BORRAR DATOS LOCALSTORAGE
-----------------------------------------*/

function fnDeleteTemporary(){

  localStorage.removeItem('idCicloEscolar');
  localStorage.removeItem('idStudent');

}

/*--------------------------------------
					CARGAR NOTAS
-----------------------------------------*/

function fnViewDataRatings(dataArray, conditional, divIn) {
  $.ajax({
		url: '../Functions/CallFnStudent.php',
		type: 'POST',
		dataType: "json",
		data: {
			fnPOST :conditional,
			data : dataArray
		},
		success: function(data){
      var verifyOne = false;
      var verifyTwo = false;
      var verifyThree = false;
      var verifyFour = false;
      var verifyGloval = true;

			$.each(data,function(index){

        var campos = data[index];

        if (campos.id == "-1") {

          $('#alertE').text(campos.nombre);
    			$('#alertE').show();
    			$('#alertE').delay(3000).hide(1000);
          verifyGloval = false;

        }else{
          switch (campos.idBimester) {
            case '1':
              verifyOne = true;
              content = '<tr>' +
                        '<td>' + campos.curso + '</td>' +
                        '<td>' + campos.procedural + '</td>' +
                        '<td>' + campos.Actitudinal + '</td>' +
                        '<td>' + campos.Exam + '</td>' +
                        '<td>' + campos.TotalScore + '</td>' +
                        '</tr>';
              $('#tableBimesterOne').children('tbody').append(content);
              break;
            case '2':
              verifyTwo = true;
              content = '<tr>' +
                        '<td>' + campos.curso + '</td>' +
                        '<td>' + campos.procedural + '</td>' +
                        '<td>' + campos.Actitudinal + '</td>' +
                        '<td>' + campos.Exam + '</td>' +
                        '<td>' + campos.TotalScore + '</td>' +
                        '</tr>';
              $('#tableBimesterTwo').children('tbody').append(content);
              break;
            case '3':
              verifyThree = true;
              content = '<tr>' +
                        '<td>' + campos.curso + '</td>' +
                        '<td>' + campos.procedural + '</td>' +
                        '<td>' + campos.Actitudinal + '</td>' +
                        '<td>' + campos.Exam + '</td>' +
                        '<td>' + campos.TotalScore + '</td>' +
                        '</tr>';
              $('#tableBimesterThree').children('tbody').append(content);
              break;
            case '4':
              verifyFour = true;
              content = '<tr>' +
                        '<td>' + campos.curso + '</td>' +
                        '<td>' + campos.procedural + '</td>' +
                        '<td>' + campos.Actitudinal + '</td>' +
                        '<td>' + campos.Exam + '</td>' +
                        '<td>' + campos.TotalScore + '</td>' +
                        '</tr>';
              $('#tableBimesterFour').children('tbody').append(content);
              break;

          }
        }
			});

      if (verifyOne == false) {
        content = '<tr><td colspan="5" style="text-align: center;"><h4>No se han Ingresado Notas</h4></td></tr>';
        $('#tableBimesterOne').children('tbody').append(content);
      }

      if (verifyTwo == false) {
        content = '<tr><td colspan="5" style="text-align: center;"><h4>No se han Ingresado Notas</h4></td></tr>';
        $('#tableBimesterTwo').children('tbody').append(content);
      }

      if (verifyThree == false) {
        content = '<tr><td colspan="5" style="text-align: center;"><h4>No se han Ingresado Notas</h4></td></tr>';
        $('#tableBimesterThree').children('tbody').append(content);
      }

      if (verifyFour == false) {
        content = '<tr><td colspan="5" style="text-align: center;"><h4>No se han Ingresado Notas</h4></td></tr>';
        $('#tableBimesterFour').children('tbody').append(content);
      }

      if (verifyGloval == true) {
        $(divIn).fadeIn();
      }

		}
	});
}
