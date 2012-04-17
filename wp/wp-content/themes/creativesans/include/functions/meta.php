<?php 
/* Add a new meta box to the admin menu. */
	add_action( 'admin_menu', 'sdt_create_meta_box' );

/* Saves the meta box data. */
	add_action( 'save_post', 'sdt_save_meta_data' );

function sdt_create_meta_box() {
	global $theme_name;
	add_meta_box( 'post-meta-boxes', __('Post Options'), 'post_meta_boxes', 'post', 'normal', 'high' );
	add_meta_box( 'portfolio-meta-boxes', __('Portfolio Options'), 'portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
	add_meta_box( 'page-meta-boxes', __('Page Options'), 'page_meta_boxes', 'page', 'normal', 'high' );
}


//Post meta box
function sdt_post_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			/* More items here */
			'page-desc' => array( 'name' => 'page-desc', 'title' => __('Caption', 'sdt'), 'type' => 'textarea' ),		
			'desc-style' => array( 'name' => 'desc-style', 'title' => 'Caption Style', 'type' => 'select', 'options' => array( 0 => 'Title Only',1 => 'Caption Only', 2 => 'Title and Caption' ) ),
			'social' => array( 'name' => 'social-share', 'title' => 'Social Network Sharing', 'type' => 'select', 'options' => array( 0 => 'Yes',1 => 'No' ) ),
			'thumbnail-title' => array( 'name' => 'thumbnail-title' , 'title' => 'Thumbnail in post' , 'type' => 'header' ),
			'thumbnail' => array( 'name' => 'thumbnail', 'title' => 'Select Image', 'type' => 'upload'),
			
	);

	return apply_filters( 'sdt_post_meta_boxes', $meta_boxes );
}

//Portfolio meta box
function sdt_portfolio_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			/* More items here */
			'page-desc' => array( 'name' => 'page-desc', 'title' => __('Caption', 'sdt'), 'type' => 'textarea' ),		
			'desc-style' => array( 'name' => 'desc-style', 'title' => 'Caption Style', 'type' => 'select', 'options' => array( 0 => 'Title Only',1 => 'Caption Only', 2 => 'Title and Caption' ) ),
			'social' => array( 'name' => 'social-share', 'title' => 'Social Network Sharing', 'type' => 'select', 'options' => array( 0 => 'Yes',1 => 'No' ) ),
			'thumbnail-title' => array( 'name' => 'thumbnail-title' , 'title' => 'Thumbnail in post' , 'type' => 'header' ),
			'thumbnail' => array( 'name' => 'thumbnail', 'title' => 'Select Image', 'type' => 'upload'),
			'thumbnail-link-title' => array( 'name' => 'thumbnail-link-title' , 'title' => 'Thumbanil Link' , 'type' => 'header' ),
			'thumbnail-link' => array( 'name' => 'thumbnail-link' , 'title' => 'Thumbnail Link Type' , 'type' => 'select' , 'options' => array( 0 => 'LightBox and Link',1 => 'LightBox only', 2 => 'Link only' , 3 => 'No link')  ),
			'lightbox-link' => array( 'name' => 'lightbox-link' , 'title' => 'LightBox Link To' , 'type' => 'select' , 'options' => array( 0 => 'The same as thumbnail',1 => 'Specified image', 2 => 'video')  ),
			'specified-image' => array( 'name' => 'specified-image', 'title' => 'Specified Image ( if link to specified img )', 'type' => 'upload'),			
			'url-video' => array( 'name' => 'url-video', 'title' => 'Url of your video ( if link to specified video )', 'type' => 'text' ),
			'specified-link' => array( 'name' => 'specified-link', 'title' => 'Link (If you need to link to normal post, just leave it blank)', 'type' => 'text'),
			
	);

	return apply_filters( 'sdt_portfolio_meta_boxes', $meta_boxes );
}

