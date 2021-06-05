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
			<form method="get" action="pesan_noncustomer.php">
			<center>
				<input type="text" name="cari">
				<input type="submit" name="submit" value="Cari" class="button">
			</center>
			</form>
		</center>
		<br><br>
			<h1 align="center"><b>DAFTAR PESAN NON CUSTOMER</b></h1>
		<br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td><b>No</b></td>
					<td><b>Nama</b></td>
					<td><b>E-mail</b></td>
					<td><b>Topik</b></td>
					<td><b>Pesan</b></td>
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
					
					$result = mysql_query("SELECT * FROM pesan_non_customer LIMIT $posisi, $batas");
					$no = $posisi+1;
					while($data = mysql_fetch_assoc($result)){ ?>
				
				<tr bgcolor='#f682b1'>
					<td height='30' align='center'><?php echo $no ?></td>
					<td><?php echo $data['nama'] ?></td>
					<td><?php echo $data['email'] ?></td>
					<td><?php echo $data['topik'] ?></td>
					<td><?php echo $data['pesan'] ?></td>
					<td align='center'>
						<a href="hapuspesan_noncustomer.php?id=<?php echo $data['id_pesan'] ?>" title="Hapus" onclick="return confirm('Apakah Anda akan menghapus data ini?');"><button>Hapus</button></a>
					</td>
               </tr>
			   <?php
					$no++;	   
					}
					$tampil = mysql_query("SELECT * FROM pesan_non_customer GROUP BY nama");
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
								echo "</div><p align=center id='font'>Jumlah Pesan: <b>$jmldata</b></p>";
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
			<form method="get" action="pesan_noncustomer.php">
			<center>
				<input type="text" name="cari">
				<input type="submit" name="submit" value="Cari" class="button">
			</center>
			</form>
		</center>
		<br><br>
			<h1 align="center"><b>DAFTAR PESAN NON CUSTOMER</b></h1>
		<br><br>
			<table border="1" align="center" bordercolor="#ffffff" cellspacing="0" cellpadding="5" width="100%" height="100%">
				<tr bgcolor="#f30f6a" align="center">
					<td><b>No</b></td>
					<td><b>Nama</b></td>
					<td><b>E-mail</b></td>
					<td><b>Topik</b></td>
					<td><b>Pesan</b></td>
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
					
				$result = mysql_query("SELECT * FROM pesan_non_customer WHERE nama LIKE '%$cari%' LIMIT $posisi, $batas");
				$no = $posisi+1;
				while($data = mysql_fetch_assoc($result)){
							
							echo"<tr bgcolor='#f682b1'>
							  <td height='30' align='center'>".$no."</td>
							  <td>".$data['nama']."</td>
							  <td>".$data['email']."</td>
							  <td>".$data['topik']."</td>
							  <td>".$data['pesan']."</td>
							  <td align='center'>
								<a href=\"hapuspesan_noncustomer.php?id=".$data['id_pesan']."\" title=\"Hapus\" onclick=\"return confirm('Apakah Anda akan menghapus data ini?');\"><button>Hapus</button></a>
							  </td>
						   </tr>";
								$no++;	   
								}?>
						</td>
					</tr>
			</table>
		
			<br><br>
			<center><a href='pesan_noncustomer.php?&cari='><button>Kembali</button></center>
			</div>
	</div>		
<?php }  
	include 'footer.php';
?>
</body>
</html>