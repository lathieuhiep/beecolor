<?php
global $beecolor_options;

$beecolor_logo_image_id    =   $beecolor_options['beecolor_logo_image']['id'];
?>
<div class="site-logo d-flex align-items-center">
    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
        <?php
        if ( !empty( $beecolor_logo_image_id ) ) :
            echo wp_get_attachment_image( $beecolor_logo_image_id, 'full' );
        else :
            echo'<img class="logo-default" src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
        endif;
        ?>
    </a>

    <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
</div>