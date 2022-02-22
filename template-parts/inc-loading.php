<?php

global $beecolor_options;

$beecolor_show_loading = $beecolor_options['beecolor_general_show_loading'] == '' ? '0' : $beecolor_options['beecolor_general_show_loading'];

if(  $beecolor_show_loading == 1 ) :

    $beecolor_loading_url  = $beecolor_options['beecolor_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $beecolor_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $beecolor_loading_url ); ?>" alt="<?php esc_attr_e('loading...','beecolor') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','beecolor') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>