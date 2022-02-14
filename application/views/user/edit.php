<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            User
        </li>
        <li class="breadcrumb-item active">My Profile</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">
                            <strong>Edit</strong> Profile
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
                                <?php echo form_open_multipart('user/edit'); ?>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control flat" id="email" type="email" name="email" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="name">Full Name</label>
                                    <div class="col-md-9">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        <input class="form-control flat" id="name" type="text" name="name" value="<?= $user['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Picture</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>

                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-teal flat" type="submit">
                                <i class="fa fa-pencil"></i> Edit Profile</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<?php $this->load->view('template/footer'); ?>
<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
</script>
<?php $this->load->view('template/footHtml'); ?>