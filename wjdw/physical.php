<?
$thisurl =  $_SERVER['HTTP_HOST'];

if(($thisurl=="www.widroverse.com")||($thisurl=="widroverse.com")){
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}
else{
	$link = mysqli_connect("mysql.widroverse.com", "widroverse", "X3wmxMxgfFWWkk}", "widroverse");
}


if($_GET['category']){
	$category = $_GET['category'];
	$sqladd = "WHERE category = '$category'";
}
elseif($_POST['b']){
	$category = $_POST['category'];
	$sqladd = "WHERE category = '$category'";
}

// categories physical
$sqlphysicalcategory = "
SELECT DISTINCT`category` 
FROM `physical`
ORDER BY `category`
";

$resultphysicalcategory = mysqli_query($link, $sqlphysicalcategory);
$i=0;
while($rowphysicalcategory = mysqli_fetch_array($resultphysicalcategory)){

$category = $rowphysicalcategory['category'];
$header_links .= "<a href='physical.php?category=$category'>$category</a> | ";
}


// output physical
$sqlphysical = "
SELECT `physical_id`, `title`, `category`, `edition` 
FROM `physical`
$sqladd
ORDER BY `title`
";

$resultphysical = mysqli_query($link, $sqlphysical);
$i=0;
while($rowphysical = mysqli_fetch_array($resultphysical)){

$title = $rowphysical['title'];
$category = $rowphysical['category'];
$edition = $rowphysical['edition'];


if($i%2==0){
$displayblock .= "

<tr>
<td bgcolor=333333 valign=top>$title</td>
<td bgcolor=333333 valign=top>$category</td>
<td bgcolor=333333 valign=top>$edition</td>
</tr>

";
}
else{
$displayblock .= "

<tr>
<td bgcolor=666666 valign=top>$title</td>
<td bgcolor=666666 valign=top>$category</td>
<td bgcolor=666666 valign=top>$edition</td>
</tr>

";
}


$i++;
}

?>






<?php include('includes/header.php'); ?>
<?php echo $header_links; ?>

<table width=600 cellpadding=25>
<h1>Physical</h1>
<br>
<table width=600 cellpadding=5>
<tr>
<td valign=top>Date</td>
<td valign=top>Mix</td>
<td valign=top>Track</td>
</tr>
<?=$displayblock?>
</table>

<?php include('includes/footer.php'); ?>