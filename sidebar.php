
<?php if( is_active_sidebar( 'beecolor-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( beecolor_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'beecolor-sidebar-main' ); ?>
    </aside>

<?php endif; ?>