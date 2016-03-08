<?php
/* db connection  */
include('../config/dbconnect.php'); 


// get variables

if($_POST['titlecode']){
	$titlecode = $_POST['titlecode'];
}elseif($_GET['titlecode']){
	$titlecode = $_GET['titlecode'];
}

if($_POST['date']){
	$date = $_POST['date'];
}elseif($_GET['date']){
	$date = $_GET['date'];
}

if($_POST['winner']){
	$winner = $_POST['winner'];
}elseif($_GET['winner']){
	$winner = $_GET['winner'];
}

if($_POST['loser']){
	$loser = $_POST['loser'];
}elseif($_GET['loser']){
	$loser = $_GET['loser'];
}

if($_POST['TopicID1']){
	$TopicID1 = $_POST['TopicID1'];
}elseif($_GET['TopicID1']){
	$TopicID1 = $_GET['TopicID1'];
}

if($_POST['TopicID2']){
	$TopicID2 = $_POST['TopicID2'];
}elseif($_GET['TopicID2']){
	$TopicID2 = $_GET['TopicID2'];
}

if($_POST['TopicID3']){
	$TopicID3 = $_POST['TopicID3'];
}elseif($_GET['TopicID3']){
	$TopicID3 = $_GET['TopicID3'];
}

if($_POST['titles_id']){
	$titles_id = $_POST['titles_id'];
}elseif($_GET['titles_id']){
	$titles_id = $_GET['titles_id'];
}

if($_POST['submitted']){
	$submitted = $_POST['submitted'];
}elseif($_GET['submitted']){
	$submitted = $_GET['submitted'];
}

if($_POST['submit']){
	$submit = $_POST['submit'];
}elseif($_GET['submit']){
	$submit = $_GET['submit'];
}

if($_POST['year']){
	$year = $_POST['year'];
}elseif($_GET['year']){
	$year = $_GET['year'];
}

if($_POST['month']){
	$month = $_POST['month'];
}elseif($_GET['month']){
	$month = $_GET['month'];
}

if($_POST['day']){
	$day = $_POST['day'];
}elseif($_GET['day']){
	$day = $_GET['day'];
}

if($submitted == 'yes'){

	/* check to see if date was specified */
	if ($year == "none" ) {
	$date = date("Ymd");
	}
	else {
	$date = $year . $month . $day;
	}

	/* check to see if all form elements are filled out */
	if (($winner == "") || ($loser == "" ) || ($date == "" ) || ($titlecode == "" )){

	echo "You omitted something. Either press back, or <a href=\"titlesposting.php\">click here</a>. Note: Pressing back is better, since the stuff you did type will remain in the correct spots. ";
	exit;
	}


	/* query to add item to db  */

	$sql= "INSERT INTO titles (winner, loser, date, TopicID1, TopicID2, TopicID3, titlecode, titles_id) VALUES (\"$winner\",\"$loser\",\"$date\",\"$TopicID1\",\"$TopicID2\",\"$TopicID3\",\"$titlecode\", \"\")";
echo $sql;

	$result = mysql_query($sql);
echo $result;

	/* Outputted HTML showing what was posted  */
echo"

	<html>
	<head>
	<name>

	</name>
	</head>
	<body>
	Thanks for posting!
	<p>
	<a href=http://www.insidepulse.com/titles.php?titlecode=$titlecode>Click here</a> to see the post
	<p>
	<a href=\"titlesposting.php\">Back</a>
	</body>
	</html>
";

}
else{


$sql2= "
SELECT titlecode, title
FROM titlecode
ORDER by title
";

$result2 = mysql_query($sql2) or die("Couldn't execute query.");

while ($titlecode = mysql_fetch_array($result2))
{
$output1 .= "<option value=\"$titlecode[0]\">$titlecode[1]</option>";
}



echo "

<html>
<head>
<title>Post titles</title>
</head>
<body>
<form method=post>
The default is for the post to be at the current date and time. Only change the dropdowns if you want to have a specific timestamp.
<p>
Date:
<select name=month>
<option value=none>---select one---</option>
<option value=01>January
<option value=02>February
<option value=03>March
<option value=04>April
<option value=05>May
<option value=06>June
<option value=07>July
<option value=08>August
<option value=09>September
<option value=10>October
<option value=11>November
<option value=12>December
</select>

<select name=day>
<option value=none>---select one---</option>
<option value=01>01
<option value=02>02
<option value=03>03
<option value=04>04
<option value=05>05
<option value=06>06
<option value=07>07
<option value=08>08
<option value=09>09
<option value=10>10
<option value=11>11
<option value=12>12
<option value=13>13
<option value=14>14
<option value=15>15
<option value=16>16
<option value=17>17
<option value=18>18
<option value=19>19
<option value=20>20
<option value=21>21
<option value=22>22
<option value=23>23
<option value=24>24
<option value=25>25
<option value=26>26
<option value=27>27
<option value=28>28
<option value=29>29
<option value=30>30
<option value=31>31
</select>

<select name=year>
<option value=none>---select one---</option>
";
for($i=2008; $i>1947; $i--){

	echo "<option value=$i>$i</option>";

}

echo "
</select>

<p>

Title:
<select name='titlecode'>
<option value=none>---select one---</option>
$output1
</select>
<p>

Champion: <input type=text name='winner' value='' size=50><br>

Who Was Defeated: <input type=text name='loser' value='' size=50><p>

<p>
<input type=hidden name=submitted value=yes>
<input type=submit value=submit name=submit>
</form>
</body>
</html>
";
}
?>
