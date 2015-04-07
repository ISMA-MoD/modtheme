<?php
/**
 * The template for displaying all single posts.
 *
 * @package modtheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php 
				// Hiding post navigation for now. 
				// This is where a custom "related movies" display would go
				// the_post_navigation(); 
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
