<?php
	include ('../sambung.php');
	
	$id = $_GET['id'];

	$del = mysql_query("DELETE FROM pesan_customer WHERE id_pesan = '$id'");
	if($del)
	{
		echo"<script>alert('Data Berhasil Dihapus!!');document.location='pesan_customer.php'</script>";
	}
	
	else
	{
		echo"<script>alert('Data Tidak Berhasil Dihapus!!');document.location='pesan_customer.php'</script>";
	}
?>