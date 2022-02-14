<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.14
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Blocked</title>
    <!-- Icons-->
    <link href="<?= base_url('assets/vendors'); ?>/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/vendors'); ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <h1 class="float-left display-3 mr-4">404</h1>
                    <h4 class="pt-3">Oops! You're lost.</h4>
                    <p class="text-muted">The page you are looking for was not found.</p>
                </div>
                <div>
                    <a href="<?= base_url('user'); ?>" class="btn btn-info">&larr;
                        Back to Dashboard!</a> </div>
            </div>
        </div>
    </div> <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('assets/vendors'); ?>/jquery/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/vendors'); ?>/popper.js/js/popper.min.js"></script>
    <script src="<?= base_url('assets/vendors'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/vendors'); ?>/pace-progress/js/pace.min.js"></script>
    <script src="<?= base_url('assets/vendors'); ?>/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/vendors'); ?>/@coreui/coreui/js/coreui.min.js"></script>
</body>

</html>