<?php
/**
 *
 * @package spa_V3
  Template Name: LandingPage 01
 */
 ?>

<?php get_header(); ?>

		<section class="spa_V3" id="main-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>

				<?php endwhile; ?>

				<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
		</section>		

	<?php get_footer(); ?>
