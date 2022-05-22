<?php
global $beecolor_options;

$beecolor_nav_top_sticky = $beecolor_options['beecolor_nav_top_sticky'];
$is_page_template = is_page_template('templates/landing.php');

$class_header = '';
if ( $is_page_template ):
    $class_header = ' header-landing';
endif;

?>

<header id="home" class="site-header<?php echo esc_attr( $class_header ); echo esc_attr( $beecolor_nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <nav id="site-navigation" class="main-navigation">
        <div class="site-navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="site-navigation_warp d-flex justify-content-between">
                    <?php
                    get_template_part( 'template-parts/header/inc', 'logo' );
                    get_template_part( 'template-parts/header/inc', 'nav' );

                    if ( $is_page_template ) :
                        get_template_part( 'template-parts/header/inc', 'contact' );
                    else:
                        get_template_part( 'template-parts/header/inc', 'info' );
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </nav>

</header>