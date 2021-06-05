<?php
	session_start();	
	include "../sambung.php";
	
	$id = $_GET['id_barang'];
	$sql = mysql_query("SELECT curdate()");
	$data1 = mysql_fetch_array($sql);
	$data = mysql_query("select * from barang where id_barang='$id'");
	$b = mysql_fetch_array($data);
	$harga = $b['harga'];
	
	$masuk = mysql_query ("INSERT INTO keranjang_belanja (id_cust, id_barang, jumlah, harga_barang, tanggal, status)
						  VALUES ('$_SESSION[id_cust]','$id', 1 ,$harga, '$data1[0]', 'pending')");
	//echo $masuk;
	if($masuk)
	{
		$masuk1 = mysql_query("select id_transaksi from keranjang_belanja
							where id_cust='".$_SESSION['id_cust']."'
							AND id_barang='$id'");
			$ba = mysql_fetch_array($masuk1);
			$id_transaksi=$ba['id_transaksi'];
		echo "
				<script type='text/javascript' language='javascript'>
					document.location='list_beli.php?id_transaksi=".$id_transaksi."&id_barang=".$id."';
				</script>";
	}
?>
