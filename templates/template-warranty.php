<?php
/*
Template Name: Kiểm tra bảo hành
*/

get_header();

global $beecolor_options;

$desc = $beecolor_options['beecolor_opt_warranty_desc'];
?>

<div class="site-warranty">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <h3 class="title">
                    <?php esc_html_e('Kiểm tra bảo hành', 'beecolor'); ?>
                </h3>

                <div class="form-warranty">
                    <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label for="search-warranty">
                            <?php esc_html_e('Nhập số điện thoại hoặc mã đơn hàng', 'beecolor'); ?>
                        </label>

                        <input type="search" id="search-warranty" class="form-control" value="" name="s" />
                        <input type="hidden" name="post_type" value="warranty">

                        <div class="action-box text-center">
                            <button type="submit" class="search-submit">
                                <?php esc_html_e('Kiểm tra bảo hành', 'beecolor'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-7 offset-md-1">
                <h3 class="title">
                    <?php esc_html_e('Điều kiện bảo hành', 'beecolor'); ?>
                </h3>

                <div class="site-warranty__conditions">
                    <?php echo wp_kses_post($desc); ?>
                </div>

                <a href="#" class="more-info-warranty">
                    <?php esc_html_e('More Info +', 'beecolor'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
