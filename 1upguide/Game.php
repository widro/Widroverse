<?php

include('config/dbconnect.php');

class Game{


	function list_games($params, $limit, $offset){
	//$link = mysqli_connect("localhost", "root", "", "1upguide");
$thisurl = $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("internal-db.s214582.gridserver.com", "db214582", "_r6eM7R-td", "db214582_widroverse");
}
else{
	$link = mysqli_connect("localhost", "root", "", "widroverse");
}

		$sqladd = "";

		$allfields = array('gameid','releasedate','title','system','status','franchise','developer','publisher','genre','boxfront','beaten','currentbacklog','backlog','neon','twodee','retro','neoncade','elite','eliterank','the20v2');
		$all_games = array();

		if(count($params)>0){
			foreach($params as $params_key => $params_value)

			$sqladd .= "and " . $params_key . " = '".$params_value."'";
		}


		$today = date("Y-m-d");

		$sql_game = "
		SELECT gameid, releasedate, title, system, status, franchise, developer, publisher, genre, boxfront, beaten, currentbacklog, backlog, neon, twodee, retro, neoncade, elite, eliterank, the20v2 FROM games
		where 1 = 1
		$sqladd
		and releasedate <= '".$today."'
		order by releasedate DESC
		limit $limit offset $offset
		";

		$result_game = mysqli_query($link, $sql_game);

		while($row_game=mysqli_fetch_array($result_game, MYSQLI_BOTH)){
			$thisgamearray = array();
			foreach($allfields as $thisfield){
				$$thisfield = $row_game[$thisfield];
				$thisgamearray[$thisfield] = $$thisfield;
			}


			$all_games[] = $thisgamearray;
		}

		return $all_games;
	}





	function list_parameter($parameter, $limit){
$thisurl = $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("internal-db.s214582.gridserver.com", "db214582", "_r6eM7R-td", "db214582_widroverse");
}
else{
	$link = mysqli_connect("localhost", "root", "", "widroverse");
}

		$output = array();

		if(!$limit){
			$limit = "10";
		}

		if(!$parameter){
			$parameter = "developer";
		}

		$sql = "
		SELECT distinct($parameter), count($parameter) as total
		FROM games
		GROUP BY $parameter
		ORDER BY total DESC
		limit $limit
		";

		$result = mysqli_query($link, $sql);

		while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
			$entry[] = array();
			$entry['parameter'] = $row[$parameter];
			$entry['total'] = $row['total'];
			$output[] =$entry;
		}

		return $output;




	}















	function get_game_by_id($gameid){
$thisurl = $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("internal-db.s214582.gridserver.com", "db214582", "_r6eM7R-td", "db214582_widroverse");
}
else{
	$link = mysqli_connect("localhost", "root", "", "widroverse");
}


		$allfields = array('gameid','releasedate','title','system','status','franchise','developer','publisher','genre','boxfront','beaten','currentbacklog','backlog','neon','twodee','retro','neoncade','elite','eliterank','the20v2');

		$sql_game = "
		SELECT gameid, releasedate, title, system, status, franchise, developer, publisher, genre, boxfront, beaten, currentbacklog, backlog, neon, twodee, retro, neoncade, elite, eliterank, the20v2 FROM games
		where gameid = '$gameid'
		limit 1
		";

		$result_game = mysqli_query($link, $sql_game);

		while($row_game = mysqli_fetch_array($result_game, MYSQLI_BOTH)){
			foreach($allfields as $thisfield){
				$$thisfield = $row_game[$thisfield];
				$return_game[$thisfield] = $$thisfield;
			}
			//$return_game = array('gameid'=>$gameid, 'game_name'=>$game_name, 'game_image'=>$game_image, 'status'=>$status);
		}

		return $return_game;
	}


}

?>