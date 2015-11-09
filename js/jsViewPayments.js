function fnViewPayments(id) {


  // resetValidate();
  // $('#txtidStudent').val(id);
  //
  // $('#cboAsiGR option').remove();
  // $('#cboCE option').remove();
  // generarCargaCombos('cboAsigG', '#cboAsiGR');
	// generarCargaCombos('cboCE', '#cboCE');
  //
  // fnLoadDataStudent(id);
  // fnEmptyRecords();
  $("#myModalViewPayments .modal-body").load('VwAdmin/VwPayments.php?id=' + id + '');
  $('#myModalViewPayments').modal('show');
}
