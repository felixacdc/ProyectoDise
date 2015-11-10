var idUser = document.getElementById("idUser").value;

$(document).ready(function(){

  fnLoadRatings();
  fnCallIdTeacher();

  $('#op1').on('click',fnLoadRatings);
  $('#op2').on('click',fnLoadViewRatings);
  $('#CloseSession').on('click',fnSignOut);

});

/*--------------------------------------
				Cargar Calificaciones
-----------------------------------------*/
function fnLoadRatings(){
	$("#page-wrapper").load('VwTeacher/VwRatings.php');
	$('select option').remove();
	$('a').removeClass('active-menu');
	$('#op1').addClass('active-menu');
  generarCargaCombos('cboCE', '#cboCE');
  fnDeleteTemporary();
}

function fnLoadViewRatings(){
	$("#page-wrapper").load('VwTeacher/ViewRatings.php');
	$('select option').remove();
	$('a').removeClass('active-menu');
	$('#op2').addClass('active-menu');
  generarCargaCombos('cboCE', '#cboCE');
  fnDeleteTemporary();
}

/*--------------------------------------
			BORRAR DATOS LOCALSTORAGE
-----------------------------------------*/

function fnDeleteTemporary(){

  localStorage.removeItem('idCicloEscolar');
  // localStorage.removeItem('idTeacher');
  localStorage.removeItem('idAssignSection');
  localStorage.removeItem('idAssignCourses');
  localStorage.removeItem('idBimester');
  localStorage.removeItem('nameCourse');

}

/*--------------------------------------
			BUSCAR ID DEL CATEDRATICO
-----------------------------------------*/

function fnCallIdTeacher(){
  var url = "../Functions/CallFnTeacher.php";
	$.ajax({
	  type: "POST",
	  url: url,
	  data: {
      idUser: idUser,
      fnPOST: 'idUser'
    },
	  success: function(data)
	  {
			localStorage.idTeacher = data;
	  }
	});
}
