<?php include('components/header.php'); ?>
<body>
<?php include('components/menu.php'); ?>

	<div class="container">
		<div class="col-lg-9">
			<h1>Welcome to the All-New Widroverse TickAdmin</h1>

			<div class="alert alert-success alert-dismissible" role="alert" id="master_error_div">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <div id="error_txt_div"></div>
			</div>

			<div class="col-lg-12 container_quickticks">
				<nav>
				  <ul class="pagination">
				    <li>
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">Thu</a></li>
				    <li><a href="#">Fri</a></li>
				    <li><a href="#">Sat</a></li>
				    <li><a href="#">SUNDAY (3)</a></li>
				    <li><a href="#">Mon</a></li>
				    <li><a href="#">Tue</a></li>
				    <li><a href="#">Wed</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>

				  <button type="button" class="btn btn-primary quicktickbutton" id="id6|cat12|shower_time">Shower</button>

				  <button type="button" class="btn btn-success quicktickbutton" id="id6|cat12|shower_time">Shower</button>

				  <button type="button" class="btn btn-info quicktickbutton" id="id6|cat12|shower_time">Shower</button>

				  <button type="button" class="btn btn-warning quicktickbutton" id="id6|cat12|shower_time">Shower</button>

				  <button type="button" class="btn btn-danger quicktickbutton" id="id6|cat12|shower_time">Shower</button>

			</div>


			<div class="col-lg-12 container_tickform">
				<h2>Tick Form</h2>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Tick Name" aria-describedby="tick_name" id="insert_tick_name">
				</div>

				<div class="input-group">
				  <select id="tickform_dateoverride" class="form-control">
				  		<option value=''>--- Date Override ---</option>
				  		<option value='2016-01-01'>2016-01-01</option>
				  		<option value='2016-01-02'>2016-01-02</option>
				  		<option value='2016-01-03'>2016-01-03</option>
				  		<option value='2016-01-04'>2016-01-04</option>
				  		<option value='2016-01-05'>2016-01-05</option>
				  		<option value='2016-01-06'>2016-01-06</option>
				  </select>
				</div>

				<div class="input-group">
				  <select id="tickform_category" class="form-control">
				  		<option value=''>--- Category ---</option>
				  		<option value='1'>Life</option>
				  		<option value='2'>Video Games</option>
				  		<option value='3'>Food</option>
				  		<option value='4'>Cooking</option>
				  		<option value='5'>Exercise</option>
				  		<option value='6'>Books</option>
				  		<option value='7'>Inside Pulse</option>
				  		<option value='8'>GameCo</option>
				  		<option value='9'>Panos Brands</option>
				  		<option value='10'>Music</option>
				  		<option value='11'>Inventory</option>
				  		<option value='12'>Movies</option>
				  		<option value='13'>TV</option>
				  		<option value='14'>Digital Grout</option>
				  		<option value='15'>Widro.com</option>
				  		<option value='16'>Diehard Gamefan</option>
				  		<option value='17'>At The Gotham</option>
				  		<option value='18'>1upGuide</option>
				  		<option value='19'>Widroverse</option>
				  </select>
				</div>


				  <button type="button" class="btn btn-default" id="insert_click_form_button">ADD TICK</button>

			</div>


			<div class="col-lg-12 container_quickticks">
				<h2>QuickTick Buttons</h2>


				  <button type="button" class="btn btn-primary quicktickbutton" id="id6|cat12|shower_time">nails</button>

				  <button type="button" class="btn btn-success quicktickbutton" id="id6|cat12|shower_time">toenails</button>

				  <button type="button" class="btn btn-info quicktickbutton" id="id6|cat12|shower_time">laundry</button>

				  <button type="button" class="btn btn-warning quicktickbutton" id="id6|cat12|shower_time">shave</button>

				  <button type="button" class="btn btn-danger quicktickbutton" id="id6|cat12|shower_time">nanys maids</button>

				  <button type="button" class="btn btn-primary quicktickbutton" id="id6|cat12|shower_time">haircut</button>

				  <button type="button" class="btn btn-success quicktickbutton" id="id6|cat12|shower_time">jc greenfield</button>

				  

				  <button type="button" class="btn btn-info quicktickbutton" id="id6|cat12|shower_time">laundry</button>

				  <button type="button" class="btn btn-warning quicktickbutton" id="id6|cat12|shower_time">shave</button>

				  <button type="button" class="btn btn-danger quicktickbutton" id="id6|cat12|shower_time">nanys maids</button>









				<!-- Split button -->
				<div class="btn-group">
				  <button type="button" class="btn btn-danger">Action</button>
				  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="caret"></span>
				    <span class="sr-only">Toggle Dropdown</span>
				  </button>
				  <ul class="dropdown-menu">
				    <li><a href="#">Action</a></li>
				    <li><a href="#">Another action</a></li>
				    <li><a href="#">Something else here</a></li>
				    <li role="separator" class="divider"></li>
				    <li><a href="#">Separated link</a></li>
				  </ul>
				</div>
			</div>

			<div class="col-lg-12 container_quickticks">
				<h2>Daily Scavenger Hunt/Sched Items</h2>

				  <button type="button" class="btn btn-primary quicktickbutton" id="id1|cat3|fruit">fruit</button>

				  <button type="button" class="btn btn-success quicktickbutton" id="id1|cat1|call_someone">call someone</button>

				  <button type="button" class="btn btn-info quicktickbutton" id="id1|cat5|exercise">exercise</button>

				  <button type="button" class="btn btn-warning quicktickbutton" id="id1|cat3|lunch">lunch</button>

				  <button type="button" class="btn btn-danger quicktickbutton" id="id1|cat3|dinner">dinner</button>

				  <button type="button" class="btn btn-primary quicktickbutton" id="id1|cat1|shower">shower</button>

				  <button type="button" class="btn btn-success quicktickbutton" id="id1|cat1|email_someone">email someone</button>

				  <button type="button" class="btn btn-info quicktickbutton" id="id1|cat1|took_vitamin_d">vitamin D</button>

				  <button type="button" class="btn btn-warning quicktickbutton" id="id1|cat1|read_esports_article">esports article</button>

				  <button type="button" class="btn btn-danger quicktickbutton" id="id1|cat1|read_mets_article">mets article</button>

			</div>	



			<div class="col-lg-12 container_quickticks">
				<h2>API to Tick Buttons</h2>

				  <button type="button" class="btn btn-primary quicktickbutton" id="twitter">twitter</button>

				  <button type="button" class="btn btn-success quicktickbutton" id="facebook">facebook</button>

				  <button type="button" class="btn btn-info quicktickbutton" id="wordpress">wordpress rss</button>

				  <button type="button" class="btn btn-warning quicktickbutton" id="tumblr">tumblr</button>

				  <button type="button" class="btn btn-danger quicktickbutton" id="git">git</button>

			</div>	

			<div class="col-lg-12 container_quickticks">
				<h2>Paste Excel</h2>
				<textarea id="xls_paste_content">Enter Text here</textarea>
				  <button type="button" class="btn btn-default" id="insert_xls_paste_button">ADD XLS PASTE</button>



			</div>

			<div class="col-lg-12 container_quickticks">
				<h3>Active Books</h3>
				<div id="active_books_content"></div>
			</div>

			<div class="col-lg-12 container_quickticks">
				<h3>THE20</h3>
				<div id="active_games_content"></div>
			</div>




			<div class="col-lg-12 container_quickticks">
				<h2>Inventory</h2>
				<div id="active_inventory"></div>
			</div>




			<div class="col-lg-12 container_quickticks">
				<h2>Checklists</h2>
				<div id="xxxxxxxxxx"></div>
			</div>



			<div class="col-lg-12 container_quickticks">
				<h2>Stats</h2>
				<div id="active_stats"></div>
			</div>









		</div>
		<?php include('components/tickstream.php'); ?>
	</div>

<?php include('components/footer.php'); ?>