//Page meta box
function sdt_page_meta_boxes() {
	
	
	/* Array of the meta box options. */
	$meta_boxes = array(
		/* More items here */
		'page-desc' => array( 'name' => 'page-desc', 'type' => 'textarea' , 'title' => __('Caption', 'sdt') ),
		'desc-style' => array( 'name' => 'desc-style', 'type' => 'select' , 'title' => 'Title Style', 'options' =>  array( 0 => 'Title Only',1 => 'Caption Only', 2 => 'Title and Caption' ) ),	
		'select-sidebar-title' => array( 'name' => 'select-sidebar-title' , 'title' => 'Select Sidebar' , 'type' => 'header' ),
		'select-sidebar' => array( 'name' => 'select-sidebar', 'type' => 'select' , 'title' => 'Select sidebar to be used with this page.', 'options' =>  array( 0 => 'Page Sidebar 1',1 => 'Page Sidebar 2', 2 => 'Page Sidebar 3', 3 => 'Page Sidebar 4', 4 => 'Page Sidebar 5', 5 => 'Page Sidebar 6', 6 => 'Page Sidebar 7', 7 => 'Page Sidebar 8', 8 => 'Page Sidebar 9', 9 => 'Page Sidebar 10' ) ),	
		'social' => array( 'name' => 'social-share', 'type' => 'select' , 'title' => 'Social Network Sharing', 'options' => array( 0 => 'No',1 => 'Yes' ) ),
		'thumbnail-title' => array( 'name' => 'thumbnail-title' , 'title' => 'Thumbnail in post' , 'type' => 'header' ),
		'thumbnail' => array( 'name' => 'thumbnail', 'title' => 'Select Image', 'type' => 'upload'),
		'thumbnail-link-title' => array( 'name' => 'thumbnail-link-title' , 'title' => 'Thumbanil Link (for nested portfolio, if not, just ignore it)' , 'type' => 'header' ),
		'thumbnail-link' => array( 'name' => 'thumbnail-link' , 'title' => 'Thumbnail Link Type' , 'type' => 'select' , 'options' => array( 0 => 'LightBox and Post',1 => 'LightBox only', 2 => 'Post only' , 3 => 'No link')  ),
		'lightbox-link' => array( 'name' => 'lightbox-link' , 'title' => 'LightBox Link To' , 'type' => 'select' , 'options' => array( 0 => 'The same as thumbnail',1 => 'Specified image', 2 => 'video')  ),
		'specified-image' => array( 'name' => 'specified-image', 'title' => 'Specified Image ( if link to specified img )', 'type' => 'upload'),'url-video' => array( 'name' => 'url-video', 'title' => 'Url of your video ( if link to specified video )', 'type' => 'text' ),
		
		'link-type' => array( 'name' => 'link-type', 'type' => 'select', 'title' => 'Link type of Portfolio items', 'options' => array( 0 => 'Post',1 => 'Page' ) ),
		'cat-id-port' => array( 'name' => 'cat-id', 'type' => 'select_cat' ,'cat' => 'port-cat' , 'title' => __('Portfolio Category (if "Link Type" is "post")', 'sdt') ),
		'page-parent' => array( 'name' => 'page-parent', 'type' => 'select_page' , 'title' => __('Page Parent (if "Link Type" is "page")', 'sdt') ),
		'portfolio-item-number' => array( 'name' => 'portfolio-item-number', 'type' => 'text' , 'title' => 'Portfolio items amount per page', 'std' => '9' ),
		'filter-portfolio' => array( 'name' => 'filter-portfolio', 'type' => 'select' , 'title' => 'Filter Enable', 'options' => array( 0 => 'No',1 => 'Yes' ) ),
		'cat-id-blog' => array( 'name' => 'cat-id-blog', 'type' => 'select_cat' , 'title' => __('Blog Category', 'sdt') ),
		'blog-item-number' => array( 'name' => 'blog-item-number', 'type' => 'text' , 'title' => 'Blog items amount per page' , 'std' => '6' ),
	);
	
	return apply_filters( 'sdt_page_meta_boxes', $meta_boxes );
}


function post_meta_boxes() {
	global $post;
	$meta_boxes = sdt_post_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'header' )
			get_meta_header( $meta, $value );
		elseif ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_upload( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

//Portfolio meta box
function portfolio_meta_boxes() {
	global $post;
	$meta_boxes = sdt_portfolio_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'header' )
			get_meta_header( $meta, $value );
		elseif ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_upload( $meta, $value );
			

	endforeach; ?>
	</table>
<?php
}

function page_meta_boxes() {
	global $post;
	$meta_boxes = sdt_page_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'select_cat' )
			get_meta_select_cat( $meta, $value );
		elseif ( $meta['type'] == 'select_page' )
			get_meta_select_page( $meta, $value );
		elseif ( $meta['type'] == 'header' )
			get_meta_header( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_upload( $meta, $value );

	endforeach; ?>
	</table>
<?php 
}
function get_meta_header ($args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:20%;" colspan="2">
			<label for="<?php echo $name; ?>"><h2><?php echo $title; ?></h2></label>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</th>
	</tr>
	<?php 
}

