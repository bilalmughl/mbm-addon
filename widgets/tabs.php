<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ){ 
    exit;
}

class bilalmghl_Tabs_Menu_Widget extends Widget_Base {

    public function get_name() {
        return 'bilalmghl_Tabs_Menu_Widget';
    }
    
    public function get_title() {
        return __( 'Ul Tabs', 'bilalmghl' );
    }

	public function get_icon() {
		return "eicon-tabs";
	}
    
	public function get_categories() {
		return [ 'bilalmghl-addons' ];
	}

	public function get_keywords() {
        return[
            'tab menu',
            'advanced tab',
            'tabs button',
            'tabs',
        ];
    }

    /**
     * Elementor Templates List
     * return array
     */
    public function bilalmghl_elementor_template() {
        $templates = Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
        $types     = array();
        if ( empty( $templates ) ) {
            $template_lists = [ '0' => __( 'Do not Saved Templates.', 'bilalmghl' ) ];
        } else {
            $template_lists = [ '0' => __( 'Select Template', 'bilalmghl' ) ];
            foreach ( $templates as $template ) {
                $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }
        return $template_lists;
    }

    public function bilalmghl_tab_style(){
        $tab_style = [
            '1' => __( 'Top Menu', 'bilalmghl' ),
            '2' => __( 'Left Menu', 'bilalmghl' ),
            '3' => __( 'Right Menu', 'bilalmghl' ),
        ];
        return $tab_style;
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'tab_content',
            [
                'label' => __( 'Tabs', 'bilalmghl' ),
            ]
        );
            $this->add_control(
                'tab_style',
                [
                    'label'   => __( 'Menu Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => $this->bilalmghl_tab_style(),
                ]
            );
            $repeater = new Repeater();
            $repeater->start_controls_tabs('tab_content_item_area_tabs');

                $repeater->start_controls_tab(
                    'tab_content_item_area',
                    [
                        'label' => __( 'Content', 'bilalmghl' ),
                    ]
                );
                    
                    $repeater->add_control(
                        'set_default',
                        [
                            'label'        => __('Set as Default', 'bilalmghl'),
                            'type'         => Controls_Manager::SWITCHER,
                            'default'      => 'inactive',
                            'return_value' => 'active',
                            'separator' => 'before',
                        ]
                    );
                    
                    $repeater->add_control(
                        'tab_title',
                        [
                            'label'   => esc_html__( 'Title', 'bilalmghl' ),
                            'type'    => Controls_Manager::TEXT,
                            'default' => esc_html__( 'Tab #1', 'bilalmghl' ),
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon',
                        [
                            'label' => esc_html__( 'Icon', 'bilalmghl' ),
                            'type'  => Controls_Manager::ICONS,
                            'label_block' => true,
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'content_source',
                        [
                            'label'   => esc_html__( 'Select Content Source', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'custom',
                            'options' => [
                                'custom'    => esc_html__( 'Content', 'bilalmghl' ),
                                "elementor" => esc_html__( 'Template', 'bilalmghl' ),
                            ],
                            'separator' => 'before',
                        ]
                    );

                     $repeater->add_control(
                        'template_id',
                        [
                            'label'     => __( 'Content', 'bilalmghl' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '0',
                            'options'   => $this->bilalmghl_elementor_template(),
                            'condition' => [
                                'content_source' => "elementor"
                            ],
                            'separator' => 'before',
                        ]
                    );

                     $repeater->add_control(
                        'custom_content',
                        [
                            'label'      => __( 'Content', 'bilalmghl' ),
                            'type'       => Controls_Manager::WYSIWYG,
                            'title'      => __( 'Content', 'bilalmghl' ),
                            'show_label' => false,
                            'condition'  => [
                                'content_source' => 'custom',
                            ],
                            'separator' => 'before',
                        ]
                    );

                $repeater->end_controls_tab();// Tab Content area end

                // Style area start
                $repeater->start_controls_tab(
                    'tab_item_style_area',
                    [
                        'label' => __( 'Style', 'bilalmghl' ),
                    ]
                );
                    
                    $repeater->add_control(
                        'tab_title_color',
                        [
                            'label'     => esc_html__( 'Title Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tab__nav a.item-{{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    
                    $repeater->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'title_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .tab__nav a.item-{{CURRENT_ITEM}}',
                        ]
                    );

                    $repeater->add_control(
                        'tab_title_active_color',
                        [
                            'label'     => esc_html__( 'Title Active Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tab__nav li.active a.item-{{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'title_active_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .tab__nav li.active a.item-{{CURRENT_ITEM}}',
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon_color',
                        [
                            'label'     => esc_html__( 'Icon Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tab__nav a.item-{{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                            ],
                            'condition' => [
                                'tab_icon!' => '',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon_size',
                        [
                            'label' => __( 'Icon Size', 'bilalmghl' ),
                            'type'  => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'size' => 14,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .tab__nav a.item-{{CURRENT_ITEM}} i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon_active_color',
                        [
                            'label'     => esc_html__( 'Active Icon Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tab__nav li.active a.item-{{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                            ],
                            'condition' => [
                                'tab_icon!' => '',
                            ]
                        ]
                    );

                $repeater->end_controls_tab(); // Style area end

            $repeater->end_controls_tabs();

            $this->add_control(
                'tabs_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'tab_title'      => esc_html__( 'Title #1', 'bilalmghl' ),
                            'custom_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exerci ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate.','bilalmghl' ),
                        ],
                        [
                            'tab_title'      => esc_html__( 'Title #2', 'bilalmghl' ),
                            'custom_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exerci ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate.','bilalmghl' ),
                        ],
                        [
                            'tab_title'      => esc_html__( 'Title #3', 'bilalmghl' ),
                            'custom_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exerci ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate.','bilalmghl' ),
                        ],
                    ],
                    'title_field' => '{{{ tab_title }}}',
                ]
            );
            
        $this->end_controls_section();

        // Style tab area tab section
        $this->start_controls_section(
            'bilalmghl_tab_style_area',
            [
                'label' => __( 'Tab Menu Wrap', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'bilalmghl_tab_section_display',
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
                        '{{WRAPPER}} .tab__nav' => 'display: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'menu_text_align',
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
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => 'text-align: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_tab_section_float',
                [
                    'label'   => __( 'Float', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'left'     => __( 'Left', 'bilalmghl' ),
                        'right'    => __( 'Right', 'bilalmghl' ),
                        'inherit ' => __( 'Inherit', 'bilalmghl' ),
                        'none'     => __( 'None', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => 'float: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_tab_section_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .tab__nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_tab_section_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'bilalmghl_tab_section_bg',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .tab__nav',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'bilalmghl_tab_section_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .tab__nav',
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'bilalmghl_tab_section_shadow',
                    'label'    => __( 'Box Shadow', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .tab__nav',
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_tab_section_width',
                [
                    'label'      => __( 'Width', 'bilalmghl' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 9999,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_tab_section_height',
                [
                    'label'      => __( 'Height', 'bilalmghl' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 9999,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        
            $this->add_responsive_control(
                'bilalmghl_tab_section_border_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'custom_area_css',
                [
                    'label'     => __( 'Custom CSS', 'bilalmghl' ),
                    'type'      => Controls_Manager::CODE,
                    'rows'      => 20,
                    'language'  => 'css',
                    'selectors' => [
                        '{{WRAPPER}} .tab__nav' => '{{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'tab_button_icon_style_section',
            [
                'label' => __( 'Tab Menu Icon', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'tabs_button_icon_style' );
            $this->start_controls_tab(
                'tab_button_icon_normal',
                [
                    'label' => __( 'Normal', 'bilalmghl' ),
                ]
            );
                $this->add_responsive_control(
                    'tab_button_icon_display',
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
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'display: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'tab_button_icon_align',
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
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'text-align: {{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography:: get_type(),
                    [
                        'name'     => 'tab_button_icon_typography',
                        'selector' => '{{WRAPPER}} .tab__nav li .tab__button__icon',
                    ]
                );
                $this->add_control(
                    'tab_button_icon_color',
                    [
                        'label'     => __( 'Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'color: {{VALUE}};',
                        ],
                    ]
                );                
                $this->add_responsive_control(
                    'tab_button_icon_width',
                    [
                        'label'      => __( 'Width', 'bilalmghl' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'vw' ],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 9999,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'tab_button_icon_height',
                    [
                        'label'      => __( 'Height', 'bilalmghl' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'vw' ],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 9999,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    Group_Control_Background:: get_type(),
                    [
                        'name'     => 'tab_button_icon_background',
                        'label'    => __( 'Background', 'bilalmghl' ),
                        'types'    => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .tab__nav li .tab__button__icon',
                    ]
                );
                
                $this->add_responsive_control(
                    'tab_button_icon_margin',
                    [
                        'label'      => __( 'Margin', 'bilalmghl' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );
                
                $this->add_responsive_control(
                    'tab_button_icon_padding',
                    [
                        'label'   => __( 'Padding', 'bilalmghl' ),
                        'type'    => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );   
                
                $this->add_group_control(
                    Group_Control_Border:: get_type(),
                    [
                        'name'     => 'tab_button_icon_border',
                        'selector' => '{{WRAPPER}} .tab__nav li .tab__button__icon',
                    ]
                );

                $this->add_control(
                    'tab_button_icon_radius',
                    [
                        'label'      => __( 'Border Radius', 'bilalmghl' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    Group_Control_Box_Shadow:: get_type(),
                    [
                        'name'     => 'tab_button_icon_box_shadow',
                        'selector' => '{{WRAPPER}} .tab__nav li .tab__button__icon',
                    ]
                );
                $this->add_responsive_control(
                    'tab_button_icon_custom_css',
                    [
                        'label'     => __( 'Custom CSS', 'bilalmghl' ),
                        'type'      => Controls_Manager::CODE,
                        'rows'      => 20,
                        'language'  => 'css',
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li .tab__button__icon' => '{{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'tab_button_icon_hover',
                [
                    'label' => __( 'Hover', 'bilalmghl' ),
                ]
            );

                $this->add_control(
                    'tab_button_icon_hover_color',
                    [
                        'label'     => __( 'Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li:hover .tab__button__icon, {{WRAPPER}} .tab__nav li.active .tab__button__icon' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'tab_button_icon_hover_background',
                    [
                        'label'     => __( 'Background Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#f8f8f8',
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li:hover .tab__button__icon, {{WRAPPER}} .tab__nav li.active .tab__button__icon' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                
                $this->add_control(
                    'tab_button_icon_hover_border_color',
                    [
                        'label'     => __( 'Border Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li:hover .tab__button__icon, {{WRAPPER}} .tab__nav li.active .tab__button__icon' => 'border-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Box_Shadow:: get_type(),
                    [
                        'name'     => 'tab_button_icon_hover_box_shadow',
                        'selector' => '{{WRAPPER}} .tab__nav li:hover .tab__button__icon, {{WRAPPER}} .tab__nav li.active .tab__button__icon',
                    ]
                );
                $this->add_responsive_control(
                    'tab_button_icon_hover_custom_css',
                    [
                        'label'     => __( 'Custom CSS', 'bilalmghl' ),
                        'type'      => Controls_Manager::CODE,
                        'rows'      => 20,
                        'language'  => 'css',
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li:hover .tab__button__icon, {{WRAPPER}} .tab__nav li.active .tab__button__icon' => '{{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'tab_button_style_section',
            [
                'label' => __( 'Tab Menu Item', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'tabs_button_style' );
            $this->start_controls_tab(
                'tab_button_normal',
                [
                    'label' => __( 'Normal', 'bilalmghl' ),
                ]
            );
                $this->add_responsive_control(
                    'tab_button_display',
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
                            '{{WRAPPER}} .tab__nav li' => 'display: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'tab_button_text_align',
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
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button' => 'text-align: {{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography:: get_type(),
                    [
                        'name'     => 'tab_button_typography',
                        'selector' => '{{WRAPPER}} .tab__nav .tab__button',
                    ]
                );
                $this->add_control(
                    'tab_button_color',
                    [
                        'label'     => __( 'Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button' => 'color: {{VALUE}};',
                        ],
                    ]
                );                
                $this->add_responsive_control(
                    'tab_button_width',
                    [
                        'label'      => __( 'Width', 'bilalmghl' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'vw' ],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 9999,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    Group_Control_Background:: get_type(),
                    [
                        'name'     => 'tab_button_background_color',
                        'label'    => __( 'Background', 'bilalmghl' ),
                        'types'    => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .tab__nav .tab__button',
                    ]
                );
                
                $this->add_responsive_control(
                    'tab_button_margin',
                    [
                        'label'      => __( 'Margin', 'bilalmghl' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );
                
                $this->add_responsive_control(
                    'tab_button_padding',
                    [
                        'label'   => __( 'Padding', 'bilalmghl' ),
                        'type'    => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .tab__nav .tab__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );   
                
                $this->add_group_control(
                    Group_Control_Border:: get_type(),
                    [
                        'name'     => 'tab_button_border',
                        'selector' => '{{WRAPPER}} .tab__nav .tab__button',
                    ]
                );

                $this->add_control(
                    'tab_button_radius',
                    [
                        'label'      => __( 'Border Radius', 'bilalmghl' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    Group_Control_Box_Shadow:: get_type(),
                    [
                        'name'     => 'tab_button_box_shadow',
                        'selector' => '{{WRAPPER}} .tab__nav .tab__button',
                    ]
                );
                $this->add_responsive_control(
                    'tab_button_custom_css',
                    [
                        'label'     => __( 'Custom CSS', 'bilalmghl' ),
                        'type'      => Controls_Manager::CODE,
                        'rows'      => 20,
                        'language'  => 'css',
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li' => '{{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'tab_button_hover',
                [
                    'label' => __( 'Hover', 'bilalmghl' ),
                ]
            );

                $this->add_control(
                    'tab_button_hover_color',
                    [
                        'label'     => __( 'Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button:hover, {{WRAPPER}} .tab__nav li.active .tab__button' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'tab_button_hover_background',
                    [
                        'label'     => __( 'Background Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#f8f8f8',
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button:hover, {{WRAPPER}} .tab__nav li.active .tab__button' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                
                $this->add_control(
                    'tab_button_hover_border_color',
                    [
                        'label'     => __( 'Border Color', 'bilalmghl' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav .tab__button:hover, {{WRAPPER}} .tab__nav li.active .tab__button' => 'border-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Box_Shadow:: get_type(),
                    [
                        'name'     => 'tab_button_hover_box_shadow',
                        'selector' => '{{WRAPPER}} .tab__nav .tab__button:hover, {{WRAPPER}} .tab__nav li.active .tab__button',
                    ]
                );
                $this->add_responsive_control(
                    'tab_button_hover_custom_css',
                    [
                        'label'     => __( 'Custom CSS', 'bilalmghl' ),
                        'type'      => Controls_Manager::CODE,
                        'rows'      => 20,
                        'language'  => 'css',
                        'selectors' => [
                            '{{WRAPPER}} .tab__nav li' => '{{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

        // Style tab item content
        $this->start_controls_section(
            'tab_style_content_section',
            [
                'label' => __( 'Content', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'bilalmghl_tab_content_display',
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
                        '{{WRAPPER}} .single__tab__item' => 'display: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_tab_content_float',
                [
                    'label'   => __( 'Float', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'left'     => __( 'Left', 'bilalmghl' ),
                        'right'    => __( 'Right', 'bilalmghl' ),
                        'inherit ' => __( 'Inherit', 'bilalmghl' ),
                        'none'     => __( 'None', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single__tab__item' => 'float: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_tab_content_width',
                [
                    'label'      => __( 'Width', 'bilalmghl' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 9999,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single__tab__item' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'tab_content_background',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__tab__item',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'tab_content_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__tab__item',
                ]
            );

            $this->add_responsive_control(
                'tab_content_border_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__tab__item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'tab_content_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__tab__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'tab_content_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__tab__item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab area tab section
        $this->start_controls_section(
            'bilalmghl_tab_content_area_style',
            [
                'label' => __( 'Tab Content Wrap', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'bilalmghl_tab_content_area_display',
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
                        '{{WRAPPER}} .tab__content__area' => 'display: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_tab_content_area_float',
                [
                    'label'   => __( 'Float', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'left'     => __( 'Left', 'bilalmghl' ),
                        'right'    => __( 'Right', 'bilalmghl' ),
                        'inherit ' => __( 'Inherit', 'bilalmghl' ),
                        'none'     => __( 'None', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__content__area' => 'float: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_tab_content_area_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .tab__content__area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_tab_content_area_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .tab__content__area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'bilalmghl_tab_content_area_bg',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .tab__content__area',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'bilalmghl_tab_content_area_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .tab__content__area',
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'bilalmghl_tab_content_area_shadow',
                    'label'    => __( 'Box Shadow', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .tab__content__area',
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_tab_content_area_width',
                [
                    'label'      => __( 'Width', 'bilalmghl' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 9999,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__content__area' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_tab_content_area_height',
                [
                    'label'      => __( 'Height', 'bilalmghl' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 9999,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tab__content__area' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        
            $this->add_responsive_control(
                'bilalmghl_tab_content_area_border_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .tab__content__area' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'custom_tab_content_area_css',
                [
                    'label'     => __( 'Custom CSS', 'bilalmghl' ),
                    'type'      => Controls_Manager::CODE,
                    'rows'      => 20,
                    'language'  => 'css',
                    'selectors' => [
                        '{{WRAPPER}} .tab__content__area' => '{{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();

        $id = $this->get_id();
        $this->add_render_attribute( 'tabs_area_attr', 'id', 'tabs__area__'.$id );
        $this->add_render_attribute( 'tabs_area_attr', 'class', 'tabs__area' );
        $this->add_render_attribute( 'tabs_area_attr', 'class', 'tab__style__'.$settings['tab_style'] );

        $this->add_render_attribute( 'tab_menu_attr', 'class', 'nav-tabs tab__nav');
        $this->add_render_attribute( 'tab_menu_attr', 'role', 'tablist');
        $this->add_render_attribute( 'tab_menu_attr', 'class', 'tab__nav__style__'.$settings['tab_style'] );
        $id = $this->get_id();
        ?>
            <div <?php echo $this->get_render_attribute_string( 'tabs_area_attr' ); ?>>

                <ul <?php echo $this->get_render_attribute_string( 'tab_menu_attr' ); ?>>
                    <?php
                        $i = 0;
                        foreach ( $settings['tabs_list'] as $item ) {
                            $i++;

                            if ( isset($item['set_default']) && 'active' == $item['set_default'] ) {
                                $active_tab = $item['set_default'];
                            }elseif( !isset($item['set_default']) && $i == 1 ){
                                $active_tab = 'active';
                            }else{
                                $active_tab ='';
                            }                            

                            //if( $i == 1 ){ $active_tab = 'active'; } else{ $active_tab = ''; }

                            $tabbuttontxt = $item['tab_title'];                            
                            if( !empty( $item['tab_icon'] ) ){ $tabbuttontxt = '<div class="tab__button__icon">'.bilalmghl_render_icons( $item['tab_icon'] ).'</div>'.$item['tab_title']; }
                            echo sprintf( '<li class="%1$s" ><a class="tab__button %4$s" href="#tabitem-%2$s" data-toggle="tab">%3$s</a></li>',$active_tab, $id.$i, $tabbuttontxt, 'item-'.$item['_id']);
                        }
                    ?>
                </ul>
                <div class="tab__content__area tab-content">
                    <?php
                        $i = 0;
                        foreach ( $settings['tabs_list'] as $item ) {
                            $i++;                            

                            if ( isset($item['set_default']) && 'active' == $item['set_default'] ) {
                                $active_tab = $item['set_default'].' active';
                            }elseif( !isset($item['set_default']) && $i == 1 ){
                                $active_tab = 'active';
                            }else{
                                $active_tab = '';
                            }

                            if ( $item['content_source'] == 'custom' && !empty( $item['custom_content'] ) ) {
                                $tab_content = wp_kses_post( $item['custom_content'] );
                            } elseif ( $item['content_source'] == "elementor" && !empty( $item['template_id'] )) {
                                $tab_content = Plugin::instance()->frontend->get_builder_content_for_display( $item['template_id'] );
                            }else{
                                $tab_content = '';
                            }
                            echo sprintf('<div class="single__tab__item tab-pane %1$s %4$s" id="tabitem-%2$s"><div class="tab__inner__content">%3$s</div></div>', $active_tab, $id.$i, $tab_content,'elementor-repeater-item-'.$item['_id']);
                        }
                    ?>
                </div>
            </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Tabs_Menu_Widget() );