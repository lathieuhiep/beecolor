<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_warranty_check extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'warranty-check';
    }

    public function get_title() {
        return esc_html__( 'Kiểm tra bảo hành', 'beecolor' );
    }

    public function get_icon() {
        return 'eicon-search-results';
    }

    public function get_script_depends()
    {
        return ['beecolor-landing-page'];
    }

    protected function _register_controls() {

        // section content
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'beecolor' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Title', 'beecolor' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Kiểm tra bảo hành', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        // section conditions
        $this->start_controls_section(
            'section_conditions',
            [
                'label' => esc_html__( 'Điều kiện bảo hành', 'beecolor' ),
            ]
        );

        $this->add_control(
            'title_conditions',
            [
                'label'         =>  esc_html__( 'Title', 'beecolor' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Điều kiện bảo hành', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'modal_desc',
            [
                'label'         =>  '',
                'type'          =>  Controls_Manager::WYSIWYG,
                'default'       =>  esc_html__( 'Default description', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $modal_desc = $settings['modal_desc'];

        // id modal
        $id_modal = 'modal-conditions';
        if ( $modal_desc ) :
            $id_int = substr( $this->get_id_int(), 0, 3 );
            $id_modal = $id_modal . '-' . $id_int;
        endif;

        global $beecolor_options;
        $site_key = $beecolor_options['beecolor_opt_google_reCAPTCHA_site_key'];
    ?>

        <div class="element-warranty-check">
            <div class="form-warranty">
                <h3 class="title">
                    <?php echo esc_html( $settings['title'] ); ?>
                </h3>

                <form method="post" class="search-warranty" action="">
                    <label for="search-warranty">
                        <?php esc_html_e('Nhập số điện thoại hoặc mã đơn hàng', 'beecolor'); ?>
                    </label>

                    <input type="search" id="search-warranty" class="form-control phone-code" value="" name="phone-code" />

                    <div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $site_key ); ?>"></div>

                    <div class="action-box text-center">
                        <button type="submit" class="search-submit">
                            <?php esc_html_e('Kiểm tra bảo hành', 'beecolor'); ?>
                        </button>
                    </div>
                </form>
            </div>

            <div class="conditions">
                <h4 class="conditions__title">
                    <?php echo esc_html( $settings['title_conditions'] ); ?>
                </h4>

                <?php if ( $modal_desc ) : ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-view-more" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr( $id_modal ); ?>">
                        <?php esc_html_e('Tìm hiểu thêm', 'beecolor'); ?>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade custom-modal" id="<?php echo esc_attr( $id_modal ); ?>" data-bs-keyboard="false" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel">
                                        <?php esc_html_e('ĐIỀU KIỆN BẢO HÀNH', 'beecolor'); ?>
                                    </h4>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <?php echo wp_kses_post( $settings['modal_desc'] ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php

    }

}