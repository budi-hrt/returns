<div class="row">
    <div class="col-lg">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('icon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('massage'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('updatemenu'); ?>"></div>
        <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
        <div class="clearfix">
            <span class="float-right">
                <a class="btn btn-teal mb-1 flat" href="#newMenuModal" data-toggle="modal"
                    data-target="#newMenuModal">Add New Menu</a>
            </span>
        </div>
        <div class="card card-border-app">
            <div class="card-header bg-primary">
                <i class="fa fa-align-justify"></i>Table Menu
            </div>
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
                            <td><i class="<?= $m['icon']; ?> icon text-primary mr-2"></i> <?= $m['icon']; ?>
                            </td>
                            <td class="text-center">
                                <a class="item-edit" href="javascript:;" data="<?= $m['id']; ?>"><i
                                        class="fa fa-pencil text-primary"></i></a>
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



<!-- // Flash alert -->
<!-- <script>
const flashdata = $('.flash-data').data('flashdata');
if (flashdata == 'updatemenu') {
    $('.alert-success').html('Menu berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
}