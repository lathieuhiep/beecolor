<?php
// Remove gutenberg widgets
add_filter('use_widgets_block_editor', '__return_false');

/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'beecolor_widgets_init');

function beecolor_widgets_init() {

	$beecolor_widgets_arr  =   array(

		'beecolor-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'beecolor' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'beecolor' )
		),

		'beecolor-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'beecolor' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'beecolor' )
		),

		'beecolor-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'beecolor' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'beecolor' )
		),

		'beecolor-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'beecolor' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'beecolor' )
		),

		'beecolor-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'beecolor' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'beecolor' )
		),

		'beecolor-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'beecolor' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'beecolor' )
		)

	);

	foreach ( $beecolor_widgets_arr as $beecolor_widgets_id => $beecolor_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $beecolor_widgets_value['name'] ),
			'id'            =>  esc_attr( $beecolor_widgets_id ),
			'description'   =>  esc_attr( $beecolor_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}