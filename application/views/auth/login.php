<body class="app flex-row align-items-center">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <form action="<?= base_url('auth'); ?>" method="post">
                            <div class="card-body">
                                <h1>Login</h1>
                                <?= $this->session->flashdata('massage'); ?>
                                <p class="text-muted">Sign In to your account</p>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@
                                            <!-- <i class="icon-user"></i> -->
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Enter Email adress.." name="email" value="<?= set_value('email'); ?>">
                                </div>
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="<?= base_url('auth/registration'); ?>" class="btn btn-primary active mt-3" type="button">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>