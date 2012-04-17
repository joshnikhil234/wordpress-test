<?php 
/**
 * Template Name: Blog - Full Width
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
		<div id="page">
			<div id="container">
				<div class="page-wrapper-full">
			<!-- get Cat ID -->
			<?php  $cat_id = get_post_meta($post->ID, "cat-id-blog", true); ?>			
			<?php  $blog_item_number = get_post_meta($post->ID, "port-cat", true); ?>
			<?php	query_posts('showposts='.$blog_item_number.'&cat='.get_cat_ID(htmlspecialchars($cat_id)).'&paged='.$paged)?>
				 	<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>	
							<div class="blog-full-wrapper">
								<div class="blog-full-content">							
									<!-- post container -->
											
											<?php  
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'large', true);
											?>
											<?php if($image_id == null):?>
											
											<?php else: ?>
											<div class="blog-full-thumb">
												<div class="frame h168 hover">
														<a href="<?php the_permalink();?>">
																<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0] ;?>&amp;h=168&amp;w=337&amp;zc=1" alt="<?php the_title(); ?>" />
														</a>
														<?php getPostDate();?>
												</div>			
											</div>								
											<?php endif ?>		
												<!-- Title -->
											<div class="title-wrapper">
												<div class="title">
													<h4>
														<a href="<?php the_permalink();?>">
															<?php the_title();?>
														</a>
													</h4>
												</div>
											</div>			
											<?php singlePostDate();?>	
											<?php if($image_id == null):?>
												<?php getPostDateNoThumb();?>
											<?php endif?>									
										<div class="meta-left-full mt12">								
											<?php echo mb_substr(get_the_excerpt(),0,350)."...";?>
										</div>
								</div>
							</div>
						<?php endwhile?>
					<?php endif ?>
				<?php if (function_exists("pagination")){
						pagination();
				} ?>
			
			<?php //end page-wrapper?>
			</div>
		</div>
	</div>
<?php get_footer();?>