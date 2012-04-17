<?php 
$shortname = "cts";

function wp_sdt_enqueue_styles()
{
global $shortname;


    if (!is_page_template( 'page-contact.php' ) && !is_page_template( 'blog-full.php' ) && !is_page_template( 'blog-left-sidebar.php' )  && !is_page_template( 'blog-right-sidebar.php' )  && !is_page_template( 'blog-left-sidebar.php' ) && !is_page_template( '404.php' ) && !is_page_template( 'archive.php' ) && !is_page_template( 'search.php' )){ 
    	
    	// Accordion Slider
    	if(get_option($shortname."_slide_choose") == "Accordion Slider"){
    	wp_register_style( 'kwick-slider', get_template_directory_uri().'/css/kwick-slider.css',false,'1.0' );
        wp_enqueue_style( 'kwick-slider' );
        }
        
        // Nivo slider
        if(get_option($shortname."_slide_choose") == "Nivo Slider"){
        wp_register_style( 'nivo-slider', get_template_directory_uri().'/css/nivo-slider.css',false,'1.0' );
        wp_enqueue_style( 'nivo-slider' );
        wp_register_style( 'custom-nivo-slider', get_template_directory_uri().'/css/custom-nivo-slider.css',false,'1.0' );
        wp_enqueue_style( 'custom-nivo-slider' );
        }
    
    }  
    
        wp_register_style( 'prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css',false,'1.0' );
        wp_enqueue_style( 'prettyPhoto' );
        
        wp_register_style( 'superfish', get_template_directory_uri().'/css/superfish.css',false,'1.0' );
        wp_enqueue_style( 'superfish' );
        
        wp_register_style( 'tipsy', get_template_directory_uri().'/css/tipsy.css',false,'1.0' );
        wp_enqueue_style( 'tipsy' );
        
        
        wp_register_style( 'sh-Core', get_template_directory_uri().'/css/highlighter/shCore.css',false,'1.0' );
        wp_enqueue_style( 'sh-Core' );
        
        
        wp_register_style( 'shThemeDefault', get_template_directory_uri().'/css/highlighter/shThemeDefault.css',false,'1.0' );
        wp_enqueue_style( 'shThemeDefault' );
        
        
        wp_register_style( 'jquery-ui', get_template_directory_uri().'/css/custom-theme/jquery-ui-1.8.12.custom.css',false,'1.0' );
        wp_enqueue_style( 'jquery-ui' );  
        
       
        
        
}
add_action( 'wp_print_styles', 'wp_sdt_enqueue_styles' );
?>