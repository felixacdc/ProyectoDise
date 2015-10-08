$(document).ready(function(){

	$('#CloseSession').on('click',function(){
		window.location.href = '../Functions/CallVwUsers.php?close=1';
	});
});