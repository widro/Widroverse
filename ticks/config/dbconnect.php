<?php
$thisurl =  $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$connection = mysql_connect( $_ENV{DATABASE_SERVER}, "db54729", "O47jhg(%vfoyh") or die("Couldn't connect.");
	$db = mysql_select_db($dbname) or die("Couldn't select database");
}
else{
	$dbname = "widroverse";
	$connection = mysql_connect( "localhost", "root", "") or die("Couldn't connect.");
	$db = mysql_select_db($dbname) or die("Couldn't select database");
}

?>