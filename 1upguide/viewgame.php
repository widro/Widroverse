<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>
<?php include('Game.php'); ?>
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
	$game = new Game;
	$get_game_by_id = $game->get_game_by_id($gameid);


	$gameid = $get_game_by_id['gameid'];
	$title = $get_game_by_id['title'];
	$boxfront = $get_game_by_id['boxfront'];
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
            <img class="img-responsive quicktickbutton" src="/1upguide/'.$boxfront.'" alt="" id="id'.$gameid.'|cat2|level_complete" alt="'.$title.'">
        </div>
		<div class="col-lg-9 col-md-8 col-xs-6 thumb" style="height:350px">
		Release Date: '.$releasedate.'<br>
		system: '.$system.'<br>
		status: '.$status.'<br>
		franchise: '.$franchise.'<br>
		developer: '.$developer.'<br>
		publisher: '.$publisher.'<br>
		genre: '.$genre.'<br>
		beaten: '.$beaten.'<br>
		currentbacklog: '.$currentbacklog.'<br>
		backlog: '.$backlog.'<br>
		neon: '.$neon.'<br>
		twodee: '.$twodee.'<br>
		retro: '.$retro.'<br>
		neoncade: '.$neoncade.'<br>
		elite: '.$elite.'<br>
		eliterank: '.$eliterank.'<br>
		the20v2: '.$the20v2.'<br>




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