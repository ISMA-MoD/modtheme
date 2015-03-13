<?php
/**
 * @package modtheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        
        <h1 class="entry-title">
		  <?php the_title(); ?> 
            <span class="creator">by 
                <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
            </span>
        </h1>
        
        <div class="meta-content">
            <span class="time"><?php 
echo get_the_term_list( $post->ID, 'durations', '', ', ' ); 
                ?></span> | 
            <span class="genre">
                <?php 
echo get_the_term_list( $post->ID, 'genres', '', ', ' ); 
                ?></span>
            
            | <span class="trailer-link"><a href="#">Trailer</a></span>
            
        </div><!-- .meta-content -->
        
        
        
        
		<div class="entry-meta">
			<?php mod_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php
        // check if the post has a Post Thumbnail assigned to it.
            if ( has_post_thumbnail() ) {
                echo '<figure class="poster">';
                the_post_thumbnail();
                echo '</figure>';
            } 
        ?>
        
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mod' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mod_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
