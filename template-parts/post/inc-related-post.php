<?php
global $beecolor_options;

$beecolor_related_post_limit  =   $beecolor_options ['beecolor_related_post_limit'];
$beecolor_term_cat_post       =   get_the_terms( get_the_ID(), 'category' );

if ( !empty( $beecolor_term_cat_post ) ):

    $beecolor_term_cat_post_ids = array();

    foreach( $beecolor_term_cat_post as $item_cat_post_id ) $beecolor_term_cat_post_ids[] = $item_cat_post_id->term_id;

    $beecolor_post_related_arg = array(
        'post_type'         =>  'post',
        'cat'               =>  $beecolor_term_cat_post_ids,
        'post__not_in'      =>  array( get_the_ID() ),
        'posts_per_page'    =>  $beecolor_related_post_limit,
    );

    $beecolor_post_related_query = new WP_Query( $beecolor_post_related_arg );

    if ( $beecolor_post_related_query->have_posts() ) :
?>

    <div class="site-single-post-related">
        <div class="related-top d-flex align-items-center">
            <h3 class="title flex-grow-0">
		        <?php esc_html_e( 'Liên quan', 'beecolor' ); ?>
            </h3>
            <span class="line flex-grow-1"></span>
        </div>

        <div class="row">
            <?php
            while ( $beecolor_post_related_query->have_posts() ) :
                $beecolor_post_related_query->the_post();
            ?>

                <div class="col-12 col-sm-6 col-md-4 item">
                    <div class="related-post-item">
                        <figure class="post-image">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </figure>

                        <h4 class="title-post">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>

	                    <?php beecolor_post_meta(); ?>
                    </div>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

<?php
    endif;
endif;