<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Keluar
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Tambah Data Keluar
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <?php if ($validation->hasError('id_aset') or $validation->hasError('jumlah_keluar')) { ?>
        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> <?= $validation->listErrors() ?></div>
    <?php } ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <form action="<?= base_url('keluar/simpan'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#dataAset"><i class="bi bi-plus-lg"></i> Pilih Data Aset</button>
                <button type="submit" class="btn btn-primary rounded-pill float-end">Simpan</button>
                <a href="<?= base_url('keluar/addkeluar'); ?>" style="margin-right: 5px;" type="button" class="btn btn-primary rounded-pill mr-2 float-end" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Reset"><i class="bi bi-arrow-clockwise"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary" style="text-align: center;">
                            <tr>
                                <th>Aset</th>
                                <th>Kategori</th>
                                <th>Jumlah Keluar</th>
                                <th>Harga Satuan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody id="tableData" style="text-align: center;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</section>
<?= $this->include('track/trackKeluar/modalView'); ?>
<?php foreach ($dataAset as $value) : ?>
    <script>
        function tampilData<?= $value['id'] ?>() {
            var d = '#select<?= $value['id'] ?>';
            document.getElementById('tableData').insertRow(-1).innerHTML =
                `<tbody>
            <tr>
                <input type="hidden" value="` + $(d).data('id') + `" name="id_aset[]">
                <input type="hidden" value="` + $(d).data('jumlah') + `" name="jumlah[]">
                <input type="hidden" value="` + $(d).data('hargasatuan') + `" name="harga_satuan[]">
                <input type="hidden" value="` + $(d).data('aset') + `" name="berita_acara[]">
                <td>` + $(d).data('aset') + `</td>
                <td>` + $(d).data('kategori') + `</td>
                <td>
                    <div class="input-group">
                        <input type="number" class="form-control" name="jumlah_keluar[]" required>
                        <span class="input-group-text">` + $(d).data('satuan') + `</span>
                    </div
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text">IDR</span>
                        <input type="number" class="form-control" name="harga_keluar[]" value="` + $(d).data('hargasatuan') + `" readonly>
                    </div>
                </td>
                <td><input type="text" class="form-control" name="ket_keluar[]" required></td>
            </tr>
        </tbody>`;
            $(d).addClass('disabled')
        }
    </script>
<?php endforeach; ?>

<?= $this->endSection(); ?>