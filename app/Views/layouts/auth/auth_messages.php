<?php if (session()->has('warning')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-minus-circle mr-2"></i></strong> <?= session('warning'); ?>
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