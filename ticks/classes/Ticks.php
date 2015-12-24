<?php

include('config/dbconnect.php');

class Category{


	function list_ticks(){

		$all_ticks = array();

		$sql_tick = "
		select * from ticks
		order by tick_id DESC
		";

		$result_tick = mysql_query($sql_tick);

		while($row_tick=mysql_fetch_array($result_tick)){
			$tick_id = $row_tick['tick_id'];
			$tick_name = $row_tick['tick_name'];
			$tick_date = $row_tick['tick_date'];
			$category_id = $row_tick['category_id'];
			$active_id = $row_tick['active_id'];

			$all_ticks[] = array('tick_id'=>$tick_id, 'tick_name'=>$tick_name, 'tick_date'=>$tick_date, 'category_id'=>$category_id, 'active_id'=>$active_id);
		}

		return $all_categories;
	}









}

?>