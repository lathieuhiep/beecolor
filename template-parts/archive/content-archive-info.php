<div class="site-post-content">
    <?php beecolor_post_formats(); ?>

    <h2 class="site-post-title">
        <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
			<?php if ( is_sticky() && is_home() ) : ?>
                <i class="fa fa-thumb-tack" aria-hidden="true"></i>
			<?php
			endif;

			the_title();
			?>
        </a>
    </h2>

    <?php beecolor_post_meta(); ?>
</div>