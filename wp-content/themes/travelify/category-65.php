<?php
/**
 * Displays the archive section of the theme.
 *
 */
?>

<?php get_header(); ?>

<div id="container">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>

    <?php ta_paging_nav(); ?>

    <?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
</div><!-- #container -->

<?php
/**
 * travelify_after_main_container hook
 */
do_action( 'travelify_after_main_container' );
?>

<?php get_footer(); ?>