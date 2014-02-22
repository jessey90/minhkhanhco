<?php
/**
 * Displays the page section of the theme.
 *
 */
?>

<?php get_header(); ?>

<?php
/**
 * travelify_before_main_container hook
 */
do_action( 'travelify_before_main_container' );
?>

<div id="container">
    <?php
    do_action( 'travelify_main_container' );
    /*    if (is_page()) {
            $cat="59";
            $posts = get_posts ("cat=$cat&showposts=5");
            if ($posts) {
                foreach ($posts as $post):
                    setup_postdata($post); */?><!--
                <a href="<?php /*the_permalink() */?>" rel="bookmark" title="Permanent Link to <?php /*the_title_attribute(); */?>"><?php /*the_title(); */?></a></h2>
                --><?php /*endforeach;
        }
    }*/
    ?>
</div><!-- #container -->

<?php
/**
 * travelify_after_main_container hook
 */
do_action( 'travelify_after_main_container' );
?>

<?php get_footer(); ?>