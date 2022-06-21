<?php
namespace Elementor;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}


class bilalmghl_Adv_Accordion extends Widget_Base
{
    public function get_name()
    {
        return 'bilalmghl_Adv_Accordion';
    }

    public function get_title()
    {
        return esc_html__('Ul Accordion', 'bilalmghl');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['bilalmghl-addons'];
    }

    public function get_script_depends() {
        return[
            'bilalmghl-core',
        ];
    }

    public function get_keywords() {
        return[
            'accordion',
            'toggle'
        ];
    }
    
    /*
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

    protected function register_controls()
    {
        /*--------------------------------
            Advance Accordion Settings
        ---------------------------------*/
        $this->start_controls_section(
            'bilalmghl_accordion_settings_section',
            [
                'label' => esc_html__('Accordicon Settings', 'bilalmghl'),
            ]
        );
            $this->add_control(
                'bilalmghl_accordion_type',
                [
                    'label'       => esc_html__('Accordion Type', 'bilalmghl'),
                    'type'        => Controls_Manager::SELECT,
                    'default'     => 'accordion',
                    'label_block' => false,
                    'options'     => [
                        'accordion' => esc_html__('Accordion', 'bilalmghl'),
                        'toggle'    => esc_html__('Toggle', 'bilalmghl'),
                    ],
                ]
            );
            $this->add_control(
                'bilalmghl_accordion_show_icon',
                [
                    'label'        => esc_html__('Enable Toggle Icon', 'bilalmghl'),
                    'type'         => Controls_Manager::SWITCHER,
                    'default'      => 'yes',
                    'return_value' => 'yes',
                    'separator'    => 'before',
                ]
            );
            
