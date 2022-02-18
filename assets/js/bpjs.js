$(document).ready(function () {

  kode();
  // Kategori
  list_kategori();
  // Subkategori
  list_subkategori();


  // Autocomplate
  $("#karyawan").autocomplete({
    source: site_url + 'master/karyawan/get_autocomplete/?',
    select: function (event, ui) {
      $('[name="id_kry"]').val(ui.item.description);
      $('[name="karyawan"]').val(ui.item.label);
      document.getElementById("bpjs_ks").focus();
      $('.hitung').show();
      $('.upah').hide();
      var upah = parseInt($('[name="upah"]').val());
      hitungTotal(upah);
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

  $('#bpjs_ks').on('input', function () {
    inputIuran();
  });

  $('#bpjs_ktk').on('input', function () {
    inputIuran();
  });


  $('.money').mask('000.000.000.000.000', {
    reverse: true
  });

  // Akhir document ready
});

// === function input iuran
const inputIuran = () => {
  let ks = normalisasi($('[name="bpjs_ks"]').val());
  let tk = normalisasi($('[name="bpjs_ktk"]').val());
  ks = isNaN(ks) ? 0 : ks
  tk = isNaN(tk) ? 0 : tk
  let ttl = ks + tk;
  $('[name="total"]').val(money(ttl));
}



// get kode
const kode = () => {
  $.ajax({
    url: base_url + 'gaji/bpjs/kode',
    dataType: 'json',
    success: function (data) {
      if (data[1].type == 'ada') {
        $('input[name="kode_iuran_bpjs"]').val(data[0].kode.kode_bpjs);
        $('#bulan').val(0 + data[0].kode.bulan);
        $('#tahun').val(data[0].kode.tahun);
        $('input[name="ket_bpjs"]').val(data[0].kode.ket_bpjs);
        $('#bulan').prop('disabled', true);
        $('#tahun').prop('disabled', true);
        $('#ket_bpjs').prop('readonly', true);
      } else if (data[1].type == 'blm') {
        $('input[name="kode_iuran_bpjs"]').val(data[0].kode);
      }
      const kode = $('#bulan').val();
      console.log(kode);

    }
  });
}




$('#otomatis').on('click', function () {
  const idKry = $('#id_kry').val();
  $('#manual').prop('checked', false);
  cari_upah(idKry);

});
$('#manual').on('click', function () {
  const idKry = $('#id_kry').val();
  $('#otomatis').prop('checked', false);
  $('.upah').hide();
  var upah = $('[name="upah"]').val('');
  hitungTotal(upah);
  $('#bpjs_ks').prop('readonly', false);
  $('#bpjs_ktk').prop('readonly', false);
  document.getElementById("bpjs_ks").focus();
});


const cari_upah = (idKry) => {
  $.ajax({
    url: base_url + 'master/karyawan/get_json',
    type: "get",
    data: {
      idKry: idKry
    },
    dataType: 'json',
    success: function (data) {
      // === hitung upah ===
      hitung_upah(data);
      //==== akhir hitung Upah =====
    }

  });
}

const hitung_upah = (data) => {
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
    $('#bpjs_ks').prop('readonly', false);
    $('#bpjs_ktk').prop('readonly', false);
    document.getElementById("bpjs_ks").focus();
    hitungTotal(upah);
  } else {
    $('[name="upah"]').val(money(upah));
    $('.upah').show();
    hitungTotal(upah);
    $('#bpjs_ks').prop('readonly', true);
    $('#bpjs_ktk').prop('readonly', true);
  }
}



const hitungTotal = (upah) => {
  // var uph = parseInt($('[name="upah"]').val());

  upah = isNaN(upah) ? 0 : upah

  const iurBpjsKs = upah * 1 / 100;
  const iurBpjsKtk = upah * 3 / 100;
  const ttlIuran = iurBpjsKs + iurBpjsKtk;
  // let ttl=ttlIuran.toFixed(0);
  // let ttlIur= ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $('[name="bpjs_ks"]').val(money(iurBpjsKs));
  $('[name="bpjs_ktk"]').val(money(iurBpjsKtk));
  $('[name="total"]').val(money(ttlIuran));

}

const money = (angka) => {
  //   $('.money').mask('000.000.000.000.000', {
  //     reverse: true
  // });
  let ttl = angka.toFixed(0);
  let ttlIur = ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  return ttlIur;

}

const normalisasi = (angka) => {
  var a = angka.replace(".", "");
  var angkaJadi = parseInt(a);
  return angkaJadi;

  console.log(angkaJadi);
}


// Action =====
const simpanDetil = (data) => {
  $.ajax({
    type: 'post',
    url: base_url + 'transaksi/stokAwal/simpanDetil',
    data: data,
    dataType: 'json',
    success: function (response) {
      if (response.success) {
        if (response.type === 'ok') {
          tampilDetil();
          $('#item').val('');
        } else {
          console.log(response.type);

        }
      }
    }
  })
}
