<?php
	include "../config/koneksi.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];

    } else{
        echo "<script>
        alert('ID belum di pilih');
        document.location = 'fuzzy.php';
        </script>";
    }
    
    $query = mysqli_query($conn,"SELECT * FROM fuzzy where id_fuzzy = '$id'");
   while($dt1 = mysqli_fetch_array($query)){
    $pm = $dt1['permintaan'];
    $ps = $dt1['persediaan'];
    $pr = $dt1['produksi'];
   }

    if($pm == "BANYAK" && $ps == "BANYAK" && $pr == "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}
	elseif($pm == "BANYAK" && $ps == "BANYAK" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "BANYAK" && $ps == "BANYAK" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}


	elseif($pm == "BANYAK" && $ps == "SEDANG" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}


	elseif($pm == "BANYAK" && $ps == "SEDANG" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT TETAP";
	}
	

	elseif($pm == "BANYAK" && $ps == "SEDANG" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}


	elseif($pm == "BANYAK" && $ps == "SEDIKIT" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}


	elseif($pm == "BANYAK" && $ps == "SEDIKIT" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT TETAP";
	}


	elseif($pm == "BANYAK" && $ps == "SEDIKIT" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}


	elseif($pm == "SEDANG" && $ps == "BANYAK" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT TETAP";
	}


	elseif($pm == "SEDANG" && $ps == "BANYAK" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDANG" && $ps == "BANYAK" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDANG" && $ps == "SEDANG" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDANG" && $ps == "SEDANG" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDANG" && $ps == "SEDANG" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDANG" && $ps == "SEDIKIT" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDANG" && $ps == "SEDIKIT" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDANG" && $ps == "SEDIKIT" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDIKIT" && $ps == "BANYAK" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDIKIT" && $ps == "BANYAK" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDIKIT" && $ps == "BANYAK" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDIKIT" && $ps == "SEDANG" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDIKIT" && $ps == "SEDANG" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDIKIT" && $ps == "SEDANG" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}

	elseif($pm == "SEDIKIT" && $ps == "SEDIKIT" && $pr== "BANYAK")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDIKIT" && $ps == "SEDIKIT" && $pr== "SEDANG")
	{
		$hasil = "STOK OBAT DITAMBAH";
	}

	elseif($pm == "SEDIKIT" && $ps == "SEDIKIT" && $pr== "SEDIKIT")
	{
		$hasil = "STOK OBAT TETAP";
	}

    $proses = mysqli_query($conn, "UPDATE fuzzy SET keterangan = '$hasil' WHERE id_fuzzy = '$id'");
    if($proses){
        echo "<script>
        alert('Proses Fuzzy berhasil dijalankan');
        document.location = 'fuzzy.php';
        </script>";
    }else{
        echo "<script>
        alert('Proses Fuzzy gagal dijalankan');
        document.location = 'fuzzy.php';
        </script>";
    }


    
?>