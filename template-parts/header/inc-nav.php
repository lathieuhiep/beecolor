<?php
$is_page_template = is_page_template('templates/landing.php');

if ( $is_page_template ) :
    $location = 'landing';
else :
    $location = 'primary';
endif;
?>

<div id="site-menu" class="site-menu collapse navbar-collapse">
    <?php
    if ( has_nav_menu($location) ) :
        wp_nav_menu( array(
            'theme_location' => $location,
            'menu_class'     => 'navbar-nav',
            'container'      => false,
        ) ) ;
    else:
    ?>
        <ul class="main-menu">
            <li>
                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                    <?php esc_html_e( 'ADD TO MENU','beecolor' ); ?>
                </a>
            </li>
        </ul>
    <?php endif; ?>
</div>