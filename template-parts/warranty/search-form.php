<?php
global $beecolor_options;

$site_key = $beecolor_options['beecolor_opt_google_reCAPTCHA_site_key'];
$secret_key = $beecolor_options['beecolor_opt_google_reCAPTCHA_secret_key'];
?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <h3 class="title">
            <?php esc_html_e('Kiểm tra bảo hành', 'beecolor'); ?>
        </h3>

        <?php
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) :
            $phone_code = $_POST['phone-code'];
            $captcha = $_POST['g-recaptcha-response'];

            if ( !$phone_code ) {
        ?>
                <h5 class="title-error">
                    <?php esc_html_e( 'Hãy nhập số điện thoại hoặc mã đơn hàng' , 'beecolor' ); ?>
                </h5>
        <?php
            }

            if( !$captcha ) {
        ?>
            <h5 class="title-error">
                <?php esc_html_e( 'Hãy xác nhận CAPTCHA' , 'beecolor' ); ?>
            </h5>
        <?php
            } else {
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

                if( $response.success == false ) {
            ?>
                    <h5 class="title-error">
                        <?php esc_html_e( 'SPAM!' , 'beecolor' ); ?>
                    </h5>
            <?php
                }
            }
        endif;
        ?>

        <div class="form-warranty">
            <form method="post" class="search-form" action="">
                <label for="search-warranty">
                    <?php esc_html_e('Nhập số điện thoại hoặc mã đơn hàng', 'beecolor'); ?>
                </label>

                <input type="search" id="search-warranty" class="form-control" value="" name="phone-code" />

                <div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $site_key ); ?>"></div>

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

