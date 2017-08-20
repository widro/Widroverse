<?php
$thisurl = $_SERVER['HTTP_HOST'];
if(($thisurl=="www.panosbrands.com")||($thisurl=="panosbrands.com")){
	$link = mysqli_connect("localhost", "panosbr_web", "H97fd89&F97f", "panosbr_drupal");
}
else{
	$link = mysqli_connect("localhost", "root", "", "widroverse");
}




if(isset($_GET['action'])){

$action = $_GET['action'];
}
else{

$action = "form";
}

$output = "";
$error = "";

if($action=="form"){


$pagetitle = "Enter contact information";


$output .= "
<form action='index.php?action=submit' method='post' id='tradeshowform'>
				<p id='couponerror'><?php echo $error ?></p>


<h4>PANOS Employee</h4><input type='text' id='panos_employee' name='panos_employee' class='form-control'><br>

<h4>Inquiry Type</h4><input type='text' id='inquiry_type' name='inquiry_type' class='form-control'><br>
<h4>Brand</h4><input type='text' id='brand' name='brand' class='form-control'><br>
<h4>Comments</h4><input type='text' id='comments' name='comments' class='form-control'><br>
<h4>Company</h4><input type='text' id='company' name='company' class='form-control'><br>
<h4>Business Card</h4><input type='text' id='business_card' name='business_card' class='form-control'><br>
<h4>First Name</h4><input type='text' id='first_name' name='first_name' class='form-control'><br>
<h4>Last Name</h4><input type='text' id='last_name' name='last_name' class='form-control'><br>
<h4>Title</h4><input type='text' id='title' name='title' class='form-control'><br>
<h4>Email</h4><input type='text' id='email' name='email' class='form-control'><br>
<h4>Company Website Address</h4><input type='text' id='website' name='website' class='form-control'><br>
<h4>Cell Phone #</h4><input type='text' id='cell_phone' name='cell_phone' class='form-control'><br>
<h4>Bus Phone #</h4><input type='text' id='business_phone' name='business_phone' class='form-control'><br>
<h4>Street Address</h4><input type='text' id='address' name='address' class='form-control'><br>
<h4>City</h4><input type='text' id='city' name='city' class='form-control'><br>
<!--<h4>State</h4><input type='text' id='state' name='state' class='form-control'><br>-->
<h4>State</h4>
		<select class='form-control' id='state' name='state'>
			<option value=''>N/A</option>
			<option value='AK'>Alaska</option>
			<option value='AL'>Alabama</option>
			<option value='AR'>Arkansas</option>
			<option value='AZ'>Arizona</option>
			<option value='CA'>California</option>
			<option value='CO'>Colorado</option>
			<option value='CT'>Connecticut</option>
			<option value='DC'>District of Columbia</option>
			<option value='DE'>Delaware</option>
			<option value='FL'>Florida</option>
			<option value='GA'>Georgia</option>
			<option value='HI'>Hawaii</option>
			<option value='IA'>Iowa</option>
			<option value='ID'>Idaho</option>
			<option value='IL'>Illinois</option>
			<option value='IN'>Indiana</option>
			<option value='KS'>Kansas</option>
			<option value='KY'>Kentucky</option>
			<option value='LA'>Louisiana</option>
			<option value='MA'>Massachusetts</option>
			<option value='MD'>Maryland</option>
			<option value='ME'>Maine</option>
			<option value='MI'>Michigan</option>
			<option value='MN'>Minnesota</option>
			<option value='MO'>Missouri</option>
			<option value='MS'>Mississippi</option>
			<option value='MT'>Montana</option>
			<option value='NC'>North Carolina</option>
			<option value='ND'>North Dakota</option>
			<option value='NE'>Nebraska</option>
			<option value='NH'>New Hampshire</option>
			<option value='NJ'>New Jersey</option>
			<option value='NM'>New Mexico</option>
			<option value='NV'>Nevada</option>
			<option value='NY'>New York</option>
			<option value='OH'>Ohio</option>
			<option value='OK'>Oklahoma</option>
			<option value='OR'>Oregon</option>
			<option value='PA'>Pennsylvania</option>
			<option value='PR'>Puerto Rico</option>
			<option value='RI'>Rhode Island</option>
			<option value='SC'>South Carolina</option>
			<option value='SD'>South Dakota</option>
			<option value='TN'>Tennessee</option>
			<option value='TX'>Texas</option>
			<option value='UT'>Utah</option>
			<option value='VA'>Virginia</option>
			<option value='VT'>Vermont</option>
			<option value='WA'>Washington</option>
			<option value='WI'>Wisconsin</option>
			<option value='WV'>West Virginia</option>
			<option value='WY'>Wyoming</option>
		</select>
<br>


<h4>Zip</h4><input type='text' id='zip' name='zip' class='form-control'><br>
<h4>Country</h4><input type='text' id='country' name='country' class='form-control'><br>

  <button type='submit' class='btn btn-default'>Submit</button>


</form>
";
}


