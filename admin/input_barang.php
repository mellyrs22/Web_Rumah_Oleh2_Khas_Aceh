<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php 
	include "../sambung.php"; 
	session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" type="image/jpg" href="../images/logo.jpg">
</head>
<body>
<?php include "header.php"; ?>
<div id="body">
			<div id="about">
			<h3>
			<?php
				echo"<i>Welcome, ".$_SESSION['username']." </i>";
			?>
			</h3>
			<h1 align="center"><b>Tambah Data</b></h1>
			<form id="form" action="cekinput.php" method="post" enctype="multipart/form-data" onSubmit='return validate()'>
			<table id="table" align="center">
				<tr>
					<td><label for="id_jenis">Jenis Barang</label></td>
					<td>:</td>
					<td>
						<select id="id_jenis" name="id_jenis">
							<option value="">--Pilih Jenis--</option>
							<?php
							$query = mysql_query("SELECT * FROM jenis ORDER BY jenis");
							while ($row = mysql_fetch_array($query)) {
							?>
							<option value="<?php echo $row['id_jenis']; ?>">
							<?php echo $row['jenis']; ?>
							</option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="nama">Nama</label></td>
					<td>:</td>
					<td><input type="text" name="nama_barang" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
					<td><label for="nama">Harga</label></td>
					<td>:</td>
					<td><input type="text" name="harga" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
					<td><label for="nama">Stok</label></td>
					<td>:</td>
					<td><input type="text" name="stok" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
				    <td><label for="gambar">Gambar</label></td>
					<td>:</td>
				    <td>
						<input type="file" name="gambar" id="gambar">
					</td>
				</tr>
				<tr>
					<td><label for="ket">Keterangan</label></td>
					<td>:</td>
					<td><textarea name="keterangan" cols="25" rows="5"></textarea></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="submit" name="kirim" id="kirim" value="">&nbsp &nbsp
						<input type="reset" name="Reset" id="reset" value=""> 
					</td>
				</tr>
			</table>
</form>	
	</div>
	</div>
</body>
	<?php include "footer.php"; ?>
</html>