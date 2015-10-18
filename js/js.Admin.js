
$(document).ready(function(){

	$('#CloseSession').on('click',function(){
		window.location.href = '../Functions/CallVwUsers.php?close=1';
	});

	$('#op1').on('click',function(){
		$("#page-wrapper").load('VwAdmin/VwInscripcion.php');
		$('a').removeClass('active-menu');
		$('#op1').addClass('active-menu');
	});

	$('#op2').on('click',function(){
		$("#page-wrapper").load('VwAdmin/VwMantGrados.php');
		$('a').removeClass('active-menu');
		$('#op2').addClass('active-menu');
	});

	$('#op3').on('click',function(){
		$("#page-wrapper").load('VwAdmin/VwMantCat.php');
		$('a').removeClass('active-menu');
		$('#op3').addClass('active-menu');
	});


});
