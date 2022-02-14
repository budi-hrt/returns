<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Pembelian
        </li>
        <li class="breadcrumb-item active">Purchase Order</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= form_error('icon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('massage'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('updatemenu'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
                    <div class="clearfix">
                        <span class="float-right">
                            <a class="btn btn-teal mb-1 flat" href="#newMenuModal" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                        </span>
                    </div>
                    <div class="card card-border-app">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Menu</div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-bordered  table-sm" id="table-menu">
                                <thead>
                                    <tr>
                                        <th width="50px" class="text-center">#</th>
                                        <th>Menu</th>
                                        <th>Icon</th>
                                        <th class="text-center"> Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($menu as $m) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $m['menu']; ?></td>
                                            <td><i class="<?= $m['icon']; ?> icon text-primary mr-2"></i> <?= $m['icon']; ?></td>
                                            <td class="text-center">
                                                <a class="item-edit" href="javascript:;" data="<?= $m['id']; ?>"><i class="fa fa-pencil text-primary"></i></a>
                                                <a href="#"><i class="fa fa-times text-primary ml-1"></i></a>
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

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Menu</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="menu" type="text" placeholder="Insert name menu">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="icon" type="text" placeholder="Insert name icon">
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
<div class="modal fade" id="menu-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Menu</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editmenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="idedit" type="hidden">
                        <input class="form-control" name="menuedit" type="text" placeholder="Insert name menu" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="iconedit" type="text" placeholder="Insert name icon" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="btnedit">Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- End Modal Edit -->


<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/menu.js'); ?>"></script>

<script>
    // Flash alert
    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata == 'updatemenu') {
        $('.alert-success').html('Menu berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
    }
</script>


<?php $this->load->view('template/footHtml'); ?>