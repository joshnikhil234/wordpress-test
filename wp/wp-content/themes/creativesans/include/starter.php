<script type="text/javascript"> 
		<?php
			$theme_shortname = "sdt";
			$shortname = "cts";
		?>
			<?php //Superfish menu?>
			 jQuery(document).ready(function(){  
				
			 
				jQuery("ul.sf-menu").supersubs({ 
					minWidth:    16 ,   // minimum width of sub-menus in em units 
					maxWidth:    27,   // maximum width of sub-menus in em units 
					extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
									   // due to slight rounding differences and font-family 
				}).superfish({				
					delay: 100,
					speed: 'fast', 
					animation:   {opacity:'show',height:'show'}		
				});  // call supersubs first, then superfish, so that subs are 
							 // not display:none when measuring. Call before initialising 
							 // containing tabs for same reason. 
			}); 	
						
		jQuery(window).load(function() {
		 	<?php if($sdt_slide_choose == "Nivo Slider"):?>	
			<?php //nivo slider ?>
			setTimeout(function(){
				jQuery('#slider').nivoSlider({ 
						effect: '<?php echo $sdt_slide_effect; ?>',
						pauseTime: <?php echo $sdt_slide_period; ?>,
						animSpeed: <?php echo $sdt_slide_speed; ?>,
						captionOpacity: <?php echo $sdt_slide_caption_opacity; ?>,
						pauseOnHover:<?php if($sdt_slide_pause == "yes"): echo"true"; else: echo"false"; endif?>,
						directionNav:<?php if($sdt_slide_arrow == "Never Show"): echo"false"; else: echo"true"; endif?>,
						directionNavHide:<?php if($sdt_slide_arrow == "Show when hover"): echo"true"; else: echo"false"; endif?>,
										
					});
				}, 2000);
			<?php endif ?>		
				setTimeout(function(){
				/* For slider shortcode */
				jQuery('#slider2').nivoSlider({ 
						pauseTime:4000,
						animSpeed: <?php echo $sdt_slide_speed; ?>,
						captionOpacity: <?php echo $sdt_slide_caption_opacity; ?>,
						pauseOnHover:<?php if($sdt_slide_pause): echo"true"; else: echo"false"; endif?>,
						directionNavHide:<?php if($sdt_slide_arrow): echo"true"; else: echo"false"; endif?>
					});
				}, 1000);
				
			/* Portfolio sortables */
				var highBoxes = 0,
				speed = 1000,
				grid = jQuery('ul#portfolio-list'),
				sortable_navi = jQuery('#portfolio-filter li a');
				jQuery('#portfolio-list .portfolio-item').each(function(){
					var topBoxes = jQuery(this).height();
					if(topBoxes > highBoxes){highBoxes = topBoxes};
				});
				jQuery('#portfolio-list .portfolio-item').height(highBoxes);
			    grid.masonry({
			   		singleMode: true,
			        itemSelector: '.portfolio-item:not(.hide)',
			        animate: true,
			        animationOptions: {
						duration: speed,
						queue: false
			        }
			 	});
			    sortable_navi.click(function(){
					sortable_navi.removeClass('selected');
					var selectorz = (this.hash).replace('#','.');
			        if(selectorz=='.All') {
						jQuery(this).addClass('selected');
						grid.children('.hide').toggleClass('hide').fadeIn(speed);
			        } else {
						jQuery(this).addClass('selected');
						grid.children().not(selectorz).not('.hide').toggleClass('hide').fadeOut(speed);
						grid.children(selectorz+'.hide').toggleClass('hide').fadeIn(speed);
			        }
			        grid.masonry();
			        return false;
			      });
		});
			//JKwick 
			// Slider Headlines
				// Slider Headlines
			
		jQuery(document).ready(function(){
			
				<?php if($sdt_slide_choose == "Accordion Slider"):?>
					if(jQuery.browser.msie) {
						<?php					
							$order = explode(",",$sdt_slide_order);							
							foreach( $order as $i ){
						?>
								jQuery(".kwicks li#kwick<?php echo $i;?>").hover(function(){
								jQuery("li#kwick<?php echo $i;?> div.title_active").fadeTo(350, 0.8);
								jQuery("li#kwick<?php echo $i;?> div.title").fadeTo(350, 0.0);
								},function(){
								jQuery("li#kwick<?php echo $i;?> div.title_active").fadeTo(350, 0.0);
								jQuery("li#kwick<?php echo $i;?> div.title").fadeTo(350, 0.8);
								});
						<?php
							}
						?>
						}
						else {
						<?php
							$order = explode(",",$sdt_slide_order);							
							foreach( $order as $i ){
						?>						
								jQuery(".kwicks li#kwick<?php echo $i;?>").hover(function(){
								jQuery("li#kwick<?php echo $i;?> div.title_active").fadeTo(350, 1.0);
								jQuery("li#kwick<?php echo $i;?> div.title").fadeTo(350, 0.0);
								},function(){
								jQuery("li#kwick<?php echo $i;?> div.title_active").fadeTo(350, 0.0);
								jQuery("li#kwick<?php echo $i;?> div.title").fadeTo(350, 1.0);
								});
						<?php 
							}
						?>

					}
				//Kqick slider
					jQuery('.kwicks').kwicks({
					max : <?php echo $sdt_slide_acc_width;?>,					
					sticky : <?php echo $sdt_slide_acc_sticky;?>,
					defaultKwick: <?php echo $sdt_slide_acc_sticky_pos;?>,
					event: '<?php echo $sdt_slide_acc_event;?>',
					duration: <?php echo $sdt_slide_acc_duration;?>,
					spacing: <?php echo $sdt_slide_acc_spacing;?>
					
					});
			<?php endif?>		
			<?php if($sdt_slide_choose == "Anything Slider"):?>	
				//Anything Slider
				jQuery('#anything-slider').anythingSlider({
					 autoPlay : <?php if($sdt_slide_ant_auto == "yes") echo "true"; else echo "false";?>,
					 delay: <?php echo $sdt_slide_ant_period;?>,
					 animationTime: <?php echo $sdt_slide_ant_animation;?>,
					 easing: "<?php echo $sdt_slide_ant_easing;?>",
					 navigationFormatter :  function(){ // add thumbnails as navigation links
					   return "";
					   }
				});
			<?php endif?>
 			
				//Pretty photo setting
			
					jQuery("a[rel^='prettyPhoto']").prettyPhoto({	
					animation_speed: '<?php echo $sdt_lightbox_animation_speed; ?>', /* fast/slow/normal */
					slideshow: <?php echo $sdt_lightbox_slideshow; ?>, /* false OR interval time in ms */
					autoplay_slideshow: <?php echo $sdt_lightbox_autoplay_slideshow; ?>, /* true/false */
					opacity: <?php echo $sdt_lightbox_opacity; ?>, /* Value between 0 and 1 */
					show_title: <?php echo $sdt_lightbox_title; ?>, /* true/false */
					allow_resize: <?php echo $sdt_lightbox_allow_resize; ?>, /* Resize the photos bigger than viewport. true/false */
					default_width: <?php echo $sdt_lightbox_width; ?>,
					default_height: <?php echo $sdt_lightbox_height; ?>,
					counter_separator_label: '<?php echo $sdt_lightbox_counter_separator; ?>', /* The separator for the gallery counter 1 "of" 2 */
					theme: '<?php echo $sdt_lightbox_theme; ?>', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
					horizontal_padding: <?php echo $sdt_lightbox_padding; ?>, /* The padding on each side of the picture */
					overlay_gallery: <?php echo $sdt_lightbox_overlay; ?>, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
					keyboard_shortcuts: <?php echo $sdt_lightbox_keyboard; ?>, /* Set to false if you open forms inside prettyPhoto */	
					<?php if($sdt_lightbox_social=="false"):?>
					social_tools: false /* Set to false if you open forms inside prettyPhoto */	
					<?php endif?>
							
					});
					
			
					
					
			  //Tab and Accordion
			  
			  //Toggle box
				jQuery('.toggle-title').live('click',function(){
					jQuery(this).next().slideToggle();
				});
			  	
			  // Accordion
				jQuery("#accordion").accordion({ header: ".acc-header" });
	
			  //hover states on the static widgets
				jQuery('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			  //jCarousel
				jQuery('.carousel').jCarouselLite({
					btnNext: ".cNext",
					btnPrev: ".cPrev",
					visible: <?php echo $sdt_lastBS_appear;?>,
					scroll: <?php echo $sdt_lastBS_scroll;?>
				});
				
				//tipsy
				$('.tipsy-hover').tipsy({gravity: 'n', fade: true});
				
			
				
		<?php // end of	jQuery(document).ready(function() ?>
		});
				
				
				
			//Syntax Highlighter
    		SyntaxHighlighter.all();
    			 
    			 
			
			
			<?php 
			// put false if wanna turn cufon completely off
			if(true):?>
			//Cufon Replacement
			Cufon.replace('#header h1,#header h2,#header h3,#header h4,#header h5,#header h6',{hover: true,fontFamily: '<?php echo get_option($shortname."_heading_font");?>'});			
			Cufon.replace('#page h1,#page h2,#page h3,#page h4,#page h5,#page h6',{hover: true,fontFamily: '<?php echo get_option($shortname."_heading_font");?>'});
			Cufon.replace('#footer h1,#footer h2,#footer h3,#footer h4,#footer h5,#footer h6',{hover: true,fontFamily: '<?php echo get_option($shortname."_heading_font");?>'});
			
			Cufon.replace('#front-manager #sidebar .sidebar-inner h3',{hover: true,fontFamily: '<?php echo get_option($shortname."_heading_font");?>'});
			
			
			//Title with caption Replacement
			Cufon.replace('.cufon',{hover: true,fontFamily: '<?php echo get_option($shortname."_heading_font");?>'});
			
			//Slider caption Replacement
			Cufon.replace('.slider-title',{fontFamily: '<?php echo get_option($shortname."_slider_font");?>'});
			
			//Stunning font Replacement
			Cufon.replace('#stunning-text-inner h1,#stunning-text-inner h2,#stunning-text-inner h3,#stunning-text-inner h4,#stunning-text-inner h5,#stunning-text-inner h6',{hover: true,fontFamily: '<?php echo get_option($shortname."_stunningU_font");?>'});
			Cufon.replace('#stunning-text-below-wrapper .stunning-title',{hover: true,fontFamily: '<?php echo get_option($shortname."_stunningB_font");?>'});
			//Caption (Bartitle) font Replacement
			Cufon.replace('#caption .bar-title-inner h1,#caption .bar-title-inner  h2,#caption .bar-title-inner  h3,#caption .bar-title-inner  h4,#caption .bar-title-inner  h5,#caption .bar-title-inner  h6',{hover: true,fontFamily: '<?php echo get_option($shortname."_caption_font");?>'});
			
			
			<?php endif ?>
			
			 Cufon.now();
			
</script>