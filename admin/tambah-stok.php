<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd'])) {
	$kd = $_GET['kd'];
} else {
	// echo "<script>alert('Kode Obat Belum Dipilih');document.location='index.php'</script>";
	// echo "<script>alert('Id User Belum Dipilih');document.location='index.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM tbl_obat where kd_obat='$kd'");
$daftar = mysqli_fetch_array($data);
$ambil = mysqli_query($conn,"SELECT max(kd_beli) as maxKode FROM tbl_pembelian");
$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char= "TB-";
$kd_beli = $char . sprintf("%03s", $noUrut);

date_default_timezone_set("Asia/Jakarta");
$tgl_beli = date("d-m-Y H:i:s");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apochecker | Tambah Stok</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Stok</h1>
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
                                <form action="" method="post">
                                    <h1 align="center">Beli Obat</h1>
                                    <div class="form-group">
                                        <label for="kd_transaksi">Kode Beli</label>
                                        <input type="text" class="form-control" id="kd_transaksi"
                                            placeholder="Masukan Kode Transaksi" required="" name="kd_transaksi"
                                            value="<?php echo $kd_beli;?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Obat</label>
                                        <select class="form-control" name="kd_obat" onchange="changeValue(this.value)"
                                            required>
                                            <option value=0>-Pilih-</option>
                                            <?php 
	 					            $query = mysqli_query($conn, "SELECT * FROM tbl_obat");
	 					            $jsarray = "var dtobat = new Array();\n";
	 					            while ($row = mysqli_fetch_array($query)) {
	 					            ?>
                                            <option value="<?= $row['kd_obat'] ?>"><?= $row['kd_obat'] ?></option>
                                            <?php
	 						        $jsarray .= "dtobat['".$row['kd_obat']."'] = { kategori:'".addslashes($row['kat_obat'])."', nama:'".addslashes($row['nm_obat'])."'};\n";
	 					            }
	 				                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kat_obat">Kategori Obat</label>
                                        <input type="text" class="form-control" id="kat_obat" required=""
                                            name="kat_obat" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_obat">Nama Obat</label>
                                        <input type="text" class="form-control" id="nm_obat" required="" name="nm_obat"
                                            readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_beli">Tanggal Transaksi</label>
                                        <input type="text" class="form-control" required="" name="tgl_beli"
                                            value="<?php echo $tgl_beli;?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="jml_beli">Jumlah</label>
                                        <input type="number" class="form-control" id="jml_beli"
                                            placeholder="Masukan Jumlah Beli" required="" name="jml_beli">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Beli" name="beli">
                                    <a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
                                </form>
                                <script type="text/javascript">
                                <?php echo $jsarray; ?>

                                function changeValue(id) {
                                    document.getElementById('kat_obat').value = dtobat[id].kategori;
                                    document.getElementById('nm_obat').value = dtobat[id].nama;
                                }
                                </script>

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
    if(isset($_POST['beli'])){
        $kd_bl = $kd_beli;
        $id_usr = $_SESSION['id'];
        $kd_obat = $_POST['kd_obat'];
        $tgl_beli = $_POST['tgl_beli'];
        $jml_beli = $_POST['jml_beli'];
        $simpan = mysqli_query($conn, "INSERT INTO tbl_pembelian (kd_beli,id_user,kd_obat,tgl_beli,jml_beli) VALUES 
        ('$kd_bl', '$id_usr', '$kd_obat', '$tgl_beli', '$jml_beli')");
    
        if ($simpan) {
            ?>
<Script>
alert('Pembelian Berhasil');
document.location = "manajemen-obat.php";
</Script>
<?php
        }
    }
?>