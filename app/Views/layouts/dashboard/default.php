<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Starter CodeIgniter 4 Framework with AdminLTE and User Management">
    <meta name="author" content="Louis Velasco">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= site_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/adminlte.min.css'); ?>">
    <?= $this->renderSection('css') ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include('layouts/dashboard/navbar') ?>
        <?= $this->include('layouts/dashboard/sidebar') ?>
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?= $this->renderSection('header') ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right"> -->
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                <!-- <li class="breadcrumb-item active">Starter Page</li> -->
                            <!-- </ol> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <?php if (session()->has('warning')): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-minus-circle mr-2"></i></strong> <?= session('warning'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-circle mr-2"></i> Errors:</strong>
                        <?php foreach(session('errors') as $error): ?>
                        <li><?= $error; ?></li>
                        <?php endforeach ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>
                    
                    <?php if (session()->has('info')): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-info-circle mr-2"></i></strong> <?= session('info'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>

                    <?php if (session()->has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check-circle mr-2"></i></strong> <?= session('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif ?>
                
                    <?= $this->renderSection('main') ?>
                </div>
            </div>
        </div>
        <?= $this->include('layouts/dashboard/footer') ?>
    </div>

    <script src="<?= site_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?= site_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <?= $this->renderSection('js') ?>

    <script src="<?= site_url('assets/') ?>dist/js/adminlte.min.js"></script>
</body>
</html>