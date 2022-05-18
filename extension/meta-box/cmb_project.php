<?php
add_action( 'cmb2_admin_init', 'beecolor_cmb_project' );

function beecolor_cmb_project() {
    $cmb = new_cmb2_box( array(
        'id'            => 'beecolor_cmb_project',
        'title'         => esc_html__( 'Options', 'beecolor' ),
        'object_types'  => array( 'project', ),
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true,
    ) );

    $cmb->add_field( array(
        'name' => 'Gallery',
        'id'   => 'beecolor_cmb_project_gallery',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Replacement',
            'remove_image_text' => 'Replacement',
            'file_text' => 'Replacement',
            'file_download_text' => 'Replacement',
            'remove_text' => 'Replacement',
        ),
    ) );
}