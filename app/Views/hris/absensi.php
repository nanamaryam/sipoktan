<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Absensi
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Absensi
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php

    use Kint\Zval\Value;

    if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Absensi
                </div>
                <div class="card-body mt-3">
                    <div class="row" style="text-align: center;">
                        <div class="col-lg-6 mb-5">
                            <p><i class="bi bi-calendar-week"></i> <?= date('d-m-y'); ?></p>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <p><i class="bi bi-smartwatch"></i> <?= date('g:i a'); ?></p>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <span class="badge bg-light-success">Sign in</span>


                            <?php if ($dataCountAbsensi !== 0) { ?>
                                <?php $a = 'disabled';
                                foreach ($dataViewToday as $value) : ?>
                                    <p><?= $value['date_time']; ?> | <?= $value['time_sign']; ?></p>
                                <?php endforeach; ?>
                            <?php } elseif ($dataCountAbsensi == 0) {
                                $a = '';
                            ?>
                                <p>--|--</p>
                            <?php } ?>
                        </div>
                        <div class="col-lg-12 mb-3 ">
                            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#masukAbsen" <?= $a; ?>>Buat Absen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    List Absensi
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="table-primary" style="text-align: center;">
                                <tr>
                                    <th>Sign in</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php $no = 1; ?>
                                <?php foreach ($dataAbsensi as $value) : ?>
                                    <tr>
                                        <td><span class="badge bg-light-success"><?= $value['date_time']; ?> | <?= $value['time_sign']; ?></span></td>
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
<?= $this->include('hris/modalAbsensi/modalMasuk'); ?>
<?= $this->endSection(); ?>