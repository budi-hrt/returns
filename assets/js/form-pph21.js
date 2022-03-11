$(document).ready(function () {
  kode();

  $(".money").mask("000.000.000.000.000", {
    reverse: true,
  });
  // $(".dataTables_scrollBody").css('width', '102%');

  // Autocomplate
  $("#karyawan").autocomplete({
    source: site_url + "master/karyawan/get_autocomplete/?",
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
    },
  });
  // input nama produk
  $("#karyawan").on("input", function () {
    $("input[name=id_kry]").val("");
    $("input[name=upah]").val("");
    $("input[name=bpjs_ks]").val("");
    $("input[name=bpjs_ktk]").val("");
    $(".hitung").hide();
    $("#manual").prop("checked", true);
    $("#otomatis").prop("checked", false);
  });

  $("#upah").on("input", function () {
    hitungTotal2();
  });
  $("#jkk").on("input", function () {
    hitungTotal2();
  });
  $("#jk").on("input", function () {
    hitungTotal2();
  });
  $("#jht").on("input", function () {
    hitungTotal2();
  });
  $("#jp").on("input", function () {
    hitungTotal2();
  });

  // Akhir document ready
});

// get kode
const kode = () => {
  $.ajax({
    url: base_url + "gaji/pph21/kode",
    dataType: "json",
    success: function (data) {
      if (data[1].type == "ada") {
        $('input[name="id_iuran"]').val(data[0].kode.id);
        $('input[name="kode_iuran_pph21"]').val(data[0].kode.kode_pph21);
        //   $('#bulan').val(0 + data[0].kode.bulan);
        //   $('#tahun').val(data[0].kode.tahun);
        //   $('#bulan_hide').val(0 + data[0].kode.bulan);
        //   $('#tahun_hide').val(data[0].kode.tahun);
        //   $('input[name="ket_bpjs"]').val(data[0].kode.ket_bpjs);
        //   $('#bulan').prop('disabled', true);
        //   $('#tahun').prop('disabled', true);
        //   $('#ket_bpjs').prop('readonly', true);
        //   $('#copy_data').hide();
        //   $(".judul").append("<b> => " + data[0].kode.kode_bpjs + "</b>");
        //   let kode = data[0].kode.kode_bpjs;
        //   list_iuran(kode);
        //   get_total(kode);
      } else if (data[1].type == "blm") {
        $('input[name="kode_iuran_pph21"]').val(data[0].kode);
        let kode = data[0].kode;
        //   list_iuran(kode);
      }
    },
  });
};

// validasi karyawan
const cek_karyawan = (id_kry) => {
  let idKry = id_kry;
  let bulan = $("#bulan").val();
  let tahun = $("#tahun").val();

  $.ajax({
    url: base_url + "gaji/pph21/cek_karyawan",
    type: "get",
    data: {
      idKry: idKry,
      bulan: bulan,
      tahun: tahun,
    },
    dataType: "json",
    success: function (response) {
      if (response[0].type == "ada") {
        alert("Iuran Karyawan sudah di priode in !");
        $('[name="id_kry"]').val("");
        $('[name="karyawan"]').val("");
      } else if (response[0].type == "blm") {
        document.getElementById("upah").focus();
        $('input[name="type"]').val("manual");
        $(".hitung").show();
        $(".hitung-auto").hide();
        var upah = parseInt($('[name="upah"]').val());
        // === hitung total ===
        //   hitungTotal(upah);
        //==== akhir hitung total =====
      }
    },
  });
};
//   ================================================//

// Pilihan Hitung

// 1.Auto
$("#otomatis").on("click", function () {
  const idKry = $("#id_kry").val();
  $("#manual").prop("checked", false);
  cari_upah(idKry);
});
//   Akhir Auto

// 2.Manual
$("#manual").on("click", function () {
  const idKry = $("#id_kry").val();
  $("#otomatis").prop("checked", false);
  // $('.upah').hide();
  // $('.tambahan').hide();
  // $('#tambahan').val('');
  // $('#tambahan').find(':selected').val('');
  // var upah = $('[name="upah"]').val('');
  // hitungTotal(upah);
  // $('#bpjs_ks').prop('readonly', false);
  // $('#bpjs_ktk').prop('readonly', false);
  // document.getElementById("bpjs_ks").focus();
  // $('input[name="type"]').val('manual');
  // let type = $('#type').val();
  // console.log(type);
});

// Akhir manual

// Akhir pilihan hitung
// ===================================================//

// ====== Pilih PTKP =====

