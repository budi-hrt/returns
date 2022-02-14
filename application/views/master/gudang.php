<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Master
        </li>
        <li class="breadcrumb-item active">Gudang</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <!-- Gudang -->
                <div class="col-lg">
                    <div class="clearfix">
                        <span class="float-left">
                            <h5>GUDANG</h5>
                        </span>

                    </div>
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Gudang

                            <!-- Tools -->
                            <div class="card-header-actions">
                                <a class="card-header-action btn flat " href="javascript:;" id="tambah">
                                    <i class="fa fa-archive"></i> Tambah data
                                </a>

                            </div>

                        </div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-bordered  table-sm" id="table-gudang">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="50px">#</th>
                                        <th class="text-center" width="80px">Kode </th>
                                        <th width="300px">Nama Gudang</th>
                                        <th width="400px">Deskripsi</th>
                                        <th class="text-center"> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="list_gudang">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->


        </div>
    </div>
</main>

<!-- Modal Gudang-->

<div class="modal fade" id="modal-gudang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header modal-header-app flat">
                <h5 class="modal-title modal-title-app">Add New Gudang</h5>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-gudang" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input name="id" type="hidden">
                        <input class="form-control flat" name="kode_gudang" type="text" placeholder="Isi kode gudang" autocomplete="off">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="nama_gudang">Nama</label>
                        <input class="form-control flat" name="nama_gudang" type="text" placeholder="Isi nama gudang" autocomplete="off">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control flat" name="deskripsi" type="text" placeholder="Isi deskripsi gudang" autocomplete="off">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success flat" type="button" id="btnSimpan"><i class="fa fa-floppy-o"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->





<?php $this->load->view('template/footer'); ?>

<script>
    $(document).ready(function() {
        // Satuan
        list_gudang();



        // Ahir document ready
    });


    //klik tambah
    $("#tambah").click(function() {
        $('#form-gudang')[0].reset();
        $("#modal-gudang").modal("show");
        $('#modal-gudang').find('.modal-title').text('Tambah Gudang');
        $('#form-gudang').attr('action', base_url + 'master/gudang/tambah');
        $('input[name=kode_gudang]').removeClass('is-invalid');
        $('input[name=nama_gudang]').removeClass('is-invalid');
        $('input[name=deskripsi]').removeClass('is-invalid');

    });

    // Klik Simpan
    // Tambah kategori
    $('#btnSimpan').on('click', function() {
        var url = $('#form-gudang').attr('action');
        var data = $('#form-gudang').serialize();
        // Validasi ====
        var kode_gudang = $('input[name=kode_gudang]');
        var nama_gudang = $('input[name=nama_gudang]');
        var deskripsi = $('input[name=deskripsi]');
        var result = '';
        if (kode_gudang.val() == '') {
            kode_gudang.addClass('is-invalid');
            $('#form-gudang').find('.invalid-feedback').text('Invalid feedback');
        } else {
            kode_gudang.removeClass('is-invalid');
            $('#form-gudang').find('.invalid-feedback').text('');
            result += '1';
        }

        if (nama_gudang.val() == '') {
            nama_gudang.addClass('is-invalid');
            $('#form-gudang').find('.invalid-feedback').text('Invalid feedback');
        } else {
            nama_gudang.removeClass('is-invalid');
            $('#form-gudang').find('.invalid-feedback').text('');
            result += '2';
        }
        if (deskripsi.val() == '') {
            deskripsi.addClass('is-invalid');
            $('#form-gudang').find('.invalid-feedback').text('Invalid feedback');
        } else {
            deskripsi.removeClass('is-invalid');
            $('#form-gudang').find('.invalid-feedback').text('');
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
                        $('#modal-gudang').modal('hide');
                        $('#form-gudang')[0].reset();
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
                            toastr.success('Data Gudang Berhasil di ' + type + '!', 'Berhasil...');

                        }, 100);

                        list_gudang();
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
    $('#list_gudang').on('click', '.item-edit', function() {
        const id = $(this).attr('data');
        $('#form-gudang')[0].reset();
        $("#modal-gudang").modal("show");
        $('#modal-gudang').find('.modal-title').text('Ubah Gudang');
        $('#form-gudang').attr('action', base_url + 'master/gudang/ubah');
        $('input[name=kode_gudang]').removeClass('is-invalid');
        $('input[name=nama_gudang]').removeClass('is-invalid');
        $('input[name=deskripsi]').removeClass('is-invalid');

        $.ajax({
            type: 'get',
            url: base_url + 'master/gudang/get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('input[name=id]').val(data.id);
                $('input[name=kode_gudang]').val(data.kode_gudang);
                $('input[name=nama_gudang]').val(data.nama_gudang);
                $('input[name=deskripsi]').val(data.deskripsi);
            }
        });
    });

    // List Kategori
    function list_gudang() {
        $.ajax({
            url: base_url + 'master/gudang/list_gudang',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += `  <tr>
                                    <td class="text-center">` + no++ + `</td>
                                    <td class="text-center">` + data[i].kode_gudang + `</td>
                                    <td >` + data[i].nama_gudang + `</td>
                                    <td >` + data[i].deskripsi + `</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="item-edit mr-3" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil text-primary"></i></a>
                                            <a class=" item-delete" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-times text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>`;

                }
                $('#list_gudang').html(html);
            }
        });
    }












    // ========== Subkategori === //


    // List Merek
    function list_merek() {
        $.ajax({
            url: base_url + 'barang/satuan/list_merek',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += `  <tr>
                                    <td class="text-center">` + no++ + `</td>
                                    <td class="text-center">` + data[i].nama_merek + `</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="item-edit mr-3" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil  text-primary"></i></a>
                                            <a class=" item-delete" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-times  text-primary"></i></a>
                                        </div>
                                    </td>
                                </tr>`;

                }
                $('#list_merek').html(html);
                $('#table-merek').DataTable();
            }
        });
    }


    // klik tambah
    $("#tambah-merek").click(function() {
        $('#form-merek')[0].reset();
        $("#modal-merek").modal("show");
        $('#modal-merek').find('.modal-title').text('Tambah Merek');
        $('#form-merek').attr('action', base_url + 'barang/satuan/tambah_merek');
        $('input[name=merek]').removeClass('is-invalid');
    });

    // Klik Simpan Merek
    $('#btnmerek').on('click', function() {
        var url = $('#form-merek').attr('action');
        var data = $('#form-merek').serialize();
        // Validasi ====
        var merek = $('input[name=merek]');

        var result = '';
        if (merek.val() == '') {
            merek.addClass('is-invalid');
            $('#form-merek').find('.invalid-feedback').text('Invalid feedback');
        } else {
            merek.removeClass('is-invalid');
            $('#form-merek').find('.invalid-feedback').text('');
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
                        $('#modal-merek').modal('hide');
                        $('#form-merek')[0].reset();
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
                            toastr.success('Merek Produk Berhasil di ' + type + '!', 'Berhasil...');

                        }, 100);

                        list_merek();
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
    $('#list_merek').on('click', '.item-edit', function() {
        const id_merek = $(this).attr('data');
        $('#form-merek')[0].reset();
        $('#modal-merek').modal('show');
        $('#modal-merek').find('.modal-title').text('Ubah Merek');
        $('#form-merek').attr('action', base_url + 'barang/satuan/ubah_merek');
        $('input[name=merek]').removeClass('is-invalid');

        $.ajax({
            type: 'get',
            url: base_url + 'barang/satuan/get_merek',
            data: {
                id_merek: id_merek
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('input[name=id_merek]').val(data.id);
                $('input[name=merek]').val(data.nama_merek);
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