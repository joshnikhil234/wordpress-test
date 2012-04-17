<?php 
/*
* Social Share
*
*/
include (TEMPLATEPATH.'/get-option.php');

$shortname = "cts";
$share_this = $shortname."_translate_share_this";

$currentUrl = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
<div class="social-share-wrapper">
	<div class="social-share-wrapper-title">
		<h5><?php echo get_option($share_this);?></h5>
	</div>
	<ul>
		<?php if($sdt_social_facebook == "yes"):?>
			<li>
				<a href="http://www.facebook.com/share.php?u=<?php echo $currentUrl;?>" target="_blank" title="Facebook" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/facebook.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_twitter == "yes"):?>
			<li>
				<a href="http://twitter.com/home?status=<?php the_title();?> - <?php echo $currentUrl;?>" target="_blank" title="Tiwtter" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/twitter.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_google == "yes"):?>
			<li>
				<a href="http://www.google.com/bookmarks/mark?op=edit&#038;bkmk=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>" target="_blank" title="Google" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/google.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_stumble == "yes"):?>
			<li>
				<a href="http://www.stumbleupon.com/submit?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>" target="_blank" title="Stumble Upon" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/stumbleupon.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_myspace == "yes"):?>
			<li>
				<a href="http://www.myspace.com/Modules/PostTo/Pages/?u=<?php echo $currentUrl;?>" target="_blank" title="My Space" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/myspace.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_delicious == "yes"):?>
			<li>
				<a href="http://delicious.com/post?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>" target="_blank" title="Delicious" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/delicious.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_digg == "yes"):?>
			<li>
				<a href="http://digg.com/submit?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>" target="_blank" title="Digg" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/digg.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_reddit == "yes"):?>
			<li>
				<a href="http://reddit.com/submit?url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>" target="_blank" title="Reddit" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/reddit.png">
				</a>
			</li>
		<?php endif?>
		<?php if($sdt_social_linkedin == "yes"):?>
			<li>
				<a href="http://www.linkedin.com/shareArticle?mini=true&#038;url=<?php echo $currentUrl;?>&#038;title=<?php the_title();?>" target="_blank" title="Linked In" class="tipsy-hover">
					<img src="<?php echo get_template_directory_uri();?>/include/social-share/icon/linkedin.png">
				</a>
			</li>
		<?php endif?>
	</ul>
</div>