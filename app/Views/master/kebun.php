<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Kebun
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Kebun
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('luas') or $validation->hasError('tahun') or $validation->hasError('jenis_tanaman') or $validation->hasError('lokasi')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addKebun"><i class="bi bi-plus-lg"></i> Tambah Data Kebun</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Luas</th>
                            <th>Tahun Beli</th>
                            <th>Nama Pemilik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php $no = 1; ?>
                        <?php foreach ($dataKebun as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['lokasi'] ?></td>
                                <td><?= $value['luas'] ?> <?= $value['satuan'] ?></td>
                                <td><?= $value['tahun'] ?></td>
                                <td><?= $value['jenis_tanaman'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#updateKebun<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit"><i class="bi bi-pen"></i></button>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#deleteKebun<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<?= $this->include('master/modalKebun/modalAdd'); ?>
<?= $this->include('master/modalKebun/modalUpdate'); ?>
<?= $this->include('master/modalKebun/modalDelete'); ?>
<?= $this->endSection(); ?>