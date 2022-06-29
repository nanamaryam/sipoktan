<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Data Karyawan</title>
    <link rel="icon" type="image/x-icon" href="/assets/images/logo/favicon.svg">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.svg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.png') ?>" type="image/png">
</head>
<style type="text/css">
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 6pt "Tahoma";
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;

    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;

    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #435ebe;
        color: white;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }


    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-responsive>.table-bordered {
        border: 0;
    }


    .subpage {
        padding: 1cm;
        border: 5px white solid;
        height: 257mm;
        outline: 2cm white;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;
            -webkit-print-color-adjust: exact;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }


    }
</style>

<body>

    <div class="book">
        <div class="page">
            <div class="subpage">
                <center>
                    <h2>List Data Laba</h2>
                </center>
                <div class="table-responsive">
                    <table id="customers">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Berita Acara</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <?php
                        function Rupiah($angka)
                        {
                            $hasil = "Rp " . number_format($angka, 2, ',', '.');
                            return $hasil;
                        }
                        foreach ($dataLaba as $value) :
                        ?>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td><?= $value['laba_time'] ?></td>
                                    <td><?= $value['acara_berita'] ?></td>
                                    <td><?= Rupiah($value['nominal']) ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script type="text/javascript">
    window.print();
</script>