function get_meta_upload( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:35%;">
			<?php echo $title; ?>
		</th>
		<td style="text-align: left;">
			<?php if ( htmlentities( $value, ENT_QUOTES )  != "") $value_exists = true; else $value_exists = false;?>
			<div class="image-thumb">
				<?php if ($value_exists) { echo  "<div style='width: 65px; height: 50px;border: 1px #ddd solid; margin-bottom: 10px;'><img src=\"".htmlentities( $value, ENT_QUOTES )."\" height='50' width='65'></div>" ; } else { echo ""; } ?>
			</div>
			<input id="<?php echo $name; ?>" class="upload_image" type="text" size="26" name="<?php echo $name; ?>" value="<?php if ( $value  != "") { echo  $value ; } else { echo ""; } ?>" />
			<input class="upload_image_button_meta" type="button" value="Upload" />
			
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php 
}


function get_meta_text_input( $args = array(), $value = false ) {

	extract( $args ); ?>
	
	<tr>
		<th style="width:35%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php  
			
			if( $value == ""){
				echo $std;
			}else{
				echo htmlentities( $value, ENT_QUOTES );
			}
			
			?>" size="26" tabindex="26" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	
	<?php 
}


function get_meta_select( $args = array(), $value = false ) {

	extract( $args ); ?>
	
	<?php if($name == "link-type"): ?>
		<tr>
			<th style="width:20%;" colspan="2">
				<label for="<?php echo $name; ?>"><h2>If you are using this page as "Portfolio"</h2></label>
			</th>
		</tr>
	<?php elseif($name == "social-share"): ?>
		<tr>
			<th style="width:20%;" colspan="2">
				<label for="<?php echo $name; ?>"><h2>Social Network Sharing?</h2></label>
			</th>
		</tr>
	<?php endif ?>
	<tr>
		<th style="width:35%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php 
}

function get_meta_select_page( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:35%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			
		
			<?php global $wpdb;
					$page_query = "SELECT post_title FROM $wpdb->posts WHERE post_type = 'page' ";
					$pages = $wpdb->get_results($page_query);
					foreach ( $pages as $page ): ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $page->post_title ) echo ' selected="selected"'; ?>>
					<?php echo $page->post_title; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php 
}

function get_meta_select_cat( $args = array(), $value = false ) {

	extract( $args ); ?>
	
	
		<?php if($name == "cat-id-blog"): ?>
				<tr>
					<th style="width:20%;" colspan="2">
						<label for="<?php echo $name; ?>"><h2>If you are using this page as "Blog"</h2></label>
					</th>
				</tr>
		<?php endif ?>
	<tr>
		<th style="width:35%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">			
			<?php 
				if($cat!="")
				$cat_search = "port-cat";				
				else			
				$cat_search = "category";	
				
					global $wpdb;
					$items_query = "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = '".$cat_search."' ";
					$items = $wpdb->get_results($items_query);
					foreach ( $items as $item ):
					
									$cat_query = "SELECT name FROM $wpdb->terms WHERE term_id = '".$item->term_id."' ";
									$cat = $wpdb->get_results($cat_query);
					?>
					
				<option value="<?php echo $cat[0]->name;?>" <?php if ( htmlentities( $value, ENT_QUOTES ) == $cat[0]->name ) echo ' selected="selected"'; ?>><?php echo $cat[0]->name;?></option>
				
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php 
}

function get_meta_textarea( $args = array(), $value = false ) {

	extract( $args ); ?>

	<?php if($name == "page-desc"): ?>
		<tr>
			<th style="width:20%;" colspan="2">
				<label for="<?php echo $name; ?>"><h2>Caption Setting</h2></label>
			</th>
		</tr>
	<?php endif ?>
	
	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 70%;"><?php echo esc_html( $value, 1 ); ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function sdt_save_meta_data( $post_id ) {
	global $post;

	if ( 'page' == $_POST['post_type'] )
		$meta_boxes = array_merge( sdt_page_meta_boxes() );
	elseif( 'portfolio' == $_POST['post_type'])
		$meta_boxes = array_merge( sdt_portfolio_meta_boxes() );
	else
		$meta_boxes = array_merge( sdt_post_meta_boxes() );
		
	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
		elseif ( 'portfolio' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
}
?>