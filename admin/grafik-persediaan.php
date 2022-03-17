<?php
session_start();
include "../config/koneksi.php";
// $bulan       = mysqli_query($conn, "SELECT bulan FROM persediaan WHERE tahun='2021' order by kd_persediaan asc");
// $jumlah = mysqli_query($conn, "SELECT jumlah_obat FROM persediaan WHERE tahun='2021' order by kd_persediaan asc");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apochecker | Grafik Persediaan</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/chart.js/Chart.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/chart.js/Chart.bundle.js"></script>
    <script src="../vendor/chart.js/Chart.bundle.min.js"></script> -->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script> -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include "../admin/sidebaradmin.php";               
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                    include "../admin/topbaradmin.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Grafik Persediaan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-10">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Persediaan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div id="container"></div>
                                        <script>
                                        var chart1;
                                        $(document).ready(function() {
                                            chart1 = new Highcharts.chart({
                                                chart: {
                                                    renderTo: 'container',
                                                    type: 'column'
                                                },
                                                title: {
                                                    text: 'Grafik Persediaan Obat 2021'
                                                },
                                                xAxis: {
                                                    categories: ['Jumlah Obat']
                                                },
                                                yAxis: {
                                                    title: {
                                                        text: 'Jumlah Obat'
                                                    }
                                                },
                                                series: [
                                                    <?php
                    $sql = "SELECT * FROM persediaan";
                    $query = mysqli_query($conn,$sql) or die (mysqli_error());
                        while ($barang = mysqli_fetch_array($query)) {
                            $merk = $barang['bulan'];
                            $jumlah = "SELECT jumlah_obat FROM persediaan WHERE bulan='$merk'";
                            $query_jumlah = mysqli_query($conn,$jumlah) or die (mysqli_error());
 
                            while($data = mysqli_fetch_array($query_jumlah)){
                                $total = $data['jumlah_obat'];
                            }
                            ?> {
                                                        name: '<?php echo $merk; ?>',
                                                        data: [<?php echo $total; ?>]
                                                    },
                                                    <?php } ?>
                                                ]
                                            });
                                        });
                                        </script>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



</body>

</html>