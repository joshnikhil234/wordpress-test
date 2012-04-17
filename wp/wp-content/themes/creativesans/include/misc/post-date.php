<?php 
$shortname = "cts";
$role = $shortname."_translate_role";
$postdate_ena = $shortname."_post_date_ena";

function singlePostDate() {
global $role;
?>
	<div class="sub-title-wrapper-single">	
	
		<div class="post-by-single">
			by <?php echo get_the_author_link(); ?>
		</div>	
		
		<?php if(get_the_tags() != "" ):?>	
		<span class="post-detail-sep">/</span>
		<div class="post-tag-single">
			<?php the_tags('<span class="role-single">'.get_option($role).'</span>'); ?>
		</div>	
		<?php endif?>
		
		<span class="post-detail-sep">/</span>
		<div class="post-comment-single">
				<?php comments_popup_link('No Responses.','1 Comment','% Comments','','Comment Closed'); ?>   
		</div> 
		
	</div>
<?php 
}

function getRole(){
	global $role;
?>		
	<div class="post-tag">
		<?php the_tags('<span class="role-single">'.get_option($role).'</span>'); ?>
	</div>
<?php 
}
function singlePostDatePost() {
global $postdate_ena;
global $role;
if(get_option($postdate_ena) == "yes"){
?>
	<div class="sub-title-wrapper-single">	
	
		<div class="post-by-single">
			by <?php echo get_the_author_link(); ?>
		</div>	
		
		<?php if(get_the_tags() != "" ):?>	
		<span class="post-detail-sep">/</span>
		<div class="post-tag-single">
			<?php the_tags('<span class="role-single">'.get_option($role).'</span>'); ?>
		</div>	
		<?php endif?>
		
		<span class="post-detail-sep">/</span>
		<div class="post-comment-single">
				<?php comments_popup_link('No Responses.','1 Comment','% Comments','','Comment Closed'); ?>   
		</div> 
		
	</div>
<?php 
}
}

function getPostDate(){
?>	
	<div class="post-date-wrapper">
			<span class="month">
				<?php the_time('M'); ?> 	
			<span class="year">
				<?php the_time('Y'); ?> 
			</span>
			</span>
			<span class="day">				
				<?php the_time('d'); ?> 
			</span>		
	</div>
<?php 
}

function getPostDateNoThumb(){
?>	
	<div class="post-date-wrapper-no-thumb">
			<span class="month-no-thumb">
				<?php the_time('M'); ?> 	
			</span>
			<span class="day-no-thumb">				
				<?php the_time('d,'); ?> 
			</span>		
			<span class="year-no-thumb">
				<?php the_time('Y'); ?> 
			</span>
	</div>
<?php 
}