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
                        foreach ($proses as $prs) { ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= $prs->masyarakat_nama; ?></td>
                                <td><?= $prs->pengaduan_judul; ?></td>
                                <td><?= substr($prs->pengaduan_isi, 0, 25); ?></td>
                                <td>
                                    <?php if ($prs->pengaduan_foto == null || $prs->pengaduan_foto == '') : ?>
                                        <img src="<?= base_url('assets/img/default-image.png') ?>" alt="" height="100" width="100">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/uploads/') . $prs->pengaduan_foto; ?>" alt="" height="100" width="100">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($prs->pengaduan_status == 'Proses') : ?>
                                        <div class="badge badge-pill badge-info">Proses</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#staticBackdrop<?= $prs->pengaduan_id; ?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Validasi</span>
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

<!-- Modal Verifikasi-->
<?php foreach ($proses as $prs) : ?>
    <div class="modal fade" id="staticBackdrop<?= $prs->pengaduan_id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail proses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('ro-petugas/index/tanggapan') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <?php if ($prs->pengaduan_foto == null || $prs->pengaduan_foto == '') : ?>
                                    <img src="<?= base_url('assets/img/default-image.png') ?>" alt="" height="200" width="200">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/uploads/') . $prs->pengaduan_foto; ?>" alt="" height="200" width="200">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5 class="font-weight-bold">Judul :</h5>
                                    </div>
                                    <div class="col-md-7">
                                        <h5> <?= $prs->pengaduan_judul; ?></h5>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="font-weight-bold">Tanggal proses :</h5>
                                    </div>
                                    <div class="col-md-7">
                                        <h5> <?= date('d-m-Y', strtotime($prs->pengaduan_tgl)); ?></h5>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="font-weight-bold">Status :</h5>
                                    </div>
                                    <div class="col-md-7">
                                        <h5> <?= $prs->pengaduan_status == 0 ? 'Belum diverifikasi' : ''; ?></h5>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="font-weight-bold">Author :</h5>
                                    </div>
                                    <div class="col-md-7">
                                        <h5> <?= $prs->masyarakat_nama; ?></h5>
                                    </div>
                                </div>
                                <h5 class="font-weight-bold mt-3">Isi Pengaduan</h5>
                                <p class="text-justify"><?= $prs->pengaduan_isi; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <input type="hidden" name="pengaduan_id" value="<?= $prs->pengaduan_id; ?>">
                            <div class="col-md-4">
                                <label class="font-weight-bold">Tanggapan <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="tanggapan_isi" rows="10" cols="55" required></textarea>
                                    <?= form_error('tanggapan_isi', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Verifikasi -->