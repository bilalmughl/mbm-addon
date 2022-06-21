<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class bilalmghl_Dual_Button extends Widget_Base {

	public function get_name() {
		return 'bilalmghl_Dual_Button';
	}

	public function get_title() {
		return __( 'Ul Dual Button', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return array('bilalmghl-addons');
	}

    public function get_script_depends() {
        return [
            'anime',
            'bilalmghl-effect',
        ];
    }

	public function get_keywords() {
        return[
            'dual button',
            'button'
        ];
    }

	public static function button_layout(){
		return [
			'btn__layout__1'      => 'Button Style 1',
			'btn__layout__2'      => 'Button Style 2',
			'btn__layout__custom' => 'Custom Style',
		];
	}

	static function button_effect(){
		return [
			'ripple__btn'         => 'Ripple Effect',
			'btn__effect__1'      => 'Effect 1',
			'btn__effect__2'      => 'Effect 2',
			'btn__effect__3'      => 'Effect 3',
			'btn__effect__4'      => 'Effect 4',
			'btn__effect__5'      => 'Effect 5',
			'btn__effect__6'      => 'Effect 6',
			'btn__effect__7'      => 'Effect 7',
			'btn__effect__8'      => 'Effect 8',
			'btn__effect__9'      => 'Effect 9',
			'btn__effect__10'     => 'Effect 10',
			'btn__effect__11'     => 'Effect 11',
			'btn__effect__12'     => 'Effect 12',
			'btn__effect__13'     => 'Effect 13',
			'btn__effect__14'     => 'Effect 14',
			'btn__effect__15'     => 'Effect 15',
			'btn__effect__16'     => 'Effect 16',
			'btn__effect__17'     => 'Effect 17',
			'btn__effect__18'     => 'Effect 18',
			'btn__effect__19'     => 'Effect 19',
			'btn__effect__20'     => 'Effect 20',
			'btn__effect__21'     => 'Effect 21',
			'btn__effect__22'     => 'Effect 22',
			'btn__effect__23'     => 'Effect 23',
			'btn__effect__24'     => 'Effect 24',
			'btn__custom__effect' => 'Custom Effect',
		];
	}

	static function button_text_effect(){
		return [
			'btn__notext__effect'      => 'No Effect',
			'btn__texteffect__1'      => 'Text Effect 1',
			'btn__texteffect__2'      => 'Text Effect 2',
			'btn__texteffect__3'      => 'Text Effect 3',
			'btn__texteffect__4'      => 'Text Effect 4',
			'btn__texteffect__5'      => 'Text Effect 5',
			'btn__texteffect__6'      => 'Text Effect 6',
			'btn__texteffect__7'      => 'Text Effect 7',
			'btn__texteffect__8'      => 'Text Effect 8',
			'btn__texteffect__9'      => 'Text Effect 9',
			'btn__texteffect__10'      => 'Text Effect 10',
			'btn__texteffect__11'      => 'Text Effect 11',
			'btn__texteffect__12'      => 'Text Effect 12',
			'btn__texteffect__13'      => 'Text Effect 13',
			'btn__texteffect__14'      => 'Text Effect 14',
			'btn__texteffect__15'      => 'Text Effect 15',
			'btn__texteffect__16'      => 'Text Effect 16',
			'btn__texteffect__17'      => 'Text Effect 17',
			'btn__texteffect__18'      => 'Text Effect 18',
			'btn__texteffect__19'      => 'Text Effect 19',
			'btn__texteffect__20'      => 'Text Effect 20',
			'btn__texteffect__21'      => 'Text Effect 21',
			'btn__texteffect__22'      => 'Text Effect 22',
			'btn__texteffect__23'      => 'Text Effect 23',
			'btn__texteffect__24'      => 'Text Effect 24',
			'btn__texteffect__25'      => 'Text Effect 25',
			'btn__texteffect__26'      => 'Text Effect 26',
			'btn__texteffect__27'      => 'Text Effect 27',
			'btn__texteffect__28'      => 'Text Effect 28',
			'btn__texteffect__29'      => 'Text Effect 29',
			'btn__texteffect__30'      => 'Text Effect 30',
			'btn__texteffect__31'      => 'Text Effect 31',
			'btn__texteffect__32'      => 'Text Effect 32',
			'btn__texteffect__33'      => 'Text Effect 33',
		];
	}

	protected function _register_controls() {

		/******************************
		 * 	CONTENT SECTION
		 ******************************/
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

			// Type
			$this->add_control(
				'button_layout_style',
				[
					'label'   => __( 'Button Type', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'btn__layout__1',
					'options' => self::button_layout(),
				]
			);

			// Button Hover Effect
			$this->add_control(
				'enable_hover_effect',
				[
					'label'        => __( 'Hover Effec ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Enable', 'bilalmghl' ),
					'label_off'    => __( 'Disable', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator' => 'before',
				]
			);

			// Effect
			$this->add_control(
				'button_effect',
				[
					'label'   => __( 'Button Hover Effect', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'ripple__btn',
					'options' => self::button_effect(),
					'condition' => [
						'enable_hover_effect' => 'yes',
					],
				]
			);

			// Button Hover Effect
			$this->add_control(
				'enable_text_effect',
				[
					'label'        => __( 'Text Effec ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Enable', 'bilalmghl' ),
					'label_off'    => __( 'Disable', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator' => 'before',
				]
			);

			// Effect
			$this->add_control(
				'button_text_effect',
				[
					'label'   => __( 'Button Text Effect', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'btn__notext__effect',
					'options' => self::button_text_effect(),
					'condition' => [
						'enable_text_effect' => 'yes',
					],
				]
			);

			$repeater = new Repeater();
			$repeater->start_controls_tabs(
				'dual_button_tabs'
			);
				$repeater->start_controls_tab(
					'dual_button_content_tab',
					[
						'label' => __( 'Content', 'bilalmghl' ),
					]
				);
					$repeater->add_control(
						'title',
						[
							'label'       => __( 'Title', 'bilalmghl' ),
							'type'        => Controls_Manager::TEXT,
							'placeholder' => __( 'Title', 'bilalmghl' ),
						]
					);
					$repeater->add_control(
						'button_link',
						[
							'label'         => __( 'Button Link', 'bilalmghl' ),
							'type'          => Controls_Manager::URL,
							'placeholder'   => __( 'https://your-link.com', 'bilalmghl' ),
							'show_external' => true,
							'default'       => [
								'url'         => '#',
								'is_external' => false,
								'nofollow'    => false,
							],
						]
					);
					$repeater->add_control(
						'show_icon',
						[
							'label'        => __( 'Show Icon ?', 'bilalmghl' ),
							'type'         => Controls_Manager::SWITCHER,
							'label_on'     => __( 'Show', 'bilalmghl' ),
							'label_off'    => __( 'Hide', 'bilalmghl' ),
							'return_value' => 'yes',
							'default'      => 'no',
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'icon_type',
						[
							'label'   => __( 'Icon Type', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'font_icon',
							'options' => [
								'font_icon'  => __( 'Font Icon', 'bilalmghl' ),
								'image_icon' => __( 'Image Icon', 'bilalmghl' ),
							],
							'condition' => [
								'show_icon' => 'yes',
							],
						]
					);
					$repeater->add_control(
						'font_icon',
						[
							'label'       => __( 'Font Icons', 'bilalmghl' ),
							'type'        => Controls_Manager::ICONS,
							'label_block' => true,
							'condition'   => [
								'icon_type' => 'font_icon',
								'show_icon' => 'yes',
							],
						]
					);
					$repeater->add_control(
						'image_icon',
						[
							'label'   => __( 'Image Icon', 'bilalmghl' ),
							'type'    => Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],
							'condition' => [
								'icon_type' => 'image_icon',
								'show_icon' => 'yes',
							],
						]
					);
					$repeater->add_control(
						'button_icon_align',
						[
							'label'   => __( 'Icon Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'right',
							'options' => [
								'left'  => __( 'Left', 'bilalmghl' ),
								'right' => __( 'Right', 'bilalmghl' ),
							],
							'condition' => [
								'show_icon' => 'yes',
							],
						]
					);
					$repeater->add_control(
						'button_icon_indent',
						[
							'label' => __( 'Icon Spacing', 'bilalmghl' ),
							'type'  => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 50,
								],
							],
							'condition' => [
								'show_icon' => 'yes',
							],
							'selectors' => [
								'{{WRAPPER}} .bilalmghl__btn .bilalmghl__btn_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .bilalmghl__btn .bilalmghl__btn_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
							],
						]
					);
				$repeater->end_controls_tab();
				$repeater->start_controls_tab(
					'dual_button_style_tab',
					[
						'label' => __( 'Style', 'bilalmghl' ),
					]
				);
                    $repeater->add_control(
                        'current_button_normal_style_heading',
                        [
                            'label'     => __( 'Normal Style', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_button_icon_color',
                        [
                            'label'     => __( 'Icon Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}} .button__icon' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_button_color',
                        [
                            'label'     => __( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'     => 'current_button_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'     => 'current_button_border',
                            'label'    => __( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}',
                        ]
                    );
                    $repeater->add_control(
                        'current_button_hover_style_heading',
                        [
                            'label' => __( 'Hover Style', 'bilalmghl' ),
                            'type'  => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_button_hover_icon_color',
                        [
                            'label'     => __( 'Icon color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}:hover .button__icon' => 'color: {{VALUE}} !important;',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_button_hover_color',
                        [
                            'label'     => __( 'Hover color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}} !important;',
                            ],
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'     => 'current_button_hover_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}:hover',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'     => 'current_button_hover_border',
                            'label'    => __( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}:hover',
                        ]
                    );
					$repeater->add_control(
						'current_button_hover_hidding',
						[
							'label'     => __( 'Button Hover Animated Background', 'bilalmghl' ),
							'type'      =>Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$repeater->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'current_button_hover_animate_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}}:before,{{WRAPPER}} .bilalmghl__dual__button {{CURRENT_ITEM}} span.repples',
							'separator' => 'before',
						]
					);
				$repeater->end_controls_tab();
			$repeater->end_controls_tabs();		

			$this->add_control(
				'button_content',
				[
					'label'   => __( 'Add Button Item', 'bilalmghl' ),
					'type'    => Controls_Manager::REPEATER,
					'fields'  => $repeater->get_controls(),
					'default' => [
						[
							'title'             => __( 'Button Title', 'bilalmghl' ),
							'font_icon'         => [
								'value'   => 'fas fa-star',
								'library' => 'solid',
							],
							'button_icon_align' => 'left',
						],
					],
					'title_field' => '{{{ title }}}',
					'separator' => 'before',
				]
			);
		$this->end_controls_section();
		/*********************************
		 * 		STYLE SECTION
		 *********************************/

		/*----------------------------
			ICON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'icon_style_section',
			[
				'label' => __( 'Icon', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'icon_tab_style' );
		$this->start_controls_tab(
			'icon_normal_tab',
			[
				'label' => __( 'Normal', 'bilalmghl' ),
			]
		);

		// Icon Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'icon_typography',
				'selector'  => '{{WRAPPER}} .button__icon',
			]
		);

		// Icon Image Size
		$this->add_responsive_control(
			'icon_image_size',
			[
				'label'      => __( 'Icon Image Size', 'bilalmghl' ),
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
					'size' => '80',
				],
				'selectors' => [
					'{{WRAPPER}} .button__icon img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .button__icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'icon_image_filters',
				'selector'  => '{{WRAPPER}} .button__icon img',
				'condition' => [
					'icon_type' => ['image_icon']
				],
			]
		);

		// Icon Color
		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .button__icon' => 'color: {{VALUE}};',
				],
			]
		);

		// Icon Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'icon_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .button__icon',
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'icon_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .button__icon',
			]
		);

		// Icon Radius
		$this->add_control(
			'icon_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .button__icon' => 'overflow:hidden;border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'icon_shadow',
				'selector' => '{{WRAPPER}} .button__icon',
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Width
		$this->add_responsive_control(
			'icon_width',
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
					'{{WRAPPER}} .button__icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Height
		$this->add_responsive_control(
			'icon_height',
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
					'{{WRAPPER}} .button__icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr5',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

		// Icon Display;
		$this->add_responsive_control(
			'icon_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,			
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'None', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .button__icon' => 'display: {{VALUE}};',
				],
			]
		);

		// Icon Alignment
		$this->add_control(
			'icon_align',
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
					'justify' => [
						'title' => __( 'Justify', 'bilalmghl' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .button__icon' => 'text-align: {{VALUE}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr6',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Postion
		$this->add_responsive_control(
			'icon_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'initial',
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .button__icon' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'icon_position_from_left',
			[
				'label'      => __( 'From Left', 'bilalmghl' ),
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
					'{{WRAPPER}} .button__icon' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'icon_position_from_right',
			[
				'label'      => __( 'From Right', 'bilalmghl' ),
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
					'{{WRAPPER}} .button__icon' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'icon_position_from_top',
			[
				'label'      => __( 'From Top', 'bilalmghl' ),
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
					'{{WRAPPER}} .button__icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'icon_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'bilalmghl' ),
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
					'{{WRAPPER}} .button__icon' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);

		// Icon Transition
		$this->add_control(
			'icon_transition',
			[
				'label'      => __( 'Transition', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .button__icon,{{WRAPPER}} .button__icon img' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr7',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Margin
		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .button__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr8',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Padding
		$this->add_responsive_control(
			'icon_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .button__icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .button__icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_hover_tab',
			[
				'label' => __( 'Hover', 'bilalmghl' ),
			]
		);

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'hover_icon_image_filters',
				'selector'  => '{{WRAPPER}} .bilalmghl__btn:hover .button__icon img',
				'condition' => [
					'icon_type' => ['image_icon']
				],
			]
		);

		// Box Hover Icon Color
		$this->add_control(
			'hover_icon_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover .button__icon, {{WRAPPER}} :focus .button__icon' => 'color: {{VALUE}};',
				],
			]
		);

		// Box Hover Icon Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_icon_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover .button__icon,{{WRAPPER}} :focus .button__icon',
			]
		);	

		// Icon Hr
		$this->add_control(
			'icon_hr4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_icon_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover .button__icon,{{WRAPPER}} .bilalmghl__btn:hover .button__icon',
			]
		);

		// Icon Radius
		$this->add_control(
			'hover_icon_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:hover .button__icon' => 'overflow:hidden;border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_icon_shadow',
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover .button__icon',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			ICON STYLE END
		-----------------------------*/


		/*----------------------------
			TITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Title Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .button__title',
			]
		);

		// Display;
		$this->add_responsive_control(
			'title_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,			
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'None', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .button__title' => 'display: {{VALUE}};',
				],
			]
		);

		// Title Color
		$this->add_control(
			'title_text_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .button__title' => 'color: {{VALUE}};',
				],
			]
		);

		// Box Hover Title Color
		$this->add_control(
			'box_hover_title_color',
			[
				'label'     => __( 'Box Hover Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover .button__title,{{WRAPPER}} .bilalmghl__btn:focus .button__title' => 'color: {{VALUE}};',
				],
			]
		);

		// Title Margin
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .button__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			TITLE STYLE END
		-----------------------------*/

		/*----------------------------
			BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __( 'Button', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'button_tab_style' );
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => __( 'Normal', 'bilalmghl' ),
			]
		);

		// Button Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .bilalmghl__btn',
			]
		);

		// Before Display;
		$this->add_responsive_control(
			'button_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn' => 'display: {{VALUE}};',
				],
			]
		);

		// Button Color
		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} a.bilalmghl__btn, {{WRAPPER}} .bilalmghl__btn' => 'color: {{VALUE}};',
				],
			]
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'button_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn',
			]
		);

		// Button Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'button_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .bilalmghl__btn',
			]
		);

		// Button Radius
		$this->add_control(
			'button_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Button Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'button_shadow',
				'selector' => '{{WRAPPER}} .bilalmghl__btn',
			]
		);

		// Align
		$this->add_responsive_control(
			'button_align',
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
					'justify' => [
						'title' => __( 'Justify', 'bilalmghl' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Button Hr
		$this->add_control(
			'button_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Button Width
		$this->add_responsive_control(
			'button_width',
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
					'{{WRAPPER}} .bilalmghl__btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Height
		$this->add_responsive_control(
			'button_height',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Hr
		$this->add_control(
			'button_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Button Margin
		$this->add_responsive_control(
			'button_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Padding
		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => __( 'Hover', 'bilalmghl' ),
			]
		);

		// Button Hover Color
		$this->add_control(
			'hover_button_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover, {{WRAPPER}} a.bilalmghl__btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		// Button Hover BG
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_button_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover,{{WRAPPER}} .bilalmghl__btn:focus',
			]
		);

		$this->add_control(
			'button_hidding',
			[
				'label'     => __( 'Button Hover Animated Background', 'bilalmghl' ),
				'type'      =>Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Button Hover Animate BG
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'animate_hover_button_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:before,{{WRAPPER}} .ripple__btn span.repples',
			]
		);

		// Button Radius
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_button_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover,{{WRAPPER}} .bilalmghl__btn:focus',
			]
		);

		// Button Hover Radius
		$this->add_control(
			'hover_button_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Hover Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_button_shadow',
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover',
			]
		);

		// Button Hover Animation
		$this->add_control(
			'button_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'bilalmghl' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BUTTON STYLE END
		-----------------------------*/

		/*----------------------------
			BOX BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'box_before_after_style_section',
			[
				'label' => __( 'Before / After', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'before_after_tab_style' );
		$this->start_controls_tab(
			'before_tab',
			[
				'label' => __( 'BEFORE', 'bilalmghl' ),
			]
		);

		// Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'before_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:before',
			]
		);

		// Before Display;
		$this->add_responsive_control(
			'before_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Before Postion
		$this->add_responsive_control(
			'before_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'before_position_from_left',
			[
				'label'      => __( 'From Left', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:before' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'before_position_from_right',
			[
				'label'      => __( 'From Right', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:before' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'before_position_from_top',
			[
				'label'      => __( 'From Top', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:before' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'before_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Before Align
		$this->add_responsive_control(
			'before_align',
			[
				'label'   => __( 'Alignment', 'bilalmghl' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'text-align:left' => [
						'title' => __( 'Left', 'bilalmghl' ),
						'icon'  => 'fa fa-align-left',
					],
					'margin: 0 auto' => [
						'title' => __( 'Center', 'bilalmghl' ),
						'icon'  => 'fa fa-align-center',
					],
					'float:right' => [
						'title' => __( 'Right', 'bilalmghl' ),
						'icon'  => 'fa fa-align-right',
					],
					'text-align:justify' => [
						'title' => __( 'Justify', 'bilalmghl' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Before Width
		$this->add_responsive_control(
			'before_width',
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
					'{{WRAPPER}} .bilalmghl__btn:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Height
		$this->add_responsive_control(
			'before_height',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Opacity
		$this->add_control(
			'before_opacity',
			[
				'label' => __( 'Opacity', 'bilalmghl' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'before_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .bilalmghl__btn:before',
			]
		);
		$this->add_control(
			'before_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'before_shadow',
				'selector' => '{{WRAPPER}} .bilalmghl__btn:before',
			]
		);

		// Before Z-Index
		$this->add_control(
			'before_zindex',
			[
				'label'     => __( 'Z-Index', 'bilalmghl' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Before Margin
		$this->add_responsive_control(
			'before_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Transition
		$this->add_control(
			'before_transition',
			[
				'label'      => __( 'Transition', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 5,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Scale
		$this->add_control(
			'before_scale',
			[
				'label'      => __( 'Scale', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'before_rotate',
			[
				'label'      => __( 'Rotate', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
				],
			]
		);

		/*----------------
			BEFORE HOVER
		-------------------*/
		$this->add_control(
			'before_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'before_hover_hr',
            [
                'label'     => __( 'Before Hover', 'bilalmghl' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

		// Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_before_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover:before',
			]
		);

		// Before Width
		$this->add_responsive_control(
			'hover_before_width',
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
					'{{WRAPPER}} .bilalmghl__btn:hover:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Height
		$this->add_responsive_control(
			'hover_before_height',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Opacity
		$this->add_control(
			'hover_before_opacity',
			[
				'label' => __( 'Opacity', 'bilalmghl' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'hover_before_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:hover:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Scale
		$this->add_control(
			'hover_before_scale',
			[
				'label'      => __( 'Scale', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:before' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'hover_before_rotate',
			[
				'label'      => __( 'Rotate', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'after_tab',
			[
				'label' => __( 'AFTER', 'bilalmghl' ),
			]
		);

		// After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'after_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:after',
			]
		);

		// After Display;
		$this->add_responsive_control(
			'after_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'display: {{VALUE}};',
				],
			]
		);

		// After Postion
		$this->add_responsive_control(
			'after_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'after_position_from_left',
			[
				'label'      => __( 'From Left', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:after' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'after_position_from_right',
			[
				'label'      => __( 'From Right', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:after' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'after_position_from_top',
			[
				'label'      => __( 'From Top', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:after' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'after_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'bilalmghl' ),
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
					'{{WRAPPER}} .bilalmghl__btn:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// After Align
		$this->add_responsive_control(
			'after_align',
			[
				'label'   => __( 'Alignment', 'bilalmghl' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'text-align:left' => [
						'title' => __( 'Left', 'bilalmghl' ),
						'icon'  => 'fa fa-align-left',
					],
					'margin: 0 auto' => [
						'title' => __( 'Center', 'bilalmghl' ),
						'icon'  => 'fa fa-align-center',
					],
					'float:right' => [
						'title' => __( 'Right', 'bilalmghl' ),
						'icon'  => 'fa fa-align-right',
					],
					'text-align:justify' => [
						'title' => __( 'Justify', 'bilalmghl' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// After Width
		$this->add_responsive_control(
			'after_width',
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
					'{{WRAPPER}} .bilalmghl__btn:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Height
		$this->add_responsive_control(
			'after_height',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Opacity
		$this->add_control(
			'after_opacity',
			[
				'label' => __( 'Opacity', 'bilalmghl' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'after_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .bilalmghl__btn:after',
			]
		);

		$this->add_control(
			'after_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'after_shadow',
				'selector' => '{{WRAPPER}} .bilalmghl__btn:after',
			]
		);

		// After Z-Index
		$this->add_control(
			'after_zindex',
			[
				'label'     => __( 'Z-Index', 'bilalmghl' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// After Margin
		$this->add_responsive_control(
			'after_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Transition
		$this->add_control(
			'after_transition',
			[
				'label'      => __( 'Transition', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 5,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Scale
		$this->add_control(
			'after_scale',
			[
				'label'      => __( 'Scale', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'after_rotate',
			[
				'label'      => __( 'Rotate', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
				],
			]
		);

		/*----------------
			AFTER HOVER
		-------------------*/
		$this->add_control(
			'after_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'after_hover_hr',
            [
                'label'     => __( 'After Hover', 'bilalmghl' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

		// After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_after_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bilalmghl__btn:hover:after',
			]
		);

		// after Width
		$this->add_responsive_control(
			'hover_after_width',
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
					'{{WRAPPER}} .bilalmghl__btn:hover:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// after Height
		$this->add_responsive_control(
			'hover_after_height',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// after Opacity
		$this->add_control(
			'hover_after_opacity',
			[
				'label' => __( 'Opacity', 'bilalmghl' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'hover_after_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bilalmghl__btn:hover:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Scale
		$this->add_control(
			'hover_after_scale',
			[
				'label'      => __( 'Scale', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:after' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'hover_after_rotate',
			[
				'label'      => __( 'Rotate', 'bilalmghl' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .bilalmghl__btn:hover:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			BOX BEFORE / AFTER END
		-----------------------------*/
		/*----------------------------
			BUTTON WRAP STYLE
		-----------------------------*/
		$this->start_controls_section(
			'button_wrap_style_section',
			[
				'label' => __( 'Button Wrap', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Before Display;
		$this->add_responsive_control(
			'button_wrap_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}}' => 'display: {{VALUE}};',
				],
			]
		);

		// Align
		$this->add_responsive_control(
			'button_wrap_align',
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
					'justify' => [
						'title' => __( 'Justify', 'bilalmghl' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Button Width
		$this->add_responsive_control(
			'button_wrap_width',
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
					'{{WRAPPER}}' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Height
		$this->add_control(
			'button_wrap_height',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Margin
		$this->add_responsive_control(
			'button_wrap_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Padding
		$this->add_responsive_control(
			'button_wrap_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BUTTON WRAP STYLE END
		-----------------------------*/	
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

		// Button animation
		if ( $settings['button_hover_animation'] ) {
			$button_animation = ' elementor-animation-' . $settings['button_hover_animation'];
		}else{
			$button_animation = '';
		}

		if ( 'yes' == $settings['enable_hover_effect'] ) {
			$button_effect = ' '.$settings['button_effect'].'';
		}else{
			$button_effect = '';
		}

		if ( 'yes' == $settings['enable_text_effect'] ) {
			$button_text_effect = ' '.$settings['button_text_effect'].'';
		}else{
			$button_text_effect = '';
		}

		// Button Class & Link Attr
		/*$this->add_render_attribute( 'download_button_attr', 'class', 'bilalmghl__btn' );
		$this->add_render_attribute( 'download_button_attr', 'class', $button_animation );*/


		$this->add_render_attribute( 'button_style_attr', 'class', 'bilalmghl__dual__button' );
		if ( 'btn__layout__custom' != $settings['button_layout_style'] ) {
			$this->add_render_attribute( 'button_style_attr', 'class', $settings['button_layout_style'] );
		}
		echo '<div '.$this->get_render_attribute_string('button_style_attr').'>';

		foreach ($settings['button_content'] as $settings) :

		// Title
		if ( !empty( $settings['title'] ) ) {
			$title = esc_html( $settings['title'] );
		}else{
			$title = '';
		}

		// Attributes
		$attribute = array();
		if ( ! empty( $settings['button_link']['url'] ) ) {

			$attribute[] = 'class="bilalmghl__btn' . $button_effect . $button_text_effect . $button_animation.' elementor-repeater-item-'.$settings['_id'].'"';
			$attribute[] = 'href="'.$settings['button_link']['url'].'"';
			if ( $settings['button_link']['is_external'] ) {
				$attribute[] = 'target="_blank"';
			}
			if ( $settings['button_link']['nofollow'] ) {
				$attribute[] = 'rel="nofollow"';
			}
		}

		// Button
		if (  !empty($settings['title'] ) && !empty($settings['button_link'] )  ) {
			$button = '<a '.implode(' ', $attribute ).'><div class="button__title">'. $title .'</div></a>';
		}else{
			$button = '';
		}

		// Icon Condition
		if ( 'yes' == $settings['show_icon'] ) {

			if ( 'font_icon' == $settings['icon_type'] && !empty( $settings['font_icon'] ) ) {

				if (  'left' == $settings['button_icon_align'] ) {

					$button = '<a '.implode(' ', $attribute ).'>
						<div class="button__icon bilalmghl__btn_icon_left">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>
						<div class="button__title">'. $title .'</div>
					</a>';

				}elseif( 'right' == $settings['button_icon_align'] ){

					$button = '<a '.implode(' ', $attribute ).'>
						<div class="button__title">'. $title .'</div>
						<div class="button__icon bilalmghl__btn_icon_right">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>
					</a>';
				}

			}elseif( 'image_icon' == $settings['icon_type'] && !empty( $settings['image_icon'] ) ){

				$icon_array = $settings['image_icon'];
				$icon_link = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );

				if (  'left' == $settings['button_icon_align'] ) {

					$button = '<a '.implode(' ', $attribute ).'>
						<div class="button__icon bilalmghl__btn_icon_left"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>
						<div class="button__title">'. $title .'</div>
					</a>';

				}elseif( 'right' == $settings['button_icon_align'] ){

					$button = '<a '.implode(' ', $attribute ).'>
						<div class="button__title">'. $title .'</div>
						<div class="button__icon bilalmghl__btn_icon_right"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>
					</a>';
				}
			}
		}

		echo''.( isset( $button ) ? $button : '' ).'';

		endforeach;
		echo '</div>';
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Dual_Button() );