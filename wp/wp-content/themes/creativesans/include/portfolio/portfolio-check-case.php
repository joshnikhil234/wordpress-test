<?php //Check portfolio case

			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'large', true);
																
			$th_lightbox = false;
			$th_post = false;
			
			if(get_post_meta($post->ID, "thumbnail-link", true) == "LightBox and Link"): 
				$th_lightbox = true; $th_post = true; 
			elseif(get_post_meta($post->ID, "thumbnail-link", true) == "LightBox only"): 
				$th_lightbox = true;
			elseif(get_post_meta($post->ID, "thumbnail-link", true) == "Link only"): 	
				$th_post = true; 	
			endif;

				$zoom_th = false;
				$zoom_sp = false;
				$zoom_video = false;
								
				if(get_post_meta($post->ID, "lightbox-link", true) == "The same as thumbnail"): 
					$zoom_th = true;
				elseif(get_post_meta($post->ID, "lightbox-link", true) == "Specified image"): 
					$zoom_sp = true;
				elseif(get_post_meta($post->ID, "lightbox-link", true) == "video"): 
					$zoom_video = true;
				endif;
				
			$spec_link = get_post_meta($post->ID, "specified-link", true);
			if($spec_link != "" && substr($spec_link,0,7) != "http://"):
				$spec_link = "http://".$spec_link ;
			endif
								
?>