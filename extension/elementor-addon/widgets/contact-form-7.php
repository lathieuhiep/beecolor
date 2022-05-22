<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class beecolor_widget_contact_form_7 extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'land-contact-form-7';
	}

	public function get_title() {
		return esc_html__( 'Contact Form 7', 'land' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	protected function register_controls() {

		// Content section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Contact Form', 'land' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( !empty( $settings['contact_form_list'] ) ) :
	?>

		<div class="element-contact-form-7">
			<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_list'] . '" ]'); ?>
		</div>

	<?php
		endif;
	}

}