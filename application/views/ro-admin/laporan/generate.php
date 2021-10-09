<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <h4 class="font-weight-bold mb-3">Cari Data Laporan</h4>
            <hr>
            <form class="form-group" action="<?= site_url('ro-admin/pengaduan/generate_laporan'); ?>" method="POST">
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
                            <th width="5%">No</th>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>