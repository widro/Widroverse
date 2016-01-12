    $(function(){
        $('#tickstream_content').load('http://'+document.domain+'/ticks/loader.php?action=get_tickstream&category_id=7&tick_date_start=2016-01-07&tick_date_end=2016-01-09');
        $('#active_books_content').load('http://'+document.domain+'/ticks/loader.php?action=get_active_books');
        $('#active_games_content').load('http://'+document.domain+'/ticks/loader.php?action=get_active_games');
        //$('#active_inventory').load('http://'+document.domain+'/ticks/loader.php?action=get_inventory');
        $('#active_stats').load('http://'+document.domain+'/ticks/loader.php?action=get_stats');
    });

	function refreshtickstream(){
		$('#tickstream_content').load('http://widroverse.localhost/ticks/loader.php?action=get_tickstream');
              alert("tickstream refrehsed!");
	}


	function error_divs(type, msg){
		$("#master_error_div").removeClass("alert-success").removeClass("alert-info").removeClass("alert-danger").removeClass("alert-warning");
		$("#master_error_div").addClass(type);
		$("#master_error_div div#error_txt_div").html(msg);

	}

	function insert_tick_master(data){
        $.ajax({
            url: '../loader.php?action=insert_tick',
            type: 'POST',
            data: data, // An object with the key 'submit' and value 'true;
            success: function (result) {
              //alert("Your tick has been saved");
              error_divs("alert-success", "Your tick has been saved")

		        refreshtickstream();
            }
        });  

	}




jQuery(document).ready(function($){ //fire on DOM ready

    $('#insert_click_form_button').click(function() { 
	  //insert_tick_name
	  var insert_tick_name = $('#insert_tick_name').val();
	  alert(insert_tick_name);
	  var tickform_dateoverride = $('#tickform_dateoverride').val();
	  var tickform_category = $('#tickform_category').val();
      insert_tick_master({'submit':true, 'tick_name':insert_tick_name, 'tickform_dateoverride':tickform_dateoverride, 'tickform_category':tickform_category});
    });




	 $(document).on("click",".quicktickbutton",function(e){

    	var quick_tick_button_id = $(this).attr('id');
    	var quick_tick_vars = quick_tick_button_id.split("|");

    	var active_id = quick_tick_vars[0].substring(2);
    	var category_id = quick_tick_vars[1].substring(3);
    	var tick_name = quick_tick_vars[2].replace("_", " ");;

      insert_tick_master({'submit':true, 'tick_name':tick_name, 'category':category_id, 'active_id':active_id});

	 });











    $('#insert_xls_paste_button').click(function() { 
	  //insert_tick_name
	  var xls_paste_content = $('#xls_paste_content').val();
	  alert(xls_paste_content);

        $.ajax({
            url: '../loader.php?action=insert_xls_paste',
            type: 'POST',
            data: {'submit':true, 'xls_paste_content':xls_paste_content}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              alert(result);
            }
        });  
    });



});