                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= old('name', esc($user->name)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="Email" class="form-control" value="<?= old('email', esc($user->email)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <small class="form-text text-muted">Leave blank to keep current password.</small>
                    </div>
                    <div class="form-group">
                        <label for="password_conf">Repeat Password</label>
                        <input type="password" name="password_confirmation" id="password_conf" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6"><a href="<?= site_url('Dashboard/profile') ?>" class="btn btn-light btn-block rounded-0"><i class="fas fa-arrow-left mr-2"></i>Back</a></div>
                            <div class="col-6"><button class="btn btn-primary btn-block rounded-0"><i class="fas fa-save mr-2"></i>Save</button></div>
                        </div>
                    </div>