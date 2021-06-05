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
		<div id="about">
		<?php
			//$id = $_GET['id'];
			//$idtransaksi=$_GET['idtransaksi'];
				
			$baju = mysql_query("SELECT c.*, k.*, kb.*, p.* FROM customer c, kecamatan k, kokab kb, provinsi p 
								 WHERE c.id_cust='$_SESSION[id_cust]' AND k.id_kec=c.id_kec AND k.id_kota=kb.id_kota AND kb.id_prov=p.id_prov");
				
			$baris = count($baju);
				
			if ($baris<1)
			{
				echo "maaf. tidak ada.";
			}

			while($b = mysql_fetch_array($baju))
			{
				echo"
					<h3><center>ALAMAT</center></h3>
							<table border='1' cellspacing='0' cellpadding='5' height='250' align='center'>
								<tr>
									<td id='tr'><b>Nama</b></td>
									<td id='tr'>:<td>
									<td id='tr'>$b[nama_depan] $b[nama_belakang]</td>
								</tr>
								<tr>
									<td id='tr'><b>Alamat</b></td>
									<td id='tr'>:<td>
									<td id='tr'>$b[alamat]</td>
								</tr>
								<tr>
									<td id='tr'><b>Kecamatan</b></td>
									<td id='tr'>:<td>
									<td id='tr'>".$_GET['nama_kec']."</td>
								</tr>
								<tr>
									<td id='tr'><b>Kota</b></td>
									<td id='tr'>:<td>
									<td id='tr'>$b[nama_kokab]</td>
								</tr>
								<tr>
									<td id='tr'><b>Provinsi</b></td>
									<td id='tr'>:<td>
									<td id='tr'>$b[nama_prov]</td>
								</tr>
								<tr>
									<td id='tr'><b>Kode Pos</b></td>
									<td id='tr'>:<td>
									<td id='tr'>$b[kode_pos]</td>
								</tr>
								<tr>
									<td  id='tr'><b>No HP</b></td>
									<td  id='tr'>:<td>
									<td id='tr'>$b[nohp]</td>
								</tr>
				</table>";
			}
						?>
						<br><br><br><br><br>
				<h3><center>DATA PESANAN</center></h3>
				<table border='1' cellspacing='0' cellpadding='5' align='center' width='500'>
				<tr>
					<td height='30' align='center' id='tr' width='30'><b>No</b></td>
					<td height='30' align='center' id='tr' width='50'><b>Gambar</b></td>
					<td height='30' align='center'  id='tr'><b>Nama Barang</b></td>
					<td align='center'  id='tr' width='50'><b>Jumlah</b></td>
					<td align='center'  id='tr' width='120'><b>Harga</b></td>
				</tr>
			<?php
			$posisi=0;
			$no=$posisi+1;
			$subtotal=0;
			$result = mysql_query("SELECT k.*, c.*, b.* FROM keranjang_belanja k, customer c, barang b WHERE b.id_barang=k.id_barang 
								   AND c.id_cust=k.id_cust AND c.id_cust='$_SESSION[id_cust]' AND k.status='waiting'");
			while($data = mysql_fetch_assoc($result))
			{
								echo"
								<tr>
									  <td height='30'  id='tr' align='center'>".$no."</td>
									  <td id='tr' align='center'><img src='../barang/".$data['gambar']."' width='30' height='40'></td>
									  <td id='tr'>".$data['nama_barang']."</td>
									  <td id='tr'>".$data['jumlah']."</td>
									  <td id='tr'>Rp. ".$data['harga_barang']."</td>
								</tr>";
								   $no++;
								   $subtotal = $subtotal + $data['harga_barang'];
			}
							echo"
							<tr>
									<td colspan='4' align='right' id='tr'>
										<b>Total :</b>
									</td>
									<td id='tr'>
										<b>Rp. $subtotal</b>
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