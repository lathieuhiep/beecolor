<?php
get_header();

global $beecolor_options;

$beecolor_blog_sidebar_single = !empty( $beecolor_options['beecolor_blog_sidebar_single'] ) ? $beecolor_options['beecolor_blog_sidebar_single'] : 'right';

$beecolor_class_col_content = beecolor_col_use_sidebar( $beecolor_blog_sidebar_single, 'beecolor-sidebar-main' );

?>

<div class="site-container site-single">
    <div class="container">
        <?php get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' ); ?>

        <div class="row">
            <div class="<?php echo esc_attr( $beecolor_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $beecolor_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

