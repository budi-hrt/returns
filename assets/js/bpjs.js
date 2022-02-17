$(document).ready(function () {
  // Kategori
  list_kategori();
  // Subkategori
  list_subkategori();
  hitungTotal();

  // Autocomplate
  $("#karyawan").autocomplete({
    source: site_url + 'master/karyawan/get_autocomplete/?',
    select: function (event, ui) {
      $('[name="id_kry"]').val(ui.item.description);
      $('[name="karyawan"]').val(ui.item.label);
      document.getElementById("bpjs_ks").focus();
      // $(".hitung").css("display", "block");
      $('.hitung').show();
      $('.upah').hide();
      hitungTotal();
    }
  });
  // input nama produk
  $('#karyawan').on('input', function () {
    $('input[name=id_kry]').val('');
    $('input[name=upah]').val('');
    $('input[name=bpjs_ks]').val('');
    $('input[name=bpjs_ktk]').val('');
    $(".hitung").hide();
    $('#manual').prop('checked', true);
    $('#otomatis').prop('checked', false);
  });

  // Ahir document ready
});





$('#otomatis').on('click', function () {
  const idKry = $('#id_kry').val();
  $('#manual').prop('checked', false);


  $.ajax({
    url: base_url + 'master/karyawan/get_json',
    type: "get",
    data: {
      idKry: idKry
    },
    dataType: 'json',
    success: function (data) {
      // === Cari upah ===
      var gp = parseInt(data.gaji_pokok);
      var tj = parseInt(data.tunjangan);
      var um = parseInt(data.um);
      gp = isNaN(gp) ? 0 : gp
      tj = isNaN(tj) ? 0 : tj
      um = isNaN(um) ? 0 : um
      upah = gp + tj + um;
      if (upah === 0) {
        alert('Karyawan belum punya upah');
        $('#manual').prop('checked', true);
        $('#otomatis').prop('checked', false);
        $('.upah').hide();
        document.getElementById("bpjs_ks").focus();
        hitungTotal();
      } else {
        $('[name="upah"]').val(upah);
        $('.upah').show();
        // === Hitung Bpjs Kesehatan ===
        // const iurBpjsKs = upah * 1 / 100;
        // const iurBpjsKtk = upah * 3 / 100;
        // const ttlIuran = iurBpjsKs + iurBpjsKtk;
        // $('[name="bpjs_ks"]').val(iurBpjsKs);
        // $('[name="bpjs_ktk"]').val(iurBpjsKtk);
        // $('[name="total"]').val(ttlIuran);
        hitungTotal();
      }
      //==== akhir Upah =====

    }



  });
});

const hitungTotal = () => {
  var uph = parseInt($('[name="upah"]').val());
  uph = isNaN(uph) ? 0 : uph
  const iurBpjsKs = uph * 1 / 100;
  const iurBpjsKtk = uph * 3 / 100;
  const ttlIuran = iurBpjsKs + iurBpjsKtk;
  $('[name="bpjs_ks"]').val(iurBpjsKs);
  $('[name="bpjs_ktk"]').val(iurBpjsKtk);
  $('[name="total"]').val(ttlIuran);
}

