<?php 
/**
 * Template Name: Single
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
	<div id="container-wrapper">
		<div id="page" class="container-shadow">
			<div id="container">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
					<div class="page-wrapper">
					<div class="<?php if($sdt_post_layout=="Right Sidebar"): echo "sidebar-right"; elseif( $sdt_post_layout=="Left Sidebar"): echo "sidebar-left"; endif?>">
						<div class="page-<?php if($sdt_post_layout=="Left Sidebar"): echo "w600-right"; elseif($sdt_post_layout=="Right Sidebar"): echo "w600"; else: echo "w900"; endif?>">
						
						<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post();?>
									<!-- post container -->
								
								<div class="blog-sidebar-wrapper mb0">	
									<div class="space h5"></div>	
									<?php singlePostDatePost();?>	
									<div class="space h5"></div>
									<!-- post container -->
										
										<?php 
											$thumbnail_url = get_post_meta($post->ID, "thumbnail", true);	
										?>
									<?php if($thumbnail_url==null || $sdt_post_thumb_ena != "yes"):?>
										<?php if($sdt_post_date_ena == "yes"):?>
												<?php getPostDateNoThumb();?>
										<?php endif?>
									<?php else:?>	
											<div class="frame h200 alignleft relative">
										
												<a href="<?php echo $thumbnail_url; ?>" rel="prettyPhoto[pp_gal]" class="hover">
														<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $thumbnail_url ;?>&amp;h=200&amp;w=<?php if($sdt_post_layout=="Without Sidebar"): echo "908"; else: echo "608"; endif?>&amp;zc=1" alt="<?php the_title(); ?>" />
												</a>
												<?php getPostDate();?>
												
											</div>		
											<div class="space h5"></div>
									<?php endif ?>
											<div class="meta-left-full mt15 mb0">								
												<?php the_content();?>
											</div>	
								</div>
														
										<?php if(get_post_meta($post->ID, "social-share", true) == "Yes"): ?>
											<?php include('include/social-share/social-share.php');?>
										<?php endif?>									
										<div id="comment-area">
											<?php comments_template(); ?>
										</div>
									
									
							<?php endwhile?>
						<?php endif ?>
						</div>		
					<?php if($sdt_post_layout== "Left Sidebar"): ?>	
								<!-- Sidebar -->
								<?php get_sidebar('left');?>
							<?php endif ?>

					<?php if($sdt_post_layout=="Right Sidebar"): ?>	
						<!-- Sidebar -->
						<?php get_sidebar()?>
					<?php endif ?>
					</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>