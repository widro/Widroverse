<?php
$thisurl =  $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$dbname = "db145717_widroverse";
	$connection = mysql_connect('internal-db.s145717.gridserver.com', "db145717", "8uhb8uhb") or die("Couldn't connect.");
	$db = mysql_select_db($dbname) or die("Couldn't select database");
}
else{
	$dbname = "widroverse";
	$connection = mysql_connect( "localhost", "root", "") or die("Couldn't connect.");
	$db = mysql_select_db($dbname) or die("Couldn't select database");
}

?>