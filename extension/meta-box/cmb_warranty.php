<?php

add_action( 'cmb2_admin_init', 'beecolor_warranty_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function beecolor_warranty_metaboxes() {

    // customer info metabox
    $cmb_customer_info = new_cmb2_box( array(
        'id'            => 'beecolor_warranty_info_metabox',
        'title'         => esc_html__( 'Thông tin khách hàng', 'beecolor' ),
        'object_types'  => array( 'warranty', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'Tên khách hàng', 'beecolor' ),
        'id'         => 'beecolor_warranty_name',
        'type'       => 'text',
        'attributes'  => array(
            'required'    => 'required',
        ),
    ) );

    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'Số điện thoại', 'beecolor' ),
        'id'         => 'beecolor_warranty_phone',
        'type'       => 'text',
        'attributes'  => array(
            'required'    => 'required',
        ),
    ) );

    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'Địa chỉ', 'beecolor' ),
        'id'         => 'beecolor_warranty_address',
        'type'       => 'text',
    ) );

    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'CMND/CCCD', 'beecolor' ),
        'id'         => 'beecolor_warranty_id_no',
        'type'       => 'text',
    ) );

    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'Ngày cấp', 'beecolor' ),
        'id'         => 'beecolor_warranty_issued_on',
        'type'       => 'text_date',
        'class' => 'yourprefix_function_to_add_classes'
    ) );

    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'Nơi cấp', 'beecolor' ),
        'id'         => 'beecolor_warranty_issued_by',
        'type'       => 'text',
    ) );


    $cmb_customer_info->add_field( array(
        'name'       => esc_html__( 'Địa điểm công trình', 'beecolor' ),
        'id'         => 'beecolor_warranty_project_address',
        'type'       => 'text',
    ) );

    // construction metabox
    $cmb_construction = new_cmb2_box( array(
        'id'            => 'beecolor_warranty_construction_metabox',
        'title'         => esc_html__( 'Đơn vị phụ trách thi công', 'beecolor' ),
        'object_types'  => array( 'warranty', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $cmb_construction->add_field( array(
        'name'       => esc_html__( 'Tên đơn vị', 'beecolor' ),
        'id'         => 'beecolor_warranty_construction_name',
        'type'       => 'text',
    ) );

    $cmb_construction->add_field( array(
        'name'       => esc_html__( 'Số điện thoại', 'beecolor' ),
        'id'         => 'beecolor_warranty_construction_phone',
        'type'       => 'text',
    ) );

    $cmb_construction->add_field( array(
        'name' => esc_html__( 'Ghi chú', 'beecolor' ),
        'id' => 'beecolor_warranty_construction_note',
        'type' => 'textarea_small'
    ) );

    // Monitoring unit
    $cmb_monitoring = new_cmb2_box( array(
        'id'            => 'beecolor_warranty_monitoring_metabox',
        'title'         => esc_html__( 'Đơn vị giám sát', 'beecolor' ),
        'object_types'  => array( 'warranty', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $cmb_monitoring->add_field( array(
        'name'       => esc_html__( 'Tên đơn vị', 'beecolor' ),
        'id'         => 'beecolor_warranty_monitoring_name',
        'type'       => 'text',
    ) );

    $cmb_monitoring->add_field( array(
        'name'       => esc_html__( 'Số điện thoại', 'beecolor' ),
        'id'         => 'beecolor_warranty_monitoring_phone',
        'type'       => 'text',
    ) );

    $cmb_monitoring->add_field( array(
        'name' => esc_html__( 'Ghi chú', 'beecolor' ),
        'id' => 'beecolor_warranty_monitoring_note',
        'type' => 'textarea_small'
    ) );

}