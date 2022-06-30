<?= $this->extend('templates/admin'); ?>
<?= $this->section('title'); ?>
sipak | Dashboard
<?= $this->endSection(); ?>
<?= $this->section('titlePage'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<?php
$no = 1;
function Rupiah($angka)
{
    $hasil = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil;
}
?>
<div class="col-12 col-lg-12">
    <?php if (in_groups('admin') == true) { ?>
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldLogin"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Barang Masuk</h6>
                                <h6 class="font-extrabold mb-0"><?= Rupiah($totalMasuk); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldLogout"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Barang Keluar</h6>
                                <h6 class="font-extrabold mb-0"><?= $totalUnitKeluar; ?> Unit</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldChart"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Laba</h6>
                                <h6 class="font-extrabold mb-0"><?= Rupiah($totalLaba - $totalCost); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldChart"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Cost</h6>
                                <h6 class="font-extrabold mb-0"><?= Rupiah($totalCost); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hasil Panen</h4>
                </div>
                <div class="card-body">
                    <div id="mychart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?= base_url('assets/apex/apexcharts.js') ?>"></script>
<script>
    function valueYear() {
        var mm = $('#selected_year').val();
        $.ajax({
            url: "<?php echo site_url('dashboard/getDataReport') ?>",
            type: 'POST',
            ml: mm,
            success: function(ml) {
                console.log(ml)

            },
        });

    };
</script>
<script>
    $(document).ready(function() {
        getDataReport()
    })

    function getDataReport(thn) {

        // $("#penjualan_charts").html("Loading...");
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('dashboard/getDataReport') ?>",
            data: {
                "tahun": thn
            },
            dataType: "json",
            async: true,
            cache: false,
            success: function(response) {
                chart.updateSeries([{
                    name: 'Panen',
                    data: response.panen
                }]);

            }
        });
    }

    var options = {
        series: [{
            name: 'Website Blog',
            type: 'column',
            data: []
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    // return value + " Rupiah";
                    return 'Rp  ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            },
        },
        xaxis: {
            categories: ['Jan ', 'Feb ', 'Mart ', 'Apr ', 'Mei ', 'Jun ', 'Jul ',
                'Agust ', 'Sept ', 'Okt ', 'Nov ', 'Des '
            ],
        }
    };

    var chart = new ApexCharts(document.querySelector("#mychart"), options);
    chart.render();
</script>

<?= $this->endSection(); ?>