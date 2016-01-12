<?php
	if($_GET['inventory_type']){
		$inventory_type = $_GET['inventory_type'];
	}
	else{
		$inventory_type = "mug";
	}
?>
<?php include('components/header.php'); ?>
<body>
<script>
    $(function(){
        $('#active_inventory').load('http://'+document.domain+'/ticks/loader.php?action=get_inventory&inventory_type=<?php echo $inventory_type; ?>');
    });

</script>
<?php include('components/menu.php'); ?>

	<div class="container">
		<div class="col-lg-9">
			<h1>Inventory</h1>

			<div class="col-lg-12 container_quickticks">
				<h2>XXXXXXXXXXXXXXXXXXX</h2>
				<div id="active_inventory"></div>
			</div>

		</div>
		<?php include('components/tickstream.php'); ?>
	</div>

<?php include('components/footer.php'); ?>