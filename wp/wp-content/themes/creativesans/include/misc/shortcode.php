<?php
	 $slider_width;
	 $slider_height;
 
function space($atts, $content = null ) {
		extract( shortcode_atts( array(
		  'height' => '20'
		  ), $atts ) );
	   return '<div class="space" style="height:'.$height.'px"></div>';
	}
	add_shortcode('space', 'space');	
	
function img($atts, $content = null ) {
		extract( shortcode_atts( array(
		  'width' => '300',
		  'height' => '200'
		  ), $atts ) );
	   return '<div><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1"></div>';
	}
	add_shortcode('img', 'img');	
	
function image($atts, $content = null ) {
		global $slider_width,$slider_height;
	   return '<img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$slider_height.'&amp;w='.$slider_width.'&amp;zc=1">';
	}
	add_shortcode('image', 'image');	
	
function slider($atts, $content = null ) {
	extract( shortcode_atts( array(
		  'width' => '600',
		  'height' => '480'
		  ), $atts ) );
		global $slider_width,$slider_height;
		$slider_width = $width;
		$slider_height = $height;
		$height+=30;
	   return '<div style="width:'.$width.'px; height:'.$height.'px;margin: auto;overflow:hidden;"><div id="slider2" class="nivoSlider">'.do_shortcode($content).'</div></div>';
	}
	add_shortcode('slider', 'slider');	
 
function frame_center($atts, $content = null ) {
	extract( shortcode_atts( array(
		  'href' => '',
		  'width' => '',
		  'height' => ''
		  ), $atts ) );
	   	$href = $atts['href'];
		$width = $atts['width'];
		$height = $atts['height'];
		$href = ' '.$href;			
		if($href!=" "){
			$rel = "rel=\"prettyPhoto[pp_gal]\"";			
			return '<div class="frame-center"><a href="'.$href.'" '.$rel.'><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" class="hover"></a></div>';
	
		}else{
			return '<div class="frame-center"><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1"></div>';
		}
	}
	add_shortcode('frame_center', 'frame_center');	
 
function frame_right($atts, $content = null ) {
	extract( shortcode_atts( array(
		  'href' => '',
		  'width' => '',
		  'height' => ''
		  ), $atts ) );
	   	$href = $atts['href'];
		$width = $atts['width'];
		$height = $atts['height'];
		$href = ' '.$href;			
		if($href!=" "){
			$rel = "rel=\"prettyPhoto[pp_gal]\"";			
			return '<div class="frame-right"><a href="'.$href.'" '.$rel.'><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" class="hover"></a></div>';
	
		}else{
			return '<div class="frame-right"><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1"></div>';
		}
	}
	add_shortcode('frame_right', 'frame_right');	

function frame_left($atts, $content = null ) {
	extract( shortcode_atts( array(
		  'href' => '',
		  'width' => '',
		  'height' => ''
		  ), $atts ) );
	   	$href = $atts['href'];
		$width = $atts['width'];
		$height = $atts['height'];
		$href = ' '.$href;		
		if($href!=" "){
			$rel = "rel=\"prettyPhoto[pp_gal]\"";			
			return '<div class="frame-left"><a href="'.$href.'" '.$rel.'><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" class="hover"></a></div>';
	
		}else{
			return '<div class="frame-left"><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1"></div>';
		}
	}
	add_shortcode('frame_left', 'frame_left');	

function list_shortcode($atts, $content = null ) {	extract( shortcode_atts( array(
		  'type' => 'check'
		  ), $atts ) );
	   return '<ul class="style-none list_'.$type.'">'.do_shortcode($content).'</ul>';
	}
	add_shortcode('list', 'list_shortcode');	
	
	
	
function yellow_box($atts, $content = null ) {
	extract( shortcode_atts( array(
		  'title' => ''
		  ), $atts ) );
	   	$last = $atts['title'];
		$last = ' '.$last;
	   return '<div class="yellow-box"><strong>'.$last.'</strong><br>'.do_shortcode($content).'</div>';
	}
	add_shortcode('yellow_box', 'yellow_box');	
	
function dash_box($atts, $content = null ) {
	   return '<div class="dash-box">'.do_shortcode($content).'</div>';
	}
	add_shortcode('dash_box', 'dash_box');	
	
function red_box($atts, $content = null ) {
	  extract( shortcode_atts( array(
		  'title' => ''
		  ), $atts ) );
	   	$last = $atts['title'];
		$last = ' '.$last;
	   return '<div class="red-box"><strong>'.$last.'</strong><br>'.do_shortcode($content).'</div>';
	}
	add_shortcode('red_box', 'red_box');	
