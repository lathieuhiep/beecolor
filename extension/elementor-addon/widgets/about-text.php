<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_about_text extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'beecolor-about-title';
    }

    public function get_title() {
        return esc_html__( 'About Title', 'beecolor' );
    }

    public function get_icon() {
        return 'eicon-text';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Heading', 'beecolor' ),
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'label'         =>  esc_html__( 'Title', 'beecolor' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Title', 'beecolor' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        ?>

        <div class="element-about-text d-flex align-items-center">
            <h2 class="element-about-text__title flex-grow-0">
                <?php echo wp_kses_post( $settings['widget_title'] ); ?>
            </h2>

            <span class="element-about-text__line flex-grow-1">&nbsp;</span>
        </div>

        <?php

    }

    protected function _content_template() {

        ?>
        <#
        var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' );
        #>

        <div class="element-about-text">
            <h2 class="element-about-text__title">
                {{{ settings.widget_title }}}
            </h2>

            <span class="element-about-text__line">&nbsp;</span>
        </div>

        <?php
    }

}