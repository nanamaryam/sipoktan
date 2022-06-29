<?php foreach ($dataKebun as $value) : ?>
    <div class="modal fade text-left" id="updateKebun<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialogmodal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel160">Update Data Kebun</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('kebun/update/' . $value['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tahun Beli</label>
                            <input type="date" name="tahun" class="form-control" value="<?= $value['tahun']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Luas</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="luas" value="<?= $value['luas']; ?>">
                                <select name="id_satuan" class="input-group-text" required>
                                    <?php
                                    $id_satuan = $value['id_satuan'];
                                    foreach ($dataSatuan as $b) :
                                        $ss = '';
                                        if ($b['id'] == $id_satuan) {
                                            $ss = 'selected';
                                        }
                                    ?>
                                        <option value="<?= $b['id']; ?>" <?= $ss ?>><?= $b['satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Tanaman</label>
                            <input type="text" name="jenis_tanaman" class="form-control" value="<?= $value['jenis_tanaman']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <textarea name="lokasi" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $value['lokasi']; ?></textarea>
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