<?php
/*
 * Display each student with headshot and full name
 */
?>

<div class="student">
	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<div class="student-headshot">
			<?php 

			$image = get_field('profile_picture');

			if( !empty($image) ): ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
		</div><!-- .student-headshot -->
		<h3 class="student-name"><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h3>
	</a>
	
</div><!-- .student -->
