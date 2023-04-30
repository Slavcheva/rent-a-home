<?php get_header(); ?>
<!--<ul>-->
<?php if ( have_posts() ): ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/single-property', 'item' ) ?>

<!--		--><?php //echo rent_a_home_display_other_jobs_per_location( get_the_ID() ); ?>

		<?php rent_a_home_update_property_views_count( get_the_ID() ); ?>
	<?php endwhile; ?>

<?php endif; ?>
<!--</ul>-->
<?php get_footer(); ?>
