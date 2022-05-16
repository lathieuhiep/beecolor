<?php
// Register Category Elementor Addon
function beecolor_register_category_elementor_addon( $elements_manager ) {

	$elements_manager->add_category(
		'mytheme',
		[
			'title' => esc_html__( 'My Them', 'beecolor' ),
			'icon' => 'icon-goes-here',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'beecolor_register_category_elementor_addon' );

// Register Widgets Elementor Addon
function beecolor_register_widget_elementor_addon( $widgets_manager ) {

	// include add on
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/slides.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-grid.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-carousel.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/about-text.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/breadcrumb-navxt.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/partners-carousel.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/feature-project.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/image-box-theme.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/image-box-theme-2.php' );

    // template landing page
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/introduce.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/product-popup.php' );

	// register add on
    $widgets_manager->register( new \beecolor_widget_slides() );
    $widgets_manager->register( new \beecolor_widget_post_grid() );
    $widgets_manager->register( new \beecolor_widget_post_carousel() );
    $widgets_manager->register( new \beecolor_widget_about_text() );
    $widgets_manager->register( new \beecolor_widget_breadcrumb_navxt() );
    $widgets_manager->register( new \beecolor_widget_partners_carousel() );
    $widgets_manager->register( new \beecolor_widget_feature_project() );
    $widgets_manager->register( new \beecolor_widget_image_box_theme() );
    $widgets_manager->register( new \beecolor_widget_image_box_theme_2() );
    $widgets_manager->register( new \beecolor_widget_introduce() );
    $widgets_manager->register( new \beecolor_widget_product_popup() );

}
add_action( 'elementor/widgets/register', 'beecolor_register_widget_elementor_addon' );

// Register Script Elementor Addon
function beecolor_register_script_elementor_addon() {
	wp_register_script( 'beecolor-elementor-custom', get_theme_file_uri( '/assets/js/elementor-custom.js' ), array(), '1.0.0', true );

    // load ajax element
    wp_register_script( 'beecolor-landing-page', get_theme_file_uri( '/assets/js/landing-page.js' ), array(), '', true );

    $element_admin_url = admin_url( 'admin-ajax.php' );
    $element_ajax = array( 'url' => $element_admin_url );
    wp_localize_script( 'beecolor-landing-page', 'beecolor_landing_page', $element_ajax );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'beecolor_register_script_elementor_addon' );