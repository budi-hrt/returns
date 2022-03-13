$(document).ready(function () {
  $("#table-gaji").dataTable();
});

// Klick Tambah
$("#tambah").click(function () {
  cek();
});

const cek = () => {
  $.ajax({
    url: base_url + "gaji/penggajian/cek_pending",
    dataType: "json",
    success: function (response) {
      if (response[0].type == "ada") {
        $(".alert-danger")
          .html("Masih ada yang pending !")
          .fadeIn()
          .delay(3000)
          .fadeOut("slow");
      } else if (response[0].type == "blm") {
        document.location.href = base_url + "gaji/management_gaji";
      }
    },
  });
};

// Hanya Angka

// const flashdata = $(".flash-data").data("flashdata");
// if (flashdata == "simpan") {
//   $(".alert-success")
//     .html("Gaji berhasil di tambah!")
//     .fadeIn()
//     .delay(3000)
//     .fadeOut("slow");
// } else if (flashdata == "kode") {
//   $(".alert-danger")
//     .html("Karyawan sudah ada gaji!")
//     .fadeIn()
//     .delay(3000)
//     .fadeOut("slow");
// } else if (flashdata == "ubah") {
//   $(".alert-success")
//     .html("Gaji berhasil di ubah!")
//     .fadeIn()
//     .delay(3000)
//     .fadeOut("slow");
// }

// ubah data
// $("#table-gaji").on("click", ".item-edit", function () {
//   $("#form-gaji")[0].reset();
//   $("#form-gaji").attr("action", base_url + "gaji/master_gaji/ubah_gaji");
//   $("#modal-gaji").find(".modal-title").text("Edit Data Gaji");

//   const id = $(this).attr("data-id");
//   const idKry = $(this).attr("data-idKry");
//   const nama = $(this).attr("data-nama");
//   const gp = $(this).attr("data-gp");
//   const tj = $(this).attr("data-tj");
//   const um = $(this).attr("data-um");
//   $('[name="id"]').val(id);
//   $('[name="nama"]').val(idKry);
//   $('[name="idKry"]').val(idKry);

//   document.getElementById("nama").disabled = true;
//   $('[name="gaji_pokok"]').val(gp);
//   $('[name="tunjangan"]').val(tj);
//   $('[name="um"]').val(um);

//   $("#modal-gaji").modal("show");
// });
