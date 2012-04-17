<?php /* Comment */ 

$shortname = "cts";
$leave_reply = $shortname."_translate_leave_reply";
$submit = $shortname."_translate_comment_submit";
$name = $shortname."_translate_comment_name";
$email = $shortname."_translate_comment_email";
$website = $shortname."_translate_comment_website";
$comment_comment = $shortname."_translate_comment_comment";
$require = $shortname."_translate_comment_require";
?>
<div id="comments">
	
	<?php if ( post_password_required() ) : ?>
		  <p class="nopassword">
		  	<?php echo 'This post is password protected. Enter the password to view any comments.'; ?>
		  </p>
          <!--end of comments -->
          </div>
    <?php return; endif; ?>
    
    <?php if ( have_comments() ) : ?>
    
        <div class="comments-title">
			<h5>
            <?php 
                if ( get_comments_number() == 1 ) echo 'One Response to '.get_the_title();
                if ( get_comments_number() > 1 ) echo get_comments_number().' Responses to '.get_the_title();
            ?>
			</h5>
        </div>
    
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div class="comments-navigation">
                <div class="previous">
                    <?php previous_comments_link('Older Comments'); ?>
                <!--end of previous -->
                </div>
                <div class="next">
                    <?php next_comments_link('Newer Comments'); ?>
                <!--end of next -->
                </div>
            <!--end of comments navigation -->
            </div>
        <?php endif; ?>
        
        <ol class="commentlist">
			<?php wp_list_comments(array('callback' => 'comment_callback')); ?>
        </ol>
        
        
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div class="comments-navigation">
                <div class="previous">
                    <?php previous_comments_link('Older Comments'); ?>
                <!--end of previous -->
                </div>
                <div class="next">
                    <?php next_comments_link('Newer Comments'); ?>
                <!--end of next -->
                </div>
            <!--end of comments navigation -->
            </div>
        <?php endif; ?>
    
    <?php else :
		if ( ! comments_open() ) :
    ?>
    	<?php endif; ?>
    
    <?php endif;?>
	
	
	
	
	<?php if ( comments_open() ) : ?>
<div id="comments">
<div id="respond">

<div class="cancel-comment-reply button-cancel-comment">
	<small><?php cancel_comment_reply_link('Cancel Reply'); ?></small>
</div>
<div class="reply-title">
<h5><?php comment_form_title( get_option($leave_reply), 'Leave a Reply to %s' ); ?></h5>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p class="login-as">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p class="comment-form-author">
<label for="author"><?php echo get_option($name);?> <small><?php if ($req) echo "(".get_option($require).")"; ?></small></label>
<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<br />
</p>

<p class="comment-form-email">
<label for="email"><?php echo get_option($email);?> <small><?php if ($req) echo "(".get_option($require).")"; ?></small></label>
<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<br />
</p>


<p class="comment-form-url">
<label for="url"><?php echo get_option($website);?></label>
<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<br />
</p>
<?php endif; ?>

<p class="comment-form-comment">
<label for="comment"><?php echo get_option($comment_comment);?> <small><?php if ($req) echo "(".get_option($require).")"; ?></small></label>
<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea><br />
</p>
<p class="form-submit">
<input name="submit" type="submit" id="commentSubmit" tabindex="5" value="<?php echo get_option($submit);?>" class="hover button"/>
</p>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
	
	
	
	
	
	
	
	
<!-- end of comments -->
</div>
<div class="space h10"></div>