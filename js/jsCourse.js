/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;

var Course;


$(document).ready(function(){

  $(document).delegate('#btnCourse', 'click', fnValidateCourse);
  $(document).delegate('#tab-AssignCourses','click',fnLoadAssignCourses);
  $(document).delegate('#btnAssignCourses', 'click', fnValidateAssignCourse);

});

/*--------------------------------------
					Limpiar Contenidos
-----------------------------------------*/

function fnCleanCourse(){
  Course=$("#txtCourse").val().trim();

  $("#txtCourse").val(Course);
}

function fnEmptyCourse(){
	$("#txtCourse").val(' ');

	$("#txtCourse").val($("#txtCourse").val().trim());

  $("select#cboGrado").val("0");
  $("select#CboCourse").val("0");
  $("select#CboTeacher").val("0");
  $("select#cboCE").val("0");
}

/*--------------------------------------
					Funciones Validar
-----------------------------------------*/

function fnValidateCourse(){
		ejecutar=true;
		fnCleanCourse();
		resetClass();

		if (Course==""){
			generalValidacion('#ErrorCoursediv', '#ErrorCourselbl', 'Ingrese el Curso');
		} else if (!verifyOne.test(Course)){
			generalValidacion('#ErrorCoursediv', '#ErrorCourselbl', 'Caractires invalidos');
		}

		if(ejecutar)
		{
			generarRegistro('CallRecordCourse.php', "#frmCourse");
      fnEmptyCourse();
		}

}

function fnValidateAssignCourse(){
  ejecutar=true;
  fnCleanCourse();
  resetClass();

  if ($("#cboGrado").val()== null){
    generalValidacion('#ErrorCboGdiv', '#ErrorCboGlbl', 'Seleccione el Grado');
  }

  if ($("#CboCourse").val() == 0){
    generalValidacion('#ErrorCboCoursediv', '#ErrorCboCourselbl', 'Seleccione el Curso');
  }

  if ($("#CboTeacher").val() == 0){
    generalValidacion('#ErrorCboTeacherdiv', '#ErrorCboTeacherlbl', 'Seleccione el Catedratico');
  }

  if ($("#cboCE").val() == null){
    generalValidacion('#ErrorCEdiv', '#ErrorCElbl', 'Seleccione el Ciclo Escolar');
  }

  if(ejecutar)
  {
    generarRegistro('CallRecordCourse.php', "#frmAssignCourses");
    fnEmptyCourse();
  }

}

/*--------------------------------------
					Funciones Funcionamiento
-----------------------------------------*/

function fnLoadAssignCourses(){

    $('select option').remove();
    generarCargaCombos('cboG', '#cboGrado');
    generarCargaCombos('cboCE', '#cboCE');
    generarCargaCombos('CboCourse', '#CboCourse');
    generarCargaCombos('CboTeacher', '#CboTeacher');

}
