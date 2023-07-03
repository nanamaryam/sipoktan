<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Karyawan
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
    <form action="<?= base_url('karyawan/simpan'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('karyawan'); ?>" type="button" class="btn btn-primary rounded-pill" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Kembali"><i class="bi bi-caret-left"></i></a>
                <a href="<?= base_url('karyawan/addkaryawan'); ?>" type="button" class="btn btn-primary rounded-pill ml-2" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Reset"><i class="bi bi-arrow-clockwise"></i></a>
            </div>
            <div class="card-body mt-4">
                <div class="row">
                    <div class="col-lg-6" id="">
                        <div class="form-group">
                            <label for="">Data Kebun</label>
                            <input type="hidden" id="idKebun" value="" name="id_kebun">
                            <div class="input-group">
                                <input type="text" class="form-control" name="" id="dataKebun" readonly>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKebun" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Pilih Data Kebun"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan">
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Gabung</label>
                            <input type="date" class="form-control" name="date_gabung">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected>--Status--</option>
                                <option value="Tetap">Tetap</option>
                                <option value="Probation">Probation</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Pendidikan Terakhir</label>
                            <select name="pen_terakhir" class="form-control">
                                <option value="" selected>--Pendidikan Terakhir--</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Strata">Strata</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pass Foto</label>
                            <input type="file" class="form-control" name="foto_karyawan">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary rounded-pill float-end">Simpan</button>
                </div>
            </div>
        </div>
    </form>
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