if($action=="submit"){

$pagetitle = "Information entered";

$panos_employee = $_POST['panos_employee'];
$inquiry_type = $_POST['inquiry_type'];
$brand = $_POST['brand'];
$comments = $_POST['comments'];
$company = $_POST['company'];
$business_card = $_POST['business_card'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$title = $_POST['title'];
$email = $_POST['email'];
$website = $_POST['website'];
$cell_phone = $_POST['cell_phone'];
$business_phone = $_POST['business_phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
 

$sql = "
INSERT INTO tradeshow (panos_employee, inquiry_type, brand, comments, company, business_card, first_name, last_name, title, email, website, cell_phone, business_phone, address, city, state, zip, country) VALUES ('', '$panos_employee', '$inquiry_type', '$brand', '$comments', '$company', '$business_card', '$first_name', '$last_name', '$title', '$email', '$website', '$cell_phone', '$business_phone', '$address', '$city', '$state', '$zip', '$country');
";

//echo $sql;

	$result = mysqli_query($link, $sql);



$output .= '
<a href="index.php?action=export">download as XLS</a>
';


}

if($action=="list"){

$pagetitle = "Enter contact information";


$output .= "





";


}

if($action=="export"){

	//$result = $db_con->query('SELECT * FROM tradeshow');
	$result = mysqli_query($link, 'SELECT * FROM tradeshow');
	if (!$result) die('Couldn\'t fetch records');
	$num_fields = mysqli_num_fields($result);
	$headers = array();
	for ($i = 0; $i < $num_fields; $i++) {
	    $headers[] = mysqli_fetch_field_direct($result,$i)->name;
	}
	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="export.csv"');
	    header('Pragma: no-cache');
	    header('Expires: 0');
	    fputcsv($fp, $headers);
	    while ($row = $result->fetch_array(MYSQLI_NUM)) {
	        fputcsv($fp, array_values($row));
	    }
	    die;
	}
}




?>
<html>
<head>
<title>PANOS brands - Trade Show</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

				<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function(event) {

	document.getElementById('couponbutton').onclick = function(){
		var error = false;
		var errortext = "";

		var couponfirstname = document.getElementById('couponfirstname').value;
		var couponlastname = document.getElementById('couponlastname').value;
		var couponemailaddress = document.getElementById('couponemailaddress').value;
		var couponzip = document.getElementById('couponzip').value;

		if(couponfirstname==""){
			error = true;
			errortext += "Please fill in first name!<br>";
			document.getElementById("firstname_label").style.color = "red";
		}
		else{
			document.getElementById("firstname_label").style.color = "black";
		}

		if(couponlastname==""){
			error = true;
			errortext += "Please fill in last name!<br>";
			document.getElementById("lastname_label").style.color = "red";
		}
		else{
			document.getElementById("lastname_label").style.color = "black";
		}

		if(couponemailaddress==""){
			error = true;
			errortext += "Please fill in email address!<br>";
			document.getElementById("emailaddress_label").style.color = "red";
		}
		else{
			document.getElementById("emailaddress_label").style.color = "black";
		}

		if(couponzip==""){
			error = true;
			errortext += "Please fill in zip code!<br>";
			document.getElementById("couponzip_label").style.color = "red";
		}
		else{
			document.getElementById("couponzip_label").style.color = "black";
		}


		if(!error){
			document.getElementById('couponform').submit();
		}
		else{
			document.getElementById("couponerror").innerHTML = errortext;

		}
	};


});



</script>



</head>
<body>

<img src="http://www.panosbrands.com/sites/default/files/panos_logo.gif">
<h1><?php echo $pagetitle; ?></h1>

<?php echo $output; ?>






</body>
</html>