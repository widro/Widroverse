<?php
global $link;
global $link2;
global $dbname1;
global $dbname2;
$thisurl = $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$dbname1 = "db214582_widroverse";
	$dbname2 = "information_schema";
	$link = mysqli_connect("internal-db.s214582.gridserver.com", "db214582", "_r6eM7R-td", $dbname1);
	$link2 = mysqli_connect("internal-db.s214582.gridserver.com", "db214582", "_r6eM7R-td", $dbname2);
}
else{
	$dbname1 = "widroverse";
	$dbname2 = "information_schema";
	$link = mysqli_connect("localhost", "root", "", $dbname1);
	$link2 = mysqli_connect("localhost", "root", "", $dbname2);

}

?>