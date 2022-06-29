<div class="modal fade text-left" id="excelExport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title white" id="myModalLabel160">Export Excel Laba</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <form action="<?= base_url('laba/exportexcel') ?>" method="post" target="_blank" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-success rounded-pill mb-4">Export Excel All</button>
                    </form>
                    <br>
                    <form action="<?= base_url('laba/excelfilter') ?>" method="post" target="_blank" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="date" class="form-control" name="start_date" required>
                            <label for="">Sampai</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill">Filter Excel Export</button>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>