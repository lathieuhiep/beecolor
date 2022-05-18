<?php
/* Start ajax filter cat product */
add_action( 'wp_ajax_nopriv_beecolor_product_popup', 'beecolor_product_popup' );
add_action( 'wp_ajax_beecolor_product_popup', 'beecolor_product_popup' );

function beecolor_product_popup() {
    $product_id = (int) $_POST['product_id'];

    $args = array(
        'post_type' => 'product',
        'post__in' => array($product_id)
    );

    $query = new WP_Query( $args );

    while ( $query->have_posts() ):
        $query->the_post();

        global $product;
        $attachment_ids = $product->get_gallery_image_ids();

        $tab_color = get_post_meta( get_the_ID(), 'beecolor_product_table_color', true );
        $tab_construction_consultant = get_post_meta( get_the_ID(), 'beecolor_product_construction_consultant', true );
    ?>
        <div id="modal-product-popup" class="modal fade modal-product-popup custom-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <?php the_title(); ?>
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#product-description" type="button" aria-selected="true">
                                    <?php esc_html_e('Thông tin sản phẩm', 'beecolor'); ?>
                                </button>

                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#color-board" type="button" aria-selected="false">
                                    <?php esc_html_e('Bảng màu', 'beecolor'); ?>
                                </button>

                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-content" type="button" aria-selected="false">
                                    <?php esc_html_e('Thông số kỹ thuật', 'beecolor'); ?>
                                </button>

                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#advise" type="button" aria-selected="false">
                                    <?php esc_html_e('Tư vấn thi công', 'beecolor'); ?>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active product-description" id="product-description">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div id="product-gallery">
                                            <div data-thumb="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
                                                <img src="<?php echo esc_url( get_the_post_thumbnail_url() ) ?>" alt="" />
                                            </div>

                                            <?php
                                            if ( !empty( $attachment_ids ) ) :
                                                foreach ( $attachment_ids as $attachment_id ) :
                                                    $image_link = wp_get_attachment_url( $attachment_id );
                                            ?>

                                                <div data-thumb="<?php echo esc_url( $image_link ) ?>">
                                                    <img src="<?php echo esc_url( $image_link ) ?>" alt="" />
                                                </div>

                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="content">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="color-board">
                                <?php echo wp_kses_post( $tab_color ); ?>
                            </div>

                            <div class="tab-pane fade" id="product-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="tab-pane fade" id="advise">
                                <?php echo wp_kses_post( $tab_construction_consultant ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();

    wp_die();
}

/* Start ajax view project */
add_action( 'wp_ajax_nopriv_beecolor_project_popup', 'beecolor_project_popup' );
add_action( 'wp_ajax_beecolor_project_popup', 'beecolor_project_popup' );

function beecolor_project_popup() {
    $id = (int) $_POST['id'];

    $args = array(
        'post_type' => 'project',
        'post__in' => array($id)
    );

    $query = new WP_Query( $args );

    while ( $query->have_posts() ):
        $query->the_post();

        $gallery = get_post_meta( get_the_ID(), 'beecolor_cmb_project_gallery', true );
    ?>

        <div id="modal-project-popup" class="modal fade modal-project-popup custom-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <?php the_title(); ?>
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row row-cols-2">
                            <div class="col">
                                <div id="product-gallery">
                                    <div data-thumb="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url() ) ?>" alt="" />
                                    </div>

                                    <?php
                                    if ( !empty( $gallery ) ) :
                                        foreach ( $gallery as $item ) :
                                    ?>

                                        <div data-thumb="<?php echo esc_url( $item ) ?>">
                                            <img src="<?php echo esc_url( $item ) ?>" alt="" />
                                        </div>

                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    endwhile;
    wp_reset_postdata();

    wp_die();
}