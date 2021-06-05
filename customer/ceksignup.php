<?php 
include ("../sambung.php");
mysql_query("INSERT INTO customer VALUES('', '$_POST[nama_depan]', '$_POST[nama_belakang]', '$_POST[jk]', '$_POST[user]', '$_POST[pass]', '$_POST[email]', '$_POST[alamat]', '$_POST[kecamatan]', '$_POST[kode_pos]', '$_POST[nohp]', '$_POST[question]', '$_POST[jawab]')"); 

if(mysql_affected_rows()>0)
{
	echo "<script>alert('Registrasi berhasil dilakukan!!');document.location='../login.php'</script>";
}
else
{
	echo "<script>alert('Registrasi tidak berhasil dilakukan!!');document.location='signup.php'</script>";
}
?>