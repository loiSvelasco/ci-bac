<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('header') ?>Users
<a href="<?= site_url('Admin/Users/new') ?>" class="btn btn-info rounded-0"><i class="fas fa-user-plus mr-2"></i>Add User</a>
<?= $this->endSection() ?>


<?= $this->section('css') ?>
    <?= $this->include('layouts/datatables/css/datatables') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <table id="users" class="table table-striped table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Administrator</th>
                        <th>Active</th>
                        <th>Sign-up Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users): ?>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= esc($user->name) ?></td>
                            <td><?= esc($user->email) ?></td>
                            <td><?= $user->is_admin ? 'Yes' : 'No' ?></td>
                            <td><?= $user->is_active ? 'Yes' : 'No' ?></td>
                            <td><?= $user->created_at->humanize() ?></td>
                            <td>
                                <a href="<?= site_url("Admin/Users/show/$user->id") ?>"><i class="fas fa-eye mr-2"></i></a>
                                <a href="<?= site_url("Admin/Users/edit/$user->id") ?>"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <?php else: ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>

<!-- JS REQUIRED FOR THIS PAGE -->

<?= $this->section('js') ?>
    <?= $this->include('layouts/datatables/js/datatables') ?>
<?= $this->endSection() ?>