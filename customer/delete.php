<?php
	include "../sambung.php";

	$id = $_GET['id'];

	$del = mysql_query("delete from keranjang_belanja where id_transaksi='$id'");
	if($del)
	{
		header("location:list_beli.php");
	}
	
	else
	{
		echo "error";
	}
?>
