<div class="modal fade text-left" id="dataAset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialogmodal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Data Aset</h5>
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
                                    <th>Aset</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php
                                function Rupiah($angka)
                                {
                                    $hasil = "Rp " . number_format($angka, 2, ',', '.');
                                    return $hasil;
                                }
                                foreach ($dataAset as $value) :
                                ?>
                                    <tr>
                                        <td><button type="button" class="btn btn-primary rounded-pill btn-sm " id="select<?= $value['id'] ?>" data-id="<?= $value['id']; ?>" data-aset="<?= $value['nama_aset']; ?>" data-kategori="<?= $value['nama_kategori']; ?>" data-satuan="<?= $value['satuan']; ?>" data-jumlah="<?= $value['jumlah']; ?>" data-hargasatuan="<?= $value['harga_satuan']; ?>" onclick="tampilData<?= $value['id'] ?>()" class="close" data-bs-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Tambah Data"><i class="bi bi-plus-lg"></button></td>
                                        <td><?= $value['nama_aset'] ?> </td>
                                        <td><?= $value['nama_kategori'] ?></td>
                                        <td><?= $value['jumlah'] ?> <?= $value['satuan']; ?></td>
                                        <td><?= Rupiah($value['harga_satuan']) ?></td>
                                        <td><?= Rupiah($value['harga_satuan'] * $value['jumlah']); ?></td>
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