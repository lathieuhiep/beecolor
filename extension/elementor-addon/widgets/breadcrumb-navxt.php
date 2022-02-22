<?php

use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_breadcrumb_navxt extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'beecolor-breadcrumb-navxt';
    }

    public function get_title() {
        return esc_html__( 'Breadcrumb Navxt', 'beecolor' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'beecolor' ),
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {
        get_template_part( 'template-parts/breadcrumbs/inc','breadcrumbs' );
    }

}