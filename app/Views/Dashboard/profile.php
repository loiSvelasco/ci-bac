<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('header') ?>Profile<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    .profile-image {
        position: relative;
        width: 200px;
        height: 200px;
    }

    .image {
        opacity: 1;
        display: block;
        width: 200px;
        height: 200px;
        transition: .1s ease;
        backface-visibility: hidden;
    }

    .top-right {
        transition: .1s ease;
        opacity: 0;
        position: absolute;
        top: 10%;
        right: 1%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .profile-image:hover .image {
        opacity: 0.4;
    }

    .profile-image:hover .top-right {
        opacity: 1;
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<a href="<?= site_url('Dashboard/editprofile') ?>" class="btn btn-info rounded-0 mb-4"><i class="fa fa-edit mr-2"></i>Edit</a>

<br>

<?php if($user->profile_image): ?>
    <div class="profile-image">
        <img src="<?= site_url("/Actions/ProfileImage/show"); ?>" alt="Profile Image" class="image" width="200" height="200">
        <div class="top-right">
            <a class="text-dark" href="" data-toggle="modal" data-target="#profileImg"><i class="fas fa-edit"></i></a>
            <a class="text-dark" href="<?= site_url('Actions/ProfileImage/delete') ?>"><i class="fas fa-trash"></i></a>
        </div>
    </div>
<?php else: ?>
    <div class="profile-image">
        <img src="<?= site_url("/images/blank_profile.png"); ?>" alt="Profile Image" class="image" width="200" height="200">
        <div class="top-right">
            <a class="text-dark" href="" data-toggle="modal" data-target="#profileImg"><i class="fas fa-edit"></i></a>
        </div>
    </div>
<?php endif; ?>

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

<?= $this->section('modals') ?>
<div class="modal fade" data-backdrop="static" id="profileImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-0">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('Actions/ProfileImage/update', 'id="profileimg"') ?>
            <input class="file-input" type="file" name="image">
        </form>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button type="submit" form="profileimg" class="btn btn-success rounded-0">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
