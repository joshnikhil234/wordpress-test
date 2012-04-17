<?php
/**
 * Plugin Name: SAINTDO Popular Post
 * Description: A widget that show popular posts( Specified by cat-id ).
 * Version: 1.0
 * Author: Sittipol Sunthornpiyakul
 * Author URI: http://www.saintdo.me
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'popular_post_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function popular_post_widget() {
	register_widget( 'Popular_Post' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Popular_Post extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function  Popular_Post() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'popularpost-widget', 'description' => __('A widget that show popular posts', 'popularpost-widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'popularpost-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'popularpost-widget', __('Popular Posts SAINTDO', 'popularpost'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('Popular Posts', $instance['title'] );
		$show_num = $instance['show_num'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */
		?>
		<?php query_posts('orderby=comment_count&posts_per_page='.$show_num)?>
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
												<?php comments_number('No Responses.','1 Comment','% Comments','','Comment Closed'); ?>   
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
		$defaults = array( 'title' => __('Popular Posts Widget', 'Popular Posts Widget'), 'post_cat' => __('0', 'Popular Post Widget'), 'show_num' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'decision'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="width100" />
		</p>

		<!-- Your Name: Text Input -->

		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>"><?php _e('Show Count', 'decision'); ?></label>
			<input id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" value="<?php echo $instance['show_num']; ?>" class="width100" />
		</p>

	<?php
	}
}

?>