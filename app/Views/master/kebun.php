<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | Kebun
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Kebun
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <?php if (in_groups('admin') == true) { ?>
            <a href="<?= base_url('kebun/print')?>" class="btn btn-primary rounded-pill" target="_blank">Print All</a>
            <?php } ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="table-primary" style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Comodity</th>
                            <th>Lahan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php $no = 1; ?>
                        <?php foreach ($dataComodity as $value) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['comodity'] ?></td>
                            <td><?= $value['jumlah'] ?></td>
                            <td>
                                <form action="<?= base_url('kebun/detail'); ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id_comodity" value="<?= $value['id']; ?>">
                                    <button type="submit" class="btn btn-info rounded-pill btn-sm" data-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Detail" target="_blank"><i
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

</section>
<?= $this->endSection(); ?>