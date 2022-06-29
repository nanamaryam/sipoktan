<div class="modal fade text-left" id="addPanen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialogmodal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Tambah Data Panen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('panen/simpan') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Harga /Kg</label>
                        <div class="input-group">
                            <span class="input-group-text">IDR</span>
                            <input type="number" class="form-control" name="harga_perkilo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Berat</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="berat" required>
                            <select name="id_satuan" class="input-group-text" required>
                                <option value="">--Satuan--</option>
                                <?php foreach ($dataSatuan as $b) : ?>
                                    <option value="<?= $b['id']; ?>"><?= $b['satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Total</label>
                        <div class="input-group">
                            <span class="input-group-text">IDR</span>
                            <input type="number" class="form-control" name="pendapatan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="ket_panen" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>