<?php

$beecolor_gallery_post = get_post_meta( get_the_ID(),'beecolor_gallery_post', false );

if( !empty( $beecolor_gallery_post ) ) :

    $beecolor_slider_settings =   [
	    'items'         =>  1,
        'loop'          =>  true,
        'nav'           =>  true,
        'dots'          =>  true,
        'autoHeight'    =>  true
    ];

?>

    <div class="site-post-slides owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $beecolor_slider_settings ); ?>'>

        <?php foreach( $beecolor_gallery_post as $item ) : ?>

            <div class="site-post-slides__item">
                <?php echo wp_get_attachment_image( $item, 'full' ); ?>
            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>