<div class="search-result-warranty">
    <div class="search-result-warranty__content">
        <h3 class="title">
            <?php esc_html_e('Thông tin bảo hành', 'beecolor'); ?>
        </h3>

        <?php
        if ( isset( $args ) && !empty( $args ) ) :
            $key_search = $args['phone_code'];

            $q1 = get_posts(array(
                'fields' => 'ids',
                'post_type' => 'warranty',
                's' => $key_search,
                'exact' => true,
            ));

            $q2 = [];

            if ( is_numeric( $key_search ) && strlen($key_search) == 10 ) {
                $q2 = get_posts(array(
                    'fields' => 'ids',
                    'post_type' => 'warranty',
                    'meta_query' => array(
                        array(
                            'key'     => 'beecolor_warranty_phone',
                            'value'   => $key_search,
                            'compare' => 'LIKE',
                        )
                    )
                ));
            }

            $unique = array_unique( array_merge( $q1, $q2 ) );

            if ( !empty( $unique ) ) {

                // customer
                $args_first = array(
                    'post_type' => 'warranty',
                    'post__in' => array($unique[0]),
                );
                $query_first = new WP_Query( $args_first );

                if ( $query_first->have_posts() ) :
                    while ( $query_first->have_posts() ) : $query_first->the_post();

                        get_template_part( 'template-parts/warranty/customer', 'info' );

                    endwhile;
                    wp_reset_postdata();
                endif;

                // contract list
                $args_all = array(
                    'post_type' => 'warranty',
                    'post__in' => $unique,
                );

                $query_all = new WP_Query( $args_all );

                if ( $query_all->have_posts() ) :
                    get_template_part( 'template-parts/warranty/contract', 'list', array(
                        'query_all' => $query_all
                    ) );
                endif;

                // video or images
                get_template_part( 'template-parts/warranty/video', 'image', array(
                    'query_all' => $query_all
                ) );

                get_template_part('template-parts/warranty/conditions', '');

            }

        else
        ?>

            <p>
                <?php esc_html_e('Không có thông tin bảo hành', 'beecolor'); ?>
            </p>

        <?php endif; ?>
    </div>
</div>
<?php

