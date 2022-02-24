<?php

add_action('cmb2_admin_init', 'beecolor_warranty_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function beecolor_warranty_metaboxes()
{

    // customer info metabox
    $cmb_customer_info = new_cmb2_box(array(
        'id' => 'beecolor_warranty_info_metabox',
        'title' => esc_html__('Thông tin khách hàng', 'beecolor'),
        'object_types' => array('warranty',),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_customer_info->add_field(array(
        'name' => esc_html__('Tên khách hàng', 'beecolor'),
        'id' => 'beecolor_warranty_name',
        'type' => 'text',
        'attributes' => array(
            'required' => 'required',
        ),
    ));

    $cmb_customer_info->add_field(array(
        'name' => esc_html__('Số điện thoại', 'beecolor'),
        'id' => 'beecolor_warranty_phone',
        'type' => 'text',
        'attributes' => array(
            'required' => 'required',
        ),
    ));

    $cmb_customer_info->add_field(array(
        'name' => esc_html__('Địa chỉ', 'beecolor'),
        'id' => 'beecolor_warranty_address',
        'type' => 'text',
    ));

    $cmb_customer_info->add_field(array(
        'name' => esc_html__('CMND/CCCD', 'beecolor'),
        'id' => 'beecolor_warranty_id_no',
        'type' => 'text',
    ));

    $cmb_customer_info->add_field(array(
        'name' => esc_html__('Ngày cấp', 'beecolor'),
        'id' => 'beecolor_warranty_issued_on',
        'type' => 'text_date',
        'class' => 'yourprefix_function_to_add_classes'
    ));

    $cmb_customer_info->add_field(array(
        'name' => esc_html__('Nơi cấp', 'beecolor'),
        'id' => 'beecolor_warranty_issued_by',
        'type' => 'text',
    ));


    $cmb_customer_info->add_field(array(
        'name' => esc_html__('Địa điểm công trình', 'beecolor'),
        'id' => 'beecolor_warranty_project_address',
        'type' => 'text',
    ));

    // construction metabox
    $cmb_construction = new_cmb2_box(array(
        'id' => 'beecolor_warranty_construction_metabox',
        'title' => esc_html__('Đơn vị phụ trách thi công', 'beecolor'),
        'object_types' => array('warranty',),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_construction->add_field(array(
        'name' => esc_html__('Tên đơn vị', 'beecolor'),
        'id' => 'beecolor_warranty_construction_name',
        'type' => 'text',
    ));

    $cmb_construction->add_field(array(
        'name' => esc_html__('Số điện thoại', 'beecolor'),
        'id' => 'beecolor_warranty_construction_phone',
        'type' => 'text',
    ));

    $cmb_construction->add_field(array(
        'name' => esc_html__('Ghi chú', 'beecolor'),
        'id' => 'beecolor_warranty_construction_note',
        'type' => 'textarea_small'
    ));

    // Monitoring unit
    $cmb_monitoring = new_cmb2_box(array(
        'id' => 'beecolor_warranty_monitoring_metabox',
        'title' => esc_html__('Đơn vị giám sát', 'beecolor'),
        'object_types' => array('warranty',),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $cmb_monitoring->add_field(array(
        'name' => esc_html__('Tên đơn vị', 'beecolor'),
        'id' => 'beecolor_warranty_monitoring_name',
        'type' => 'text',
    ));

    $cmb_monitoring->add_field(array(
        'name' => esc_html__('Số điện thoại', 'beecolor'),
        'id' => 'beecolor_warranty_monitoring_phone',
        'type' => 'text',
    ));

    $cmb_monitoring->add_field(array(
        'name' => esc_html__('Ghi chú', 'beecolor'),
        'id' => 'beecolor_warranty_monitoring_note',
        'type' => 'textarea_small'
    ));

    // Product
    $cmb_product = new_cmb2_box(array(
        'id' => 'beecolor_warranty_product',
        'title' => esc_html__('Thông tin sản phẩm', 'beecolor'),
        'object_types' => array('warranty',),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    $group_product_field_id = $cmb_product->add_field(array(
        'id' => 'beecolor_warranty_product_repeat_group',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Sản phẩm {#}', 'beecolor'),
            'add_button' => esc_html__('Thêm sản phẩm', 'beecolor'),
            'remove_button' => esc_html__('Xoá', 'beecolor'),
            'sortable' => true,
            'closed' => false,
        ),
    ));

    $cmb_product->add_group_field($group_product_field_id, array(
        'name' => esc_html__('Tên sản phẩm', 'beecolor'),
        'id' => 'beecolor_warranty_product_name',
        'type' => 'text',
        'attributes' => array(
            'required' => 'required',
        ),
    ));

    $cmb_product->add_group_field($group_product_field_id, array(
        'name' => esc_html__('Mã màu', 'beecolor'),
        'id' => 'beecolor_warranty_product_color',
        'type' => 'text',
    ));

    $cmb_product->add_group_field($group_product_field_id, array(
        'name' => esc_html__('Số lượng', 'beecolor'),
        'id' => 'beecolor_warranty_product_amount',
        'type' => 'text',
        'default' => 1,
        'attributes' => array(
            'type' => 'number',
            'min' => '1',
        ),
    ));

    $cmb_product->add_group_field($group_product_field_id, array(
        'name' => esc_html__('Ngày bắt đầu bảo hành', 'beecolor'),
        'id' => 'beecolor_warranty_product_start_date',
        'type' => 'text_date',
    ));

    $cmb_product->add_group_field($group_product_field_id, array(
        'name' => esc_html__('Ngày kết thúc bảo hành', 'beecolor'),
        'id' => 'beecolor_warranty_product_end_date',
        'type' => 'text_date',
    ));

    $cmb_product->add_field(array(
        'name' => esc_html__('Hình ảnh', 'beecolor'),
        'desc' => 'Upload an image or enter an URL.',
        'id' => 'beecolor_warranty_product_image',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
            'remove_image_text' => 'Replacement', // default: "Remove Image"
            'file_text' => 'Replacement', // default: "File:"
            'file_download_text' => 'Replacement', // default: "Download"
            'remove_text' => 'Replacement', // default: "Remove"
        ),
    ));

    $cmb_product->add_field(array(
        'name' => esc_html__('Video', 'beecolor'),
        'id' => 'beecolor_warranty_product_video',
        'desc' => esc_html__('Nhập link youtube, twitter, hoặc instagram', 'beecolor'),
        'type' => 'oembed',
    ));

}