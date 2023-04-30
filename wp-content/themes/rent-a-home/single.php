<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/single-property', 'item' ) ?>

	<?php endwhile; ?>
<!--	--><?php //rent_a_home_update_property_views_count( get_the_ID() ); ?>

<?php endif; ?>

<?php get_footer(); ?>
