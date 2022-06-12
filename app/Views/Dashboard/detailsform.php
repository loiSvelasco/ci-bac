                    <div class="form-group">
                        <label for="Name">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?= old('address', esc($userDetails->address)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input type="text" name="phone" id="address" class="form-control" value="<?= old('phone', esc($userDetails->phone)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Birthday</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?= old('date_of_birth', esc($userDetails->date_of_birth)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" name="website" id="website" class="form-control" value="<?= old('website', esc($userDetails->website)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?= old('facebook', esc($userDetails->facebook)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" value="<?= old('twitter', esc($userDetails->twitter)) ?>">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" value="<?= old('instagram', esc($userDetails->instagram)) ?>">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6"><a href="<?= site_url('Dashboard/profile') ?>" class="btn btn-light btn-block rounded-0"><i class="fas fa-arrow-left mr-2"></i>Back</a></div>
                            <div class="col-6"><button class="btn btn-primary btn-block rounded-0"><i class="fas fa-save mr-2"></i>Save</button></div>
                        </div>
                    </div>