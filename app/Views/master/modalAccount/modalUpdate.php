<?php foreach ($dataPengguna as $value) : ?>
    <div class="modal fade text-left" id="updateRole<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialogmodal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel160">Update Role</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('account/update/' . $value['group_id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">User</label>
                            <select name="users_simpan" id="" class="form-control">
                                <option value="<?= $value['id']; ?>"><?= $value['username']; ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Role</label>
                            <select name="role_simpan" id="" class="form-control">
                                <option value="<?= $value['group_id']; ?>" selected><?= $value['name']; ?></option>
                                <?php foreach ($dataGroup as $value) : ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                <?php endforeach; ?>
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