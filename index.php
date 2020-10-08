<?php

require ("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id DESC"); 
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='yellow'>
		<td>Nama Produk</td>
		<td>Keterangan</td>
		<td>Jumlah</td>
		<td>Harga</td>
		<td>Aksi</td>
	</tr>
	<?php 

	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nama_produk']."</td>";
		echo "<td>".$res['keterangan']."</td>";
		echo "<td>".$res['jumlah']."</td>";	
		echo "<td>".$res['harga']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
