<?php
/**
 * Plugin Name: SAINTDO Contact Widget
 * Description: Contact From Widget.
 * Version: 1.0
 * Author: Sittipol Sunthornpiyakul
 * Author URI: http://www.saintdo.me
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'contact_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function contact_widget() {
	register_widget( 'contact' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class contact extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function contact() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'contact-widget', 'description' => __('Contact From Widget.', 'contact-widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'contact-widget', __('Contact SAINTDO', 'contact'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('Last From Port', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */
		?>
		<?php //If the form is submitted
		if(isset($_POST['submitted'])) {

			//Check to see if the honeypot captcha field was filled in
			if(trim($_POST['checking']) !== '') {
				$captchaError = true;
			} else {
			
				//Check to make sure that the name field is not empty
				if(trim($_POST['widget-contactName']) === '') {
					$nameError = 'You forgot to enter your name.';
					$hasError = true;
				} else {
					$name = trim($_POST['widget-contactName']);
				}
				
				//Check to make sure sure that a valid email address is submitted
				if(trim($_POST['widget-email']) === '')  {
					$emailError = 'You forgot to enter your email address.';
					$hasError = true;
				} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['widget-email']))) {
					$emailError = 'You entered an invalid email address.';
					$hasError = true;
				} else {
					$email = trim($_POST['widget-email']);
				}
					
				//Check to make sure comments were entered	
				if(trim($_POST['widget-comments']) === '') {
					$commentError = 'You forgot to enter your comments.';
					$hasError = true;
				} else {
					if(function_exists('stripslashes')) {
						$comments = stripslashes(trim($_POST['widget-comments']));
					} else {
						$comments = trim($_POST['widget-comments']);
					}
				}
					
				//If there is no error, send the email
				if(!isset($hasError)) {

					$emailTo = get_option ('cts_contact_email');
					$subject = 'Contact Form Submission from '.$name;
					$sendCopy = trim($_POST['sendCopy']);
					$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
					$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
					
					mail($emailTo, $subject, $body, $headers);

					if($sendCopy == true) {
						$subject = 'You emailed Yourself';
						$headers = 'From: Yourself';
						mail($email, $subject, $body, $headers);
					}

					$emailSent = true;

				}
			}
		} ?>
		<div class="contact-widget-whole"> 				
									
					<?php if(isset($hasError) || isset($captchaError)) { ?>
						<p class="error">There was an error submitting the form.<p>
					<?php } ?>
						<div class="contact-widget">
								<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
							
									<ol class="forms">
										<li><label for="contactName">Name</label>
											<input type="text" name="widget-contactName" id="widget-contactName" value="<?php if(isset($_POST['widget-contactName'])) echo $_POST['widget-contactName'];?>" class="requiredField" />
										</li>
										<?php if(!empty($nameError) && $nameError != '') { ?>
												<li><span class="error"><?php echo $nameError;?></span></i>
										<?php } ?>
										<li><label for="email">Email</label>
											<input type="text" name="widget-email" id="widget-email" value="<?php if(isset($_POST['widget-email']))  echo $_POST['widget-email'];?>" class="requiredField email" />
										</li>
										<?php if(!empty($emailError) && $emailError != '') { ?>
												<span class="error"><?php echo $emailError;?></span>
										<?php } ?>
										<li class="textarea">
											<textarea name="widget-comments" id="widget-commentsText" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['widget-comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['widget-comments']); } else { echo $_POST['widget-comments']; } } ?></textarea>
										</li>
										<?php if(!empty($commentError) && $commentError != '') { ?>
												<span class="error"><?php echo $commentError;?></span> 
										<?php } ?>
										<li class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>
										<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit" class="button">Send</button></li>
									</ol>
								</form>
						</div>
												
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

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Contact Widget', 'Contact Widget'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="width100" />
		</p>

	<?php
	}
}

?>