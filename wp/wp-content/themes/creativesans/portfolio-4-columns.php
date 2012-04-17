<?php 
/**
 * Template Name: Portfolio - 4 columns
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
		<div id="page">
			<div id="container">
				<div class="portfolio-wrapper">
				<?php //Show the content?>
				<div class="portfolio-content">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>								
							<?php the_content();?>
						<?php endwhile?>
					<?php endif?>
				</div>
					<?php include('include/portfolio/portfolio-header.php');?>
						<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post();?>		
								<?php include('include/portfolio/portfolio-check-case.php');?>
									<?php 
										$getcat = get_the_terms ($post->ID, 'port-cat');
									?>
										<div class="<?php foreach( $getcat as $category ) { echo str_replace (" ", "",$category->name). '-forfilter '; } ?>All port-4-wrapper h240 portfolio-item">
													<div class="h126 frame relative">
														<div class="hover-port relative h126 <?php echo $zoom;?>">
																<div class="<?php if($th_lightbox || $th_post): echo "portfolio-hover"; endif?>">
																	
																	
																		<?php if($th_lightbox):?>
																			<div class="portfolio-zoom top12 left12">
																			<?php if($zoom_sp):?>
																				<a href="<?php echo get_post_meta($post->ID, "specified-image", true);?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/zoom.png" alt=""/></a>
																			<?php elseif($zoom_video):?>				
																				<a href="<?php echo get_post_meta($post->ID, "url-video", true);?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/zoom-video.png" alt=""/></a>
																			<?php else:?>
																				<a href="<?php echo $image_url[0] ;?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/zoom.png" alt=""/></a>
																			<?php endif;?>
																			</div>
																		
																		<div class="port-hover-tl"></div>
																		<?php endif ?>
																		<?php if($th_post):?>
																		<div class="portfolio-h-link bottom3 right10">
																			<a href="<?php if($spec_link == ""):the_permalink(); else: echo $spec_link; endif?>"><img src="<?php echo get_template_directory_uri(); ?>/img/link.png" alt=""/></a>
																		</div>
																		<div class="port-hover-br"></div>
																		<?php endif;?>
																		
																	</div>
															<div>
																<?php //Check wheter thumbnail exists ?>
																<?php if($image_id  == null):?>
																	<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/img/default.jpg&amp;h=126&amp;w=203&amp;zc=1" alt="<?php the_title(); ?>"/>
																<?php else: ?>
																	<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0];?>&amp;h=126&amp;w=203&amp;zc=1" alt="<?php the_title(); ?>"/>
																<?php endif ?>
															</div>
														</div>
													</div>
											<div class="portfolio-link">
												<h4>
												<a href="<?php if($spec_link == ""):the_permalink(); else: echo $spec_link; endif?>">
													<?php the_title();?>
												</a>
												</h4>
												<?php echo mb_substr(get_the_excerpt(),0,80)."...";?>
											</div>					
										</div>		
						<?php endwhile?>		
					<?php endif ?>	
					<?php // ul started in portfolo-header?>
					</ul>
									<!-- Social Share -->
										<?php if( $post_share == "Yes"): ?>
											<?php include('include/social-share/social-share.php');?>
										<?php endif?>	
				<div class="port-4-pagination">
					<?php if (function_exists("pagination")) {
							pagination();
					} ?>
				</div>
		
			</div>
		</div>
<?php get_footer();?>