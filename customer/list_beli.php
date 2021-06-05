<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	include "../sambung.php";
	include "session.php";
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
		<div id="content">
		<table border="1" cellpadding="5" cellspacing="0" width="95%">
						<tr align="center">
							<td>Gambar</td>
							<td><b>Nama Barang</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Sub Total</b></td>
						</tr>
	<?php
	//$id= $_GET['id_transaksi'];
		$keranjang = mysql_query("select k.*, b.*
								  from keranjang_belanja k natural join barang b 
								  where k.id_cust='$_SESSION[id_cust]' AND k.status='pending'");
						
						$subtotal = 0;
						
						while($k = mysql_fetch_array($keranjang))
						{
							echo "<tr  align='center'>
										<td class=keranjang id='tr'><img src='../barang/".$k['gambar']."' width='100'></td>
										<td class=keranjang id='tr'>".$k['nama_barang']."</td>";
							echo "<td class=keranjang>
							<form action='updatejumlah.php' method='get'>
							<input type='text' size=1 value='".$k['jumlah']."' name='jumlah'>
							<input type='hidden' name='id_cust' value='".$k['id_cust']."' />
							<input type='hidden' name='id_barang' value='".$k['id_barang']."' />
							<input type='hidden' name='id' value='".$k['id_transaksi']."' />
							<input type='submit' value='Tambah'/>
							</form>
							<span id=\"loading".$k['id_transaksi']."\"></span></td>
							
							<td class=keranjang>Rp. <span id=\"harga".$k['id_transaksi']."\">".$k['harga_barang']."</span>&nbsp;<a href='delete.php?id=".$k['id_transaksi']."'  title='delete'><img src=../images/delete.jpg border=0></td></tr>";
							$subtotal = $subtotal + $k['harga_barang'];
						}
						
						echo "<tr><td colspan=3 align=right><b>Total</b> &nbsp;</td>
						<td align='center'>
						<b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>
						<tr>
							<td colspan=5 align='center'>
								<a href='index.php'><input name='buy' type='submit' id='buy' value=' Lanjut Belanja '></a> &nbsp
								<a href='finish.php'><input name='finish' type='submit' id='finish' value=' Selesai Belanja '></a>
							</td>
						</tr>
		
		</table>";?>
		</div>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>