function green_box($atts, $content = null ) {
	  extract( shortcode_atts( array(
		  'title' => ''
		  ), $atts ) );
	   	$last = $atts['title'];
		$last = ' '.$last;
	   return '<div class="green-box"><strong>'.$last.'</strong><br>'.do_shortcode($content).'</div>';
	}
	add_shortcode('green_box', 'green_box');	
function code($atts, $content = null ) {
	   return '<div style="clear: both;overflow:hidden;"><pre class="brush: jscript;">'.htmlspecialchars($content).'</pre></div>';
	}
	add_shortcode('code', 'code');	
	
//Button 
function button_small($atts, $content = null ) {
	  extract( shortcode_atts( array(
		  'href' => '' , 'bg' => 'C0E6FB', 'color' => 'FFFFFF','align' => 'left'
		  ), $atts ) );
	   	$last = $atts['href'];
		$last = ' '.$last;
		$style = 'background-color: #'.$bg.'; color: #'.$color.'; border: 1px #'.$bg.' solid;';
		
		return '<a href="'.$last.'" class="button_small" style="'.$style.' float:'.$align.';">'.$content.'</a>';
	}
	add_shortcode('button_small', 'button_small');	
			
function button_medium($atts, $content = null ) {
	  extract( shortcode_atts( array(
		  'href' => '' , 'bg' => 'C0E6FB', 'color' => 'FFFFFF', 'align' => 'left'
		  ), $atts ) );
	   	$last = $atts['href'];
		$last = ' '.$last;
		$style = 'background-color: #'.$bg.'; color: #'.$color.'; border: 1px #'.$bg.' solid;';
		
		return '<a href="'.$last.'" class="button_medium" style="'.$style.' float:'.$align.';">'.$content.'</a>';
	}
	
	add_shortcode('button_medium', 'button_medium');	
	
function button_large($atts, $content = null ) {
	  extract( shortcode_atts( array(
		  'href' => '' , 'bg' => 'C0E6FB', 'color' => 'FFFFFF', 'align' => 'left'
		  ), $atts ) );
	   	$last = $atts['href'];
		$last = ' '.$last;
		$style = 'background-color: #'.$bg.'; color: #'.$color.'; border: 1px #'.$bg.' solid;';
	  return '<a href="'.$last.'" class="button_large" style="'.$style.' float:'.$align.';">'.$content.'</a>';
	}
	add_shortcode('button_large', 'button_large');	

// Quote
function quote($atts, $content = null ) {
	return '<div class="quote">'.$content.'</div>';
	   //return '<div class="blockquote"><div class="quote-open">&nbsp;</div><div class="quote-content">'.$content.'</div><div class="quote-close"></div></div>';
	}
	add_shortcode('quote', 'quote');	
function quote_left($atts, $content = null ) {
	return '<div class="quote-left">'.$content.'</div>';
	   //return '<div class="blockquote"><div class="quote-open">&nbsp;</div><div class="quote-content">'.$content.'</div><div class="quote-close"></div></div>';
	}
	add_shortcode('quote_left', 'quote_left');	
function quote_right($atts, $content = null ) {
	return '<div class="quote-right">'.$content.'</div>';
	   //return '<div class="blockquote"><div class="quote-open">&nbsp;</div><div class="quote-content">'.$content.'</div><div class="quote-close"></div></div>';
	}
	add_shortcode('quote_right', 'quote_right');	
function dropcap($atts, $content = null ) {  
		extract( shortcode_atts( array(
		  'color' => '666666'
		  ), $atts ) );
	   return '<span class="dropcap" style="color: #'.$color.';">'.$content.'</span>';
	}
	add_shortcode('dropcap', 'dropcap');	
	
function dropcap_circle($atts, $content = null ) {  
		extract( shortcode_atts( array(
		  'color' => 'ffffff'
		  ), $atts ) );
	   return '<span class="dropcap_circle" style="color: #'.$color.';">'.$content.'</span>';
	}
	add_shortcode('dropcap_circle', 'dropcap_circle');	
	
function divider($atts, $content = null ) {
	   return '<div class="divider"></div>';
	}
	add_shortcode('divider', 'divider');	
	
function column1_2($atts, $content = null ) {
	   return '<div class="column1_2">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_2', 'column1_2');	

