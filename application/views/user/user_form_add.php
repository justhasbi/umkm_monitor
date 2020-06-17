
<section class="content-header">
    <h1>User <small>Add User</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add</li>
    </ol>
</section>
<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="box-body">
            <!-- form group -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php // echo validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                            <label for="fullname">Name *</label>
                            <input type="text" name="fullname" value="<?= set_value('fullname')?>" class="form-control">
                            <?= form_error('fullname')?>
                        </div>

                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="username">Username *</label>
                            <input type="text" name="username" value="<?= set_value('username')?>" class="form-control">
                            <?= form_error('username')?>
                        </div>

                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label for="password">Password *</label>
                            <input type="password" name="password" value="<?= set_value('password')?>" class="form-control">
                            <?= form_error('password')?>
                        </div>
                        
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label for="passconf">Password Confirmation *</label>
                            <input type="password" name="passconf" value="<?= set_value('passconf')?>" class="form-control">
                            <?= form_error('passconf')?>
                        </div>

                        <div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
                            <label for="address">Address *</label>
                            <textarea name="address" class="form-control"><?= set_value('address')?></textarea>
                            <?= form_error('address')?>
                        </div>

                        <div class="form-group <?= form_error('birthdate') ? 'has-error' : null ?>">
                            <label for="birthdate">Tanggal Lahir *</label>
                            <input type="date" name="birthdate" class="form-control"><?= set_value('birthdate')?>
                            <?= form_error('birthdate')?>
                        </div>

                        <div class="form-group <?= form_error('email') ? 'has-error' : null ?>">
                            <label for="birthdate">Email *</label>
                            <input type="email" name="email" class="form-control"><?= set_value('email')?>
                            <?= form_error('email')?>
                        </div>

                        <div class="form-group <?= form_error('hakakses') ? 'has-error' : null ?>">
                        <label for="hakakses">Hak Akses *</label>
                            <select name="hakakses" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="1" <?= set_value('hakakses') == 1 ? "selected" : "null"?>>Admin</option>
                            <option value="2" <?= set_value('hakakses') == 2 ? "selected" : "null"?>>Umkm</option>
                            </select>
                            <?= form_error('hakakses')?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="submit" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>