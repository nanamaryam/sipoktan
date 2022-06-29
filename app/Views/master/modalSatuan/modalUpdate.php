<?php foreach ($dataSatuan as $value) : ?>
    <div class="modal fade text-left" id="updateSatuan<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialogmodal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel160">Update Data Satuan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('satuan/update/' . $value['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Satuan</label>
                            <input type="text" name="satuan" class="form-control" value="<?= $value['satuan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <?php
                                $b = '';
                                $c = '';
                                if ($value['status'] == 'Active') {
                                    $b = 'selected';
                                } elseif ($value['status'] == 'Inactive') {
                                    $c = 'selected';
                                }
                                ?>
                                <option value="Active" <?= $b ?>>Active</option>
                                <option value="Inactive" <?= $c ?>>Inactive</option>
                            </select>
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