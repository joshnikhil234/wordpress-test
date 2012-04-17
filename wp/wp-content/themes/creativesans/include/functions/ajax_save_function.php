 <script type="text/javascript">
	jQuery(document).ready(function($) {
	  jQuery('#admin-panel').submit(function() {
	 
	  jQuery('.load-save').html('<img src="<?php echo get_template_directory_uri();?>/css/panel-img/load-save.gif">').show();
	  
		  var data = jQuery(this).serialize();
		  jQuery.post(ajaxurl, data, function(response) {
			  if(response == 1) {
				  show_message(1);
				  t = setTimeout('fade_message()', 1700);
			  } else {
				  show_message(2);
				  t = setTimeout('fade_message()', 1700);
			  }
		  });
		  
		  
		  
		  return false;
	  });	  

	});
	function show_message(n) {
		if(n == 1) {
			jQuery('#saved').html('<div class="arrow-save"><?php _e('Options saved.'); ?></div>').show();
			jQuery('.load-save').hide();
	  
		} else {
			//jQuery('#saved').html('<div id="message" class="error fade"><p><strong><?php _e('Options could not be saved.'); ?></strong></p></div>').show();
			jQuery('#saved').html('<div class="arrow-save"><?php _e('Options saved.'); ?></div>').show();
			jQuery('.load-save').hide();
		}
	}
	function fade_message() {
		jQuery('#saved').fadeOut(1000);
		clearTimeout(t);
	}
	</script>