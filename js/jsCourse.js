/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;

var Course;


$(document).ready(function(){
  $(document).delegate('#btnCourse', 'click', fnValidateCourse);

  $(document).delegate('#tab-AssignCourses','click',function(){
    fnLoadAssignCourses();
  });
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
}

/*--------------------------------------
					Funcion Validar
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

/*--------------------------------------
					Funciones Funcionamiento
-----------------------------------------*/

function fnLoadAssignCourses(){

    $('select option').remove();
    generarCargaCombos('cboAsigG', '#cboAsiGR');
    generarCargaCombos('cboCE', '#cboCE');
    generarCargaCombos('CboCourse', '#CboCourse');
    generarCargaCombos('CboTeacher', '#CboTeacher');

}
