<?php
	include ('../sambung.php');

	$id = $_GET['id'];

	$del = mysql_query("DELETE FROM keranjang_belanja WHERE id_transaksi = '$id'");
	if($del)
	{
		echo"<script>alert('Data Berhasil Dihapus!!');document.location='listpemesanan.php'</script>";
	}
	
	else
	{
		echo"<script>alert('Data Tidak Berhasil Dihapus!!');document.location='listpemesanan.php'</script>";
	}
?>