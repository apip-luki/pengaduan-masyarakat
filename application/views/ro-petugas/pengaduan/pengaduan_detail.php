<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header">
            <?= $title;
            // var_dump($detail); 
            ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/uploads/') . $detail->pengaduan_foto; ?>" alt="" height="300" width="300">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="font-weight-bold">Judul</h5>
                            <h5 class="font-weight-bold">Tanggal Pengaduan</h5>
                            <h5 class="font-weight-bold">Status</h5>
                            <h5 class="font-weight-bold">Author</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>: <?= $detail->pengaduan_judul; ?></h5>
                            <h5>: <?= date('d-m-Y', strtotime($detail->pengaduan_tgl)); ?></h5>
                            <h5>: <?= $detail->pengaduan_status == 0 ? 'Belum diverifikasi' : ''; ?></h5>
                            <h5>: <?= $detail->masyarakat_nama; ?></h5>
                        </div>
                    </div>
                    <h5 class="font-weight-bold mt-3">Isi Pengaduan</h5>
                    <p class="text-justify"><?= $detail->pengaduan_isi; ?></p>
                </div>
                <!-- <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Simpan Petugas</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header">
            Masukan Tanggapan Anda
        </div>
        <div class="card-body">
            <?= form_open_multipart(base_url('ro-petugas/pengaduan/detail_pengaduan/' . $detail->pengaduan_id)); ?>
            <div class="row">
                <div class="col-md-3">
                    <label>Tanggapan <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <textarea class="form-control" name="tanggapan_isi" id="exampleFormControlTextarea1" rows="10" cols="55" required></textarea>
                        <?= form_error('tanggapan_isi', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Status Laporan<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <select name="pengaduan_status" class="form-control">
                            <option value="Proses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <!-- <input type="hidden" name="pengaduan_id" value="<?= $detail->pengaduan_id; ?>"> -->
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Simpan Petugas</button>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>