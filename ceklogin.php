<?php
include "sambung.php";
//session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$admin = mysql_query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$customer = mysql_query("SELECT * FROM customer WHERE username = '$username' AND password = '$password'");
if (($username == "") && ($password == ""))
{
	echo "<script>alert('Silakan isi username dan password Anda!!');document.location='login.php'</script>";	
	exit();
}
else if (($username == "") || ($password == ""))
{
	echo "<script>alert('Silakan isi username atau password Anda!!');document.location='login.php'</script>";	
	exit();
}
else if ($_POST['username'] != "" && $_POST['password'] != "")
{
	if(mysql_num_rows($admin) == 1)
	{
		session_start();
		$_SESSION['admin'] = 'admin';
		$ambil_admin = mysql_fetch_array($admin);
		$_SESSION['username'] = $ambil_admin['username'];
		$data = $_SESSION['username'];
		echo "<script>alert('Anda Berhasil Login!!');document.location='admin/admin.php'</script>";	
		exit();
	}
	else if(mysql_num_rows($customer) == 1)
	{
		session_start();
		$_SESSION['customer'] = 'customer';
		$ambil_customer = mysql_fetch_array($customer);
		$_SESSION['username'] = $ambil_customer['username'];
		$_SESSION['id_cust'] = $ambil_customer['id_cust'];
		echo "<script>alert('Anda Berhasil Login!!');document.location='customer/index.php'</script>";	
		exit();
	}
	else 
	{
		echo "<script>alert('Username dan Password Anda Salah!!');document.location='login.php'</script>";
	}
}
?>