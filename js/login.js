/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var us = /^[a-z ñáéíóú\d_]{4,15}$/i;
var pa = /^[a-z ñáéíóú\d_]{4,10}$/i;
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

/*--------------------------------------
			Verificacion de datos
-----------------------------------------*/

function verificarDatos(euser, epass)
{
	$.ajax({
		url: '../Functions/CallLogin.php',
		dataType: 'json',
		data:{
			user:euser,
			pass:epass
		},
		success: function(data){

		}
	});
}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/

function fnvalidacion(){
		resets();
		ejecutar=true;
		limpiarInput();

		if(user==""){
			$('.MensajeError').text('Usuario Requerido');
			$(".MensajeError").fadeIn();
			$("#user").addClass("holder errorinput");
			$("#spuser").addClass("errorspan");
			$("form").css("margin-top","100px");
			$('#user').val(user);
			ejecutar=false;
		}else
		{
			if (!us.test(user))
			{
				$('.MensajeError').text('Usuario Incorrecto');
				$(".MensajeError").fadeIn();
				$("#user").addClass("holder errorinput");
				$("#spuser").addClass("errorspan");
				$("form").css("margin-top","100px");
				$('#user').val(user);
				ejecutar=false;
			}else
			{
				if(password==""){
					$('.MensajeError').text('Contraseña Requerida');
					$(".MensajeError").fadeIn();
					$("#pass").addClass("holder errorinput");
					$("#sppass").addClass("errorspan");
					$("form").css("margin-top","100px");
					$('#pass').val(password);
					ejecutar=false;
				}else
				{
					if (!pa.test(password))
					{
						$('.MensajeError').text('Contraseña Incorrecta');
						$(".MensajeError").fadeIn();
						$("#pass").addClass("holder errorinput");
						$("#sppass").addClass("errorspan");
						$("form").css("margin-top","100px");
						$('#pass').val(password);
						ejecutar=false;
					}
				}
			}
		}

		if(ejecutar)
		{
			setTimeout(function(){
			$("form").css("margin-top","230px");
			},410);
		}
}

$(document).ready(function(){

	focoinput();

	$("#submit").click(function(){

		fnvalidacion()

	});

	$("#submit2").click(function(){
		fnvalidacion()
	});


});
