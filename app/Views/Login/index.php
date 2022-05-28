<?= $this->extend('layouts/auth/auth_styles') ?>
<?= $this->section('title') ?>Login<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url('/') ?>" class="h1"><b>BAC</b>Monitoring</a>
      <p>
        <small><?php echo $_ENV['DIVISION_OFFICE']; ?></small>
      </p>
    </div>
    <div class="card-body">
      <?= $this->include('layouts/auth/auth_messages') ?>
      <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error:</strong>
            <?php foreach(session('errors') as $error): ?>
              <li><?= $error; ?></li>
            <?php endforeach ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
      <?= form_open('/Login/create', 'class="mb-3"') ?>
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember_me">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?= site_url('Forgot') ?>">Forgot password?</a>
      </p>
      <p class="mb-0">
        <a href="<?= site_url('Register') ?>" class="text-center">Register an account</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>