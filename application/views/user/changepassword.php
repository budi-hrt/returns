<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            User
        </li>
        <li class="breadcrumb-item active">Change password</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">
                            <strong>Chnage Password</strong> Form
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
                                <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input class="form-control flat" id="current_password" type="password" name="current_password">
                                        <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password1">New Password</label>
                                        <input class="form-control flat" id="new_password1" type="password" name="new_password1" placeholder="Enter New Password..">
                                        <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password2">Repeat Password</label>
                                        <input class="form-control flat" id="new_password2" type="password" name="new_password2" placeholder="Enter Repeat Password..">
                                        <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-teal flat" type="submit">
                                <i class="fa fa-floppy-o"></i> Submit</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>