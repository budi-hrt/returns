<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gaji</li>
        <li class="breadcrumb-item">
            Penggajian
        </li>
        <!-- <li class="breadcrumb-item active">Data Stok In</li> -->
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">



            <div class="row">

                <div class="col-lg-12">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
                    <div class="alert alert-danger" role="alert" style="display:none;">Menu Updated</div>
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Penggajian
                            <div class="card-header-actions">
                                <a class="btn btn-putih btn-sm flat" href="javascript:;" id="tambah"
                                    style="margin-top:-10px;">
                                    <i class="icon-settings"></i>Tambah Baru
                                </a>

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm"
                                id="table-upah">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Kode</th>
                                        <th>Priode</th>
                                        <th>Jumlah Penerima</th>
                                        <th>Total Upah</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center"> update by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gaji as $g) : ?>
                                    <tr>
                                        <td>
                                            <a href="javascript:;" class="item-edit" data-id="<?= $g['id_gaji']; ?>"
                                                data-kode="<?= $g['kode_gaji']; ?>"
                                                data-status="<?= $g['status']; ?>"><i
                                                    class="fa fa-edit text-success"></i></a>
                                            <a href="javascript:;" class="item-hapus"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </td>
                                        <td><?= $g['kode_gaji']; ?></td>
                                        <td><?= $g['bulan']; ?>- <?= $g['tahun']; ?></td>
                                        <td><?= $g['jumlah_kry']; ?></td>
                                        <td><?= $g['total_upah']; ?></td>
                                        <td>
                                            <?php if ($g['status'] == "pending") : ?>
                                            <b class="text-danger">Pending..</b>
                                            <?php else : ?>
                                        <td class="text-center">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $g['name']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
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

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header  modal-header-app flat">
                <h6 class=" modal-title">Konfirmasi update data</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flat">
                <?= form_open('gaji/bpjs/hapus_detil', 'id="form_hapus"'); ?>

                <h6>Yakin akan mengubah transaksi <b class="text-success">Gaji</b> -><b class="kode_gaji"></b></h6>
                <input name="id" id="id" type="hidden">
                <input name="status" id="status" type="hidden">
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm flat" type="button" id="btn-update">Ya, Update !</button>
                <button class="btn btn-danger btn-sm flat" type="button" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>




<!-- Loader -->
<div id="throbber" class="modal" role="dialog"
    style="display:none; position:relative; opacity:0.6; background-color:white;">
    <img class="spiner" src="<?= base_url('assets'); ?>/img/loader/5.gif" />
</div>


<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/gaji.js'); ?>"></script>
<script>
// Flash alert
// const flashdata = $('.flash-data').data('flashdata');
// if (flashdata == 'suplierupdate') {
//     $('.alert-success').html('Suplier berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
// }





// Loader
function block() {
    var body = $('#panel-body');
    var w = body.css("width");
    var h = body.css("height");
    var trb = $('#throbber');
    var position = body.offset(); // top and left coord, related to document

    trb.css({
        width: w,
        height: h,
        opacity: 0.7,
        position: 'absolute',
        top: position.top,
        left: position.left
    });
    trb.show();
}

function unblock() {
    var trb = $('#throbber');
    trb.hide();
}
</script>

<?php $this->load->view('template/footHtml'); ?>