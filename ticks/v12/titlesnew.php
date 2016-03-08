<html>
<head>
<title>Inside Pules v12 Alpha</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- fonts -->
<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,700italic,400italic,900,900italic' rel='stylesheet' type='text/css'>



</style>
</head>

<body>

<?php
include('../config/dbconnect.php');







function titlecodedropdown(){

	$sql= "
	SELECT *
	FROM titlecode
	ORDER BY titlecode
	";

	$result = mysql_query($sql) or die("Error displaying titlecodes.");

	$display_block = '
        <li class="dropdown">
          <a href="titlesnew.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Change <span class="caret"></span></a>
          <ul class="dropdown-menu">

	';

	while ($row = mysql_fetch_array($result)){
		$title= $row['title'];
		$titlecode= $row['titlecode'];
		$display_block .= '
        <li><a href="titlesnew.php?titlecode='.$titlecode.'">'.$title.'</a></li>
		';
	}

	$display_block .= '
          </ul>
        </li>

	';
	return $display_block;

}























$database_table = "titles";
$fields = array('titlecode','date','winner','loser','titles_id');


$sqladd = "";
if(isset($_GET['titlecode'])){
	$sqladd = "AND titles.titlecode = '".$_GET['titlecode']."'";
}


$sql= "
SELECT DATE_FORMAT(date, '%m.%d.%y') as date2, winner, loser, title
FROM titles, titlecode
WHERE titlecode.titlecode = titles.titlecode
$sqladd
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
$display_block .= '
<tr>
<td>$date</td>
<td>$title</td>
<td>$winner</td>
<td>$loser</td>
<td><a href="">Edit</a></td>
<td><a href="javascript:confirm(\'delete for sures?\')">Delete</a></td>

</tr>
';
}


$yup = "<h1>$title</h1>";
$yup .= titlecodedropdown();
$yup .= "
<table class='table table-striped table-bordered table-hover table-condensed'>
<tr>
<th>Date</th>
<th>Title</th>
<th>Champion</th>
<th>Defeated</th>
<th>Edit</th>
<th>Delete</th>
</tr>

$display_block

</table>

";

echo $yup;


?>