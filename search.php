<?php
get_header();

$post_type = $_GET['post_type'];
var_dump($post_type);
if ( isset( $post_type ) && $post_type == 'warranty' ) {

    get_template_part( 'template-parts/warranty/search', 'warranty' );
} else {
    get_template_part( 'template-parts/search/content', 'search' );
}

get_footer();