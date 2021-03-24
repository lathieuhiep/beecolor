<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_partners_carousel extends Widget_Base {

    public function get_categories() {
        return array( 'beecolor_widgets' );
    }

    public function get_name() {
        return 'beecolor-partners-carousel';
    }

    public function get_title() {
        return esc_html__( 'Partners Carousel', 'beecolor' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    public function get_script_depends() {
        return ['beecolor-elementor-custom'];
    }

    protected function _register_controls() {

        /* Section Content */
        $this->start_controls_section(
            'section_content',
            [
                'label' =>  esc_html__( 'Partners Carousel', 'beecolor' )
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

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__( 'Choose Image', 'beecolor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_link',
            [
                'label' => esc_html__( 'Link', 'beecolor' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'beecolor' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
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

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' =>  esc_html__( 'Layout Settings', 'beecolor' )
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'beecolor'),
                'label_off'     =>  esc_html__('No', 'beecolor'),
                'label_on'      =>  esc_html__('Yes', 'beecolor'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'beecolor'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'beecolor'),
                'label_on'      =>  esc_html__('Yes', 'beecolor'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'beecolor'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'beecolor'),
                'label_off'     =>  esc_html__('No', 'beecolor'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'beecolor'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'beecolor'),
                'label_off'     =>  esc_html__('No', 'beecolor'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'margin_item',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_1200',
            [
                'label'     =>  esc_html__( 'Min Width 1200px', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item',
            [
                'label'     =>  esc_html__( 'Number of Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  4,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_992',
            [
                'label'     =>  esc_html__( 'Min Width 992px', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_992',
            [
                'label'     =>  esc_html__( 'Number of Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_768',
            [
                'label'     =>  esc_html__( 'Min Width 768px', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_768',
            [
                'label'     =>  esc_html__( 'Number of Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_568',
            [
                'label'     =>  esc_html__( 'Min Width 568px', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_568',
            [
                'label'     =>  esc_html__( 'Number of Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_568',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  15,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'max_width_567',
            [
                'label'     =>  esc_html__( 'Max Width 567px', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_567',
            [
                'label'     =>  esc_html__( 'Number of Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  1,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_567',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  0,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings =   $this->get_settings_for_display();
        $data_settings_owl = [
            'loop'          =>  ( 'yes' === $settings['loop'] ),
            'nav'           =>  ( 'yes' === $settings['nav'] ),
            'dots'          =>  ( 'yes' === $settings['dots'] ),
            'margin'        =>  $settings['margin_item'],
            'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
            'responsive'    => [
                '0' => array(
                    'items'     =>  $settings['item_567'],
                    'margin'    =>  $settings['margin_item_567']
                ),
                '576' => array(
                    'items'     =>  $settings['item_568'],
                    'margin'    =>  $settings['margin_item_568']
                ),
                '768' => array(
                    'items'     =>  $settings['item_768']
                ),
                '992' => array(
                    'items'     =>  $settings['item_992']
                ),
                '1200' => array(
                    'items'     =>  $settings['item']
                ),
            ],
        ];

        ?>
            <div class="element-partners-carousel">
                <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                    <?php
                    foreach ( $settings['list'] as $item ) :
                        $target = $item['list_link']['is_external'] ? ' target=_blank' : '';
                        $nofollow = $item['list_link']['nofollow'] ? ' rel=nofollow' : '';
                    ?>
                    <div class="item">
                        <a class="link-product" href="<?php echo esc_url( $item['list_link']['url'] ); ?>"<?php echo esc_attr( $target . $nofollow ) ?>>
                            <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new beecolor_widget_partners_carousel );