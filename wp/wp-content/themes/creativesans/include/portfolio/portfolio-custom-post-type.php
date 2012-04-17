<?php 
//Custom post typ
function portfolio_register() { 
	$labels = array(
		'name' => _x('Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Portfolio Item'),
		'edit_item' => __('Edit Portfolio Item'),
		'new_item' => __('New Portfolio Item'),
		'view_item' => __('View Portfolio Item'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	); 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/include/functions/img/portfolio-icon.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments')
	  ); 
 
	register_post_type( 'portfolio' , $args );
	//Flush to avoid error
    flush_rewrite_rules();
}

//Portfolio viewer style
function portfolio_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Portfolio",
	"tags" => "Tags",
    "description" => "Description",
    "port-cat" => "Portfolio Categories",
  );
 
  return $columns;
}
function portfolio_custom_columns($column){
  global $post;
 
  switch ($column) {
  
    case "description":
      echo substr(get_the_excerpt(),0,120)."...";
      break;
   
    case "port-cat":
      echo get_the_term_list($post->ID, 'port-cat', '', ', ','');
      break;
  }
}


/*
function save_portfolio(){
  global $post;
 
  update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
  update_post_meta($post->ID, "designers", $_POST["designers"]);
  update_post_meta($post->ID, "developers", $_POST["developers"]);
  update_post_meta($post->ID, "producers", $_POST["producers"]);
}
*/
?>