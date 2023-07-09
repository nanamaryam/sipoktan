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
            <a href="<?= base_url('laba'); ?>" class="btn btn-primary rounded-pill"><i
                    class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>Waktu</th>
                            <th>Berita Acara</th>
                            <th>Panen</th>
                            <th>Berat</th>
                            <th>
                                Nominal
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
                            <td><?= $value['laba_time'] ?></td>
                            <td><?= $value['acara_berita'] ?></td>
                            <td>
                                <?=$value['ket_panen']?>
                            </td>
                            <td>
                                <?=$value['berat_kg']?> Kg
                            </td>
                            <td>
                                <?= Rupiah($value['nominal'])?>
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