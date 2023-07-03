<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Panen
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Panen
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addPanen"><i class="bi bi-plus-lg"></i> Tambah Data Panen</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>Waktu</th>
                            <th>Satuan</th>
                            <th>Berat</th>
                            <th>Total</th>
                            <th>Keterangan </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        function Rupiah($angka)
                        {
                            $hasil = "Rp " . number_format($angka, 2, ',', '.');
                            return $hasil;
                        }
                        foreach ($dataPanen as $value) :
                        ?>
                            <tr>
                                <td><?= $value['time_today']; ?></td>
                                <td><?= Rupiah($value['harga_perkilo']) ?></td>
                                <td><?= $value['berat'] ?> <?= $value['satuan'] ?></td>
                                <td><?= Rupiah($value['pendapatan']) ?></td>
                                <td><?= $value['ket_panen'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#updatePanen<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit"><i class="bi bi-pen"></i></button>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#deletePanen<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->include('hris/modalPanen/modalAdd'); ?>
<?= $this->include('hris/modalPanen/modalDelete'); ?>
<?= $this->include('hris/modalPanen/modalUpdate'); ?>
<?= $this->endSection(); ?>