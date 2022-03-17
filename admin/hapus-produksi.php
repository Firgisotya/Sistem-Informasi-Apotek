<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM produksi where kd_produksi='$kd'");
		if ($hapus) {
			echo "<script>alert('Data Produksi Berhasil Dihapus');document.location='manajemen-produksi.php'</script>";
		} else {
			echo "<script>alert('Data Produksi Gagal Dihapus');document.location='manajemen-produksi.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Produksi Belum Dipilih');document.location='manajemen-produksi.php'</script>";
	}
?>