<?php
	include ('../sambung.php');

	$id = $_GET['id'];

	$del = mysql_query("DELETE FROM customer WHERE id_cust = '$id'");
	if($del)
	{
		echo"<script>alert('Data Berhasil Dihapus!!');document.location='daftarpelanggan.php'</script>";
	}
	
	else
	{
		echo"<script>alert('Data Tidak Berhasil Dihapus!!');document.location='daftarpelanggan.php'</script>";
	}
?>