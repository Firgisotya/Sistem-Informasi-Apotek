<?php
session_start();
include "../config/koneksi.php";
$daftarkategori = mysqli_query($conn, "SELECT * FROM tbl_kategori");

$ambil = mysqli_query($conn, "SELECT max(id_fuzzy) as maxKode FROM fuzzy");

$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char = "IDF-";
$id_fuzzy = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apochecker | Input Fuzzy</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Input Fuzzy</h1>
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
                                        <label for="id_fuzzy">Kode Fuzzy</label>
                                        <input type="text" class="form-control disabled" id="id_fuzzy" required=""
                                            name="id_fuzzy" value="<?= $id_fuzzy; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan"> Bulan</label>
                                        <select class="form-control" name="bulan" id="bulan">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" name="tahun">
                                            <option value="2018">2019</option>
                                            <option value="2019">2020</option>
                                            <option value="2020">2021</option>
                                        </select>
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
                                        <label for="permintaan">Permintaan</label>
                                        <input type="text" class="form-control" id="permintaan"
                                            placeholder="Masukan Permintaan" required="" name="permintaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="persediaan">Persediaan</label>
                                        <input type="text" class="form-control" id="persediaan"
                                            placeholder="Masukan Persediaan" required="" name="persediaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="produksi">Produksi</label>
                                        <input type="text" class="form-control" id="produksi"
                                            placeholder="Masukan Produksi" required="" name="produksi">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="fuzzy.php" role="button">Kembali</a>
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

    $id_fuzzy = $id_fuzzy;
    $ktgr = $_POST['jenis_obat'];
    $bln = $_POST['bulan'];
    $thn = $_POST['tahun'];
    $pm = $_POST['permintaan'];
    $ps = $_POST['persediaan'];
    $pr = $_POST['produksi'];

    if(($pm >=10) && ($pm<=3333)){
        $hasil_permintaan="SEDIKIT";
      }
        
    elseif(($pm >=3334) && ($pm<=6666)){
        $hasil_permintaan="SEDANG";
       }
    
    elseif(($pm >=6667) && ($pm<=10000)){
        $hasil_permintaan="BANYAK";
    }
     
    if(($ps >=10) && ($ps <=3333))
    {
        $hasil_persediaan ="SEDIKIT";
    }	
    elseif(($ps >=3334) && ($ps <=6666))
    {
        $hasil_persediaan = "SEDANG";
    }
    
    elseif(($ps >= 6667) && ($ps <=10000))
    {
        $hasil_persediaan = "BANYAK";
    }
    
    if(($pr >= 10) && ($pr <=3333))
    {
        $hasil_produksi = "SEDIKIT";
    }
    
    elseif(($pr >= 3334) && ($pr <=6666))
    {
        $hasil_produksi = "SEDANG";
    }
    
    elseif(($pr >= 6667)  &&($pr <=10000))
    
    {
        $hasil_produksi = "BANYAK";
    }

    $simpan =mysqli_query($conn, "INSERT INTO fuzzy
		(id_fuzzy,bulan,tahun,jenis_obat,permintaan,persediaan,produksi) VALUES 
		('$id_fuzzy','$bln','$thn','$ktgr','$hasil_permintaan','$hasil_persediaan','$hasil_produksi')");
    
   
     
     if ($simpan) {
         echo "<script>
	  	document.location='fuzzy.php';
	 	alert('Data Fuzzy berhasil disimpan')
        
         </script>";
    } else {
         echo "<script>alert('Data Fuzzy gagal disimpan')</script>";
    }
}
?>