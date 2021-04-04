<?php
get_header();

global $beecolor_options;

$beecolor_title = $beecolor_options['beecolor_404_title'];
$beecolor_content = $beecolor_options['beecolor_404_editor'];
$beecolor_background = $beecolor_options['beecolor_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $beecolor_background ) ):
                        echo wp_get_attachment_image( $beecolor_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $beecolor_title != '' ):
                        echo esc_html( $beecolor_title );
                    else:
                        esc_html_e( 'Awww...Đừng buồn', 'beecolor' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $beecolor_content != '' ) :
                        echo wp_kses_post( $beecolor_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'Nó chỉ là một lỗi 404!', 'beecolor' ); ?>
                            <br />
                            <?php esc_html_e( 'Những gì bạn đang tìm kiếm có thể đã không còn tồn tại', 'beecolor' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Quay về trang chủ', 'beecolor'); ?>">
                        <?php esc_html_e('Quay về trang chủ', 'beecolor'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>