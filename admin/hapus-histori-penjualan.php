<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM tbl_transaksi where kd_transaksi='$kd'");
		if ($hapus) {
			echo "<script>alert('Data Penjualan Berhasil Dihapus');document.location='histori-penjualan.php'</script>";
		} else {
			echo "<script>alert('Data Penjualan Gagal Dihapus');document.location='histori-penjualan.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Penjualan Belum Dipilih');document.location='histori-penjualan.php'</script>";
	}
?>