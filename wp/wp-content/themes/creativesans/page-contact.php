<?php 
/**
 * Template Name: Page - Contact
 */
 ?>
 <?php 
//If the form is submitted
if(isset($_POST['submitted-page'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking-page']) !== '') {
		$captchaError_page = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName-page']) === '') {
			$nameError_page = 'You forgot to enter your name.';
			$hasError_page = true;
		} else {
			$name_page = trim($_POST['contactName-page']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email-page']) === '')  {
			$emailError_page = 'You forgot to enter your email address.';
			$hasError_page = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email-page']))) {
			$emailError_page = 'You entered an invalid email address.';
			$hasError_page = true;
		} else {
			$email_page = trim($_POST['email-page']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments-page']) === '') {
			$commentError_page = 'You forgot to enter your comments.';
			$hasError_page = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments_page = stripslashes(trim($_POST['comments-page']));
			} else {
				$comments_page = trim($_POST['comments-page']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError_page)) {

			$emailTo_page = get_option ('cts_contact_email');
			$subject_page = 'Contact Form Submission from '.$name_page;
			$sendCopy_page = trim($_POST['sendCopy-page']);
			$body_page = "Name: $name_page \n\nEmail: $email_page \n\nComments: $comments_page";
			$headers_page = 'From: My Site <'.$emailTo_page.'>' . "\r\n" . 'Reply-To: ' . $email_page;
			
			mail($emailTo_page, $subject_page, $body_page, $headers_page);

			if($sendCopy_page == true) {
				$subject_page = 'You emailed Yourself';
				$headers_page = 'From: Yourself';
				mail($email_page, $subject_page, $body_page, $headers_page);
			}

			$emailSent_page = true;

		}
	}
} ?>
<?php get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
		<div id="page">
			<div id="container">
				<div class="page-wrapper">
					<div class="page-w600">
				 	<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>	
								
								<?php the_content(); ?>
								
								<?php if(isset($hasError_page) || isset($captchaError_page)) { ?>
									<p class="error">There was an error submitting the form.<p>
								<?php } ?>
								<div id="contactForm-page">
								<form action="<?php the_permalink(); ?>" id="contactForm-page" method="post">
							
									<ol class="forms">
										<li><label for="contactName">Name</label>
											<input type="text" name="contactName-page" id="contactName-page" value="<?php if(isset($_POST['contactName-page'])) echo $_POST['contactName-page'];?>" class="requiredField-page" />
										</li>
										<?php if(!empty($nameError_page) && $nameError_page != '') { ?>
												<li><span class="error"><?php echo $nameError_page;?></span></i>
										<?php } ?>
										<li><label for="email">Email</label>
											<input type="text" name="email-page" id="email-page" value="<?php if(isset($_POST['email-page']))  echo $_POST['email-page'];?>" class="requiredField-page email" />
										</li>
										<?php if(!empty($emailError_page) && $emailError_page != '') { ?>
												<span class="error"><?php echo $emailError_page;?></span>
										<?php } ?>
										<li class="textarea"><label for="commentsText">Comments</label>
											<textarea name="comments-page" id="commentsText-page" rows="20" cols="30" class="requiredField-page"><?php if(isset($_POST['comments-page'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments-page']); } else { echo $_POST['comments-page']; } } ?></textarea>
										</li>
										<?php if(!empty($commentError_page) && $commentError_page != '') { ?>
												<span class="error"><?php echo $commentError_page;?></span> 
										<?php } ?>
										<li class="inline"><input type="checkbox" name="sendCopy-page" id="sendCopy-page" value="true"<?php if(isset($_POST['sendCopy-page']) && $_POST['sendCopy-page'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy"> Send a copy of this email to yourself</label></li>
										<li class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking-page" id="checking-page" class="screenReader" value="<?php if(isset($_POST['checking-page']))  echo $_POST['checking-page'];?>" /></li>
										<li class="buttons"><input type="hidden" name="submitted-page" id="submitted-page" value="true" /><button type="submit" class="button">SEND</button></li>
									</ol>
								</form>
								</div>
								<div class="space h10"></div>	
									
						<?php endwhile?>
					<?php endif ?>
					
						</div>
					<?php get_sidebar('contact')?>	
				</div>
			</div>
		</div>
<?php get_footer();?>