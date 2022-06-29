<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Karyawan
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Tambah Data Karyawan
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('foto_karyawan') or $validation->hasError('id_kebun')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <?php foreach ($dataKaryawan as $value) : ?>
        <form action="<?= base_url('karyawan/edit/' . $value['id']); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('karyawan'); ?>" type="button" class="btn btn-primary rounded-pill" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Kembali"><i class="bi bi-caret-left"></i></a>
                    <a href="<?= base_url('karyawan/editkaryawan/' . $value['id']); ?>" type="button" class="btn btn-primary rounded-pill ml-2" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Reset"><i class="bi bi-arrow-clockwise"></i></a>
                </div>
                <div class="card-body mt-4">
                    <div class="row">
                        <div class="col-lg-6" id="">
                            <div class="form-group">
                                <label for="">Data Kebun</label>
                                <input type="hidden" id="idKebun" value="<?= $value['id_kebun']; ?>" name="id_kebun">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="" id="dataKebun" value="<?= $value['lokasi']; ?> <?= $value['luas']; ?> <?= $value['satuan']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKebun" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Pilih Data Kebun"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama_karyawan" value="<?= $value['nama_karyawan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Gabung</label>
                                <input type="date" class="form-control" name="date_gabung" value="<?= $value['date_gabung']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <?php
                                    $a = '';
                                    $b = '';
                                    if ($value['status'] == 'Tetap') {
                                        $a = 'selected';
                                    } elseif ($value['status'] == 'Probation') {
                                        $b = 'selected';
                                    }
                                    ?>
                                    <option value="Tetap" <?= $a; ?>>Tetap</option>
                                    <option value="Probation" <?= $b; ?>>Probation</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pendidikan Terakhir</label>
                                <select name="pen_terakhir" class="form-control">
                                    <?php
                                    $a = '';
                                    $b = '';
                                    $c = '';
                                    $d = '';
                                    $e = '';
                                    if ($value['pen_terakhir'] == 'SD') {
                                        $a = 'selected';
                                    } elseif ($value['pen_terakhir'] == 'SMP') {
                                        $b = 'selected';
                                    } elseif ($value['pen_terakhir'] == 'SMA') {
                                        $c = 'selected';
                                    } elseif ($value['pen_terakhir'] == 'Strata') {
                                        $d = 'selected';
                                    } elseif ($value['pen_terakhir'] == 'Lainnya') {
                                        $e = 'selected';
                                    }
                                    ?>
                                    <option value="SD" <?= $a; ?>>SD</option>
                                    <option value="SMP" <?= $b; ?>>SMP</option>
                                    <option value="SMA" <?= $c; ?>>SMA</option>
                                    <option value="Strata" <?= $d; ?>>Strata</option>
                                    <option value="Lainnya" <?= $e; ?>>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $value['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pass Foto</label>
                                <input type="file" class="form-control" name="foto_karyawan" value="assets/images/karyawan/<?= $value['foto_karyawan']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <div alt="<?= $value['foto_karyawan']; ?>" style="width: 100px;border-radius:50%; height:100px; background:url('<?= base_url('assets/images/karyawan/' . $value['foto_karyawan']); ?>') center center; background-size: 102px;background-repeat: no-repeat;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning rounded-pill float-end">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</section>
<?= $this->include('hris/modalKaryawan/modalView'); ?>
<?php foreach ($dataKebun as $value) : ?>
    <script>
        function tampilData<?= $value['id'] ?>() {
            var d = '#select<?= $value['id'] ?>';
            var idKebun = $(d).data('id');
            var lokasiLuas = $(d).data('lokasi') + ' ' + $(d).data('luas') + ' ' + $(d).data('satuan');
            var satuan = $(d).data('satuan');

            $('#idKebun').val(idKebun);
            $('#dataKebun').val(lokasiLuas);
        }
    </script>
<?php endforeach; ?>

<?= $this->endSection(); ?>