<div class="modal fade text-left" id="printLaba" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Print Data Panen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('laba/printfilter') ?>" method="post" target="_blank" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <center>
                        <a href="<?= base_url('laba/print'); ?>" type="button" class="btn btn-primary rounded-pill mb-4" target="_blank">Print All</a>
                        <br>
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="date" class="form-control" name="start_date" required>
                            <label for="">Sampai</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill">Filter Print</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>