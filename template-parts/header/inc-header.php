<?php
global $beecolor_options;

$beecolor_nav_top_sticky   =   $beecolor_options['beecolor_nav_top_sticky'];
?>
<header id="home" class="site-header<?php echo esc_attr( $beecolor_nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <nav id="site-navigation" class="main-navigation">
        <div class="site-navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="site-navigation_warp d-flex">
                    <?php
                    get_template_part( 'template-parts/header/inc', 'logo' );
                    get_template_part( 'template-parts/header/inc', 'nav' );
                    get_template_part( 'template-parts/header/inc', 'info' );
                    ?>
                </div>
            </div>
        </div>
    </nav>

</header>