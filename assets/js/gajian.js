$(document).ready(function () {
  $('#table-listGaji').DataTable();
  kode_pending();
});
const kode_pending = () => {
  $.ajax({
    url: base_url + 'gaji/management_gaji/kode_pending',
    dataType: 'json',
    success: function (data) {
      $('input[name=kode_pending]').val(data.kode_pending.kode_gajian);
      $('input[name=ket_gaji]').val(data.kode_pending.ket_gajian);
      $('#bulan').val(data.kode_pending.bulan);
      $('#tahun').val(data.kode_pending.tahun);

      disable();
    }
  });
}

const disable = () => {
  let kode_pending = $("#kode_pending").val();
  if (kode_pending !== '') {
    document.getElementById('bulan').disabled = true;
    document.getElementById('tahun').disabled = true;
    // $('#buat').hide();
    $("#buat").css("display", "none");
    $("#simpan_keluar").css("display", "block");
  }
}


