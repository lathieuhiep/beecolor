<?php

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_banner extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'beecolor-banner';
    }

    public function get_title() {
        return esc_html__( 'Banner', 'beecolor' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__( 'Image', 'beecolor' ),
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
                'selectors' => [
                    '{{WRAPPER}} .element-banner .image-left' => 'background-image: url({{URL}})',
                ],
            ]
        );

        $this->end_controls_section();

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
                'default'       =>  esc_html__( 'SƠN ĐÁ B-Color', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'beecolor'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows' => 10,
                'default' => esc_html__('GIẢI PHÁP MỚI CHO NHỮNG CÔNG TRÌNH THẾ KỶ', 'beecolor'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'beecolor' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'beecolor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'beecolor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Title #1', 'beecolor' ),
                    ],
                    [
                        'list_title' => __( 'Title #2', 'beecolor' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_popup_form',
            [
                'label' => esc_html__( 'Popup form', 'beecolor' ),
            ]
        );

        $this->add_control(
            'title_popup',
            [
                'label'         =>  esc_html__( 'Title Popup', 'beecolor' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Đăng kí', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'contact_form_list',
            [
                'label' => esc_html__('Select Form', 'land'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => beecolor_get_form_cf7(),
                'default' => '0',
            ]
        );

        $this->add_control(
            'text_btn',
            [
                'label'         =>  esc_html__( 'Text button', 'beecolor' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Tìm hiểu thêm', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_modal = 'banner-modal-form';

        if ( $settings['contact_form_list'] ) :
            $id_int = substr( $this->get_id_int(), 0, 3 );
            $id_modal = $id_modal . '-' . $id_int;
        endif;
    ?>

        <div class="element-banner">
            <div class="row row-cols-1 row-cols-sm-2 align-items-center align-items-lg-start">
                <div class="col">
                    <div class="image-left"></div>
                </div>

                <div class="col">
                    <div class="box-right">
                        <span class="line-top"></span>

                        <div class="content">
                            <h2 class="title">
                                <?php echo esc_html( $settings['title'] ) ?>
                            </h2>

                            <div class="desc">
                                <?php echo wpautop( $settings['description'] ) ?>
                            </div>

                            <?php if ( $settings['list'] ) : ?>

                            <div class="list">
                                <?php foreach ( $settings['list'] as $item ): ?>
                                <div class="item">
                                    <?php echo esc_html( $item['list_title'] ); ?>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <?php
                            endif;

                            if ( $settings['contact_form_list'] ) :
                            ?>
                                <button type="button" class="btn btn-modal-popup" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr( $id_modal ); ?>">
                                    <?php echo esc_html( $settings['text_btn'] ); ?>
                                </button>
                            <?php endif; ?>
                        </div>

                        <span class="line-bottom"></span>
                    </div>
                </div>
            </div>

            <?php if ( $settings['contact_form_list'] ) : ?>
                <div id="<?php echo esc_attr( $id_modal ); ?>" class="modal fade modal-banner-popup custom-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    <?php echo esc_html( $settings['title_popup'] ); ?>
                                </h4>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_list'] . '" ]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php

    }

}