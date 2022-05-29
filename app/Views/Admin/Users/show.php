<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('header') ?>Users<?= $this->endSection() ?>


<?= $this->section('main') ?>


<dl>
    <dt>Name</dt>
    <dd><?= esc($user->name) ?></dd>
    <dt>Email</dt>
    <dd><?= esc($user->email) ?></dd>
    <dt>Admin</dt>
    <dd><?= $user->is_admin ? 'Yes' : 'No' ?></dd>
    <dt>Active</dt>
    <dd><?= $user->is_active ? 'Yes' : 'No' ?></dd>
    <dt>Created At</dt>
    <dd><?= $user->created_at->humanize() ?></dd>
    <dt>Updated At At</dt>
    <dd><?= $user->updated_at->humanize() ?></dd>
</dl>

<?= $this->endSection() ?>
