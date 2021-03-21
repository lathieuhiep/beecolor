<?php

$beecolor_video_post = get_post_meta(  get_the_ID() , 'beecolor_video_post', true );

if ( !empty( $beecolor_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $beecolor_video_post ); ?>
    </div>

<?php endif;?>