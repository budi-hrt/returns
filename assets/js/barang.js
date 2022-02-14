// ==============DATA BARANG=======//

$(document).ready(function () {



  // $('#merek').selectpicker();
  $('.money').mask('000.000.000.000.000', {
    reverse: true
  });






});

function tampil_sub() {
  const kategori_id = $('#kategori').val();
  console.log(kategori_id);
  $.ajax({
    type: "GET",
    url: base_url + 'barang/get_sub',
    data: {
      kategori_id: kategori_id
    },
    success: function (html) {
      console.log(html);
      $("#subkategori").empty();
      $("#subkategori").html(html);
    }
  });
}


//===============END BARANG========//
