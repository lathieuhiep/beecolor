<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *constants
 */
if( !function_exists('beecolor_setup') ):

    function beecolor_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'beecolor', get_parent_theme_file_path( '/languages' ) );

        /**
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        add_theme_support( 'custom-header' );

        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => esc_html__('Primary Menu', 'beecolor'),
            'landing' => esc_html__('Landing Page Menu', 'beecolor'),
            'footer-menu' => esc_html__('Footer Menu', 'beecolor')
        ) );

        // add theme support title-tag
        add_theme_support( 'title-tag' );

    }

    add_action( 'after_setup_theme', 'beecolor_setup' );

endif;

// Required: post type
require get_parent_theme_file_path( '/extension/post-type/warranty.php' );

/**
 * Required: Plugin Activation
 */
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

/**
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

// Required: CMB2
if ( !class_exists('CMB2') ) {
    require get_parent_theme_file_path( '/extension/meta-box/cmb_add_field_type.php' );
    require get_parent_theme_file_path( '/extension/meta-box/cmb_product.php' );
    require get_parent_theme_file_path( '/extension/meta-box/cmb_warranty.php' );
}

// Required: Elementor
if ( did_action( 'elementor/loaded' ) ) :
    require get_parent_theme_file_path( '/extension/elementor-addon/elementor-addon.php' );
endif;

/* Require Widgets */
foreach(glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $beecolor_file_widgets ) {
    require $beecolor_file_widgets;
}

if ( class_exists('Woocommerce') ) :
	/*
	 * Required: Woocommerce
	 */
	require get_parent_theme_file_path( '/extension/woocommerce/woo-template-hooks.php' );
	require get_parent_theme_file_path( '/extension/woocommerce/woo-template-functions.php' );

endif;

/**
 * Required: Register Sidebar
 */
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

/**
 * Required: Theme Scripts
 */
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

/* post formats */
function beecolor_post_formats() {

	if( has_post_format('audio') || has_post_format('video') ):
		get_template_part( 'template-parts/post/content','video' );
    elseif ( has_post_format('gallery') ):
		get_template_part( 'template-parts/post/content','gallery' );
	else:
		get_template_part( 'template-parts/post/content','image' );
	endif;

}

/**
 * Show full editor
 */
if ( !function_exists('beecolor_ilc_mce_buttons') ) :

    function beecolor_ilc_mce_buttons( $beecolor_buttons_TinyMCE ) {

        array_push( $beecolor_buttons_TinyMCE,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );

        return $beecolor_buttons_TinyMCE;

    }

    add_filter("mce_buttons_2", "beecolor_ilc_mce_buttons");

endif;

// Start Customize mce editor font sizes
if ( ! function_exists( 'beecolor_mce_text_sizes' ) ) :

    function beecolor_mce_text_sizes( $beecolor_font_size_text ){
        $beecolor_font_size_text['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $beecolor_font_size_text;
    }

    add_filter( 'tiny_mce_before_init', 'beecolor_mce_text_sizes' );

endif;
// End Customize mce editor font sizes

/* callback comment list */
function beecolor_comments( $beecolor_comment, $beecolor_comment_args, $beecolor_comment_depth ) {

    if ( 'div' === $beecolor_comment_args['style'] ) :

        $beecolor_comment_tag       = 'div';
        $beecolor_comment_add_below = 'comment';

    else :

        $beecolor_comment_tag       = 'li';
        $beecolor_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $beecolor_comment_tag ?> <?php comment_class( empty( $beecolor_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $beecolor_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $beecolor_comment_args['avatar_size'] != 0 ) echo get_avatar( $beecolor_comment, $beecolor_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $beecolor_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'beecolor' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'beecolor' ) ); ?>

            <?php comment_reply_link( array_merge( $beecolor_comment_args, array( 'add_below' => $beecolor_comment_add_below, 'depth' => $beecolor_comment_depth, 'max_depth' => $beecolor_comment_args['max_depth'] ) ) ); ?>

        </div>

        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $beecolor_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

/*
 * Content Nav
 */

if ( ! function_exists( 'beecolor_comment_nav' ) ) :

    function beecolor_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php esc_html_e( 'Comment navigation', 'beecolor' ); ?>
                </h2>

                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'beecolor' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'beecolor' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/* Start Social Network */
function beecolor_get_social_url() {

    global $beecolor_options;
    $beecolor_social_networks = beecolor_get_social_network();

    foreach( $beecolor_social_networks as $beecolor_social ) :
        $beecolor_social_url = $beecolor_options['beecolor_social_network_' . $beecolor_social['id']];

        if( $beecolor_social_url ) :
?>

        <div class="social-network-item item-<?php echo esc_attr( $beecolor_social['id'] ); ?>">
            <a href="<?php echo esc_url( $beecolor_social_url ); ?>" target="_blank">
                <i class="<?php echo esc_attr( $beecolor_social['icon'] ); ?>" aria-hidden="true"></i>
            </a>
        </div>


<?php
        endif;

    endforeach;
}

function beecolor_get_social_network() {
    return array(

        array( 'id' =>  'facebook', 'icon'  =>  'fab fa-facebook-square'),
        array( 'id' =>  'google', 'icon'   =>  'fab fa-google-plus-square'),
        array( 'id' =>  'youtube', 'icon'   =>  'fab fa-youtube-square'),
    );
}
/* End Social Network */

/* Start pagination */
function beecolor_pagination() {

    the_posts_pagination( array(
        'type'                  =>  'list',
        'mid_size'              =>  2,
        'prev_text'             =>  esc_html__( 'Previous', 'beecolor' ),
        'next_text'             =>  esc_html__( 'Next', 'beecolor' ),
        'screen_reader_text'    =>  '&nbsp;',
    ) );

}

// pagination nav query
function beecolor_paging_nav_query( $beecolor_querry ) {

    $beecolor_pagination_args  =   array(

        'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__(' Previous', 'beecolor' ),
        'next_text' => esc_html__('Next', 'beecolor' ) . '<i class="fa fa-angle-double-right"></i>',
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $beecolor_querry -> max_num_pages,
        'type'      => 'list',

    );

    $beecolor_paginate_links = paginate_links( $beecolor_pagination_args );

    if ( $beecolor_paginate_links ) :

    ?>
        <nav class="pagination">
            <?php echo $beecolor_paginate_links; ?>
        </nav>

    <?php

    endif;

}
/* End pagination */

// Sanitize Pagination
add_action('navigation_markup_template', 'beecolor_sanitize_pagination');
function beecolor_sanitize_pagination( $beecolor_content ) {
    // Remove role attribute
    $beecolor_content = str_replace('role="navigation"', '', $beecolor_content);

    // Remove h2 tag
    $beecolor_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $beecolor_content);

    return $beecolor_content;
}

/* Start Get col global */
function beecolor_col_use_sidebar( $option_sidebar, $active_sidebar ) {

    if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

        if ( $option_sidebar == 'left' ) :
            $class_position_sidebar = ' order-1 order-md-2';
        else:
            $class_position_sidebar = ' order-1';
        endif;

        $class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
    else:
        $class_col_content = 'col-md-12';
    endif;

    return $class_col_content;
}

function beecolor_col_sidebar() {
    $class_col_sidebar = 'col-12 col-md-4 col-lg-3';

    return $class_col_sidebar;
}
/* End Get col global */

/* Start Post Meta */
function beecolor_post_meta() {
?>

    <div class="site-post-meta">
        <i class="fas fa-calendar-alt"></i>
        <span><?php echo get_the_date(); ?></span>
    </div>

<?php
}
/* End Post Meta */

/* Start Link Pages */
function beecolor_link_page() {

    wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'beecolor' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );

}
/* End Link Pages */

