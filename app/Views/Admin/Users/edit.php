<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Edit User<?= $this->endSection() ?>
<?= $this->section('header') ?>
<a href="<?= site_url("Admin/Users/") ?>" class="btn btn-light rounded-0"><i class="fa fa-arrow-left"></i></a>
Edit <?= $user->name ?>
<?= $this->endSection() ?>


<?= $this->section('main') ?>

<div class="row">
    <div class="col-6">
        <div class="card rounded-0">
            <div class="card-body">
                <?= form_open("Admin/Users/update/$user->id")?>
                    <?= $this->include('Admin/Users/form') ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
