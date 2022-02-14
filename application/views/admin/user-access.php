<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Admin
        </li>
        <li class="breadcrumb-item active">User Access</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-7">

                    <?= $this->session->flashdata('massage'); ?>
                    <h5></h5>
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">Nama User : <?php echo $userData['name']; ?>
                            <div class="card-header-actions">
                                <a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true">
                                    <i class="icon-arrow-up"></i>
                                </a>
                                <a class="card-header-action btn-close" href="<?= base_url('admin/datauser'); ?>">
                                    <i class="icon-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse show" id="collapseExample">
                            <div class="card-body">

                                <table class="table table-bordered table-striped table-sm" id="table-userakses">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Submenu</th>
                                            <th class="text-center"> Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($submenu as $sm) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $sm['title']; ?></td>
                                                <td class="text-center">
                                                    <div class="form-check checkbox">
                                                        <input class="form-check-input" name="is_active" type="checkbox" <?= check_subaccess($userData['id'], $sm['id'], $sm['menu_id']); ?> data-user="<?= $userData['id']; ?>" data-submenu="<?= $sm['id']; ?>" data-menuid="<?= $sm['menu_id']; ?>">
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php $no++; ?>
                                        <?php endforeach; ?>
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






<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/data-user.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#table-userakses').dataTable({
            searching: false,
            info: false,
            bFilter: false,
            ordering: false,
            bLengthChange: false

        });
    });
</script>
<?php $this->load->view('template/footHtml'); ?>