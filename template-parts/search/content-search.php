<?php
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'post_type' => array( 'post', 'product' ),
    's' => 'keyword',
	'paged' => $paged,
	'posts_per_page' => 10,
);
$query = new WP_Query( $args );
?>

<div class="site-container site-search-result">
    <div class="container">
        <header class="page-header mt-3 mb-3">
            <h1 class="page-title">
			    <?php
			    printf(
			    /* translators: %s: Search term. */
				    esc_html__( 'Kết quả cho "%s"', 'beecolor' ),
				    '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			    );
			    ?>
            </h1>
        </header><!-- .page-header -->

        <div class="site-search-result__content">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
            ?>
                <div id="post-<?php the_ID(); ?>" class="item">
                    <h2 class="site-post-title">
                        <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();

            else:
                get_template_part( 'template-parts/search/content', 'search-no-data' );
            endif; // end if ( have_posts )
            ?>
        </div>

        <?php beecolor_pagination(); ?>
    </div>
</div>








