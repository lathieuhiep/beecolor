<?php
if ( isset( $args ) ) :
    $query_all = $args['query_all'];
?>

    <div class="video-img-box mb-5">
        <h5 class="title-list-product mb-5">
            <?php esc_html_e('Hình ảnh / Video theo mã hợp đồng', 'beecolor'); ?>
        </h5>

        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col">
                <h5 content="title-select">
                    <?php esc_html_e('Mã hợp đồng', 'beecolor'); ?>
                </h5>

                <div class="select-box">
                    <select class="select-contract-code form-select" aria-label="">
                        <option value="0" selected>
                            <?php esc_html_e('Chọn mã hợp đồng', 'beecolor'); ?>
                        </option>

                        <?php while ( $query_all->have_posts() ) : $query_all->the_post(); ?>

                            <option value="<?php the_ID(); ?>"><?php the_title() ?></option>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </select>

                    <div class="select-box__spinner">
                        <div class="spinner-border text-warning" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="content-data"></div>
            </div>
        </div>
    </div>

<?php endif; ?>