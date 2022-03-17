<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM tbl_pembelian where kd_beli='$kd'");
		if ($hapus) {
			echo "<script>alert('Data Pembelian Berhasil Dihapus');document.location='histori-pembelian.php'</script>";
		} else {
			echo "<script>alert('Data Pembelian Gagal Dihapus');document.location='histori-pembelian.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Pembelian Belum Dipilih');document.location='histori-pembelian.php'</script>";
	}
?>