<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	include "../sambung.php";	
	include "session.php";
	$id = $_GET['id_barang']
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" type="image/jpg" href="../images/logo.jpg">
</head>
<body>
	<?php
		include 'header.php';
	?>
	<div id="body">
		<div id="about">
	
				<?php
					$id =$_GET['id_barang'];
					$result = mysql_query ("SELECT b.id_barang, b.id_jenis, b.nama_barang, b.harga, b.stok, b.gambar, b.keterangan 
											FROM barang b, jenis j 
											where b.id_jenis = j.id_jenis AND j.id_jenis =1 AND b.id_barang='$id'");
					
					$baris = count($result);
				
					if ($baris<1)
					{
						echo "Maaf, data tidak tersedia!";
					}

					while($cols = mysql_fetch_array($result))
					{
				?>
				<center><h3><?php echo $cols[2]; ?></h3></center>
			<table height="350" border="0" align="center">
				<tr>
					<td><center><img src="../barang/<?php echo $cols[5]; ?>" width="300" height="200"></center></td>
					
				</tr>
				<tr>
					<td><center><?php echo $cols[6] ?></center></td>
				</tr>
			</table>
			<center><a href="makanan.php"><button>Kembali</button></a></center>
			
		</div>
	</div>
	<?php
	}
		include 'footer.php';
	?>
</body>
</html>