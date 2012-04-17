<?php 
/*
* Social Link
*
*/
include (TEMPLATEPATH.'/get-option.php');

$shortname = "cts";

?>
<div class="social-link-header">
	<ul>
		<?php if($sdt_social_link_bk_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_bk_url;?>" target="_blank" title="brightkite" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/brightkite.png" alt="" /></a>
			</li>
		<?php endif?>
		
		<?php if($sdt_social_link_dl_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_dl_url;?>" target="_blank" title="delicious" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/delicious.png" alt="" /></a>
			</li>
		<?php endif?>
		
		<?php if($sdt_social_link_dv_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_dv_url;?>" target="_blank" title="deviantart" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/deviantart.png" alt="" /></a>
			</li>
		<?php endif?>
		
		<?php if($sdt_social_link_dg_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_dg_url;?>" target="_blank" title="digg" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/digg.png" alt="" /></a>
			</li>
		<?php endif?>
		
		<?php if($sdt_social_link_fb_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_fb_url;?>" target="_blank" title="Facebook" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/facebook.png" alt="" /></a>
			</li>
		<?php endif?>
		
		<?php if($sdt_social_link_fk_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_fk_url;?>" target="_blank" title="flickr" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/flickr.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_ff_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_ff_url;?>" target="_blank" title="friendfeed" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/friendfeed.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_lf_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_lf_url;?>" target="_blank" title="lastfm" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/lastfm.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_li_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_li_url;?>" target="_blank" title="linkedin" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/linkedin.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_pt_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_pt_url;?>" target="_blank" title="posterous" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/posterous.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_sb_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_sb_url;?>" target="_blank" title="stumbleupon" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/stumbleupon.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_tb_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_tb_url;?>" target="_blank" title="tumblr" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/tumblr.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_tt_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_tt_url;?>" target="_blank" title="twitter" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/twitter.png" alt="" /></a>
			</li>
		<?php endif?>
	
		<?php if($sdt_social_link_vm_ena == "yes"):?>
			<li>
				<a href="<?php echo $sdt_social_link_vm_url;?>" target="_blank" title="vimeo" class="tipsy-hover"><img src="<?php echo get_template_directory_uri();?>/include/social-link/icon/vimeo.png" alt="" /></a>
			</li>
		<?php endif?>
	
	
	</ul>
</div>

<?php 