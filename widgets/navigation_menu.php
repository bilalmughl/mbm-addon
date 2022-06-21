<?php
    namespace Elementor;

    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }
    // Exit if accessed directly

    class bilalmghl_Menu_Widget extends Widget_Base {

        public function get_name() {
            return 'bilalmghl_Menu_Widget';
        }

        public function get_title() {
            return __( 'Ul Navigation', 'bilalmghl' );
        }

        public function get_icon() {
            return 'eicon-nav-menu';
        }

        public function get_categories() {
            return ['bilalmghl-addons'];
        }

        public function get_keywords() {
            return[
                'navigation',
                'menu',
                'nav',
                'custom menu',
            ];
        }

        private function get_available_menus() {

            $menus     = wp_get_nav_menus();
            $menulists = [];
            foreach ( $menus as $menu ) {
                $menulists[$menu->slug] = $menu->name;
            }
            return $menulists;

        }

        protected function _register_controls() {

            $this->start_controls_section(
                'inline_menu_content',
                [
                    'label' => __( 'Select Navigation & Style', 'bilalmghl' ),
                ]
            );

                $this->add_control(
                    'inline_menu_style',
                    [
                        'label'   => __( 'Style', 'bilalmghl' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => '1',
                        'options' => [
                            '1'      => __( 'Style One', 'bilalmghl' ),
                            '2'      => __( 'Style Two', 'bilalmghl' ),
                            '3'      => __( 'Style Three', 'bilalmghl' ),
                            'custom' => __( 'Custom Style', 'bilalmghl' ),
                        ],
                    ]
                );

                if ( !empty( $this->get_available_menus() ) ) {
                    $this->add_control(
                        'inline_menu_id',
                        [
                            'label'        => __( 'Menu', 'bilalmghl' ),
                            'type'         => Controls_Manager::SELECT,
                            'options'      => $this->get_available_menus(),
                            'default'      => array_keys( $this->get_available_menus() )[0],
                            'save_default' => true,
                            'separator'    => 'after',
                            'description'  => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus Option</a> to manage your menus.', 'bilalmghl' ), admin_url( 'nav-menus.php' ) ),
                        ]
                    );
                } else {
                    $this->add_control(
                        'inline_menu_id',
                        [
                            'type'      => Controls_Manager::RAW_HTML,
                            'raw'       => sprintf( __( '<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus Option</a> to create one.', 'bilalmghl' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
                            'separator' => 'after',
                        ]
                    );
                }

                // Icon Toggle
                $this->add_control(
                    'show_icon',
                    [
                        'label'        => __( 'Show Icon ?', 'bilalmghl' ),
                        'type'         => Controls_Manager::SWITCHER,
                        'label_on'     => __( 'Show', 'bilalmghl' ),
                        'label_off'    => __( 'Hide', 'bilalmghl' ),
                        'return_value' => 'yes',
                        'default'      => 'no',
                        'separator'		=> 'before',
                    ]
                );

                // Font Icon
                $this->add_control(
                    'nav_icon',
                    [
                        'label'     => __( 'Font Icons', 'bilalmghl' ),
                        'type'      => Controls_Manager::ICONS,
                        'label_block' => true,
                        'default' => [
                            'value'   => 'fas fa-star',
                            'library' => 'solid',
                        ],
                        'condition' => [
                            'show_icon' => 'yes',
                        ],
                    ]
                );

            $this->end_controls_section();

            /*------------------------
            MENU ITEMS STYLE
            -------------------------*/
            $this->start_controls_section(
                'inline_menu_style_section',
                [
                    'label' => __( 'Menu Items', 'bilalmghl' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'menu_items_display',
                    [
                        'label'     => __( 'Display', 'bilalmghl' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'block',
                        'options'   => [
                            'initial'      => __( 'Initial', 'bilalmghl' ),
                            'block'        => __( 'Block', 'bilalmghl' ),
                            'inline-block' => __( 'Inline Block', 'bilalmghl' ),
                            'flex'         => __( 'Flex', 'bilalmghl' ),
                            'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
                            'inherit'      => __( 'Inherit', 'bilalmghl' ),
                            'none'         => __( 'None', 'bilalmghl' ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li' => 'display: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'menu_items_list_style',
                    [
                        'label'     => __( 'List Style', 'bilalmghl' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'none',
                        'options'   => [
                            'none'                 => __( 'None', 'bilalmghl' ),
                            'disc'                 => __( 'Disc', 'bilalmghl' ),
                            'circle'               => __( 'Circle', 'bilalmghl' ),
                            'square'               => __( 'Square', 'bilalmghl' ),
                            'decimal'              => __( 'Decimal', 'bilalmghl' ),
                            'decimal-leading-zero' => __( 'Decimal-leading-zero', 'bilalmghl' ),
                            'lower-roman'          => __( 'Lower Roman', 'bilalmghl' ),
                            'upper-roman'          => __( 'Upper Roman', 'bilalmghl' ),
                            'lower-greek'          => __( 'Lower Greek', 'bilalmghl' ),
                            'lower-latin'          => __( 'Lower Latin', 'bilalmghl' ),
                            'upper-latin'          => __( 'Upper Latin', 'bilalmghl' ),
                            'armenian'             => __( 'Armenian', 'bilalmghl' ),
                            'georgian'             => __( 'Georgian', 'bilalmghl' ),
                            'lower-alpha'          => __( 'Lower Alpha', 'bilalmghl' ),
                            'upper-alpha'          => __( 'Upper Alpha', 'bilalmghl' ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu' => 'list-style: {{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'menu_items_align',
                    [
                        'label'     => __( 'Alignment', 'bilalmghl' ),
                        'type'      => Controls_Manager::CHOOSE,
                        'options'   => [
                            'left'    => [
                                'title' => __( 'Left', 'bilalmghl' ),
                                'icon'  => 'fa fa-align-left',
                            ],
                            'center'  => [
                                'title' => __( 'Center', 'bilalmghl' ),
                                'icon'  => 'fa fa-align-center',
                            ],
                            'right'   => [
                                'title' => __( 'Right', 'bilalmghl' ),
                                'icon'  => 'fa fa-align-right',
                            ],
                            'justify' => [
                                'title' => __( 'Justify', 'bilalmghl' ),
                                'icon'  => 'fa fa-align-justify',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu' => 'text-align: {{VALUE}};',
                        ],
                        'default'   => '',
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'menu_items_margin',
                    [
                        'label'      => __( 'Margin', 'bilalmghl' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors'  => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_section();
            /*------------------------
            MENU ITEMS STYLE
            -------------------------*/

            /*------------------------
            MENU ITEM STYLE
            -------------------------*/
            $this->start_controls_section(
                'inline_menu_item_style_section',
                [
                    'label' => __( 'Single Menu Item', 'bilalmghl' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'     => 'menu_typography',
                        'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a',
                    ]
                );
                $this->add_responsive_control(
                    'menu_display',
                    [
                        'label'     => __( 'Display', 'bilalmghl' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'block',
                        'options'   => [
                            'initial'      => __( 'Initial', 'bilalmghl' ),
                            'block'        => __( 'Block', 'bilalmghl' ),
                            'inline-block' => __( 'Inline Block', 'bilalmghl' ),
                            'flex'         => __( 'Flex', 'bilalmghl' ),
                            'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a' => 'display: {{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'menu_item_width',
                    [
                        'label'      => __( 'Width', 'bilalmghl' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 1000,
                                'step' => 1,
                            ],
                            '%'  => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default'    => [
                            'unit' => 'px',
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'menu_item_float',
                    [
                        'label'     => __( 'Float', 'bilalmghl' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'none',
                        'options'   => [
                            'left'    => __( 'Left', 'bilalmghl' ),
                            'right'   => __( 'Right', 'bilalmghl' ),
                            'none'    => __( 'None', 'bilalmghl' ),
                            'inherit' => __( 'Inherit', 'bilalmghl' ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li' => 'float:{{VALUE}};',
                        ],
                        'separator' => 'before',
                    ]
                );

                // Menu Normal Tab
                $this->start_controls_tabs( 'menu_style_tabs',[
                    'separator' => 'before',
                ] );

                    $this->start_controls_tab(
                        'menu_style_normal_tab',
                        [
                            'label' => __( 'Normal', 'bilalmghl' ),
                        ]
                    );
                        $this->add_control(
                            'menu_normal_color',
                            [
                                'label'     => __( 'Color', 'bilalmghl' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Background::get_type(),
                            [
                                'name'     => 'menu_normal_background',
                                'label'    => __( 'Background', 'bilalmghl' ),
                                'types'    => ['classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name'     => 'menu_normal_border',
                                'label'    => __( 'Border', 'bilalmghl' ),
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a',
                            ]
                        );

                        $this->add_responsive_control(
                            'menu_normal_border_radius',
                            [
                                'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                                'type'      => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                                'separator' => 'after',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                'name'      => 'menu_normal_box_shadow',
                                'label'     => __( 'Box Shadow', 'bilalmghl' ),
                                'selector'  => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a',
                                'separator' => 'before',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Text_Shadow::get_type(),
                            [
                                'name'     => 'menu_normal_text_shadow',
                                'label'    => __( 'Text Shadow', 'bilalmghl' ),
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a',
                            ]
                        );

                        $this->add_responsive_control(
                            'menu_normal_margin',
                            [
                                'label'      => __( 'Margin', 'bilalmghl' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => ['px', '%', 'em'],
                                'selectors'  => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator'  => 'before',
                            ]
                        );
                        $this->add_responsive_control(
                            'menu_normal_padding',
                            [
                                'label'      => __( 'Padding', 'bilalmghl' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => ['px', '%', 'em'],
                                'selectors'  => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ]
                        );

                    $this->end_controls_tab();

                    // Menu Hover Tab
                    $this->start_controls_tab(
                        'menu_style_hover_tab',
                        [
                            'label' => __( 'Hover', 'bilalmghl' ),
                        ]
                    );

                        $this->add_control(
                            'menu_hover_color',
                            [
                                'label'     => __( 'Color', 'bilalmghl' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu > li:hover > a' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Background::get_type(),
                            [
                                'name'     => 'menu_hover_background',
                                'label'    => __( 'Background', 'bilalmghl' ),
                                'types'    => ['classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu > li:hover > a',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name'     => 'menu_hover_border',
                                'label'    => __( 'Border', 'bilalmghl' ),
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu > li:hover > a',
                            ]
                        );

                        $this->add_responsive_control(
                            'menu_hover_border_radius',
                            [
                                'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                                'type'      => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu > li:hover > a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                                'separator' => 'after',
                            ]
                        );

                    $this->end_controls_tab();

                    // Menu Active Tab
                    $this->start_controls_tab(
                        'menu_style_active_tab',
                        [
                            'label' => __( 'Active', 'bilalmghl' ),
                        ]
                    );

                        $this->add_control(
                            'menu_active_color',
                            [
                                'label'     => __( 'Color', 'bilalmghl' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li.current-menu-item a' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Background::get_type(),
                            [
                                'name'     => 'menu_active_background',
                                'label'    => __( 'Background', 'bilalmghl' ),
                                'types'    => ['classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li.current-menu-item a',
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name'     => 'menu_active_border',
                                'label'    => __( 'Border', 'bilalmghl' ),
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li.current-menu-item a',
                            ]
                        );

                        $this->add_responsive_control(
                            'menu_active_border_radius',
                            [
                                'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                                'type'      => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li.current-menu-item a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                                'separator' => 'after',
                            ]
                        );

                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->end_controls_section();
            /*-------------------------
                MENU ITEM STYLE END
            --------------------------*/

            /*----------------------------
                MENU ICON STYLE
            -----------------------------*/
            $this->start_controls_section(
                'menu_icon_style_section',
                [
                    'label' => __( 'Menu Icon', 'bilalmghl' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'show_icon' => 'yes',
                    ]
                ]
            );

                $this->start_controls_tabs( 'menu_icon_tabs_style' );
                    $this->start_controls_tab(
                        'menu_icon_normal_tab',
                        [
                            'label' => __( 'Normal', 'bilalmghl' ),
                        ]
                    );

                        // Icon Color
                        $this->add_control(
                            'menu_icon_color',
                            [
                                'label'     => __( 'Color', 'bilalmghl' ),
                                'type'      => Controls_Manager::COLOR,
                                'default'   => '',
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        $this->add_responsive_control(
                            'menu_icon_size',
                            [
                                'label'      => __( 'Icon Size', 'bilalmghl' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range'      => [
                                    'px' => [
                                        'min'  => 0,
                                        'max'  => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'unit' => 'px',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li svg' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                            ]
                        );

                        // Background
                        $this->add_group_control(
                            Group_Control_Background:: get_type(),
                            [
                                'name'     => 'menu_icon_background',
                                'label'    => __( 'Background', 'bilalmghl' ),
                                'types'    => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i',
                            ]
                        );

                        // Border
                        $this->add_group_control(
                            Group_Control_Border:: get_type(),
                            [
                                'name'     => 'menu_icon_border',
                                'label'    => __( 'Border', 'bilalmghl' ),
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i',
                                'separator' => 'before',
                            ]
                        );

                        // Radius
                        $this->add_responsive_control(
                            'menu_icon_radius',
                            [
                                'label'      => __( 'Border Radius', 'bilalmghl' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ]
                        );
                        
                        // Shadow
                        $this->add_group_control(
                            Group_Control_Box_Shadow:: get_type(),
                            [
                                'name'     => 'menu_icon_shadow',
                                'selector' => '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i',
                            ]
                        );

                        // Width
                        $this->add_responsive_control(
                            'menu_icon_width',
                            [
                                'label'      => __( 'Width', 'bilalmghl' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range'      => [
                                    'px' => [
                                        'min'  => 0,
                                        'max'  => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'unit' => 'px',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        // Height
                        $this->add_responsive_control(
                            'menu_icon_height',
                            [
                                'label'      => __( 'Height', 'bilalmghl' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range'      => [
                                    'px' => [
                                        'min'  => 0,
                                        'max'  => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                    ],
                                ],
                                'default' => [
                                    'unit' => 'px',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ]
                        );

                        // Margin
                        $this->add_responsive_control(
                            'menu_icon_margin',
                            [
                                'label'      => __( 'Margin', 'bilalmghl' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        // Padding
                        $this->add_responsive_control(
                            'menu_icon_padding',
                            [
                                'label'      => __( 'Padding', 'bilalmghl' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .single__menu__nav ul.bilalmghl__menu li svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ]
                        );

                    $this->end_controls_tab();

                    $this->start_controls_tab(
                        'menu_icon_hover_tab',
                        [
                            'label' => __( 'Hover', 'bilalmghl' ),
                        ]
                    );

                        //Hover Color
                        $this->add_control(
                            'hover_menu_icon_color',
                            [
                                'label'     => __( 'Color', 'bilalmghl' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} :hover .single__menu__nav ul.bilalmghl__menu li i, {{WRAPPER}} :focus .single__menu__nav ul.bilalmghl__menu li i' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ]
                        );

                        // Hover Background
                        $this->add_group_control(
                            Group_Control_Background:: get_type(),
                            [
                                'name'     => 'hover_menu_icon_background',
                                'label'    => __( 'Background', 'bilalmghl' ),
                                'types'    => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} :hover .single__menu__nav ul.bilalmghl__menu li i,{{WRAPPER}} :focus .single__menu__nav ul.bilalmghl__menu li i',
                            ]
                        );	

                        // Border
                        $this->add_group_control(
                            Group_Control_Border:: get_type(),
                            [
                                'name'     => 'hover_menu_icon_border',
                                'label'    => __( 'Border', 'bilalmghl' ),
                                'selector' => '{{WRAPPER}} :hover .single__menu__nav ul.bilalmghl__menu li i,{{WRAPPER}} :hover .single__menu__nav ul.bilalmghl__menu li i',
                                'separator' => 'before',
                            ]
                        );

                        // Radius
                        $this->add_responsive_control(
                            'hover_menu_icon_radius',
                            [
                                'label'      => __( 'Border Radius', 'bilalmghl' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} :hover .single__menu__nav ul.bilalmghl__menu li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ]
                        );

                        // Shadow
                        $this->add_group_control(
                            Group_Control_Box_Shadow:: get_type(),
                            [
                                'name'     => 'hover_menu_icon_shadow',
                                'selector' => '{{WRAPPER}} :hover .single__menu__nav ul.bilalmghl__menu li i',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->end_controls_section();
            /*----------------------------
                MENU ICON STYLE END
            -----------------------------*/

        }

        protected function render( $instance = [] ) {

            $settings = $this->get_settings_for_display();
            $id       = $this->get_id();

            $this->add_render_attribute( 'bilalmghl_menu_attr', 'class', 'bilalmghl__menu__area bilalmghl__menu__style__' . $settings['inline_menu_style'] );

            $menuargs = [
                'echo'        => false,
                'menu'        => $settings['inline_menu_id'],
                'menu_class'  => 'bilalmghl__menu',
                'menu_id'     => 'menu-' . $id,
                'fallback_cb' => '__return_empty_string',
                'container'   => '',
                'depth'       => 1,
            ];

            if( 'yes' == $settings['show_icon'] ){
                $menuargs['link_before'] = bilalmghl_render_icons($settings['nav_icon']);
            }

            // General Menu.
            $menu_html = wp_nav_menu( $menuargs );

        ?>
            <div <?php echo $this->get_render_attribute_string( 'bilalmghl_menu_attr' ); ?> >
                <nav class="single__menu__nav">
                    <?php
                        if ( !empty( $menu_html ) ) {
                            echo $menu_html;
                        }
                    ?>
                </nav>
            </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Menu_Widget() );