<div class="modal fade text-left" id="addKebun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialogmodal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Tambah Data Kebun</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('kebun/simpan') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun Beli</label>
                        <input type="date" name="tahun" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Luas</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="luas">
                            <select name="id_satuan" class="input-group-text" required>
                                <option value="">--Satuan--</option>
                                <?php foreach ($dataSatuan as $b) : ?>
                                <option value="<?= $b['id']; ?>"><?= $b['satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Comodity</label>
                        <select name="id_comodity" id="" class="form-control">
                            <option value="">--Comodity--</option>
                            <?php foreach ($dataComodity as $a) : ?>
                            <option value="<?= $a['id']; ?>"><?= $a['comodity']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemilik</label>
                        <input type="text" name="jenis_tanaman" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Lokasi</label>
                        <textarea name="lokasi" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
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