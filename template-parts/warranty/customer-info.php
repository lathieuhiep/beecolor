<div class="customer-info-box mb-5">
    <div class="customer-info-box__left">
        <div class="item">
            <p class="label">
                <?php esc_html_e('Tên khách hàng', 'beecolor'); ?>
            </p>

            <p class="text">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_name', true ) ); ?>
            </p>
        </div>

        <div class="item">
            <p class="label">
                <?php esc_html_e('Số điện thoại', 'beecolor'); ?>
            </p>

            <p class="text">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_phone', true ) ); ?>
            </p>
        </div>

        <div class="item">
            <p class="label">
                <?php esc_html_e('Địa chỉ', 'beecolor'); ?>
            </p>

            <p class="text">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_address', true ) ); ?>
            </p>
        </div>

        <div class="item">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <p class="label">
                        <?php esc_html_e('CMND/CCCD', 'beecolor'); ?>
                    </p>

                    <p class="text">
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_id_no', true ) ); ?>
                    </p>
                </div>

                <div class="col">
                    <p class="label">
                        <?php esc_html_e('Ngày cấp', 'beecolor'); ?>
                    </p>

                    <p class="text">
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_issued_on', true ) ); ?>
                    </p>
                </div>

                <div class="col">
                    <p class="label">
                        <?php esc_html_e('Nơi cấp', 'beecolor'); ?>
                    </p>

                    <p class="text">
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_issued_by', true ) ); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="item">
            <p class="label">
                <?php esc_html_e('Địa điểm công trình', 'beecolor'); ?>
            </p>

            <p class="text">
                <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_project_address', true ) ); ?>
            </p>
        </div>
    </div>

    <div class="customer-info-box__right">
        <div class="unit-box">
            <h4 class="title-unit">
                <?php esc_html_e('Đơn vị phụ trách thi công', 'beecolor'); ?>
            </h4>

            <div class="info">
                <div class="info__item">
                    <strong>
                        <?php esc_html_e('Tên đơn vị', 'beecolor'); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_construction_name', true ) ); ?>
                    </span>
                </div>

                <div class="info__item">
                    <strong>
                        <?php esc_html_e('Số điện thoại', 'beecolor'); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_construction_phone', true ) ); ?>
                    </span>
                </div>

                <div class="info__item">
                    <strong>
                        <?php esc_html_e('Ghi chú', 'beecolor'); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_construction_note', true ) ); ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="unit-box">
            <h4 class="title-unit">
                <?php esc_html_e('Đơn vị giám sát', 'beecolor'); ?>
            </h4>

            <div class="info">
                <div class="info__item">
                    <strong>
                        <?php esc_html_e('Tên đơn vị', 'beecolor'); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_monitoring_name', true ) ); ?>
                    </span>
                </div>

                <div class="info__item">
                    <strong>
                        <?php esc_html_e('Số điện thoại', 'beecolor'); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_monitoring_phone', true ) ); ?>
                    </span>
                </div>

                <div class="info__item">
                    <strong>
                        <?php esc_html_e('Ghi chú', 'beecolor'); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'beecolor_warranty_monitoring_note', true ) ); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>