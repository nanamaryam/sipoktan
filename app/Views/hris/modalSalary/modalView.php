<div class="modal fade text-left" id="modalKaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialogmodal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Data Karyawan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
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
                                    <th>Foto</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php foreach ($dataKaryawan as $value) : ?>
                                    <tr>

                                        <td>
                                            <button type="button" class="btn btn-primary rounded-pill btn-sm " id="select<?= $value['id'] ?>" data-id="<?= $value['id']; ?>" data-nama="<?= $value['nama_karyawan']; ?>" onclick="tampilData<?= $value['id'] ?>()" class="close" data-bs-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Tambah Data"><i class="bi bi-plus-lg"></i></button>
                                        </td>
                                        <td>
                                            <center>
                                                <div alt="<?= $value['foto_karyawan']; ?>" style="width: 60px;border-radius:50%; height: 60px;px; background:url('<?= base_url('assets/images/karyawan/' . $value['foto_karyawan']); ?>') center center; background-size: 70px;background-repeat: no-repeat;"></div>
                                            </center>
                                        </td>
                                        <td style="text-align: left;">
                                            <h5><?= $value['nama_karyawan']; ?></h5>
                                            <p><?= $value['alamat']; ?></p>
                                            <p><span class="badge bg-light-warning"><?= $value['date_gabung']; ?></span> | <span class="badge bg-light-success"><?= $value['status']; ?></span> | <span class="badge bg-light-info"><?= $value['pen_terakhir']; ?></span> | <span class="badge bg-light-primary"><?= $value['lokasi']; ?></span> | <span class="badge bg-light-secondary"><?= $value['luas']; ?> <?= $value['satuan']; ?></span></p>
                                        </td>
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