function column1_2_last($atts, $content = null ) {
	   return '<div class="column1_2 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_2_last', 'column1_2_last');	

function column1_3($atts, $content = null ) {
	   return '<div class="column1_3">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_3', 'column1_3');
	
function column1_3_wrap($atts, $content = null ) {
	   return '<div class="column1_3_wrap">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_3_wrap', 'column1_3_wrap');
	
function column1_3_wrap_last($atts, $content = null ) {
	   return '<div class="column1_3_wrap last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_3_wrap_last', 'column1_3_wrap_last');
	
function column1_3_last($atts, $content = null ) {
	   return '<div class="column1_3 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_3_last', 'column1_3_last');	

function column1_4($atts, $content = null ) {
	   return '<div class="column1_4">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_4', 'column1_4');	
	
function column1_4_last($atts, $content = null ) {
	   return '<div class="column1_4 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_4_last', 'column1_4_last');	

function column2_3($atts, $content = null ) {
	   return '<div class="column2_3">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column2_3', 'column2_3');

function column2_3_last($atts, $content = null ) {
	   return '<div class="column2_3 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column2_3_last', 'column2_3_last');	

function column2_3_wrap($atts, $content = null ) {
	   return '<div class="column2_3_wrap">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column2_3_wrap', 'column2_3_wrap');	

function column2_3_wrap_last($atts, $content = null ) {
	   return '<div class="column2_3_wrap last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column2_3_wrap_last', 'column2_3_wrap_last');	

function column3_4($atts, $content = null ) {
	   return '<div class="column3_4">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column3_4', 'column3_4');	

function column3_4_last($atts, $content = null ) {
	   return '<div class="column3_4 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column3_4_last', 'column3_4_last');	
	
function column1_5($atts, $content = null ) {
	   return '<div class="column1_5">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_5', 'column1_5');	
	
function column1_5_last($atts, $content = null ) {
	   return '<div class="column1_5 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column1_5_last', 'column1_5_last');	
	
function column4_5($atts, $content = null ) {
	   return '<div class="column4_5">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column4_5', 'column4_5');	
	
function column4_5_last($atts, $content = null ) {
	   return '<div class="column4_5 last">'.do_shortcode($content).'</div>';
	}
	add_shortcode('column4_5_last', 'column4_5_last');	
	
function googlemap($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" class="googlemap alignleft" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$content.'"></iframe>';
}
add_shortcode("googlemap", "googlemap");

function youtube($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "id" => ''
   ), $atts));
   return '<div><object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$id.'&hd=1" style="width:'.$width.'px;height:'.$height.'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$id.'&hd=1" /></object></div>';
}
add_shortcode("youtube", "youtube");

function vimeo($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "id" => ''
   ), $atts));
   return '<div><object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object></div>';
}
add_shortcode("vimeo", "vimeo");


function toggle($atts, $content = null) {
   extract(shortcode_atts(array(
      "title" => ''
   ), $atts));
   return '<div class="toggle-box"><div class="toggle-title"><span class="toggle-sign"></span>'.$title.'</div><div class="toggle-desc">'.do_shortcode($content).'</div></div>';
}
add_shortcode("toggle", "toggle");


function accordion($atts, $content = null) {
   extract(shortcode_atts(array(
      "id" => ''
   ), $atts));
   return '<script>jQuery(window).ready(function() {
				jQuery("#accordion'.$id.'").accordion({ header: ".acc-header" });
			});</script>
			<div id="accordion'.$id.'">'.do_shortcode($content).'</div>';
}
add_shortcode("accordion", "accordion");


function acc_item($atts, $content = null) {
   extract(shortcode_atts(array(
      "title" => ''
   ), $atts));
   return '<div class="acc-header"><a href="#">'.$title.'</a></div><div>'.$content.'</div>';
}
add_shortcode("acc_item", "acc_item");

function testimonial($atts, $content = null) {
   extract(shortcode_atts(array(
      "by" => '',
      "career" => ''
   ), $atts));
   return '<div class="testimonial"><div class="text">'.$content.'</div><span class="by">- '.$by.'</span><span class="career">'.$career.'</span></div>';
}
add_shortcode("testimonial", "testimonial");

function price_title($atts, $content = null) {
   return '<div class="price-title">'.do_shortcode($content).'</div>';
}
add_shortcode("price_title", "price_title");

function price($atts, $content = null) {
   return '<div class="price">'.do_shortcode($content).'</div>';
}
add_shortcode("price", "price");

