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


$('#table-upah').on('click', '.item-edit', function () {
  let id = $(this).attr('data-id');
  let kode = $(this).attr('data-kode');
  let status = $(this).attr('data-status');
  $('input[name="id"]').val(id);
  $('input[name="status"]').val(status);
  $('.kode_gaji').text('');
  $('.kode_gaji').append(kode);
  $('#modal-edit').modal('show');
});

$('#btn-update').on('click', function () {
  let id_gaji = $('input[name="id"]').val();
  let sts = $('input[name="status"]').val();
  let data = { id_gaji, sts }
  cek_update(data);
});
const cek_update = (data) => {
  $.ajax({
    url: base_url + 'gaji/penggajian/cek_update',
    type: 'get',
    data: data,
    dataType: 'json',
    success: function (response) {
      if (response[0].type == 'sama') {
        document.location.href = base_url + 'gaji/management_gaji';
      } else if (response[0].type == 'ada_tdk_sama') {
        $('#modal-edit').modal('hide');
        $('.alert-danger').html('Masih ada yang pending !').fadeIn().delay(3000).fadeOut('slow');
      } else if (response[0].type == 'blm') {
        update_status(data.id_gaji);
      }
    }
  });

  const update_status = (data_id) => {
    $.ajax({
      url: base_url + 'gaji/penggajian/update_status',
      type: 'post',
      data: { data_id: data_id },
      dataType: 'json',
      success: function (response) {
        console.log(response);
        if (response[0].type == 'ok') {
          document.location.href = base_url + 'gaji/management_gaji';
        }
      }
    });
  }
}

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
