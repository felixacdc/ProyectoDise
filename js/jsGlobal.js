/*--------------------------------------
				Reset Clases
-----------------------------------------*/

function resetClass(){
	$('.control-label').removeClass('bounceOutLeft');
}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/
function generalValidacion(identificador1, identificador2, msm){
	$(identificador1).addClass("has-error has-feedback");
	$(identificador2).text(msm);
	$(identificador2).addClass("animated bounceIn retraso-2");
	$(identificador2).fadeIn();
	ejecutar=false;
}

/*--------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO
-----------------------------------------*/

function generarRegistro(nameArchivo, identificador){
	var url = "../Functions/" + nameArchivo;
	$.ajax({
	  type: "POST",
	  url: url,
	  data: $(identificador).serialize(),
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(600);
	  }
	});
}

/*-----------------------------
			CARGAR COMBOS
---------------------------------*/

function generarCargaCombos(cboPost, identificador)
{
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboPost:cboPost},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				if (index == 0) {
					$(identificador).append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$(identificador).append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}
			});
		}
	});
}

/*-----------------------------
			FUNCION CERRAR SECION
---------------------------------*/
function fnSignOut() {
  window.location.href = '../Functions/CallVwUsers.php?close=1';
}
