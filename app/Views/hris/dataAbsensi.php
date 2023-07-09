<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Absensi
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Absensi
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
                                    <th>Email</th>
                                    <th>Absensi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php foreach ($dataAbsensi as $value) : ?>
                                <tr>
                                    <td><?= $value['username']; ?></td>
                                    <td><?= $value['email']; ?></td>
                                    <td><?= $value['login_count']; ?></td>
                                    <td>
                                        <form action="<?= base_url('dataabsensi/detail'); ?>" method="POST">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="user_id" value="<?= $value['user_login']; ?>">
                                            <button type="submit" class="btn btn-info rounded-pill btn-sm"
                                                data-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Detail" target="_blank"><i
                                                    class="bi bi-info"></i></button>
                                        </form>
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
<?= $this->endSection(); ?>