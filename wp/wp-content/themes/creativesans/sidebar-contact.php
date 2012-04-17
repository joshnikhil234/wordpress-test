<?php 
/*
*Creativesans Page Sidebar
*/
?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
<!-- Siderbar -->
<div id="sidebar" class="alignright">
				<div class="sidebar-style">
						<div class="sidebar-wrapper">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Contact Sidebar") ) : ?>
							<?php endif; ?>
						</div>
				</div>
</div>