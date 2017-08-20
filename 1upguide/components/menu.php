<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><a href="/"><img src="<?php echo $brandlogo; ?>" style="" height="25" align=left border=0></a><?php echo $brandname; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>


			<?php
        $items = new Items;

				foreach($menu_types as $type){
					echo '
			        <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-transform: capitalize;">'.$type.' <span class="caret"></span></a>
					<ul class="dropdown-menu">
					';
					$parameters = $items->list_parameter($dbtable, $type, 20, $link);
					foreach($parameters as $entry){
						echo "<li><a href=\"index.php?brandid=". $brandid . "&" .$type."=".$entry['parameter']."\">".$entry['parameter']." (".$entry['total'].")</a></li>";
					}
					echo "</ul></li>";
				}
			?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Widroverse Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brands <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/1upguide/index.php?brandid=1">1upGuide</a></li>
            <li><a href="/1upguide/index.php?brandid=2">Neon Cinema</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/1upguide/index.php?brandid=3">CDs</a></li>
            <li><a href="/1upguide/index.php?brandid=4">Books</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/1upguide/index.php?brandid=1">1upGuide</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
