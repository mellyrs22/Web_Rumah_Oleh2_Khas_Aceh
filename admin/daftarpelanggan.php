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
		include 'header.php';
	
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
			<form method="get" action="daftarpelanggan.php">
			<center>
				<input type="text" name="cari">
				<input type="submit" name="submit" value="Cari" class="button">
			</center>
			</form>
		</center>
		<br><br>
			<h1 align="center"><b>DAFTAR PELANGGAN</b></h1>
		<br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td><b>No</b></td>
					<td><b>Nama Lengkap</b></td>
					<td><b>Jenis Kelamin</b></td>
					<td><b>Username</b></td>
					<td><b>E-mail</b></td>
					<td><b>Alamat Lengkap</b></td>
					<td><b>Kode Pos</b></td>
					<td><b>No HP</b></td>
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
		
    $result = mysql_query("SELECT c.nama_depan, c.nama_belakang, c.sex, c.username, c.email, c.alamat, kc.nama_kec, k.nama_kokab, p.nama_prov, c.kode_pos, c.nohp, c.id_cust 
						   FROM customer c, kecamatan kc, kokab k, provinsi p
						   WHERE c.id_kec = kc.id_kec AND k.id_kota = kc.id_kota AND p.id_prov = k.id_prov LIMIT $posisi, $batas");
    $no = $posisi+1;
    while($data = mysql_fetch_assoc($result)){ ?>
				
				<tr bgcolor='#f682b1'>
					<td height='30' align='center'><?php echo $no ?></td>
					<td><?php echo $data['nama_depan']." ".$data['nama_belakang'] ?></td>
					<td><?php echo $data['sex'] ?></td>
					<td><?php echo $data['username'] ?></td>
					<td><?php echo $data['email'] ?></td>
					<td><?php echo $data['alamat'].", Kec. ".$data['nama_kec'].", ".$data['nama_kokab'].", Provinsi ".$data['nama_prov'] ?></td>
					<td><?php echo $data['kode_pos'] ?></td>
					<td><?php echo $data['nohp'] ?></td>
					<td align='center'>
						<a href="hapuscustomer.php?id=<?php echo $data['id_cust'] ?>" title="Hapus" onclick="return confirm('Apakah Anda akan menghapus data ini?');"><button>Hapus</button></a>
					</td>
               </tr>
			   <?php
					$no++;	   
					}
					$tampil = mysql_query("SELECT c.nama_depan, c.nama_belakang, c.sex, c.username, c.email, c.alamat, kc.nama_kec, k.nama_kokab, p.nama_prov, c.kode_pos, c.nohp, c.id_cust 
										   FROM customer c, kecamatan kc, kokab k, provinsi p
										   WHERE c.id_kec = kc.id_kec AND k.id_kota = kc.id_kota AND p.id_prov = k.id_prov GROUP BY c.nama_depan");
					$jmldata = mysql_num_rows($tampil);
					$jmlhal  = ceil($jmldata/$batas);
				
					echo"<tr>
						<td colspan='9' align=center>
						";
							
								if($halaman > 1){
									$prev=$halaman-1;
									echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev id='font'>Sebelumnya </a></span> ";
								}
								else{ 
									echo "<center><span class=disabled id='font'>Sebelumnya </span>";
								}

								// Tampilkan link halaman 1,2,3 ...
								for($i=1;$i<=$jmlhal;$i++)
								if ($i != $halaman){
									echo " <a href=$_SERVER[PHP_SELF]?halaman=$i id='font'>$i</a> ";
								}
								else{
									echo "<span class=current id='font'>$i </span>";
								}

								// Link kehalaman berikutnya (Next)
								if($halaman < $jmlhal){
									$next=$halaman+1;
									echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next id='font'> Selanjutnya</a></span>";
								}
								else{ 
									echo "<span class=disabled id='font'> Selanjutnya</span></center>";
								}
								echo "</div><p align=center id='font'>Jumlah Pelanggan: <b>$jmldata</b> orang</p>";
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
			<form method="get" action="daftarpelanggan.php">
			<center>
				<input type="text" name="cari">
				<input type="submit" name="submit" value="Cari" class="button">
			</center>
			</form>
		</center>
		<br><br>
			<h1 align="center"><b>DAFTAR PELANGGAN</b></h1>
		<br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td><b>No</b></td>
					<td><b>Nama Lengkap</b></td>
					<td><b>Jenis Kelamin</b></td>
					<td><b>Username</b></td>
					<td><b>E-mail</b></td>
					<td><b>Alamat Lengkap</b></td>
					<td><b>Kode Pos</b></td>
					<td><b>No HP</b></td>
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
					
				$result = mysql_query("SELECT c.nama_depan, c.nama_belakang, c.sex, c.username, c.email, c.alamat, kc.nama_kec, k.nama_kokab, p.nama_prov, c.kode_pos, c.nohp, c.id_cust 
									   FROM customer c, kecamatan kc, kokab k, provinsi p
									   WHERE c.id_kec = kc.id_kec AND k.id_kota = kc.id_kota AND p.id_prov = k.id_prov AND c.nama_depan LIKE '%$cari%' LIMIT $posisi, $batas");
				$no = $posisi+1;
				while($data = mysql_fetch_assoc($result)){
							
							echo"<tr bgcolor='#f682b1'>
							  <td height='30' align='center'>".$no."</td>
							  <td>".$data['nama_depan']." ".$data['nama_belakang']."</td>
							  <td>".$data['sex']."</td>
							  <td>".$data['username']."</td>
							  <td>".$data['email']."</td>
							  <td>".$data['alamat'].", Kec. ".$data['nama_kec'].", ".$data['nama_kokab'].", Provinsi ".$data['nama_prov']."</td>
							  <td>".$data['kode_pos']."</td>
							  <td>".$data['nohp']."</td>
							  <td align='center'>
								<a href=\"hapuscustomer.php?id=".$data['id_cust']."\" title=\"Hapus\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
							  </td>
						   </tr>";
								$no++;	   
								}?>
						</td>
					</tr>
			</table>
		
			<br><br>
			<center><a href='daftarpelanggan.php?&cari='><button>Kembali</button></center>
			</div>
	</div>		
<?php }  
	include 'footer.php';
?>
</body>
</html>