<?
/* db connection  */
$dbname = "widroverse";

$connection = mysql_connect( "mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}") or die("Couldn't connect.");
$db = mysql_select_db($dbname) or die("Couldn't select database");

?>