/* Start comment */
function beecolor_comment_form() {

    if ( comments_open() || get_comments_number() ) :
?>

        <div class="site-comments">
            <?php comments_template( '', true ); ?>
        </div>

<?php
    endif;
}
/* End comment */

/* Start get Category check box */
function beecolor_check_get_cat( $type_taxonomy ) {

    $cat_check    =   array();
    $category     =   get_terms(
        array(
            'taxonomy'      =>  $type_taxonomy,
            'hide_empty'    =>  false
        )
    );

    if ( isset( $category ) && !empty( $category ) ):

        foreach( $category as $item ) {

            $cat_check[$item->term_id]  =   $item->name;

        }

    endif;

    return $cat_check;

}
/* End get Category check box */

/**
*Start share
*/
function beecolor_post_share() {

?>
    <div class="site-post-share">
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button_count" data-share="true" data-action="like" data-size="small"></div>
    </div>
<?php

}

/* Start opengraph */
function beecolor_doctype_opengraph( $output ) {
	return $output . '
 xmlns:og="http://opengraphprotocol.org/schema/"
 xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'beecolor_doctype_opengraph');

function beecolor_opengraph() {
	global $post;

	if( is_single() ) :

		if( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(),'full' );
		else :
			$img_src = get_theme_file_uri( '/assets/images/no-image.png' );
		endif;

		if( $excerpt = $post->post_excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

?>
        <meta property="og:title" content="<?php the_title(); ?>"/>
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo() ); ?>"/>
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>"/>

<?php

	else :
		return;
	endif;
}
add_action( 'wp_head', 'beecolor_opengraph', 5 );
/* End opengraph */

/* Start Facebook SDK */
function beecolor_facebook_sdk() {
	global $beecolor_options;

	$beecolor_footer_script = $beecolor_options['beecolor_footer_script'];

	if (  !empty( $beecolor_footer_script ) ) :
        echo force_balance_tags( $beecolor_footer_script );
    else:
?>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<?php
	endif;
}

add_action( 'wp_footer', 'beecolor_facebook_sdk' );
/* End share */

/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function beecolor_include_custom_post_types_in_search_results( $query ) {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post', 'product' ) );
	}
}
add_action( 'pre_get_posts', 'beecolor_include_custom_post_types_in_search_results' );

// load ajax video / image warranty
add_action( 'wp_ajax_nopriv_beecolor_warranty_load_video_image', 'beecolor_warranty_load_video_image' );
add_action( 'wp_ajax_beecolor_warranty_load_video_image', 'beecolor_warranty_load_video_image' );

function beecolor_warranty_load_video_image() {
    $id = (int) $_POST['id'];

    $args = array(
        'post_type' => 'warranty',
        'post__in' => array($id),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ):
        while ( $query->have_posts() ):
            $query->the_post();

            $video = get_post_meta( get_the_ID(), 'beecolor_warranty_product_video', true );
            $image_gallery = get_post_meta( get_the_ID(), 'beecolor_warranty_product_image', true );
            $note = get_post_meta( get_the_ID(), 'beecolor_product_warranty_note', true );

    ?>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="note-warranty">
                    <?php echo wp_kses_post( $note ); ?>
                </div>
            </div>

            <div class="col">
                <div class="media-box">
                    <?php
                    if ( $video ) :
                        echo wp_oembed_get( $video );
                    else:
                    ?>
                        <ul id="imageGallery">
                            <?php foreach ( $image_gallery as $item ) : ?>
                                <li data-thumb="<?php echo esc_url( $item ) ?>">
                                    <img src="<?php echo esc_url( $item ) ?>" alt="" />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;

    wp_die();
}