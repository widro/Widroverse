<?php

include('config/dbconnect.php');

class Inventory{


	function list_inventory(){

		$all_inventorys = array();

		$sql_inventory = "
		select * from inventory
		order by inventory_id DESC
		";

		$result_inventory = mysql_query($sql_inventory);

		while($row_inventory=mysql_fetch_array($result_inventory)){
			$inventory_id = $row_inventory['inventory_id'];
			$inventory_name = $row_inventory['inventory_name'];
			$inventory_type = $row_inventory['inventory_type'];
			$inventory_image = $row_inventory['inventory_image'];

			$all_inventorys[] = array('inventory_id'=>$inventory_id, 'inventory_name'=>$inventory_name, 'inventory_type'=>$inventory_type, 'inventory_image'=>$inventory_image);
		}

		return $all_inventorys;
	}


}

?>