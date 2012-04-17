<script type="text/javascript">
	<?php //Add current-menu to home menu ?>
			jQuery(window).ready(function() {
				<?php if(is_home()):?> 
				jQuery("#superfish-wrapper li:contains(\'HOME\')").addClass("current-menu-item");
				jQuery("#superfish-wrapper li:contains(\'home\')").addClass("current-menu-item");
				jQuery("#superfish-wrapper li:contains(\'Home\')").addClass("current-menu-item");
				<?php endif?>
			});
</script>