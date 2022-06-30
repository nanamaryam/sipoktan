<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Absensi
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Detail Absensi
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    List Absensi
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="table-primary" style="text-align: center;">
                                <tr>
                                    <th>User</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php $no = 1; ?>
                                <?php foreach ($dataAbsensi as $value) : ?>
                                    <tr>
                                        <td><?= $value['username']; ?></td>
                                        <td><?= $value['date_time']; ?> | <?= $value['time_sign']; ?></td>
                                        <td><?= $value['keterangan']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>