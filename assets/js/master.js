$(document).ready(function () {
  $('#table-suplier').DataTable();

});


$('#table-suplier').on('click', '.item-edit', function () {
  const id = $(this).attr('data');
  $.ajax({
    type: 'get',
    url: base_url + 'master/suplier/getsuplier',
    data: {
      id: id
    },
    dataType: 'json',
    success: function (data) {
      $("#suplier-edit").modal('show');
      $('input[name=idsuplier]').val(data.id);
      $('input[name=kodeedit]').val(data.kode_suplier);
      $('input[name=namaedit]').val(data.nama_suplier);
      $('input[name=alamatedit]').val(data.alamat_suplier);
      $('input[name=telephoneedit]').val(data.telephone_suplier);

    }
  });
});


// ====Level===
$('#table-level').on('click', '.item-edit', function () {
  const id = $(this).attr('data');
  $.ajax({
    type: 'get',
    url: base_url + 'master/level/getlevel',
    data: {
      id: id
    },
    dataType: 'json',
    success: function (data) {
      $("#level-edit").modal('show');
      $('input[name=idedit_level]').val(data.id);
      $('input[name=leveledit]').val(data.nama_level);
    }
  });
});

// Akhir Level=========
