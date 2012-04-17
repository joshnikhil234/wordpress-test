<?php 
	$shortname = "cts";
	
	$font_stack = array();
	array_push($font_stack,get_option($shortname."_heading_font"));		
	array_push($font_stack,get_option($shortname."_caption_font"));
	array_push($font_stack,get_option($shortname."_stunningU_font"));	
	array_push($font_stack,get_option($shortname."_stunningB_font"));
	array_push($font_stack,get_option($shortname."_slider_font"));
	
	$cufon_array = array("Aller","Aller Light","Sansation","Sansation Light","Quicksand Book","Cantarell","Luxi Serif","Nobile","Samba","Josefin Sans","Colaborate Light","Cicle Gordita","Yanone Kaffeesatz","Cabin","Oswald","Museo Sans");
	
	function cufonUsed($cufon){
		global $font_stack;
		return in_array($cufon,$font_stack);
	}
	
	function isCufon($cufon){
		global $cufon_array;
		return in_array($cufon,$cufon_array);
	}
	
?>