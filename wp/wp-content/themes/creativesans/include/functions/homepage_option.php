<?php
$homepage = array(
	array(
		"name" => "homepage_stunning_upper",
		"desc" => "Home Page",
		"active" => "active",
		"icon" => "home",
		"type" => "tab_list",
		"options" => array(array("Stunning Text Upper","homepage_stunning_upper"),array("3 Columns Icon","3_column_icon"),array("Front Service","homepage_front_service"),array("Last From Portfolio","homepage_last_port"),array("Last From Blog","homepage_last_blog"),array("Blog Featured","homepage_blog_featured"),array("Bottom Slide Show","homepage_bottom_slider"))
	),
	
/**
** Stunning text Uxpper
**/
	array(
		"name" => "homepage_stunning_upper",
		"type" => "div_tab"
	),
	array(
		"id" => $shortname."_stunning_text_ena",
		"name" => "Stunning Text Upper",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_stunning_text_title",
		"name" => "Title",
		"type" => "textarea",
		"std" => "Cras mattis, nulla sed auctor augue dolor."
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_stunning_text",
		"name" => "Small Text",
		"type" => "textarea",
		"std" => "Cras mattis, nulla sed auctor tempus, augue dolor posuere ligula, ut suscipit leo urna."
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_stunning_text_button_ena",
		"name" => "Button",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_stunning_text_button_text",
		"name" => "Button Text",
		"type" => "textarea",
		"std" => "Buy Now"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_stunning_text_button_link",
		"name" => "Button Link",
		"desc" => "Put the URL that you want to link to",
		"type" => "textarea"
	),
	array(
		"type" => "div_tab_close"
	),

/**
** 3 Column Service (icon)
**/
	array(
		"name" => "3_column_icon",
		"type" => "div_tab"
	),
	array(
		"id" => $shortname."_3_column_ena",
		"name" => "3 Columns Icon",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_1_icon",
		"name" => "Column1 Icon",
		"desc" => "you might use icons we prepared in folder 'icons-black' or 'icons-gray'. Otherwise, 35*35px preferred.",
		"type" => "upload"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_1_title",
		"name" => "Column1 Title",
		"type" => "text",
		"std" => "Praesent eu"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_1_desc",
		"name" => "Column1 Detail",
		"type" => "textarea",
		"std" => "Suspendisse viverra metus vitae est condime ntum dapibus. Aenean venenatis mi eros. Vestibulum. vitae est condime ntum dapibus."
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_2_icon",
		"name" => "Column2 Icon",
		"desc" => "you might use icons we prepared in folder 'icons-black' or 'icons-gray'. Otherwise, 35*35px preferred.",
		"type" => "upload"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_2_title",
		"name" => "Column2 Title",
		"type" => "text",
		"std" => "Praesent eu"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_2_desc",
		"name" => "Column2 Detail",
		"type" => "textarea",
		"std" => "Suspendisse viverra metus vitae est condime ntum dapibus. Aenean venenatis mi eros. Vestibulum. vitae est condime ntum dapibus."
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_3_icon",
		"name" => "Column3 Icon",
		"desc" => "you might use icons we prepared in folder 'icons-black' or 'icons-gray'. Otherwise, 35*35px preferred.",
		"type" => "upload"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_3_title",
		"name" => "Column3 Title",
		"type" => "text",
		"std" => "Praesent eu"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_column_3_desc",
		"name" => "Column3 Detail",
		"type" => "textarea",
		"std" => "Suspendisse viverra metus vitae est condime ntum dapibus. Aenean venenatis mi eros. Vestibulum. vitae est condime ntum dapibus."
	),
	array(
		"type" => "div_tab_close"
	),
/**
**	Front Service
**/
	array(
		"name" => "homepage_front_service",
		"type" => "div_tab"
	),
	array(
		"id" => $shortname."_frontSrv_enable",
		"name" => "Front Service",
		"type" => "checkbox"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_frontSrv_page_id",
		"name" => "Page for Front Service",
		"desc" => "Select the page that you want to show as 'Front Service'",
		"type" => "selectPage"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Sidebar",
		"id" => $shortname."_frontSrv_sidebar_style",
		"type" => "select",		
		"options" => array("Without Sidebar","With Sidebar")
	),
	array(
		"type" => "div_tab_close"
	),
/**
**	Last portfolio
**/
	array(
		"name" => "homepage_last_port",
		"type" => "div_tab"
	),	
	array(
		"id" => $shortname."_lastFP_enable",
		"name" => "Recent Works",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastFP_title",
		"name" => "Title",
		"type" => "text",
		"std" => "Last From Portfolio"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastFP_amount",
		"name" => "Amount ",
		"std" => "4",
		"type" => "text"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastFP_cat",
		"name" => "Category ",
		"desc" => "Select the category of the portfolio that you want to appear",
		"type" => "selectPort"
	),
	array(
		"type" => "div_tab_close"
	),
/**
**	Last Blog
**/
	array(
		"name" => "homepage_last_blog",
		"type" => "div_tab"
	),
	array(
		"id" => $shortname."_lastFB_enable",
		"name" => "From Blog",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastFB_title",
		"name" => "Title",
		"type" => "text",
		"std" => "Last From Blog"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastFB_amount",
		"name" => "Amount ",
		"std" => "4",
		"type" => "text"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastFB_cat",
		"name" => "Category ",
		"desc" => "Select the category of the blog that you want to appear",
		"type" => "selectCat"
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Blog featured
**/
	array(
		"name" => "homepage_blog_featured",
		"type" => "div_tab"
	),
	array(
		"id" => $shortname."_fullBlog_enable",
		"name" => "Full blog in Main Page",
		"type" => "checkbox"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_fullBlog_cat_id",
		"name" => "Category ",
		"desc" => "Select the category of the blog that you want to appear",
		"type" => "selectCat"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Blog items main page",
		"desc" => "Amount of items",
		"id" => $shortname."_full_blog_shownum",
		"type" => "select",		
		"options" => array("3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","Unlimit")
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Bottom slider
**/
	array(
		"name" => "homepage_bottom_slider",
		"type" => "div_tab"
	),
	array(
		"id" => $shortname."_lastBS_enable",
		"name" => "Bottom Slide Show",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastBS_everypage",
		"name" => "Show on everypage",
		"type" => "checkbox",
		"std" => "no",
		"desc" => "if 'off', then will be show on only frontpage"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastBS_title",
		"name" => "Title",
		"type" => "text",
		"std" => "Slider Title"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastBS_desc",
		"name" => "Description",
		"type" => "textarea",
		"std"=> "
Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae. "
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastBS_cat",
		"name" => "Category",
		"desc" => "Select the category of the portfolio that you want to appear",
		"type" => "selectPort"
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastBS_type",
		"name" => "Link Type",
		"desc" => "Type to link to when click on images",
		"type" => "select",
		"options" => array("Link to post(or specified link)","Lightbox","no link")
	),
	array(
		"type" => "close"
	),
	array(
		"id" => $shortname."_lastBS_amt",
		"name" => "Called",
		"desc" => "number of stuffs that you want to be called.",
		"type" => "text",
		"std" => "5"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Show Amount",
		"id" => $shortname."_lastBS_appear",
		"type" => "select",	
		"desc" => "number of items that being show",	
		"options" => array("4","3","2","1"),	
		"std" => "4"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Slider to scroll by",
		"id" => $shortname."_lastBS_scroll",
		"type" => "select",	
		"desc" => "number of items to be scrolled by",	
		"options" => array("1","2","3","4"),	
		"std" => "1"
	),
	array(
		"type" => "div_tab_close"
	)


);
?>