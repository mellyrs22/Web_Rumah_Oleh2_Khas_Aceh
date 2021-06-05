<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	include "../sambung.php";
	include "session.php";
	$cari = $_GET ['cari'];
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" type="image/jpg" href="../images/logo.jpg">
	<script type="text/javascript">
		function sent(id)
		{
			document.location="sent.php?sent=yes&id="+id;
		}
	</script>
</head>
<body>
	<?php
		include 'header.php';
		
		if ($cari == '')
		{
	?>
	<div id="body">
		<div id="about">
		<center>
				<form method="get" action="daftarbelanja.php">
				<center>
					<input type="text" name="cari">
					<input type="submit" name="submit" value="Cari" class="button">
				</center>
				</form>
		</center>
		<h3><center>DAFTAR BELANJA</center></h3><br><br>
		<table border='1' cellspacing='0' cellpadding='5' align='center' width='500' id='tr'>
				<tr bgcolor="#f30f6a">
					<td height='30' align='center' width='30' id='tr'><b>No</b></td>
					<td height='30' align='center' id='tr'><b>Id Transaksi</b></td>
					<td height='30' align='center' id='tr'><b>Nama Barang</b></td>
					<td height='30' align='center' id='tr'><b>Nama</b></td>
					<td height='30' align='center' id='tr'><b>Tanggal</b></td>
					<td colspan='2' height='30' align='center' id='tr'><b>Status</b></td>
				</tr>
			<?php
			$batas   = 10;

		if(empty($_GET['halaman'])){
			$posisi  = 0;
			$halaman = 1;
		}
		else{
			$halaman= $_GET['halaman'];
			$posisi = ($halaman-1) * $batas;
		}
			$posisi=0;
			
			$subtotal=0;
			$result = mysql_query("SELECT k.*, c.*, b.* FROM keranjang_belanja k, customer c, barang b 
								   WHERE b.id_barang=k.id_barang 
								   AND c.id_cust=k.id_cust AND c.id_cust='$_SESSION[id_cust]' 
								   AND (k.status='waiting' OR k.status='sending' OR k.status='sent') LIMIT $posisi, $batas");
			$no=$posisi+1;					   
			while($data = mysql_fetch_assoc($result))
			{
							if($data['status'] == 'sending')
								{
									echo"
									<tr  bgcolor='#f682b1'>
										  <td height='30' align='center'>".$no."</td>
										  <td>".$data['id_transaksi']."</td>
										  <td>".$data['nama_barang']."</td>
										  <td>".$data['nama_depan']." ".$data['nama_belakang']."</td>
										  <td>".$data['tanggal']."</td>
										  <td align='center'>".$data['status']."</td>
										  <td align='center'>
											<button onclick=sent('".$data['id_transaksi']."');>Sent</button>
										  </td>
									</tr>";
									   $no++;
								}
							else 
							{
								echo"
									<tr  bgcolor='#f682b1'>
										  <td height='30' align='center'>".$no."</td>
										  <td>".$data['id_transaksi']."</td>
										  <td>".$data['nama_barang']."</td>
										  <td>".$data['nama_depan']." ".$data['nama_belakang']."</td>
										  <td>".$data['tanggal']."</td>
										  <td align='center' colspan='2'>".$data['status']."</td>
								</tr>";
								 $no++;
							}
			}
			$tampil = mysql_query("SELECT k.*, c.*, b.* FROM keranjang_belanja k, customer c, barang b 
								   WHERE b.id_barang=k.id_barang 
								   AND c.id_cust=k.id_cust AND c.id_cust='$_SESSION[id_cust]' 
								   AND (k.status='waiting' OR k.status='sending' OR k.status='sent')");
		$jmldata = mysql_num_rows($tampil);
		$jmlhal  = ceil($jmldata/$batas);
echo"

		<tr id='tr'>
		<td colspan='8' align=center>";
		// Link ke halaman sebelumnya (Prev)
		if($halaman > 1){
			$prev=$halaman-1;
			echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev>Sebelumnya </a></span> ";
		}
		else{ 
			echo "<center><span class=disabled>Sebelumnya </span>";
		}

		// Tampilkan link halaman 1,2,3 ...
		for($i=1;$i<=$jmlhal;$i++)
		if ($i != $halaman){
			echo " <a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a> ";
		}
		else{
			echo "<span class=current>$i </span>";
		}

		// Link kehalaman berikutnya (Next)
		if($halaman < $jmlhal){
			$next=$halaman+1;
			echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next> Selanjutnya</a></span>";
		}
		else{ 
			echo "<span class=disabled> Selanjutnya</span></center>";
		}
		echo "</div><p align=center id='font'>Jumlah : <b>$jmldata</b> pesanan</p>";
		?>
						</table>
		</div>
	</div>
	<?php } else { ?>
	<div id="body">
		<div id="about">
		<center>
				<form method="get" action="daftarbelanja.php">
				<center>
					<input type="text" name="cari">
					<input type="submit" name="submit" value="Cari" class="button">
				</center>
				</form>
		</center>
		<h3><center>DAFTAR BELANJA</center></h3><br><br>
		<table border='1' cellspacing='0' cellpadding='5' align='center' width='500' id='tr'>
				<tr bgcolor="#f30f6a">
					<td height='30' align='center' width='30' id='tr'><b>No</b></td>
					<td height='30' align='center' id='tr'><b>Id Transaksi</b></td>
					<td height='30' align='center' id='tr'><b>Nama Barang</b></td>
					<td height='30' align='center' id='tr'><b>Nama</b></td>
					<td height='30' align='center' id='tr'><b>Tanggal</b></td>
					<td colspan='2' height='30' align='center' id='tr'><b>Status</b></td>
				</tr>
			<?php
			$batas   = 10;

		if(empty($_GET['halaman'])){
			$posisi  = 0;
			$halaman = 1;
		}
		else{
			$halaman= $_GET['halaman'];
			$posisi = ($halaman-1) * $batas;
		}
			$posisi=0;
			
			$subtotal=0;
			$result = mysql_query("SELECT k.*, c.*, b.* FROM keranjang_belanja k, customer c, barang b 
								   WHERE b.id_barang=k.id_barang 
								   AND c.id_cust=k.id_cust AND c.id_cust='$_SESSION[id_cust]' 
								   AND (k.status='waiting' OR k.status='sending' OR k.status='sent') AND b.nama_barang LIKE '%$cari%' LIMIT $posisi, $batas");
			$no=$posisi+1;					   
			while($data = mysql_fetch_assoc($result))
			{
							if($data['status'] == 'sending')
								{
									echo"
									<tr  bgcolor='#f682b1'>
										  <td height='30' align='center'>".$no."</td>
										  <td>".$data['id_transaksi']."</td>
										  <td>".$data['nama_barang']."</td>
										  <td>".$data['nama_depan']." ".$data['nama_belakang']."</td>
										  <td>".$data['tanggal']."</td>
										  <td align='center'>".$data['status']."</td>
										  <td align='center'>
											<button onclick=sent('".$data['id_transaksi']."');>Sent</button>
										  </td>
									</tr>";
									   $no++;
								}
							else 
							{
								echo"
									<tr  bgcolor='#f682b1'>
										  <td height='30' align='center'>".$no."</td>
										  <td>".$data['id_transaksi']."</td>
										  <td>".$data['nama_barang']."</td>
										  <td>".$data['nama_depan']." ".$data['nama_belakang']."</td>
										  <td>".$data['tanggal']."</td>
										  <td align='center' colspan='2'>".$data['status']."</td>
								</tr>";
								 $no++;
							}
			} ?>
			</td>
					</tr>
			</table>
			<br><br>
			<center><a href='daftarbelanja.php?&cari='><button>Kembali</button></center>
			</div>
		</div>
	<?php }
	
		include 'footer.php';
		?>
</body>
</html>";