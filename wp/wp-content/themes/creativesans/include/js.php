<?php 

function sdt_js(){
	
	$shortname = "cts";
	
	if(is_admin()){

		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		
		wp_deregister_script('wp-upload');
		wp_register_script('wp-upload', get_template_directory_uri().'/include/functions/js/upload.js', false , '1.0', true);
		wp_enqueue_script('wp-upload');
	
	}
	
	if(!is_admin()){
		
		/* Jquery must always beyond Cufon!*/
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri(). '/js/jquery-1.5.1.min.js', false, '1.5.1', false);
		wp_enqueue_script('jquery');
			
		wp_deregister_script('cufon');
		wp_register_script('cufon', get_template_directory_uri(). '/js/cufon.js', false, false, false);
		wp_enqueue_script('cufon');
		
	// cufon selected
			if(cufonUsed("Aller")){			
				wp_deregister_script('aller-font');
				wp_register_script('aller-font', get_template_directory_uri(). '/fonts/cufon/Aller_400.font.js', false, '1.0', true);			
				wp_enqueue_script('aller-font');			
			}
			if(cufonUsed("Aller Light")){			
			wp_deregister_script('aller-l-font');
			wp_register_script('aller-l-font', get_template_directory_uri(). '/fonts/cufon/Aller_Light_400.font.js', false, '1.0', true);			
			wp_enqueue_script('aller-l-font');			
			}
			if(cufonUsed("Sansation")){	
			wp_deregister_script('sansation-font');
			wp_register_script('sansation-font', get_template_directory_uri(). '/fonts/cufon/Sansation_400.font.js', false, '1.0', true);	
			wp_enqueue_script('sansation-font');
			}
			if(cufonUsed("Sansation Light")){	
			wp_deregister_script('sansation-l-font');
			wp_register_script('sansation-l-font', get_template_directory_uri(). '/fonts/cufon/Sansation_300.font.js', false, '1.0', true);	
			wp_enqueue_script('sansation-l-font');
			}
			if(cufonUsed("Quicksand Book")){
			wp_deregister_script('quicksand-font');
			wp_register_script('quicksand-font', get_template_directory_uri(). '/fonts/cufon/Quicksand_Book_400.font.js', false, '1.0', true);
			wp_enqueue_script('quicksand-font');
			}
			if(cufonUsed("Cantarell")){
			wp_deregister_script('cantarell-font');
			wp_register_script('cantarell-font', get_template_directory_uri(). '/fonts/cufon/cantarell.js', false, '1.0', true);
			wp_enqueue_script('cantarell-font');
			}
			if(cufonUsed("Luxi Serif")){
			wp_deregister_script('luxi-font');
			wp_register_script('luxi-font', get_template_directory_uri(). '/fonts/cufon/Luxi_Serif_400.font.js', false, '1.0', true);
			wp_enqueue_script('luxi-font');
			}
			if(cufonUsed("Nobile")){
			wp_deregister_script('nobile-font');
			wp_register_script('nobile-font', get_template_directory_uri(). '/fonts/cufon/Nobile_400.font.js', false, '1.0', true);
			wp_enqueue_script('nobile-font');
			}
			if(cufonUsed("Samba")){
			wp_deregister_script('samba-font');
			wp_register_script('samba-font', get_template_directory_uri(). '/fonts/cufon/Samba_400.font.js', false, '1.0', true);
			wp_enqueue_script('samba-font');
			}
			if(cufonUsed("Josefin Sans")){
			wp_deregister_script('josfin-font');
			wp_register_script('josfin-font', get_template_directory_uri(). '/fonts/cufon/Josefin_Sans_Std_300.font.js', false, '1.0', true);
			wp_enqueue_script('josfin-font');
			}
			if(cufonUsed("Colaborate Light")){
			wp_deregister_script('Colaborate-font');
			wp_register_script('Colaborate-font', get_template_directory_uri(). '/fonts/cufon/ColaborateLight_400.font.js', false, '1.0', true);
			wp_enqueue_script('Colaborate-font');
			}
			if(cufonUsed("Cicle Gordita")){
			wp_deregister_script('cicle-font');
			wp_register_script('cicle-font', get_template_directory_uri(). '/fonts/cufon/Cicle_Gordita_700.font.js', false, '1.0', true);
			wp_enqueue_script('cicle-font');
			}
			if(cufonUsed("Yanone Kaffeesatz")){
			wp_deregister_script('Yanone-font');
			wp_register_script('Yanone-font', get_template_directory_uri(). '/fonts/cufon/Yanone_Kaffeesatz_400.font.js', false, '1.0', true);
			wp_enqueue_script('Yanone-font');
			}
			if(cufonUsed("Cabin")){
			wp_deregister_script('Cabin-font');
			wp_register_script('Cabin-font', get_template_directory_uri(). '/fonts/cufon/Cabin_400.font.js', false, '1.0', true);
			wp_enqueue_script('Cabin-font');
			}
			if(cufonUsed("Oswald")){
			wp_deregister_script('Oswald-font');
			wp_register_script('Oswald-font', get_template_directory_uri(). '/fonts/cufon/Oswald_400.font.js', false, '1.0', true);
			wp_enqueue_script('Oswald-font');
			}
			if(cufonUsed("Museo Sans")){
			wp_deregister_script('Museo-font');
			wp_register_script('Museo-font', get_template_directory_uri(). '/fonts/cufon/Museo_Sans_500.font.js', false, '1.0', true);
			wp_enqueue_script('Museo-font');
			}
			
			
		wp_deregister_script('comment-reply');
		wp_register_script('comment-reply', get_template_directory_uri(). '/js/comment-reply.js?ver=20090102', false, '1.0', true);
		wp_enqueue_script('comment-reply');
		
		wp_deregister_script('carousel');
		wp_register_script('carousel', get_template_directory_uri(). '/js/jquery.carousellite.min.js', false, '1.0', true);
		wp_enqueue_script('carousel');
		
		wp_deregister_script('custom');
		wp_register_script('custom', get_template_directory_uri(). '/js/jquery-ui-1.8.13.custom.min.js', false, '1.8.13', true);
		wp_enqueue_script('custom');
		
		wp_deregister_script('jquery.nivo');
		wp_register_script('jquery.nivo', get_template_directory_uri().'/js/jquery.nivo.slider.js', false, '2.3', true);
		wp_enqueue_script('jquery.nivo');
		
		wp_deregister_script('anything-slider');
		wp_register_script('anything-slider', get_template_directory_uri().'/js/jquery.anythingslider.min.js', false, '1.7', true);
		wp_enqueue_script('anything-slider');
		
		wp_deregister_script('hoverIntent');
		wp_register_script('hoverIntent', get_template_directory_uri().'/js/hoverIntent.js', false, '1.0', true);
		wp_enqueue_script('hoverIntent');
		
		wp_deregister_script('superfish');
		wp_register_script('superfish', get_template_directory_uri().'/js/superfish.js', false, '1.4.8', true);
		wp_enqueue_script('superfish');
		
		wp_deregister_script('supersubs');
		wp_register_script('supersubs', get_template_directory_uri().'/js/supersubs.js', false, '0.2', true);
		wp_enqueue_script('supersubs');
		
		wp_deregister_script('jquery.kwick');
		wp_register_script('jquery.kwick', get_template_directory_uri().'/js/jquery.kwick.slider.js', false, '1.5.1', true);
		wp_enqueue_script('jquery.kwick');
		
		wp_deregister_script('jquery.prettyPhoto');
		wp_register_script('jquery.prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', false, '3.1.2', true);
		wp_enqueue_script('jquery.prettyPhoto');
	
		wp_deregister_script('portfolio-filter');
		wp_register_script('portfolio-filter', get_template_directory_uri().'/js/filterable.js', false, '1.0', true);
		wp_enqueue_script('portfolio-filter');
		
		wp_deregister_script('contact');
		wp_register_script('contact', get_template_directory_uri(). '/js/contact-form.js', false, '1.0', true);
		wp_enqueue_script('contact');
		
		wp_deregister_script('tipsy');
		wp_register_script('tipsy', get_template_directory_uri(). '/js/jquery.tipsy.js', false, '1.0', true);
		wp_enqueue_script('tipsy');
		
		wp_deregister_script('highlighter');
		wp_register_script('highlighter', get_template_directory_uri(). '/js/highlighter.js', false, '1.0', true);
		wp_enqueue_script('highlighter');
		
		wp_deregister_script('start-js');
		wp_register_script('start-js', get_template_directory_uri().'/include/starter-js.js', false, '1.0', true);
		wp_enqueue_script('start-js');
		
		wp_deregister_script('browser');
		wp_register_script('browser', get_template_directory_uri().'/js/browser-detect.js', false, '1.0', true);
		wp_enqueue_script('browser');
	}
}
add_action('init', 'sdt_js');
?>