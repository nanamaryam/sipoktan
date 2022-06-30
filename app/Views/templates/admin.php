<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title'); ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main/app-dark.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.svg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.png') ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/css/shared/iconly.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/datatables.css') ?>">
    <script src="https://kit.fontawesome.com/72eca601e0.js" crossorigin="anonymous"></script>

    <link href="<?= base_url('assets/apex/styles.css'); ?>" rel="stylesheet" />
    <style>
        #chart {
            max-width: 650px;
            margin: 35px auto;
        }
    </style>
</head>

<body>
    <div id="app">
        <?= $this->include('templates/sidebar'); ?>
        <div id="main">
            <?= $this->include('templates/header'); ?>
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3><?= $this->renderSection('titlePage'); ?></h3>
                    </div>

                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <?= $this->include('templates/nav'); ?>
                    </div>
                </div>
            </div>
            <div class="page-heading">

            </div>
            <div class="page-content">
                <section class="row">
                    <?= $this->renderSection('content'); ?>
                </section>
                <?= $this->include('templates/footer'); ?>

            </div>
        </div>
        <script src="<?= base_url('assets/js/app.js') ?>"></script>

        <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
        <script src="<?= base_url('assets/js/sidebar.js') ?>"> </script>
        <script src="<?= base_url('assets/js/extensions/datatables.js') ?>"></script>

</body>

</html>