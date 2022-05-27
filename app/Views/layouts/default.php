<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->renderSection('title') ?>
    </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= site_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= site_url('assets/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include('layouts/navbar') ?>
        <?= $this->include('layouts/sidebar') ?>
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
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                <!-- <li class="breadcrumb-item active">Starter Page</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                <?= $this->renderSection('main') ?>
                </div>
            </div>
        </div>
        <?= $this->include('layouts/footer') ?>
    </div>

    <script src="<?= site_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?= site_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= site_url('assets/') ?>dist/js/adminlte.min.js"></script>
</body>
</html>