<?php 
/**
 * Template Name: Page - Right Sidebar
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
		<div id="page">
			<div id="container">
				<div class="page-wrapper">
					<div class="page-w600">
						<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post();?>	
									<!-- post container -->
									<div>
										<div class="meta-left-full-content">		
											<?php the_content();?>
										</div>
									<!-- Social Share -->
										<?php if(get_post_meta($post->ID, "social-share", true) == "Yes"): ?>
											<?php include('include/social-share/social-share.php');?>
										<?php endif?>
									<!-- Comment -->
										<div id="comment-area">
											<?php comments_template(); ?>
										</div>
										
									</div>
									
							<?php endwhile?>
						<?php endif ?>
					</div>
					<?php get_sidebar('page')?>	
				</div>
			</div>
		</div>
<?php get_footer();?>