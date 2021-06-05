<?php
$id = $_GET['id'];
session_start();
include ('../sambung.php');
		if(isset($_GET['sent']))
		{
			$sql = "UPDATE keranjang_belanja SET status='sending' WHERE status='waiting' AND id_transaksi='$id'";
			mysql_query($sql);
			echo "<script>document.location='listpemesanan.php'</script>";
		}
		else
		{
			echo "<script>alert('Data Tidak Berhasil Ditambah!!')</script>";
		}
?>