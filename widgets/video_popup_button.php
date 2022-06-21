<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class bilalmghl_Video_Button extends Widget_Base {

	public function get_name() {
		return 'bilalmghl_Video_Button';
	}

	public function get_title() {
		return __( 'Ul Video Popup Button', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-youtube';
	}

	public function get_categories() {
		return array('bilalmghl-addons');
	}

	public function get_script_depends() {
		return[
			'modal-video',
			'bilalmghl-core',
		];
	}

	public function get_style_depends() {
		return[
			'modal-video',
		];
	}

	public function get_keywords() {
        return[
            'video',
            'video popup',
            'popup button',
            'video button',
        ];
    }

	public static function button_layout_style(){
		return [
			'button__layout__1'      => 'Button Style 1',
			'button__layout__2'      => 'Button Style 2',
			'button__layout__custom' => 'Custom Style',
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
					'default' => 'button__layout__1',
					'options' => self::button_layout_style(),
				]
			);

			// Type
			$this->add_control(
				'get_video_from',
				[
					'label'   => __( 'Get Video Id From', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'youtube',
					'options' => [
						'youtube'      => __('YouTube', 'bilalmghl'),
						'vimeo'      => __('Vimeo', 'bilalmghl'),
					]
				]
			);

			// Button Link
			$this->add_control(
				'youtube_video_id',
				[
					'label'         => __( 'Youtube Video Id', 'bilalmghl' ),
					'type'          => Controls_Manager::TEXT,
					'show_external' => true,
					'default'       => '84eiDiiLg2Y',
					'placeholder' => 'pWOv9xcoMeY',
					'condition' => [
						'get_video_from' => 'youtube',
					],
				]
			);

			// Button Link
			$this->add_control(
				'vimeo_video_id',
				[
					'label'         => __( 'Vimeo Video Id', 'bilalmghl' ),
					'type'          => Controls_Manager::TEXT,
					'show_external' => true,
					'default'       => '123051260',
					'condition' => [
						'get_video_from' => 'vimeo',
					],
				]
			);

			// Title
			$this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Title', 'bilalmghl' ),
					'default'     => __( 'Watch Video', 'bilalmghl' ),
				]
			);


			// Subtitle
			$this->add_control(
				'subtitle',
				[
					'label'       => __( 'Subtitle', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Subtitle', 'bilalmghl' ),
				]
			);

			// Subtitle Position
			$this->add_control(
				'subtitle_position',
				[
					'label'   => __( 'Subtitle Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'after_title',
					'options' => [
						'before_title' => __( 'Before title', 'bilalmghl' ),
						'after_title'  => __( 'After Title', 'bilalmghl' ),
					],
					'condition' => [
						'subtitle!' => '',
					]
				]
			);

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
				]
			);

			// Icon Type
			$this->add_control(
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

			// Font Icon
			$this->add_control(
				'font_icon',
				[
					'label'     => __( 'Font Icons', 'bilalmghl' ),
					'type'      => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-play',
                        'library' => 'solid',
                    ],
					'condition' => [
						'icon_type' => 'font_icon',
						'show_icon' => 'yes',
					],
				]
			);

			// Image Icon
			$this->add_control(
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

			// Button Icon Align
			$this->add_control(
				'button_icon_align',
				[
					'label'   => __( 'Icon Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'left',
					'options' => [
						'left'  => __( 'Before', 'bilalmghl' ),
						'right' => __( 'After', 'bilalmghl' ),
					],
					'condition' => [
						'show_icon' => 'yes',
					],
				]
			);

			// Button Icon Margin
			$this->add_control(
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
						'{{WRAPPER}} .video__popup__button .video__button_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .video__popup__button .video__button_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
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
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'      => 'icon_typography',
					'selector'  => '{{WRAPPER}} .button__icon',
					'condition' => [
						'icon_type' => ['font_icon']
					],
				]
			);
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
					'condition' => [
						'icon_type' => ['image_icon', 'font_icon']
					],
				]
			);
			$this->add_control(
				'icon_hr1',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			$this->start_controls_tabs( 'icon_tab_style' );
				$this->start_controls_tab(
					'icon_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);

					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'icon_image_filters',
							'selector'  => '{{WRAPPER}} .button__icon img',
							'condition' => [
								'icon_type' => ['image_icon']
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'default'   => '',
							'selectors' => [
								'{{WRAPPER}} .button__icon' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .button__icon,{{WRAPPER}} .button__icon:before',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'icon_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .button__icon',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .button__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'icon_shadow',
							'selector' => '{{WRAPPER}} .button__icon',
						]
					);
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
							'separator' => 'before',
						]
					);
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
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .button__icon' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
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
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_position',
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
								'{{WRAPPER}} .button__icon' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
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
							'separator' => 'before',
						]
					);
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
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .button__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'hover_icon_image_filters',
							'selector'  => '{{WRAPPER}} .video__popup__button:hover .button__icon img',
							'condition' => [
								'icon_type' => ['image_icon']
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .video__popup__button:hover .button__icon, {{WRAPPER}} :focus .button__icon' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .video__popup__button:hover .button__icon,{{WRAPPER}} .video__popup__button:hover .button__icon:before',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_icon_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .video__popup__button:hover .button__icon,{{WRAPPER}} .video__popup__button:hover .button__icon',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_icon_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .video__popup__button:hover .button__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_icon_shadow',
							'selector' => '{{WRAPPER}} .video__popup__button:hover .button__icon',
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
					'{{WRAPPER}} .video__popup__button:hover .button__title,{{WRAPPER}} .video__popup__button:focus .button__title' => 'color: {{VALUE}};',
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
			SUBTITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_style_section',
			[
				'label' => __( 'Subtitle', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .button__subtitle',
			]
		);

		// Subtitle Color
		$this->add_control(
			'subtitle_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button__subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Subtitle Color
		$this->add_control(
			'box_hover_subtitle_color',
			[
				'label'  => __( 'Box Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video__popup__button:hover .button__subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		// Subtitle Margin
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .button__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SUBTITLE STYLE END
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

		// Button Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .video__popup__button',
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
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .video__popup__button' => 'display: {{VALUE}};',
				],
			]
		);

		// Button Hr
		$this->add_control(
			'hr50',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);


		$this->start_controls_tabs( 'button_tab_style' );
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => __( 'Normal', 'bilalmghl' ),
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
					'{{WRAPPER}} a.video__popup__button, {{WRAPPER}} .video__popup__button' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .video__popup__button',
			]
		);

		// Button Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'button_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .video__popup__button',
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
					'{{WRAPPER}} .video__popup__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Button Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'button_shadow',
				'selector' => '{{WRAPPER}} .video__popup__button',
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
					'{{WRAPPER}} .video__popup__button' => 'text-align: {{VALUE}};',
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
		$this->add_control(
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
					'{{WRAPPER}} .video__popup__button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Height
		$this->add_control(
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
					'{{WRAPPER}} .video__popup__button' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover, {{WRAPPER}} a.video__popup__button:focus' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .video__popup__button:hover,{{WRAPPER}} .video__popup__button:focus',
			]
		);	

		// Button Radius
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_button_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .video__popup__button:hover,{{WRAPPER}} .video__popup__button:focus',
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
					'{{WRAPPER}} .video__popup__button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Hover Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_button_shadow',
				'selector' => '{{WRAPPER}} .video__popup__button:hover',
			]
		);

		// Button Hover Animation
		$this->add_control(
			'button_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'bilalmghl' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .video__popup__button:hover',
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
				'selector' => '{{WRAPPER}} .video__popup__button:before',
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
					'{{WRAPPER}} .video__popup__button:before' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => '{{VALUE}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'before_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .video__popup__button:before',
			]
		);
		$this->add_control(
			'before_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .video__popup__button:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'before_shadow',
				'selector' => '{{WRAPPER}} .video__popup__button:before',
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
					'{{WRAPPER}} .video__popup__button:before' => 'z-index: {{SIZE}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:before' => 'transition: {{SIZE}}s;',
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
					'{{WRAPPER}} .video__popup__button:before' => 'transform: scale({{SIZE}}{{UNIT}});',
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
					'{{WRAPPER}} .video__popup__button:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
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
				'selector' => '{{WRAPPER}} .video__popup__button:hover:before',
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
					'{{WRAPPER}} .video__popup__button:hover:before' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover:before' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover:before' => 'opacity: {{SIZE}};',
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
					'{{WRAPPER}} .video__popup__button:hover:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover:before' => 'transform: scale({{SIZE}}{{UNIT}});',
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
					'{{WRAPPER}} .video__popup__button:hover:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
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
				'selector' => '{{WRAPPER}} .video__popup__button:after',
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
					'{{WRAPPER}} .video__popup__button:after' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => '{{VALUE}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'after_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .video__popup__button:after',
			]
		);

		$this->add_control(
			'after_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .video__popup__button:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'after_shadow',
				'selector' => '{{WRAPPER}} .video__popup__button:after',
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
					'{{WRAPPER}} .video__popup__button:after' => 'z-index: {{SIZE}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:after' => 'transition: {{SIZE}}s;',
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
					'{{WRAPPER}} .video__popup__button:after' => 'transform: scale({{SIZE}}{{UNIT}});',
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
					'{{WRAPPER}} .video__popup__button:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
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
				'selector' => '{{WRAPPER}} .video__popup__button:hover:after',
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
					'{{WRAPPER}} .video__popup__button:hover:after' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover:after' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover:after' => 'opacity: {{SIZE}};',
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
					'{{WRAPPER}} .video__popup__button:hover:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .video__popup__button:hover:after' => 'transform: scale({{SIZE}}{{UNIT}});',
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
					'{{WRAPPER}} .video__popup__button:hover:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			BOX BEFORE / AFTER END
		-----------------------------*/
		
	}
	
	protected function render() {

		$settings  = $this->get_settings_for_display();

		// Button animation
		if ( $settings['button_hover_animation'] ) {
			$button_animation = 'elementor-animation-' . $settings['button_hover_animation'];
		}else{
			$button_animation = '';
		}

		$random_id  = rand(5655,5874);
		$parse_data = array(
			'random_id'    => $random_id,
			'channel_type' => $settings['get_video_from'],
		);
		$this->add_render_attribute( 'video_button_attr', 'data-value', wp_json_encode( $parse_data ) );		
		$this->add_render_attribute( 'video_button_attr', 'id', 'video__popup__button'.$random_id );

		if ( 'youtube' == $settings['get_video_from'] ) {
			if ( ! empty( $settings['youtube_video_id'] ) ) {
				$this->add_render_attribute( 'video_button_attr', 'data-video-id', $settings['youtube_video_id']);
			}
		}elseif ( 'vimeo' == $settings['get_video_from'] ) {
			if ( ! empty( $settings['vimeo_video_id'] ) ) {
				$this->add_render_attribute( 'video_button_attr', 'data-video-id', $settings['vimeo_video_id']);
			}
		}

		if ( 'button__layout__custom' != $settings['button_layout_style'] ) {
			$this->add_render_attribute( 'video_button_attr', 'class', $settings['button_layout_style'] );
		}
		// Button Class & Link Attr
		$this->add_render_attribute( 'video_button_attr', 'class', 'video__popup__button' );
		$this->add_render_attribute( 'video_button_attr', 'class', $button_animation );


		// Title
		if ( !empty( $settings['title'] ) ) {
			$title = '<span class="button__title">'.esc_html( $settings['title'] ).'</span>';
		}else{
			$title = '';
		}

		// Subtitle
		if ( !empty( $settings['subtitle'] ) ) {
			$subtitle = '<span class="button__subtitle">'.esc_html( $settings['subtitle'] ).'</span>';
		}else{
			$subtitle = '';
		}

		// Title Condition
		if ( !empty($settings['subtitle_position']) ) {
			if ( 'before_title' == $settings['subtitle_position'] ) {
				$title_subtitle = $subtitle . $title;
			}elseif( 'after_title' == $settings['subtitle_position'] ){
				$title_subtitle = $title . $subtitle;
			}elseif( empty($settings['subtitle']) ){
				$title_subtitle = $title . $subtitle;
			}
		}else{
			$title_subtitle = $title . $subtitle;
		}

		// Button
		if (  !empty($settings['title'] ) || !empty($settings['youtube_video_id']) || !empty($settings['vimeo_video_id'] )  ) {
			$button = '<div '.$this->get_render_attribute_string( 'video_button_attr' ).'>'. $title_subtitle .'</div>';
		}else{
			$button = '';
		}

		// Icon Condition
		if ( 'yes' == $settings['show_icon'] ) {

			if ( 'font_icon' == $settings['icon_type'] && !empty( $settings['font_icon'] ) ) {

				if (  'left' == $settings['button_icon_align'] ) {

					$button = '<div '.$this->get_render_attribute_string( 'video_button_attr' ).'>
						<div class="button__icon video__button_icon_left">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>
						<div class="button__text">'. $title_subtitle .'</div>
					</div>';

				}elseif( 'right' == $settings['button_icon_align'] ){

					$button = '<div '.$this->get_render_attribute_string( 'video_button_attr' ).'>
						<div class="button__text">'. $title_subtitle .'</div>
						<div class="button__icon video__button_icon_right">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>
					</div>';
				}

			}elseif( 'image_icon' == $settings['icon_type'] && !empty( $settings['image_icon'] ) ){

				$icon_array = $settings['image_icon'];
				$icon_link = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );

				if (  'left' == $settings['button_icon_align'] ) {

					$button = '<div '.$this->get_render_attribute_string( 'video_button_attr' ).'>
						<div class="button__icon video__button_icon_left"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>
						<div class="button__text">'. $title_subtitle .'</div>
					</div>';

				}elseif( 'right' == $settings['button_icon_align'] ){

					$button = '<div '.$this->get_render_attribute_string( 'video_button_attr' ).'>
						<div class="button__text">'. $title_subtitle .'</div>
						<div class="button__icon video__button_icon_right"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>
					</div>';
				}
			}
		}

		echo''.( isset( $button ) ? $button : '' ).'';
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Video_Button() );