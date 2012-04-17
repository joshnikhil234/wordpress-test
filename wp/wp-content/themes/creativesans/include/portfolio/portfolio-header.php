				
				<?php  $link_type = get_post_meta($post->ID, "link-type", true); ?>
				<?php  $cat_id = get_post_meta($post->ID, "cat-id", true); ?>
				<?php  $page_parent = get_post_meta($post->ID, "page-parent", true); ?>
				<?php  $post_share = get_post_meta($post->ID, "social-share", true); ?>				
				<?php  $portfolio_item_number = get_post_meta($post->ID, "portfolio-item-number", true); ?>
				<?php  $filter = get_post_meta($post->ID, "filter-portfolio", true); ?>
				
				<?php //Portfolio Filter ?>
				<?php if($filter == "Yes"):?>
				<div class="portfolio-filter-wrapper" style="float:left;">
					<ul id="portfolio-filter">
						<li><a href="#All" class="button filter-button" title="All">All</a></li>
						<?php
						
							$catid = get_term_by( 'name', $cat_id , 'port-cat' );
							$catid = $catid->term_id;
							
							global $ancestor;
							$childcats = get_categories('child_of='.$catid.'&hide_empty=0&taxonomy=port-cat');
							foreach ($childcats as $childcat) {
							  if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
								echo '<li><a href="#'.str_replace (" ", "",$childcat->cat_name).'-forfilter" class="button filter-button selected">';
								echo $childcat->cat_name . '</a>';
								echo '</li>';
								$ancestor = $childcat->cat_ID;
							  }
							}
						?>
					</ul>
				</div>
				<?php endif ?>
				<div class="space h5"></div>
				<ul id="portfolio-list">
				
				<?php if($link_type=="Post"):?>				
				<?php query_posts('post_type=portfolio&showposts='.$portfolio_item_number.'&port-cat='.$cat_id.'&paged='.$paged)?>
				<?php else: ?>
				<?php 
					global $wpdb;
					$page_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '".$page_parent."' AND post_type = 'page' "); ?>
				<?php query_posts('post_type=page&post_parent='.$page_parent_id.'&showposts='.$portfolio_item_number.'&paged='.$paged)?>
				<?php endif ?>