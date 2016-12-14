<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));

	if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
	{
		?>
        <script>alert('registrace dopadla úspěšně ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('Uživatelské jméno již existuje');</script>
        <?php
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registracka</title>
<link rel="stylesheet" href="css/form.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Jméno" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Tvůj email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Heslo" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Registrace</button></td>
</tr>
<tr>
<td><a href="../index.php">Zpět na přihlášení</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
