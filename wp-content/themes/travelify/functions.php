<?php
//Entry Date
function ta_entry_date( $echo = true ) {
    if ( has_post_format( array( 'chat', 'status' ) ) )
        $format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
    else
        $format_prefix = '%2$s';

    $date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%3$s</time></a></span>',
        esc_url( get_permalink() ),
        esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
    );

    if ( $echo )
        echo $date;

    return $date;
}

//Entry Meta
function ta_entry_meta() {
    if ( is_sticky() && is_home() && ! is_paged() )
        echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

    if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
        ta_entry_date();

    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
    if ( $categories_list ) {
        echo '<span class="categories-links">' . $categories_list . '</span>';
    }

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
    if ( $tag_list ) {
        echo '<span class="tags-links">' . $tag_list . '</span>';
    }

    // Post author
    if ( 'post' == get_post_type() ) {
        printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
            get_the_author()
        );
    }
}
//Phân trang
function ta_paging_nav() {
    global $wp_query;

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 )
        return;
    ?>
<nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
    <div class="nav-links">

        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
        <?php endif; ?>

        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
        <?php endif; ?>

    </div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
}

/**
 * Travelify defining constants, adding files and WordPress core functionality.
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 700;


if ( ! function_exists( 'travelify_setup' ) ):

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme', 'travelify_setup' );

 /** 
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 */

function travelify_setup() {
	/** 
	 * travelify_add_files hook
	 *
	 * Adding other addtional files if needed.
	 */
	do_action( 'travelify_add_files' );

	/* Travelify is now available for translation. */
	require( get_template_directory() . '/library/functions/i18n.php' );

	/** Load functions */
	require( get_template_directory() . '/library/functions/functions.php' );
	
	/** Load WP backend related functions */
	require( get_template_directory() . '/library/panel/themeoptions-defaults.php' );
	require( get_template_directory() . '/library/panel/theme-options.php' );
	require( get_template_directory() . '/library/panel/metaboxes.php' );
	require( get_template_directory() . '/library/panel/show-post-id.php' );

	/** Load Shortcodes */
	require( get_template_directory() . '/library/functions/shortcodes.php' );

	/** Load Structure */
	require( get_template_directory() . '/library/structure/header-extensions.php' );
	require( get_template_directory() . '/library/structure/sidebar-extensions.php' );
	require( get_template_directory() . '/library/structure/footer-extensions.php' );
	require( get_template_directory() . '/library/structure/content-extensions.php' );

	/** 
	 * travelify_add_functionality hook
	 *
	 * Adding other addtional functionality if needed.
	 */
	do_action( 'travelify_add_functionality' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' ); 
 
	// This theme uses wp_nav_menu() in header menu location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'travelify' ) );


	// Add Travelify custom image sizes
	add_image_size( 'featured', 670, 300, true );
	add_image_size( 'featured-medium', 230, 230, true );
	add_image_size( 'slider', 1018, 460, true ); 		// used on Featured Slider on Homepage Header
	add_image_size( 'gallery', 474, 342, true ); 				// used to show gallery all images
    remove_filter( 'the_content', 'wpautop' );               //Loại bỏ thẻ br và p tự động add vào

	// This feature enables woocommerce support for a theme.
	add_theme_support( 'woocommerce' );
	
	/**
	 * This theme supports custom background color and image
	 */
	$args = array(
		'default-color' => '#d3d3d3',
		'default-image' => get_template_directory_uri() . '/images/background.png',
	);
	add_theme_support( 'custom-background', $args );
	
	/**
	 * This theme supports add_editor_style 
	 */
	add_editor_style();
}	
endif; // travelify_setup

?>