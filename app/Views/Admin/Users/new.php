<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Add User<?= $this->endSection() ?>
<?= $this->section('header') ?>Create a user<?= $this->endSection() ?>


<?= $this->section('main') ?>

<div class="row">
    <div class="col-6">
        <div class="card rounded-0">
            <div class="card-body">
                <?= form_open("Admin/Users/create")?>
                    <?= $this->include('Admin/Users/form') ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
