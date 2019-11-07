<?php
//Set up database information
$mysqli = new mysqli('localhost', 'phpAccess', 'PHPP@ssword345', 'pikerSite');
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>
