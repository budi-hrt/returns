<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">

                    <form action="<?= base_url('auth/registration'); ?>" method="post">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" name="name" placeholder="Fullname" value="<?= set_value('name'); ?>">
                            </div>

                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input class="form-control" type="text" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                            </div>

                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" name="password1" placeholder="Password">
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" placeholder="Repeat password" name="password2">
                            </div>
                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                        </div>
                    </form>
                    <div class="card-footer p-4">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>