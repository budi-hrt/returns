$(document).ready(function () {
  // kode();

  $(".money").mask("000.000.000.000.000", {
    reverse: true,
  });
  // $(".dataTables_scrollBody").css('width', '102%');

  // Autocomplate
  // $("#karyawan").autocomplete({
  //   source: site_url + 'master/karyawan/get_autocomplete/?',
  //   select: function (event, ui) {
  //     $('[name="id_kry"]').val(ui.item.description);
  //     $('[name="karyawan"]').val(ui.item.label);
  //     let id_kry = $('[name="id_kry"]').val();
  //     cek_karyawan(id_kry);

  //   }
  // });

  // =============input nama produk======//

  // $('#karyawan').on('input', function () {
  //   $('input[name=id_kry]').val('');
  //   $('input[name=upah]').val('');
  //   $('input[name=bpjs_ks]').val('');
  //   $('input[name=bpjs_ktk]').val('');
  //   $(".hitung").hide();
  //   $('#manual').prop('checked', true);
  //   $('#otomatis').prop('checked', false);
  // });

  // $('#bpjs_ks').on('input', function () {
  //   inputIuran();
  // });

  // $('#bpjs_ktk').on('input', function () {
  //   inputIuran();
  // });

  // ===========Akhir document ready
});

$("#tambah").on("click", function () {
  $("#start_tahun").prop("disabled", false);
  $("#end_tahun").prop("disabled", false);
  $("#ptkp").prop("disabled", false);
  $("#tanggungan").prop("disabled", false);
  $("#btn_simpan").prop("disabled", false);
  $("#btn_batal").prop("disabled", false);
  console.log("tes");
});
$("#btn_batal").on("click", function () {
  $("#form_ptkp")[0].reset();
  $("#start_tahun").prop("disabled", true);
  $("#end_tahun").prop("disabled", true);
  $("#ptkp").prop("disabled", true);
  $("#tanggungan").prop("disabled", true);
  $("#btn_simpan").prop("disabled", true);
  $("#btn_batal").prop("disabled", true);
  console.log("tes");
});

// ========= Flash Data =======
const flashdata = $(".flash-data").data("flashdata");
if (flashdata == "ada") {
  $(".alert-danger")
    .html("Ops....gagal input, Priode ini sudah ada !")
    .fadeIn()
    .delay(3000)
    .fadeOut("slow");
} else if (flashdata == "insert") {
  $(".alert-success")
    .html("Berhasil input data !")
    .fadeIn()
    .delay(3000)
    .fadeOut("slow");
}
