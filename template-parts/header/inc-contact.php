<?php
global $beecolor_options;
$phone = $beecolor_options['beecolor_information_phone'];

if ( empty( $phone ) ) :
    return false;
endif;
?>
<div class="header-phone d-none d-lg-block">
    <a href="tel:<?php echo esc_attr( $phone ) ?>">
        <i class="fas fa-phone-alt"></i>
        <?php echo esc_html( $phone ); ?>
    </a>
</div>
