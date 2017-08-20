<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_GET['activebrand']){
	$activebrand = $_GET['activebrand'];
}

////vars
//games
$allfields = array('gameid','releasedate','title','system','status','franchise','developer','publisher','genre','boxfront','beaten','currentbacklog','backlog','neon','twodee','retro','neoncade','elite','eliterank','the20v2');
$dbtable = "games";
$brandname = "1upGuide";
$brandlogo = "";
$menu_types = array('system', 'genre', 'developer', 'publisher', 'franchise', 'status');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>
<?php include('Items.php'); ?>
<html>
<head>
<title>1upGuide</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="shortcut icon" href="/1upguide/favicon.ico" type="image/vnd.microsoft.icon" />

</head>

<body>
<?php include('components/menu.php'); ?>


<div class="container">
	<?php include('components/leftsidebar.php'); ?>
	<div class="col-lg-10">
<?php

	$gameid = $_GET['gameid'];
	$items = new Items;
	$get_item_by_id = $items->get_item_by_id($allfields, $dbtable, $gameid, $link);


	$gameid = $get_item_by_id['gameid'];
	$title = $get_item_by_id['title'];
	$boxfront = $get_item_by_id['boxfront'];
	if($boxfront==""){
		$boxfront = "images/NSMBWii1upMushroom.png";
	}

	$releasedate = $get_game_by_id['releasedate'];
	$system = $get_game_by_id['system'];
	$status = $get_game_by_id['status'];
	$franchise = $get_game_by_id['franchise'];
	$developer = $get_game_by_id['developer'];
	$publisher = $get_game_by_id['publisher'];
	$genre = $get_game_by_id['genre'];
	$beaten = $get_game_by_id['beaten'];
	$currentbacklog = $get_game_by_id['currentbacklog'];
	$backlog = $get_game_by_id['backlog'];
	$neon = $get_game_by_id['neon'];
	$twodee = $get_game_by_id['twodee'];
	$retro = $get_game_by_id['retro'];
	$neoncade = $get_game_by_id['neoncade'];
	$elite = $get_game_by_id['elite'];
	$eliterank = $get_game_by_id['eliterank'];
	$the20v2 = $get_game_by_id['the20v2'];

	echo'
		<h1>'.$title.'</h1>
		<div class="col-lg-3 col-md-4 col-xs-6 thumb" style="height:350px">
            <img class="img-responsive quicktickbutton" src="http://widroverse.com/1upguide/'.$boxfront.'" alt="" id="id'.$gameid.'|cat2|level_complete" alt="'.$title.'">
        </div>
		<div class="col-lg-9 col-md-8 col-xs-6 thumb" style="height:350px">
		Release Date: '.$releasedate.'<br>
		system: <a href="index.php?system='.$system.'">'.$system.'</a><br>
		status: <a href="index.php?status='.$status.'">'.$status.'</a><br>
		franchise: <a href="index.php?franchise='.$franchise.'">'.$franchise.'</a><br>
		developer: <a href="index.php?developer='.$developer.'">'.$developer.'</a><br>
		publisher: <a href="index.php?publisher='.$publisher.'">'.$publisher.'</a><br>
		genre: <a href="index.php?genre='.$genre.'">'.$genre.'</a><br>
		beaten: <a href="index.php?beaten='.$beaten.'">'.$beaten.'</a><br>
		currentbacklog: <a href="index.php?currentbacklog='.$currentbacklog.'">'.$currentbacklog.'</a><br>
		backlog: <a href="index.php?backlog='.$backlog.'">'.$backlog.'</a><br>
		neon: <a href="index.php?neon='.$neon.'">'.$neon.'</a><br>
		twodee: <a href="index.php?twodee='.$twodee.'">'.$twodee.'</a><br>
		retro: <a href="index.php?retro='.$retro.'">'.$retro.'</a><br>
		neoncade: <a href="index.php?neoncade='.$neoncade.'">'.$neoncade.'</a><br>
		elite: <a href="index.php?elite='.$elite.'">'.$elite.'</a><br>
		eliterank: <a href="index.php?eliterank='.$eliterank.'">'.$eliterank.'</a><br>
		the20v2: <a href="index.php?the20v2='.$the20v2.'">'.$the20v2.'</a><br>



        </div>
		';


?>
<hr>
<h3>Screenshots</h3>




<hr>

<h3>Videos</h3>














	</div>


</div>
</div>

</body>
</html>