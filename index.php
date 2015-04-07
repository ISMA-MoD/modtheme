<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package modtheme
 */

get_header(); ?>

	<div id="primary" class="content-area">

        <header class="index-header">
            <nav id="filter" class="movie-filter">
                <?php
                $majors = get_terms('category');
                $genres = get_terms('genres');

                // Allow for clearing of all filter selections
                echo '<a class="view-all current" href="#filter=*" >show all</a>';

                echo '<div class="filter-block>';
                echo '<h3 class="filter-title">Categories</h3>';

                if ( !empty( $majors ) && !is_wp_error( $majors ) ){
                    
                    foreach ( $majors as $major ) {
                        echo '<a class="' . $major->slug . '" href="#filter=.' . $major->slug . '">' . $major->name . '</a>';
                    }
                }

                echo '</div>';

                echo '<div class="filter-block>';
                echo '<h3 class="filter-title">Genres</h3>';
                if ( !empty( $genres ) && !is_wp_error( $genres ) ){
                    
                    foreach ( $genres as $genre ) {
                        echo '<a class="' . $genre->slug . '" href="#filter=.' . $genre->slug . '">' . $genre->name . '</a>';
                    }
                }
                echo '</div>';
                ?>
            </nav><!-- .project-filter -->
        </header><!-- .page-header -->

		<main id="main" class="site-main" role="main">
            <section id="container" class="isotope-container">
                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'content','isotope' );
                        ?>

                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
