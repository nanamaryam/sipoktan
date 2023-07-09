<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Karyawan
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Karyawan
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('foto_karyawan') or $validation->hasError('nama_karyawan') or $validation->hasError('id_kebun')) { ?>
    <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i>
        <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
        <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <form action="<?= base_url('karyawan/exportexcel'); ?>" method="POST">
                        <a href="<?= base_url('karyawan/addkaryawan'); ?>" type="button"
                            class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Data Karyawan</a>
                        <a href="<?= base_url('karyawan/print'); ?>" type="button"
                            class="btn btn-info rounded-pill btn-sm float-end" data-toggle="tooltip"
                            data-bs-placement="top" data-bs-original-title="Print All" target="_blank"><i
                                class="bi bi-printer"></i></a>

                        <button type="submit" style="margin-right:5px;"
                            class="btn btn-success rounded-pill btn-sm float-end" data-toggle="tooltip"
                            data-bs-placement="top" data-bs-original-title="Export Excel"><i
                                class="bi bi-file-earmark-excel-fill"></i></button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="table-primary" style="text-align: center;">
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataKaryawan as $value) : ?>
                                <tr>
                                    <td>
                                        <center>
                                            <div alt="<?= $value['foto_karyawan']; ?>"
                                                style="width: 100px;border-radius:50%; height:100px; background:url('<?= base_url('assets/images/karyawan/' . $value['foto_karyawan']); ?>') center center; background-size: 102px;background-repeat: no-repeat;">
                                            </div>
                                        </center>
                                    </td>
                                    <td style="text-align: left;">
                                        <h3><?= $value['nama_karyawan']; ?></h3>
                                        <p><?= $value['alamat']; ?></p>
                                        <p><span class="badge bg-light-warning"><?= $value['date_gabung']; ?></span> |
                                            <span class="badge bg-light-success"><?= $value['status']; ?></span> | <span
                                                class="badge bg-light-info"><?= $value['pen_terakhir']; ?></span> |
                                            <span class="badge bg-light-primary"><?= $value['lokasi']; ?></span> | <span
                                                class="badge bg-light-secondary"><?= $value['luas']; ?>

                                        </p>
                                        <div>
                                            <a href="<?= base_url('karyawan/editkaryawan/' . $value['id']); ?>"
                                                type="button" class="btn btn-warning rounded-pill btn-sm"
                                                data-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Edit"><i class="bi bi-pen"></i></a>
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteKaryawan<?= $value['id'] ?>"
                                                data-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi</h4>
                </div>
                <div class="card-body">
                    <div>
                        <span class="badge bg-light-warning">Tanggal Gabung</span>
                        <span class="badge bg-light-success">Status Karyawan</span>
                        <span class="badge bg-light-danger">Status Probation</span>
                        <span class="badge bg-light-info">Posisi Tugas</span>
                        <span class="badge bg-light-secondary">Luas Posisi Tugas</span>
                    </div>
                    <div>
                        <h6 style="font-size: 1.2rem;font-weight: 700;" class="mt-5 mb-3">Jumlah Karyawan</h6>
                        <span class="badge bg-info"><?= $countKaryawan; ?> Orang</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->include('hris/modalKaryawan/modalDelete'); ?>
<?= $this->endSection(); ?>