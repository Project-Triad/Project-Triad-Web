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
				<li><a href="#">Bellideum Sub Menu 1234</a></li>
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
<div class="opacity">
<article>
	<section>
		<p class="left">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
			 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
			 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
			 commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
			 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
			  cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
				id est laborum."</p>
		<p class="right">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
			 doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
			 veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
			 ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
			 consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
			 porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
			 adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
			 et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,
			  quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
				 aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
				 qui in ea voluptate velit esse quam nihil molestiae consequatur, vel
				  illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
	</section>
</article>
</div>
<footer>
<form method="post">
<input type="text" name="email" placeholder="Email" required /></td>
<input type="password" name="pass" placeholder="Heslo" required /></td>
<button type="submit" name="btn-login">Přihlásit</button></td>
<a href="php/register.php">Registrace zde</a></td>
<a href="http://www.md5online.org/"> MD5 Hash decrypter </a></td>
</form>
</footer>

</body>
</html>
