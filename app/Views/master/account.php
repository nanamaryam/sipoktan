<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Account
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Account
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            Account List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php foreach ($dataPengguna as $value) : ?>
                            <tr>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['name'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#updateRole<?= $value['id'] ?>" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit"><i class="bi bi-pen"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<?= $this->include('master/modalAccount/modalUpdate'); ?>
<?= $this->endSection(); ?>