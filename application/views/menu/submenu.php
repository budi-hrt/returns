<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Admin
        </li>
        <li class="breadcrumb-item active">Submenu management</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <h1>Submenu Management</h1>
            <br>
            <div class="row">

                <div class="col-lg-12">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                  
                    <?= $this->session->flashdata('massage'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('submenuupdate'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
                    <a class="btn btn-primary mb-3" href="#submenuModal" data-toggle="modal" data-target="#submenuModal">Add New Submenu</a>
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>Table Menu</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm" id="Mytable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Active</th>
                                        <th class="text-center"> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><i class="<?= $sm['icon_sub']; ?> icon"></i> <?= $sm['icon_sub']; ?></td>
                                            <td class="text-center"><?= $sm['is_active']; ?></td>
                                            <td class="text-center">
                                                <a class="badge badge-sm badge-success item-edit" href="javascript:;" data="<?= $sm['id'];?>">Edit</a>
                                                <a class="badge badge-sm badge-danger item-delete" href="javascript:;">Delete</a>
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

<div class="modal fade" id="submenuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Submenu</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="Submenu title" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="menu_id" id="menu_id">
                            <option value="">Select menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="url" type="text" placeholder="Submenu url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="icon" type="text" placeholder="Submenu icon" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_active" id="is_active" type="checkbox" value="1" checked>
                            <label class="form-check-label" for="is_active">Active ?</label>
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
<div class="modal fade" id="submenu-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Submenu</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editsubmenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idsubmenu">
                        <input class="form-control" name="titleedit" type="text" placeholder="Submenu title">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="menu_edit" id="menu_edit">
                            <option value="">Select menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="urledit" type="text" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="icon_subedit" type="text" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_activeedit" id="is_activeedit" type="checkbox" value="1" checked>
                            <label class="form-check-label" for="is_activeedit">Active ?</label>
                        </div>
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
<!-- /.modal-->

<?php $this->load->view('template/footer2') ;?>
<script src="<?= base_url('assets/js/menu.js');?>"></script>
<script>
// Flash alert
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata == 'submenuupdate') {
            $('.alert-success').html('Submenu berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
        }
</script>

<?php $this->load->view('template/footHtml') ;?>