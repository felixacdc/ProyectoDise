var idUser = document.getElementById("idUser").value;

$(document).ready(function(){

  fnLoadRatings();
  fnCallIdTeacher();

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
}

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
			$('#idTeacher').val(data);
	  }
	});
}
