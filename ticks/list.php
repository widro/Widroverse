<?php include('components/header.php'); ?>
<body>
<?php include('components/menu.php'); ?>

	<div class="container">
		<div class="col-lg-9">
			<h1>LIST</h1>

			<div class="alert alert-success alert-dismissible" role="alert" id="master_error_div">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <div id="error_txt_div"></div>
			</div>







		</div>
		<?php include('components/tickstream.php'); ?>
	</div>

<?php include('components/footer.php'); ?>
