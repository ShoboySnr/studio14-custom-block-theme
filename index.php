<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package _themename
 *
 */

get_header();
?>

<div id="primary" class="container">
	
	<div class="content-container">
		
		<?php if( have_posts() ){
			
			while( have_posts() ){
				
				the_post();
				
				the_content();
				
			}
		} ?>
	
	</div>

</div>

<?php

get_footer();
