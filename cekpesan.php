<?php 
include ("sambung.php");

$nama=$_POST['nama'];
$email=$_POST['email'];
$topik=$_POST['topik'];
$pesan=$_POST['pesan'];

$sql = "INSERT INTO pesan_non_customer VALUES('', '$nama', '$email', '$topik', '$pesan')"; 
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