<?php 
/*
*Creativesans Blog Sidebar
*/
?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
<!-- Siderbar -->
<div id="sidebar" class="ml20">
				<div class="sidebar-style sidebar-left">
						<div class="sidebar-wrapper">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Top Sidebar Every Page") ) : ?>					  
							<?php endif; ?>
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Blog Sidebar") ) : ?>
							<?php endif; ?>
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar("Bottom Sidebar Every Page") ) : ?>					  
							<?php endif; ?>
						</div>
				</div>
</div>