$("#ptkp").on("change", function () {
  let tanggungan = $("#ptkp").find(":selected").val();
  let ptkp = normalisasi($("#ptkp_hide").val());
  let tg = normalisasi($("#tanggungan_hide").val());
  tanggungan = isNaN(tanggungan) ? 0 : tanggungan;
  let val_tanggungan = tanggungan * tg;
  let val_ptkp = val_tanggungan + ptkp;
  $("#val_ptkp").val("");
  $("#val_ptkp").val(money(val_ptkp));
  hitungPph();
});

// Cari Upah Karyawan
const cari_upah = (idKry) => {
  $.ajax({
    url: base_url + "master/karyawan/get_json",
    type: "get",
    data: {
      idKry: idKry,
    },
    dataType: "json",
    success: function (data) {
      // === hitung upah ===
      hitung_upah(data);
      //==== akhir hitung Upah =====
    },
  });
};

// Hitung Upah
const hitung_upah = (data) => {
  var gp = parseInt(data.gaji_pokok);
  var tj = parseInt(data.tunjangan);
  var um = parseInt(data.um);
  gp = isNaN(gp) ? 0 : gp;
  tj = isNaN(tj) ? 0 : tj;
  um = isNaN(um) ? 0 : um;
  upah = gp + tj + um;
  if (upah === 0) {
    alert("Karyawan belum punya upah");
    $("#manual").prop("checked", true);
    $("#otomatis").prop("checked", false);
    $(".hitung-auto").hide();
    //   $('#bpjs_ks').prop('readonly', false);
    //   $('#bpjs_ktk').prop('readonly', false);
    document.getElementById("iuran").focus();
    //   hitungTotal(upah);
  } else {
    $('[name="upah"]').val(money(upah));
    $(".hitung-auto").show();
    hitungTotal(upah);
    $(".hitung-manual").hide();

    $('input[name="type"]').val("auto");
  }
};

//   Hitung Total
const hitungTotal = (upah) => {
  // var uph = parseInt($('[name="upah"]').val());

  // let tambahan = parseInt($('#tambahan').find(':selected').val());
  // tmb = isNaN(tambahan) ? 0 : tambahan
  upah = isNaN(upah) ? 0 : upah;
  const jkk = (upah * 0.24) / 100;
  const jk = (upah * 0.3) / 100;
  const bruto = jkk + jk + upah;
  // ====== hitung Pengurangan =======
  const by_jabatan = (bruto * 5) / 100;
  const jht = (upah * 2) / 100;
  const jp = (upah * 1) / 100;
  const maksByJabatan = 500000;
  const ttl_jht_jp = jht + jp;
  const neto_sebulan = bruto - ttl_jht_jp;
  if (by_jabatan > maksByJabatan) {
    $('[name="by_jabatan"]').val(money(maksByJabatan));
    $('[name="neto_bulan"]').val(money(neto_sebulan - maksByJabatan));
  } else {
    $('[name="by_jabatan"]').val(money(by_jabatan));
    $('[name="neto_bulan"]').val(money(neto_sebulan - by_jabatan));
  }
  // let ttl=ttlIuran.toFixed(0);
  // let ttlIur= ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $('[name="jkk"]').val(money(jkk));
  $('[name="jk"]').val(money(jk));
  $('[name="bruto"]').val(money(bruto));

  // ===== tampil pengurangan ======
  $('[name="jht"]').val(money(jht));
  $('[name="jp"]').val(money(jp));
  const neto_bl = normalisasi($('[name="neto_bulan"]').val());
  const neto_tahun = neto_bl * 12;
  $('[name="neto_tahun"]').val(money(neto_tahun));
  // $('[name="total"]').val(money(ttlIuran));

  hitungPph();
};

// ========= Hitung Tolal 2=======

