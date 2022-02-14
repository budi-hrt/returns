<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Barang
        </li>
        <li class="breadcrumb-item active">Merek</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <h1>Merek</h1>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('massage'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('updatemerek'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Merek Updated</div>
                    <a class="btn btn-primary mb-3" href="#newMerekModal" data-toggle="modal" data-target="#newMerekModal">Add New Merek</a>
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>Table Merek</div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-bordered table-striped table-sm" id="table-merek">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Merek</th>
                                        <th class="text-center"> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($merek as $m) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $m['nama_merek']; ?></td>
                                            <td class="text-center">
                                                <a class="badge badge-sm badge-success item-edit" href="javascript:;" data="<?= $m['id'];?>">Edit</a>
                                                <a class="badge badge-sm badge-danger" href="#">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
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

<div class="modal fade" id="newMerekModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Merek</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url('barang/merek'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-email">Merek Barang</label>
                        <div class="col-md-9">
                        <input class="form-control" name="nama" type="text" placeholder="Insert merek barang" autocomplete="off">
                    </div>         
                    </div>         
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<!-- Modal Edit -->
<div class="modal fade" id="merek-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url('barang/editmerek'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <input class="form-control" name="idedit_merek" type="hidden" >
                        <label class="col-md-3 col-form-label" for="hf-email">Merek Barang</label>
                        <div class="col-md-9">
                        <input class="form-control" name="merekedit" type="text"  required>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" >Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- End Modal Edit -->


<?php $this->load->view('template/footer2') ;?>
<script src="<?=base_url('assets/js/barang.js');?>"></script>

<script>

// Flash alert
const flashdata = $('.flash-data').data('flashdata');
if (flashdata == 'updatekategori') {
    $('.alert-success').html('Kategori berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
}
</script>


<?php $this->load->view('template/footHtml') ;?>