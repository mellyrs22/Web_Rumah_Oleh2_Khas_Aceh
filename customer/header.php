<?php include "../sambung.php";
	$query = mysql_query("select c.*, p.*, k.*, kb.* from customer c, provinsi p, kokab kb, kecamatan k 
						  where  c.id_kec = k.id_kec AND p.id_prov=kb.id_prov AND kb.id_kota=k.id_kota and c.id_cust='$_SESSION[id_cust]'");
	$h=mysql_fetch_array($query); ?>

<div id="header">
		<div>
			<div>
				<ul>
					<li class="current">
						<a href="index.php">Beranda</a>
					</li>
					<li>
						<a href="about.php">Tentang Kami</a>
					</li>
				</ul>
				<a href="index.php" id="logo"><img src="../images/logo1.png" alt="Image"></a>
				<ul>
					<li>
						<a href="contact.php">Kontak Kami</a>
					</li>
					<li>
						<a href="../logout.php">Keluar</a>
					</li>
				</ul>
			</div>
		</div>
		<div>
			<ul>
				<li>
					<a href="makanan.php">Makanan Utama</a>
				</li>
				<li>
					<a href="snack.php">Makanan Ringan</a>
				</li>
				<li>
					<a href="minuman.php">Minuman</a>
				</li>
				<li>
					<a href="lainlain.php">Lain-Lain</a>
				</li>
			</ul>
		</div>
		<div>
			<ul>
				<li>
					<a href="profile.php?id=<?php echo $_SESSION['id_cust']."&namaprov=".$h['nama_prov']."&idprov=".$h['id_prov']."&namakokab=".$h['nama_kokab']."&idkota=".$h['id_kota']."&namakec=".$h['nama_kec']."&idkec=".$h['id_kec']."";?>"> Profil </a>
				</li>
				<li>
					<a href="daftarbelanja.php?id=<?php echo $_SESSION['id_cust'] ?>">Daftar Belanja</a>
				</li>
				<li><?php
				
					$keranjangx = mysql_query("SELECT * FROM keranjang_belanja WHERE id_cust='$_SESSION[id_cust]' AND status='pending'");
					$pesan = 0;
					$psn = mysql_num_rows($keranjangx);
					$pesan = $psn;
						echo"<img src='../images/addcart.gif'><font id='pesan'>"; echo $pesan; echo "Pesanan </font>";
						if($pesan>0)
								{
									echo "<a href=list_beli.php><font id='pesan'>[Lihat]</font></a>";
								}
				echo"</li>";?>
				<li>
					<?php
						echo"<font id='pesan'><u>Welcome, ".$_SESSION['username']." </u></font>";
					?>
				</li>
			</ul>
		</div>
	</div>