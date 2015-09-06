<?php
$mysqli = new mysqli("localhost", "root", "root", "dfc");
// Check connection status

if( !$mysqli && $mysqli->connect_errno )
{
	echo "Heerejawharat.com database connection error\n";
	echo $mysqli->connect_errno;	
	return;
}
?>
