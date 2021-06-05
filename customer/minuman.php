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
		<ul class="gallery">
				<?php
					$result = mysql_query ("SELECT b.gambar, b.nama_barang, b.id_barang 
											FROM barang b, jenis j 
											WHERE b.id_jenis = j.id_jenis AND j.id_jenis =3 GROUP BY b.nama_barang");
					
					while ($cols = mysql_fetch_array($result)) {
				?>
			
				<li>
					<a href="listcompleteminuman.php?id_barang=<?php echo $cols[2] ?>" class="figure">
					<img src="../barang/<?php echo $cols [0] ?>" alt="" width="240" height="196">
					<br><?php echo $cols [1] ?><br><br>
					</a>
				</li>
				<?php }; ?>
				<li>
				</li>
			</ul>
		</div>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>