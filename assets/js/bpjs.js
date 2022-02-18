$(document).ready(function () {
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

  $('#bpjs_ks').on('input',function () {
    let ks = normalisasi($('[name="bpjs_ks"]').val());
    let tk = normalisasi($('[name="bpjs_ktk"]').val());
    let ttl = ks+tk;
    $('[name="total"]').val(money(ttl));
  });



  $('.money').mask('000.000.000.000.000', {
    reverse: true
});

  // Ahir document ready
});





$('#otomatis').on('click', function () {
  const idKry = $('#id_kry').val();
  $('#manual').prop('checked', false);
    cari_upah(idKry);
 
});
$('#manual').on('click', function () {
  const idKry = $('#id_kry').val();
  $('#otomatis').prop('checked', false);
  $('.upah').hide();
 var upah= $('[name="upah"]').val('');
 hitungTotal(upah);
 document.getElementById("bpjs_ks").focus();
});


const cari_upah=(idKry)=>{
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

const hitung_upah=(data)=>{
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
    hitungTotal(upah);
  } else {
    $('[name="upah"]').val(money(upah));
    $('.upah').show();
    hitungTotal(upah);
  }
}



const hitungTotal = (upah) => {
  // var uph = parseInt($('[name="upah"]').val());
 
  upah = isNaN(upah) ? 0 : upah
 
  const iurBpjsKs = upah * 1 / 100;
  const iurBpjsKtk = upah  * 3 / 100;
  const ttlIuran = iurBpjsKs + iurBpjsKtk;
  // let ttl=ttlIuran.toFixed(0);
  // let ttlIur= ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $('[name="bpjs_ks"]').val(money(iurBpjsKs));
  $('[name="bpjs_ktk"]').val(money(iurBpjsKtk));
  $('[name="total"]').val(money(ttlIuran));

}

const money=(angka)=>{
//   $('.money').mask('000.000.000.000.000', {
//     reverse: true
// });
let ttl=angka.toFixed(0);
  let ttlIur= ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  return ttlIur;

}

const normalisasi=(angka)=>{
  var a = angka.replace(".", "");
  var angkaJadi = parseInt(a);
  return angkaJadi;
 
  console.log(angkaJadi);
}