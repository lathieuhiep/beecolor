<?php

/**
 * Shop WooCommerce Hooks
 */

/**
 * Layout
 *
 * @see beecolor_get_cart()
 * @see beecolor_button_quick_view()
 * @see beecolor_woo_before_main_content()
 * @see beecolor_woo_before_shop_loop_open()
 * @see beecolor_woo_before_shop_loop_close()
 * @see beecolor_woo_before_shop_loop_item()
 * @see beecolor_woo_after_shop_loop_item()
 * @see beecolor_woo_product_thumbnail_open()
 * @see beecolor_woo_product_thumbnail_close()
 * @see beecolor_woo_get_product_title()
 * @see beecolor_woo_after_shop_loop_item_title()
 * @see beecolor_woo_loop_add_to_cart_open()
 * @see beecolor_woo_loop_add_to_cart_close()
 * @see beecolor_woo_get_sidebar()
 * @see beecolor_woo_after_main_content()
 * @see beecolor_popup_quick_view_product()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'beecolor_woo_shopping_cart', 'beecolor_get_cart', 5 );

//add_action( 'beecolor_woo_button_quick_view', 'beecolor_button_quick_view', 5 );

add_action( 'woocommerce_before_main_content', 'beecolor_woo_before_main_content', 10 );

//add_action( 'woocommerce_before_shop_loop', 'beecolor_woo_before_shop_loop_open',  15 );
//add_action( 'woocommerce_before_shop_loop', 'beecolor_woo_before_shop_loop_close',  35 );

add_action( 'woocommerce_before_shop_loop_item_title', 'beecolor_woo_product_thumbnail_open', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'beecolor_woo_product_thumbnail_close', 15 );

add_action( 'woocommerce_shop_loop_item_title', 'beecolor_woo_get_product_title', 10 );

add_action( 'woocommerce_after_shop_loop_item_title', 'beecolor_woo_after_shop_loop_item_title', 15 );

add_action( 'woocommerce_after_shop_loop_item', 'beecolor_woo_loop_add_to_cart_open', 4 );
add_action( 'woocommerce_after_shop_loop_item', 'beecolor_woo_loop_add_to_cart_close', 12 );

add_action ( 'woocommerce_before_shop_loop_item', 'beecolor_woo_before_shop_loop_item', 5 );
add_action ( 'woocommerce_after_shop_loop_item', 'beecolor_woo_after_shop_loop_item', 15 );

add_action( 'beecolor_woo_sidebar', 'beecolor_woo_get_sidebar', 10 );

add_action( 'woocommerce_after_main_content', 'beecolor_woo_after_main_content', 10 );

//add_action( 'woocommerce_after_main_content', 'beecolor_popup_quick_view_product', 12 );

/**
 * Single Product
 *
 * @see beecolor_woo_before_single_product()
 * @see beecolor_woo_before_single_product_summary_open_warp()
 * @see beecolor_woo_before_single_product_summary_open()
 * @see beecolor_woo_before_single_product_summary_close()
 * @see beecolor_woo_after_single_product_summary_close_warp()
 * @see beecolor_woo_after_single_product()
 *
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

add_action( 'woocommerce_before_single_product', 'beecolor_woo_before_single_product', 5 );

add_action( 'woocommerce_before_single_product_summary', 'beecolor_woo_before_single_product_summary_open_warp',  1 );

add_action( 'woocommerce_before_single_product_summary', 'beecolor_woo_before_single_product_summary_open', 5 );
add_action( 'woocommerce_before_single_product_summary', 'beecolor_woo_before_single_product_summary_close', 30 );

add_action( 'woocommerce_after_single_product_summary', 'beecolor_woo_after_single_product_summary_close_warp', 5 );

add_action( 'woocommerce_after_single_product', 'beecolor_woo_after_single_product', 30 );

