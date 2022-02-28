<?php
if ( isset( $args ) ) :
    $query_all = $args['query_all'];
?>

    <div class="contract-list mb-5">
        <h5 class="title-list-product">
            <?php esc_html_e('Danh sách mã hợp đồng', 'beecolor'); ?>
        </h5>

        <div class="table-contract">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><?php esc_html_e('STT', 'beecolor'); ?></th>
                    <th><?php esc_html_e('Mã hợp đồng', 'beecolor'); ?></th>
                    <th><?php esc_html_e('Tên sản phẩm', 'beecolor'); ?></th>
                    <th><?php esc_html_e('Mã màu', 'beecolor'); ?></th>
                    <th><?php esc_html_e('Số lượng', 'beecolor'); ?></th>
                    <th><?php esc_html_e('Ngày kí hợp đồng', 'beecolor'); ?></th>
                    <th><?php esc_html_e('Thời gian bảo hành', 'beecolor'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php
                $stt = 1;
                while ( $query_all->have_posts() ) :
                    $query_all->the_post();

                    $row_span = 1;
                    $loop_list_product = 1;
                    $list_product = get_post_meta( get_the_ID(), 'beecolor_warranty_product_repeat_group', true );

                    if ( !empty( $list_product ) ) {
                        $row_span = count( $list_product );
                    }

                    foreach ( $list_product as $item ) :
                        ?>

                        <tr>
                            <?php if ( $loop_list_product == 1 ) : ?>
                                <td rowspan="<?php echo esc_attr( $row_span ); ?>">
                                    <?php echo esc_html($stt); ?>
                                </td>

                                <td rowspan="<?php echo esc_attr( $row_span ); ?>">
                                    <?php the_title(); ?>
                                </td>

                            <?php endif; ?>

                            <td>
                                <?php echo esc_html( $item['beecolor_warranty_product_name'] ); ?>
                            </td>

                            <td>
                                <?php echo esc_html( $item['beecolor_warranty_product_color'] ); ?>
                            </td>

                            <td>
                                <?php echo esc_html( $item['beecolor_warranty_product_amount'] ); ?>
                            </td>

                            <td>
                                <?php echo esc_html( $item['beecolor_warranty_product_start_date'] ); ?>
                            </td>

                            <td>
                                <?php
                                echo esc_html( $item['beecolor_warranty_product_start_date'] );
                                echo '&nbsp;';
                                esc_html_e( 'đến', 'beecolor' );
                                echo '&nbsp;';
                                echo esc_html( $item['beecolor_warranty_product_end_date'] );
                                ?>
                            </td>
                        </tr>

                        <?php
                        $loop_list_product++;
                    endforeach;
                    $stt++;
                endwhile;
                wp_reset_postdata();
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php endif; ?>