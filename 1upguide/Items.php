<?php

include('config/dbconnect.php');

class Items{

	function list_items($allfields, $dbtable, $params, $limit, $offset, $link){

		//declare some vars
		$sqladd = "";
		$selectlist = "select ";
		$all = array();

		//build select
		foreach($allfields as $eachfield){
			$selectlist .= $eachfield . ", ";
		}
		//trim last ,
		$selectlist = substr($selectlist, 0, -2);

		//build sql
		if(count($params)>0){
			foreach($params as $params_key => $params_value){
				$sqladd .= "and " . $params_key . " = '".$params_value."'";
			}
		}


		$today = date("Y-m-d");

		$sql = "
		$selectlist
		FROM ".$dbtable."
		where 1 = 1
		$sqladd
		and releasedate <= '".$today."'
		order by releasedate DESC
		limit $limit offset $offset
		";

		$result = mysqli_query($link, $sql);

		while($row=mysqli_fetch_array($result, MYSQLI_BOTH)){
			$thisarray = array();
			foreach($allfields as $thisfield){
				$$thisfield = $row[$thisfield];
				$thisarray[$thisfield] = $$thisfield;
			}


			$all[] = $thisarray;
		}

		return $all;
	}

	function list_parameter($dbtable, $parameter, $limit, $link){


		$output = array();

		if(!$limit){
			$limit = "10";
		}

		if(!$parameter){
			$parameter = "developer";
		}

		$sql = "
		SELECT distinct($parameter), count($parameter) as total
		FROM $dbtable
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


	function get_item_by_id($allfields, $dbtable, $id, $link){
		$sqladd = "";
		$selectlist = "select ";

		foreach($allfields as $eachfield){
			$selectlist .= $eachfield . ", ";
		}

		$selectlist = substr($selectlist, 0, -2);

		$sql = "
		$selectlist
		FROM $dbtable
		where $allfields[0] = '$id'
		limit 1
		";

		$result = mysqli_query($link, $sql);

		while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
			foreach($allfields as $thisfield){
				$$thisfield = $row[$thisfield];
				$return[$thisfield] = $$thisfield;
			}
		}

		return $return;
	}


}

?>