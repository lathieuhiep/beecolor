<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post type oil product
*---------------------------------------------------------------------
*/

add_action('init', 'beecolor_create_project', 10);

function beecolor_create_project() {

	/* Start post type */
	$labels = array(
		'name'                  =>  _x( 'Dự án', 'post type general name', 'beecolor' ),
		'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'beecolor' ),
		'menu_name'             =>  _x( 'Dự án', 'admin menu', 'beecolor' ),
		'name_admin_bar'        =>  _x( 'Danh sách dự án', 'add new on admin bar', 'beecolor' ),
		'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'beecolor' ),
		'add_new_item'          =>  esc_html__( 'Thêm mới', 'beecolor' ),
		'edit_item'             =>  esc_html__( 'Sửa', 'beecolor' ),
		'new_item'              =>  esc_html__( 'Dự án mới', 'beecolor' ),
		'view_item'             =>  esc_html__( 'Xem dự án', 'beecolor' ),
		'all_items'             =>  esc_html__( 'Danh sách dự án', 'beecolor' ),
		'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'beecolor' ),
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
		'menu_icon'          => 'dashicons-portfolio',
		'rewrite'            => array('slug' => 'du-an' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type('project', $args );
	/* End post type */

	/* Start taxonomy */
	$taxonomy_labels = array(
		'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'beecolor' ),
		'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'beecolor' ),
		'search_items'      => __( 'Tìm kiếm danh mục', 'beecolor' ),
		'all_items'         => __( 'Tất cả danh mục', 'beecolor' ),
		'parent_item'       => __( 'Danh mục cha', 'beecolor' ),
		'parent_item_colon' => __( 'Danh mục cha:', 'beecolor' ),
		'edit_item'         => __( 'Sửa danh mục', 'beecolor' ),
		'update_item'       => __( 'Cập nhật danh mục', 'beecolor' ),
		'add_new_item'      => __( 'Thêm mới danh mục', 'beecolor' ),
		'new_item_name'     => __( 'Tên danh mục mới', 'beecolor' ),
		'menu_name'         => __( 'Danh mục', 'beecolor' ),
	);

	$taxonomy_args = array(
		'labels'            => $taxonomy_labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
	);

	register_taxonomy( 'project_cat', array( 'project' ), $taxonomy_args );
	/* End taxonomy */

}