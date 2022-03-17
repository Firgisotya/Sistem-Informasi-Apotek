<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd_obat'])) {
	$kd = $_GET['kd_obat'];
} else {
	echo "<script>alert('Kode obat Belum Dipilih');document.location='manajemen-obat.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM tbl_obat where kd_obat='$kd'")or die(mysqli_error());
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

    <title>Apochecker | Edit Obat</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Obat</h1>
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
                                        <input type="hidden" name="kd_obat" value="<?php echo $daftar['kd_obat']; ?>">
                                        <label>Kode Obat</label>
                                        <input type="text" class="form-control" id="kd_obat" placeholder="" required=""
                                            name="kd_obat" value="<?php echo $daftar['kd_obat'];?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <input type="text" class="form-control" id="nm_obat"
                                            placeholder="Masukan nama obat" required="" name="nm_obat"
                                            value="<?php echo $daftar['nm_obat'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kat_obat">Kategori</label>
                                        <select class="form-control" id="kat_obat" name="kat_obat" required="">
                                            <option><?php echo $daftar['kat_obat'];?></option>
                                            <?php 
									foreach ($dafatrkategori as $kategori) { ?>
                                            <option><?php echo $kategori['nm_kategori'];?></option>
                                            <?php }
									?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control" id="harga" placeholder="Masukan Harga"
                                            required="" name="harga" value="<?php echo $daftar['harga'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="text" class="form-control" id="stok" placeholder="Masukan Stok"
                                            required="" name="stok" value="<?php echo $daftar['stok'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi"
                                            placeholder="Masukan Deskripsi" required="" name="deskripsi"
                                            value="<?php echo $daftar['deskripsi'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control-file" id="file" name="gambar"
                                            value="Images/<?php echo $daftar['gambar'];?>">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
                                    <a class="btn btn-outline-primary" href="manajemen-obat.php"
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

	$kd = $_POST['kd_obat'];
    $ktgr = $_POST['kat_obat'];
	$nm = $_POST['nm_obat'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$desk = $_POST['deskripsi'];
	$nama_file = $_FILES['gambar']['name'];
	$source = $_FILES['gambar']['tmp_name'];
	$folder = '../img/obat/';

	if($nama_file != '') {

		move_uploaded_file($source, $folder.$nama_file);
		$edit = mysqli_query($conn,"UPDATE tbl_obat SET nm_obat='$nm',kat_obat='$ktgr',harga='$harga', stok='$stok', deskripsi='$desk', gambar='$nama_file' where kd_obat='$kd'");
		if($edit){
			echo "<script>alert('Data obat berhasil diedit'); document.location='manajemen-obat.php'</script>";
		} else {
			echo "<script>alert('Data obat gagal diedit')</script>";
			echo mysqli_error($conn);
		}
	} else {
		move_uploaded_file($source, $folder.$nama_file);
		$edit = mysqli_query($conn,"UPDATE tbl_obat set nm_obat='$nm',kat_obat='$ktgr',harga='$harga', stok='$stok', deskripsi='$desk', where kd_obat='$kd'");
        
		if($edit){
			echo "<script>alert('Data obat berhasil diedit'); document.location='manajemen-obat.php'</script>";
		} else {
			echo "<script>alert('Data obat gagal diedit')</script>";
			echo mysqli_error($conn);
		}
	}
    
}
?>