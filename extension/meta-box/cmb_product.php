<?php

add_action( 'cmb2_admin_init', 'beecolor_product_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function beecolor_product_metaboxes() {

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'beecolor_product_info_metabox',
        'title'         => esc_html__( 'Thông tin bổ sung', 'beecolor' ),
        'object_types'  => array( 'product', ), // Post type
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true,
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Tư vấn thi công', 'beecolor' ),
        'id'      => 'beecolor_product_construction_consultant',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Bảng màu', 'beecolor' ),
        'id'      => 'beecolor_product_table_color',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 10
        ),
    ) );

}