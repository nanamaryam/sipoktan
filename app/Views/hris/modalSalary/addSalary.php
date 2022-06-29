<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Salary
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Tambah Data Salary
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('id_karyawan') or $validation->hasError('price_salary') or $validation->hasError('status')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <form action="<?= base_url('salary/simpan'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('salary'); ?>" type="button" class="btn btn-primary rounded-pill" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Kembali"><i class="bi bi-caret-left"></i></a>
                <a href="<?= base_url('salary/addsalary'); ?>" type="button" class="btn btn-primary rounded-pill ml-2" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Reset"><i class="bi bi-arrow-clockwise"></i></a>
            </div>
            <div class="card-body mt-4">
                <div class="row">
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <div class="row m-lg-5">
                                <div class="col-md-4">
                                    <label>Data Karyawan</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="input-group">
                                        <input type="hidden" name="id_karyawan" id="idKaryawan">
                                        <input type="text" class="form-control" name="" id="dataKaryawan" readonly>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKaryawan" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Pilih Data Karyawan"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Salary</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" class="form-control" name="price_salary">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</section>
<?= $this->include('hris/modalSalary/modalView'); ?>
<?php foreach ($dataKaryawan as $value) : ?>
    <script>
        function tampilData<?= $value['id'] ?>() {
            var d = '#select<?= $value['id'] ?>';
            var idKaryawan = $(d).data('id');
            var namaKryawan = $(d).data('nama');

            $('#idKaryawan').val(idKaryawan);
            $('#dataKaryawan').val(namaKryawan);
        }
    </script>
<?php endforeach; ?>

<?= $this->endSection(); ?>