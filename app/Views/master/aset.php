<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Aset
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Aset
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('nama_aset') or $validation->hasError('id_kategori') or $validation->hasError('jumlah') or $validation->hasError('id_satuan') or $validation->hasError('harga_satuan')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addAset"><i class="bi bi-plus-lg"></i> Tambah Data Aset</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Aset</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">

                        <?php
                        $no = 1;
                        function Rupiah($angka)
                        {
                            $hasil = "Rp " . number_format($angka, 2, ',', '.');
                            return $hasil;
                        }
                        ?>
                        <?php foreach ($dataAset as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_aset'] ?></td>
                                <td><?= $value['nama_kategori'] ?></td>
                                <td><?= $value['jumlah'] ?> <?= $value['satuan']; ?></td>
                                <td><?= Rupiah($value['harga_satuan']) ?></td>
                                <td><?= Rupiah($value['harga_satuan'] * $value['jumlah']); ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#updateAset<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit"><i class="bi bi-pen"></i></button>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAset<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<?= $this->include('master/modalAset/modalAdd'); ?>
<?= $this->include('master/modalAset/modalUpdate'); ?>
<?= $this->include('master/modalAset/modalDelete'); ?>
<?= $this->endSection(); ?>