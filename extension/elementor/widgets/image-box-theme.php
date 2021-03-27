<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_image_box_theme extends Widget_Base {

	public function get_categories() {
		return array( 'beecolor_widgets' );
	}

	public function get_name() {
		return 'beecolor-image-box-theme';
	}

	public function get_title() {
		return esc_html__( 'Image Box Theme', 'beecolor' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'beecolor' ),
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

		$this->add_control(
			'background_image',
			[
				'label'     =>  esc_html__( 'Background Image', 'beecolor' ),
				'type'      =>  Controls_Manager::MEDIA,
				'default'   =>  [
					'url'   =>  Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .element-image-box-theme .box' => 'background-image: url({{URL}})',
				],
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

		$this->add_control(
			'link',
			[
				'label'         =>  esc_html__( 'Link', 'beecolor' ),
				'type'          =>  Controls_Manager::URL,
				'label_block'   =>  true,
				'placeholder'   =>  esc_html__( 'https://your-link.com', 'beecolor' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

	?>

		<div class="element-image-box-theme">
			<div class="box d-flex align-items-center justify-content-center">
				<div class="image">
					<?php echo wp_get_attachment_image( $settings['image']['id'], 'large' ); ?>
				</div>
			</div>

            <h2 class="title">
                <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" <?php echo $target . $nofollow ?>>
	                <?php echo wp_kses_post( $settings['widget_title'] ); ?>
                </a>
            </h2>
		</div>

		<?php

	}

}

Plugin::instance()->widgets_manager->register_widget_type( new beecolor_widget_image_box_theme );