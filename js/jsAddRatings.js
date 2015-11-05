var ejecutar = true;

$(document).ready(function(){

  $(document).delegate('#btnSearchCe','click',fnValidateCe);
  $(document).delegate('#btnSearchTwo','click',fnValidateSearchTwo);
  $(document).delegate('#btnSearchThree', 'click',fnValidateSearchThree);

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
			
		}

}

function frmSearch(dataArray, conditional, idcbo, divIn, divOut){
  fnLoadCombosMore(conditional, idcbo, dataArray);
  $(divIn).fadeIn();
  $(divOut).fadeOut();
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
