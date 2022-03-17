<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd_produksi'])) {
	$kd = $_GET['kd_produksi'];
} else {
	echo "<script>alert('Kode Permintaan Belum Dipilih');document.location='manajemen-produksi.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM produksi where kd_produksi='$kd'")or die(mysqli_error());
$daftar = mysqli_fetch_array($data);
$dafatrkategori = mysqli_query($conn,"SELECT * FROM tbl_kategori")or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apochecker | Edit Produksi</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Produksi</h1>
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
                                        <input type="hidden" name="kd_produksi"
                                            value="<?php echo $daftar['kd_produksi']; ?>">
                                        <label>Kode Produksi</label>
                                        <input type="text" class="form-control" id="kd_produksi" placeholder=""
                                            required="" name="kd_produksi" value="<?php echo $daftar['kd_produksi'];?>"
                                            readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <input type="text" class="form-control" id="bulan" placeholder="Masukan Bulan"
                                            required="" name="bulan" value="<?php echo $daftar['bulan'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" class="form-control" id="tahun" placeholder="Masukan Tahun"
                                            required="" name="tahun" value="<?php echo $daftar['tahun'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_obat">Jenis Obat</label>
                                        <select class="form-control" id="jenis_obat" name="jenis_obat" required="">
                                            <option><?php echo $daftar['jenis_obat'];?></option>
                                            <?php 
									foreach ($dafatrkategori as $kategori) { ?>
                                            <option><?php echo $kategori['nm_kategori'];?></option>
                                            <?php }
									?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_obat">Jumlah Obat</label>
                                        <input type="text" class="form-control" id="jumlah_obat"
                                            placeholder="Masukan Jumlah Obat" required="" name="jumlah_obat"
                                            value="<?php echo $daftar['jumlah_obat'];?>">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
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

if (isset($_POST['edit'])) {

	$kd = $_POST['kd_produksi'];
    $ktgr = $_POST['jenis_obat'];
	$bln = $_POST['bulan'];
	$thn = $_POST['tahun'];
	$jml = $_POST['jumlah_obat'];

		$edit = mysqli_query($conn,"UPDATE produksi SET bulan='$bln',jenis_obat='$ktgr',tahun='$thn', jumlah_obat='$jml' where kd_produksi='$kd'");
		if($edit){
			echo "<script>alert('Data Produksi berhasil diedit'); document.location='manajemen-produksi.php'</script>";
		} else {
			echo "<script>alert('Data Produksi gagal diedit')</script>";
			echo mysqli_error($conn);
		}
	} 
    

?>