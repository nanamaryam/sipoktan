<?php foreach ($dataAset as $value) : ?>
    <div class="modal fade text-left" id="updateAset<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialogmodal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel160">Update Data Aset</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('aset/update/' . $value['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Aset</label>
                            <input type="text" class="form-control" name="nama_aset" value="<?= $value['nama_aset']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="id_kategori" class="form-control" id="">
                                <?php
                                $id_kategori = $value['id_kategori'];
                                foreach ($dataKategori as $a) :
                                    $ss = '';
                                    if ($a['id'] == $id_kategori) {
                                        $ss = 'selected';
                                    }
                                ?>
                                    <option value="<?= $a['id']; ?>" <?= $ss; ?>><?= $a['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="jumlah" value="<?= $value['jumlah']; ?>">
                                <select name="id_satuan" class="input-group-text">
                                    <?php
                                    $id_satuan = $value['id_satuan'];
                                    foreach ($dataSatuan as $b) :
                                        $ss = '';
                                        if ($b['id'] == $id_satuan) {
                                            $ss = 'selected';
                                        }
                                    ?>
                                        <option value="<?= $b['id']; ?>" <?= $ss; ?>><?= $b['satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Satuan</label>
                            <div class="input-group">
                                <span class="input-group-text">IDR</span>
                                <input type="number" class="form-control" name="harga_satuan" value="<?= $value['harga_satuan']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-warning ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>