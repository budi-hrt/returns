<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Barang
        </li>
        <li class="breadcrumb-item active">Satuan & Merek</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <!-- Kategori -->
                <div class="col-lg-6">
                    <div class="clearfix">
                        <span class="float-left">
                            <h5>SATUAN</h5>
                        </span>
                        <span class="float-right"><a id="tambahSatuan" class="btn btn-teal flat mb-2 " href="javascript:;">Add New Kategori</a></span>
                    </div>
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Satuan</div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-bordered  table-sm" id="table-satuan">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="50px">#</th>
                                        <th class="text-center" width="300px">Nama Satuan</th>
                                        <th class="text-center"> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="list_satuan">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.col-->


                <!-- Sub kategori -->
                <div class="col-lg-6">
                    <div class="clearfix">
                        <span class="float-left">
                            <h5>MEREK</h5>
                        </span>
                        <span class="float-right"><a id="tambah-merek" class="btn btn-teal flat mb-2 " href="javascript:;">Add New Subkategori</a></span>
                    </div>
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Sub Kategori</div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-bordered  table-sm" id="table-merek">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="20px">#</th>
                                        <th class="text-center" width="300">Merek</th>
                                        <th class="text-center"> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="list_merek">

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

<!-- Modal Satuan-->

<div class="modal fade" id="modal-satuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header modal-header-app flat">
                <h5 class="modal-title modal-title-app">Add New Satuan</h5>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-satuan" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namasatuan">Satuan</label>
                        <input name="idsatuan" type="hidden">
                        <input class="form-control flat" name="namasatuan" type="text" placeholder="Isi nama satuan" autocomplete="off">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success flat" type="button" id="btnsatuan"><i class="fa fa-floppy-o"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->



<!-- Modal Sub-->


<div class="modal fade" id="modal-merek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-app flat">
            <div class="modal-header modal-header-app flat">
                <p class="modal-title modal-title-app">Tambah Merek Barang</p>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-merek" action="">
                <div class="modal-body flat">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="merek">Merek</label>
                        <div class="col-md-9">
                            <input type="hidden" name="id_merek">
                            <input class="form-control flat" id="merek" type="text" name="merek" placeholder="Isikan Nama Merek">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary flat" type="button" data-dismiss="modal">batal</button>
                <button class="btn btn-primary flat" id="btnmerek" type="button"><i class="fa fa-floppy-o"></i> Simpan</button>
            </div>
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
        list_satuan();

        // Merek
        list_merek();


        // Ahir document ready
    });


    //klik tambah
    $("#tambahSatuan").click(function() {
        $('#form-satuan')[0].reset();
        $("#modal-satuan").modal("show");
        $('#modal-satuan').find('.modal-title').text('Tambah Satuan');
        $('#form-satuan').attr('action', base_url + 'barang/satuan/tambah');
        $('input[name=namasatuan]').removeClass('is-invalid');

    });

    // Klik Simpan
    // Tambah kategori
    $('#btnsatuan').on('click', function() {
        var url = $('#form-satuan').attr('action');
        var data = $('#form-satuan').serialize();
        // Validasi ====
        var namasatuan = $('input[name=namasatuan]');
        var result = '';
        if (namasatuan.val() == '') {
            namasatuan.addClass('is-invalid');
            $('#form-satuan').find('.invalid-feedback').text('Invalid feedback');
        } else {
            namasatuan.removeClass('is-invalid');
            $('#form-satuan').find('.invalid-feedback').text('');
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
                        $('#modal-satuan').modal('hide');
                        $('#form-satuan')[0].reset();
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
                            toastr.success('Satuan Produk Berhasil di ' + type + '!', 'Berhasil...');

                        }, 100);

                        list_satuan();
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
    $('#list_satuan').on('click', '.item-edit', function() {
        const id = $(this).attr('data');
        $('#form-satuan')[0].reset();
        $("#modal-satuan").modal("show");
        $('#modal-satuan').find('.modal-title').text('Ubah Satuan');
        $('#form-satuan').attr('action', base_url + 'barang/satuan/ubah');
        $('input[name=namasatuan]').removeClass('is-invalid');

        $.ajax({
            type: 'get',
            url: base_url + 'barang/satuan/get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('input[name=idsatuan]').val(data.id);
                $('input[name=namasatuan]').val(data.nama_satuan);
            }
        });
    });

    // List Kategori
    function list_satuan() {
        $.ajax({
            url: base_url + 'barang/satuan/list_satuan',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += `  <tr>
                                    <td class="text-center">` + no++ + `</td>
                                    <td class="text-center">` + data[i].nama_satuan + `</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="item-edit mr-3" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil text-primary"></i></a>
                                            <a class=" item-delete" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-times text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>`;

                }
                $('#list_satuan').html(html);
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