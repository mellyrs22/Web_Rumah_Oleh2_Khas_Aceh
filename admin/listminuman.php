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
				<form method="get" action="listminuman.php">
				<center>
					<input type="text" name="cari">
					<input type="submit" name="submit" value="Cari" class="button">
				</center>
				</form>
			</center>
			<br><br>
			<h1 align="center"><b>DAFTAR MINUMAN</b></h1>
			<br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td><b>No</b></td>
					<td><b>Nama</b></td>
					<td><b>Harga</b></td>
					<td><b>Stok</b></td>
					<td><b>Nama Gambar</b></td>
					<td><b>Gambar</b></td>
					<td><b>Deskripsi</b></td>
					<td><b>Keterangan</b></td>
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
					
					$result = mysql_query("SELECT b.nama_barang, b.harga, b.stok, b.gambar, b.keterangan, b.id_barang 
										   FROM barang b, jenis j 
										   WHERE b.id_jenis = j.id_jenis AND j.id_jenis =3 LIMIT $posisi, $batas");
					$no = $posisi+1;
					while($cols = mysql_fetch_array($result))
					{
				
				echo"<tr bgcolor='#f682b1'>
					<td height='30' align='center'>" .$no."</td>
					<td>".$cols [0]."</td>
					<td>".$cols [1]."</td>
					<td>".$cols [2]."</td>
					<td>".$cols [3]."</td>
					<td>"?><img src="../barang/<?PHP echo $cols['gambar'];?>"/ width="100" height="100"></td>
					<?php
					echo"<td>".$cols [4]."</td>
					<td align='center' width='150'>
						<a href=\"editminuman.php?id=".$cols[5]."\"><button>Ubah</button></a>
						<a href=\"hapusminuman.php?id=".$cols[5]."\" title=\"delete\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
					</td>
				</tr>";
					$no++;	   
					}
					$tampil = mysql_query("SELECT b.nama_barang, b.harga, b.stok, b.gambar, b.keterangan 
										   FROM barang b, jenis j 
										   WHERE b.id_jenis = j.id_jenis AND j.id_jenis =3 GROUP BY b.nama_barang");
					$jmldata = mysql_num_rows($tampil);
					$jmlhal  = ceil($jmldata/$batas);
				
					echo"<tr>
						<td colspan='8' align=center>
						";
							
								if($halaman > 1){
									$prev=$halaman-1;
									echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev&cari= id='font'>Sebelumnya </a></span> ";
								}
								else{ 
									echo "<center><span class=disabled id='font'>Sebelumnya </span>";
								}

								// Tampilkan link halaman 1,2,3 ...
								for($i=1;$i<=$jmlhal;$i++)
								if ($i != $halaman){
									echo " <a href=$_SERVER[PHP_SELF]?halaman=$i&cari= id='font'>$i</a> ";
								}
								else{
									echo "<span class=current id='font'>$i </span>";
								}

								// Link kehalaman berikutnya (Next)
								if($halaman < $jmlhal){
									$next=$halaman+1;
									echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next&cari= id='font'> Selanjutnya</a></span>";
								}
								else{ 
									echo "<span class=disabled id='font'> Selanjutnya</span></center>";
								}
								echo "</div><p align=center id='font'>Jumlah : <b>$jmldata</b> barang</p>";
							?>
						</div>
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
				<form method="get" action="listminuman.php">
				<center>
					<input type="text" name="cari">
					<input type="submit" name="submit" value="Cari" class="button">
				</center>
				</form>
			</center>
			<br><br>
			<h1 align="center"><b>DAFTAR MINUMAN</b></h1>
			<br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td><b>No</b></td>
					<td><b>Nama</b></td>
					<td><b>Harga</b></td>
					<td><b>Stok</b></td>
					<td><b>Nama Gambar</b></td>
					<td><b>Gambar</b></td>
					<td><b>Deskripsi</b></td>
					<td><b>Keterangan</b></td>
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
					
					$result = mysql_query("SELECT b.nama_barang, b.harga, b.stok, b.gambar, b.keterangan, b.id_barang 
										   FROM barang b, jenis j 
										   WHERE b.id_jenis = j.id_jenis AND j.id_jenis =3 AND nama_barang LIKE '%$cari%' LIMIT $posisi, $batas");
					$no = $posisi+1;
					while($cols = mysql_fetch_array($result))
					{
				
				echo"<tr bgcolor='#f682b1'>
					<td height='30' align='center'>" .$no."</td>
					<td>".$cols [0]."</td>
					<td>".$cols [1]."</td>
					<td>".$cols [2]."</td>
					<td>".$cols [3]."</td>
					<td>"?><img src="../barang/<?PHP echo $cols['gambar'];?>"/ width="100" height="100"></td>
					<?php
					echo"<td>".$cols [4]."</td>
					<td align='center' width='150'>
						<a href=\"editminuman.php?id=".$cols[5]."\"><button>Ubah</button></a>
						<a href=\"hapusminuman.php?id=".$cols[5]."\" title=\"delete\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
					</td>
				</tr>";
					$no++;	   
					} ?>
						</div>
						</td>
					</tr>
			</table>
			<br><br>
			<center><a href='listminuman.php?&cari='><button>Kembali</button></center>
		</div>
	</div>
<?php } 
	include "footer.php";
?>
</body>
</html>