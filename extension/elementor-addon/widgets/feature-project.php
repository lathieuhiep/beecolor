<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_feature_project extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'beecolor-feature-project';
	}

	public function get_title() {
		return esc_html__( 'Feature Project', 'beecolor' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	protected function _register_controls() {

		/* Section Query */
		$this->start_controls_section(
			'section_query',
			[
				'label' =>  esc_html__( 'Query', 'beecolor' )
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'beecolor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'beecolor' ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'select_cat',
			[
				'label'         =>  esc_html__( 'Select Category', 'beecolor' ),
				'type'          =>  Controls_Manager::SELECT,
				'options'       =>  beecolor_check_get_cat( 'project_cat' ),
				'label_block'   =>  true
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings       =   $this->get_settings_for_display();
		$cat_post       =   $settings['select_cat'];
		$limit_post     =   1;

		if ( !empty( $cat_post ) ) :
			$args = array(
				'post_type' =>  'project',
				'posts_per_page' =>  $limit_post,
				'orderby' => 'date',
				'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'project_cat',
						'field' => 'term_id',
						'terms' => $cat_post
					)
				)
			);
		else:
			$args = array(
				'post_type' =>  'project',
				'posts_per_page' =>  $limit_post,
				'orderby' => 'date',
				'order' => 'DESC',
			);
		endif;

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
		?>
			<div class="element-feature-project">

				<?php if ( $settings['title'] ) : ?>
					<h2 class="title-top flex-grow-0">
						<?php echo esc_html( $settings['title'] ); ?>
					</h2>
				<?php endif; ?>

				<?php while ( $query->have_posts() ): $query->the_post(); ?>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="project-image">
								<?php the_post_thumbnail('large'); ?>
							</div>
						</div>

						<div class="col-12 col-md-6">
							<h2>
								<?php the_title(); ?>
							</h2>

							<div class="des">
								<p>
									<?php
									if ( has_excerpt() ) :
										echo esc_html( get_the_excerpt() );
									else:
										echo esc_html( wp_trim_words( get_the_content(), 110, '' ) );
									endif;
									?>
								</p>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php
		endif;
	}

	protected function _content_template() {}

}