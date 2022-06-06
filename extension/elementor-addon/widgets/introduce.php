<?php

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_introduce extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'beecolor-introduce';
    }

    public function get_title() {
        return esc_html__( 'Introduce', 'beecolor' );
    }

    public function get_icon() {
        return 'eicon-text';
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
            'description',
            [
                'label'         =>  '',
                'type'          =>  Controls_Manager::WYSIWYG,
                'default'       =>  esc_html__( 'Default description', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'image',
            [
                'label'     =>  esc_html__( 'Image', 'beecolor' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // section modal
        $this->start_controls_section(
            'section_modal',
            [
                'label' => esc_html__( 'Modal', 'beecolor' ),
            ]
        );

        $this->add_control(
            'text_btn',
            [
                'label' => esc_html__( 'Text Button', 'beecolor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Xem thêm chi tiết', 'beecolor' ),
                'placeholder' => esc_html__( 'Type your title here', 'beecolor' ),
            ]
        );

        $this->add_control(
            'title_modal',
            [
                'label'         =>  esc_html__( 'Title', 'beecolor' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Giới thiệu', 'beecolor' ),
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
        $id_modal = 'modal-introduce';
        if ( $modal_desc ) :
            $id_int = substr( $this->get_id_int(), 0, 3 );
            $id_modal = $id_modal . '-' . $id_int;
        endif;
    ?>

        <div class="element-introduce">
            <div class="element-introduce__left">
                <div class="description">
                    <?php echo wp_kses_post( $settings['description'] ); ?>
                </div>

                <!-- Button trigger modal -->
                <?php if ( $modal_desc ) : ?>
                    <div class="action-box">
                        <button type="button" class="btn btn-primary btn-view-more" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr( $id_modal ); ?>">
                            <?php echo esc_html( $settings['text_btn'] ); ?>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="element-introduce__right">
                <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
            </div>

            <?php if ( $modal_desc ) : ?>
                <!-- Modal -->
                <div class="modal fade custom-modal" id="<?php echo esc_attr( $id_modal ); ?>" data-bs-keyboard="false" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">
                                    <?php echo esc_html( $settings['title_modal'] ); ?>
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

    <?php

    }

}