<div class="modal fade text-left" id="modalKebun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialogmodal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Data Kebun</h5>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">
                    Selesai
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="table-primary" style="text-align: center;">
                                <tr>
                                    <th>Action</th>
                                    <th>Lokasi</th>
                                    <th>Luas</th>
                                    <th>Tahun Beli</th>
                                    <th>Jenis Tanaman</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php foreach ($dataKebun as $value) : ?>
                                <tr>
                                    <td><button type="button" class="btn btn-primary rounded-pill btn-sm"
                                            id="select<?= $value['id'] ?>" data-id="<?= $value['id']; ?>"
                                            data-lokasi="<?= $value['lokasi']; ?>" data-luas="<?= $value['luas']; ?>"
                                            data-satuan="<?= $value['satuan']; ?>"
                                            onclick="tampilData<?= $value['id'] ?>()" data-toggle="tooltip"
                                            data-bs-placement="top" data-bs-original-title="Tambah Data"><i
                                                class="bi bi-plus-lg"></button></td>
                                    <td><?= $value['lokasi'] ?></td>
                                    <td><?= $value['luas'] ?> <?= $value['satuan'] ?></td>
                                    <td><?= $value['tahun'] ?></td>
                                    <td><?= $value['jenis_tanaman'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>