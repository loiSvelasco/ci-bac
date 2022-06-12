<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Edit Details<?= $this->endSection() ?>
<?= $this->section('header') ?>Edit <?= $user->name ?><?= $this->endSection() ?>


<?= $this->section('main') ?>

<div class="row">
    <div class="col-6">
        <div class="card rounded-0">
            <div class="card-body">
                <?= form_open("Dashboard/updatedetails")?>
                    <?= $this->include('Dashboard/detailsform') ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
