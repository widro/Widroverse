<?php

include('config/dbconnect.php');

class Tag{


	function list_tags($output=""){

		$all_tags = array();

		$sql_tag = "
		select * from tags
		order by tag_id
		";

		$result_tag = mysql_query($sql_tag);

		while($row_tag=mysql_fetch_array($result_tag)){
			$tag_id = $row_tag['tag_id'];
			$tag_name = $row_tag['tag_name'];
			$tag_description = $row_tag['tag_description'];
			$tag_slug = $row_tag['tag_slug'];
			$all_tags[] = array('tag_id'=>$tag_id, 'tag_name'=>$tag_name, 'tag_description'=>$tag_description, 'tag_slug'=>$tag_slug);
		}

		return $all_tags;
	}



	function get_tag_by_id($tag_id){
		$sql_tag = "
		select * from tags
		where tag_id = '$tag_id'
		limit 1
		";

		$result_tag = mysql_query($sql_tag);

		while($row_tag=mysql_fetch_array($result_tag)){
			$tag_id = $row_tag['tag_id'];
			$tag_name = $row_tag['tag_name'];
			$tag_description = $row_tag['tag_description'];
			$tag_slug = $row_tag['tag_slug'];
			$return_tag = array('tag_id'=>$tag_id, 'tag_name'=>$tag_name, 'tag_description'=>$tag_description, 'tag_slug'=>$tag_slug);
		}

		return $return_tag;
	}



}

?>