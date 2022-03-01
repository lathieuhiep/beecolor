<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post type oil product
*---------------------------------------------------------------------
*/

add_action('init', 'beecolor_create_warranty', 10);

function beecolor_create_warranty() {

    /* Start post type */
    $labels = array(
        'name'                  =>  _x( 'Bảo hành', 'post type general name', 'beecolor' ),
        'singular_name'         =>  _x( 'Bảo hành', 'post type singular name', 'beecolor' ),
        'menu_name'             =>  _x( 'Bảo hành', 'admin menu', 'beecolor' ),
        'name_admin_bar'        =>  _x( 'Danh sách bảo hành', 'add new on admin bar', 'beecolor' ),
        'add_new'               =>  _x( 'Thêm mới', 'Bảo hành', 'beecolor' ),
        'add_new_item'          =>  esc_html__( 'Thêm mới', 'beecolor' ),
        'edit_item'             =>  esc_html__( 'Sửa', 'beecolor' ),
        'new_item'              =>  esc_html__( 'Bảo hành mới', 'beecolor' ),
        'view_item'             =>  esc_html__( 'Xem bảo hành', 'beecolor' ),
        'all_items'             =>  esc_html__( 'Danh sách bảo hành', 'beecolor' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm bảo hành', 'beecolor' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'beecolor' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thúng rác', 'beecolor' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-book',
        'rewrite'            => array('slug' => 'bao-hanh' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 56,
        'supports'           => array( 'title' ),
    );

    register_post_type('warranty', $args );
    /* End post type */

}

// change placeholder title
add_filter('enter_title_here', 'beecolor_place_holder' , 20 , 2 );
function beecolor_place_holder($title , $post){

    if( $post->post_type == 'warranty' ){
        return esc_html__('Thêm mã bảo hành', 'beecolor');
    }

    return $title;

}