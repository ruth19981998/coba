<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$nama_produk = $_POST['nama_produk'];
	$keterangan = $_POST['keterangan'];
	$jumlah = $_POST['jumlah']);
	$harga = $_POST['harga'];
	

	if(empty($nama_produk) || empty($keterangan) || empty($jumlah) || empty($harga)) {
				
		if(empty($nama_produk)) {
			echo "<font color='red'>Nama Produk kosong.</font><br/>";
		}
		
		if(empty($keterangan)) {
			echo "<font color='red'>keterangan kosong.</font><br/>";
		}
		
		if(empty($jumlah)) {
			echo "<font color='red'>Email kosong.</font><br/>";
		}

		if(empty($harga)) {
			echo "<font color='red'>Harga kosong.</font><br/>";
		}
		
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		
		$result = mysqli_query($mysqli, "INSERT INTO produk(nama_produk,keterangan,jumlah,harga) VALUES('$nama_produk','$keterangan','$jumlah',$harga)");
		

		echo "alert('Data Sukses ditambahkan')";
		header("Location:index.php");

			}
}
?>
</body>
</html>
