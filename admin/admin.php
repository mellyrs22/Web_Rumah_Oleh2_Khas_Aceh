<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php 
//session_start();
include ("../sambung.php");
include "session.php";
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" type="image/jpg" href="../images/logo.jpg">
</head>
<body>
		<?php 
			include 'header.php';
		?>
	<div id="body">
		<div id="about">
			<h3>
			<?php
				echo"<i>Welcome, ".$_SESSION['admin']." </i>";
			?>
			</h3> 
	</div>
	</div>
</body>
		<?php
			include 'footer.php';
		?>	
</html>