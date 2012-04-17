<?php 
/*
*Creativesans Index
*/
?>
<?php get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
<!-- Check wheter slider is enabled -->
	
	
<div class="body-3">	
	<?php //Contanier?>		
	<div id="container-inner-main" class="border-shadow-top">
			
		<?php //Stunngi text ?>
		<?php if($sdt_stunning_text_ena == "yes"):?>
		<div class="stunning-wrapper">
				<div id="stunning-text-inner">
						<?php if($sdt_stunning_text_ena == "yes"):?>	
							<?php if($sdt_stunning_text_title!="") echo "<div class='h2-wrapper'><h2>".do_shortcode($sdt_stunning_text_title)."</h2></div>";?>
							<?php if($sdt_stunning_text!="") echo "<div class='h3-wrapper'><h3>".$sdt_stunning_text."</h3></div>";?>							
							<?php endif?>
				</div>		
			<?php if($sdt_stunning_text_button_ena == "yes"):?>
				<div class="stunning-button">
					<a href="<?php echo $sdt_stunning_text_button_link;?>" class="stunning-button-text"><?php echo $sdt_stunning_text_button_text;?></a>	
				</div>
			<?php endif ?>						
		</div>	
		<?php endif ?>	
			
			
			<?php //3columns service with icon ?>
			<?php if($sdt_3_column_ena == "yes"): ?>
			<div class="column-3-service">
				<div class="column1_3_service">	
						<?php if($sdt_column_1_icon != ""): ?>
							<div class="column-3-service-icon alignleft">
									<img src="<?php echo $sdt_column_1_icon; ?>" alt="" />
							</div>
							<?php endif ?>
						<div class="column-3-service-detail">
							<div class="heading">
								<div class="header cufon"><?php echo $sdt_column_1_title; ?></div>
							</div>
							<div class="column-3-service-desc">
								<?php echo $sdt_column_1_desc; ?>
							</div>
						</div>
				</div>		
				
				<div class="column1_3_service">	
						<?php if($sdt_column_2_icon != ""): ?>
							<div class="column-3-service-icon alignleft">
									<img src="<?php echo $sdt_column_2_icon; ?>" alt="" />
							</div>
							<?php endif ?>
						<div class="column-3-service-detail">
							<div class="heading">
								<div class="header cufon"><?php echo $sdt_column_2_title; ?></div>
							</div>
							<div class="column-3-service-desc">
								<?php echo $sdt_column_2_desc; ?>
							</div>
						</div>
				</div>	
				
				<div class="column1_3_service last ml0">	
						<?php if($sdt_column_3_icon != ""): ?>
							<div class="column-3-service-icon alignleft">
									<img src="<?php echo $sdt_column_3_icon; ?>" alt="" />
							</div>
							<?php endif ?>
						<div class="column-3-service-detail">
							<div class="heading">
								<div class="header cufon"><?php echo $sdt_column_3_title; ?></div>
							</div>
							<div class="column-3-service-desc">
								<?php echo $sdt_column_3_desc; ?>
							</div>
						</div>
				</div>	
				
			</div>
			
			<?php //endif 3 columns enable ?>
			<?php endif ?>
			
			
			<?php //Front manager ?>
			<?php if($sdt_frontSrv_enable == "yes"):?>
			<div id="front-manager">
				<div id="page">
				<div class="page-<?php if($sdt_frontSrv_sidebar_style=="With Sidebar"): echo "w600"; else: echo "w900"; endif?>">
					<?php 
						global $wpdb;
						$page_front_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '".$sdt_frontSrv_page_id."' AND post_type = 'page' ");
					?>
					<?php query_posts('page_id='. $page_front_id )?>
						<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post();?>	
								<?php the_content();?>							
							<?php endwhile?>		
						<?php endif ?>
				</div>
				</div>	
					<?php if($sdt_frontSrv_sidebar_style=="With Sidebar"): ?>	
						<!-- Sidebar -->
						<?php get_sidebar('index')?>
					<?php endif ?>
			</div>	
			
			<?php //end fornt manager ?>
			<?php endif?>
			
			
		<?php //Last from portfolio ?>	
			<?php if($sdt_lastFP_enable == "yes"): ?>	
			<div class="last-port-wrapper">
				<div class="last-port-title">
					<div class="last-port-title-bg">
						<h3 class="cufon"><?php echo $sdt_lastFP_title;?></h3>
					</div>
				</div>
				<div class="last-port-wrapper-content">
					<?php //Show 3 lastest contents from 'Portfolio' page.
						$i=1;
						query_posts('post_type=portfolio&showposts='.$sdt_lastFP_amount.'&port-cat='.$sdt_lastFP_cat)?>
							<?php if(have_posts()) : ?>
								<?php while(have_posts()) : the_post();?>	
												
									<?php
										include('include/portfolio/portfolio-check-case.php');	
									?>
											
												<div class="last-port-item <?php if($i%4==0) echo "last";?>">
													<div class="h150 w225">
														<div class="hover-port relative h150 w225 <?php echo $zoom;?>">
															<div class="<?php if($th_lightbox || $th_post): echo "portfolio-hover"; endif?>">
																	
																	
																		<?php if($th_lightbox):?>
																			<div class="portfolio-zoom top12 left12">
																			
																			<?php if($zoom_sp):?>
																				<a href="<?php echo get_post_meta($post->ID, "specified-image", true);?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/zoom.png" alt=""/></a>
																			<?php elseif($zoom_video):?>				
																				<a href="<?php echo get_post_meta($post->ID, "url-video", true);?>" rel="prettyPhoto" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/zoom-video.png" alt=""/></a>
																			<?php else:?>
																				<a href="<?php echo $thumbnail_url;?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/zoom.png" alt=""/></a>
																		
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
																<?php //Check wheter thumbnail exists 
																
																	$image_id = get_post_thumbnail_id();
																	$image_url = wp_get_attachment_image_src($image_id,'large', true);
																?>
																
																<?php if($image_id  == null):?>
																	<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/img/default.jpg&amp;h=150&amp;w=225&amp;zc=1" alt="<?php the_title(); ?>"/>
																<?php else: ?>
																	<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0];?>&amp;h=150&amp;w=225&amp;zc=1" alt="<?php the_title(); ?>"/>
																<?php endif ?>
															</div>
														</div>
													</div>
													<div class="last-port-item-link">	
														<h4 class="cufon">
														<a href="<?php if($spec_link == ""):the_permalink(); else: echo $spec_link; endif?>">
															<?php the_title();?>
														</a>
														</h4>
													</div>
								
												</div>
				
									<?php $i++;?>
								<?php endwhile?>
							<?php endif ?>
				<?php // end of contetnt wrapper ?>
				</div>
			</div>
			<?php // enf  Last FP ?>
			<?php endif?>
			
			
		<?php //Last from Blog ?>	
			<?php if($sdt_lastFB_enable == "yes"): ?>
			<div class="last-blog-wrapper">
					<div class="last-blog-title">
						<div class="last-blog-title-bg">
							<h3 class="cufon"><?php echo $sdt_lastFB_title;?></h3>
						</div>
					</div>
				<div class="last-port-wrapper-content">	
					<?php //Show 3 lastest contents from 'Blog' page.
						$i=1;
						query_posts('showposts='.$sdt_lastFB_amount.'&cat='.get_cat_ID($sdt_lastFB_cat))?>
							<?php if(have_posts()) : ?>
								<?php while(have_posts()) : the_post();?>	
								
												<div class="last-blog-item <?php if($i%4==0) echo "last";?>">
													
												<div class="last-blog-thumbnail">
													<a href="<?php the_permalink();?>" class="hover" >
													<?php //Check wheter thumbnail exists 
																	$image_id = get_post_thumbnail_id();
																	$image_url = wp_get_attachment_image_src($image_id,'large', true);
																?>
																
																<?php if($image_id  == null):?>
																	<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/img/default.jpg&amp;h=150&amp;w=225&amp;zc=1" alt="<?php the_title(); ?>"/>
																<?php else: ?>
																	<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0];?>&amp;h=150&amp;w=225&amp;zc=1" alt="<?php the_title(); ?>"/>
																<?php endif ?>
													</a>
												</div>
													
												<div class="last-blog-item-bg">			
													<div class="last-blog-item-link">	
														<h4 class="cufon">
															<a href="<?php the_permalink();?>">
																<?php the_title();?>
															</a>
														</h4>
													</div>
													<div class="post-date-lfb">
														<?php the_time('F j, Y'); ?> 
													</div>
													<div class="last-blog-item-desc">										
														<?php echo substr(get_the_excerpt(),0,90)."...";?> 													
													</div>
													</div>
												</div>
									<?php $i++;?>
								<?php endwhile?>
							<?php endif ?>
				<?php // end of contetnt wrapper ?>
				</div>
			</div>		
			<?php //end last port ?>			
			<?php endif?>
		
			
		
			<?php //Full blog ?>
			<?php if($sdt_fullBlog_enable == "yes"): ?>
		<div id="page" class="full-blog-wrapper relative">
			<div id="container">
				<div class="page-wrapper mt0 mb0">
				<div class="sidebar-right">
					<div class="page-w600">
			<!-- get Cat ID -->
						<?php	query_posts('showposts='.$sdt_full_blog_shownum.'&cat='.get_cat_ID(htmlspecialchars($sdt_fullBlog_cat_id)).'&paged='.$paged)?>
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
									<?php endif?>	
									
									
								<div class="blog-sidebar-content">																
										<div class="meta-left-full">								
											<?php echo mb_substr(get_the_excerpt(),0,300)."...";?>
										</div>
										
								<?php //end blog sidebar content ?>
								</div>
								<div class="space h25"></div>
							</div>
						<?php endwhile?>
					<?php endif ?>
							<?php if (function_exists("pagination")) {
									pagination();
							} ?>
						</div>
					<?php get_sidebar('index-blog')?>		
					</div>
				</div>
			</div>
		</div>
		<?php endif?>
		
		<div class="space h0"></div>

		<?php //container-inner?>
		</div>
<?php //close body-3?>
</div>


<?php get_footer();?>
