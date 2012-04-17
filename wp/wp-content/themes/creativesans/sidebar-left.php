<?php 
/*
*Creativesans Sidebar
*/
?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
<!-- Siderbar -->
<div id="sidebar" class="ml20">
				<div class="sidebar-style alignleft">
						<div class="sidebar-wrapper ml0">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Top Sidebar Every Page") ) : ?>					  
							<?php endif; ?>
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Single Sidebar") ) : ?>
							<?php endif; ?>
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Bottom Sidebar Every Page") ) : ?>					  
							<?php endif; ?>
						</div>
				</div>
</div>