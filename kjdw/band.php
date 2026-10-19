<?
$thisurl =  $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}
else{
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}


if($_GET['b']){
	$b = $_GET['b'];
}
elseif($_POST['b']){
	$b = $_POST['b'];
}



// output playlists
$sqlplaylists = "
SELECT id , track , mix , band , song , type , date , volume, active
FROM playlists
WHERE active = 0
AND band = '$b'
ORDER BY date DESC, track
";

$resultplaylists = mysqli_query($link, $sqlplaylists);
$i=0;

while($rowplaylists = mysqli_fetch_array($resultplaylists)){

$id = $rowplaylists['id'];
$track = $rowplaylists['track'];
$mix = $rowplaylists['mix'];
$band = $rowplaylists['band'];
$song = $rowplaylists['song'];
$type = $rowplaylists['type'];
$date = $rowplaylists['date'];
$date = substr($date, 0, 10);
$volume = $rowplaylists['volume'];
$active = $rowplaylists['active'];

if($type=='1'){
	$song = "<font color=blue>$song</font>";
}
elseif($type=='2'){
	$song = "<font color=ff6600>$song</font>";
}
elseif($type=='3'){
	$song = "<font color=ff0000>$song</font>";
}


if($i%2==0){
$displayblock .= "

<tr>
<td bgcolor=333333 valign=top>$date</td>
<td bgcolor=333333 valign=top>$mix</td>
<td bgcolor=333333 valign=top>$track</td>
<td bgcolor=333333 valign=top>$song</td>
</tr>

";
}
else{
$displayblock .= "

<tr>
<td bgcolor=666666 valign=top>$date</td>
<td bgcolor=666666 valign=top>$mix</td>
<td bgcolor=666666 valign=top>$track</td>
<td bgcolor=666666 valign=top>$song</td>
</tr>

";
}


$i++;
}




// output playlists
$sqlbestof = "
SELECT `rank`, `songtitle`, `edition` FROM `bestof` WHERE `artist` LIKE '$b' 
";

$resultbestof = mysqli_query($link, $sqlbestof);
$i=0;

while($rowbestof = mysqli_fetch_array($resultbestof)){

$rank = $rowbestof['rank'];
$songtitle = $rowbestof['songtitle'];
$edition = $rowbestof['edition'];



if($i%2==0){
$displayblock2 .= "

<tr>
<td bgcolor=333333 valign=top>$edition</td>
<td bgcolor=333333 valign=top>$rank</td>
<td bgcolor=333333 valign=top>$songtitle</td>
</tr>

";
}
else{
$displayblock2 .= "

<tr>
<td bgcolor=666666 valign=top>$edition</td>
<td bgcolor=666666 valign=top>$rank</td>
<td bgcolor=666666 valign=top>$songtitle</td>
</tr>

";
}


$i++;
}






?>






<?php include('includes/header.php'); ?>

<table width=600 cellpadding=25>
<h1><?=$b?></h1>
<br>
<table width=600 cellpadding=5>
<tr>
<td valign=top>Date</td>
<td valign=top>Mix</td>
<td valign=top>Track</td>
<td valign=top>Song</td>
</tr>
<?=$displayblock?>
</table>

<?php if($displayblock2){ ?>
<table width=600 cellpadding=25>
<h1>Best Of</h1>
<br>
<table width=600 cellpadding=5>
<tr>
<td valign=top>Edition</td>
<td valign=top>Rank</td>
<td valign=top>Track</td>
</tr>
<? echo $displayblock2; ?>
</table>
<?php } ?>




<?php include('includes/footer.php'); ?>