function price_body($atts, $content = null) {
   return '<div class="price-body">'.do_shortcode($content).'</div>';
}
add_shortcode("price_body", "price_body");
	
function price_button($atts, $content = null ) {
	  extract( shortcode_atts( array(
		  'href' => '' , 'color' => 'FFFFFF', 'bg' => '232323' 
		  ), $atts ) );
	   	$last = $atts['href'];
		$last = ' '.$last;
		
		$style = 'background-color: #'.$bg.'; color: #'.$color.'; border: 1px #'.$bg.' solid;'; return '<div class="price-button"><a href="'.$last.'" class="button_large aligncenter" style="'.$style.';">'.$content.'</a></div>';
	}
	add_shortcode('price_button', 'price_button');	

function box($atts, $content = null) {
   extract(shortcode_atts(array(
      "style" => 'light',"title" => ''
   ), $atts));
   return '<div class="box box-'.$style.'"><div class="box-title">'.$title.'</div><div class="box-content">'.do_shortcode($content).'</div></div>';
}
add_shortcode("box", "box");

function big_box($atts, $content = null) {
   extract(shortcode_atts(array(
      "style" => 'light'
   ), $atts));
   return '<div class="big-box big-box-'.$style.'">'.do_shortcode($content).'</div>';
}
add_shortcode("big_box", "big_box");


function heading($atts, $content = null) {
   extract(shortcode_atts(array(
      "title" => '',
	  "title_color" => '555',
	  "caption" => '',	  
	  "caption_color" => '999',
	  
   ), $atts));
   return '<div class="heading"><div class="header cufon" style="color:#'.$title_color.'">'.$title.'</div><div class="caption cufon" style="color:#'.$caption_color.'">'.$caption.'</div></div>';
}
add_shortcode("heading", "heading");



/* Social Shortcodes */

function social_facebook($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/fb.png"></a></div>';
}
add_shortcode("social_facebook", "social_facebook");

function social_reddit($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/red.png"></a></div>';
}
add_shortcode("social_reddit", "social_reddit");

function social_stumble($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/stm.png"></a></div>';
}
add_shortcode("social_stumble", "social_stumble");

function social_delicious($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/dl.png"></a></div>';
}
add_shortcode("social_delicious", "social_delicious");

function social_flickr($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/flk.png"></a></div>';
}
add_shortcode("social_flickr", "social_flickr");

function social_google($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/gg.png"></a></div>';
}
add_shortcode("social_google", "social_google");

function social_googlebuzz($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/ggb.png"></a></div>';
}
add_shortcode("social_googlebuzz", "social_googlebuzz");

function social_lastfm($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/lfm.png"></a></div>';
}
add_shortcode("social_lastfm", "social_lastfm");

function social_linkedin($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/li.png"></a></div>';
}
add_shortcode("social_linkedin", "social_linkedin");

function social_myspace($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/ms.png"></a></div>';
}
add_shortcode("social_myspace", "social_myspace");

function social_twitter($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/twt.png"></a></div>';
}
add_shortcode("social_twitter", "social_twitter");

function social_rss($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/rss.png"></a></div>';
}
add_shortcode("social_rss", "social_rss");

function social_yahoo($atts, $content = null) {
   return '<div class="social-link"><a href="'.$content.'" target="_blank"><img src="'.home_url( '/' ).'wp-content/themes/creativesans/img/social-link/yh.png"></a></div>';
}
add_shortcode("social_yahoo", "social_yahoo");







/*
* jQuery Tools - Tabs shortcode
*/
add_shortcode( 'tabs', 'etdc_tab_group' );
function etdc_tab_group( $atts, $content ){
extract(shortcode_atts(array(
'id' => ''
), $atts));
$GLOBALS['tab_count'] = 0;
$num = 1;
do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a href="#tabs'.$id.'-'.$num.'">'.$tab['title'].'</a></li>';
$panes[] = '<div id="tabs'.$id.'-'.$num.'">'.$tab['content'].'</div>';
$num++;
}
$return = "\n".'<!-- the tabs --><script> jQuery(window).ready(function() {
jQuery("#tabs'.$id.'").tabs();
});</script><div id="tabs'.$id.'"><ul>'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" -->'.implode( "\n", $panes )."\n</div>";
}
return $return;
}

add_shortcode( 'tab_item', 'etdc_tab' );
function etdc_tab( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}


function webtreats_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'webtreats_formatter', 99);
add_filter('widget_text', 'webtreats_formatter', 99);
?>