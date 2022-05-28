<?= $this->extend('layouts/auth/auth_styles') ?>
<?= $this->section('title') ?>Register<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>BAC</b>Monitoring</a>
      <p>
        <small><?php echo $_ENV['DIVISION_OFFICE']; ?></small>
      </p>
    </div>
    <div class="card-body">
      <?= $this->include('layouts/auth/auth_messages') ?>
      <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger fade show" role="alert">
          <strong>Error:</strong>
            <?php foreach(session('errors') as $error): ?>
              <li><?= $error; ?></li>
            <?php endforeach ?>
        </div>
      <?php endif ?>
      <?= form_open('Register/create', 'class="mb-3"'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name" value="<?= old('name') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?= old('email') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <a href="<?= site_url('Login') ?>" class="text-center mt-4">I already have an account</a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>