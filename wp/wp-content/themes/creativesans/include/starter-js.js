
		jQuery(document).ready(function(){ 
				jQuery(".button").hover(function () {
					jQuery(this).animate({
						opacity: 0.7
					}, 200);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 200);
				});
				jQuery(".button_big").hover(function () {
					jQuery(this).animate({
						opacity: 0.7
					}, 200);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 200);
				});				
				jQuery(".button_small").hover(function () {
					jQuery(this).animate({
						opacity: 0.7
					}, 200);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 200);
				});				
				jQuery(".button_medium").hover(function () {
					jQuery(this).animate({
						opacity: 0.7
					}, 200);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 200);
				});				
				jQuery(".button_large").hover(function () {
					jQuery(this).animate({
						opacity: 0.7
					}, 200);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 200);
				});
				jQuery(".hover").hover(function () {
					jQuery(this).animate({
						opacity: 0.5
					}, 500);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 500);
				});
				
				
				jQuery(".hover-port").hover(function () {
					jQuery(this).children(".portfolio-hover").next().animate({
						opacity: 1
					}, 200);
					jQuery(this).children(".portfolio-hover").animate({
						opacity: 1
					}, 200);
					jQuery(this).children(".portfolio-hover").fadeIn(200);
				},function () {
					jQuery(this).children(".portfolio-hover").next().animate({
						opacity: 1
					}, 200);
					jQuery(this).children(".portfolio-hover").fadeOut(200);
				});
				
				
				
			if( BrowserDetect.browser != 'Explorer'){
			
				
				jQuery(".portfolio-link h4 a").hover(function () {
					jQuery(this).parent('h4').animate({
						 opacity: 0.5
					}, 300);
					},function(){
					jQuery(this).parent('h4').animate({
						opacity: 1	      			
					}, 100);
				}); 					
				jQuery(".blog-title h4 a").hover(function () {
					jQuery(this).parent('h4').animate({
						opacity: 0.5
					}, 300);
					},function(){
					jQuery(this).parent('h4').animate({
						opacity: 1	      			
					}, 100);
				}); 
				jQuery(".hover-carousel").hover(function () {
					jQuery(this).animate({
						opacity: 0.8
					}, 500);
					},function(){
					jQuery(this).animate({
						opacity: 1	      			
					}, 500);
				});
					
				}
				
			});
			