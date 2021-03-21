<?php

    $beecolor_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $beecolor_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $beecolor_audio ) ) : ?>

                <?php echo wp_oembed_get( $beecolor_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $beecolor_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>