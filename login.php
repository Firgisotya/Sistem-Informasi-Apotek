<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOCHECKER | Login</title>
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
                        <h2 class="form-title">LOGIN</h2>
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
                            <input type="submit" name="login" id="submit" class="form-submit" value="Sign In" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Belum punya akun ? <a href="register.php" class="loginhere-link">Register here</a>
                        <hr>

                    </p>
                    <p class="loginhere">
                        <a class="loginhere-link" href="index.php"><i class="fa fa-long-arrow-left">Kembali</i></a>
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

if (isset($_POST['login'])) {
		session_start();
		include "config/koneksi.php";
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$user'");
		$tampung = mysqli_fetch_array($query);
		$cek = mysqli_num_rows($query);

		if ($cek == 0) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Username tidak terdaftar !
			</div>";
		} elseif ($pass <> $tampung['password']) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Password salah !
			</div>";
		} elseif ($user && $pass = $tampung['username'] && $tampung['password']) {
			$_SESSION['level'] = $tampung['level'];
			$_SESSION['id'] = $tampung['id_user'];
			$_SESSION['name'] = $tampung['nm_user'];
            if($_SESSION['level'] == "admin"){
                echo "<script>
                alert('Anda Berhasil Login !');
                document.location = 'admin/index.php';
                </script>";
            }elseif($_SESSION['level'] == "user"){
                echo "<script>
                alert('Anda Berhasil Login !');
                document.location = 'index.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Anda Gagal Login !');
            document.location = 'login.php';
            </script>";
        }
    }
?>