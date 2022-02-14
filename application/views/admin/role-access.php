<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Admin
        </li>
        <li class="breadcrumb-item active">Role Access</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <!-- flash alert -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
                    <!-- Ahir Flash Alert -->
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">Role : <?php echo $role['role']; ?>
                            <div class="card-header-actions">
                                <a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true">
                                    <i class="icon-arrow-up"></i>
                                </a>
                                <a class="card-header-action btn-close" href="<?= base_url('admin/role'); ?>">
                                    <i class="icon-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse show" id="collapseExample">
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th class="text-center"> Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $m['menu']; ?></td>
                                                <td class="text-center">
                                                    <div class="form-check checkbox">
                                                        <input class="form-check-input" name="is_active" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
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

<!-- Modal -->

<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function() {
        //flash alert
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Akses Role Berhasil disimpan!', 'Berhasil...');

            }, 100);

        }
        // end alert
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        const role = $(this).data('roleid');
        const rId = btoa(roleId);

        $.ajax({
            url: "<?= base_url('admin/changeAccess'); ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + rId;
            }

        });
    });
</script>
<?php $this->load->view('template/footHtml'); ?>