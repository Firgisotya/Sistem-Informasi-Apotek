<?php

session_start();
include "config/koneksi.php";
error_reporting(0);
$ktgr = $_GET['kategori'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Apochecker | Beranda</title>
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
                Daftar Obat
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3">
                        <form class="form-inline" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari . . ." name="txtcari">
                            </div>
                            <button type="submit" class="btn btn-warning ml-2">Cari</button>
                        </form>
                        <br />
                    </div>
                    <?php 
					$cari = $_POST['txtcari'];
					if($cari == !""){
						$ambil = mysqli_query($conn,"SELECT * FROM tbl_obat where nm_obat like '%".$cari."%'");
					} else{
						if ($ktgr) {
							$ambil = mysqli_query($conn,"SELECT * FROM tbl_obat WHERE kat_obat = '$ktgr'");
						} else{
						$ambil = mysqli_query($conn,"SELECT * FROM tbl_obat"); }
					}
					if (mysqli_num_rows($ambil)) {
						foreach ($ambil as $tampung) {?>
                    <div class="col-md-3">
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <img src="img/obat/<?php echo $tampung['gambar']; ?>"
                                alt="<?php echo $tampung['gambar']; ?>" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $tampung['nm_obat']?></h5>
                                <p class="card-text">Rp. <?= $tampung['harga']?></p>
                                <?php
				if ($tampung['stok'] == 0) { ?>
                                <a href="tambah-transaksi.php" class="btn btn-danger disabled">Beli</a>
                                <a href="detail-obat.php?kd=<?php echo $tampung['kd_obat']; ?>"
                                    class="btn btn btn-outline-primary">Detail</a>
                                <?php 
				} else { 
                    if($_SESSION['level'] == "user"){ ?>
                                <a href="tambah-transaksi.php?kd=<?= $tampung['kd_obat']; ?>"
                                    class="btn btn-primary">Beli</a>
                                <a href="detail-obat.php?kd=<?php echo $tampung['kd_obat']; ?>"
                                    class="btn btn btn-outline-primary">Detail</a>
                                <?php } elseif($_SESSION['id']){ ?>
                                <a href="login.php" class="btn btn-primary">Beli</a>
                                <a href="detail-obat.php?kd=<?php echo $tampung['kd_obat']; ?>"
                                    class="btn btn btn-outline-primary">Detail</a>
                                <?php } 
                                }?>
                            </div>
                        </div>
                    </div>
                    <?php
						}
					}
					?>
                </div>
            </div>
        </div>
    </div>
    <style>
    .card-img-top {
        width: 100%;
        height: 20vw;
        object-fit: cover;
    }
    </style>
</body>

</html>