<?php

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_image_box_theme_2 extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'beecolor-image-box-theme-2';
	}

	public function get_title() {
		return esc_html__( 'Image Box Theme 2', 'beecolor' );
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
			'widget_title',
			[
				'label'         =>  esc_html__( 'Title', 'beecolor' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Title', 'beecolor' ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'beecolor' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'beecolor' ),
				'placeholder' => esc_html__( 'Type your description here', 'beecolor' ),
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

		<div class="element-image-box-theme-v2">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="image-box">
		                <?php echo wp_get_attachment_image( $settings['image']['id'], 'large' ); ?>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="box-content">
                        <h3 class="title">
		                    <?php echo wp_kses_post( $settings['widget_title'] ); ?>
                        </h3>

                        <div class="description mb-3">
		                    <?php echo wp_kses_post( $settings['description'] ); ?>
                        </div>

                        <a class="btn btn-link" href="<?php echo esc_url( $settings['link']['url'] ); ?>" <?php echo $target . $nofollow ?>>
		                    <?php esc_html_e( 'Xem thêm dự án', 'beecolor' ); ?>
                        </a>
                    </div>
                </div>
            </div>
		</div>

		<?php

	}

}