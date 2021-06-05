<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php include ("../sambung.php"); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" type="image/jpg" href="../images/logo.jpg">  
</head>
<body>
	<div id="header">
		<div>
			<div>
				<ul>
					<li class="current">
						<a href="../index.php">Beranda</a>
					</li>
					<li>
						<a href="../about.php">Tentang Kami</a>
					</li>
				</ul>
				<a href="../index.php" id="logo"><img src="../images/logo1.png" alt="Image"></a>
				<ul>
					<li>
						<a href="../contact.php">Kontak Kami</a>
					</li>
					<li>
						<a href="../customer/signup.php">Daftar</a>
					</li>
				</ul>
			</div>
		</div>
		<div>
			<ul>
				<li>
					<a href="../makanan.php">Makanan Utama</a>
				</li>
				<li>
					<a href="../snack.php">Makanan Ringan</a>
				</li>
				<li>
					<a href="../minuman.php">Minuman</a>
				</li>
				<li>
					<a href="../lainlain.php">Lain-Lain</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<form id="form" action="ceksignup.php" method="post" id="contoh">
			<table id="table" align="center" width="450" height="500">
				<tr>
					<td width="200"><label for="nama">Nama Depan</label></td>
					<td>:</td>
					<td><input type="text" id="nama_depan" name="nama_depan" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
					<td width="160"><label for="nama">Nama Belakang</label></td>
					<td>:</td>
					<td><input type="text" id="nama_belakang" name="nama_belakang" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
					<td width="160"><label for="jk">Jenis Kelamin</label></td>
					<td>:</td>
					<td>
						<input type="radio" name="jk" value="L" class="validate(required)">L &nbsp &nbsp
						<input type="radio" name="jk" value="P" class="validate(required)">P
					</td>
				</tr>
				<tr>
				    <td><label for="username">Username</label></td>
					<td>:</td>
				    <td><input type="text" id="username" name="user" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
					<td><label for="password">Password</label></td>
				    <td>:</td>
					<td ><input type="password" id="pass" name="pass" class="validate(required, minlength(5))" size="24"/></td>
				</tr>
				<tr>
					<td><label for="cpassword">Ulangi Password</label></td>
					<td>:</td>
					<td><input type="password" id="cpass" class="validate(required, match(#pass))" size="24"/></td>
				</tr>
				<tr>
					<td><label for="email">E-mail</label></td>
					<td>:</td>
					<td><input type="text" id="email" name="email" class="validate(required, email)" size="24"/></td>
				</tr>
				<tr>
					<td width="160"><label for="nama">Alamat</label></td>
					<td>:</td>
					<td><input type="text" id="nama" name="alamat" class="validate(required)" size="24"/></td>
				</tr>
				<tr>
					<td width="160"><label for="nama">Provinsi</label></td>
					<td>:</td>
					<td>
						<select id="provinsi" name="provinsi">
							<option value="">--Pilih Provinsi--</option>
							<?php
							$query = mysql_query("SELECT * FROM provinsi ORDER BY nama_prov");
							while ($row = mysql_fetch_array($query)) {
							?>
							<option value="<?php echo $row['id_prov']; ?>">
							<?php echo $row['nama_prov']; ?>
							</option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="160"><label for="nama">Kota</label></td>
					<td>:</td>
					<td>
						<select id="kota" name="kota">
							<option value="">--Pilih Kota/Kab--</option>
							<?php
							$query = mysql_query("SELECT * FROM kokab k INNER JOIN provinsi p ON k.id_prov = p.id_prov ORDER BY k.nama_kokab");
							while ($row = mysql_fetch_array($query)) {
							?>
							<option id="kota" class="<?php echo $row['id_prov']; ?>" value="<?php echo $row['id_kota']; ?>">
								<?php echo $row['nama_kokab']; ?>
							</option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="160"><label for="nama">Kecamatan</label></td>
					<td>:</td>
					<td>
						<select id="kecamatan" name="kecamatan">
							<option value="">--Pilih Kecamatan--</option>
							<?php
							$query = mysql_query("SELECT * FROM	kecamatan k INNER JOIN kokab ko ON k.id_kota = ko.id_kota ORDER BY nama_kec");
							while ($row = mysql_fetch_array($query)) {
							?>
								<option id="kecamatan" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['id_kec']; ?>">
									<?php echo $row['nama_kec']; ?>
								</option>
							<?php
							}
							?>
					</select>
					</td>
				</tr>
				<tr>
					<td width="160"><label for="nama">Kode Pos</label></td>
					<td>:</td>
					<td><input type="text" id="nama" name="kode_pos" class="validate(required, number)" size="24"/></td>
				</tr>
				<tr>
					<td width="160"><label for="nama">No HP</label></td>
					<td>:</td>
					<td><input type="text" id="nama" name="nohp" class="validate(required, number)" size="24"/></td>
				</tr>
				<tr>
					<td><label for="secret_question">Pertanyaan Rahasia</label></td>
					<td>:</td>
					<td>
						<select name="question" maxlength="40">
								<option>--Pilih Pertanyaan Rahasia--</option>
								<?php
									$sql="SELECT * FROM question GROUP BY question";
									$hasil_query=mysql_query($sql);
									While($baris=mysql_fetch_array($hasil_query))
									{			
										echo "<option value=".$baris[0].">".$baris[1]."</option>";
									}
								?>
					</td>
				</tr>
				<tr>
					<td><label for="answer">Jawaban</label></td>
					<td>:</td>
					<td><input type="text" id="answer" name="jawab" class="validate(required)" size="24"/></td>
				</tr>
				<tr height="13px"></tr>
				<tr>
					<td align="center" colspan="3">
						<input type="submit" name="kirim" id="kirim" value="">&nbsp &nbsp
						<input type="reset" name="Reset" id="reset" value=""> 
					</td>
				</tr>
			</table>	
		</form>	
		<script src="../jquery/jquery-1.10.2.min.js"></script>
        <script src="../jquery/jquery.chained.min.js"></script>
        <script>
            $("#kota").chained("#provinsi");
            $("#kecamatan").chained("#kota");
        </script>
	</div>
	<?php
		include '../footer.php';
	?>
</body>
</html>