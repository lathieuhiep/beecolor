<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class beecolor_widget_post_grid extends Widget_Base {

    public function get_categories() {
        return array( 'beecolor_widgets' );
    }

    public function get_name() {
        return 'beecolor-post-grid';
    }

    public function get_title() {
        return esc_html__( 'Posts Grid', 'beecolor' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
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
                'options'       =>  beecolor_check_get_cat( 'category' ),
                'label_block'   =>  true
            ]
        );


        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'beecolor' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'beecolor' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'            =>  esc_html__( 'Post ID', 'beecolor' ),
                    'author'        =>  esc_html__( 'Post Author', 'beecolor' ),
                    'title'         =>  esc_html__( 'Title', 'beecolor' ),
                    'date'          =>  esc_html__( 'Date', 'beecolor' ),
                    'rand'          =>  esc_html__( 'Random', 'beecolor' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'beecolor' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'beecolor' ),
                    'DESC'  =>  esc_html__( 'Descending', 'beecolor' ),
                ],
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
            'column_number',
            [
                'label'     =>  esc_html__( 'Column', 'beecolor' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  3,
                'options'   =>  [
                    4   =>  esc_html__( '4 Column', 'beecolor' ),
                    3   =>  esc_html__( '3 Column', 'beecolor' ),
                    2   =>  esc_html__( '2 Column', 'beecolor' ),
                    1   =>  esc_html__( '1 Column', 'beecolor' ),
                ],
            ]
        );

        $this->add_control(
            'type_style',
            [
	            'label'     =>  esc_html__( 'Type Style', 'beecolor' ),
	            'type'      =>  Controls_Manager::SELECT,
	            'default'   =>  1,
	            'options'   =>  [
		            2   =>  esc_html__( 'First Post', 'beecolor' ),
		            1   =>  esc_html__( 'Default', 'beecolor' ),
	            ],
            ]
        );

        $this->end_controls_section();

        /* Section style post */
        $this->start_controls_section(
            'section_style_post',
            [
                'label' => esc_html__( 'Color & Typography', 'beecolor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Style title post
        $this->add_control(
            'title_post_options',
            [
                'label'     =>  esc_html__( 'Title Post', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'title_post_color',
            [
                'label'     =>  esc_html__( 'Color', 'beecolor' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post__title a'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_post_color_hover',
            [
                'label'     =>  esc_html__( 'Color Hover', 'beecolor' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post__title a:hover'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_post_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .item-post .item-post__title',
            ]
        );

        $this->add_control(
            'title_post_alignment',
            [
                'label'     =>  esc_html__( 'Title Alignment', 'beecolor' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'beecolor' ),
                        'icon'  =>  'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>  esc_html__( 'Center', 'beecolor' ),
                        'icon'  =>  'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>  esc_html__( 'Right', 'beecolor' ),
                        'icon'  =>  'fa fa-align-right',
                    ],
                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'beecolor' ),
                        'icon'  =>  'fa fa-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post .item-post__title'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        // Style excerpt post
        $this->add_control(
            'excerpt_post_options',
            [
                'label'     =>  esc_html__( 'Excerpt Post', 'beecolor' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label'     =>  esc_html__( 'Color', 'beecolor' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post .item-post__content p'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .item-post .item-post__content p',
            ]
        );

        $this->add_control(
            'excerpt_alignment',
            [
                'label'     =>  esc_html__( 'Excerpt Alignment', 'beecolor' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'beecolor' ),
                        'icon'  =>  'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>  esc_html__( 'Center', 'beecolor' ),
                        'icon'  =>  'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>  esc_html__( 'Right', 'beecolor' ),
                        'icon'  =>  'fa fa-align-right',
                    ],
                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'beecolor' ),
                        'icon'  =>  'fa fa-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post .item-post__content p'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['select_cat'];
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

        if ( !empty( $cat_post ) ) :

            $args = array(
                'post_type'             =>  'post',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'cat'                   =>  $cat_post,
                'ignore_sticky_posts'   =>  1,
            );

        else:

            $args = array(
                'post_type'             =>  'post',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'ignore_sticky_posts'   =>  1,
            );

        endif;

        $query = new \ WP_Query( $args );

        if ( $query->have_posts() ) :
	        $postCount = 0;
        ?>

            <div class="element-post-grid">
                <?php if ( $settings['title'] ) : ?>
                    <div class="heading d-flex align-items-center">
                        <h2 class="title-top flex-grow-0">
                            <?php echo esc_html( $settings['title'] ); ?>
                        </h2>
                        <span class="line flex-grow-1"></span>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <?php
                    while ( $query->have_posts() ):
                        $query->the_post();
	                    $postCount++;

	                    if ( $settings['type_style'] == 2 && $postCount == 1 ) {
	                        $column_number = 'col-12';
                        } else {
		                    $column_number = 'col-sm-6 col-md-4 col-lg-' . 12 / $settings['column_number'];
                        }
                    ?>

                        <div class="<?php echo esc_attr( $column_number ); ?> item-col">
                            <div class="item-post<?php echo $settings['type_style'] == 1 || $postCount > 1 ? ' custom-style' : ''  ?>">
                                <?php if ( $settings['type_style'] == 2 && $postCount == 1 ) : ?>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="item-post__thumbnail">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php
                                                    if ( has_post_thumbnail() ) :
                                                        the_post_thumbnail('large');
                                                    else:
                                                    ?>
                                                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/no-image.png' ) ) ?>" alt="<?php the_title(); ?>" />
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <h2 class="item-post__title">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>

                                            <?php beecolor_post_meta(); ?>

                                            <div class="item-post__content">
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

                                <?php else: ?>

                                    <div class="item-post__thumbnail">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			                                <?php
                                            if ( has_post_thumbnail() ) :
                                                the_post_thumbnail('large');
                                            else: ?>

                                                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/no-image.png' ) ) ?>" alt="<?php the_title(); ?>" />

			                                <?php endif; ?>
                                        </a>
                                    </div>

                                    <h2 class="item-post__title">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			                                <?php the_title(); ?>
                                        </a>
                                    </h2>

	                                <?php beecolor_post_meta(); ?>

                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>

        <?php

        endif;
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new beecolor_widget_post_grid );