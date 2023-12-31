<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Rekap Panen
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Rekap Panen
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-info rounded-pill btn-sm " data-bs-toggle="modal"
                data-bs-target="#printLaba" data-toggle="tooltip" data-bs-placement="top"
                data-bs-original-title="Print Data Laba"><i class="bi bi-printer"></i></button>
            <button type="button" style="margin-right:5px;" class="btn btn-success rounded-pill btn-sm "
                data-bs-toggle="modal" data-bs-target="#excelExport" data-toggle="tooltip" data-bs-placement="top"
                data-bs-original-title="Export Excel"><i class="bi bi-file-earmark-excel-fill"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>Waktu</th>
                            <th>Berita Acara</th>
                            <th>Berat</th>
                            <th>Panen</th>
                            <th>
                                Details
                            </th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        function Rupiah($angka)
                        {
                            $hasil = "Rp " . number_format($angka, 2, ',', '.');
                            return $hasil;
                        }
                        foreach ($dataLaba as $value) :
                        ?>
                        <tr>
                            <td><?= $value['laba_count'] ?></td>
                            <td><?= $value['acara_berita'] ?></td>
                            <td><?= $value['total_berat'] ?> Kg</td>
                            <td><?= $value['laba_count'] ?> panen</td>
                            <td>
                                <form action="<?= base_url('laba/detail'); ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="acara_berita" value="<?= $value['acara_berita']; ?>">
                                    <button type="submit" class="btn btn-info rounded-pill btn-sm" data-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Detail" target="_blank"><i
                                            class="bi bi-info"></i></button>
                                </form>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<?= $this->include('finance/labaFolder/modalPrint'); ?>
<?= $this->include('finance/labaFolder/excelExport'); ?>
<?= $this->endSection(); ?>