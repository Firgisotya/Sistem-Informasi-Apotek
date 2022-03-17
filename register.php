<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOCHECKER | Register</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">REGISTER</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nm_user" id="name"
                                placeholder="Masukkan nama" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username"
                                placeholder="Masukkan username" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password"
                                placeholder=" Masukkan password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <select class="form-input" id="jenis_kelamin" name="jenis_kelamin" required=""
                                placeholder="Masukkan jenis kelamin">
                                <option>Masukan Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" id="tp_lahir" placeholder="Tempat Lahir"
                                name="tp_lahir" required="">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-input" id="tgl_lahir" placeholder="Tanggal Lahir"
                                name="tgl_lahir" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" id="alamat" placeholder="Alamat" name="alamat"
                                required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" id="no_telp" placeholder="Nomor Telepon"
                                name="no_telp" required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" id="submit" class="form-submit" value="Sign up" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah punya akun ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php 
include "config/koneksi.php";

if (isset($_POST['register'])) {
	$name = $_POST['nm_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$level = "user";
	$jk = $_POST['jenis_kelamin'];
	$tp_lahir = $_POST['tp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$almt = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$query = mysqli_query($conn,"SELECT * FROM tbl_user where username='$user'");
	if (mysqli_num_rows($query) > 0) {
		echo "
		<div class='alert alert-danger' role='alert' align='center'>
		Username sudah terdaftar !
		</div>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO user (nm_user,username,password,level,jenis_kelamin,tp_lahir,tgl_lahir,alamat,no_telp) VALUES ('$name','$user','$pass','user','$jk','$tp_lahir','$tgl_lahir','$almt','$no_telp')");
		if ($save) {
			echo "<script> alert('Berhasil Mendaftar ! Silahkan Login')</script>";
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
		} else {
			echo mysqli_error($conn);
			echo "<script> alert('Proses Gagal !')</script>";
			echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
		}
	}

}

?>