<?php 
/**
 * Template Name: Blog - Right Sidebar
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
		<div id="page">
			<div id="container">
				<div class="page-wrapper">
					<div class="page-w600">
					
			<!-- get Cat ID -->
			<?php $cat_id = get_post_meta($post->ID, "cat-id-blog", true); ?>
			<?php  $blog_num = get_post_meta($post->ID, "blog-item-number", true); ?>
			<?php	query_posts('showposts='.$blog_num.'&cat='.get_cat_ID(htmlspecialchars($cat_id)).'&paged='.$paged)?>
				 	<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>	
							<div class="blog-sidebar-wrapper">				
									<!-- post container -->
										
										<?php  
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'large', true);
										?>
									
									
									<?php if($image_id!=null):?>	
											<div class="space h5"></div>
											<div class="frame h200 alignleft relative">
										
												<a href="<?php the_permalink();?>" class="hover">
														<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0] ;?>&amp;h=200&amp;w=608&amp;zc=1" alt="<?php the_title(); ?>" />
												</a>
												<?php getPostDate();?>
												
											</div>		
											
											<div class="space h5"></div>
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
										
										<?php if($image_id==null):?>
												<?php getPostDateNoThumb();?>
										<?php endif ?>
										
								<div class="blog-sidebar-content">																
										<div class="meta-left-full">								
											<?php echo mb_substr(get_the_excerpt(),0,300)."...";?>
										</div>
										
								<?php //end blog sidebar content ?>
								</div>
								<div class="space h30"></div>
							</div>
						<?php endwhile?>
					<?php endif ?>
					<div class="space h15"></div>
				<?php if (function_exists("pagination")) {
						global $additional_loop;
						pagination();
				} ?>
			</div>
					<?php get_sidebar('blog')?>	
					
				</div>
			</div>
		</div>
<?php get_footer();?>