<?php

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_image_box_theme extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'beecolor-image-box-theme';
	}

	public function get_title() {
		return esc_html__( 'Image Box Theme', 'beecolor' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
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

		$this->add_control(
			'background_overlay',
			[
				'label' => esc_html__( 'Background Overlay', 'beecolor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'background_image[url]',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'background_overlay_color',
			[
				'label' => esc_html__( 'Color', 'beecolor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0.5)',
				'conditions' => [
					'terms' => [
						[
							'name' => 'background_overlay',
							'value' => 'yes',
						],
					],
				],
				'selectors' => [
					'{{WRAPPER}} .element-image-box-theme .box .overlay' => 'background-color: {{VALUE}}',
				],
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
            <a class="link" href="<?php echo esc_url( $settings['link']['url'] ); ?>" <?php echo $target . $nofollow ?>></a>

			<div class="box d-flex align-items-center justify-content-center">
                <?php if ( $settings['background_overlay'] == 'yes' ) : ?>
                    <div class="overlay"></div>
                <?php endif; ?>

				<div class="image">
					<?php echo wp_get_attachment_image( $settings['image']['id'], 'large' ); ?>
				</div>
			</div>

            <h2 class="title">
                <?php echo wp_kses_post( $settings['widget_title'] ); ?>
            </h2>
		</div>

		<?php

	}

}