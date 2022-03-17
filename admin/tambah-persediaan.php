<?php
session_start();
include "../config/koneksi.php";
$daftarkategori = mysqli_query($conn, "SELECT * FROM tbl_kategori");

$ambil = mysqli_query($conn, "SELECT max(kd_persediaan) as maxKode FROM persediaan");

$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char = "PS-";
$kd_persediaan = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apochecker | Tambah Persediaan</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Persediaan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <!-- Card Body -->
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="kd_persediaan">Kode Persediaan</label>
                                        <input type="text" class="form-control disabled" id="kd_persediaan" required=""
                                            name="kd_persediaan" value="<?= $kd_persediaan; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <input type="text" class="form-control" id="bulan" placeholder="Masukan Bulan"
                                            required="" name="bulan">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" class="form-control" id="tahun" placeholder="Masukan Tahun"
                                            required="" name="tahun">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_obat">Jenis Obat</label>
                                        <select class="form-control" id="jenis_obat" name="jenis_obat">
                                            <option>Pilih Salah Satu..</option>
                                            <?php
                                    while ($datapm = mysqli_fetch_array($daftarkategori)) { ?>
                                            <option value="<?php echo $datapm['nm_kategori']; ?>">
                                                <?php echo $datapm['nm_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jml_obat">Jumlah Obat</label>
                                        <input type="text" class="form-control" id="jml_obat"
                                            placeholder="Masukan Jumlah Obat" required="" name="jml_obat">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="manajemen-persediaan.php"
                                        role="button">Kembali</a>
                                </form>

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
<?php
if (isset($_POST['tambah'])) {

    $kd_persediaan = $kd_persediaan;
    $ktgr = $_POST['jenis_obat'];
    $bln = $_POST['bulan'];
    $thn = $_POST['tahun'];
    $jml = $_POST['jml_obat'];
    $simpan =mysqli_query($conn, "INSERT INTO persediaan
		(kd_persediaan,bulan,tahun,jenis_obat,jumlah_obat) VALUES 
		('$kd_persediaan','$bln','$thn','$ktgr','$jml')");
    
   
     
     if ($simpan) {
         echo "<script>
	  	document.location='manajemen-persediaan.php';
	 	alert('Data Persediaan berhasil disimpan')
        
         </script>";
    } else {
         echo "<script>alert('Data Persediaan berhasil disimpan')</script>";
    }
}
?>