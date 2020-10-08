<?php

include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['nama_produk']);
	$age = mysqli_real_escape_string($mysqli, $_POST['keterangan']);
	$email = mysqli_real_escape_string($mysqli, $_POST['jumlah']);	
	$email = mysqli_real_escape_string($mysqli, $_POST['harga']);

	if(empty($nama_produk) || empty($keterangan) || empty($jumlah) || empty($harga)) {	
			
		if(empty($nama_produk)) {
			echo "<font color='red'>Nama Produk kosong.</font><br/>";
		}
		
		if(empty($keterangan)) {
			echo "<font color='red'>Keterangan kosong.</font><br/>";
		}
		
		if(empty($jumlah)) {
			echo "<font color='red'>Jumlah barang kosong.</font><br/>";
		}	
		if(empty($harga)) {
			echo "<font color='red'>Harga Barang kosong.</font><br/>";
		}		
	} else {	
		
		$result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama_produk',keterangan='$keterangan',
			jumlah='$jumlah',harga='$harga' WHERE id=$id");
		

		header("Location: index.php");
	}
}
?>

<?php

$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nama_produk = $res['nama_produk'];
	$keterangan = $res['keterangan'];
	$jumlah = $res['jumlah'];
	$harga = $res['harga'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk" value="<?php echo $nama_produk;?>"></td>
			</tr>
			<tr> 
				<td>Keterangan</td>
				<td><input type="text" name="keterangan" value="<?php echo $keterangan;?>"></td>
			</tr>
			<tr> 
				<td>Jumlah</td>
				<td><input type="text" name="jumlah" value="<?php echo $jumlah;?>"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value="<?php echo $harga;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
