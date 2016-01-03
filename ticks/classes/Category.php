<?php

include('config/dbconnect.php');

class Category{


	function list_categories($output=""){

		$all_categories = array();

		$sql_category = "
		select * from categories
		order by category_id
		";

		$result_category = mysql_query($sql_category);

		while($row_category=mysql_fetch_array($result_category)){
			$category_id = $row_category['category_id'];
			$category_name = $row_category['category_name'];
			$category_description = $row_category['category_description'];
			$category_slug = $row_category['category_slug'];
			$all_categories[] = array('category_id'=>$category_id, 'category_name'=>$category_name, 'category_description'=>$category_description, 'category_slug'=>$category_slug);
		}

		return $all_categories;
	}



	function get_category_by_id($category_id){
		$sql_category = "
		select * from categories
		where category_id = '$category_id'
		limit 1
		";

		$result_category = mysql_query($sql_category);

		while($row_category=mysql_fetch_array($result_category)){
			$category_id = $row_category['category_id'];
			$category_name = $row_category['category_name'];
			$category_description = $row_category['category_description'];
			$category_slug = $row_category['category_slug'];
			$return_category = array('category_id'=>$category_id, 'category_name'=>$category_name, 'category_description'=>$category_description, 'category_slug'=>$category_slug);
		}

		return $return_category;
	}



}

?>