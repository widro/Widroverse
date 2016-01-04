<?php

include('config/dbconnect.php');

class Stats{


	function get_stats(){

		$get_stats = array();

		$sql_stats = "
		select count(*) as totalticks, tick_date, category_id from ticks
		group by tick_date, category_id
		";

		$result_stats = mysql_query($sql_stats);

		while($row_stats=mysql_fetch_array($result_stats)){
			$totalticks = $row_stats['totalticks'];
			$tick_date = $row_stats['tick_date'];
			$category_id = $row_stats['category_id'];

			//$get_stats[] = array('totalticks'=>$totalticks, 'tick_date'=>$tick_date, 'category_id'=>$category_id);
			$get_stats[$tick_date][$category_id] = $totalticks;
		}

		return $get_stats;
	}


}

?>