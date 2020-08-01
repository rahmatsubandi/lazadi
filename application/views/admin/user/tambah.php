<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form open
echo form_open(base_url('admin/user/tambah'), ' class="form-horizontal"');
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/user/') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="col-auto control-label">Nama Pengguna</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo set_value('nama') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Email</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="email" name="email" class="form-control" placeholder="Email Pengguna" value="<?php echo set_value('email') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Username</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Password</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Level Akses</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <select name="akses_level" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label"></label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <button class="btn btn-success" name="submit" type="submit">
                    <i class="fa fa-save"></i>
                </button>
                <button class="btn btn-danger" name="reset" type="reset">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>