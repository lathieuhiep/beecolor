<?php
/*
Template Name: Kiểm tra bảo hành
*/

get_header();

$phone_code = $_GET['phone-code'];

?>

<div class="site-warranty">
    <div class="container">
        <?php
        if ( empty( $phone_code ) ) :
            get_template_part( 'template-parts/warranty/search', 'form' );
        else:
            get_template_part( 'template-parts/warranty/search', 'result', array(
                'phone_code' => $phone_code
            ) );
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
