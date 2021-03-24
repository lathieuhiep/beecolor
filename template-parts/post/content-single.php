<?php

global $beecolor_options;

$beecolor_on_off_share_single = $beecolor_options['beecolor_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <div class="site-post-content">
        <h1 class="site-post-title">
            <?php the_title(); ?>
        </h1>

       <?php beecolor_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            beecolor_link_page();
            ?>
        </div>
    </div>

    <?php

    if ( $beecolor_on_off_share_single == 1 || $beecolor_on_off_share_single == null ) :

        beecolor_post_share();

    endif;

    ?>
</div>

<?php
get_template_part( 'template-parts/post/inc','related-post' );




