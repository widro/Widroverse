<?php

include('config/dbconnect.php');

class Book{


	function list_books(){

		$all_books = array();

		$sql_book = "
		select * from books
		where status = 1
		order by book_id DESC
		";

		$result_book = mysql_query($sql_book);

		while($row_book=mysql_fetch_array($result_book)){
			$book_id = $row_book['book_id'];
			$book_name = $row_book['book_name'];
			$book_image = $row_book['book_image'];
			$status = $row_book['status'];

			$all_books[] = array('book_id'=>$book_id, 'book_name'=>$book_name, 'book_image'=>$book_image, 'status'=>$status);
		}

		return $all_books;
	}


}

?>