<?php
/**
 * Displays the archive section of the theme.
 *
 */
?>

<?php get_header(); ?>

<div id="container">
    <?php
    do_action( 'travelify_main_container' );
    ?>
</div><!-- #container -->

<?php
/**
 * travelify_after_main_container hook
 */
do_action( 'travelify_after_main_container' );
?>

<?php get_footer(); ?>