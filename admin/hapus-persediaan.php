<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM persediaan where kd_persediaan='$kd'");
		if ($hapus) {
			echo "<script>alert('Data Persediaan Berhasil Dihapus');document.location='manajemen-persediaan.php'</script>";
		} else {
			echo "<script>alert('Data Persediaan Gagal Dihapus');document.location='manajemen-persediaan.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Persediaan Belum Dipilih');document.location='manajemen-persediaan.php'</script>";
	}
?>