<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM permintaan where kd_permintaan='$kd'");
		if ($hapus) {
			echo "<script>alert('Data Permintaan Berhasil Dihapus');document.location='manajemen-permintaan.php'</script>";
		} else {
			echo "<script>alert('Data Permintaan Gagal Dihapus');document.location='manajemen-permintaan.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Permintaan Belum Dipilih');document.location='manajemen-permintaan.php'</script>";
	}
?>