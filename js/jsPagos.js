/*--------------------------------------
		DECLARACION DE VARIABLES
-----------------------------------------*/
var ejecutar=true;
var carnet;

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function limpiarInputPagos(){
	carnet=$("#txtCarnet").val().trim();

	$('#txtCarnet').val(carnet);
}

function vaciarInputPagos(){
	$("#txtCarnet").val(' ');

  $("#txtCarnet").val($("#txtCarnet").val().trim());
}

/*--------------------------------------
					     VALIDACION
-----------------------------------------*/

function fnvalidacionCarnet(){
		ejecutar=true;
		limpiarInputPagos();
		resetClass();

		// ************ VALIDACION ENCARGADO ****************

		if (carnet==""){
      generalValidacion('#ErrorCarnetdiv', '#ErrorCarnetlbl', 'Ingrese el Carnet');
		} else if (!verifyFore.test(carnet)){
			generalValidacion('#ErrorCarnetdiv', '#ErrorCarnetlbl', 'Ingrese Solo Caracteres Validos');
		}

		if(ejecutar)
		{
			searchCarnet(carnet, 'CallPagos.php', 'pagoCarnet')
		}

}

$(document).ready(function(){

  $(document).delegate("#buttonPago","click",fnvalidacionCarnet);
})

function searchCarnet(value, file, instruction){
  $.ajax({
		url: '../Functions/' + file,
    dataType: 'json',
		type: 'POST',
		data:{
			value: value,
      instruction: instruction
		},
	}).done(function(data){
    $.each(data,function(index){
      var campos = data[index];
      if (index == 0) {
        $("#txtPstudy").val(campos.id + '-' + campos.descripcion);
        generarCargaCombos('CboTipoP', '#CboTipoP');
				generarCargaCombos('CboNivelA', '#CboNivelA');
      }
    });
	});
}
