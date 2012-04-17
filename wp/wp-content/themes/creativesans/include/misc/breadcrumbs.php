<?php 
function breadcrumbs() {
	if (is_404()) {
			echo 'The page you are finding does not exist.';	
	}
	if (!is_home() && !is_404()) {
			echo '<a href="';echo home_url();echo '">Home</a><span class="arrow-breadcrumbs"></span>';
			if (is_single())
			{
				the_category('<span class="and"> / </span>');
				
				
				global $post;
			   echo  get_the_term_list( $post->ID, 'port-cat', '' , '<span class="and"> / </span>', '' );
				
				if (is_single()) {
					echo "<span class=\"arrow-breadcrumbs\"></span>";
					echo "<span class=\"current\">";
						the_title();
					echo "</span>";				
				}
			}
			elseif(is_category())
			{
				echo "<span class=\"current\">";
					echo single_cat_title( '', false );
				echo "</span>";		
			}
			elseif(is_page())
			{
				global $post;
				$page_parent = get_post_ancestors( $post->ID );
				$page_parent = array_reverse($page_parent);
				foreach ( $page_parent as $ancestor ) {
					$parent_title = get_the_title($ancestor);
					$permalink = get_permalink($ancestor); 
					if($parent_title != get_the_title()){
						echo "<a href='".$permalink."' >".$parent_title."</a>";
						echo "<span class=\"arrow-breadcrumbs\"></span>";
					}
				}
				
				echo "<span class=\"current\">";
					the_title();
				echo "</span>";				
			}
			elseif(is_archive())
			{
				echo "<span class=\"current\">";
					 if ( is_day() ) :
						echo get_the_date();
					elseif ( is_month() ) :
						echo get_the_date('F Y');
					elseif ( is_year() ) :
						echo get_the_date('Y');
					elseif (is_tag()) :
						echo single_tag_title( '', false );
					else:
						echo 'Blog Archives';
						endif;
				echo "</span>";
			}
			elseif(is_search())
			{
				echo "<span class=\"current\">";
					echo get_search_query();
				echo "</span>";
			}
	}
}		
?>
