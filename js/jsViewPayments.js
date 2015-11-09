function fnViewPayments(id) {
  $("#myModalViewPayments .modal-body").load('VwAdmin/VwPayments.php?id=' + id + '');
  $('#myModalViewPayments').modal('show');
}
