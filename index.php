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
<!DOCTYPE HTML>
<html lang="cs-cz">
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="1" />
<title>Project-Triad</title>
<link id="pagestyle" rel="stylesheet" type="text/css" href="css/kuromi.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
function swapStyleSheet(sheet){
	document.getElementById('pagestyle').setAttribute('href', sheet);
}
</script>
</head>
<body>
	<header>
 <ul id="menu-bar">
 	<li class="active"><a href="#">Home</a></li>
 	<li><a href="pages/bellideum.php">Bellideum</a>
  	<ul>
   		<li><a href="#">Bellideum Sub Menu</a></li>
  	</ul>
	 </li>
 	<li><a href="#">Services</a>
<ul>
  <li><a href="#">Services Sub Menu</a></li>
</ul>
  </li>
 <li><a href="#">About</a></li>
 <li><a href="#">Contact Us</a></li>
</ul>
</header>

<article>
<div id="login-form">
<form method="post">
<input type="text" name="email" placeholder="Email" required /></td>
<input type="password" name="pass" placeholder="Heslo" required /></td>
<button type="submit" name="btn-login">Přihlásit</button></td>
<a href="php/register.php">Registrace zde</a></td>
<a href="http://www.md5online.org/"> MD5 Hash decrypter </a></td>
</form>
</div>
</article>

</body>
</html>
