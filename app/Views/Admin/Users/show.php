<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('header') ?>Users<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    .profile-image {
        position: relative;
        width: 200px;
        border-radius: 50%;
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
        bottom: 0%;
        left: 50%;
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

<div class="row">
  <div class="col-lg-4 col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <?php if($user->profile_image): ?>
              <div class="profile-image mx-auto">
                  <img src="<?= site_url("/Actions/ProfileImage/show"); ?>"
                       alt="Profile Image" 
                       class="image profile-user-img img-fluid img-circle" 
                       width="200" 
                       height="200">
                  <div class="top-right">
                      <a class="text-dark" href="" data-toggle="modal" data-target="#profileImg"><i class="fas fa-edit"></i></a>
                      <a class="text-dark" href="<?= site_url('Actions/ProfileImage/delete') ?>"><i class="fas fa-trash"></i></a>
                  </div>
              </div>
          <?php else: ?>
              <div class="profile-image mx-auto">
                  <img src="<?= site_url("/images/blank_profile.png"); ?>" 
                       alt="Profile Image" 
                       class="image profile-user-img img-fluid img-circle" 
                       width="200"
                       height="200">
                  <div class="top-right">
                      <a class="text-dark" href="" data-toggle="modal" data-target="#profileImg"><i class="fas fa-edit"></i></a>
                  </div>
              </div>
          <?php endif; ?>
        </div>
        <p class="h3 profile-username text-center mb-0"><?= esc($user->name) ?></p>
        <p class="text-muted text-center"><?= esc($user->email) ?></p>
      </div>
      <div class="card-footer border-0">
        <div class="float-right">
          <a href="<?= site_url("Admin/Users/edit/$user->id") ?>" class="text-primary"><i class="fa fa-edit mr-2"></i></a>
        </div>
        <span class="small text-muted text-center">Updated <?= $user->updated_at->humanize() ?></span>
      </div>
    </div>
  </div>
  <div class="col-8">

  </div>
</div>

<?= $this->endSection() ?>