            $this->add_control(
                'bilalmghl_adv_accordion_toggle_icon',
                [
                    'label'       => esc_html__('Toggle Icon', 'bilalmghl'),
                    'type' => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default' => [
                        'value' => 'fa fa-angle-right',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'bilalmghl_accordion_show_icon' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'bilalmghl_accordion_toggle_speed',
                [
                    'label'       => esc_html__('Toggle Speed (ms)', 'bilalmghl'),
                    'type'        => Controls_Manager::NUMBER,
                    'label_block' => false,
                    'default'     => 300,
                    'separator'    => 'before',
                ]
            );
        $this->end_controls_section();

        /*--------------------------------------
            Advance Accordion Content Settings
        ----------------------------------------*/
        $this->start_controls_section(
            'bilalmghl_accordion_content_section',
            [
                'label' => esc_html__('Accordion Content', 'bilalmghl'),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'bilalmghl_adv_accordion_tab_default_active',
                [
                    'label'        => esc_html__('Active as Default', 'bilalmghl'),
                    'type'         => Controls_Manager::SWITCHER,
                    'default'      => 'no',
                    'return_value' => 'yes',
                ]
            );

            $repeater->add_control(
                'bilalmghl_accordion_show_tab_icon',
                [
                    'label'        => esc_html__('Enable Tab Icon', 'bilalmghl'),
                    'type'         => Controls_Manager::SWITCHER,
                    'default'      => 'yes',
                    'return_value' => 'yes',
                    'separator'    => 'before',
                ]
            );
            $repeater->add_control(
                'bilalmghl_accordion_tab_title_icon',
                [
                    'label'       => esc_html__('Icon', 'bilalmghl'),
                    'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default' => [
                        'value' => 'fa fa-plus',
                        'library' => 'solid',
                    ],
                    'condition'   => [
                        'bilalmghl_accordion_show_tab_icon' => 'yes',
                    ],
                ]
            );
            $repeater->add_control(
                'bilalmghl_adv_accordion_tab_title',
                [
                    'label'   => esc_html__('Tab Title', 'bilalmghl'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('Tab Title', 'bilalmghl'),
                    'dynamic' => ['active' => true],
                    'separator'    => 'before',
                ]
            );
            $repeater->add_control(
                'bilalmghl_accordion_text_type',
                [
                    'label'   => __('Content Type', 'bilalmghl'),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'content'  => __('Content', 'bilalmghl'),
                        'template' => __('Saved Templates', 'bilalmghl'),
                    ],
                    'default' => 'content',
                    'separator'    => 'before',
                ]
            );
            $repeater->add_control(
                'bilalmghl_primary_templates',
                [
                    'label'     => __('Choose Template', 'bilalmghl'),
                    'type'      => Controls_Manager::SELECT,
                    'options'   => $this->bilalmghl_elementor_template(),
                    'condition' => [
                        'bilalmghl_accordion_text_type' => 'template',
                    ],
                ]
            );
            $repeater->add_control(
                'bilalmghl_adv_accordion_tab_content',
                [
                    'label'     => esc_html__('Tab Content', 'bilalmghl'),
                    'type'      => Controls_Manager::WYSIWYG,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'bilalmghl'),
                    'dynamic'   => ['active' => true],
                    'condition' => [
                        'bilalmghl_accordion_text_type' => 'content',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_adv_accordion_tab',
                [
                    'type'      => Controls_Manager::REPEATER,
                    'seperator' => 'before',
                    'default'   => [
                        ['bilalmghl_adv_accordion_tab_title' => esc_html__('Accordion Tab Title 1', 'bilalmghl')],
                        ['bilalmghl_adv_accordion_tab_title' => esc_html__('Accordion Tab Title 2', 'bilalmghl')],
                        ['bilalmghl_adv_accordion_tab_title' => esc_html__('Accordion Tab Title 3', 'bilalmghl')],
                    ],
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{bilalmghl_adv_accordion_tab_title}}',
                ]
            );
        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style Advance Accordion Generel Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'bilalmghl_adv_accordion_style_section',
            [
                'label' => esc_html__('Accordion Area Style', 'bilalmghl'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'bilalmghl_adv_accordion_margin',
                [
                    'label'      => esc_html__('Margin', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator'    => 'before',
                ]
            );        
            
            $this->add_responsive_control(
                'bilalmghl_adv_accordion_padding',
                [
                    'label'      => esc_html__('Padding', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_accordion_border',
                    'label'    => esc_html__('Border', 'bilalmghl'),
                    'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion',
                    'separator'    => 'before',
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_adv_accordion_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_accordion_box_shadow',
                    'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion',
                ]
            );
        $this->end_controls_section();


        /**
         * -------------------------------------------
         * TAB ACCORDION ITEM STYLE
         * -------------------------------------------
         */
        $this->start_controls_section(
            'bilalmghl_adv_accordion_item_style_section',
            [
                'label' => esc_html__('Single Item Style', 'bilalmghl'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_item_background',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .bilalmghl__accordion__list',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_item_border',
                    'label'    => esc_html__('Border', 'bilalmghl'),
                    'selector' => '{{WRAPPER}} .bilalmghl__accordion__list',
                    'separator'    => 'before',
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_adv_item_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__accordion__list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_item_box_shadow',
                    'selector' => '{{WRAPPER}} .bilalmghl__accordion__list',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_adv_item_margin',
                [
                    'label'      => esc_html__('Margin', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__accordion__list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator'    => 'before',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_adv_item_padding',
                [
                    'label'      => esc_html__('Padding', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__accordion__list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();


        /**
         * -------------------------------------------
         * Tab Style Advance Accordion Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'bilalmghl_adv_accordions_tab_style_section',
            [
                'label' => esc_html__('Header Style', 'bilalmghl'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'iocn_hidding',
                [
                    'label'     => __( 'Icon', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_adv_accordion_tab_icon_size',
                [
                    'label'   => __('Icon Size', 'bilalmghl'),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 16,
                        'unit' => 'px',
                    ],
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header .bilalmghl__accordion__icon' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header .bilalmghl__accordion__title__icon svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_adv_accordion_tab_icon_gap',
                [
                    'label'   => __('Icon Gap', 'bilalmghl'),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 10,
                        'unit' => 'px',
                    ],
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header .bilalmghl__accordion__icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_control(
                'title_hidding',
                [
                    'label'     => __( 'Title Wrap', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'title_hr',
                    [
                        'type' => Controls_Manager::DIVIDER,
                    ]
                );

            $this->start_controls_tabs('bilalmghl_adv_accordion_header_tabs');
                # Normal State Tab
                $this->start_controls_tab(
                    'bilalmghl_adv_accordion_header_normal',
                    [
                        'label' => esc_html__( 'Normal', 'bilalmghl' ),
                    
                    ]
                );

                    $this->add_control(
                        'bilalmghl_adv_accordion_tab_icon_color',
                        [
                            'label'     => esc_html__('Icon Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__icon' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'bilalmghl_adv_accordion_tab_text_color',
                        [
                            'label'     => esc_html__('Text Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_title_typography',
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_color',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header',
                        ]
                    );


                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_border',
                            'label'    => esc_html__('Border', 'bilalmghl'),
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header',
                            'separator'    => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'bilalmghl_adv_accordion_tab_border_radius',
                        [
                            'label'      => esc_html__('Border Radius', 'bilalmghl'),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'bilalmghl_adv_accordion_tab_margin',
                        [
                            'label'      => esc_html__('Margin', 'bilalmghl'),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator'    => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'bilalmghl_adv_accordion_tab_padding',
                        [
                            'label'      => esc_html__('Padding', 'bilalmghl'),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                # Hover State Tab
                $this->start_controls_tab(
                    'bilalmghl_adv_accordion_header_hover',
                    [
                        'label' => esc_html__('Hover', 'bilalmghl'),
                    ]
                );

                    $this->add_control(
                        'bilalmghl_adv_accordion_tab_icon_color_hover',
                        [
                            'label'     => esc_html__('Icon Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header:hover .fa' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'bilalmghl_adv_accordion_toggle_icon_show' => 'yes',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'bilalmghl_adv_accordion_hover_tab_icon_color',
                        [
                            'label'     => esc_html__('Hover Icon Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header:hover .bilalmghl__accordion__icon' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'bilalmghl_adv_accordion_tab_text_color_hover',
                        [
                            'label'     => esc_html__('Text Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header:hover' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_color_hover',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_border_hover',
                            'label'    => esc_html__('Border', 'bilalmghl'),
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header:hover',
                            'separator'    => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'bilalmghl_adv_accordion_tab_border_radius_hover',
                        [
                            'label'      => esc_html__('Border Radius', 'bilalmghl'),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();

                #Active State Tab
                $this->start_controls_tab(
                    'bilalmghl_adv_accordion_header_active',
                    [
                        'label' => esc_html__('Active', 'bilalmghl'),
                    ]
                );

                    $this->add_control(
                        'bilalmghl_adv_accordion_tab_icon_color_active',
                        [
                            'label'     => esc_html__('Icon Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active .fa' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'bilalmghl_adv_accordion_toggle_icon_show' => 'yes',
                            ],
                            'separator'    => 'before',
                        ]
                    );

                    $this->add_control(
                        'bilalmghl_adv_accordion_active_tab_icon_color',
                        [
                            'label'     => esc_html__('Active Icon Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active .bilalmghl__accordion__icon' => 'color: {{VALUE}};',
                            ],
                            'separator'    => 'before',
                        ]
                    );

                    $this->add_control(
                        'bilalmghl_adv_accordion_tab_text_color_active',
                        [
                            'label'     => esc_html__('Text Color', 'bilalmghl'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active' => 'color: {{VALUE}};',
                            ],
                            'separator'    => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_color_active',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'bilalmghl_adv_accordion_tab_border_active',
                            'label'    => esc_html__('Border', 'bilalmghl'),
                            'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active',
                            'separator'    => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'bilalmghl_adv_accordion_tab_border_radius_active',
                        [
                            'label'      => esc_html__('Border Radius', 'bilalmghl'),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

        /*-------------------------------------------
            Tab Style Advance Accordion Content Style
        * ------------------------------------------*/
        $this->start_controls_section(
            'bilalmghl_adv_accordion_tab_content_style_section',
            [
                'label' => esc_html__('Content Style', 'bilalmghl'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'adv_accordion_content_text_color',
                [
                    'label'     => esc_html__('Text Color', 'bilalmghl'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_accordion_content_typography',
                    'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'adv_accordion_content_bg_color',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content',
                ]
            );

            $this->add_responsive_control(
                'bilalmghl_adv_accordion_content_margin',
                [
                    'label'      => esc_html__('Margin', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_responsive_control(
                'bilalmghl_adv_accordion_content_padding',
                [
                    'label'      => esc_html__('Padding', 'bilalmghl'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'bilalmghl_adv_accordion_content_border',
                    'label'    => esc_html__('Border', 'bilalmghl'),
                    'selector' => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content',
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'      => 'bilalmghl_adv_accordion_content_shadow',
                    'selector'  => '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__content',
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();

        /**
         * Advance Accordion Caret Settings
         */
        $this->start_controls_section(
            'bilalmghl_adv_accordion_caret_section',
            [
                'label' => esc_html__('Toggle Caret Style', 'bilalmghl'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'bilalmghl_adv_accordion_tab_toggle_icon_size',
                [
                    'label'   => __('Icon Size', 'bilalmghl'),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 16,
                        'unit' => 'px',
                    ],
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header .toggle__icon' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'bilalmghl_accordion_show_icon' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'bilalmghl_adv_tabs_tab_toggle_color',
                [
                    'label'     => esc_html__('Caret Color', 'bilalmghl'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header .toggle__icon' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'bilalmghl_accordion_show_icon' => 'yes',
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'bilalmghl_adv_tabs_tab_toggle_active_color',
                [
                    'label'     => esc_html__('Caret Color (Active)', 'bilalmghl'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list .bilalmghl__accordion__header.active .toggle__icon' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .bilalmghl__adv__accordion .bilalmghl__accordion__list:hover .bilalmghl__accordion__header .toggle__icon'  => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'bilalmghl_accordion_show_icon' => 'yes',
                    ],
                ]
            );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $id_int = substr($this->get_id_int(), 0, 3);

        $this->add_render_attribute('bilalmghl__adv__accordion', 'class', 'bilalmghl__adv__accordion');
        $this->add_render_attribute('bilalmghl__adv__accordion', 'id', 'bilalmghl__adv__accordion-' . esc_attr($this->get_id()));
        ?>
	<div
		<?php echo $this->get_render_attribute_string('bilalmghl__adv__accordion'); ?>
		<?php echo 'data-accordion-id="' . esc_attr($this->get_id()) . '"'; ?>
		<?php echo !empty($settings['bilalmghl_accordion_type']) ? 'data-accordion-type="' . esc_attr($settings['bilalmghl_accordion_type']) . '"' : 'accordion'; ?>
		<?php echo !empty($settings['bilalmghl_accordion_toggle_speed']) ? 'data-toogle-speed="' . esc_attr($settings['bilalmghl_accordion_toggle_speed']) . '"' : '300'; ?>
	>
		<?php
            foreach ($settings['bilalmghl_adv_accordion_tab'] as $index => $tab):

            $tab_count               = $index + 1;
            $tab_title_setting_key   = $this->get_repeater_setting_key('bilalmghl_adv_accordion_tab_title', 'bilalmghl_adv_accordion_tab', $index);
            $tab_content_setting_key = $this->get_repeater_setting_key('bilalmghl_adv_accordion_tab_content', 'bilalmghl_adv_accordion_tab', $index);

            $tab_title_class         = ['elementor-tab-title', 'bilalmghl__accordion__header'];
            $tab_content_class       = ['bilalmghl__accordion__content', 'clearfix'];

            if ($tab['bilalmghl_adv_accordion_tab_default_active'] == 'yes') {
                $tab_title_class[]   = 'active-default';
                $tab_content_class[] = 'active-default';
            }

            $this->add_render_attribute($tab_title_setting_key, [
                'id'            => 'elementor-tab-title-' . $id_int . $tab_count,
                'class'         => $tab_title_class,
                'tabindex'      => $id_int . $tab_count,
                'data-tab'      => $tab_count,
                //'role'          => 'tab',
                'aria-controls' => 'elementor-tab-content-' . $id_int . $tab_count,
            ]);

            $this->add_render_attribute($tab_content_setting_key, [
                'id'              => 'elementor-tab-content-' . $id_int . $tab_count,
                'class'           => $tab_content_class,
                'data-tab'        => $tab_count,
                //'role'            => 'tabpanel',
                'aria-labelledby' => 'elementor-tab-title-' . $id_int . $tab_count,
            ]);
            ?>
			<div class="bilalmghl__accordion__list">

				<div <?php echo $this->get_render_attribute_string($tab_title_setting_key); ?>>
					<span class="bilalmghl__accordion__title__icon">
                        <?php if ($tab['bilalmghl_accordion_show_tab_icon'] === 'yes'): ?>
                            <?php echo bilalmghl_render_icons( $tab['bilalmghl_accordion_tab_title_icon'], 'bilalmghl__accordion__icon' ); ?>
                        <?php endif;?>
                        <?php echo $tab['bilalmghl_adv_accordion_tab_title']; ?>
                    </span>
				<?php if ($settings['bilalmghl_accordion_show_icon'] === 'yes'): ?>
                    <?php echo bilalmghl_render_icons( $settings['bilalmghl_adv_accordion_toggle_icon'], 'toggle__icon' ); ?>
				<?php endif;?>
			</div>

			<div <?php echo $this->get_render_attribute_string($tab_content_setting_key); ?>>
			<?php if ('content' == $tab['bilalmghl_accordion_text_type']): ?>
				<p><?php echo do_shortcode($tab['bilalmghl_adv_accordion_tab_content']); ?></p>
			    <?php
                elseif ('template' == $tab['bilalmghl_accordion_text_type']):                    
                    if (!empty($tab['bilalmghl_primary_templates'])) {

                        $bilalmghl_template_id = $tab['bilalmghl_primary_templates'];
                        $bilalmghl_frontend    = new Frontend;
                        echo $bilalmghl_frontend->get_builder_content($bilalmghl_template_id, true);
                    }
                endif;?>
			</div>
		</div>
		<?php endforeach;?>
	</div>
	<?php
}

    protected function content_template()
    {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Adv_Accordion() );