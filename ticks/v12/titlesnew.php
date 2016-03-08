<?php
include('../config/dbconnect.php');


$database_table = "titles";
$fields = array('titlecode','date','winner','loser','titles_id');





$sql= "
SELECT DATE_FORMAT(date, '%m.%d.%y') as date2, winner, loser, title
FROM titles, titlecode
WHERE titlecode.titlecode = titles.titlecode
ORDER BY date DESC
";

$result = mysql_query($sql) or die("Error displaying titles article.");

$display_block = "";

while ($row = mysql_fetch_array($result)){
$title= $row['title'];
$winner= $row['winner'];
$winner = stripslashes ($winner);
$loser= $row['loser'];
$loser = stripslashes ($loser);
$date= $row['date2'];
$display_block .= "<tr><td class=article align=center>$date</td><td class=article align=center>$winner</td><td class=article align=center>$loser</td></tr>
";
}


$yup = "
<span class=headline>$title</span><br>

<table border=1 cellspacing=1 bordercolor=white cellpadding=5 width=400>
<tr><td class=article align=center><b>Date</b></td><td class=article align=center><b>Champion</b></td><td class=article align=center><b>Defeated</b></td></tr>
$display_block
</table><br><br>
";



echo $yup;









?>
