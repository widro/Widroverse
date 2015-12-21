<?php

include('classes/Category.php');

$category = new Category;

$allcategories = $category->list_categories('');

print_r($allcategories)

?>