<?php
	session_start();
	include "../sambung.php";
	
	$id = $_GET['id'];
	$barang = $_GET['id_barang'];
	$harga = mysql_query("select harga from barang
							where id_barang='$barang'");
	//echo $harga;
	$hrg = mysql_fetch_array($harga);
	$jumlah_up = $_GET['jumlah'] + 1;
	$hargabaru = $hrg[0]*$jumlah_up;	
	//echo $jumlah_up;
	
	$update = mysql_query ("update keranjang_belanja set jumlah=$jumlah_up, harga_barang=$hargabaru where id_transaksi='$id'");
	//echo $update;
	if($update)
	{
		echo "
		<script>
			document.location='list_beli.php?id_transaksi=".$id."&id_barang=".$barang."';
		</script>";
	}
	
	else
	{
		echo "error";
	}

?>
