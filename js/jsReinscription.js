$(document).ready(function(){
  // fnFillingTableStudents('CallFillingTables.php', '#dataTables-example');
});

/*-----------------------------------------------------
			LLENADO DE TABLA CON ESTUDIENTES EXISTENTES
----------------------------------------------------------*/

// function fnFillingTableStudents(nameArchivo, identificador){
// 	var url = "../Functions/" + nameArchivo;
// 	$.ajax({
// 		dataType: "json",
// 	  type: "POST",
// 	  url: url,
//     data:{
//       conditional : 'reinscription'
//     },
// 	  success: function(data)
// 	  {
//
// 			$.each(data,function(index){
//         var campos = data[index];
//
//         if (campos.idEstudiante) {
//           content = '<tr id="' + campos.idEstudiante + '">' +
//                     '<td>' + campos.idEstudiante + '</td>' +
//                     '<td>' + campos.numeroCarne + '</td>' +
//                     '<td>' + campos.nombreEstudiante + '</td>' +
//                     '<td>' + campos.telefonoEstudiante + '</td>' +
//                     '<td>' + campos.usuario + '</td>' +
//                     '</tr>';
//           $(identificador).children('tbody').append(content);
//           $(".dataTables_empty").fadeOut(1);
//         }
//
// 			});
//
// 	  }
// 	});
// }
