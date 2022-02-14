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
    <title><?= $title; ?></title>
    <!-- Icons-->
    <link href="<?= base_url('assets/vendors'); ?>/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>DataTables/Bootstrap-4-4.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>DataTables/datatables.min.css" />
    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/vendors'); ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendors'); ?>/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-select/css/bootstrap-select.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/jquery-ui-1.12.1/jquery-ui.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/appstyle.css">

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

    <script>
        var base_url = "<?= base_url(); ?>";
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show" id="panel-body">


    <header class="app-header navbar navbar-header">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img class="navbar-brand-full" src="<?= base_url('assets'); ?>/img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
            <img class="navbar-brand-minimized" src="<?= base_url('assets'); ?>/img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a class="nav-link icon-header" href="#">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>
            <li class="nav-item d-md-down-none">
                <small><?= $user['name']; ?></small>
            </li>
            <li class="nav-item dropdown mr-3">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="img-avatar" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-center">
                        <strong>Settings</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-wrench"></i> Settings</a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-usd"></i> Payments
                        <span class="badge badge-secondary">42</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-shield"></i> Lock Account</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                        <i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>

    </header>