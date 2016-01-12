<?php
error_reporting(0);

include('classes/AllClasses.php');

$action = $_GET['action'];

if($action=="get_tickstream_fake"){
	$category = new Category;
	$allcategories = $category->list_categories('');

	foreach($allcategories as $thiscategory){
		$slug = $thiscategory['category_slug'];
		echo'
			<div class="media tickstream_cell">
			  <div class="media-left">
			    <a href="#">
			      <img class="media-object" src="images/tickicons/'.$slug.'.png" alt="..." width=32>
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">Top aligned media</h4>
				<p><a href="#">Read Chapter 1</a> of <a href="">Disease Delusion</a> this is a sample tick in the all new widroverse tick admin, launching in 2016</p>
				<h5>2015-12-20 13:30</h5>
			  </div>
			</div>
			';
	}
}

if($action=="get_tickstream"){

	if($_GET['category_id']){
		$category_id = $_GET['category_id'];
	}
	else{
		$category_id = "";
	}

	if($_GET['tick_date_start']){
		$tick_date_start = $_GET['tick_date_start'];
	}
	else{
		$tick_date_start = "";
	}

	if($_GET['tick_date_end']){
		$tick_date_end = $_GET['tick_date_end'];
	}
	else{
		$tick_date_end = "";
	}

	$tick = new Tick;
	$allticks = $tick->list_ticks($category_id, $tick_date_start, $tick_date_end);

	foreach($allticks as $thistick){
		$tick_name = $thistick['tick_name'];
		$tick_date = $thistick['tick_date'];
		$category_id = $thistick['category_id'];
		$active_id = $thistick['active_id'];


		$category = new Category;
		$categoryinfo = $category->get_category_by_id($category_id);

		$description = "";

		if($category_id==2){
			$game = new Game;
			$gameinfo = $game->get_game_by_id($active_id);

			$description = "Completed a level or trophy in <a href=#>".$gameinfo['game_name']."</a>!";
		}

		if($category_id==6){
			$book = new Book;
			$bookinfo = $book->get_book_by_id($active_id);

			$description = "Read a chapter in <a href=#>".$bookinfo['book_name']."</a>!";
		}

		echo'
			<div class="media tickstream_cell">
			  <div class="media-left">
			    <a href="#">
			      <img class="media-object" src="images/tickicons/'.$categoryinfo['category_slug'].'.png" alt="..." width=32>
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">'.$tick_name.'</h4>
				<p>'.$description.'</p>
				<h5>'.substr($tick_date, 0, 10).'</h5>
			  </div>
			</div>
			';
	}
}


if($action=="insert_tick"){

	$tick_name = $_POST['tick_name'];
	

	if($_POST['tickform_dateoverride']){
		$tick_date = $_POST['tickform_dateoverride'];
	}
	else{
		$tick_date = date("Y-m-d");
	}

	if($_POST['tickform_category']){
		$category = $_POST['tickform_category'];
	}

	elseif($_POST['category']){
		$category = $_POST['category'];
	}
	else{
		$category = '1';
	}

	if($_POST['tickform_tag_id']){
		$active_id = $_POST['tickform_tag_id'];
	}
	elseif($_POST['active_id']){
		$active_id = $_POST['active_id'];
	}
	else{
		$tick_date = date("Y-m-d");
	}





	$sql_insert_tick = "
	insert into ticks (tick_name, tick_date, category_id, active_id) VALUES ('$tick_name','$tick_date','$category','$active_id')
	";

	$result_insert_tick = mysql_query($sql_insert_tick);
	$last_id = mysql_insert_id();

	if($result_insert_tick){
		echo "your tick '".$tick_name."' has been inserted! #id ".$last_id." !";
	}
	else{
		echo "fail";
	}


}


if($action=="get_active_books"){
	$book = new Book;
	$allbooks = $book->list_books();

	foreach($allbooks as $thisbook){
		$book_id = $thisbook['book_id'];
		$book_name = $thisbook['book_name'];
		$book_image = $thisbook['book_image'];
		$status = $thisbook['status'];

		echo'
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive quicktickbutton" src="'.$book_image.'" alt="" id="id'.$book_id.'|cat6|chapter_complete" alt="'.$book_name.'" style="height:250px;">
                </a>
            </div>
			';
	}
}

if($action=="get_active_games"){
	$game = new Game;
	$allgames = $game->list_games();

	foreach($allgames as $thisgame){
		$game_id = $thisgame['game_id'];
		$game_name = $thisgame['game_name'];
		$game_image = $thisgame['game_image'];
		$status = $thisgame['status'];

		echo'
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive quicktickbutton" src="'.$game_image.'" alt="" id="id'.$game_id.'|cat2|level_complete" alt="'.$game_name.'" style="height:250px;">
                </a>
            </div>
			';
	}
}

if($action=="get_active_recipes"){
	$recipe = new Recipe;
	$allrecipes = $recipe->list_recipes();

	foreach($allrecipes as $thisrecipe){
		$recipe_id = $thisrecipe['recipe_id'];
		$recipe_name = $thisrecipe['recipe_name'];
		$recipe_image = $thisrecipe['recipe_image'];
		$recipe_status = $thisrecipe['recipe_status'];

		echo'
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive quicktickbutton" src="'.$recipe_image.'" alt="" id="id'.$recipe_id.'|cat6|chapter_complete" alt="'.$recipe_name.'" style="height:250px;">
                </a>
            </div>
			';
	}
}

if($action=="get_inventory"){
	$inventory = new Inventory;
	$allinventory = $inventory->list_inventory($_GET['inventory_type']);

	foreach($allinventory as $thisinventory){
		$inventory_id = $thisinventory['inventory_id'];
		$inventory_name = $thisinventory['inventory_name'];
		$inventory_type = $thisinventory['inventory_type'];
		$inventory_image = $thisinventory['inventory_image'];


		echo'
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive activeitem_book" src="'.$inventory_image.'" alt="" id="inventory_id'.$inventory_id.'" alt="'.$inventory_name.'">
                </a>
            </div>
			';
	}
}


if($action=="get_stats"){
	$stats = new Stats;
	$get_stats = $stats->get_stats();
	echo'
		<table class="table table-striped table-hover table-responsive">

		<tr>
		<th>Date</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>5</th>
		<th>6</th>
		<th>7</th>
		<th>8</th>
		<th>9</th>
		<th>10</th>
		<th>11</th>
		<th>12</th>
		<th>13</th>
		<th>14</th>
		<th>15</th>
		<th>Ticks</th>

		</tr>
		';
			//$get_stats[$tick_date][$category_id] = $totalticks;
	foreach($get_stats as $get_stats_date => $get_stats_date_vars){
		$tick_date = $get_stats_date;
		echo'
			<tr>
			<td>'.$tick_date.'</td>
			';
			//foreach($get_stats_date_vars as $get_stats_date_vars_vals){
			$totalticks_total = 0;
			for($i=0;$i<15;$i++){
				if($get_stats_date_vars[$i]['totalticks']>0){
					$totalticks = $get_stats_date_vars[$i]['totalticks'];
					$totalticks_total = $totalticks_total +$totalticks;
				}
				else{
					$totalticks=0;
				}

				echo'
					<td>'.$totalticks.'</td>
					';
			}
		echo'
			<th>'.$totalticks_total.'</th>
			</tr>
			';

	}
		echo'
			</table>
			';
}





if($action=="insert_xls_paste"){

	$xls_paste_content = $_POST['xls_paste_content'];




}









?>