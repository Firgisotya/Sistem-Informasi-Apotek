<?php 
    session_start();
    include "config/koneksi.php";
    error_reporting(0);
	$kd_trs = $_GET['kd_transaksi'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_transaksi, user, tbl_obat WHERE tbl_transaksi.id_user = user.id_user AND tbl_transaksi.kd_obat = tbl_obat.kd_obat AND kd_transaksi = '$kd_trs'");
	$t = mysqli_fetch_array($query);
    ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Apochecker | Transaksi Obat</title>
    <script src="js/jquery.js">
    < /scripalert> <
    script src = "js/bootstrap.bundle.min.js" >
    </script>
    <script src="js/bootstrap.bundle.js"></script>
</head>
<body?>
    <?php
	include "navbar.php";
	?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h1 align="center">Pembayaran</h1>
                            <div class="form-group">
                                <?php 
 					            if ($t['pembayaran'] == "BRI") {
 						        ?>
                                <center>
                                    <img src="img/bank/bri.png" width="100px" align="center">
                                </center>
                                <?php
 					            }elseif ($t['pembayaran'] == "BNI") {
 						        ?>
                                <center>
                                    <img src="img/bank/bni.png" width="100px" align="center">
                                </center>
                                <?php
 					            }elseif ($t['pembayaran'] == "BCA") {
 						        ?>
                                <center>
                                    <img src="img/bank/bca.png" width="100px" align="center">
                                </center>
                                <?php
 					            }elseif ($t['pembayaran'] == "MANDIRI") {
 						        ?>
                                <center>
                                    <img src="img/bank/mandiri.png" width="100px" align="center">
                                </center>
                                <?php
 					                }
 				                ?>
                            </div>
                            <div class="form-group">
                                <label>Rekening Toko</label>

                                <?php 
 					if ($t['pembayaran'] == "BRI") {
 						?>
                                <input type="text" class="form-control" value="12345678" readonly="">
                                <?php
 					}elseif ($t['pembayaran'] == "BNI") {
 						?>
                                <input type="text" class="form-control" value="00000000" readonly="">
                                <?php
 					}elseif ($t['pembayaran'] == "BCA") {
 						?>
                                <input type="text" class="form-control" value="23523623" readonly="">
                                <?php
 					}elseif ($t['pembayaran'] == "MANDIRI") {
 						?>
                                <input type="text" class="form-control" value="54321" readonly="">
                                <?php
 					}
 				 ?>
                            </div>
                            <div class="form-group">
                                <label>Total Pembayaran</label>
                                <input type="text" class="form-control" value="<?php echo $t['total']; ?>" readonly="">
                            </div>
                            <div>
                                <label>Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control-file" id="file" name="bukti">
                            </div>
                            <br />
                            <input type="submit" class="btn btn-outline-primary" value="Bayar" name="bayar">
                            <input type="submit" class="btn btn-outline-primary" value="Kembali" name="hapus">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>
<?php
if(isset($_POST['hapus'])){
    $kd_trans = $t['kd_transaksi'];
    $hapus = mysqli_query($conn, "DELETE FROM tbl_transaksi where kd_transaksi = '$kd_trans'");
    if($hapus){
        ?>
<Script>
alert('Data Pembayaran Berhasil Dibatalkan');
document.location = "tambah-transaksi.php?kd=<?= $t['kd_obat']; ?>";
</Script>
<?php
    }
}
if(isset($_POST['bayar'])){
    $kd_trans = $t['kd_transaksi'];
    $nama_file = $_FILES['bukti']['name'];
    $source = $_FILES['bukti']['tmp_name'];
    $folder = './img/bukti/';
    move_uploaded_file($source, $folder . $nama_file);
    $simpan = mysqli_query($conn, "UPDATE tbl_transaksi SET bukti = '$nama_file' WHERE tbl_transaksi.kd_transaksi = '$kd_trans'");
    if ($simpan) {
        ?>
<Script>
alert('Pembayaran Berhasil');
document.location = "histori-transaksi.php";
</Script>
<?php
    }
}
?>