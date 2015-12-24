<?php

include('classes/Category.php');

$action = $_GET['action'];

if($action=="get_tickstream"){
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


if($action=="insert_tick"){

	$tick_name = $_POST['tick_name'];

	$tick_date = date("Y-m-d");

	$sql_insert_tick = "
	insert into ticks (tick_name, tick_date, category_id, tag) VALUES ('$tick_name','$tick_date','1','xxxx')
	";

	$result_insert_tick = mysql_query($sql_insert_tick);


}


















?>