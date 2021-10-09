<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <?= form_open_multipart(base_url('ro-admin/index/update_ptg/' . $petugas->petugas_id));
            ?>
            <div class="row">
                <div class="col-md-3">
                    <label>Username</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username..." value="<?= $petugas->petugas_username; ?>" required>
                        <?= form_error('username', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Nama Petugas</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Petugas..." value="<?= $petugas->petugas_nama; ?>">
                        <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>No Telepon</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" name="telp" class="form-control" placeholder="No Telp..." value="<?= $petugas->petugas_telp; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Level</label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <select name="level" class="form-control">
                            <option value="Admin" <?php if ($petugas->petugas_level == "Admin") {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                            <option value="Petugas" <?php if ($petugas->petugas_level == "Petugas") {
                                                        echo "selected";
                                                    } ?>>Petugas</option>
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
                            Update Petugas</button>
                    </div>
                </div>
            </div>
            <?= form_close();
            ?>
        </div>
    </div>
</div>