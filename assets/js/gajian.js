$('#table-gajian').dataTable();

// Klick Tambah
$("#tambah").click(function () {

  $('#form-gajian')[0].reset();
  $('#modal-gajian').modal('show');
  $('#modal-gajian').find('.modal-title').text('Tambah gaji');
  $('#form-gajian').attr('action', base_url + 'gaji/kelola_gaji/tambah');
});

$('#priode').datepicker({
  dateFormat: "dd-mm-yy",
  changeMonth: true,
  changeYear: true,

});