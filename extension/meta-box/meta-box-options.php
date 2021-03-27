<?php

add_filter( 'rwmb_meta_boxes', 'beecolor_register_meta_boxes' );

function beecolor_register_meta_boxes() {

    /* Start meta box post */
    $beecolor_meta_boxes[] = array(
        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Tư vấn thi công', 'beecolor' ),
        'post_types' => array( 'product' ),
        'context'    => 'normal',
        'priority'   => 'low',
        'fields' => array(

            array(
                'id' => 'beecolor_product_construction_consultant',
                'type' => 'wysiwyg',
                'options' => array(
	                'textarea_rows' => 10,
	                'teeny' => true,
                ),
            ),

        )
    );
    /* End meta box post */

    return $beecolor_meta_boxes;

}