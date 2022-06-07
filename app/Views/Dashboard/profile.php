<?= $this->extend('layouts/dashboard/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('header') ?>Profile<?= $this->endSection() ?>

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
          <a href="<?= site_url('Dashboard/editprofile') ?>" class="text-primary"><i class="fa fa-edit mr-2"></i></a>
        </div>
        <span class="small text-muted text-center">Updated <?= $user->updated_at->humanize() ?></span>
      </div>
    </div>
  </div>
  <div class="col-8">

  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('modals') ?>
<div class="modal fade" data-backdrop="static" id="profileImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-0">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile Image</h5>
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
