var idUser = document.getElementById("idUser").value;

$(document).ready(function(){

  fnLoadRatings();
  fnCallIdTeacher();

  $('#op1').on('click',fnLoadRatings);
  $('#CloseSession').on('click',fnSignOut);

  $(document).delegate('select','focus',function(){
    $(this).parent().siblings('label').fadeOut().addClass('bounceOutLeft');
    $(this).parent().parent().removeClass('has-error has-feedback');
  });

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

/*--------------------------------------
			BORRAR DATOS LOCALSTORAGE
-----------------------------------------*/

function fnDeleteTemporary(){

  localStorage.removeItem('idCicloEscolar');
  // localStorage.removeItem('idTeacher');
  localStorage.removeItem('idAssignSection');
  localStorage.removeItem('idAssignCourses');
  localStorage.removeItem('idBimester');

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