const hitungTotal2 = () => {
  let upah = normalisasi($('[name="upah"]').val());
  let jkk = normalisasi($('[name="jkk"]').val());
  let jk = normalisasi($('[name="jk"]').val());
  let brto = normalisasi($('[name="bruto"]').val());
  let bJ = normalisasi($('[name="by_jabatan"]').val());
  let jht = normalisasi($('[name="jht"]').val());
  let jp = normalisasi($('[name="jp"]').val());

  let nt_thn = normalisasi($('[name="neto_tahun"]').val());

  upah = isNaN(upah) ? 0 : upah;
  jkk = isNaN(jkk) ? 0 : jkk;
  jk = isNaN(jk) ? 0 : jk;
  brto = isNaN(brto) ? 0 : brto;
  bJ = isNaN(bJ) ? 0 : bJ;
  jht = isNaN(jht) ? 0 : jht;
  jp = isNaN(jp) ? 0 : jp;

  nt_thn = isNaN(nt_thn) ? 0 : nt_thn;

  // ======= Validasi ======
  const bruto = jkk + jk + upah;
  const by_jabatan = (bruto * 5) / 100;
  const maksByJabatan = 500000;
  const ttl_jht_jp = jht + jp;
  const neto_sebulan = bruto - ttl_jht_jp;

  // ======= Tampil
  $('[name="bruto"]').val(money(bruto));
  if (by_jabatan > maksByJabatan) {
    $('[name="by_jabatan"]').val(money(maksByJabatan));
    $('[name="neto_bulan"]').val(money(neto_sebulan - maksByJabatan));
  } else {
    $('[name="by_jabatan"]').val(money(by_jabatan));
    $('[name="neto_bulan"]').val(money(neto_sebulan - by_jabatan));
  }

  let nt_bln = normalisasi($('[name="neto_bulan"]').val());
  nt_bln = isNaN(nt_bln) ? 0 : nt_bln;
  const neto_setahun = nt_bln * 12;
  $('[name="neto_tahun"]').val(money(neto_setahun));

  hitungPph();
};

const hitungPph = () => {
  let neto = normalisasi($('[name="neto_tahun"]').val());
  let ptkp = normalisasi($("#val_ptkp").val());
  let pkp = neto - ptkp;
  let pembulatan = Math.round(pkp / 1000) * 1000;

  if (pkp <= 0) {
    $('[name="pkp"]').val(0);
    $('[name="pembulatan"]').val(0);
    $('[name="lima_persen"]').val(0);
    $('[name="lima_belas"]').val(0);
    $('[name="dua_lima"]').val(0);
    $('[name="tiga_puluh"]').val(0);
    $('[name="pph_tahun"]').val(0);
    $('[name="pph_bulan"]').val('nihil');
  } else {
    $('[name="pkp"]').val(money(pkp));
    $('[name="pembulatan"]').val(money(pembulatan));
    hitungPersen();
  }
};





// ====== Hitung persen =====

const hitungPersen=()=>{
  let pkp = normalisasi($('[name="pembulatan"]').val()) ;
  pkp = isNaN(pkp) ? 0 : pkp;
 
  // cari 5%
  if (pkp>50000000) {
    let lima_persen=(50000000*5)/100;
    $('[name="lima_persen"]').val(money(lima_persen));
    // cari 15% =======
    hitungLimaBelas(pkp);
  
   
  }else if(pkp>0 || ptkp<50000000){
    let limaPersen = (pkp*5)/100;
    $('[name="lima_persen"]').val(money(limaPersen));
  }
}

const hitungLimaBelas=(pkp)=>{
  let sisaPkp= pkp - 50000000;
  if (sisaPkp>200000000) {
    let limaBelas=(200000000*15)/100;
    $('[name="lima_belas"]').val(money(limaBelas));
    hitungDuaLima(pkp);
  }else if(sisaPkp>0 || sisaPkp<200000000){
    let limaBelasPersen = (sisaPkp*15)/100;
    $('[name="lima_belas"]').val(money(limaBelasPersen));
  }else if(sisaPkp<=0){
    $('[name="lima_belas"]').val(0);
    $('[name="dua_lima"]').val(0);
    $('[name="tiga_puluh"]').val(0);
  }
}

const hitungDuaLima=(pkp)=>{
  let sisaPkp= pkp - 250000000;
  if (sisaPkp>250000000) {
    let duaLima=(250000000*25)/100;
    $('[name="dua_lima"]').val(money(duaLima));
     hitungTigaPuluh(pkp);
  }else if(sisaPkp>0 || sisaPkp<250000000){
    let duaLimaPersen = (sisaPkp*25)/100;
    $('[name="dua_lima"]').val(money(duaLimaPersen));
  }
}

const hitungTigaPuluh=(pkp)=>{
  let sisaPkp= pkp - 500000000;
  if (sisaPkp>500000000) {
    let tigaPuluh=(500000000*30)/100;
    $('[name="tiga_puluh"]').val(money(tigaPuluh));
  }else if(sisaPkp>0 || sisaPkp<500000000){
    let tigaPuluhPersen = (sisaPkp*30)/100;
    $('[name="tiga_puluh"]').val(money(tigaPuluhPersen));
  }
}



const money = (angka) => {
  //   $('.money').mask('000.000.000.000.000', {
  //     reverse: true
  // });
  let ttl = angka.toFixed(0);
  let ttlIur = ttl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  return ttlIur;
};
const normalisasi = (angka) => {
  var a = angka.replaceAll(".", "");
  var angkaJadi = parseInt(a);
  return angkaJadi;
};
