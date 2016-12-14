<?php
if(!mysql_connect("89.203.249.234","webacces","9304A152836"))
{
	die('Problém s připojením k databázi ! --> '.mysql_error());
}
if(!mysql_select_db("bellideum_webreg"))
{
	die('Problém s vyberem databáze či databaze neexistuje ! --> '.mysql_error());
}

?>
