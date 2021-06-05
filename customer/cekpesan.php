<?php 
session_start();
include ("../sambung.php");

$topik=$_POST['topik'];
$pesan=$_POST['pesan'];

$sql = "INSERT INTO pesan_customer VALUES('', '$_SESSION[id_cust]', '$topik', '$pesan')"; 
$hasil_query=mysql_query($sql);

if($hasil_query)
{
	echo "<script>alert('Pesan Anda sudah terkirim. Terima Kasih!');document.location='contact.php'</script>";
}
else
{
	echo "<script>alert('Pesan tidak terkirim!');document.location='contact.php'</script>";
}
?>