<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipoktan | User
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
User
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="row">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?= session()->getFlashdata('pesan') ?></div>
        <?php endif; ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Profile
                </div>
                <div class="card body p-4 pb-1">
                    <center>
                        <form action="<?= base_url('user/image'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div alt="<?= user()->image_user; ?>" style="width: 250px;border-radius:50%; height:250px; background:url('<?= base_url('assets/images/user/' . user()->image_user); ?>') center center; background-size: 350px;background-repeat: no-repeat;"></div>
                            <div class="mt-5">
                                <label for="formFile" class="form-label">Update Profile</label>
                                <input class="form-control" type="file" id="formFile" name="image_user" required>
                                <input type="hidden" value="<?= user()->id; ?>" name="id">
                                <input type="hidden" value="<?= user()->image_user; ?>" name="nama_foto">
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Information Profile
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Edit</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reset Password</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="<?= base_url('user/username') ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" value="<?= user()->id; ?>" name="id">
                                <div class="form-group mt-4">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="" value="<?= user()->username; ?>" disabled>
                                </div>
                                <div class=" form-group mt-4">
                                    <label for="">Fullname</label>
                                    <input type="text" class="form-control" name="fullname" value="<?= user()->fullname; ?>" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="" value="<?= user()->email; ?>" disabled>
                                </div>
                                <div class="mt-4 mb-2">
                                    <button type="submit" class="btn  btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class=" tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= route_to('forgot') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group mt-4">
                                    <label for="email"><?= lang('Auth.emailAddress') ?></label>
                                    <input type="email" class="form-control form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.email') ?>
                                    </div>
                                </div>
                                <button class="btn btn-primary shadow-lg mt-3">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>