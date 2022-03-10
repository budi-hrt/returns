$(document).ready(function () {
  $("#table-pph").DataTable();
});

$("#tambah").on("click", function () {
  cek();
});

const cek = () => {
  $.ajax({
    url: base_url + "gaji/pph21/cek_pending",
    dataType: "json",
    success: function (response) {
      if (response[0].type == "ada") {
        $(".alert-danger")
          .html("Masih ada yang pending !")
          .fadeIn()
          .delay(3000)
          .fadeOut("slow");
      } else if (response[0].type == "blm") {
        document.location.href = base_url + "gaji/pph21/form_pph21";
      }
    },
  });
};

$("#table-bpjs").on("click", ".item-edit", function () {
  let id = $(this).attr("data");
  let kode = $(this).attr("data-kode");
  let status = $(this).attr("data-status");
  $('input[name="id"]').val(id);
  $('input[name="status"]').val(status);
  $(".kode_bpjs").text("");
  $(".kode_bpjs").append(kode);
  $("#modal-edit").modal("show");
});

$("#btn-update").on("click", function () {
  let id_bpjs = $('input[name="id"]').val();
  let sts = $('input[name="status"]').val();
  let data = { id_bpjs, sts };
  cek_update(data);
});

const cek_update = (data) => {
  $.ajax({
    url: base_url + "gaji/bpjs/cek_update",
    type: "get",
    data: data,
    dataType: "json",
    success: function (response) {
      if (response[0].type == "sama") {
        document.location.href = base_url + "gaji/bpjs/form_bpjs";
      } else if (response[0].type == "ada_tdk_sama") {
        $("#modal-edit").modal("hide");
        $(".alert-danger")
          .html("Masih ada yang pending !")
          .fadeIn()
          .delay(3000)
          .fadeOut("slow");
      } else if (response[0].type == "blm") {
        update_status(data.id_bpjs);
      }
    },
  });

  const update_status = (data_id) => {
    $.ajax({
      url: base_url + "gaji/bpjs/update_status",
      type: "post",
      data: { data_id: data_id },
      dataType: "json",
      success: function (response) {
        console.log(response);
        if (response[0].type == "ok") {
          document.location.href = base_url + "gaji/bpjs/form_bpjs";
        }
      },
    });
  };
};

$("#table-bpjs").on("click", ".item-delete", function () {
  let id_bpjs = $(this).attr("data");
  let nomor = $(this).attr("data-kode");
  let priode = $(this).attr("data-priode");
  $('input[name="id_bpjs"]').val(id_bpjs);
  $('input[name="nomor"]').val(nomor);
  $(".nomor").text("");
  $(".nomor").append("=>" + nomor + "=>" + priode);
  $("#modal-hapus").modal("show");
});
