<?php 
/**
** Overall Elements
**/
$overall = array (
	array(
		"name" => "overall_logo",
		"desc" => "Overall Elements",
		"type" => "tab_list",
		"icon" => "overall",
		"options" => array(array("Logo & Menu","overall_logo"),array("Favicon","overall_favicon"),array("Social Link (on header)","social_link"),array("Copyright Area","overall_copyright"),array("Additional Elements","overall_additional"),array("Translator","overall_translator"))
	),
/**
** Logo & Menu
**/
	array(
		"name" => "overall_logo",
		"type" => "div_tab"
	),
	array(
		"name" => "Logo",
		"id" => $shortname."_logo",
		"type" => "upload"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Logo top margin",
		"id" => $shortname."_logo_margin_top",
		"type" => "text",
		"std" => "53"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Logo left margin",
		"id" => $shortname."_logo_margin_left",
		"type" => "text",
		"std" => "20"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Menu top margin",
		"id" => $shortname."_menu_margin_top",
		"type" => "text",
		"std" => "55"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Menu left margin",
		"id" => $shortname."_menu_margin_left",
		"type" => "text",
		"std" => "50"
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Favicon
**/
	array(
		"name" => "overall_favicon",
		"type" => "div_tab"
	),
	array(
		"name" => "Favicon enable",
		"id" => $shortname."_favicon_ena",
		"type" => "checkbox",
		"std" => "no"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Favicon",
		"id" => $shortname."_favicon",
		"type" => "upload"
	),
	array(
		"type" => "div_tab_close"
	),

	
/**	
** Social Link
**/	
	array(
		"name" => "social_link",
		"type" => "div_tab"
	),	
	array(
		"name" => "Bright Kite",
		"id" => $shortname."_social_link_bk_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Bright Kite URL",
		"id" => $shortname."_social_link_bk_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Delicious",
		"id" => $shortname."_social_link_dl_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Delicious URL",
		"id" => $shortname."_social_link_dl_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Deviantart",
		"id" => $shortname."_social_link_dv_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Deviantart URL",
		"id" => $shortname."_social_link_dv_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Digg",
		"id" => $shortname."_social_link_dg_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Digg URL",
		"id" => $shortname."_social_link_dg_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Facebook",
		"id" => $shortname."_social_link_fb_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Facebook URL",
		"id" => $shortname."_social_link_fb_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Flickr",
		"id" => $shortname."_social_link_fk_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Flickr URL",
		"id" => $shortname."_social_link_fk_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Friend Feed",
		"id" => $shortname."_social_link_ff_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Friend Feed URL",
		"id" => $shortname."_social_link_ff_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Lastfm",
		"id" => $shortname."_social_link_lf_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Lastfm URL",
		"id" => $shortname."_social_link_lf_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Linkedin",
		"id" => $shortname."_social_link_li_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Linkedin URL",
		"id" => $shortname."_social_link_li_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Posterous",
		"id" => $shortname."_social_link_pt_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Posterous URL",
		"id" => $shortname."_social_link_pt_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Stumbleupon",
		"id" => $shortname."_social_link_sb_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Stumbleupon URL",
		"id" => $shortname."_social_link_sb_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Tumblr",
		"id" => $shortname."_social_link_tb_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Tumblr URL",
		"id" => $shortname."_social_link_tb_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Twitter",
		"id" => $shortname."_social_link_tt_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Twitter URL",
		"id" => $shortname."_social_link_tt_url",
		"type" => "text",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Vimeo",
		"id" => $shortname."_social_link_vm_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Your Vimeo URL",
		"id" => $shortname."_social_link_vm_url",
		"type" => "text",
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Copyright
**/	
	array(
		"name" => "overall_copyright",
		"type" => "div_tab"
	),	
	array(
		"name" => "Below Footer Left Area",
		"id" => $shortname."_copyRight_left",
		"desc" => "*May use shortcodes such social links*",
		"type" => "textarea",
		"std" => "t: (66) 8 123 4567 e: email@yourdmain.com"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Below Footer Right Area",
		"id" => $shortname."_copyRight_right",
		"desc" => "*May put Copyright here*",
		"type" => "textarea",
		"std" => "© Copyright 2011, Designed by Sittipol Sn."
	),	
	array(
		"type" => "div_tab_close"
	),
/**
** Additional elements
**/

	array(
		"name" => "overall_additional",
		"type" => "div_tab"
	),
	array(
		"name" => "Admin Bar",
		"id" => $shortname."_admin_bar_ena",
		"type" => "checkbox"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Search on the top",
		"id" => $shortname."_search_ena",
		"type" => "checkbox",
		"desc" => "This search bar will be appeared in every page except 'Home Page'.",
		"std" => "yes"
	),/*
	array(
		"type" => "close"
	),
	array(
		"name" => "Search on the top (below slider)",
		"id" => $shortname."_search_slider_ena",
		"type" => "checkbox",
		"desc" => "Search bar below slider. This feature works only when Stunning Text(upper) is enabled."
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Breadcrumb",
		"id" => $shortname."_breadcrumb_ena",
		"type" => "checkbox",
		"std" => "yes"
	),*/
	array(
		"type" => "div_tab_close"
	),
	
/**
** Translator
**/
	array(
		"name" => "overall_translator",
		"type" => "div_tab"
	),	
	array(
		"name" => "Last from portfolio link",
		"id" => $shortname."_translate_lastFP",
		"type" => "text",
		"std" => "View projects",
		"desc" => "Displayed in front page"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Last from blog link",
		"id" => $shortname."_translate_lastFB",
		"type" => "text",
		"std" => "Read the blog",
		"desc" => "Displayed in front page"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Role (or category)",
		"id" => $shortname."_translate_role",
		"type" => "text",
		"std" => "Role",
		"desc" => "Displayed in front page, blog template and post template"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Read More",
		"id" => $shortname."_translate_readmore",
		"type" => "text",
		"std" => "Read More",
		"desc" => "Displayed in every page that show blogs"
	),	
	array(
		"type" => "close"
	),	
	array(
		"name" => "Share This",
		"id" => $shortname."_translate_share_this",
		"type" => "text",
		"std" => "Share This",
		"desc" => "Displayed in social share area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Leave a Reply",
		"id" => $shortname."_translate_leave_reply",
		"type" => "text",
		"std" => "Leave a Reply",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Comment Name",
		"id" => $shortname."_translate_comment_name",
		"type" => "text",
		"std" => "Name",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Comment Email",
		"id" => $shortname."_translate_comment_email",
		"type" => "text",
		"std" => "Mail",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Comment Website",
		"id" => $shortname."_translate_comment_website",
		"type" => "text",
		"std" => "Website",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Comment (word)",
		"id" => $shortname."_translate_comment_comment",
		"type" => "text",
		"std" => "Comment",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Comment Require (Word)",
		"id" => $shortname."_translate_comment_require",
		"type" => "text",
		"std" => "require",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),	
	array(
		"name" => "Submit comment",
		"id" => $shortname."_translate_comment_submit",
		"type" => "text",
		"std" => "Submit",
		"desc" => "Displayed in comment area"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Archives Caption",
		"id" => $shortname."_translate_archives",
		"type" => "text",
		"std" => "Archives Page",
		"desc" => "Displayed in caption of archive template"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Category Caption",
		"id" => $shortname."_translate_category",
		"type" => "text",
		"std" => "Category Page",
		"desc" => "Displayed in caption of category template"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Search Big Caption",
		"id" => $shortname."_translate_search_title",
		"type" => "text",
		"std" => "Search",
		"desc" => "Displayed in caption of search template"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Search Small Caption",
		"id" => $shortname."_translate_search_caption",
		"type" => "text",
		"std" => "Search results",
		"desc" => "Displayed in caption of search template"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Search not found title",
		"id" => $shortname."_translate_searchNotFound_title",
		"type" => "text",
		"std" => "Search",
		"desc" => "Displayed in search template"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Search not found detail",
		"id" => $shortname."_translate_searchNotFound_detail",
		"type" => "textarea",
		"std" => "Sorry, but nothing matched your search criteria. Please try again with some different keywords.",
		"desc" => "Displayed in search template"
	),

	array(
		"type" => "div_tab_close"
	),


); 
?>