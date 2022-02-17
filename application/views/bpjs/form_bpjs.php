<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Gaji</li>
    <li class="breadcrumb-item">
      Iuran Bpjs
    </li>
    <li class="breadcrumb-item active">Form Iuran Bpjs</li>
    <!-- Breadcrumb Menu-->
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">

      <div class="row">

        <!-- Kategori -->
        <div class="col-lg-5">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
          <div class="clearfix">
            <span class="float-left">
              <h5>Form iuran Bpjs</h5>
            </span>
          </div>
          <div class="card card-border-app flat">



            <div class="card-header ">
              <i class="fa fa-align-justify"></i>Form Input iuran
            </div>
            <?php form_open('iuran/bpjs/input_iuran', 'id="form_bpjs"'); ?>
            <div class="card-body">
              <div class="row align-items-center">
                <div class="form-group col-sm-3">
                  <label for="ccmonth">Bulan</label>
                  <select class="form-control form-control-sm" name="bulan" id="bulan">
                    <option selected="selected" value="">Pilih</option>
                    <?php
                    $bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember");
                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                      if ($bulan <= 9) {
                        echo "<option value='0$bulan'>$bln[$bulan]</option>";
                      } else {
                        echo "<option value='$bulan'>$bln[$bulan]</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-sm-3">
                  <label for="tahun">Tahun</label>
                  <select class="form-control form-control-sm" name="tahun" id="tahun">
                    <option value="<?= date('Y'); ?>" selected><?= date('Y'); ?></option>
                    <?php
                    for ($i = date('Y'); $i >= 2017; $i--) {
                      echo "<option value='$i'> $i </option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input class="form-control form-control-sm" name="ket_gaji" id="ket_gaji" type="text" placeholder="Keterangan" autocomplete="off">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group row has-icon">
                    <label class="col-md-3 col-form-label" for="email">Karyawan</label>
                    <div class="col-md-9">
                      <span class="fa fa-search form-control-feedback "></span>
                      <input type="hidden" name="id_kry" id="id_kry">
                      <input type="text" class="form-control flat" name="karyawan" id="karyawan" placeholder="Cari Karyawan...">
                    </div>
                  </div>
                  <div class="form-group row hitung" style="display: none;">
                    <label class="col-md-3 col-form-label" for="is_active">Hitung Iuran</label>
                    <div class="col-md-9">
                      <div class="form-check checkbox">
                        <input class="form-check-input" name="manual" id="manual" type="checkbox" value="1" checked>
                        <label class="form-check-label" for="manual">Manual</label>
                      </div>
                      <div class="form-check checkbox">
                        <input class="form-check-input otomatis" name="otomatis" id="otomatis" type="checkbox" value="">
                        <label class="form-check-label" for="otomatis">Otomatis</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row upah" style="display: none;">
                    <label class="col-md-3 col-form-label" for="gaji">Upah</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control flat" name="upah" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="bps_ks">Bpjs <small>Kesehatan</small></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control flat" name="bpjs_ks" id="bpjs_ks">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="bpjs_ktk">Bpjs KTK</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control flat" name="bpjs_ktk" id="bpjs_ktk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="total"><b>TOTAL IURAN</b></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control flat" name="total" id="total" readonly>
                    </div>
                  </div>

                </div>
              </div>
              <!-- row -->
            </div>

            <div class="card-footer">
              <button class="btn btn-sm btn-teal flat" type="submit">
                <i class="fa fa-floppy-o"></i> Simpan & lanjutkan</button>
            </div>
            <?php form_close(); ?>
          </div>
        </div>
        <!-- /.col-->


        <!-- Sub kategori -->
        <div class="col-lg-7">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
          <div class="clearfix">
            <span class="float-left">
              <h5>List iuran Bpjs</h5>
            </span>
          </div>
          <div class="card card-border-app  flat">
            <div class="card-header bg-primary">
              <i class="fa fa-align-justify"></i>Table Sub Kategori
            </div>
            <div class="card-body">

              <table class="table table-responsive-sm table-bordered  table-sm" id="table-subkategori">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center" width="20px">#</th>
                    <th>Kategori</th>
                    <th>Nama Sub Kategori</th>
                    <th class="text-center"> Action</th>
                  </tr>
                </thead>
                <tbody id="list_subkategori">

                </tbody>
              </table>

            </div>
          </div>
        </div>
        <!-- .col2 -->
      </div>
      <!-- /.row-->


    </div>
  </div>
</main>

<!-- Modal Kategori-->

<div class="modal fade" id="modal-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-app">
      <div class="modal-header modal-header-app flat">
        <h5 class="modal-title modal-title-app">Add New Kategori</h5>
        <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="form-kategori" action="">
        <div class="modal-body">
          <div class="form-group">
            <label for="namakategori">Kategori</label>
            <input name="idkategori" type="hidden">
            <input class="form-control flat" name="namakategori" type="text" placeholder="Insert name kategori" autocomplete="off">
            <div class="invalid-feedback"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success flat" type="button" id="btnkategori"><i class="fa fa-floppy-o"></i> Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->



<!-- Modal Sub-->


<div class="modal fade" id="modal-subkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-app flat">
      <div class="modal-header modal-header-app flat">
        <p class="modal-title modal-title-app">Tambah Subkategori</p>
        <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="form-subkategori" action="">
        <div class="modal-body flat">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="kategori">Kategori</label>
            <div class="col-md-9">
              <input type="hidden" name="id_kategori">
              <input class="form-control flat" id="kategori" type="text" name="kategori" placeholder="Cari data kategori">
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="name">Subkategori</label>
            <div class="col-md-9">
              <input name="id_sub" type="hidden" id="id_sub">
              <input class="form-control flat" name="name" type="text" id="name" placeholder="Isikan Subkategori" autocomplete="off">
              <div class="invalid-feedback"></div>
            </div>

          </div>


        </div>
      </form>
      <div class="modal-footer">
        <button class="btn btn-secondary flat" type="button" data-dismiss="modal">batal</button>
        <button class="btn btn-primary flat" id="btnsub" type="button"><i class="fa fa-floppy-o"></i> Simpan</button>
      </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->


<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url('assets/js/bpjs.js'); ?>"></script>

<script>
  //klik tambah
  $("#tambahKategori").click(function() {
    $('#form-kategori')[0].reset();
    $("#modal-kategori").modal("show");
    $('#modal-kategori').find('.modal-title').text('Tambah Kategori');
    $('#form-kategori').attr('action', base_url + 'barang/kategori/tambah');
    $('input[name=namakategori]').removeClass('is-invalid');

  });

  // Klik Simpan
  // Tambah kategori
  $('#btnkategori').on('click', function() {
    var url = $('#form-kategori').attr('action');
    var data = $('#form-kategori').serialize();
    // Validasi ====
    var namakategori = $('input[name=namakategori]');
    var result = '';
    if (namakategori.val() == '') {
      namakategori.addClass('is-invalid');
      $('#form-kategori').find('.invalid-feedback').text('Invalid feedback');
    } else {
      namakategori.removeClass('is-invalid');
      $('#form-kategori').find('.invalid-feedback').text('');
      result += '1';
    }

    if (result == '1') {
      $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            $('#modal-kategori').modal('hide');
            $('#form-kategori')[0].reset();
            if (response.type == 'add') {
              var type = 'Tambah';
            } else if (response.type == 'update') {
              var type = 'Ubah';
            }
            setTimeout(function() {
              toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                timeOut: 4000
              };
              toastr.success('Kategori Produk Berhasil di ' + type + '!', 'Berhasil...');

            }, 100);

            list_kategori();
          } else {
            alert('Belum ada perubahan data');
            return false;
          }
        },
        error: function() {
          alert('could not add data');

        }
      });
    }

  });


  // Klik edit
  $('#list_kategori').on('click', '.item-edit', function() {
    const id = $(this).attr('data');
    $('#form-kategori')[0].reset();
    $("#modal-kategori").modal("show");
    $('#modal-kategori').find('.modal-title').text('Ubah Kategori');
    $('#form-kategori').attr('action', base_url + 'barang/kategori/ubah');
    $('input[name=namakategori]').removeClass('is-invalid');

    $.ajax({
      type: 'get',
      url: base_url + 'barang/kategori/get',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        $('input[name=idkategori]').val(data.id);
        $('input[name=namakategori]').val(data.nama_kategori);
      }
    });
  });

  // List Kategori
  function list_kategori() {
    $.ajax({
      url: base_url + 'barang/kategori/list_kategori',
      dataType: 'json',
      success: function(data) {
        var html = '';
        var i;
        var no = 1;
        for (i = 0; i < data.length; i++) {
          html += `  <tr>
                                    <td class="text-center">` + no++ + `</td>
                                    <td class="text-center">` + data[i].nama_kategori + `</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="item-edit mr-3" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil text-primary"></i></a>
                                            <a class=" item-delete" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-times text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>`;

        }
        $('#list_kategori').html(html);
      }
    });
  }












  // ========== Subkategori === //


  // List Subkategori
  function list_subkategori() {
    $.ajax({
      url: base_url + 'barang/kategori/list_subkategori',
      dataType: 'json',
      success: function(data) {
        var html = '';
        var i;
        var no = 1;
        for (i = 0; i < data.length; i++) {
          html += `  <tr>
                                    <td class="text-center">` + no++ + `</td>
                                    <td>` + data[i].nama_kategori + `</td>
                                    <td>` + data[i].nama_subkategori + `</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="item-edit mr-3" href="javascript:;" data="` + data[i].idsb + `"><i class="fa fa-pencil  text-primary"></i></a>
                                            <a class=" item-delete" href="javascript:;" data="` + data[i].idsb + `"><i class="fa fa-times  text-primary"></i></a>
                                        </div>
                                    </td>
                                </tr>`;

        }
        $('#list_subkategori').html(html);
        $('#table-subkategori').DataTable();
      }
    });
  }


  // klik tambah
  $("#tambah-sub").click(function() {
    $('#form-subkategori')[0].reset();
    $("#modal-subkategori").modal("show");
    $('#modal-subkategori').find('.modal-title').text('Tambah Subategori');
    $('#form-subkategori').attr('action', base_url + 'barang/kategori/tambah_subkategori');
    $("#kategori").autocomplete("option", "appendTo", "#form-subkategori");
    $('input[name=kategori]').removeClass('is-invalid');
    $('input[name=name]').removeClass('is-invalid');
  });

  // Klik Simpan Subkategori
  $('#btnsub').on('click', function() {
    var url = $('#form-subkategori').attr('action');
    var data = $('#form-subkategori').serialize();
    // Validasi ====
    var kategori = $('input[name=kategori]');
    var id_kategori = $('input[name=id_kategori]');
    var subkategori = $('input[name=name]');
    var result = '';
    if (kategori.val() == '') {
      kategori.addClass('is-invalid');
      $('#form-subkategori').find('.invalid-feedback').text('Invalid feedback');
    } else {
      kategori.removeClass('is-invalid');
      $('#form-subkategori').find('.invalid-feedback').text('');
      result += '1';
    }
    if (id_kategori.val() == '') {
      alert('Data Kategori tidak ditemukan')
    } else {

      result += '2';
    }

    if (subkategori.val() == '') {
      subkategori.addClass('is-invalid');
      $('#form-subkategori').find('.invalid-feedback').text('Invalid feedback');
    } else {
      subkategori.removeClass('is-invalid');
      $('#form-subkategori').find('.invalid-feedback').text('');
      result += '3';
    }

    if (result == '123') {
      $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            $('#modal-subkategori').modal('hide');
            $('#form-subkategori')[0].reset();
            if (response.type == 'add') {
              var type = 'Tambah';
            } else if (response.type == 'update') {
              var type = 'Ubah';
            }
            setTimeout(function() {
              toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                timeOut: 4000
              };
              toastr.success('Subkategori Produk Berhasil di ' + type + '!', 'Berhasil...');

            }, 100);

            list_subkategori();
          } else {
            alert('Belum ada perubahan data');
            return false;
          }
        },
        error: function() {
          alert('could not add data');

        }
      });
    }

  });


  // tampil edit
  $('#list_subkategori').on('click', '.item-edit', function() {
    const sub_id = $(this).attr('data');
    console.log(sub_id);
    $('#form-subkategori')[0].reset();
    $('#modal-subkategori').modal('show');
    $('#modal-sukategori').find('.modal-title').text('Ubah Subkategori');
    $('#form-subkategori').attr('action', base_url + 'barang/kategori/ubah_sub');
    $("#kategori").autocomplete("option", "appendTo", "#form-subkategori");
    $('input[name=kategori]').removeClass('is-invalid');
    $('input[name=name]').removeClass('is-invalid');

    $.ajax({
      type: 'get',
      url: base_url + 'barang/kategori/get_subkategori',
      data: {
        sub_id: sub_id
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('input[name=id_kategori]').val(data.id_kategori);
        $('input[name=kategori]').val(data.nama_kategori);
        $('input[name=id_sub]').val(data.id_sub);
        $('input[name=name]').val(data.nama_subkategori);
      },
      error: function() {
        alert('periksa url');
        return false;
      }

    });
  });



  // ========== Ahir subkategori
</script>


<?php $this->load->view('template/footHtml'); ?>