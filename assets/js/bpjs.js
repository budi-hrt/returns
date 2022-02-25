$(document).ready(function () {

  kode();

  $('.money').mask('000.000.000.000.000', {
    reverse: true
  });
  // $(".dataTables_scrollBody").css('width', '102%');

  // Autocomplate
  $("#karyawan").autocomplete({
    source: site_url + 'master/karyawan/get_autocomplete/?',
    select: function (event, ui) {
      $('[name="id_kry"]').val(ui.item.description);
      $('[name="karyawan"]').val(ui.item.label);
      let id_kry = $('[name="id_kry"]').val();
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








  // Akhir document ready
});


// validasi karyawan
const cek_karyawan = (id_kry) => {
  let idKry = id_kry;
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
      if (response[0].type == 'ada') {
        alert('Iuran Karyawan sudah di priode in !');
        $('[name="id_kry"]').val('');
        $('[name="karyawan"]').val('');
      } else if (response[0].type == 'blm') {
        document.getElementById("bpjs_ks").focus();
        $('input[name="type"]').val('manual');
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
  ttl = ks + tk;
  // ttl = isNaN(ttl) ? 0 : ttl
  $('[name="total"]').val(money(ttl));
}



// get kode
const kode = () => {
  $.ajax({
    url: base_url + 'gaji/bpjs/kode',
    dataType: 'json',
    success: function (data) {
      if (data[1].type == 'ada') {
        $('input[name="id_iuran"]').val(data[0].kode.id_bpjs);
        $('input[name="kode_iuran_bpjs"]').val(data[0].kode.kode_bpjs);
        $('#bulan').val(0 + data[0].kode.bulan);
        $('#tahun').val(data[0].kode.tahun);
        $('#bulan_hide').val(0 + data[0].kode.bulan);
        $('#tahun_hide').val(data[0].kode.tahun);
        $('input[name="ket_bpjs"]').val(data[0].kode.ket_bpjs);
        $('#bulan').prop('disabled', true);
        $('#tahun').prop('disabled', true);
        $('#ket_bpjs').prop('readonly', true);
        $('#copy_data').hide();
        $(".judul").append("<b> => " + data[0].kode.kode_bpjs + "</b>");
        let kode = data[0].kode.kode_bpjs;
        list_iuran(kode);
        get_total(kode);
      } else if (data[1].type == 'blm') {
        $('input[name="kode_iuran_bpjs"]').val(data[0].kode);
        let kode = data[0].kode;
        list_iuran(kode);

      }

    }
  });
}

const get_total = (kode) => {
  $.ajax({
    url: base_url + 'gaji/bpjs/get_total',
    type: 'get',
    data: { kode: kode },
    dataType: 'json',
    success: function (data) {
      let ks = normalisasi(data.total_ks);
      let ktk = normalisasi(data.total_ktk);
      total_iuran = ks + ktk;
      $(".judul_total").append('<b class="text-success"> Rp.' + money(total_iuran) + '</b>' + '<small><b> ( Jumlah karyawan : ' + data.total_orang + ' orang )</b></small>');
      $('input[name="subtotal_iuran"]').val(total_iuran);
      $('input[name="jumlah_orang"]').val(data.total_orang);
    }
  });
}

// Tampil List
const list_iuran = (kode) => {
  $.ajax({
    url: base_url + 'gaji/bpjs/list_iuran',
    type: 'get',
    data: { kode: kode },
    dataType: 'json',
    success: function (data) {
      var html = '';
      var i;
      for (i = 0; i < data.length; i++) {
        var ks = parseInt(data[i].bpjs_kesehatan);
        var tk = parseInt(data[i].bpjs_ktk);
        ks = isNaN(ks) ? 0 : ks
        tk = isNaN(tk) ? 0 : tk
        let total = ks + tk;
        html += `  <tr>
        <input type="hidden" class="idDetil"  value="`+ data[i].id + `">
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="item-edit mr-3" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil  text-success"></i></a>
                                          <a class=" item-delete" href="javascript:;" data="` + data[i].id + `" data-nama="` + data[i].nama + `" > <i class="fa fa-times  text-danger"></i></a >
                                      </div >
                                  </td >
                                  <td class="text-center">`+ data[i].nama + `</td>
                                  <td class="text-right">` + money(ks) + `</td>
                                  <td class="text-right">` + money(tk) + `</td>
                                  <td class="text-right">` + money(total) + `</td>
                                  <td class="text-center"><label style="font-size:7pt;">` + data[i].name + `</label></td>
                              </tr > `;

      }

      $('#list_iuran').html(html);
      $('#table-iuran').DataTable({
        "bLengthChange": false,
        "bPaginate": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "sScrollY": "330px",
        "sScrollX": "100%",
        "sPaginationType": "full_numbers",
        "bRetrieve": true,
        "bScrollCollapse": true,
      });
    }
  });
}


$('#list_iuran').on('click', '.item-edit', function () {
  const id = $(this).attr('data');
  get_detil(id);
});

const get_detil = (id) => {
  $.ajax({
    url: base_url + 'gaji/bpjs/get_detil',
    type: 'get',
    data: { id: id },
    dataType: 'json',
    success: function (data) {
      tampil_edit(data);
    }
  });
}

const tampil_edit = (data) => {

  if (data.type == 'manual') {
    $('#manual').prop('checked', true);
    $('#otomatis').prop('checked', false);
    $('#bpjs_ks').prop('readonly', false);
    $('#bpjs_ktk').prop('readonly', false);
    $('.upah').hide();
    $('.tambahan').hide();
  } else if (data.type == 'auto') {
    let idKry = data.id_kry_bpjs;
    $('#manual').prop('checked', false);
    $('#otomatis').prop('checked', true);
    // $('#bpjs_ks').prop('readonly', true);
    // $('#bpjs_ktk').prop('readonly', true);
    // $('.upah').show();
    // $('.tambahan').show();
    cari_upah(idKry);
    $('#tambahan').val(data.tambahan);
  }

  $('#type').val(data.type);
  let ks = parseInt(data.bpjs_kesehatan);
  let tk = parseInt(data.bpjs_ktk);
  $('#form_bpjs').attr('action', base_url + 'gaji/bpjs/update_detil');
  $('input[name="id_detil"]').val(data.id);
  $('#id_kry').val(data.id_kry_bpjs);
  $('[name="karyawan"]').val(data.nama);
  $('#karyawan').prop('readonly', true);
  $('[name="bpjs_ks"]').val(money(ks));
  $('[name="bpjs_ktk"]').val(money(tk));
  $('.hitung').show();
  $('#reset').show();
  $('#btn_selesai').hide();

  inputIuran();
}


// Function Hapus
$('#list_iuran').on('click', '.item-delete', function () {
  const id = $(this).attr('data');
  const nama = $(this).attr('data-nama');
  $('.nama_hapus').text('');
  $(".nama_hapus").append(nama + " ...?");
  $('input[name="idHapus"]').val(id);
  $('#modal-hapusdetil').modal('show');

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
  $('.tambahan').hide();
  $('#tambahan').val('');
  $('#tambahan').find(':selected').val('');
  var upah = $('[name="upah"]').val('');
  hitungTotal(upah);
  $('#bpjs_ks').prop('readonly', false);
  $('#bpjs_ktk').prop('readonly', false);
  document.getElementById("bpjs_ks").focus();
  $('input[name="type"]').val('manual');
  let type = $('#type').val();
  console.log(type);

});

$('#tambahan').on('change', function () {
  // const tbhn = $('#tambahan').find(':selected').val();
  const idKry = $('#id_kry').val();
  cari_upah(idKry);
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
    $('.tambahan').hide();
    $('#bpjs_ks').prop('readonly', false);
    $('#bpjs_ktk').prop('readonly', false);
    document.getElementById("bpjs_ks").focus();
    hitungTotal(upah);
  } else {
    $('[name="upah"]').val(money(upah));
    $('.upah').show();
    $('.tambahan').show();
    hitungTotal(upah);
    $('#bpjs_ks').prop('readonly', true);
    $('#bpjs_ktk').prop('readonly', true);
    $('input[name="type"]').val('auto');
  }
}



const hitungTotal = (upah) => {
  // var uph = parseInt($('[name="upah"]').val());

  let tambahan = parseInt($('#tambahan').find(':selected').val());
  tmb = isNaN(tambahan) ? 0 : tambahan
  upah = isNaN(upah) ? 0 : upah
  const iurBpjsKs = upah * 1 / 100;
  const tmbhks = upah * tmb / 100;
  const iurKesehatan = iurBpjsKs + tmbhks;
  const iurBpjsKtk = upah * 3 / 100;
  const ttlIuran = iurKesehatan + iurBpjsKtk;
  // let ttl=ttlIuran.toFixed(0);
  // let ttlIur= ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $('[name="bpjs_ks"]').val(money(iurKesehatan));
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

  var a = angka.replaceAll(".", "");
  var angkaJadi = parseInt(a);
  return angkaJadi;
}




// reset update

$('#reset').on('click', function () {
  $('#form_bpjs').attr('action', base_url + 'gaji/bpjs/input_iuran');
  $('input[name="id_detil"]').val('');
  $('#id_kry').val('');
  $('[name="karyawan"]').val('');
  $('#karyawan').prop('readonly', false);
  $('[name="bpjs_ks"]').val('');
  $('[name="bpjs_ktk"]').val('');
  $('.hitung').hide();
  $('.upah').hide();
  $('#manual').prop('checked', true);
  $('#otomatis').prop('checked', false);
  $('#bpjs_ks').prop('readonly', false);
  $('#bpjs_ktk').prop('readonly', false);
  $('#reset').hide();
  $('#btn_selesai').show();
  inputIuran();
});


// selesai & keluar

$('#btn_selesai').on('click', function () {
  let id = $('[name="id_iuran"]').val();
  let jml_org = $('[name="jumlah_orang"]').val();
  let sb_iuran = $('[name="subtotal_iuran"]').val();
  let id_usr = $('[name="id_user"]').val();
  data = {
    id, jml_org, sb_iuran, id_usr
  };
  selesai_detil();
  selesai_keluar(data);
});

const selesai_keluar = (data) => {

  $.ajax({
    url: base_url + 'gaji/bpjs/selesai_keluar',
    type: 'post',
    data: data,
    dataType: 'json',
    success: function (response) {
      if (response[0].type == 'simpan') {
        document.location.href = base_url + 'gaji/bpjs/';
      } else if (response.type == 'error') {
      }
    }
  });
}

const selesai_detil = () => {
  const idDetil = [];
  $('.idDetil').each(function () {
    idDetil.push($(this).val());
  });
  $.ajax({
    type: 'post',
    url: base_url + 'gaji/bpjs/selesai_detil',
    data: { idDetil: idDetil }
  });
}


$('#copy_data').on('click', function () {
  $('#modal-copy').modal('show');
  tampil_copy()
});

const tampil_copy = () => {
  $.ajax({
    url: base_url + 'gaji/bpjs/tampil_copy',
    dataType: 'json',
    success: function (data) {
      var html = '';
      var i;
      for (i = 0; i < data.length; i++) {
        html += `  <tr>
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="item-copy mr-3" href="javascript:;" data="` + data[i].kode_bpjs + `" data-ket="` + data[i].ket_bpjs + `"><i class="fa fa-copy  text-success"></i></a>
                                      </div >
                                  </td >
                                  <td class="text-center">` + data[i].ket_bpjs + `</td>
                                  <td class="text-right">` + data[i].bulan + `-` + data[i].tahun + `</td>
                                  <td class="text-right">` + data[i].total_bpjs + `</td>
                              </tr > `;

      }

      $('#list_copy').html(html);
      $('#table-copy').DataTable({
        "bLengthChange": false,
        "bPaginate": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "sScrollY": "330px",
        "sScrollX": "100%",
        "sPaginationType": "full_numbers",
        "bRetrieve": true,
        "bScrollCollapse": true,
      });
    }
  });
}


$('#list_copy').on('click', '.item-copy', function () {
  const nomor_bpjs = $(this).attr('data');
  const ket = $(this).attr('data-ket');
  const kd = $('input[name="kode_iuran_bpjs"]').val();
  $('input[name="kd"]').val(kd);
  $('.judul_copy').text('');
  $('.judul_copy').append(' => ' + ket + '');
  tampil_copy_detil(nomor_bpjs);
});

const tampil_copy_detil = (kode) => {
  $.ajax({
    url: base_url + 'gaji/bpjs/list_iuran',
    type: 'get',
    data: { kode: kode },
    dataType: 'json',
    success: function (data) {
      let kd = $('input[name="kode_iuran_bpjs"]').val();
      let html = '';
      let i;
      for (i = 0; i < data.length; i++) {
        html += `  <tr>
                      <td>
                          <input type="hidden"  name="id_kry_copy[]"  value="`+ data[i].id_kry_bpjs + `">
                          <input type="hidden" " name="ks[]"  value="`+ data[i].bpjs_kesehatan + `">
                          <input type="hidden" " name="ktk[]"  value="`+ data[i].bpjs_ktk + `">
                          <input type="hidden" " name="tmb[]"  value="`+ data[i].tambahan + `">
                          <input type="hidden" " name="tp[]"  value="`+ data[i].type + `">
                      </td>
                    </tr > `;
      }
      $('#list_copy_detil').html(html);
      console.log(data);
      $('#kd').val(kd);
      $('#modal-copy').modal('hide');
      $('#modal-copy_detil').modal('show');
    }
  });
}



const flashdata = $('.flash-data').data('flashdata');
if (flashdata == 'sama') {
    $('.alert-danger').html('Ops....gagal Copy, Priode ini sudah ada !').fadeIn().delay(3000).fadeOut('slow');
  }else if (flashdata == 'berhasil') {
  $('.alert-success').html('Berhasil Copy data !').fadeIn().delay(3000).fadeOut('slow');
}
