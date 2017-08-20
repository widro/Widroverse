<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

if($_GET['setviewstyle']){
	setcookie("viewstyle", $_GET['setviewstyle'], time()+3600000);  /* expire in 1 hour */
}

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
<?php 
include('config/dbconnect.php');
include('Items.php'); 
?>
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



//check type of view from cookie
if($_GET['setviewstyle']){
	$viewstyle = $_GET['setviewstyle'];
}
elseif(isset($_COOKIE['viewstyle'])){
	$viewstyle = $_COOKIE["viewstyle"];
}
else{
	$viewstyle = "grid";
}





	$params = array();



	foreach($allfields as $thisfield){
		if($_GET[$thisfield]){
			$params[$thisfield] = $_GET[$thisfield];
			$queryvars .= '&'. $thisfield . '=' . $_GET[$thisfield];
		}
	}

	if($_GET["offset"]){
		$offset = $_GET["offset"];
	}
	else{
		$offset = 0;
	}


	if($_GET["limit"]){
		$limit = $_GET["limit"];
	}
	else{
		$limit = 100;
	}


	$items = new Items;
	$allitems = $items->list_items($allfields, $dbtable, $params, $limit, $offset, $link);
	$totalitems = count($allitems);

	foreach($allitems as $thisitem){
		$gameid = $thisitem['gameid'];
		$title = $thisitem['title'];
		$boxfront = $thisitem['boxfront'];
		if($boxfront==""){
			$boxfront = "images/NSMBWii1upMushroom.png";
		}
		if($viewstyle == "grid"){
		echo'
			<div class="col-lg-3 col-md-4 col-xs-6 thumb" style="height:350px">
                <a class="thumbnail" href="view.php?gameid='.$gameid.'">
                    <img class="img-responsive quicktickbutton" src="http://widroverse.com/1upguide/'.$boxfront.'" alt="" id="id'.$gameid.'|cat2|level_complete" alt="'.$title.'">
                    <br>
                    '.$title.'
                </a>
            </div>
			';
		}

		elseif($viewstyle == "basiclist"){
		echo'
			<div class="col-lg-12 col-md-12 col-xs-12">
                <a href="view.php?gameid='.$gameid.'">
                    '.$title.'
                </a>
            </div>
			';
		}

	}

	echo '
	<div class="clear" style="clear:both;"></div>
	';


	//show next
	if($limit==$totalgames){
		$offsetnext = $offset+$limit;
		echo '
		<a href="index.php?offset='.$offsetnext.'&limit='.$limit.$queryvars.'">   NEXT   </a>
		';
	}

	//show next
	if($offset>0){
		$offsetprev = $offset-$limit;
		echo '
		<a href="index.php?offset='.$offsetprev.'&limit='.$limit.$queryvars.'">   PREVIOUS   </a>
		';
	}





?>
</div>
</div>

</body>
</html>