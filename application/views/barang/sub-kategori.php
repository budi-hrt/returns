<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Barang</li>
        <li class="breadcrumb-item">
            Admin
        </li>
        <li class="breadcrumb-item active">Sub Kategori</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-6">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
                    <div class="clearfix">
                        <span class="float-right"><a id="tambah-sub" class="btn btn-teal flat mb-2 " href="javascript:;">Add New Subkategori</a></span>
                    </div>
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Sub Kategori</div>
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
                <!-- /.col-->
            </div>
            <!-- /.row-->


        </div>
    </div>
</main>

<!-- Modal -->


<div class="modal fade" id="modal-subkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
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
                            <input class="form-control flat" name="name" type="text" id="name" placeholder="Isikan Subkategori" autocomplete="off">
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>


                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary flat" type="button" data-dismiss="modal">batal</button>
                <button class="btn btn-primary flat" id="btnSimpan" type="button"><i class="fa fa-floppy-o"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->
<!-- /.modal-->

<!-- Modal Edit -->
<div class="modal fade" id="subkategori-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Subkategori</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('barang/editsubkategori'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select id="id_kategoriedit" name="id_kategoriedit" required class="form-control">
                            <option value="">Pilih Kategori...</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="idedit_subkategori" type="hidden">
                        <input class="form-control" name="subkategoriedit" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- End Modal Edit -->


<?php $this->load->view('template/footer'); ?>

<script>
    $(document).ready(function() {
        list_subkategori();


        // Autocomplate
        $("#kategori").autocomplete({
            source: "<?php echo site_url('barang/kategori/get_kategori'); ?>",
            select: function(event, ui) {
                $('[name="id_kategori"]').val(ui.item.description);
                $('[name="kategori"]').val(ui.item.label);
                $('[name="kategori"]').removeClass('is-invalid');
                $('#form-subkategori').find('.invalid-feedback').text('');
                document.getElementById("name").focus();
            }
        });
    });


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


    // Klik Simpan
    $('#btnSimpan').on('click', function() {
        var url = $('#form-subkategori').attr('action');
        var data = $('#form-subkategori').serialize();
        // Validasi ====
        var kategori = $('input[name=kategori]');
        var id_kategori = $('input[name=id_kategori]');
        var subkategori = $('input[name=name]');
        var result = '';
        if (kategori.val() == '') {
            kategori.addClass('is-invalid');
            $('#form-kategori').find('.invalid-feedback').text('Invalid feedback');
        } else {
            kategori.removeClass('is-invalid');
            $('#form-kategori').find('.invalid-feedback').text('');
            result += '1';
        }
        if (id_kategori.val() == '') {
            alert('Data Kategori tidak ditemukan')
        } else {

            result += '2';
        }

        if (subkategori.val() == '') {
            subkategori.addClass('is-invalid');
            $('#form-kategori').find('.invalid-feedback').text('Invalid feedback');
        } else {
            subkategori.removeClass('is-invalid');
            $('#form-kategori').find('.invalid-feedback').text('');
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
</script>


<?php $this->load->view('template/footHtml'); ?>