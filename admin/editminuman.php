<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	include ("../sambung.php");
	include "session.php";
	$id = $_GET['id'];
	$result = mysql_query("SELECT b.nama_barang, b.harga, b.stok, b.gambar, b.keterangan 
						   FROM barang b, jenis j 
						   WHERE b.id_jenis = j.id_jenis AND b.id_barang ='$id'");
	$data = mysql_fetch_row($result)
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
	include "header.php";
?>
	<div id="body">
		<div id="about">
			<h3>
				<?php
					echo"<i>Welcome, ".$_SESSION['username']." </i>";
				?>
			</h3>	
			<center><h1><b>Edit Minuman</b></h1></center>
				<form id="form" action="cekeditminuman.php" method="post" enctype="multipart/form-data">
					<table id="table" width="400" align="center">
						<tr>
							<input name="id" type="hidden" value="<?php echo $id ?>">
							<td>Nama</td>
							<td>:</td>
							<td>
								<input name="nama_barang" type="text" value="<?php echo $data[0]?>">
							</td>	
						</tr>
						<tr>
							<td>Harga</td>
							<td>:</td>
							<td>
								<input name="harga" type="text" value="<?php echo $data[1]?>">
							</td>
						</tr>
						<tr>
							<td>Stok</td>
							<td>:</td>
							<td>
								<input name="stok" type="text" value="<?php echo $data[2]?>">
							</td>
						</tr>
						<tr>
							<td>Gambar</td>
							<td>:</td>
							<td>
								<input type="file" name="gambar_makanan" value="<?php echo $data[3]?>"><br><?php echo $data[3]?>
								<input type="hidden" name="gambar_lama" value="<?php echo $data[3]?>">
							</td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td>:</td>
							<td>
								<textarea name="keterangan" cols="25" rows="5"><?php echo $data[4]?></textarea>
							</td>
						</tr>
						<tr> 
							<td colspan="3" align="center">
								<input type="submit" name="save" value="Simpan" />
							</td>
						</tr>
					</table>
			</form>
		</div>
	</div>
<?php
	include "footer.php";
?> 
	</body>
</html>