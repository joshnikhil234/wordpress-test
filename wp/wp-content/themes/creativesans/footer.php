<?php 
/*
*Creativesans Footer
*/
?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
<?php wp_reset_query();?>
<?php // Bottom Slider Show ?>	
			<?php if($sdt_lastBS_enable == "yes"):?>
			<?php if( is_front_page() || is_home() || $sdt_lastBS_everypage == "yes"):?>
			<div class="bottom-slider">
			<div class="carousel-wrapper">
				<div class="carousel-desc">
					<div class="space h15"></div>
					<h5 class="cufon"><?php echo $sdt_lastBS_title;?></h5>
					<?php echo $sdt_lastBS_desc;?>
				</div>
				<a class="cPrev hover-carousel"></a>
				<a class="cNext hover-carousel"></a>
				<div class="carousel-shadow"></div>
				<div class="carousel-inner">
						<div class="carousel">
							<ul> 
							<?php //Show 3 lastest contents from 'Portfolio' page. User can change value by changing $show_post
							
									$show_post = $sdt_lastBS_amt;					
									query_posts('post_type=portfolio&showposts='.$show_post.'&port-cat='.$sdt_lastBS_cat)?>
										
										<?php if(have_posts()) : ?>
											<?php while(have_posts()) : the_post();?>
											<?php include('include/portfolio/portfolio-check-case.php');?>
											<?php //get thumbnail
											$thumbnail_url = get_post_meta($post->ID, "thumbnail", true);	?>
												<li>
													<?php $image_id = get_post_thumbnail_id();
													$image_url = wp_get_attachment_image_src($image_id,'large', true);
																		?>
																					<?php if(get_post_meta($post->ID, "video-thumbnail", true) == "Yes"): ?>
																						<?php $zoom="zoom-video";?>
																					<?php else:?>
																						<?php $zoom="zoom";?>
																					<?php endif; ?>	
																					
																					<?php if($sdt_lastBS_type == "Link to post(or specified link)"):?>
																						<a href="<?php if($spec_link == ""):the_permalink(); else: echo $spec_link; endif?>" title="<?php the_title();?>" class="tipsy-hover" >
																					<?php elseif($sdt_lastBS_type == "Lightbox"):?>
																						<?php if($zoom_sp):?>
																							<a href="<?php echo get_post_meta($post->ID, "specified-image", true);?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>" class="tipsy-hover" >
																						<?php elseif($zoom_video):?>				
																							<a href="<?php echo get_post_meta($post->ID, "url-video", true);?>" rel="prettyPhoto" title="<?php the_title();?>" class="tipsy-hover" >
																						<?php else:?>
																							<a href="<?php echo $thumbnail_url;?>" rel="prettyPhoto[pp_gal]" title="<?php the_title();?>" class="tipsy-hover" >
																						<?php endif;?>
																					<?php endif ?>
																					
																						<?php //Check wheter thumbnail exists ?>
																						<?php if($image_id  == null):?>
																							<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/img/default.jpg&amp;h=125&amp;w=125&amp;zc=1" alt="<?php the_title(); ?>"/>
																						<?php else: ?>
																							<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0];?>&amp;h=125&amp;w=125&amp;zc=1" alt="<?php the_title(); ?>"/>
																						<?php endif ?>
																						
																					<?php if($sdt_lastBS_type == "Link to post(or specified link)" || $sdt_lastBS_type == "Lightbox"):?>
																						</a>
																					<?php endif ?>
																						
													</li>													
											<?php endwhile?>		
										<?php endif ?>		
							</ul>
						</div>
				</div>
			</div>
			</div>
			<?php endif //endif everypage?>
			<?php endif //endif ena? ?>
	<div class="footer-pattern"></div>
	<div id="footer">
			<div class="footer-content">
				<!-- Footer Widget -->
				<div class="footer-style">
					<?php if ( !function_exists('dynamic_sidebar')
						|| !dynamic_sidebar("First Footer") ) : ?>					  
					<?php //echo "<div><h2>No Widget found</h2></div><div class=\"text-widget-inner\">Please Add a Footer widget.</div>"; ?>
					<?php endif; ?>
				</div>
				<div class="footer-style">
					<?php if ( !function_exists('dynamic_sidebar')
						|| !dynamic_sidebar("Second Footer") ) : ?>					  
					<?php //echo "<div><h2>No Widget found</h2></div><div class=\"text-widget-inner\">Please Add a Footer widget.</div>"; ?>
					<?php endif; ?>
				</div>
				<div class="footer-style">
					<?php if ( !function_exists('dynamic_sidebar')
						|| !dynamic_sidebar("Third Footer") ) : ?>					  
					<?php //echo "<div><h2>No Widget found</h2></div><div class=\"text-widget-inner\">Please Add a Footer widget.</div>"; ?>
					<?php endif; ?>
				</div>
				<div class="footer-style last">
					<?php if ( !function_exists('dynamic_sidebar')
						|| !dynamic_sidebar("Fourth Footer") ) : ?>					  
					<?php //echo "<div><h2>No Widget found</h2></div><div class=\"text-widget-inner\">Please Add a Footer widget.</div>"; ?>
					<?php endif; ?>
				</div>
		</div>
	</div>
<?php //close body-2?><!-- Copyright Footer -->
		<div id="copyright" class="copyright-wrapper">	
			<div class="copyright">
				<div class="copyright-left">
					<?php echo do_shortcode($sdt_copyRight_left);?>
				</div>	
				<div class="copyright-right">
					<?php echo do_shortcode($sdt_copyRight_right);?>
				</div>
			</div>
		</div>
</div>
<?php // This is end of "class body-2" which its opening contained in header.php?>

<?php wp_footer(); ?>
<?php	
	include (TEMPLATEPATH."/include/starter.php");
?> 
<?php
	//Google Analytic
	if($sdt_google_ana_ena == "yes"){
		echo stripslashes($sdt_google_ana);
	}
?>
</body>
</html>