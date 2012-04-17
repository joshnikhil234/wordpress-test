<?php

$slider = array(
	array(
		"name" => "slider_images",
		"desc" => "Slider",
		"active" => "active",
		"icon" => "slider",
		"type" => "tab_list",
		"options" => array(array("Slider Setting","slider_setting"),array("Nivo Slider Setting","slider_setting_nivo"),array("Accordion Slider Setting","slider_setting_accordion"),array("Slider Images","slider_images"))
	),
	
/**
** slide setting
**/
	array(
		"name" => "slider_setting",
		"type" => "div_tab"
	),
	array(
		"name" => "Slider enabled",
		"id" => $shortname."_slide_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Choose Slider",
		"id" => $shortname."_slide_choose",
		"type" => "select",	
		"options" => array("Nivo Slider","Accordion Slider"),		
		"desc" => "Please note that 'Image Rotator' will only called form last posts not slider image order",
		"std" => "Anything Slider"
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Nivo slide setting
**/
	array(
		"name" => "slider_setting_nivo",
		"type" => "div_tab"
	),
	array(
		"name" => "Slider Effect",
		"id" => $shortname."_slide_effect","type" => "select",	
		"options" => array("random","sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random","slideInRight","slideInLeft"),		
		"std" => "random"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Slider Style",
		"id" => $shortname."_slide_style",
		"type" => "select",	
		"options" => array("With bullets","With nothing"),		
		"std" => "With bullets",
		"desc" => "Please note that bullet work well only when title or caption filled for every images"
	),
	array(
		"type" => "close"
	),/*
	array(
		"name" => "Thumbnail Slider enabled",
		"id" => $shortname."_slide_thumb_ena",
		"type" => "checkbox",
		"desc" => "This option works only if slider style set to 'With Thumbnails'. It's used in case of you have too many thumbnails.",
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Thumbnails to be appeared",
		"id" => $shortname."_slide_thumb_appear",
		"type" => "select",	
		"desc" => "number of items *works when thumbnail slider enabled on only",	
		"options" => array("1","2","3","4","5","6","7","8"),	
		"std" => "8"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Thumbnails to scroll by",
		"id" => $shortname."_slide_thumb_scroll",
		"type" => "select",	
		"desc" => "number of items *works when thumbnail slider enabled on only",	
		"options" => array("1","2","3","4","5","6","7","8"),		
		"std" => "3"
	),
	array(
		"type" => "close"
	),*/
	array(
		"name" => "Slider Arrow",
		"id" => $shortname."_slide_arrow",
		"type" => "select",	
		"options" => array("Always Show","Show when hover","Never Show"),	
		"desc" => "Arrow will work well only if all images description are set!",
		"std" => "Never Show"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Pause when hover?",
		"id" => $shortname."_slide_pause",
		"type" => "checkbox",
		"desc" => "Pause slider when mouse hover on image?"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Period Between Image",
		"desc" => "put number in millisecond *1000millisec=1sec",
		"id" => $shortname."_slide_period",
		"type" => "text",	
		"std" => "6000"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Animation Speed",
		"desc" => "put number in millisecond *1000millisec=1sec",
		"id" => $shortname."_slide_speed",
		"type" => "text",	
		"std" => "600"
	),
	array(
		"type" => "close"
	),/*
	array(
		"name" => "Slider Caption",
		"id" => $shortname."_slide_caption",
		"type" => "select",	
		"options" => array("Full caption","Left caption","Right caption"),
		"std" => "Right caption"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Caption Align",
		"id" => $shortname."_slide_caption_align",
		"type" => "select",	
		"options" => array("left","right","center"),
		"std" => "left"
	),*/

	array(
		"name" => "Caption Title color",
		"id" => $shortname."_slide_caption_title_color",
		"type" => "colorPicker23",
		"std" => "ffffff"		
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Caption text color",
		"id" => $shortname."_slide_caption_text_color",
		"type" => "colorPicker0",
		"std" => "999999"		
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Caption background color",
		"id" => $shortname."_slide_caption_bg_color",
		"type" => "colorPicker1",
		"std" => "000000"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Caption opacity ",
		"id" => $shortname."_slide_caption_opacity",
		"desc" => "Caption opacity must be filled between 0 - 1.0 ",
		"type" => "text",
		"std" => "0.9"
		
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Slider Width",
		"id" => $shortname."_slide_width",
		"type" => "text",
		"std" => "960"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Slider Height",
		"id" => $shortname."_slide_height",
		"type" => "text",
		"std" => "340"
	),
	array(
		"type" => "div_tab_close"
	),
	
/**
** Accordion slide setting
**/
	array(
		"name" => "slider_setting_accordion",
		"type" => "div_tab"
	),
	array(
		"name" => "Image Width",
		"id" => $shortname."_slide_acc_width",
		"type" => "text",
		"std" => "700"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Image Height",
		"id" => $shortname."_slide_acc_height",
		"type" => "text",
		"std" => "300"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Caption Title color",
		"id" => $shortname."_slide_acc_caption_title_color",
		"type" => "colorPicker24",
		"std" => "a5a5a5"		
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Caption text color",
		"id" => $shortname."_slide_acc_caption_text_color",
		"type" => "colorPicker25",
		"std" => "eeeeee"		
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Sticky",
		"id" => $shortname."_slide_acc_sticky",
		"type" => "select",	
		"options" => array("true","false"),	
		"std" => "false",
		"desc" => "at least one image always expand"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Sticky Position",
		"id" => $shortname."_slide_acc_sticky_pos",
		"type" => "text",		
		"std" => "0",
		"desc" => "Position of image that will be expanded. This feauture works only if Sticky is set to 'true'"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Mouse event",
		"id" => $shortname."_slide_acc_event",
		"type" => "select",	
		"options" => array("mouseover","click","dblclick"),	
		"std" => "mouseover",
		"desc" => "The event that triggers the expand effect"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Duration",
		"id" => $shortname."_slide_acc_duration",
		"type" => "text",	
		"std" => "200",
		"desc" => "The number of milliseconds required for each animation to complete."
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Spacing",
		"id" => $shortname."_slide_acc_spacing",
		"type" => "text",	
		"std" => "0",
		"desc" => "The width (in pixels) separating each kwick element."
	),
	array(
		"type" => "div_tab_close"
	),	


/**
** Slider images
**/
	array(
		"name" => "slider_images",
		"type" => "div_tab"
	),
	array(
		"name" => "Add more images",
		"id" => $shortname."_slider_max_var",
		"type" => "add_slider_item",
		"std" => "0"
		
		
		/*"options" => array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"),*/
		
	),
	array(
		"type" => "close"
	),	
	array(
		"type" => "ul_slider"
	),
	array(	
		"type" => "slider_value",
		"id" => $shortname."_slide_order",
		"class" => "order",
		"std" => "0"
	),
	array(	
		"type" => "slider_value",
		"id" => $shortname."_slide_delete_item",
		"class" => "delete-item",
		"std" => ""
	),
	array(	
		"type" => "slider_value",
		"id" => $shortname."_slide_max_value",
		"class" => "max-value",
		"std" => "0"
	),
	
	
);

Global $order;
$order = array();


foreach ($slider as $value) {
	// put !getSave() to make sure that it will not occure error when we don't save
	if($value['type'] == "slider_value"){
		if( $value['class'] == "order") {
				$order_temp = get_option($value['id']);
				if($order_temp == ""){
				$order = array("0");
				}else{
				$order = explode(",",$order_temp);
				}
		}		
	}	
}


 foreach( $order as $i ){ 
	 $slider2 = array(
		array(			
			"type" => "li_slider",
			"id" => $shortname."_slide_photo_".$i,
			"order" => "".$i,
		),
		array(			
			"type" => "upload_slider",	
			"id" => $shortname."_slide_photo_".$i,
			"name" => "URL"
		),
		array(
			"type" => "close"
		),
		array(			
			"type" => "title_slider",	
			"id" => $shortname."_slide_photo_".$i."_title",
			"name" => "Title"
		),
		array(
			"type" => "close"
		),
		array(			
			"type" => "caption_slider",	
			"id" => $shortname."_slide_photo_".$i."_caption",
			"name" => "Caption"
		),
		array(
			"type" => "close"
		),
		array(			
			"type" => "link_slider",	
			"id" => $shortname."_slide_photo_".$i."_link",
			"name" => "Link"
		),
		array(
			"type" => "close"
		),
		array(			
			"type" => "delete_slider",	
			"name" => "Delete"
		)
		
	);
     array_push($slider,$slider2[0]);
     array_push($slider,$slider2[1]);
     array_push($slider,$slider2[2]);
     array_push($slider,$slider2[3]);
     array_push($slider,$slider2[4]);
     array_push($slider,$slider2[5]);
     array_push($slider,$slider2[6]);
     array_push($slider,$slider2[7]);
     array_push($slider,$slider2[8]);
     array_push($slider,$slider2[9]);
 } 

 
 $close_ul_slider = array("type" => "ul_slider_close"); 
 $close_tab = array("type" => "div_tab_close");
 
 array_push($slider,$close_ul_slider); 
 array_push($slider,$close_tab); 
 
 
?>