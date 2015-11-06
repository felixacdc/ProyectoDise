$(document).ready(function(){
  fnFillingTableStudents('CallFillingTables.php', '#dataTables-example');
});

/*-----------------------------------------------------
			LLENADO DE TABLA CON ESTUDIENTES EXISTENTES
----------------------------------------------------------*/

function fnFillingTableStudents(nameArchivo, identificador){
	var url = "../Functions/" + nameArchivo;
	$.ajax({
		dataType: "json",
	  type: "POST",
	  url: url,
    data:{
      conditional : 'reinscription'
    },
	  success: function(data)
	  {
			$.each(data,function(index){
        var campos = data[index];
        alert(campos.nombre);
			});
	  }
	});
}
