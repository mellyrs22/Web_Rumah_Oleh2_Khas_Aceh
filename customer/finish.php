<?php
	session_start();	
	include "../sambung.php";
	//$id = $_GET['id_barang'];
	
	$masuk = mysql_query("UPDATE keranjang_belanja SET status='waiting' where status='pending' AND id_cust='$_SESSION[id_cust]'");
	if($masuk)
	{
		
		/*$stok = mysql_query("select b.stok from barang b, keranjang_belanja k
							where b.id_barang=k.id_barang AND b.id_barang='$id'");
		$stok1 = mysql_fetch_array($stok);
		//echo $stok1;
		$stok_baru = $stok1[0] - $_GET['jumlah'];
		echo $stok_baru;
		//$update_stok = mysql_query("update barang set stok=$stok_baru where id_barang='$id'");
	
		*/$masuk1 = mysql_query("SELECT k.*, c.* FROM keranjang_belanja k, customer c WHERE c.id_cust=k.id_cust");
			$ba = mysql_fetch_array($masuk1);
			$id_cust=$ba['id_cust'];
		$masuk2 = mysql_query("SELECT k.* FROM kecamatan k, customer c where k.id_kec=c.id_kec AND c.id_cust='$_SESSION[id_cust]'");
			$b = mysql_fetch_array($masuk2);
		echo "
				<script type='text/javascript' language='javascript'>
					document.location='seefinish.php?id_cust=".$id_cust."&nama_kec=".$b['nama_kec']."';
				</script>";
	}

?>