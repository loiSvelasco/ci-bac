<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('header') ?>Profile<?= $this->endSection() ?>


<?= $this->section('main') ?>

<a href="<?= site_url('Dashboard/editprofile') ?>" class="btn btn-info rounded-0 mb-4"><i class="fa fa-edit mr-2"></i>Edit</a>

<dl>
    <dt>Name</dt>
    <dd><?= esc($user->name) ?></dd>
    <dt>Email</dt>
    <dd><?= esc($user->email) ?></dd>
    <dt>Created At</dt>
    <dd><?= $user->created_at->humanize() ?></dd>
    <dt>Updated At</dt>
    <dd><?= $user->updated_at->humanize() ?></dd>
</dl>

<?= $this->endSection() ?>
