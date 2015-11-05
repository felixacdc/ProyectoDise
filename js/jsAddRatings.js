var ejecutar = true;

$(document).ready(function(){

  $(document).delegate('#btnSearchCe','click',fnValidateCe);
  $(document).delegate('#btnSearchTwo','click',fnValidateSearchTwo);
  $(document).delegate('#btnSearchThree', 'click',fnValidateSearchThree);
  $(document).delegate('#btnAddRatings', 'click',fnValidateAddRatings);

  $(document).delegate('.sum','focusout',function(){
    var obj = $(this).parent().parent().find('.total').find('.form-control');
    var sums = $(this).parent().siblings('td').find('.form-control');

    procedimental = parseFloat(sums[0].value) || 0;
    actitudinal = parseFloat(sums[1].value) || 0;
    examen = parseFloat($(this).val()) || 0;

    sum = procedimental + actitudinal  + examen;
    obj.val(sum);
  });

});

function fnEmptyRatings(){
  $("select#cboCE").val("0");
  $("select#cboAsiGR").val("0");
  $("select#CboCourse").val("0");
  $("select#cboBimester").val("0");
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
      dataArray = {ciclo: localStorage.idCicloEscolar, teacher: localStorage.idTeacher};
			frmSearch(dataArray, 'cboAsiGgRatings', '#cboAsiGR', "#frmSearchTwo", "#frmSearchOne");
      fnEmptyRatings();
		}

}

/*--------------------------------------
					Funciones Validar
-----------------------------------------*/

function fnValidateSearchTwo(){
		ejecutar=true;
		resetClass();

		if (document.getElementById('cboAsiGR').value == '0'){
			generalValidacion('#ErrorAsiGRdiv', '#ErrorAsiGRlbl', 'Seleccione el Grado');
		}

		if(ejecutar)
		{
      localStorage.idAssignSection = $("#cboAsiGR").val();
      dataArray = {ciclo: localStorage.idCicloEscolar, teacher: localStorage.idTeacher, assign: localStorage.idAssignSection};
      frmSearch(dataArray, 'CboCourseRatings', '#CboCourse', "#frmSearchThree", "#frmSearchTwo");
      generarCargaCombos("cboBimester","#cboBimester");
      fnEmptyRatings();
		}

}

/*--------------------------------------
					Funciones Validar
-----------------------------------------*/

function fnValidateSearchThree(){
		ejecutar=true;
		resetClass();

		if (document.getElementById('CboCourse').value == '0'){
			generalValidacion('#ErrorCboCoursediv', '#ErrorCboCourselbl', 'Seleccione el Curso');
		}

    if (document.getElementById('cboBimester').value == '0'){
			generalValidacion('#ErrorBimesterdiv', '#ErrorBimesterlbl', 'Seleccione el Curso');
		}

		if(ejecutar)
		{
			fnLoadStudents();
		}

}

/*--------------------------------------
					Funciones Validar
-----------------------------------------*/

function fnValidateAddRatings(){
		ejecutar=true;
		resetClass();

    var totales = $('.total');

    alert(totales);
		// if (document.getElementById('CboCourse').value == '0'){
		// 	generalValidacion('#ErrorCboCoursediv', '#ErrorCboCourselbl', 'Seleccione el Curso');
		// }
    //
    // if (document.getElementById('cboBimester').value == '0'){
		// 	generalValidacion('#ErrorBimesterdiv', '#ErrorBimesterlbl', 'Seleccione el Curso');
		// }

		if(ejecutar)
		{
			// fnLoadStudents();
		}

}

function frmSearch(dataArray, conditional, idcbo, divIn, divOut){
  fnLoadCombosMore(conditional, idcbo, dataArray);
  $(divIn).fadeIn();
  $(divOut).fadeOut();
}

function fnLoadStudents() {
  localStorage.idAssignCourses = document.getElementById('CboCourse').value;
  localStorage.idBimester = document.getElementById('cboBimester').value;

  $.ajax({
		url: '../Functions/CallRatings.php',
		type: 'POST',
		dataType: "json",
		data: {
      conditional : 'loadStudents',
      idAssign : localStorage.idAssignSection,
      idciclo :  localStorage.idCicloEscolar
    },
		success: function(data){
      $('#frmAddRatings').fadeIn();
      $("#frmSearchThree").fadeOut();
			$.each(data,function(index){
        var campos = data[index];
        content = '<tr id="' + campos.id + '">' +
                  '<td>' + campos.nombre + '</td>' +
                  '<td><input type="text" class="form-control sum" placeholder="Nota"></td>' +
                  '<td><input type="text" class="form-control sum" placeholder="Nota"></td>' +
                  '<td><input type="text" class="form-control sum" placeholder="Nota"></td>' +
                  '<td class="total"><div class="form-group" id="ErrorBimesterdiv"><input type="text" class="form-control" placeholder="Nota" value="0.00" disabled="true"></div></td>' +
                  '</tr>';
        $('#tableRatings').children('tbody').append(content);

			});
		}
	});
}

// function frmSearch2() {
//   localStorage.idCicloEscolar = $("#cboCE").val();
//   dataArray = {ciclo: localStorage.idCicloEscolar, teacher: localStorage.idTeacher};
//   fnLoadCombosMore('cboAsiGgRatings', '#cboAsiGR', dataArray);
//   $("#frmSearchTwo").fadeIn();
//   $("#frmSearchOne").fadeOut();
// }

// function frmSearchThree() {
//   localStorage.idAssignSection = $("#cboAsiGR").val();
//   dataArray = {ciclo: localStorage.idCicloEscolar, teacher: localStorage.idTeacher, assign: localStorage.idAssignSection};
//   fnLoadCombosMore('CboCourseRatings', '#CboCourse', dataArray);
//   $("#frmSearchThree").fadeIn();
//   $("#frmSearchTwo").fadeOut();
// }
