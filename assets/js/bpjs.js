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
      let id_kry=$('[name="id_kry"]').val();
      cek_karyawan(id_kry);
      // document.getElementById("bpjs_ks").focus();
      // $('.hitung').show();
      // $('.upah').hide();
      // var upah = parseInt($('[name="upah"]').val());
      // hitungTotal(upah);
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


// validasi karyawan
const cek_karyawan=(id_kry)=>{
  let idKry=id_kry;
  let bulan = $('#bulan').val();
  let tahun = $('#tahun').val();
 
  $.ajax({
    url: base_url + 'gaji/bpjs/cek_karyawan',
    type: "get",
    data: {
      idKry: idKry,
      bulan: bulan,
      tahun: tahun
    },
    dataType: 'json',
    success: function (response) {
      // console.log(response[0].type);
if (response[0].type=='ada') {
  alert('Iuran Karyawan sudah di priode in !');
  $('[name="id_kry"]').val('');
  $('[name="karyawan"]').val('');
}else if(response[0].type=='blm'){
  document.getElementById("bpjs_ks").focus();
  $('.hitung').show();
  $('.upah').hide();
  var upah = parseInt($('[name="upah"]').val());
  // === hitung total ===
  hitungTotal(upah);
  //==== akhir hitung total =====
}
}

  });
}



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
        $('#bulan_hide').val(0 + data[0].kode.bulan);
        $('#tahun_hide').val(data[0].kode.tahun);
        $('input[name="ket_bpjs"]').val(data[0].kode.ket_bpjs);
        $('#bulan').prop('disabled', true);
        $('#tahun').prop('disabled', true);
        $('#ket_bpjs').prop('readonly', true);
        $(".judul").append("<b>"+data[0].kode.kode_bpjs+"</b>.");
        let kode =data[0].kode.kode_bpjs;
        list_iuran(kode); 
      } else if (data[1].type == 'blm') {
        $('input[name="kode_iuran_bpjs"]').val(data[0].kode);
        let kode =data[0].kode;
        list_iuran(kode); 
      }
      // const kode = data[0].kode.ket_bpjs;
      // console.log(data[0].kode);

    }
  });
}


// Tampil List
const list_iuran =(kode)=>{
  $.ajax({
    url: base_url + 'gaji/bpjs/list_iuran',
    type:'get',
    data:{kode:kode},
    dataType: 'json',
    success: function(data) {
      console.log(data);
        var html = '';
      var i;
      var no = 1;
      for (i = 0; i < data.length; i++) {
        var ks = parseInt(data[i].bpjs_kesehatan);
        var tk = parseInt(data[i].bpjs_ktk);
        ks = isNaN(ks) ? 0 : ks
        tk = isNaN(tk) ? 0 : tk
        let total = ks+tk;
        html += `  <tr>
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="item-edit mr-3" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil  text-primary"></i></a>
                                          <a class=" item-delete" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-times  text-primary"></i></a>
                                      </div>
                                  </td>
                                  <td class="text-center">` + data[i].nama + `</td>
                                  <td>` + data[i].bpjs_kesehatan+ `</td>
                                  <td>` +data[i].bpjs_ktk + `</td>
                                  <td>` + total + `</td>
                                  <td>` + data[i].name + `</td>
                              </tr>`;

      }
      $('#list_iuran').html(html);
      $('#table-iuran').DataTable();
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



