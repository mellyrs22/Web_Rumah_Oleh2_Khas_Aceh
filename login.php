<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Rumah Oleh-Oleh Khas Aceh</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/jpg" href="images/logo.jpg">
</head>
<body>
	<div id="body">
		<div id="header">
			<div>
				<div>
					<a href="index.php" id="logo1"><img src="images/logo1.png" alt="Image" align="center"></a>
				</div>
			</div>
		</div>
		<form id="form" action="ceklogin.php" method="POST" name="login"> 
			<table id="table" width=300" height="200" align="center" colspan="2" valign="middle">
				<tr>
					<td height="5" width="180" align="center"><b>Username :</b></td>
					<td valign="middle" align="center">  
						<input name="username" type="text" size="20" placeholder="username">
					</td>
				</tr>
				<tr>
					<td align="center"" id="text"><b>Password :</b></td>  
					<td valign="middle" height="5" align="center">  
						<input name="password" type="password" size="20" placeholder="**********">
					</td>  
				</tr>
				<tr>
					<td colspan="2" valign="middle" height="5" align="center">  
						<input name="login" type="submit" id="login" value="">&nbsp &nbsp
						<input type="reset" name="Reset" id="reset" value=""> 
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
	<?php
		include 'footer.php';
	?>
</html>