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
			frmSearch2();
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
			frmSearchThree();
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

		if(ejecutar)
		{
			// frmSearchThree();
      // fnEmptyRatings();
		}

}

function frmSearch2() {
  localStorage.idCicloEscolar = $("#cboCE").val();
  dataArray = {ciclo: localStorage.idCicloEscolar, teacher: localStorage.idTeacher};
  fnLoadCombosMore('cboAsiGgRatings', '#cboAsiGR', dataArray);
  $("#frmSearchTwo").fadeIn();
  $("#frmSearchOne").fadeOut();
}

function frmSearchThree() {
  localStorage.idAssignSection = $("#cboAsiGR").val();
  dataArray = {ciclo: localStorage.idCicloEscolar, teacher: localStorage.idTeacher, assign: localStorage.idAssignSection};
  fnLoadCombosMore('CboCourseRatings', '#CboCourse', dataArray);
  $("#frmSearchThree").fadeIn();
  $("#frmSearchTwo").fadeOut();
}
