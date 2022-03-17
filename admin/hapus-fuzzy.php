<?php
	include ("../config/koneksi.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$hapus = mysqli_query($conn,"DELETE FROM fuzzy where id_fuzzy='$id'");
		if ($hapus) {
			echo "<script>alert('Data Fuzzy Berhasil Dihapus');document.location='fuzzy.php'</script>";
		} else {
			echo "<script>alert('Data Fuzzy Gagal Dihapus');document.location='fuzzy.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Fuzzy Belum Dipilih');document.location='fuzzy.php'</script>";
	}
?>