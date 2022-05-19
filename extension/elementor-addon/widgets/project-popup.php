<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class beecolor_widget_project_popup extends Widget_Base
{

    public function get_categories()
    {
        return array('mytheme');
    }

    public function get_name()
    {
        return 'beecolor-project-popup';
    }

    public function get_title()
    {
        return esc_html__('Project Popup', 'beecolor');
    }

    public function get_icon()
    {
        return 'eicon-slider-push';
    }

    public function get_script_depends()
    {
        return ['beecolor-elementor-custom', 'beecolor-landing-page'];
    }

    protected function _register_controls()
    {
        /* Section Query */
        $this->start_controls_section(
            'section_query',
            [
                'label' => esc_html__('Query', 'beecolor')
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label' => esc_html__('Select Category', 'beecolor'),
                'type' => Controls_Manager::SELECT2,
                'options' => beecolor_check_get_cat('project_cat'),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of Posts', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'beecolor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id' => esc_html__('Post ID', 'beecolor'),
                    'title' => esc_html__('Title', 'beecolor'),
                    'date' => esc_html__('Date', 'beecolor'),
                    'rand' => esc_html__('Random', 'beecolor'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'beecolor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'beecolor'),
                    'DESC' => esc_html__('Descending', 'beecolor'),
                ],
            ]
        );

        $this->end_controls_section();

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' => esc_html__('Layout Settings', 'beecolor')
            ]
        );

        $this->add_control(
            'loop',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Loop Slider ?', 'beecolor'),
                'label_off' => esc_html__('No', 'beecolor'),
                'label_on' => esc_html__('Yes', 'beecolor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay?', 'beecolor'),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'beecolor'),
                'label_on' => esc_html__('Yes', 'beecolor'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav Slider', 'beecolor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'beecolor'),
                'label_off' => esc_html__('No', 'beecolor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label' => esc_html__('Dots Slider', 'beecolor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'beecolor'),
                'label_off' => esc_html__('No', 'beecolor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'margin_item',
            [
                'label' => esc_html__('Space Between Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 30,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'min_width_1200',
            [
                'label' => esc_html__('Min Width 1200px', 'beecolor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item',
            [
                'label' => esc_html__('Number of Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'min_width_992',
            [
                'label' => esc_html__('Min Width 992px', 'beecolor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item_992',
            [
                'label' => esc_html__('Number of Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'min_width_768',
            [
                'label' => esc_html__('Min Width 768px', 'beecolor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item_768',
            [
                'label' => esc_html__('Number of Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'min_width_568',
            [
                'label' => esc_html__('Min Width 568px', 'beecolor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item_568',
            [
                'label' => esc_html__('Number of Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'margin_item_568',
            [
                'label' => esc_html__('Space Between Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 15,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'max_width_567',
            [
                'label' => esc_html__('Max Width 567px', 'beecolor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item_567',
            [
                'label' => esc_html__('Number of Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'margin_item_567',
            [
                'label' => esc_html__('Space Between Item', 'beecolor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 0,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $cate = $settings['select_cat'];
        $limit = $settings['limit'];
        $order_by = $settings['order_by'];
        $order_post = $settings['order'];

        $data_settings_owl = [
            'loop' => ('yes' === $settings['loop']),
            'nav' => ('yes' === $settings['nav']),
            'dots' => ('yes' === $settings['dots']),
            'margin' => $settings['margin_item'],
            'autoplay' => ('yes' === $settings['autoplay']),
            'responsive' => [
                '0' => array(
                    'items' => $settings['item_567'],
                    'margin' => $settings['margin_item_567']
                ),
                '576' => array(
                    'items' => $settings['item_568'],
                    'margin' => $settings['margin_item_568']
                ),
                '768' => array(
                    'items' => $settings['item_768']
                ),
                '992' => array(
                    'items' => $settings['item_992']
                ),
                '1200' => array(
                    'items' => $settings['item']
                ),
            ],
        ];
        $tax_query = array();

        if ( !empty( $cate ) ) :
            $tax_query = array(
                array(
                    'taxonomy' => 'project_cat',
                    'field' => 'term_id',
                    'terms' => $cate,
                ),
            );
        endif;

        $args = array(
            'post_type' => 'project',
            'posts_per_page' => $limit,
            'orderby' => $order_by,
            'order' => $order_post,
            'ignore_sticky_posts' => 1,
            'tax_query' => $tax_query,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
        ?>
            <div class="element-project-popup">
                <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode($data_settings_owl); ?>'>
                    <?php while ($query->have_posts()): $query->the_post(); ?>
                        <div class="item-post item-effect">
                            <div class="item-post__thumbnail">
                                <?php
                                if (has_post_thumbnail()) :
                                    the_post_thumbnail('large');
                                else:
                                ?>
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/no-image.png')) ?>" alt="<?php the_title(); ?>"/>
                                <?php endif; ?>
                            </div>

                            <div class="item-post__content">
                                <h2 class="item-post__title">
                                    <?php the_title(); ?>
                                </h2>

                                <div class="item-post__desc">
                                    <?php the_excerpt(); ?>
                                </div>

                                <p class="item-post__more">
                                    <?php esc_html_e('Xem thêm'); ?>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </p>
                            </div>

                            <a href="#" class="view-project view-popup" data-project-id="<?php echo esc_attr( get_the_ID() ); ?>"></a>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php

        endif;
    }

}