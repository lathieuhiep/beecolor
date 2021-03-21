<?php
global $beecolor_options;

$beecolor_information_show_hide = $beecolor_options['beecolor_information_show_hide'] == '' ? 1 : $beecolor_options['beecolor_information_show_hide'];

if ( $beecolor_information_show_hide == 1 ) :

$beecolor_information_address   =   $beecolor_options['beecolor_information_address'];
$beecolor_information_mail      =   $beecolor_options['beecolor_information_mail'];
$beecolor_information_phone     =   $beecolor_options['beecolor_information_phone'];

?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $beecolor_information_address != '' ) : ?>

                    <span>
                        <i class="fas fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $beecolor_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $beecolor_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fas fa-envelope"></i>
                        <?php echo esc_html( $beecolor_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $beecolor_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fas fa-mobile-alt"></i>
                        <?php echo esc_html( $beecolor_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="information__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php beecolor_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

endif;