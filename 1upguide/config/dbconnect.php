<?php
global $link;
$thisurl = $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("internal-db.s214582.gridserver.com", "db214582", "_r6eM7R-td", "db214582_widroverse");
}
else{
	$link = mysqli_connect("localhost", "root", "", "1upguide");
}

?>