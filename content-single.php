<?php
/**
 * @package modtheme
 */
?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="movie-wrapper">
		<div class="the-movie embed-container" >
		<!-- Append vimeo ID, better way to do this? Unclear how we're hosting videos-->
			<iframe src='http://player.vimeo.com/video/<?php the_field('video-url'); ?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
	</div>

	<div class="wrapper">
		<div class="entry-content">
			
			<!-- Movie -->
			<div class="movie-container page-text-container">
				<div class="movie-poster page-image">
					<?php
					// check if post has as post thumbail assigned to it
						if ( has_post_thumbnail() ) {
							echo '<figure class="poster">';
							the_post_thumbnail();
							echo '</figure>';
						}
					?>
				</div>
				<!-- Movie-info -->
				<div class="flex-column">
					<header class="movie-info">
						<h1 class="entry-title">
						  	<?php the_title(); ?> 
				            <span class="creator">by 
				                <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
				            </span>
			        	</h1>
						
				        <div class="meta-content">
				            <span class="time"><?php 
				            	echo get_the_term_list( $post->ID, 'durations', '', ', ' ); 
				                ?>
				            </span> | 
				            <span class="genre">
				                <?php 
				                echo get_the_term_list( $post->ID, 'genres', '', ', ' ); 
				                ?>
				       		 </span> | 
				       		 <span class="trailer-link">
				       		 	<a href="#">Trailer</a>
				       		 </span> 
				        </div><!-- .meta-content -->
					</header><!-- .entry-header -->
					<div class="hr"><hr/></div>
					<p><?php the_content(); ?></p>
				</div>
			</div>
		</div>
	</div>

		<div class="artist-wrapper">
			<div class="wrapper">
			<!-- Artist-->
				<div class="artist-container page-text-container">
					<!-- Artist Picture -->
					<div class="artist-picture page-image">
						<?php 
							$image = get_field('profile_picture');
							if( !empty($image) ): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

						<?php endif; ?>
					</div>
					<!-- Artist info-->
					<div class="flex-column">
						<header class="movie-info">
							<h1 class="entry-title">
					                <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
				        	</h1>
					        <div class="meta-content">
					        	<span class="artist-major">
					            	<a href="#">
					            		<?php echo get_the_category_list( ', ');?>
					            	</a>
					            </span> | 
					            <span class="artist-email">
					            	<a href="#"><?php the_field('email_address'); ?></a>
					            </span> | 
					            <span class="artist-website">
					                <a href="#"><?php the_field('website'); ?></a>
					       		 </span> |
					       		 <span class="artist-social">
					                <a href="<?php the_field('social_media'); ?>"><?php the_field('social_media_site'); ?></a>
					       		 </span>
					        </div><!-- .meta-content -->
						</header><!-- .entry-header -->
						<div class="hr"><hr/></div>
						<p><?php the_field('artist_statement'); ?></p>
					</div>
				</div>
				<!--
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'mod' ),
						'after'  => '</div>',
					) );
				?>
				-->
			</div>
		</div><!-- .entry-content -->



		<footer class="entry-footer">
			<?php mod_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</div>
