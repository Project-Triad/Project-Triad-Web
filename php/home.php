<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: ../index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HellYeahh - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="css/form.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>###</label>
    </div>
    <div id="right">
    	<div id="content">
        	Ahoj <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Odhlásit se</a>
        </div>
    </div>
</div>
<br>
<br>

<div id="body">

	<a href="ah"></a><br>
    <p>ahoj2</p>
</div>

</body>
</html>
