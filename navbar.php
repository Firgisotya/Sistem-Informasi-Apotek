<?php
session_start();
include "config/koneksi.php";
error_reporting(0);

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == "user") { 
        $daftarkategori = mysqli_query($conn, "SELECT * FROM tbl_kategori");
        ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Apochecker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                    foreach ($daftarkategori as $kategori) { ?>
                        <a class="dropdown-item"
                            href="index.php?kategori=<?= $kategori['nm_kategori']; ?>"><?= $kategori['nm_kategori']; ?></a>
                        <div class="dropdown-divider"></div>
                        <?php  
                    }
                    ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Transaksi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="histori-transaksi.php">Histori Transaksi</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mr-5">
                <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['name']; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="profil-user.php">Profil</a>
                    <a class="dropdown-item" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
</nav>
<?php }  
} elseif (!isset($_SESSION['id'])) { 
    $daftarkategori = mysqli_query($conn, "SELECT * FROM tbl_kategori");
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Apotek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                    foreach ($daftarkategori as $kategori) { ?>
                        <a class="dropdown-item"
                            href="index.php?kategori=<?= $kategori['nm_kategori']; ?>"><?= $kategori['nm_kategori']; ?></a>
                        <div class="dropdown-divider"></div>
                        <?php  
                    }
                    ?>
                    </div>
                </li>
            </ul>

            <div class="dropdown mr-5">
                <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Guest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="register.php">Daftar</a>
                </div>
            </div>
        </div>
</nav>
<?php }
?>