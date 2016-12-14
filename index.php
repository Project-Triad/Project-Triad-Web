<?php
session_start();
include_once 'php/dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: php/home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);

	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: php/home.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
<link rel="stylesheet" href="css/form.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Heslo" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Přihlásit</button></td>
</tr>
<tr>
<td><a href="register.php">Registrace zde</a></td>
<td><a href="http://www.md5online.org/"> MD5 Hash decrypter </a></td>
</tr>
</table>
</form>
</div>
</center>

</body>
</html>
