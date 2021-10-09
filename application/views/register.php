<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
</head>

<body style="background-image: url('<?= base_url(); ?>assets/img/background-login.png'); background-size:cover;">
    <div class="login-dark">
        <form method="post" action="<?= site_url('login/register'); ?>">
            <h2 class="text-center">Registrasi Akun</h2>
            <?= $this->session->flashdata('msg'); ?>
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="masyarakat_nik" placeholder="Masukan NIK" value="<?= set_value('masyarakat_nik'); ?>">
                <?= form_error('masyarakat_nik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="masyarakat_nama" placeholder="Masukan Nama" value="<?= set_value('masyarakat_nama'); ?>">
                <?= form_error('masyarakat_nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="masyarakat_username" placeholder="Masukan Username" value="<?= set_value('masyarakat_username'); ?>">
                <?= form_error('masyarakat_username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="masyarakat_password" placeholder="Masukan Password Min 5 Karakter">
                <?= form_error('masyarakat_password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="masyarakat_telp" placeholder="No Telp Tidak Wajib Diisi" value="<?= set_value('masyarakat_telp'); ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
    <script src="<?= base_url() ?>assets/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>