<?php
error_reporting(E_ALL & ~E_NOTICE);

$thisurl =  $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}
else{
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}

if($_GET['year']){
	$year = $_GET['year'];
}
else{
	$year = date("Y")-1;
	//$year = "2022";
}

// output bestof
$sqlplaylists = "
SELECT `bestof_id`, `rank`, `songtitle`, `artist`, `edition` FROM `bestof` WHERE `edition` LIKE '$year%' ORDER BY `rank` DESC 
";

$resultplaylists = mysqli_query($link, $sqlplaylists);

while($rowplaylists = mysqli_fetch_array($resultplaylists)){

	$bestof_id = $rowplaylists['bestof_id'];
	$rank = $rowplaylists['rank'];
	$edition = $rowplaylists['edition'];
	$songtitle = $rowplaylists['songtitle'];
	$artist = $rowplaylists['artist'];

	/*
	if($artist==""){
		$songtitle_explode = explode("(", $songtitle);
		$songtitle = addslashes($songtitle_explode[0]);
		$artist = addslashes(substr($songtitle_explode[1], 0,-1));

		$updatesql = "
		UPDATE `bestof`
		SET `artist` = '$artist', `songtitle` = '$songtitle'
		WHERE `bestof_id` = '$bestof_id'
		";
		$updatesql_result = mysqli_query($link, $updatesql);

	}
	*/
	$band = "<a href=\"band.php?b=$artist\">$artist</a>";


	$i=0;
	$varname = 'displayblock' . $i;
	$$varname .= "<li>$rank - $songtitle ($band)</li>";
}


if($i%2==0){
$bgcolor = "333333";
}
else{
$bgcolor = "666666";
}

$displayall .= "
<tr>
<td valign=top bgcolor=$bgcolor>
<ul>
";

$displayall .= $$varname;

$displayall .= "</ul>

</td>
</tr>
";




?>



<?php include('includes/header.php'); ?>

<table width=600 cellpadding=25>
<?php echo $displayall; ?>
</table>







<?php include('includes/footer.php'); ?>