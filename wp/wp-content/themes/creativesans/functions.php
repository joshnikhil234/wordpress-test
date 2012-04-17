<?php 
/*
* @SAINTDO Functions
*
*/
session_start();

if(function_exists('add_theme_support')){
 add_theme_support( 'post-thumbnails' );
 set_post_thumbnail_size( 270, 9999 ,true ); // Normal post thumbnails
 add_image_size( 'single-post-thumbnail', 270, 9999 ); // Permalink thumbnail size
}

//Theme name and shortname
$themename = "creativesans";
$shortname = "cts";

//Misc
include('include/misc/nav.php');
//include('include/misc/breadcrumbs.php');
include('include/misc/post-date.php');
include('include/misc/comment.php');
include('include/misc/pagination.php');
include('include/misc/shortcode.php');

//Font
include('include/font/font-checker.php');

//General Stuffs
include('include/style.php');
include('include/js.php');
include('include/addition/check-caption.php');
include('include/addition/check-ie.php');
include('include/addition/custom-functions.php');
include('include/portfolio/portfolio-custom-post-type.php');

//Regist Sidebars
include('include/functions/sidebar_regist.php');
include('include/functions/meta.php');

//Option in admin Panel
include('include/functions/overall_option.php');
include('include/functions/general_option.php');
include('include/functions/homepage_option.php');
include('include/functions/style_option.php');
include('include/functions/slider_option.php');

//Custom widgets
include('include/functions/custom-widgets/contact-widget.php');
include('include/functions/custom-widgets/flickr-widget.php');
include('include/functions/custom-widgets/last-port-widget-footer.php');
include('include/functions/custom-widgets/last-port-widget-sidebar.php');
include('include/functions/custom-widgets/recent-post-widget.php');
include('include/functions/custom-widgets/popular-post-widget.php');
include('include/functions/custom-widgets/twitter-widget.php');

$options = array();

//Push each option in array
pushArray($overall);
pushArray($general);
pushArray($homepage);
pushArray($style);
pushArray($slider);

// Push each options as array
function pushArray($arr){	
	global $options;
	for($i=0; $i < sizeOf($arr) ; $i++){
			array_push($options,$arr[$i]);
	}
}

//Show admin panel
function mytheme_admin(){
global $themename;
global $options;

$options_in = $options;

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/colorpicker.css" type="text/css" media="screen"/> 
<style type="text/css">
<?php 
	include ("css/colorpicker-extra.php");
?>
</style>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/panel-style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/include/functions/css/jquery-ui-1.8.11.custom.css" type="text/css" media="screen"/>

<?php //Iphone button style ?>
<?php //include style option
include('include/functions/get_style_option.php');

}

//Check wheter slider items are added ?
//If added, then update option
function isItemAdded(){	
	global $shortname;		
	if( isset($_SESSION["item_value"]) ){	
		$item_value = explode(",",$_SESSION["item_value"]);		
			for($i=0; $i<sizeof($item_value); $i++){				
				$item[0] =  $shortname."_slide_photo_".$item_value[$i];
				$item[1] =  $shortname."_slide_photo_".$item_value[$i]."_title";
				$item[2] =  $shortname."_slide_photo_".$item_value[$i]."_caption";
				$item[3] =  $shortname."_slide_photo_".$item_value[$i]."_link";				
				for($j=0; $j<=3 ;$j++){
					if( isset( $_REQUEST[$item[$j]] ) ) { 
						update_option( $item[$j], $_REQUEST[$item[$j]] ); 
					} else { 
						delete_option( $item[$j] ); 
					} 	
				//endfor
				}			
			//endfor
			}
	//endif
	}
	unset($_SESSION["item_value"]);
}

//Ajax jquery save function
function jquery_ajax_head() {
	include('include/functions/ajax_save_function.php');
}

//Ajax save function
function theme_save_ajax() {	
global $options;
					
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { 
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
				} else { 
					delete_option( $value['id'] ); 
				} 			
			}			
			//Check wheter slider item added?
			isItemAdded();			
			die('1');	
}

//Wp script for admin panel
function my_admin_scripts(){
			
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri(). '/js/jquery-1.5.1.min.js', false , '1.5.1', false);
		wp_enqueue_script('jquery');
	
		wp_deregister_script('jquery-ui');
		wp_register_script('jquery-ui', get_template_directory_uri(). '/include/functions/js/jquery-ui-1.8.11.custom.min.js', false, '1.8.11', true);
		wp_enqueue_script('jquery-ui');
	
		wp_deregister_script('colorpicker');
		wp_register_script('colorpicker', get_template_directory_uri(). '/js/colorpicker.js', false, '1.0', true);
		wp_enqueue_script('colorpicker');
		
		wp_deregister_script('custom-js');
		wp_register_script('custom-js', get_template_directory_uri(). '/include/functions/js/custom-js.js', false, '1.0', true);
		wp_enqueue_script('custom-js');
}	
//WP upload box
function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

//Show admin panel
function mytheme_add_admin() {
global $themename, $shortname,$temp;
global $options;
		if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {		
			//Add Jquery ajax to header of panel
			add_action('admin_head', 'jquery_ajax_head');
			
						/* Old case of reset*/
							 //if( 'reset' == $_REQUEST['action'] ) {
							//foreach ($options as $value) {
							//delete_option( $value['id'] ); }
							//header("Location: themes.php?page=functions.php&reset=true");
							//die;
		}
$page = add_menu_page($themename." Options", "".$themename."", 'edit_themes', basename(__FILE__),'mytheme_admin');
add_action('admin_print_styles-'.$page, 'my_admin_styles');
add_action('admin_print_scripts-'.$page, 'my_admin_scripts');
}

//Add admin panel to left side panel menu
add_action('admin_menu', 'mytheme_add_admin');

//Add ajax hook to save option
add_action('wp_ajax_theme_data_save', 'theme_save_ajax');

//Add portfolio custom post type
add_action('init', 'portfolio_register');
register_taxonomy("port-cat", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Categories", "rewrite" => true));
add_action("manage_posts_custom_column",  "portfolio_custom_columns");
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
function reg_tag() {
	 register_taxonomy_for_object_type('post_tag', 'portfolio');
}
add_action('init', 'reg_tag');
 
 
//Get custom post type shown in archive
function include_custom_post_types( $query ) { global $wp_query;
    if ( is_category() || is_tag() ) {
        $post_types = get_post_types();
        $custom_post_type = get_query_var( 'post_type' );
        if ( empty( $custom_post_type ) ) $query->set( 'post_type' , $post_types );
    }
    return $query;
}
add_filter( 'pre_get_posts' , 'include_custom_post_types' );
 
 
//Add shortcodes support in text-widget
add_filter('widget_text','do_shortcode');

/* Short Code Genertor */
/*
add_action('init', 'add_button');  
function add_button() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin');
     add_filter('mce_buttons', 'register_button');
   }
}
function register_button($buttons) {
   array_push($buttons, "homes1");
   return $buttons;
}
function add_plugin($plugin_array) {
   $plugin_array['homes1'] = get_bloginfo('template_url').'/include/functions/js/shortcode-gen.js';
   return $plugin_array;
}*/

//Removing Admin Bar
include('include/addition/remove_admin_bar.php');
?>