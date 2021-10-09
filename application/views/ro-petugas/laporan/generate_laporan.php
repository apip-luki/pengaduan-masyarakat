<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <h4 class="font-weight-bold mb-3">Cari Data Laporan</h4>
            <hr>
            <form class="form-group" action="<?= site_url('ro-petugas/index/generate_laporan'); ?>" method="POST">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="startdate">Dari Tanggal</label>
                        <input type="date" name="tgl_awal" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="enddate">Sampai Tanggal</label>
                        <input type="date" name="tgl_akhir" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-4">
                        <div class="mt-4"></div>
                        <button type="submit" class="btn btn-primary mt-2">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header">
            Hasil Pencarian Laporan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Tgl Pengaduan</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Isi Pengaduan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th width="auto">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($laporan as $pgdn) { ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= date('d-m-Y', strtotime($pgdn->pengaduan_tgl)); ?></td>
                                <td><?= $pgdn->masyarakat_nama; ?></td>
                                <td><?= $pgdn->pengaduan_judul; ?></td>
                                <td><?= substr($pgdn->pengaduan_isi, 0, 25); ?>...</td>
                                <td>
                                    <?php if ($pgdn->pengaduan_foto == null || $pgdn->pengaduan_foto == '') : ?>
                                        <img src="<?= base_url('assets/img/default-image.png') ?>" alt="" height="100" width="100">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/uploads/') . $pgdn->pengaduan_foto; ?>" alt="" height="100" width="100">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($pgdn->pengaduan_status == 'Selesai') : ?>
                                        <div class="badge badge-pill badge-warning">Menunggu</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#staticBackdrop<?= $pgdn->pengaduan_id; ?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>