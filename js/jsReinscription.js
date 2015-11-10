var cycles;
var lastPayment;

$(document).ready(function(){
  $(document).delegate('#btnModalR','click',fnValidationReinscription);
});

function fnReinscription(id) {


  resetValidate();
  fnEmptyRecords();
  $('#txtidStudent').val(id);

  $('#cboAsiGR option').remove();
  $('#cboCE option').remove();
  generarCargaCombos('cboAsigG', '#cboAsiGR');
	generarCargaCombos('cboCE', '#cboCE');

  fnLoadDataStudent(id);


  $('#myModalReinscription').modal('show');
}

function fnLoadDataStudent(id) {
  $.ajax({
		url: '../Functions/CallReinscription.php',
		type: 'POST',
		dataType: "json",
		data: {
      conditional: 'load',
      idStudent: id
    },
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];

        if(campos.name){

          $('#txtNameS').val(campos.name);
          $('#txtAddressS').val(campos.address);
          $('#txtPhoneS').val(campos.phone);
          $('#txtemailS').val(campos.email);

        }

			});
		}
	});

  fnSearchCycles(id);
}

function fnSearchCycles(id) {
  $.ajax({
		url: '../Functions/CallReinscription.php',
		type: 'POST',
		dataType: "json",
		data: {
      conditional: 'searchCycles',
      idStudent: id
    },
		success: function(data){

      cycles = data;
      fnSearchLastPayment(id);

		}
	});

}

function fnSearchLastPayment(id) {
  $.ajax({
		url: '../Functions/CallReinscription.php',
		type: 'POST',
		dataType: "json",
		data: {
      conditional: 'searchLastPayment',
      idStudent: id
    },
		success: function(data){

      lastPayment = data;

		}
	});

}

/*--------------------------------------
					Funcion Validar
-----------------------------------------*/

function fnValidationReinscription(){
		ejecutar=true;
		fnClearInput();
		resetClass();

    if (nombreS==""){
			generalValidacion('#ErrorNomSdiv', '#ErrorNomSlbl', 'Ingrese el nombre');
		} else if (!verifyOne.test(nombreS)){
			generalValidacion('#ErrorNomSdiv', '#ErrorNomSlbl', 'Ingrese solo letras');
		}

		if (direccionS==""){
			generalValidacion('#ErrorDirSdiv', '#ErrorDirSlbl', 'Ingrese la Direccion');
		} else if (!verifyFore.test(direccionS)){
			generalValidacion('#ErrorDirSdiv', '#ErrorDirSlbl', 'Caracteres Incorrectos');
		}

		if (emailS==""){
			generalValidacion('#ErrorEmaSdiv', '#ErrorEmaSlbl', 'Ingrese el correo electronico');
		} else if (!verifyThree.test(emailS)){
			generalValidacion('#ErrorEmaSdiv', '#ErrorEmaSlbl', 'Correo Electronico invalido');
		}

		if (phoneS==""){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese el telefono');
		} else if (!verifyTwo.test(phoneS)){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese solo numeros');
		} else if (phoneS.length != 8){
			generalValidacion('#ErrorTelSdiv', '#ErrorTelSlbl', 'Ingrese un numero con 8 digitos');
		}

		if (AsignacionG == 0){
			generalValidacion('#ErrorAsiGRdiv', '#ErrorAsiGRlbl', 'Seleccione el Grado');
		}

		if (CicloE == null){
			generalValidacion('#ErrorCEdiv', '#ErrorCElbl', 'Seleccione el Ciclo Escolar');
		}else {
      $.each(cycles,function(index){
				var campos = cycles[index];

        if(campos.cycles == CicloE){

          generalValidacion('#ErrorCEdiv', '#ErrorCElbl', 'El estudiante ya fue incrito a este Ciclo Escolar');

        }

			});
		}

    if (ejecutar) {
      $.each(lastPayment,function(index){
				var campos = lastPayment[index];

        if(campos.Mes != '11'){

          $('#alertE').text('Faltan Pagos por realizar');
    			$('#alertE').show();
    			$('#alertE').delay(3000).hide(700);
          ejecutar=false;

        }

			});
    }

		if(ejecutar)
		{
			fnSendReinscription('CallReinscription.php', "#frmReinscription");
		}

}

/*--------------------------------------
			ENVIO DE FORMULARIOS PARA REGISTRO
-----------------------------------------*/

function fnSendReinscription(nameArchivo, identificador){
	var url = "../Functions/" + nameArchivo;
	$.ajax({
	  type: "POST",
	  url: url,
	  data: $(identificador).serialize(),
	  success: function(data)
	  {
			$('#alert').text(data);
			$('#alert').show();
			$('#alert').delay(3000).hide(700);
      $('#myModalReinscription').modal('hide');
	  }
	});
}

/*--------------------------------------
			LIMPIADO DE TEXT
-----------------------------------------*/
function fnClearInput(){
	nombreS=$("#txtNameS").val().trim();
	direccionS=$("#txtAddressS").val().trim();
  emailS=$("#txtemailS").val().trim();
  phoneS=$("#txtPhoneS").val().trim();
	AsignacionG = $("#cboAsiGR").val();
	CicloE = $("#cboCE").val();

  $("#txtNameS").val(nombreS);
	$("#txtAddressS").val(direccionS);
	$("#txtemailS").val(emailS);
	$("#txtPhoneS").val(phoneS);
}

function fnEmptyRecords(){
	$("#txtNameS").val(' ');
	$("#txtAddressS").val(' ');
	$("#txtemailS").val(' ');
	$("#txtPhoneS").val(' ');

  $("#txtNameS").val($("#txtNameS").val().trim());
	$("#txtAddressS").val($("#txtAddressS").val().trim());
	$("#txtemailS").val($("#txtemailS").val().trim());
	$("#txtPhoneS").val($("#txtPhoneS").val().trim());

	$("select#cboCE").val("0");
	$("select#cboAsiGR").val("0");

}

function resetValidate() {
  $('.control-label-input-group').fadeOut();
  $('.form-group').removeClass('has-error has-feedback');
}
