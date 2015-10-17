/*--------------------------------------
						Cargar Combos
-----------------------------------------*/

function CargarComboGrado(){
	$.ajax({
		url: '../Functions/CallCombos.php',
		type: 'POST',
		dataType: "json",
		data: {cboG:'1'},
		success: function(data){
			$.each(data,function(index){
				var campos = data[index];
				// var id; 
				if (index == 0) {
					$("#cboGrado").append("<option value='" + campos.id +"' disabled selected>" + campos.descripcion + '</option>');
				} else {
					$("#cboGrado").append("<option value='" + campos.id +"'>" + campos.descripcion + '</option>');
				}

				// $.each(campos,function(_index){
					// if (_index == 'idGrado') {
						// $("#cboGrado").append("<option value='" + campos[_index] +"'>");
						// id = campos[_index];
					// } else {
						// $("#cboGrado").append("<option value='" + id +"'>" + campos[_index] + '</option>');
					// }
				// });
			});
		}
	});
}

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
		CargarComboGrado();
	});

	$('#op3').on('click',function(){
		$("#page-wrapper").load('VwAdmin/VwMantCat.php');
		$('a').removeClass('active-menu');
		$('#op3').addClass('active-menu');
	});


});
