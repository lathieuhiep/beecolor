<?php
$obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );
?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <h3 class="title">
            <?php esc_html_e('Kiểm tra bảo hành', 'beecolor'); ?>
        </h3>

        <div class="form-warranty">
            <form method="get" class="search-form" action="<?php echo esc_url( $current_url ); ?>">
                <label for="search-warranty">
                    <?php esc_html_e('Nhập số điện thoại hoặc mã đơn hàng', 'beecolor'); ?>
                </label>

                <input type="search" id="search-warranty" class="form-control" value="" name="phone-code" />

                <div class="action-box text-center">
                    <button type="submit" class="search-submit">
                        <?php esc_html_e('Kiểm tra bảo hành', 'beecolor'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-6 col-lg-7 offset-md-1">
        <?php get_template_part( 'template-parts/warranty/conditions', '' ); ?>
    </div>
</div>

