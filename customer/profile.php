<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	include "../sambung.php";
	include "session.php";
	$id = $_GET['id'];
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
		<h3 align="center">PROFILE</h3>
			<form id="form" action="cekedit_profile.php" method="post">
			<?php
			$query = mysql_query("select c.*, p.*, k.*, kb.* from customer c, provinsi p, kokab kb, kecamatan k 
						  where  c.id_kec = k.id_kec AND p.id_prov=kb.id_prov AND kb.id_kota=k.id_kota AND c.id_cust='$id'");
			while($data = mysql_fetch_assoc($query))
			{
				echo"<table align='center' width='500' valign='middle'>
					<tr>
						<td>Nama Depan
						</td>
						<td>:
						</td>
						<td>
							<input name='id' type='hidden' size='26' value='".$id."'/>
							<input name='nama_depan' type='text' size='26' value='".$data['nama_depan']."'/>
						</td>
					</tr>
					<tr>
						<td>Nama Belakang
						</td>
						<td>:
						</td>
						<td>
							<input name='nama_belakang' type='text' size='26' value='".$data['nama_belakang']."'/>
						</td>
					</tr>
					<tr>
						<td>Username
						</td>
						<td>:
						</td>
						<td>
							".$data['username']."
						</td>
					</tr>
					<tr>
						<td>Password
						</td>
						<td>:
						</td>
						<td>
							<input name='password' type='password' size='26' value='".$data['password']."'/>
						</td>
					</tr>
					<tr>
						<td>Email
						</td>
						<td id='tr'>:
						</td>
						<td id='tr'>
							<input name='email' type='text' size='26' value='".$data['email']."'/>
						</td>
					</tr>
					<tr>
						<td>Alamat
						</td>
						<td>:
						</td>
						<td>
							<input name='alamat' type='text' size='26' value='".$data['alamat']."'/>
						</td>
					</tr>
					<tr>
						<td>Provinsi
						</td>
						<td>:
						</td>
						<td>
							<select id='provinsi' name='provinsi' maxlength='20'>
								<option value='".$_GET['idprov']."'>".$_GET['namaprov']."</option>";										
									$sql="SELECT * FROM provinsi ORDER BY nama_prov";
									$hasil_query=mysql_query($sql);
									While($baris=mysql_fetch_array($hasil_query))
									{			
										echo "<option value=".$baris[0].">".$baris[1]."</option>";
									}
								
								echo"
						</td>
					</tr>
					<tr>
						<td>Kota
						</td>
						<td>:
						</td>
						<td>
							<select id='kokab' name='kokab' maxlength='20'>
								<option value='".$_GET['idkota']."'>".$_GET['namakokab']."</option>";															
									$sql="SELECT * FROM kokab k INNER JOIN provinsi p ON k.id_prov = p.id_prov ORDER BY k.nama_kokab";
									$hasil_query=mysql_query($sql);
									While($baris=mysql_fetch_array($hasil_query))
									{			
										echo "<option id='kota' class=".$baris['id_prov']." value=".$baris['id_kota'].">".$baris['nama_kokab']."</option>";
									}
								
								echo"
						</td>
					</tr>
					<tr>
						<td>Kecamatan
						</td>
						<td>:
						</td>
						<td>
							<select id='kecamatan' name='kecamatan' maxlength='20'>
								<option value='".$_GET['idkec']."'>".$_GET['namakec']."</option>";
								
									include ('../sambung.php');
									
									$sql="SELECT * FROM	kecamatan k INNER JOIN kokab ko ON k.id_kota = ko.id_kota ORDER BY nama_kec";
									$hasil_query=mysql_query($sql);
									While($baris=mysql_fetch_array($hasil_query))
									{			
										echo "<option id='kota' class=".$baris['id_kota']." value=".$baris['id_kec'].">".$baris['nama_kec']."</option>";
									}
								
								echo"
						</td>
					</tr>
					<tr>
						<td id='tr'>Kode Pos
						</td>
						<td id='tr'>:
						</td>
						<td id='tr'>
							<input name='kode_pos' type='text' size='26' value='".$data['kode_pos']."'/>
						</td>
					</tr>
					<tr>
						<td id='tr'>No HP
						</td>
						<td id='tr'>:
						</td>
						<td id='tr'>
							<input name='nohp' type='text' size='26' value='".$data['nohp']."'/>
						</td>
					</tr>
					<tr width='25'> 
						  <td colspan='3' align='center'>
							<input type='submit' name='save' value='Simpan' />
						  </td>
					</tr>
				</table>
			</form>";
	} ?>
	</td>
</tr>
</table>
</body>
</html>
<script src="../jquery/jquery-1.10.2.min.js"></script>
        <script src="../jquery/jquery.chained.min.js"></script>
        <script>
            $("#kokab").chained("#provinsi");
            $("#kecamatan").chained("#kokab");
        </script>
		</div>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>