<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Admin
        </li>
        <li class="breadcrumb-item active">Role</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('massage'); ?>
                    <div class="clearfix">
                        <span class="float-right"><a id="tambah" class="btn btn-teal flat mb-2 " href="javascript:;">Add New Role</a></span>
                    </div>
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">Role
                            <div class="card-header-actions">
                                <a class="card-header-action btn-setting" href="#">
                                    <i class="icon-settings"></i>
                                </a>
                                <a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true">
                                    <i class="icon-arrow-up"></i>
                                </a>
                                <a class="card-header-action btn-close" href="#">
                                    <i class="icon-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse show" id="collapseExample">
                            <div class="card-body">

                                <table class="table table-responsive-sm table-bordered table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th class="text-center" width="800px">Role</th>
                                            <th class="text-center"> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_role">

                                    </tbody>
                                </table>

                            </div>
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

<div class="modal fade" id="modal-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header modal-header-app flat">
                <p class="modal-title modal-title-app">Add New Role</p>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-role" action="">
                <div class="modal-body flat">
                    <div class="form-group">
                        <input name="id" type="hidden">
                        <input class="form-control flat" name="nama" type="text" placeholder="Insert name role" autocomplete="off">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-success flat" type="button" id="btnSimpan"><i class="fa fa-floppy-o"></i> Simpan</button>
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
        list_role();
    });

    // Klick Tambah
    $("#tambah").click(function() {
        console.log('tes');
        $('#form-role')[0].reset();
        $('#modal-role').modal('show');
        $('#modal-role').find('.modal-title').text('Tambah Role');
        $('#form-role').attr('action', base_url + 'admin/tambah_role');
    });



    // Tambah Role/ Klick Simpan Role
    $('#btnSimpan').on('click', function() {
        var url = $('#form-role').attr('action');
        var data = $('#form-role').serialize();
        // Validasi ====
        var namarole = $('input[name=nama]');
        var result = '';
        if (namarole.val() == '') {
            namarole.addClass('is-invalid');
            $('#form-role').find('.invalid-feedback').text('Invalid feedback');
        } else {
            namarole.removeClass('is-invalid');
            $('#form-role').find('.invalid-feedback').text('');
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
                        $('#modal-role').modal('hide');
                        $('#form-role')[0].reset();
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
                            toastr.success('Data Role Berhasil di ' + type + '!', 'Berhasil...');

                        }, 100);

                        list_role();
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


    // Klik Edit Role
    // ubah role
    $('#list_role').on('click', '.item-edit', function() {
        const id = $(this).attr('data');
        $('#form-role')[0].reset();
        $("#modal-role").modal("show");
        $('#modal-role').find('.modal-title').text('Ubah Role');
        $('#form-role').attr('action', base_url + 'admin/ubah_role');

        $.ajax({
            type: 'get',
            url: base_url + 'admin/get_role',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('input[name=id]').val(data.id);
                $('input[name=nama]').val(data.role);
            }
        });
    });

    // Klik Akses
    $('#list_role').on('click', '.item-access', function() {

        var id = $(this).attr('data');
        var roleId = btoa(id);

        window.location.href = base_url + 'admin/roleaccess/' + roleId;
    });


    // Tampil List Role
    function list_role() {
        $.ajax({
            url: base_url + 'admin/list_role',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += `  <tr>
                                    <td class="text-center">` + no++ + `</td>
                                    <td class="text-center">` + data[i].role + `</td>
                                    <td class="text-center">
                                       
                                            <a class="item-access" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-check-square-o mr-2 text-primary"></i></a>
                                            <a class="item-edit" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-pencil mr-2 text-primary"></i></a>
                                            <a class="item-delete" href="javascript:;" data="` + data[i].id + `"><i class="fa fa-times mr-2 text-primary"></i></a>
                                      
                                    </td>
                                </tr>`;

                }
                $('#list_role').html(html);
            }
        });
    }
</script>
<?php $this->load->view('template/footHtml'); ?>