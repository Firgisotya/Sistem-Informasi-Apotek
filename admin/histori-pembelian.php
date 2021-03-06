<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apochecker | Histori Pembelian</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Histori Pembelian</h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Histori Pembelian</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Kode Beli</th>
                                                    <th rowspan="2">ID User</th>
                                                    <th rowspan="2">Kode Obat</th>
                                                    <th rowspan="2">Tanggal Beli</th>
                                                    <th rowspan="2">Jumlah</th>
                                                    <th rowspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php

                        $txtcari = $_POST['txtcari'];
                        $no = 1;
                        if ($txtcari == !"") {
                            $query = mysqli_query($conn, "SELECT * FROM tbl_pembelian where 
								kd_beli like '%$txtcari%' OR 
								tgl_beli like '%$txtcari%' OR
								id_user like '%$txtcari%' OR
								kd_obat like '%$txtcari%' OR
								jml_beli like '%$txtcari%'");
                        } else {
                            $query = mysqli_query($conn, "SELECT * FROM tbl_pembelian ORDER BY tbl_pembelian.kd_beli DESC");
                        }
                        if (mysqli_num_rows($query)) {
                            while ($data = mysqli_fetch_array($query)) { ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?=  $data['kd_beli']; ?></td>
                                                    <td><?= $data['id_user']; ?></td>
                                                    <td><?= $data['kd_obat']; ?></td>
                                                    <td><?= $data['tgl_beli'];  ?></td>
                                                    <td><?= $data['jml_beli']; ?></td>
                                                    <td>
                                                        <a href="hapus-histori-pembelian.php?kd=<?php echo $data['kd_obat']; ?>"
                                                            class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php            }
                        } else { ?>
                                            <tr>
                                                <td colspan="10" align="center">Tidak Ada Data</td>
                                            </tr>
                                            <?php    }
                        ?>
                                        </table>
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
                        <span aria-hidden="true">??</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>