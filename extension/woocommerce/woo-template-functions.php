<?php

/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action( 'after_setup_theme', 'beecolor_shop_setup' );

function beecolor_shop_setup() {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* Remove title page shop */
add_filter('woocommerce_show_page_title', '__return_false');

function beecolor_price_override( $price, $product ) {
	if ( empty( $product->get_price() ) ) {
		/*
		 * Replace the word "Free" with whatever text you would like. Also
		 * remember to update the textdomain for translation if required.
		 */
		$price = __( 'Liên hệ', 'beecolor' );
	}

	return $price;
}
add_filter( 'woocommerce_get_price_html', 'beecolor_price_override', 100, 2 );



/* Start limit product */
add_filter('loop_shop_per_page', 'beecolor_show_products_per_page');

function beecolor_show_products_per_page() {
    global $beecolor_options;

    $beecolor_product_limit = $beecolor_options['beecolor_product_limit'];

    return $beecolor_product_limit;

}
/* End limit product */

/* Start Change number or products per row */
add_filter('loop_shop_columns', 'beecolor_loop_columns_product');

function beecolor_loop_columns_product() {
    global $beecolor_options;

    $beecolor_products_per_row = $beecolor_options['beecolor_products_per_row'];

    if ( !empty( $beecolor_products_per_row ) ) :
        return $beecolor_products_per_row;
    else:
        return 4;
    endif;

}
/* End Change number or products per row */

/* Start get cart */
if ( ! function_exists( 'beecolor_get_cart' ) ):

    function beecolor_get_cart() {

    ?>

        <div class="cart-box d-flex align-items-center">
            <div class="cart-customlocation">
                <i class="fas fa-shopping-cart"></i>

                <span class="number-cart-product">
                     <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                </span>
            </div>
        </div>

    <?php
    }

endif;

/* To ajaxify your cart viewer */
add_filter( 'woocommerce_add_to_cart_fragments', 'beecolor_add_to_cart_fragment' );

if ( ! function_exists( 'beecolor_add_to_cart_fragment' ) ) :

    function beecolor_add_to_cart_fragment( $beecolor_fragments ) {

        ob_start();

        do_action( 'beecolor_woo_shopping_cart' );

        $beecolor_fragments['.cart-box'] = ob_get_clean();

        return $beecolor_fragments;

    }

endif;
/* End get cart */

/* Start Sidebar Shop */
if ( ! function_exists( 'beecolor_woo_get_sidebar' ) ) :

    function beecolor_woo_get_sidebar() {

	    global $beecolor_options;
	    $beecolor_sidebar_woo_position = $beecolor_options['beecolor_sidebar_woo'];


	    if( is_active_sidebar( 'beecolor-sidebar-wc' ) && $beecolor_sidebar_woo_position != 'hide' ):

	        if ( $beecolor_sidebar_woo_position == 'left' ) :
		        $class_order = 'order-md-1';
	        else:
		        $class_order = 'order-md-2';
	        endif;
    ?>

            <aside class="col-12 col-md-4 col-lg-3 order-2 <?php echo esc_attr( $class_order ); ?>">
                <?php dynamic_sidebar( 'beecolor-sidebar-wc' ); ?>
            </aside>

    <?php
        endif;
    }

endif;
/* End Sidebar Shop */

/*
* Lay Out Shop
*/

if ( ! function_exists( 'beecolor_woo_before_main_content' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function beecolor_woo_before_main_content() {
        global $beecolor_options;
        $beecolor_sidebar_woo_position = $beecolor_options['beecolor_sidebar_woo'];

    ?>

        <div class="site-container site-shop">
            <div class="container">
                <div class="row">

                <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked beecolor_woo_sidebar - 10
                     */
                    do_action( 'beecolor_woo_sidebar' );

                ?>

                    <div class="<?php echo is_active_sidebar( 'beecolor-sidebar-wc' ) && $beecolor_sidebar_woo_position != 'hide' ? 'col-12 col-md-8 col-lg-9 order-1 has-sidebar' : 'col-md-12'; ?>">

    <?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_after_main_content' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function beecolor_woo_after_main_content() {
    ?>

                    </div><!-- .col-md-9 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-shop -->

    <?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_product_thumbnail_open' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked beecolor_woo_product_thumbnail_open - 5
     */

    function beecolor_woo_product_thumbnail_open() {

?>

        <div class="site-shop__product--item-image">

<?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_product_thumbnail_close' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked beecolor_woo_product_thumbnail_close - 15
     */

    function beecolor_woo_product_thumbnail_close() {

        do_action( 'beecolor_woo_button_quick_view' );
?>

        </div><!-- .site-shop__product--item-image -->

        <div class="site-shop__product--item-content">

<?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_get_product_title' ) ) :
    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked beecolor_woo_get_product_title - 10
     */

    function beecolor_woo_get_product_title() {
    ?>
        <h2 class="woocommerce-loop-product__title">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php
    }
endif;

if ( ! function_exists( 'beecolor_woo_after_shop_loop_item_title' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked beecolor_woo_after_shop_loop_item_title - 15
     */
    function beecolor_woo_after_shop_loop_item_title() {
    ?>
        </div><!-- .site-shop__product--item-content -->
    <?php
    }
endif;

if ( ! function_exists( 'beecolor_woo_loop_add_to_cart_open' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked beecolor_woo_loop_add_to_cart_open - 4
     */

    function beecolor_woo_loop_add_to_cart_open() {
    ?>
        <div class="site-shop__product-add-to-cart">
    <?php
    }

endif;

if ( ! function_exists( 'beecolor_woo_loop_add_to_cart_close' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked beecolor_woo_loop_add_to_cart_close - 12
     */

    function beecolor_woo_loop_add_to_cart_close() {
    ?>
        </div><!-- .site-shop__product-add-to-cart -->
    <?php
    }

endif;

if ( ! function_exists( 'beecolor_woo_before_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked beecolor_woo_before_shop_loop_item - 5
     */
    function beecolor_woo_before_shop_loop_item() {
    ?>

        <div class="site-shop__product--item">

    <?php
    }
endif;

if ( ! function_exists( 'beecolor_woo_after_shop_loop_item' ) ) :
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked beecolor_woo_after_shop_loop_item - 15
     */
    function beecolor_woo_after_shop_loop_item() {
    ?>

        </div><!-- .site-shop__product--item -->

    <?php
    }
endif;

if ( ! function_exists( 'beecolor_woo_before_shop_loop_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked beecolor_woo_before_shop_loop_open - 5
     */
    function beecolor_woo_before_shop_loop_open() {

    ?>

        <div class="site-shop__result-count-ordering d-flex align-items-center justify-content-between">

    <?php
    }

endif;

if ( ! function_exists( 'beecolor_woo_before_shop_loop_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked beecolor_woo_before_shop_loop_close - 35
     */
    function beecolor_woo_before_shop_loop_close() {

    ?>

        </div><!-- .site-shop__result-count-ordering -->

    <?php
    }

endif;

/*
* Single Shop
*/

if ( ! function_exists( 'beecolor_woo_before_single_product' ) ) :

    /**
     * Before Content Single  product
     *
     * woocommerce_before_single_product hook.
     *
     * @hooked beecolor_woo_before_single_product - 5
     */

    function beecolor_woo_before_single_product() {

    ?>

        <div class="site-shop-single">

    <?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_after_single_product' ) ) :

    /**
     * After Content Single  product
     *
     * woocommerce_after_single_product hook.
     *
     * @hooked beecolor_woo_after_single_product - 30
     */

    function beecolor_woo_after_single_product() {

    ?>

        </div><!-- .site-shop-single -->

    <?php

    }

endif;

if ( !function_exists( 'beecolor_woo_before_single_product_summary_open_warp' ) ) :

    /**
     * Before single product summary
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked beecolor_woo_before_single_product_summary_open_warp - 1
     */

    function beecolor_woo_before_single_product_summary_open_warp() {

    ?>

        <div class="site-shop-single__warp">

    <?php

    }

endif;

if ( !function_exists( 'beecolor_woo_after_single_product_summary_close_warp' ) ) :

    /**
     * After single product summary
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked beecolor_woo_after_single_product_summary_close_warp - 5
     */

    function beecolor_woo_after_single_product_summary_close_warp() {

    ?>

        </div><!-- .site-shop-single__warp -->

    <?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_before_single_product_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked beecolor_woo_before_single_product_summary_open - 5
     */

    function beecolor_woo_before_single_product_summary_open() {

    ?>

        <div class="site-shop-single__gallery-box">

    <?php

    }

endif;

if ( ! function_exists( 'beecolor_woo_before_single_product_summary_close' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked beecolor_woo_before_single_product_summary_close - 30
     */

    function beecolor_woo_before_single_product_summary_close() {

    ?>

        </div><!-- .site-shop-single__gallery-box -->

    <?php

    }

endif;

/* custom number gallery */
add_filter( 'woocommerce_single_product_image_gallery_classes', 'beecolor_5_columns_product_gallery' );

function beecolor_5_columns_product_gallery( $wrapper_classes ) {
	$columns = 5;
	$wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );
	return $wrapper_classes;
}

/* Remove title woo tab */
add_filter('woocommerce_product_description_heading', '__return_false');

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['reviews'] ); 			// Remove the reviews tab

	return $tabs;
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = esc_html__( 'Thông số kỹ thuật', 'beecolor' );
//	$tabs['additional_information']['title'] = esc_html__( 'Product Data' );

	return $tabs;

}

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );

function woo_new_product_tab( $tabs ) {
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Tư vấn thi công', 'beecolor' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;
}

function woo_new_product_tab_content( $beecolor_content ) {
    $beecolor_product_construction_consultant = rwmb_meta( 'beecolor_product_construction_consultant' );

    echo $beecolor_product_construction_consultant;
}