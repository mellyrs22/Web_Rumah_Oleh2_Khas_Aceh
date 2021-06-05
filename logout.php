<?php
	session_start();
	unset($_SESSION['username']);
	session_destroy();
	echo"<script>alert('Terima kasih atas kunjungan Anda ^-^');document.location='index.php'</script>";
?>