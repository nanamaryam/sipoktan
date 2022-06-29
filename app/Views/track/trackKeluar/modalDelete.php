<?php foreach ($dataKeluar as $value) : ?>
    <div class="modal fade text-left" id="deleteKeluar<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel160">Delete Data Keluar</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('keluar/delete/' . $value['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" value="<?= $value['id_aset']; ?>" name="id_aset">
                    <input type="hidden" value="<?= $value['jumlah']; ?>" name="jumlah">
                    <input type="hidden" value="<?= $value['jumlah_keluar']; ?>" name="jumlah_keluar">
                    <div class="modal-body">
                        <center>
                            <h5 class="mt-2 mb-3">Apakah anda ingin menghapus data ini?</h5>
                            <button type="submit" class="btn btn-danger ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Hapus</span>
                            </button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>