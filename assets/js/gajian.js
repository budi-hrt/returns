$(document).ready(function () {
  // $("#table-listGaji").DataTable();
  kode();
});

// Loader
function block() {
  var body = $("#panel-body");
  var w = body.css("width");
  var h = body.css("height");
  var trb = $("#throbber");
  var position = body.offset(); // top and left coord, related to document

  trb.css({
    width: w,
    height: h,
    opacity: 0.7,
    position: "absolute",
    top: position.top,
    left: position.left,
  });
  trb.show();
}

function unblock() {
  var trb = $("#throbber");
  trb.hide();
}

const kode = () => {
  $.ajax({
    url: base_url + "gaji/management_gaji/kode",
    dataType: "json",
    success: function (data) {
      console.log(data);
      if (data[1].type == "ada") {
        $("input[name=kode]").val(data[0].kode.kode_gaji);

        $("#bulan").val("0" + data[0].kode.bulan);
        $("#tahun").val(data[0].kode.tahun);
        $("#mengetahui").val(data[0].kode.id_mengetahui);
        $("input[name=ket_gaji]").val(data[0].kode.ket_gajian);
        $(".judul").append(
          '<i class="fa fa-money"></i> Management gaji ==>' +
            data[0].kode.kode_gaji
        );
        tampil_detil();
      } else if (data[1].type == "blm") {
        $('input[name="kode"]').val(data[0].kode);
        let kode = data[0].kode;
        $(".judul").append(
          '<i class="fa fa-money"></i> Management gaji ==>' + kode
        );
        // list_gaji(kode);
      }

      // disable();
    },
  });
};

$("#buat").on("click", function () {
  let url = $("#form_management").attr("action");
  const id_user = $('[name="id_user"]').val();
  const id = [];
  $(".id_karyawan").each(function () {
    id.push($(this).val());
  });
  const kode = $('[name="kode"]').val();
  let bulan = $("#bulan").val();
  let tahun = $("#tahun").val();
  let mengetahui = $("#mengetahui").val();
  let ket = $('[name="ket_gaji"]').val();
  let result = "";
  if (bulan == "") {
    $(".alert-danger")
      .html("Ops....priode bulan belum dipilih !")
      .fadeIn()
      .delay(3000)
      .fadeOut("slow");
    return false;
  } else {
    result += "1";
  }
  if (mengetahui == "") {
    $(".alert-danger")
      .html("Ops....Mengetahui belum dipilih !")
      .fadeIn()
      .delay(3000)
      .fadeOut("slow");
    return false;
  } else {
    result += "2";
  }

  if (ket == "") {
    $(".alert-danger")
      .html("Ops....data belum lengkap !")
      .fadeIn()
      .delay(3000)
      .fadeOut("slow");
    return false;
  } else {
    result += "3";
  }

  if (result == "123") {
    $.ajax({
      url: url,
      type: "post",
      data: {
        kode: kode,
        id: id,
        bulan: bulan,
        tahun,
        mengetahui: mengetahui,
        ket: ket,
        id_user: id_user,
      },
      dataType: "json",
      success: function (response) {
        console.log(response);
        if (response.type == "simpan") {
          block();
          setTimeout(function () {
            unblock();
            $(".alert-success")
              .html("Data berhasil di buat!")
              .fadeIn()
              .delay(3000)
              .fadeOut("slow");
          }, 1000); //wait 0.5 second to see the spinning gif
        } else if (response.type == "ada") {
          block();
          setTimeout(function () {
            unblock();
            $(".alert-danger")
              .html("Ops....Priode ini sudah!")
              .fadeIn()
              .delay(3000)
              .fadeOut("slow");
          }, 1000); //wait 0.5 second to see the spinning gif
        }
      },
      error: function () {
        alert("could not add data");
      },
    });
  }
});

$("#buat1").on("click", function () {
  tampil_detil();
});

const tampil_detil = () => {
  const kode = $('[name="kode"]').val();
  const bulan = $("#bulan").val();
  const tahun = $("#tahun").val();
  $.ajax({
    url: base_url + "gaji/management_gaji/get_detil",
    type: "get",
    data: { kode: kode, bulan: bulan, tahun: tahun },
    dataType: "json",
    success: function (data) {
      console.log(data[0].nama_karyawan);
      let html = "";
      let i;
      for (i = 0; i < data.length; i++) {
        html += `<tr>                                
           <td class="text-center">
       <div class="btn-group">
           <a class="item-edit mr-3" href="javascript:;""><i class="fa fa-pencil  text-success"></i></a>
           <a class=" item-delete" href="javascript:;" > <i class="fa fa-times  text-danger"></i></a >
       </div >
   </td >
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   </tr>`;
      }
      $("#detil_gaji").html(html);
      $("#table-listGaji").DataTable({
        bLengthChange: false,
        bPaginate: false,
        bFilter: true,
        bSort: true,
        bInfo: true,
        bAutoWidth: false,
        sScrollY: "330px",
        sScrollX: "100%",
        sPaginationType: "full_numbers",
        bRetrieve: true,
        bScrollCollapse: true,
      });
    },
  });
};

const disable = () => {
  let kode_pending = $("#kode_pending").val();
  if (kode_pending !== "") {
    document.getElementById("bulan").disabled = true;
    document.getElementById("tahun").disabled = true;
    // $('#buat').hide();
    $("#buat").css("display", "none");
    $("#simpan_keluar").css("display", "block");
  }
};
