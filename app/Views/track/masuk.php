<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Masuk
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Masuk
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('id_aset') or $validation->hasError('jumlah_masuk')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('masuk/addmasuk'); ?>" type="button" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Data Masuk</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>Waktu</th>
                            <th>Aset</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
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
                        <?php foreach ($dataMasuk as $value) : ?>

                            <tr>
                                <td><?= $value['date_masuk']; ?></td>
                                <td><?= $value['nama_aset']; ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <td><?= $value['jumlah_masuk']; ?> <?= $value['satuan']; ?></td>
                                <td><?= Rupiah($value['harga_satuan']); ?></td>
                                <td><?= $value['ket']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMasuk<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->include('track/trackMasuk/modalDelete');; ?>
<?= $this->endSection(); ?>