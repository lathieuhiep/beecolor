<?php

// Remove jquery migrate
add_action( 'wp_default_scripts', 'beecolor_remove_jquery_migrate' );
function beecolor_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'beecolor_register_back_end_scripts');

function beecolor_register_back_end_scripts(){

	/* Start Get CSS Admin */
	wp_enqueue_style( 'beecolor-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'beecolor_register_front_end');

function beecolor_register_front_end() {

	// font google
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', array(), null );

	/* Start main Css */
	wp_enqueue_style( 'beecolor-library', get_theme_file_uri( '/assets/css/library.min.css' ), array(), '' );
	/* End main Css */

    /* Start main Css */
    wp_enqueue_style( 'fontawesome-5', get_theme_file_uri( '/assets/fonts/fontawesome/css/all.min.css' ), array(), '5.12.1' );
    /* End main Css */

	/*  Start Style Css   */
	wp_enqueue_style( 'beecolor-style', get_stylesheet_uri() );
	/*  Start Style Css   */

	/*
	* End Get Css Front End
	* */

	/*
	* Start Get Js Front End
	* */

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

	// Load library js.
	wp_enqueue_script( 'beecolor-library', get_theme_file_uri( '/assets/js/library.min.js' ), array('jquery'), '', true );

	wp_enqueue_script( 'beecolor-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0.0', true );

    if ( is_page_template( 'templates/template-warranty.php' ) ) {
        wp_enqueue_script( 'warranty-page', get_theme_file_uri( '/assets/js/load-warranty.js' ), array('jquery'), '', true );

        $beecolor_warranty_page_admin_url = admin_url( 'admin-ajax.php' );
        $beecolor_warranty_page_get_post = array( 'url' => $beecolor_warranty_page_admin_url );
        wp_localize_script( 'warranty-page', 'warranty_page', $beecolor_warranty_page_get_post );
    }

	/*
   * End Get Js Front End
   * */

    // add script header
    function beecolor_recaptcha() {
        if ( is_page_template('templates/template-warranty.php') || is_page_template('templates/landing.php') ) :
    ?>
        <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
    <?php
        endif;
    }

    add_action('wp_head', 'beecolor_recaptcha');

}