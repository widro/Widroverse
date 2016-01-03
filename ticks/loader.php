<?php

include('classes/Book.php');
include('classes/Game.php');
include('classes/Category.php');
include('classes/Inventory.php');
include('classes/Tick.php');

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
	$tick = new Tick;
	$allticks = $tick->list_ticks('');

	foreach($allticks as $thistick){
		$tick_name = $thistick['tick_name'];
		$tick_date = $thistick['tick_date'];
		$category_id = $thistick['category_id'];


		$category = new Category;
		$categoryinfo = $category->get_category_by_id($category_id);



		echo'
			<div class="media tickstream_cell">
			  <div class="media-left">
			    <a href="#">
			      <img class="media-object" src="images/tickicons/'.$categoryinfo['category_slug'].'.png" alt="..." width=32>
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">'.$tick_name.'</h4>
				<!--<p><a href="#">Read Chapter 1</a> of <a href="">Disease Delusion</a> this is a sample tick in the all new widroverse tick admin, launching in 2016</p>-->
				<h5>'.substr($tick_date, 0, 10).'</h5>
			  </div>
			</div>
			';
	}
}


if($action=="insert_tick"){

	$tick_name = $_POST['tick_name'];
	
	$active_id = $_POST['active_id'];

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

	$sql_insert_tick = "
	insert into ticks (tick_name, tick_date, category_id, active_id) VALUES ('$tick_name','$tick_date','$category','$active_id')
	";

	$result_insert_tick = mysql_query($sql_insert_tick);

	if($result_insert_tick){
		echo "book inserted!";
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
			<img src="'.$book_image.'" class="img-responsive activeitem_book" id="book_id'.$book_id.'" style="cursor:pointer;" alt="'.$book_name.'" width=100><br><br>
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
			<img src="'.$game_image.'" class="img-responsive activeitem_game" id="game_id'.$game_id.'" style="cursor:pointer;" alt="'.$game_name.'" width=100><br><br>
			';
	}
}

if($action=="get_inventory"){
	$inventory = new Inventory;
	$allinventory = $inventory->list_inventory();

	foreach($allinventory as $thisinventory){
		$inventory_id = $thisinventory['inventory_id'];
		$inventory_name = $thisinventory['inventory_name'];
		$inventory_type = $thisinventory['inventory_type'];
		$inventory_image = $thisinventory['inventory_image'];


		echo'
			<img src="'.$inventory_image.'" class="img-responsive activeitem_book" id="inventory_id'.$inventory_id.'" style="cursor:pointer;" alt="'.$inventory_name.'"><br><br>
			';
	}
}





if($action=="insert_xls_paste"){

	$xls_paste_content = $_POST['xls_paste_content'];




}









?>