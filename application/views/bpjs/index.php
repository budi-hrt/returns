<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Iuran</li>
        <li class="breadcrumb-item">
            Bpjs
        </li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('massage'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('suplierupdate'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
                    <div class="alert alert-danger" role="alert" style="display:none;">Menu Updated</div>
                    <a class="btn btn-success flat btn-sm mb-3" href="javascript:;" id="tambah"><i
                            class="fa fa-file-o"></i> Tambah data Iuran Bpjs</a>
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>Table Iuran Bpjs
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm"
                                id="table-bpjs">
                                <thead>
                                    <tr>
                                        <th class="text-center">Aksi</th>
                                        <th class="text-center">Uraian</th>
                                        <th class="text-center">Priode</th>
                                        <th class="text-center">Total Iuran</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Update by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bpjs as $b) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-success item-edit flat" href="javascript:;"
                                                data="<?= $b['id_bpjs']; ?>" data-kode="<?= $b['kode_bpjs']; ?>"
                                                data-status="<?= $b['status']; ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger item-delete flat" href="javascript:;"
                                                data="<?= $b['id_bpjs']; ?>" data-kode="<?= $b['kode_bpjs']; ?>"
                                                data-priode="<?= $b['bulan']; ?>- <?= $b['tahun']; ?> "><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                        <td><?= $b['kode_bpjs']; ?>-><?= $b['ket_bpjs']; ?></td>
                                        <td class="text-center"><?= $b['bulan']; ?>-<?= $b['tahun']; ?></td>
                                        <td><?= $b['total_bpjs']; ?></td>
                                        <td class="text-center"><?php if ($b['status'] == 'pending') : ?>
                                            <b class="text-danger">Pending..</b>
                                            <?php else : ?>
                                            <b class="text-success">Selesai</b>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <label><?= $b['name']; ?></label>
                                        </td>
                                        </td>
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

<!-- Modal -->



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

                <h6>Yakin akan mengubah iuran <b class="text-success">BPJS</b> -><b class="kode_bpjs"></b></h6>
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





<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header  modal-header-app flat">
                <h6 class=" modal-title">Konfirmasi batal transaksi</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flat">
                <?= form_open('gaji/bpjs/hapus_bpjs', 'id="form-hapus"'); ?>

                <h6>Yakin akan membatalkan transaksi <b class="text-success">BPJS</b><b class="nomor"></b></h6>
                <input name="id_bpjs" id="id_bpjs" type="hidden">
                <input name="nomor" id="nomor" type="hidden">
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm flat" type="submit" id="btn-hapus">Ya, Batalkan !</button>
                <button class="btn btn-success btn-sm flat" type="button" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/index-bpjs.js'); ?>"></script>
<script>
// Flash alert
const flashdata = $('.flash-data').data('flashdata');
if (flashdata == 'suplierupdate') {
    $('.alert-success').html('Suplier berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
}
</script>

<?php $this->load->view('template/footHtml'); ?>