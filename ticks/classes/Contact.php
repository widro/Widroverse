<?php

include('config/dbconnect.php');

class Contact{


	function list_contacts(){

		$all_contacts = array();

		$sql_contact = "
		select * from contacts
		order by contact_id DESC
		";

		$result_contact = mysql_query($sql_contact);

		while($row_contact=mysql_fetch_array($result_contact)){
			$contact_id = $row_contact['contact_id'];
			$contact_firstname = $row_contact['contact_firstname'];
			$contact_lastname = $row_contact['contact_lastname'];
			$contact_phone1 = $row_contact['contact_phone1'];
			$contact_phone2 = $row_contact['contact_phone2'];
			$contact_email = $row_contact['contact_email'];
			$contact_notes = $row_contact['contact_notes'];
			$contact_type = $row_contact['contact_type'];
			$contact_status = $row_contact['contact_status'];
			$contact_image = $row_contact['contact_image'];

			$all_contacts[] = array('contact_id'=>$contact_id, 'contact_firstname'=>$contact_firstname, 'contact_lastname'=>$contact_lastname, 'contact_phone1'=>$contact_phone1, 'contact_phone2'=>$contact_phone2, 'contact_email'=>$contact_email, 'contact_notes'=>$contact_notes, 'contact_type'=>$contact_type, 'contact_status'=>$contact_status, 'contact_image'=>$contact_image);
		}

		return $all_contacts;
	}

	function get_contact_by_id($contact_id){
		$sql_contact = "
		select * from contacts
		where contact_id = '$contact_id'
		limit 1
		";

		$result_contact = mysql_query($sql_contact);

		while($row_contact=mysql_fetch_array($result_contact)){
			$contact_id = $row_contact['contact_id'];
			$contact_firstname = $row_contact['contact_firstname'];
			$contact_lastname = $row_contact['contact_lastname'];
			$contact_phone1 = $row_contact['contact_phone1'];
			$contact_phone2 = $row_contact['contact_phone2'];
			$contact_email = $row_contact['contact_email'];
			$contact_notes = $row_contact['contact_notes'];
			$contact_type = $row_contact['contact_type'];
			$contact_status = $row_contact['contact_status'];
			$contact_image = $row_contact['contact_image'];

			$return_contact = array('contact_id'=>$contact_id, 'contact_firstname'=>$contact_firstname, 'contact_lastname'=>$contact_lastname, 'contact_phone1'=>$contact_phone1, 'contact_phone2'=>$contact_phone2, 'contact_email'=>$contact_email, 'contact_notes'=>$contact_notes, 'contact_type'=>$contact_type, 'contact_status'=>$contact_status, 'contact_image'=>$contact_image);
		}

		return $return_contact;
	}



}

?>