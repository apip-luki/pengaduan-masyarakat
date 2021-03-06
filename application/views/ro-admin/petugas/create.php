<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header">
            Tambah Petugas Baru
        </div>
        <div class="card-body">
            <?= form_open_multipart(base_url('ro-admin/index/create_ptg')); ?>
            <div class="row">
                <div class="col-md-3">
                    <label>Username <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username..." value="<?= set_value('username') ?>">
                        <?= form_error('username', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Nama Petugas <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Petugas..." value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>No Telepon<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="number" name="telp" class="form-control" placeholder="No Telp..." value="<?= set_value('telp') ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Level <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <select name="level" class="form-control">
                            <option></option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                        <?= form_error('level', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Password <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password...">
                        <?= form_error('password', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Simpan Petugas</button>
                    </div>
                </div>

            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>