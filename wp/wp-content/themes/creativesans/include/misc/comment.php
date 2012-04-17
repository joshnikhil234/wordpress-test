<?php 
if ( ! function_exists( 'comment_callback' ) ) :
function comment_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <div class="comment-body">
		<div class="comment-meta">
			<div class="avatar-wrapper">
				<?php echo get_avatar( $comment, 49 ); ?>
			<!-- end of avatar -->
			</div>
		<!-- end of content meta -->
		</div>
		<div class="comment-text">
			<div class="comment-detail">
				<div class="comment-title">
					<h3>
						<a><?php echo get_comment_author_link(); ?></a>
					</h3>
				</div>
				<div class="comment-date">
					<span class="comment-date-date"><?php echo get_comment_date(); ?></span>
					<span class="comment-date-time"><?php echo "at ".get_comment_time(); ?></span>
				<!-- end of comment date -->
				</div>
		<div class="reply button-reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
			</div>
			<?php comment_text(); ?>
		</div>
	<!-- end of comment body -->        
    </div>

	
  <?php
			break;
		case 'pingback'  :
		case 'trackback' :
  ?>
  
        <li class="post pingback">	
          <p>
            <?php _e( 'Pingback:', 'Stufe' ); ?>
            <?php comment_author_link(); ?>
            <?php edit_comment_link( __('(Edit)', 'Stufe'), ' ' ); ?>
          </p>
          <?php
			break;
	endswitch;
}
endif;
?>