<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/jpg" href="images/logo.jpg">
</head>
<body>
	<?php 
		include 'header.php';
	?>
	
		<div id="body">
		<div id="contact">
			<div>
				<div class="section">
					<ul>
						<li>
							<span>Lokasi</span> 
							Jl. Soekarno Hatta, Lr. Tgk. Meunara III, No. 1. Kec. Jaya Baru, Banda Aceh.
						</li>
						<li>
							<span>E-mail</span> rumaholeholeh.khasaceh@yahoo.com
						</li>
						<li>
							<span>Telepon</span> (0651) 75896522 ; 
						</li>
						<li>
							<span>LINE</span> @rumaholeholeh
						</li>
					</ul>
				</div>
				<div class="figure">
					<div>
						<img src="images/penjual.jpg" alt="" width="334" height="239" >
					</div>
				</div>
			</div>
			<form action="cekpesan.php" method="post" enctype="multipart/form-data" onSubmit='return validate()'>
				<span>Kirim Pesan</span>
				<div class="information">
					<label for="nama">Nama:</label>
					<input type="text" name="nama" id="nama" class="validate(required)">
					<label for="email">E-mail:</label>
					<input type="text" name="email" id="email" class="validate(required)">
					<label for="topik">Topik:</label>
					<input type="text" name="topik" id="topik" class="validate(required)">
				</div>
				<div>
					<label for="pesan">Pesan:</label>
					<textarea name="pesan" id="pesan" class="validate(required)"></textarea>
					<input type="submit" name="send" id="send" value="">
				</div>
			</form>
		</div>
	</div>
	
	<?php
		include 'footer.php';
	?>	
</html>