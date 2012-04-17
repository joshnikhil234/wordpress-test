<?php //Get value form user's setting ?>
<?php include (TEMPLATEPATH.'/get-option.php'); ?>
		
	
		.body-2, #page{
			background-color: #f3f3f3;
			background-image: url('<?php echo get_template_directory_uri() ;?>/img/bg-noise.png');
		}
		a{
			color: #<?php echo $sdt_link_color;?>;
		}
		a:hover{
			color: #<?php echo $sdt_link_color_hover;?>;
		}
		.portfolio-link a{
			color: #<?php echo $sdt_title_color;?>;
		}
		
		
		<?php //menu position ?>
		.nav-wrapper{	
			margin-top: <?php echo $sdt_menu_margin_top;?>px;
			margin-left: <?php echo $sdt_menu_margin_left;?>px;	
		}
		
			.bar-title, .header-bar, .social-link-header, .cNext, .cPrev{
				background-color: #<?php echo $sdt_element_color;?> !important;
			}
			#slider-wrapper .slider-shadow{
				border-bottom: 4px #<?php echo $sdt_element_color;?> solid !important;
			}
		
		<?php //tag cloud link ?> 
			.tagcloud a{
				color: #<?php echo $sdt_sidebar_link_color;?> !important;
			}	
			.tagcloud a:hover{
				color: #<?php echo $sdt_sidebar_link_color_hover;?> !important;
			}
			#footer .tagcloud a{
				color: #<?php echo $sdt_footer_link_color;?> !important;
			}
			#footer .tagcloud a:hover{
				color: #<?php echo $sdt_footer_link_color_hover;?> !important;			
			}
			#wp-calendar td a{
				font-weight: bold;
				color: #<?php echo $sdt_link_color;?>;
			}
			#wp-calendar td a:hover{
				color: #<?php echo $sdt_link_color_hover;?>;
			}
			#header .logo{
				margin-top: <?php echo $sdt_logo_margin_top; ?>px;
				margin-left: <?php echo $sdt_logo_margin_left; ?>px;
			}
		
		
	
			
		<?php //current nav style?>
			li.current-menu-item a ,li.current-menu-parent a{
				color: #000 !important;		
				font-weight: bold;
			}
			li.current-menu-item ul li a ,li.current-menu-parent ul li a , li.current-menu-item ul li a ,li.current-menu-parent ul li a{
				color: #eee !important;	
				font-weight: normal;
			}
			.menu-wrapper li.current-menu-item ul li a,.menu-wrapper li.current-menu-parent ul li a{			
				color: #eee !important;
				border-top: 0px !important;
			}		
			li ul li.current-menu-item a,li ul li.current-menu-parent a{		
				border-bottom: 0px !important;
			}	
			.menu-wrapper ul li a:hover, .menu-wrapper ul li:hover > a{			
				color: #000 !important;
			}
			.menu-wrapper ul li ul li a{			
				border-bottom: 0px !important;
			}
			.menu-wrapper ul li ul li:hover > a{		
				color: #EEE !important;
				border-bottom: 0px !important;
			}
			.menu-wrapper ul li ul li a:hover{
				color: #aaa !important;
			}		
			a.nivo-nextNav, a.nivo-prevNav {
				background-color: #<?php echo $sdt_element_color; ?> !important;
				opacity:0.8;
			    filter:alpha(opacity=80); /* For IE8 and earlier */
			}
			.ui-slider-handle {
				border-top: 8px #<?php echo $sdt_element_color; ?> solid !important;		
			}
			.last-port-top-right{		
				background-color: #<?php echo $sdt_element_color; ?> !important;
			}
			.last-blog-first-date{
				background-color: #<?php echo $sdt_element_color; ?> !important;
			}
			
		<?php //Font using ?>		
			h1, h2, h3, h4, h5, h6{		
				font-family: '<?php echo $sdt_heading_font;?>';
			}		
			
			.last-port-item-link h4, .last-port-title  h3, .last-blog-title  h3, .heading-up .header, .heading .header, .heading .caption{		
				font-family: '<?php echo $sdt_heading_font;?>' !important;
			}
		<?php if($sdt_body_font != "Default"):?>
			body,p,pre,div,span{
					font-family: '<?php echo $sdt_body_font;?>' !important;
			}
		<?php endif?>		
			.bar-title h2, .bar-title h5{
				font-family: '<?php echo $sdt_caption_font;?>' !important;
			}
			.slider-title{	
				font-family: '<?php echo $sdt_slider_font;?>' !important;
			}	
		
	
		<?php //sidebar ?>
			#sidebar .sidebar-inner h3{
				color: #<?php echo $sdt_sidebar_title_color;?>;
			
			}
			#sidebar .sidebar-inner a{		
				color: #<?php echo $sdt_sidebar_link_color;?>;
			}
			#sidebar .sidebar-inner a:hover{
			
				color: #<?php echo $sdt_sidebar_link_color_hover;?>;
			}
		
		
		
		<?php //single left sidebar layout?>
		<?php if($sdt_post_layout== "Left Sidebar"): ?>	
		#single .page-wrapper{
			float: right;			
			margin: 30px 40px 0px 25px;
		}
		<?php endif ?>
		
	
		<?php //Footer link?>
		#footer a{
				color: #<?php echo $sdt_footer_link_color;?>;
				text-decoration: none;
			}
		#footer a:hover{
				color: #<?php echo $sdt_footer_link_color_hover;?>;
			}
		#footer .footer-inner h1,#footer .footer-inner h2{
			margin: 10px 0px;
			color: #<?php echo $sdt_footer_title_color;?> ;
			font-size: 17px;
		}
		
		<?php if($sdt_slide_ena == "yes"):?>
		#slider-wrapper .slider-content{	
			width: <?php echo $sdt_slide_width;?>px;
			height: <?php echo $sdt_slide_height;?>px;
		}
		<?php else:?>
		.stunning-wrapper{
			margin-top: 5px;
		}
		<?php endif?>
		
		
	<?php //Header Color ?>
	 h1, h2, h3, h4, h5, h6{
			color: #<?php echo $sdt_title_color;?>;
			font-weight: normal;
		}
	
	<?php //page discription style , put again for browser compatability?>
	.bar-title h2{
		color: #<?php echo $sdt_page_title_color;?> !important;
		font-size: 26px;
		margin-top: <?php if(isCufon($sdt_caption_font)): echo "31"; else: echo "35"; endif?>px;
		margin-bottom: 4px;
		padding-left: 20px;
		padding-right: 20px;
		font-weight: normal;
		display: inline;
		float: left;
	}
						
	#caption .description{
		color: #<?php echo $sdt_page_caption_color;?> !important;
	}
	
		<?php 	
	if(!is_search() && !is_404() && !is_category() && !is_archive()){
	
	
		if($desc_style = get_post_meta($post->ID,'desc-style',true) ){
			$desc_style = checkCaption($desc_style);
			if( $desc_style==2 || $desc_style==1 ){
				?>
				
				<?php if(isCufon($sdt_caption_font)):?>					
					.bar-title h2{		
						margin-top: 41px;
					}
				<?php else: ?>
					.bar-title h2{		
						margin-top: 44px;
					}
				<?php endif?>
				
				<?php 
			}
		}
	}
	?>
	
	<?php if(isCufon($sdt_stunningU_font)):?>
		stunning-text-inner h2{
			margin-top: 20px;		
		}
		.stunning-button {
			top: 32px;
		}
	<?php endif ?>
	<?php if(isCufon($sdt_heading_font)):?>
		h1,h2,h3,h4,h5,h6{
			margin-bottom: 17px;
		}
		.post-date-lfb{		
			margin-top: -5px;
		}
		.last-port-title  h3, .last-blog-title  h3{
			top: -3px;		
		}
		.last-port-item-link h4{		
			margin-top: 9px;			
			margin-bottom: 7px;
		}
		.last-blog-item-link h4{			
			margin-bottom: 9px;		
			margin-top: 5px;
		}
		.last-blog-first-title h4{			
			margin-bottom: 2px;
		}
		#page .title-wrapper h4{	
			padding-bottom: 3px;	
			margin-bottom: 0px
		}
		#sidebar .sidebar-inner h3 {
			top: -5px;
		}
	<?php endif?>
	
	
	<?php //stunning color ?>
	<?php if(!$sdt_stunning_text_below_ena):?>
	#footer .footer-bg-top2{
			background: none;
	}
	<?php endif ?>
	.stunning-icon{
		float: right;
		margin-top: <?php echo $sdt_stunning_image_top_margin;?>px;
		margin-right: <?php echo $sdt_stunning_image_right_margin;?>px;
	}
	.stunning-button .stunning-button-text{
		color: #<?php echo $sdt_stunning_link_color;?> !important;
		background-color: #<?php echo $sdt_stunning_button_color;?>;
		border-color: #<?php echo $sdt_stunning_button_color;?>;
	} 
	#stunning-text-inner h2{
		font-family: '<?php echo $sdt_stunningU_font;?>' !important;
		color: #<?php echo $sdt_stunning_color;?>;	
	}	
	#stunning-text-inner h3{
		font-family: '<?php echo $sdt_stunningU_font;?>' !important;
		color: #<?php echo $sdt_stunning_caption_color;?>;	
	}
	#front-manager  h1,#front-manager  h2,#front-manager  h3,#front-manager  h4,#front-manager  h5,#front-manager  h6{
			color: #<?php echo $sdt_title_color;?>;
		}
	#front-manager .dropcap h1{
		color: #333;
	}
	
	.dropcap, .dropcap_circle{
			color: #<?php echo $sdt_title_color;?>;
	}
	
	
	<?php //Slider stuff ?>
		
			.nivo-caption h2{
					color: #<?php echo $sdt_slide_caption_title_color;?>;
			}
			.nivo-caption p{
			<?php if($sdt_slide_caption_text_color):?>;
					color: #<?php echo $sdt_slide_caption_text_color;?>;
				<?php else: ?>
					color: #fff;
				<?php endif ?>
				text-align: left<?php //echo $sdt_slide_caption_align;?>;
			}
			.nivo-caption {
				<?php if($sdt_slide_caption_bg_color):?>
					background: #<?php echo $sdt_slide_caption_bg_color;?>
				<?php else: ?>
					background: #000;
				<?php endif ?>
			}	
			
			
			<?php //Kwick slider ?>
			.kwicks li {
				<?php					
					$order = explode(",",$sdt_slide_order);
					$kwickSize = sizeof($order);
				?>
				width: <?php echo 975/$kwickSize;?>px;
				height: <?php echo $sdt_slide_acc_height;?>px;
				
			}
			#sliderkwick .headline h4{				
					font-family: 'SansationRegular' !important;
					color: #<?php echo $sdt_slide_acc_caption_title_color;?>;
			}
			#sliderkwick .headline p{				
					color: #<?php echo $sdt_slide_acc_caption_text_color;?>;
			}
			
		
			
	<?php if($sdt_slide_style == "With nothing"):?>
			#header-whole #slider-wrapper .nivo-controlNav {
				display: none;
			}
	<?php elseif($sdt_slide_style == "With bullets" && $sdt_slide_choose != "Accordion Slider"): ?>
			#header-whole #slider-wrapper .carousel-slider{
				padding-top: 9px;
				padding-bottom: 9px;
				float: left;
			}
			#header-whole #slider-wrapper .bg-bullet-left{
				width: 16px;
				height: 30px;
				display: block;
				float: left;
			}
			#header-whole #slider-wrapper .bg-bullet-right{
				width: 16px;
				height: 30px;
				display: block;
				float: left;
			}
			
			#header-whole #slider-wrapper .nivo-controlNav {
				display: block;
				position: absolute;
				z-index: 99;
				right: 458px;
				bottom: -5px;
			}
		
			
			#slider-wrapper .nivo-controlNav a {
				display:block;
				width:6px;
				height:6px;
				background: url('<?php echo get_template_directory_uri();?>/css/bullets.png') no-repeat 0px 0 ;
				text-indent:-9999px;
				border:0;
				margin-right:10px;
				float:left;
			}
			#slider-wrapper .nivo-controlNav  ul li:last-child a{
				margin-right:0px;
			}
			
			#header-whole #slider-wrapper .nivo-controlNav a.active {
				background-position: -6px 0;
			}	
			
	<?php endif?>
			<?php //Slider Shortcodes?>
			#slider2 .nivo-controlNav a {
				display:block;
				width:6px;
				height:6px;
				background: url('<?php echo get_template_directory_uri();?>/css/bullets.png') no-repeat -6px 0;
				text-indent:-9999px;
				border:0;
				margin-right:10px;
				float:left;
			}
			#slider2 .nivo-controlNav a.active {
				background-position:0px 0;
			}	
			
			#slider-wrapper .slider-content{	
				margin: 0px auto 0px;
			}
			
	
		<?php //Button Style?>			
		.button,.button:hover, .button_big,.button_big:hover{			
			color: #fff;
			background-color: #<?php echo $sdt_button_color;?>; 
			border: 1px #<?php echo $sdt_button_color;?> solid;
			-moz-box-shadow: 0 0 4px #888;
			-webkit-box-shadow: 0 0 4px #888;
			box-shadow: 0 0 4px #888;
		}
		
