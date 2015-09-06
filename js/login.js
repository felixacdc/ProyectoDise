/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var user;
var password;

/*--------------------------------------
			Funcion de enfoques
				en input
-----------------------------------------*/

function focoinput(){
	$("#user").focusin(function(){
	  $(".inputUserIcon").css("color", "#e74c3c");
	}).focusout(function(){
	  $(".inputUserIcon").css("color", "white");
	});

	$("#pass").focusin(function(){
	  $(".inputPassIcon").css("color", "#e74c3c");
	}).focusout(function(){
	  $(".inputPassIcon").css("color", "white");
	});
}

/*--------------------------------------
			Reset DE TEXT
-----------------------------------------*/

function resets(){
	$(".MensajeError").fadeOut();
	$("#spuser").css("color", "white");
	$("#sppass").css("color", "white");
	$("#user").removeClass("holder errorinput");
	$("#spuser").removeClass("errorspan");
	$("#pass").removeClass("holder errorinput");
	$("#sppass").removeClass("errorspan");
}

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInput(){
	user=$("#user").val().trim();
	password=$("#pass").val().trim();
}




$(document).ready(function(){

	focoinput();

	$("#submit").click(function(){
		resets();
		ejecutar=true;
		limpiarInput();

		if(user==""){
			$('.MensajeError').text('Usuario y Contraseña Requeridos');
			$(".MensajeError").fadeIn();
			$("#user").addClass("holder errorinput");
			$("#spuser").addClass("errorspan");
			$("form").css("margin-top","100px");			
			$('#user').val(user);			
			ejecutar=false;
		}

		if(password==""){
			$('.MensajeError').text('Usuario y Contraseña Requeridos');
			$(".MensajeError").fadeIn();
			$("#pass").addClass("holder errorinput");
			$("#sppass").addClass("errorspan");
			$("form").css("margin-top","100px");			
			$('#pass').val(password);			
			ejecutar=false;
		}

		if(ejecutar)
		{	
			
			setTimeout(function(){
			$("form").css("margin-top","230px");
			},410);
		}
		
	});

	$("#submit2").click(function(){
		$(".MensajeError").fadeIn();
		$("form").css("margin-top","50px");
	});
	

});