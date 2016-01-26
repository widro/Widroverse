<?php

include('config/dbconnect.php');

class Ingredient{


	function list_ingredients(){

		$all_ingredients = array();

		$sql_ingredient = "
		select * from ingredients
		order by ingredient_id DESC
		";

		$result_ingredient = mysql_query($sql_ingredient);

		while($row_ingredient=mysql_fetch_array($result_ingredient)){
			$ingredient_id = $row_ingredient['ingredient_id'];
			$ingredient_name = $row_ingredient['ingredient_name'];
			$ingredient_image = $row_ingredient['ingredient_image'];
			$ingredient_status = $row_ingredient['ingredient_status'];

			$all_ingredients[] = array('ingredient_id'=>$ingredient_id, 'ingredient_name'=>$ingredient_name, 'ingredient_image'=>$ingredient_image, 'ingredient_status'=>$ingredient_status);
		}

		return $all_ingredients;
	}

	function get_ingredient_by_id($ingredient_id){
		$sql_ingredient = "
		select * from ingredients
		where ingredient_id = '$ingredient_id'
		limit 1
		";

		$result_ingredient = mysql_query($sql_ingredient);

		while($row_ingredient=mysql_fetch_array($result_ingredient)){
			$ingredient_id = $row_ingredient['ingredient_id'];
			$ingredient_name = $row_ingredient['ingredient_name'];
			$ingredient_image = $row_ingredient['ingredient_image'];
			$ingredient_status = $row_ingredient['ingredient_status'];
			$return_ingredient = array('ingredient_id'=>$ingredient_id, 'ingredient_name'=>$ingredient_name, 'ingredient_image'=>$ingredient_image, 'ingredient_status'=>$ingredient_status);
		}

		return $return_ingredient;
	}



}

?>