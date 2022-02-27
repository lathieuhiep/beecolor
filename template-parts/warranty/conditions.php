<?php
global $beecolor_options;
$desc = $beecolor_options['beecolor_opt_warranty_desc'];
?>

<div class="conditions-box">
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