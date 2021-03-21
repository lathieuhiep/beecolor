<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','beecolor_config_theme' );

        function beecolor_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $beecolor_options;
                    $beecolor_favicon = $beecolor_options['beecolor_favicon_upload']['url'];

                    if( $beecolor_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $beecolor_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'beecolor_custom_css', 99 );

        function beecolor_custom_css() {

            global $beecolor_options;

            $beecolor_typo_selecter_1   =   $beecolor_options['beecolor_custom_typography_1_selector'];

            $beecolor_typo1_font_family   =   $beecolor_options['beecolor_custom_typography_1']['font-family'] == '' ? '' : $beecolor_options['beecolor_custom_typography_1']['font-family'];

            $beecolor_css_style = '';

            if ( $beecolor_typo1_font_family != '' ) :
                $beecolor_css_style .= ' '.esc_attr( $beecolor_typo_selecter_1 ).' { font-family: '.balanceTags( $beecolor_typo1_font_family, true ).' }';
            endif;

            if ( $beecolor_css_style != '' ) :
                wp_add_inline_style( 'beecolor-style', $beecolor_css_style );
            endif;

        }

    endif;
