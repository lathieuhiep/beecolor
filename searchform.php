<?php $beecolor_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo $beecolor_unique_id; ?>">
        <span class="screen-reader-text"><?php echo _x( 'Tìm kiếm:', 'label', 'beecolor' ); ?></span>
    </label>
    <input type="search" id="<?php echo $beecolor_unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Tìm kiếm &hellip;', 'placeholder', 'beecolor' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit">
        <span class="search-reader-text">
            <?php echo _x( 'Tìm kiếm', 'submit button', 'beecolor' ); ?>
        </span>
    </button>
</form>