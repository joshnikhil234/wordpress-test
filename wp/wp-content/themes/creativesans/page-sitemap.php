<?php 
/**
 * Template Name: Page - Site Map
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
		<div id="page">
			<div id="container">
				<div class="page-wrapper-full">
					<div id="sidebar" class="mr25 ml0 w290">
						<div class="sidebar-style right">
								<div class="sidebar-wrapper">
									<?php if ( !function_exists('dynamic_sidebar')
										|| !dynamic_sidebar("Sitemap Column 1") ) : ?>					  
									<?php endif; ?>
								</div>
						</div>
					</div>
					<div id="sidebar" class="mr25 ml0 w290">
						<div class="sidebar-style right">
								<div class="sidebar-wrapper">
									<?php if ( !function_exists('dynamic_sidebar')
										|| !dynamic_sidebar("Sitemap Column 2") ) : ?>					  
									<?php endif; ?>
								</div>
						</div>
					</div>
					<div id="sidebar" class="mr0 ml0 w290 last">
						<div class="sidebar-style right">
								<div class="sidebar-wrapper">
									<?php if ( !function_exists('dynamic_sidebar')
										|| !dynamic_sidebar("Sitemap Column 3") ) : ?>					  
									<?php endif; ?>
								</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
<?php get_footer();?>