<?php
	include ("../config/koneksi.php");
	if (isset($_GET['id'])) {
		$user = $_GET['id'];
		$hapus = mysqli_query($conn,"DELETE FROM user where id_user='$user'");
		if ($hapus) {
			echo "<script>alert('User Berhasil Dihapus');document.location='manajemen-user.php'</script>";
		} else {
			echo "<script>alert('User Gagal Dihapus');document.location='manajemen-user.php'</script>";
		}
	} else {
		echo "<script>alert('User Belum Dipilih');document.location='manajemen-user.php'</script>";
	}
?>