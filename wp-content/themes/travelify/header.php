<?php
/**
 * Displays the header section of the theme.
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster">
	<?php		
		/** 
		 * travelify_title hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * travelify_add_meta 5
		 * travelify_show_title 10
		 *
		 */
		do_action( 'travelify_title' );

		/** 
		 * travelify_meta hook
		 */
		do_action( 'travelify_meta' );

		/** 
		 * travelify_links hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * travelify_add_links 10
		 * travelify_favicon 15
		 * travelify_webpageicon 20
		 *
		 */
		do_action( 'travelify_links' );

		/** 
		 * This hook is important for wordpress plugins and other many things
		 */
		wp_head();
	?>

</head>

<body <?php body_class(); ?>>
	<?php
		/** 
		 * travelify_before hook
		 */
		do_action( 'travelify_before' );
	?>

	<div class="wrapper">
		<?php
			/** 
			 * travelify_before_header hook
			 */
			do_action( 'travelify_before_header' );
		?>
		<header id="branding" >
            <div id="logoMK">
                <img src="http://minhkhanhco.com/wp-content/uploads/Logo-cty-MK-1.png" alt="Minh Khánh" style="width: 150px;
margin: 23px 10px -40px 20px;float: left;">
            </div>
            <div id="kinhdoanh1" style="width: 200px;float: right;padding: 10px;">
                <a href="skype:vo_hien?chat">
                    <img src="http://minhkhanhco.com/wp-content/uploads/skype.png" alt="" style="width: 40px;float: left;margin: 5px;">
                    <p style="font-size: 11px;margin-bottom: 0;">Kinh Doanh 2</p>
                    <p style="font-size: 12px;margin-bottom: 0;">HOTLINE: 0988021912</p>
                </a>
            </div>
            <div id="kinhdoanh2" style="width: 200px;float: right;padding: 10px;">
                <a href="skype:bintran?chat">
                    <img src="http://minhkhanhco.com/wp-content/uploads/skype.png" alt="" style="width: 40px;float: left;margin: 5px;">
                    <p style="font-size: 11px;margin-bottom: 0;">Kinh Doanh 1</p>
                    <p style="font-size: 12px;margin-bottom: 0;">HOTLINE: 0909861151</p>
                </a>
            </div>
			<?php
				/** 
				 * travelify_header hook
				 *
				 * HOOKED_FUNCTION_NAME PRIORITY
				 *
				 * travelify_headerdetails 10
				 */
				do_action( 'travelify_header' );
			?>
		</header>
		<?php
			/** 
			 * travelify_after_header hook
			 */
			do_action( 'travelify_after_header' );
		?>

		<?php
			/** 
			 * travelify_before_main hook
			 */
			do_action( 'travelify_before_main' );
		?>
		<div id="main" class="container clearfix">