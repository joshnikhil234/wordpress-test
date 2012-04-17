jQuery(document).ready(function() {

	jQuery('.upload_image_button').click(function() {

	 //from feild for SAINTDO panel only
	 thumbParth =  jQuery(this).parents(".slider-content").prev().children(".slider-item-thumbnail");
	 titleParth =  jQuery(this).parents(".slider-content").prev().children(".slider-item-title-text");
	 formfield = jQuery(this).parent().prev().children(".upload_image");
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 

	 window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 thumbParth.html("<img src="+imgurl+" height=50 width=65 >");
	 titleParth.html(imgurl);
	 formfield.val(imgurl);
	 tb_remove();
	 }

	 return false;
	 
	});
	
	//For portfolio meta box
	jQuery('.upload_image_button_meta').click(function() {

	 //from feild for SAINTDO panel only
	 thumbParth =  jQuery(this).prev().prev();
	// titleParth =  jQuery(this).parents(".slider-content").prev().children(".slider-item-title-text");
	 formfield = jQuery(this).prev();
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 

	 window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 thumbParth.html("<div style='width: 65px; height: 50px; border: 1px #ddd solid; margin-bottom: 10px;'><img src="+imgurl+" height=50 width=65></div>");
		//titleParth.html(imgurl);
		formfield.val(imgurl);
	 tb_remove();
	 }

	 return false;
	 
	});


 
});