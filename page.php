<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package modtheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
                    /**
                     * The template used for displaying page content in page.php
                     *
                     * @package modtheme
                     */
                    ?>
          <img id="main-picture" src="imgs/aboutpage_img.jpg">
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                        <div id= "main-body">
                                <div id= "side-pic">
                                    <?php 
                                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                    the_post_thumbnail();
                                } 
                                ?>
                                </div> 
                                
                                </header><!-- .entry-header -->
                                <div class="entry-content">
                                    <header class="entry-header">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                    <?php the_content(); ?>

                                </div><!-- .entry-content -->
                        </div>
                        
                        <footer class="entry-footer">
                            <?php edit_post_link( __( 'Edit', 'mod' ), '<span class="edit-link">', '</span>' ); ?>
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
