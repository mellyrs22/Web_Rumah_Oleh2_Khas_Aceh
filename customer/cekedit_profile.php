<?php 
session_start();
include ("../sambung.php");

$id= $_POST['id'];
$nama_depan=$_POST['nama_depan'];
$nama_belakang=$_POST['nama_belakang'];
$password=$_POST['password'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];
$kecamatan=$_POST['kecamatan'];
$kodepos=$_POST['kode_pos'];
$nohp=$_POST['nohp'];

$sql = "UPDATE customer SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', password='$password', email='$email',
		alamat='$alamat', id_kec='$kecamatan', kode_pos='$kodepos', nohp='$nohp'
		WHERE id_cust='$id'"; 
$hasil_query=mysql_query($sql);

if($hasil_query)
{
	echo"<script>
			alert('Data Anda berhasil diubah!');
			document.location='index.php'</script>";
}
else
{
	echo"<script>
			alert('Data Anda gagal diubah!');
			document.location='index.php'
		</script>";
 }
?>