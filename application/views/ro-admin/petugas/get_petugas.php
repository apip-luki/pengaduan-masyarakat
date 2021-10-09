<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('ro-admin/index/create_ptg'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Tambah Petugas</span>
        </a>
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
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>No Telp</th>
                            <th>Level</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($petugas as $ptg) { ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= $ptg->petugas_nama; ?></td>
                                <td><?= $ptg->petugas_username; ?></td>
                                <td><?= $ptg->petugas_telp; ?></td>
                                <td><?= $ptg->petugas_level; ?></td>
                                <td>
                                    <a href="<?= base_url('ro-admin/index/update_ptg/' . $ptg->petugas_id); ?> " class="btn btn-success btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                                    <?php
                                    if ($ptg->petugas_id != 1) {

                                        include "delete.php";
                                    } ?>
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