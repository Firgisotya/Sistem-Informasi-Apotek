<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM tbl_obat where kd_obat='$kd'");
		if ($hapus) {
			echo "<script>alert('Data Obat Berhasil Dihapus');document.location='manajemen-obat.php'</script>";
		} else {
			echo "<script>alert('Data Obat Gagal Dihapus');document.location='manajemen-obat.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Obat Belum Dipilih');document.location='manajemen-obat.php'</script>";
	}
?>