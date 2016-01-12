<?php

include('config/dbconnect.php');

class Recipe{


	function list_recipes(){

		$all_recipes = array();

		$sql_recipe = "
		select * from recipes
		order by recipe_id DESC
		";

		$result_recipe = mysql_query($sql_recipe);

		while($row_recipe=mysql_fetch_array($result_recipe)){
			$recipe_id = $row_recipe['recipe_id'];
			$recipe_name = $row_recipe['recipe_name'];
			$recipe_image = $row_recipe['recipe_image'];
			$recipe_status = $row_recipe['recipe_status'];

			$all_recipes[] = array('recipe_id'=>$recipe_id, 'recipe_name'=>$recipe_name, 'recipe_image'=>$recipe_image, 'recipe_status'=>$recipe_status);
		}

		return $all_recipes;
	}

	function get_recipe_by_id($recipe_id){
		$sql_recipe = "
		select * from recipes
		where recipe_id = '$recipe_id'
		limit 1
		";

		$result_recipe = mysql_query($sql_recipe);

		while($row_recipe=mysql_fetch_array($result_recipe)){
			$recipe_id = $row_recipe['recipe_id'];
			$recipe_name = $row_recipe['recipe_name'];
			$recipe_image = $row_recipe['recipe_image'];
			$recipe_status = $row_recipe['recipe_status'];
			$return_recipe = array('recipe_id'=>$recipe_id, 'recipe_name'=>$recipe_name, 'recipe_image'=>$recipe_image, 'recipe_status'=>$recipe_status);
		}

		return $return_recipe;
	}



}

?>