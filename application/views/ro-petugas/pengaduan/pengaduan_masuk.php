<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    </div>
    <?php
    if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    }
    echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
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
                        // function limit_words($string, $word_limit)
                        // {
                        //     $words = explode(" ", $string);
                        //     return implode(" ", array_splice($words, 0, $word_limit));
                        // }

                        $i = 1;
                        foreach ($pengaduan as $pgdn) { ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= $pgdn->masyarakat_nama; ?></td>
                                <td><?= $pgdn->pengaduan_judul; ?></td>
                                <td><?= substr($pgdn->pengaduan_isi, 0, 25); ?></td>
                                <td>
                                    <?php if ($pgdn->pengaduan_foto == null || $pgdn->pengaduan_foto == '') : ?>
                                        <img src="<?= base_url('assets/img/default-image.png') ?>" alt="" height="100" width="100">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/uploads/') . $pgdn->pengaduan_foto; ?>" alt="" height="100" width="100">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($pgdn->pengaduan_status == '0') : ?>
                                        <div class="badge badge-pill badge-warning">Menunggu</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#staticBackdrop<?= $pgdn->pengaduan_id; ?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Verifikasi</span>
                                    </button>
                                    <div class="my-2"></div>
                                    <a href="#" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
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

<!-- Modal Verifikasi-->
<?php foreach ($pengaduan as $pgdn) : ?>
    <div class="modal fade" id="staticBackdrop<?= $pgdn->pengaduan_id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($pgdn->pengaduan_foto == null || $pgdn->pengaduan_foto == '') : ?>
                                <img src="<?= base_url('assets/img/default-image.png') ?>" alt="" height="200" width="200">
                            <?php else : ?>
                                <img src="<?= base_url('assets/uploads/') . $pgdn->pengaduan_foto; ?>" alt="" height="200" width="200">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5 class="font-weight-bold">Judul :</h5>
                                </div>
                                <div class="col-md-7">
                                    <h5> <?= $pgdn->pengaduan_judul; ?></h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="font-weight-bold">Tanggal proses :</h5>
                                </div>
                                <div class="col-md-7">
                                    <h5> <?= date('d-m-Y', strtotime($pgdn->pengaduan_tgl)); ?></h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="font-weight-bold">Status :</h5>
                                </div>
                                <div class="col-md-7">
                                    <h5> <?= $pgdn->pengaduan_status == 0 ? 'Belum diverifikasi' : ''; ?></h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="font-weight-bold">Author :</h5>
                                </div>
                                <div class="col-md-7">
                                    <h5> <?= $pgdn->masyarakat_nama; ?></h5>
                                </div>
                            </div>
                            <h5 class="font-weight-bold mt-3">Isi Pengaduan</h5>
                            <p class="text-justify"><?= $pgdn->pengaduan_isi; ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="<?= base_url('ro-petugas/index/verifikasi') ?>" method="POST">
                        <input type="hidden" name="pengaduan_id" value="<?= $pgdn->pengaduan_id; ?>">
                        <!-- <input type="hidden" name="pengaduan_status" value="Proses"> -->
                        <button type="submit" class="btn btn-warning">Verifikasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Verifikasi -->