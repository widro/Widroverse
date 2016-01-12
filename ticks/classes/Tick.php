<?php

include('config/dbconnect.php');

class Tick{


	function list_ticks($category_id, $tick_date_start, $tick_date_end){

		$sqladd = "WHERE 1 = 1 ";

		if($category_id!=''){
			$sqladd .= "AND category_id = '$category_id' ";
		}

		if($tick_date_start!=''){
			$sqladd .= "AND tick_date >= '$tick_date_start' ";

			if($tick_date_end!=''){
				$sqladd .= "AND tick_date <= '$tick_date_end' ";
			}
			else{
				$sqladd .= "AND tick_date = '$tick_date_start' ";
			}
		}


		$all_ticks = array();

		$sql_tick = "
		select * from ticks
		$sqladd
		order by tick_date DESC
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

		return $all_ticks;
	}


}

?>