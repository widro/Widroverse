<?php include('components/header.php'); ?>
<body>
<script>
    $(function(){
        $('#active_recipes').load('http://'+document.domain+'/ticks/loader.php?action=get_active_recipes');
    });

</script>
<?php include('components/menu.php'); ?>

	<div class="container">
		<div class="col-lg-9">
			<h1>Recipes</h1>

			<div class="col-lg-12 container_quickticks">
				<h2>XXXXXXXXXXXXXXXXXXX</h2>
				<div id="active_recipes"></div>
			</div>

		</div>
		<?php include('components/tickstream.php'); ?>
	</div>

<?php include('components/footer.php'); ?>