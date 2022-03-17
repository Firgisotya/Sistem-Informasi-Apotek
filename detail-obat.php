<?php 
session_start();
include "config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd'])) {
	$kd = $_GET['kd'];
} elseif (isset($_GET['id'])) {
	$id  = $_GET['id'];
} 
else {
	echo "<script>alert('Kode obat Belum Dipilih');document.location='index.php'</script>";
	echo "<script>alert('Id User Belum Dipilih');document.location='index.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM tbl_obat where kd_obat='$kd'")or die(mysqli_error());
$daftar = mysqli_fetch_array($data);
$user = mysqli_query($conn,"SELECT * FROM user where id_user='$id'")or die(mysqli_error());
$user1 = mysqli_fetch_array($user);
$dafatrkategori = mysqli_query($conn,"SELECT * FROM tbl_kategori")or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Apochecker | Detail Obat</title>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <?php
	include "navbar.php";
	?>
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                Detail Obat
            </div>

            <?php 
			if (isset($_SESSION['level'])) {
    		if ($_SESSION['level'] == "admin") { ?>
            <table class="table-responsive" cellpadding="15px" align="center">
                <tr>
                    <td rowspan="8">
                        <img src="img/obat/<?php echo $daftar['gambar']; ?>" width="400px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4><?php echo $daftar['nm_obat']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 style="color:red">Rp. <?php echo $daftar['harga']; ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Kategori : <?php echo $daftar['kat_obat']; ?></h5>
                    </td>
                </tr>
                <tr>
                    <?php 
	 				if ($daftar['stok'] == 0) {
	 					?>
                    <td>
                        <h5>Stok : Stok sudah habis</h5>
                    </td>
                    <?php
	 				}else{
	 					?>
                    <td>
                        <h5>Stok : <?= $daftar['stok'] ?></h5>
                    </td>
                    <?php
	 				}
	 			 ?>
                </tr>
                <tr>
                    <td>
                        <h5>Deskripsi : <?php echo $daftar['deskripsi']; ?></h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
				if ($daftar['stok'] == 0) { ?>
                        <a href="tambah-transaksi.php" class="btn btn-danger disabled">Beli</a>
                        <?php 
				} else { ?>
                        <a href="tambah-transaksi.php?kd=<?= $daftar['kd_obat']; ?>" class="btn btn-primary">Beli</a>
                        <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>

            <?php    } elseif ($_SESSION['level'] == "user") { ?>
            <table class="table-responsive" cellpadding="15px" align="center">
                <tr>
                    <td rowspan="8">
                        <img src="img/obat/<?php echo $daftar['gambar']; ?>" width="400px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4><?php echo $daftar['nm_obat']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 style="color:red">Rp. <?php echo $daftar['harga']; ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Kategori : <?php echo $daftar['kat_obat']; ?></h5>
                    </td>
                </tr>
                <tr>
                    <?php 
	 				if ($daftar['stok'] == 0) {
	 					?>
                    <td>
                        <h5>Stok : Stok sudah habis</h5>
                    </td>
                    <?php
	 				}else{
	 					?>
                    <td>
                        <h5>Stok : <?= $daftar['stok'] ?></h5>
                    </td>
                    <?php
	 				}
	 			 ?>
                </tr>
                <tr>
                    <td>
                        <h5>Deskripsi : <?php echo $daftar['deskripsi']; ?></h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
				if ($daftar['stok'] == 0) { ?>
                        <a href="tambah-transaksi.php" class="btn btn-danger disabled">Beli</a>
                        <?php 
				} else { ?>
                        <a href="tambah-transaksi.php?kd=<?= $daftar['kd_obat']; ?>" class="btn btn-primary">Beli</a>
                        <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>

            <?php        }
			} elseif (!isset($_SESSION['id'])) { ?>
            <table class="table-responsive" cellpadding="15px" align="center">
                <tr>
                    <td rowspan="8">
                        <img src="images/<?php echo $daftar['gambar']; ?>" width="400px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4><?php echo $daftar['nm_obat']; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 style="color:red">Rp. <?php echo $daftar['harga']; ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Kategori : <?php echo $daftar['kat_obat']; ?></h5>
                    </td>
                </tr>
                <tr>
                    <?php 
	 				if ($daftar['stok'] == 0) {
	 					?>
                    <td>
                        <h5>Stok : Stok sudah habis</h5>
                    </td>
                    <?php
	 				}else{
	 					?>
                    <td>
                        <h5>Stok : <?= $daftar['stok'] ?></h5>
                    </td>
                    <?php
	 				}
	 			 ?>
                </tr>
                <tr>
                    <td>
                        <h5>Deskripsi : <?php echo $daftar['deskripsi']; ?></h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
				if ($daftar['stok'] == 0) { ?>
                        <a href="tambah-transaksi.php" class="btn btn-danger disabled">Beli</a>
                        <?php 
				} else { ?>
                        <a href="login.php?kd=<?= $daftar['kd_obat']; ?>" class="btn btn-primary">Beli</a>
                        <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>

</body>

</html>