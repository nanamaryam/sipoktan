<div class="modal fade text-left" id="masukAbsen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Clock In</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('absensi/simpan'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" value="<?= user_id(); ?>" name="user_login">
                <input type="hidden" value="<?= date('g:i a'); ?>" name="time_sign">
                <input type="hidden" value="<?= date('d-m-y'); ?>" name="date_time">
                <div class="modal-body">
                    <center>
                        <h5 class="mt-2 mb-3">Clock In <?= date('d-m-y'); ?> | <?= date('g:i a'); ?></h5>
                        <div class="form-group m-3">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3">-</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Absen Masuk</span>
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>