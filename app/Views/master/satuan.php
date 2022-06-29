<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Satuan
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Satuan
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('satuan')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addSatuan"><i class="bi bi-plus-lg"></i> Tambah Satuan</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="table-primary" style="text-align: center;">
                                <tr>
                                    <th>Satuan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php foreach ($dataSatuan as $value) : ?>
                                    <tr>
                                        <td><?= $value['satuan'] ?></td>
                                        <td><?= $value['status'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#updateSatuan<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit"><i class="bi bi-pen"></i></button>
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#deleteSatuan<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Status Count</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon/checked.png') ?>">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Active</h5>
                            <h6 class="text-muted mb-0"><?= $getActive ?></h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3 mt-3">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon/cancel.png') ?>">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Inactive</h5>
                            <h6 class="text-muted mb-0"><?= $getInactive ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->include('master/modalSatuan/modalAdd'); ?>
<?= $this->include('master/modalSatuan/modalUpdate'); ?>
<?= $this->include('master/modalSatuan/modalDelete'); ?>
<?= $this->endSection(); ?>