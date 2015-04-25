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
                $types = get_terms('post_tag');
                $durations = get_terms('durations');

                // Allow for clearing of all filter selections
                echo '<a class="view-all current" href="#filter=*" >show all</a>';

                // Categories
                echo '<div class="filter-block>';
                echo '<h3 class="filter-title">Categories</h3>';

                echo '<div class="option-set" data-filter="genre">';
                echo '<ul>';
                if ( !empty( $majors ) && !is_wp_error( $majors ) ){
                    foreach ( $majors as $major ) {
                        echo '<li><input type="checkbox" value=".' . $major->slug . '" id="' . $major->slug . '"><label for="' . $major->slug . '">' . $major->name . '</label></li>';
                   }
                }
                echo '</ul>';
                echo '</div>';

                // Genres
                echo '<div class="filter-block>';
                echo '<h3 class="filter-title">Genres</h3>';
                echo '<div class="option-set" data-filter="genre">';
                echo '<ul>';
                if ( !empty( $genres ) && !is_wp_error( $genres ) ){
                    foreach ( $genres as $genre ) {
                        echo '<li><input type="checkbox" value=".' . $genre->slug . '" id="' . $genre->slug . '"><label for="' . $genre->slug . '">' . $genre->name . '</label></li>';
                   }
                }
                echo '</ul>';
                echo '</div>';

                // Types
                /*
                echo '<div class="filter-block>';
                echo '<h3 class="filter-title">Types</h3>';
                echo '<div class="option-set" data-filter="type">';
                echo '<ul>';
                if ( !empty( $types ) && !is_wp_error( $types ) ){
                    foreach ( $types as $type ) {
                        echo '<li><input type="checkbox" value=".' . $type->slug . '" id="' . $type->slug . '"><label for="' . $type->slug . '">' . $type->name . '</label></li>';
                   }
                }
                echo '</ul>';
                echo '</div>';
                */

                // Durations
                echo '<div class="filter-block>';
                echo '<h3 class="filter-title">Duration</h3>';
                echo '<div class="option-set" data-filter="duration">';
                echo '<ul>';
                if ( !empty( $durations ) && !is_wp_error( $durations ) ){
                    foreach ( $durations as $duration ) {
                        echo '<li><input type="checkbox" value=".' . $duration->slug . '" id="' . $duration->slug . '"><label for="' . $duration->slug . '">' . $duration->name . '</label></li>';
                   }
                }
                echo '</ul>';
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
