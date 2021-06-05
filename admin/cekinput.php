<?php
include('../sambung.php');

$jenis=$_POST['id_jenis'];
$nama=$_POST['nama_barang'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];
$keterangan=$_POST['keterangan'];

if(($_FILES["gambar"]["type"]=="image/jpeg")or($_FILES["gambar"]["type"]=="image/jpg")or($_FILES["gambar"]["type"]=="image/gif")or($_FILES["gambar"]["type"]=="image/png"))
{
	if($_FILES["gambar"]["size"] < 1000000)
	{	 
		move_uploaded_file($_FILES["gambar"]["tmp_name"], "../barang/".$_FILES["gambar"]["name"]);
		
		$sql = "INSERT INTO barang (id_barang, id_jenis, nama_barang, harga, stok, gambar, keterangan) 
				VALUES ('', '$jenis', '$nama', '$harga', '$stok', '".$_FILES["gambar"]["name"]."', '$keterangan')";
	
		$hasil_query=mysql_query($sql);
		if($hasil_query)
		{
			echo "<script>alert('Data Berhasil Ditambah!!');document.location='input_barang.php'</script>";
		}
		else
		{
			echo "<script>alert('Data Tidak Berhasil Ditambah!!')</script>";
		}
	}
	else
	{
		echo "<script>alert('Ukuran Image Terlalu Besar!!');document.location='input_barang.php'</script>";
	}
}
else
{
	echo "<script>alert('Format Image Tidak Didukung!!');document.location='input_barang.php'</script>";
}
?>