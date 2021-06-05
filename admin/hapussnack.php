<?php
	include ('../sambung.php');

	$id = $_GET['id'];

	$del = mysql_query("DELETE FROM barang WHERE id_barang = '$id'");
	if($del)
	{
		echo"<script>alert('Data Berhasil Dihapus!!');document.location='listsnack.php'</script>";
	}
	
	else
	{
		echo"<script>alert('Data Tidak Berhasil Dihapus!!');document.location='listsnack.php'</script>";
	}
?>