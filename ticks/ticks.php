<?php
	if($_GET['category_id']){
		$category_id = $_GET['category_id'];
	}
	else{
		$category_id = "";
	}
?>
<?php include('components/header.php'); ?>
<body>
<script>
    $(function(){
        $('#active_ticks').load('http://'+document.domain+'/ticks/loader.php?action=get_tickstream&category_id=<?php echo $category_id; ?>');
    });

</script>
<?php include('components/menu.php'); ?>

	<div class="container">
		<div class="col-lg-9">
			<h1>Tickstream</h1>

			<div class="col-lg-12 container_quickticks">
				<h2>XXXXXXXXXXXXXXXXXXX</h2>
				<div id="active_ticks"></div>
			</div>

		</div>
		<?php include('components/tickstream.php'); ?>
	</div>

<?php include('components/footer.php'); ?>