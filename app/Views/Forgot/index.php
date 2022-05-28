<?= $this->extend('layouts/auth/auth_styles') ?>
<?= $this->section('title') ?>Login<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>BAC</b>Monitoring</a>
        <p>
        <small><?php echo $_ENV['DIVISION_OFFICE']; ?></small>
        </p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="<?= site_url('Login') ?>">Login</a>
      </p>
    </div>
  </div>
</div>
<?= $this->endSection() ?>