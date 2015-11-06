var idUser = document.getElementById("idUser").value;

$(document).ready(function(){

  fnLoadRatings();
  fnCallIdStudent();

  $('#op1').on('click',fnLoadRatings);
  $('#CloseSession').on('click',fnSignOut);


});

/*--------------------------------------
				Cargar Cursos
-----------------------------------------*/
function fnLoadRatings(){
	$("#page-wrapper").load('VwStudent/VwRatings.php');
	$('select option').remove();
	$('a').removeClass('active-menu');
	$('#op1').addClass('active-menu');
  generarCargaCombos('cboCE', '#cboCE');
  fnDeleteTemporary();
}

/*--------------------------------------
			BUSCAR ID DEL CATEDRATICO
-----------------------------------------*/

function fnCallIdStudent(){
  var url = "../Functions/CallFnStudent.php";
	$.ajax({
	  type: "POST",
	  url: url,
	  data: {
      idUser: idUser,
      fnPOST: 'idUser'
    },
	  success: function(data)
	  {
			localStorage.idStudent = data;
	  }
	});
}

/*--------------------------------------
			BORRAR DATOS LOCALSTORAGE
-----------------------------------------*/

function fnDeleteTemporary(){

  localStorage.removeItem('idCicloEscolar');

}
