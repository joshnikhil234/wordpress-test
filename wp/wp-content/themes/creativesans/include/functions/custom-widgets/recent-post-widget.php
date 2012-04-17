<?php
/**
 * Plugin Name: SAINTDO Recent Post
 * Description: A widget that show recent posts( Specified by cat-id ).
 * Version: 1.0
 * Author: Sittipol Sunthornpiyakul
 * Author URI: http://www.saintdo.me
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'recent_post_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function recent_post_widget() {
	register_widget( 'Recent_Post' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Recent_Post extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Recent_Post() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'recentpost-widget', 'description' => __('A widget that show last posts', 'recentpost-widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'recentpost-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'recentpost-widget', __('Recent Posts SAINTDO', 'recentpost'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('Recent Posts', $instance['title'] );
		$post_cat = $instance['post_cat'];
		$show_num = $instance['show_num'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */
		?>
		<?php query_posts('showposts='.$show_num.'&cat='.get_cat_ID($post_cat))?>
					<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>	
									<?php 
										global $post;
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'large', true);
									?>
									<div class="last-post-wrapper-widget">
										<div class="port-postthumb h45 w65">
											<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="tipsy-hover">
												<?php if($image_id  == null):?>
												<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/img/default.jpg&amp;h=45&amp;w=65&amp;zc=1" alt="<?php the_title(); ?>" class="thumb"/>
												<?php else: ?>
												<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0];?>&amp;h=45&amp;w=65&amp;zc=1" alt="<?php the_title(); ?>" class="thumb"/>
												<?php endif ?>
											</a>
										</div>
										<div class="meta-right-wrapper-widget">
											<div class="blog-title">
												<h4>
													<a href="<?php the_permalink();?>">
														<?php the_title();?>
													</a>
												</h4>
												
											</div>
											<div class="meta-right-widget">
											<?php the_time('F j, Y'); ?>
											</div>
										</div>
									</div>						
						<?php endwhile?>
					<?php endif ?>	
		<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_cat'] = strip_tags( $new_instance['post_cat'] );
		$instance['show_num'] = strip_tags( $new_instance['show_num'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Recent Posts Widget', 'Recent Posts Widget'), 'post_cat' => __('0', 'Recent Post Witdget'), 'show_num' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'decision'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="width100" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'post_cat' ); ?>"><?php _e('Catagory', 'decision'); ?></label>		
		
					<select name="<?php echo $this->get_field_name( 'post_cat' ); ?>" id="<?php echo $this->get_field_id( 'post_cat' ); ?>">
						
					<?php  global $wpdb;
						$items_query = "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = 'category' ";
						$items = $wpdb->get_results($items_query);
						foreach ( $items as $item ):
						
										$cat_query = "SELECT name FROM $wpdb->terms WHERE term_id = '".$item->term_id."' ";
										$cat = $wpdb->get_results($cat_query);
					?>
					<option value="<?php echo $cat[0]->name;?>" <?php if (  $instance['post_cat'] == $cat[0]->name ) echo ' selected="selected"'; ?>><?php echo $cat[0]->name;?></option>				
					<?php endforeach; ?>	
					</select> 
		
		
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>"><?php _e('Show Count', 'decision'); ?></label>
			<input id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" value="<?php echo $instance['show_num']; ?>" class="width100" />
		</p>

	<?php
	}
}

?>