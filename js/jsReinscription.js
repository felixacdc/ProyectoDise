function fnReinscription(id) {

  $('#myModalReinscription').modal('show');
  $(document).delegate('#btnAceptarIncripcion','click',fnAcceptingRegistration);
  generarCargaCombos('cboAsigG', '#cboAsiGR');
	generarCargaCombos('cboCE', '#cboCE');

  fnLoadDataStudent(id);
  // alert(id);
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

        alert(campos.nombre);

			});
		}
	});
}
