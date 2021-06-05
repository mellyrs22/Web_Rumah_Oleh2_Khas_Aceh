<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	include ("../sambung.php");
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
			document.location="sending.php?sent=yes&id="+id;
		}
	</script>
</head>
<body>	
	<?php
		include "header.php";
		
		if ($cari == '')
		{
	?>
	<div id="body">
		<div id="about">
			<h3>
				<?php
					echo"<i>Welcome, ".$_SESSION['username']." </i>";
				?>
			</h3> 
			<center>
				<form method="get" action="listpemesanan.php">
				<center>
					<input type="text" name="cari">
					<input type="submit" name="submit" value="Cari" class="button">
				</center>
				</form>
			</center>
			<br><br>
			<h1 align="center"><b>DAFTAR PESANAN</b></h1> <br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td height='30' align='center'><b>No</b></td>
					<td height='30' align='center' width='100'><b>Id Transaksi</b></td>
					<td align='center'><b>Nama</b></td>
					<td align='center'><b>Nama Barang</b></td>
					<td align='center'><b>Tanggal</b></td>
					<td align='center' width='70' colspan='2'><b>Status</b></td>
					<td align='center' width='50'><b>Keterangan</b></td>
				</tr>
	<?php
	include('../sambung.php');
		$batas   = 10;

		if(empty($_GET['halaman'])){
			$posisi  = 0;
			$halaman = 1;
		}
		else{
			$halaman= $_GET['halaman'];
			$posisi = ($halaman-1) * $batas;
		}
		
    $result = mysql_query("SELECT k.*, b.nama_barang, c.*
						   FROM keranjang_belanja k, barang b, customer c
						   WHERE k.id_cust=c.id_cust AND k.id_barang=b.id_barang 
						   AND (k.status='pending' OR k.status='waiting' OR k.status='sending' OR k.status='sent') LIMIT $posisi, $batas");
    $no = $posisi+1;
    while($data = mysql_fetch_assoc($result))
	{
		if($data['status'] == 'waiting')
		{
			echo "<tr bgcolor='#f682b1'>
                  <td height='30' id='tr' align='center'>".$no."</td>
                  <td id='tr'>".$data['id_transaksi']."</td>
				  <td id='tr'>".$data['nama_depan']." ".$data['nama_belakang']."</td>
				  <td id='tr'>".$data['nama_barang']."</td>
                  <td id='tr' align='center'>".$data['tanggal']."</td>
				  <td id='tr' align='center'>".$data['status']."</td>
				  <td id='tr' align='center'>
						<button onclick=sent('".$data['id_transaksi']."');>Send</button>
				  </td>
				  <td align='center' id='tr' width='150'>
					<a href=\"hapuspemesanan.php?id=".$data['id_transaksi']."\" title=\"delete\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
				  </td>
               </tr>";
			   $no++;
		}
		else
		{
			echo "<tr  bgcolor='#f682b1'>
                  <td height='30' id='tr' align='center'>".$no."</td>
                  <td id='tr'>".$data['id_transaksi']."</td>
				  <td id='tr'>".$data['nama_depan']." ".$data['nama_belakang']."</td>
				  <td id='tr'>".$data['nama_barang']."</td>
                  <td id='tr' align='center'>".$data['tanggal']."</td>
				  <td id='tr' colspan='2' align='center'>".$data['status']."</td>
				  <td align='center' id='tr' width='150'>
					<a href=\"hapuspemesanan.php?id=".$data['id_transaksi']."\" title=\"delete\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
				  </td>
				  </tr>";
			   $no++;
		}			
			
    }
	$tampil = mysql_query("SELECT k.*, b.nama_barang, c.*
						   FROM keranjang_belanja k, barang b, customer c
						   WHERE k.id_cust=c.id_cust AND k.id_barang=b.id_barang 
						   AND (k.status='pending' OR k.status='waiting' OR k.status='sending' OR k.status='sent')");
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
						</td>
					</tr>
			</table>
		</div>
	</div>
	<?php } else { ?>
	<div id="body">
		<div id="about">
			<h3>
				<?php
					echo"<i>Welcome, ".$_SESSION['username']." </i>";
				?>
			</h3> 
			<center>
				<form method="get" action="listpemesanan.php">
				<center>
					<input type="text" name="cari">
					<input type="submit" name="submit" value="Cari" class="button">
				</center>
				</form>
			</center>
			<br><br>
			<h1 align="center"><b>DAFTAR PESANAN</b></h1> <br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td height='30' align='center'><b>No</b></td>
					<td height='30' align='center' width='100'><b>Id Transaksi</b></td>
					<td align='center'><b>Nama</b></td>
					<td align='center'><b>Nama Barang</b></td>
					<td align='center'><b>Tanggal</b></td>
					<td align='center' width='70' colspan='2'><b>Status</b></td>
					<td align='center' width='50'><b>Keterangan</b></td>
				</tr>
	<?php
	include('../sambung.php');
		$batas   = 10;

		if(empty($_GET['halaman'])){
			$posisi  = 0;
			$halaman = 1;
		}
		else{
			$halaman= $_GET['halaman'];
			$posisi = ($halaman-1) * $batas;
		}
		
    $result = mysql_query("SELECT k.*, b.nama_barang, c.*
						   FROM keranjang_belanja k, barang b, customer c
						   WHERE k.id_cust=c.id_cust AND k.id_barang=b.id_barang 
						   AND (k.status='pending' OR k.status='waiting' OR k.status='sending' OR k.status='sent') AND c.nama_depan LIKE '%$cari%'");
    $no = $posisi+1;
    while($data = mysql_fetch_assoc($result))
	{
		if($data['status'] == 'waiting')
		{
			echo "<tr bgcolor='#f682b1'>
                  <td height='30' id='tr' align='center'>".$no."</td>
                  <td id='tr'>".$data['id_transaksi']."</td>
				  <td id='tr'>".$data['nama_depan']." ".$data['nama_belakang']."</td>
				  <td id='tr'>".$data['nama_barang']."</td>
                  <td id='tr' align='center'>".$data['tanggal']."</td>
				  <td id='tr' align='center'>".$data['status']."</td>
				  <td id='tr' align='center'>
						<button onclick=sent('".$data['id_transaksi']."');>Send</button>
				  </td>
				  <td align='center' id='tr' width='150'>
					<a href=\"hapuspemesanan.php?id=".$data['id_transaksi']."\" title=\"delete\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
				  </td>
               </tr>";
			   $no++;
		}
		else
		{
			echo "<tr  bgcolor='#f682b1'>
                  <td height='30' id='tr' align='center'>".$no."</td>
                  <td id='tr'>".$data['id_transaksi']."</td>
				  <td id='tr'>".$data['nama_depan']." ".$data['nama_belakang']."</td>
				  <td id='tr'>".$data['nama_barang']."</td>
                  <td id='tr' align='center'>".$data['tanggal']."</td>
				  <td id='tr' colspan='2' align='center'>".$data['status']."</td>
				  <td align='center' id='tr' width='150'>
					<a href=\"hapuspemesanan.php?id=".$data['id_transaksi']."\" title=\"delete\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
				  </td>
				  </tr>";
			   $no++;
		}			
			
    } ?>
					</td>
				</tr>
			</table>
			<br><br>
			<center><a href='listpemesanan.php?&cari='><button>Kembali</button></center>
		</div>
	</div>
	
<?php }
	include 'footer.php';
?>
</body>
</html>