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
                    <div class="form-group form-check">
                        <div class="row">
                            <div class="col-3">
                                <label for="is_active">
                                    <?php if(current_user()->id == $user->id): ?>
                                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" checked disabled> Active
                                    <?php else: ?>
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" class="form-check-input" name="is_active" value="1" id="is_active" <?= old('is_active',$user->is_active) ? 'checked' : '' ?>> Active
                                    <?php endif ?>
                                </label>
                            </div>
                            <div class="col-3">
                                <label for="is_admin">
                                    <?php if(current_user()->id == $user->id): ?>
                                        <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" checked disabled> Administrator
                                    <?php else: ?>
                                        <input type="hidden" name="is_admin" value="0">
                                        <input type="checkbox" class="form-check-input" name="is_admin" value="1" id="is_admin" <?= old('is_admin',$user->is_admin) ? 'checked' : '' ?>> Administrator
                                    <?php endif ?>
                                </label>
                            </div>
                            <div class="col-3">
                                <?php if(current_user()->id == $user->id OR uri_string() == 'Admin/Users/new'): ?>
                                <?php else: ?>
                                    <a onclick="return confirm('Confirmation \n\n\n\n Are you sure you want to delete this user?')" href="<?= site_url("Admin/Users/delete/$user->id") ?>" class="btn btn-danger btn-block rounded-0"><i class="fas fa-trash mr-2"></i>Delete</a>
                                <?php endif ?>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-block rounded-0"><i class="fas fa-save mr-2"></i>Save</button>
                            </div>
                        </div>
                    </div>