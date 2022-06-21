<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class bilalmghl_Copyright_Text extends Widget_Base {

    public function get_name() {
        return 'bilalmghl_Copyright_Text';
    }
    
    public function get_title() {
        return __( 'Ul Copyright Text', 'bilalmghl' );
    }

    public function get_icon() {
        return 'eicon-lock';
    }
    
	public function get_categories() {
		return [ 'bilalmghl-addons' ];
	}

    public function get_keywords() {
        return[
            'copyright',
            'copyright text'
        ];
    }
    
    protected function _register_controls() {
        /*---------------------------
            CONTENT SECTION
        ----------------------------*/
        $this->start_controls_section(
            '_content_section',
            [
                'label' => __( 'Content', 'bilalmghl' ),
            ]
        );
            $author_name = wp_get_theme()->get( 'Author' );
            $author_link = wp_get_theme()->get( 'AuthorURI' );
            $this->add_control(
                'copyright_text',
                [
                    'label'       => __( 'Copyright Text', 'bilalmghl' ),
                    'type'        => Controls_Manager::WYSIWYG,
                    'default'     => sprintf('Copyright {COPYRIGHT} %s {YEAR} All Right Reserved', '<a href="'. $author_link .'">'. $author_name .'</a>' ),
                    'description' => sprintf( __( 'Set the footer copyright text. Use %s for showing year dianamicly and use %s or %s for getting dianamicly copyright sign.', 'bilalmghl' ),'<mark>{YEAR}</mark>','<mark>&copy;</mark>','<mark>{COPYRIGHT}</mark>' ),
                ]
            );
            $this->add_responsive_control(
                '_content_wrap_align',
                [
                    'label'   => __( 'Alignment', 'bilalmghl' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                    ],
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
        $this->end_controls_section();
        /*---------------------------
            CONTENT SECTION END
        ----------------------------*/

        /*-----------------------
            COPYRIGHT LINK STYLE
        -------------------------*/
        $this->start_controls_section(
            '_link_style_section',
            [
                'label'     => __( 'Links', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'copyright_text!' => '',
                ]
            ]
        );
            $this->start_controls_tabs( 'copyright_link_style_tab' );
                $this->start_controls_tab(
                    'copyright_link_normal_tab',
                    [
                        'label' => __( 'Normal', 'bilalmghl' ),
                    ]
                );
                    $this->add_control(
                        'copyright_link_color',
                        [
                            'label'  => __( 'Color', 'bilalmghl' ),
                            'type'   => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .copyright__text__area a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'copyright_link_typography',
                            'label'    => __( 'Typography', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .copyright__text__area a',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'copyright_link_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .copyright__text__area a',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'copyright_link_border',
                            'label'    => __( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .copyright__text__area a',
                        ]
                    );
                    $this->add_responsive_control(
                        'copyright_link_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .copyright__text__area a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'copyright_link_shadow',
                            'selector' => '{{WRAPPER}} .copyright__text__area a',
                        ]
                    );
                    $this->add_responsive_control(
                        'copyright_link_margin',
                        [
                            'label'      => __( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .copyright__text__area a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'copyright_link_padding',
                        [
                            'label'      => __( 'Padding', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .copyright__text__area a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'copyright_link_hover_tab',
                    [
                        'label' => __( 'Hover', 'bilalmghl' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Css_Filter:: get_type(),
                        [
                            'name'      => 'hover_copyright_link_image_filters',
                            'selector'  => '{{WRAPPER}} .copyright__text__area a:hover',
                        ]
                    );
                    $this->add_control(
                        'hover_copyright_link_color',
                        [
                            'label'     => __( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .copyright__text__area a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_copyright_link_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .copyright__text__area a:hover',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'hover_copyright_link_border',
                            'label'    => __( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .copyright__text__area a:hover',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*-----------------------
            COPYRIGHT LINK STYLE END
        -------------------------*/

        /*---------------------------
            BOX STYLE
        ----------------------------*/
        $this->start_controls_section(
            '_style_section',
            [
                'label' => __( 'Box', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'copyright_text!' => '',
                ]
            ]
        );
            $this->add_responsive_control(
                'copyright_text_display',
                [
                    'label'   => __( 'Display', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,          
                    'options' => [
                        'initial'      => __( 'Initial', 'bilalmghl' ),
                        'block'        => __( 'Block', 'bilalmghl' ),
                        'inline-block' => __( 'Inline Block', 'bilalmghl' ),
                        'flex'         => __( 'Flex', 'bilalmghl' ),
                        'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
                        'none'         => __( 'none', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .copyright__text__area' => 'display: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'copyright_text_align',
                [
                    'label'   => __( 'Alignment', 'bilalmghl' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .copyright__text__area' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'copyright_text_color',
                [
                    'label'  => __( 'Color', 'bilalmghl' ),
                    'type'   => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright__text__area' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'copyright_text_typography',
                    'label'    => __( 'Typography', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .copyright__text__area',
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'copyright_text_background',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .copyright__text__area',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'copyright_text_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .copyright__text__area',
                ]
            );
            $this->add_responsive_control(
                'copyright_text_border_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .copyright__text__area' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'copyright_text_shadow',
                    'selector' => '{{WRAPPER}} .copyright__text__area',
                ]
            );
            $this->add_responsive_control(
                'copyright_text_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .copyright__text__area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'copyright_text_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .copyright__text__area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();
        /*---------------------------
            BOX STYLE END
        ----------------------------*/
    }

    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'copyright_text_wrap_attr', 'class', 'copyright__text__area' );
        ?>
        <div <?php echo $this->get_render_attribute_string('copyright_text_wrap_attr'); ?>>
            <?php if( !empty( $settings['copyright_text'] ) ): ?>
                <?php
                    $copyright_text  = str_replace( [ '{COPYRIGHT}', '{YEAR}' ], [ '&copy;', date( 'Y' ) ], $settings['copyright_text'] );
                    echo wp_kses( $copyright_text, wp_kses_allowed_html( 'post' ) );
                ?>
            <?php endif; ?>
        </div>
    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Copyright_Text() );