<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Panen
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Panen Detail
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            List Panen
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>Waktu</th>
                            <th>User</th>
                            <th>Satuan</th>
                            <th>Berat</th>
                            <th>Total</th>
                            <th>Keterangan </th>
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
                                <td><?= $value['username']; ?></td>
                                <td><?= Rupiah($value['harga_perkilo']) ?></td>
                                <td><?= $value['berat'] ?> <?= $value['satuan'] ?></td>
                                <td><?= Rupiah($value['pendapatan']) ?></td>
                                <td><?= $value['ket_panen'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>