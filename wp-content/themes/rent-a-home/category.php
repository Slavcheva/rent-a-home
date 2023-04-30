<?php get_header(); ?>
<h1><?php the_archive_title(); ?></h1>

<?php if ( category_description() ) { ?>
    <div><?php echo category_description(); ?></div>
<?php } ?>

<?php if ( have_posts() ): ?>
    <ul class="properties-listing">

		<?php while ( have_posts() )  : ?>

			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/post', 'item' ); ?>

		<?php endwhile; ?>
		<?php posts_nav_link(); ?>

    </ul>
<?php else: ?>
	<?php _e( 'Not found posts', 'rent-a-home' ); ?>
<?php endif; ?>


<?php get_footer(); ?>

