<?php
/**
 * @package modtheme
 */
?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="movie-wrapper">
		<div class="the-movie embed-container" >			
			<?php 
				$video_url = get_field('video_url');
				$attr = array(
					'src'		=> esc_url( get_site_url() . '/video/' . $video_url . '.mov' ),
					'width'		=> '',
					'fullscreen'=> 'true'
				);
				echo wp_video_shortcode( $attr );
			?>
			<div class="control">
				<a href="#" class="movie-trigger" data-bind="<?php echo esc_url( get_site_url() . '/video/Trailers/' . $video_url . '.mov'); ?>"><span class="play-button">Play Trailer</span></a> 
				<a href="#" class="movie-trigger" data-bind="<?php echo esc_url( get_site_url() . '/video/Films/' . $video_url . '.mov'); ?>"><span class="play-button">Play Movie</span></a> 
				
			</div>
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
							the_post_thumbnail('mod-poster');
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
				            <span class="time">
				            	<?php
								$terms = get_the_terms( $post->ID, 'durations' );
														
								if ( $terms && ! is_wp_error( $terms ) ) : 

									$durations_array = array();

									foreach ( $terms as $term ) {
										$durations_array[] = $term->name;
									}
														
									$durations = join( ", ", $durations_array );
									
									echo $durations; 

								endif; 
								?>
				            </span> | 
				            <span class="genre">
				                <?php
								$terms = get_the_terms( $post->ID, 'genres' );
														
								if ( $terms && ! is_wp_error( $terms ) ) : 

									$genres_array = array();

									foreach ( $terms as $term ) {
										$genres_array[] = $term->name;
									}
														
									$genres = join( ", ", $genres_array );
									
									echo $genres; 

								endif; 
								?>
				       		 </span>
				        </div><!-- .meta-content -->
					</header><!-- .entry-header -->
					<hr>
					<?php the_content(); ?>
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
								<img src="<?php echo $image['sizes']['medium']; ?>" alt="" >

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
			            			
									<?php 
									$cat = get_the_category(); 
									$cat = $cat[0]; 
									echo $cat->cat_name; 
									?>

					            </span>
					            <!-- | 
					            <span class="artist-email">
					            	<a href="#"><?php the_field('email_address'); ?></a>
					            </span> | 
					            <span class="artist-website">
					                <a href="#"><?php the_field('website'); ?></a>
					       		 </span> |
					       		 <span class="artist-social">
					                <a href="<?php the_field('social_media'); ?>"><?php the_field('social_media_site'); ?></a>
					       		 </span>
					       		 -->
					        </div><!-- .meta-content -->
						</header><!-- .entry-header -->
						<hr>
						<?php the_field('artist_statement'); ?>
					</div>
				</div>

			</div>
		</div><!-- .entry-content -->



		<footer class="entry-footer">
			
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</div>

