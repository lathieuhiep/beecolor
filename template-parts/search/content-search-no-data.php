<div class="site-serach-no-data">
    <h3>
        <?php  esc_html_e('Không có dữ liệu', 'beecolor');?>
    </h3>

    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p>
                <?php printf(  esc_html__( 'Bạn đã sẵn sàng để đăng bài viết đầu tiên của bạn? <a href="%1$s">Hãy kích vào đây</a>.', 'beecolor' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
            </p>

        <?php elseif ( is_search() ) : ?>

            <p>
                <?php esc_html_e( 'Rất tiếc, chúng tôi không tìm thấy kết quả phù hợp', 'beecolor' ); ?>
            </p>

            <?php get_search_form(); ?>

        <?php else : ?>

            <p>
                <?php esc_html_e( 'Có vẻ như chúng tôi không thể tìm thấy những gì bạn đang tìm kiếm', 'beecolor' ); ?>
            </p>

        <?php endif; ?>
    </div>
</div>