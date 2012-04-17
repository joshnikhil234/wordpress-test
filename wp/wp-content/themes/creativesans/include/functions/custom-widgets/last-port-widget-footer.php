<?php
/**
 * Plugin Name: SAINTDO Last Portfolio (Footer)
 * Description: A widget that show last items from your portfolio.
 * Version: 1.0
 * Author: Sittipol Sunthornpiyakul
 * Author URI: http://www.saintdo.me
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'last_portfolio_footer_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function last_portfolio_footer_widget() {
	register_widget( 'Last_Portfolio_Footer' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Last_Portfolio_Footer extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Last_Portfolio_Footer() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'lastport-footer-widget', 'description' => __('A widget that show last items from your portfolio. (Used in footer)', 'lastport-footer-widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'lastport-footer-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'lastport-footer-widget', __('Last Portfolio (Footer) SAINTDO', 'lastport-footer'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('Last From Port', $instance['title'] );
		$port_cat = $instance['port_cat'];
		$show_num = $instance['show_num'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */
		?>
		<div class="last-port-widget-whole"> 
		<?php query_posts('post_type=portfolio&showposts='.$show_num.'&port-cat='.$port_cat)?>
					<?php 
$i=0;
if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>				
									
									<div class="last-port-wrapper-widget <?php if($i%2!=0) echo " last"; $i++; ?>"> 

												<?php 
													global $post;
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'large', true);
												?>
												<div class="port-postthumb h75 w92">
													<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="tipsy-hover">	
														<?php //Check wheter thumbnail exists ?>
														<?php if($image_id  == null):?>
															<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/img/default.jpg&amp;h=75&amp;w=92&amp;zc=1" alt="<?php the_title(); ?>"  class="thumb hover"/>
														<?php else: ?>
															<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0];?>&amp;h=75&amp;w=92&amp;zc=1" alt="<?php the_title(); ?>"  class="thumb hover"/>
														<?php endif ?>
													</a>
												</div>								
																							
									</div>  						
						<?php endwhile?>
					<?php endif ?>						
		<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
		echo "</div>";
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['port_cat'] = strip_tags( $new_instance['port_cat'] );
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
		$defaults = array( 'title' => __('Last Portfolio Widget', 'Last Portfolio Widget'), 'port_cat' => __('0', 'Last Portfolio Witdget'), 'show_num' => '2');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="width100" />
		</p>

		<!-- Your Name: Text Input -->
	
		<p>
			<label for="<?php echo $this->get_field_id( 'port_cat' ); ?>"><?php _e('Portfolio Catagory', 'example'); ?></label>
			
			<select name="<?php echo $this->get_field_name( 'port_cat' ); ?>" id="<?php echo $this->get_field_id( 'port_cat' ); ?>">
						
					<?php  global $wpdb;
						$items_query = "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = 'port-cat' ";
						$items = $wpdb->get_results($items_query);
						foreach ( $items as $item ):
						
										$cat_query = "SELECT name FROM $wpdb->terms WHERE term_id = '".$item->term_id."' ";
										$cat = $wpdb->get_results($cat_query);
					?>
					<option value="<?php echo $cat[0]->name;?>" <?php if ( $instance['port_cat'] == $cat[0]->name ) echo ' selected="selected"'; ?>><?php echo $cat[0]->name;?></option>				
					<?php endforeach; ?>	
					</select> 
		
		
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>"><?php _e('Show Count', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" value="<?php echo $instance['show_num']; ?>" class="width100" />
		</p>

	<?php
	}
}

?>