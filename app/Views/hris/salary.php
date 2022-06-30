<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Salary
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Salary
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('id_karyawan') or $validation->hasError('price_salary') or $validation->hasError('status')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('salary/addsalary'); ?>" type="button" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Data Salary</a>
                    <a href="<?= base_url('salary/print'); ?>" type="button" class="btn btn-info rounded-pill btn-sm float-end" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print All" target="_blank"><i class="bi bi-printer"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="table-primary" style="text-align: center;">
                                <tr>
                                    <th>Gabung</th>
                                    <th>Nama</th>
                                    <th>Salary</th>
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
                                foreach ($dataSalary as $value) :
                                ?>
                                    <tr>
                                        <td><?= $value['date_gabung']; ?></td>
                                        <td><?= $value['nama_karyawan']; ?></td>
                                        <td><?= Rupiah($value['price_salary']); ?></td>
                                        <td>
                                            <a href="<?= base_url('salary/editsalary/' . $value['id']); ?>" type="button" class="btn btn-warning rounded-pill btn-sm" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit"><i class="bi bi-pen"></i></a>
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#deleteKaryawan<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                        </td>
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
<?= $this->include('hris/modalSalary/modalDelete'); ?>
<?= $this->endSection(); ?>