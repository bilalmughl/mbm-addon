<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class bilalmghl_Box_Widget extends Widget_Base {

	public function get_name() {
		return 'bilalmghl_Box_Widget';
	}

	public function get_title() {
		return __( 'Sevices Box', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-icon-box-bg';
	}

	public function get_categories() {
		return array('bilalmghl-addons');
	}

	public function get_keywords() {
        return[
            'box',
            'service box',
			'service',
			'features box',
			'features'
        ];
    }

    public static function box_layout_style(){
        return [
            'sevices-thumb-1'      => 'Box Style 1',
            'sevices-thumb-2'     => 'Box Style 2',
            'sevices-thumb-custom' => 'Custom Style',
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
				'box_layout_style',
				[
					'label'   => __( 'Box Type', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'sevices-thumb-1',
					'options' => self::box_layout_style(),
				]
			);

			// BOX BACKGROUND ICON TOGGLE
			$this->add_control(
				'show_box_bg_text_or_icon',
				[
					'label'        => __( 'Show Box BG Icon / Text ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'bilalmghl' ),
					'label_off'    => __( 'Hide', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'		=> 'before',
				]
			);

			// Icon Type
			$this->add_control(
				'box_bg_icon_type',
				[
					'label'   => __( 'Icon Type', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'font_icon',
					'options' => [
						'font_icon'  => __( 'Font Icon', 'bilalmghl' ),
						'image_icon' => __( 'Image Icon', 'bilalmghl' ),
						'simple_text' => __( 'Simple Text', 'bilalmghl' ),
					],
					'condition' => [
						'show_box_bg_text_or_icon' => 'yes',
					],
				]
			);

			// Font Icon
			$this->add_control(
				'box_bg_font_icon',
				[
					'label'     => __( 'Font Icons', 'bilalmghl' ),
					'type'      => Controls_Manager::ICONS,
					'default' => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
						'box_bg_icon_type' => 'font_icon',
						'show_box_bg_text_or_icon' => 'yes',
					],
				]
			);

			// Image Icon
			$this->add_control(
				'box_bg_image_icon',
				[
					'label'   => __( 'Image Icon', 'bilalmghl' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'box_bg_icon_type' => 'image_icon',
						'show_box_bg_text_or_icon' => 'yes',
					],
				]
			);

			// Text Bg
			$this->add_control(
				'box_bg_text',
				[
					'label'   => __( 'Image Icon', 'bilalmghl' ),
					'type'    => Controls_Manager::TEXT,
					'placeholder' => __( '01', 'bilalmghl' ),
					'condition' => [
						'box_bg_icon_type' => 'simple_text',
						'show_box_bg_text_or_icon' => 'yes',
					],
				]
			);

			// Icon Toggle
			$this->add_control(
				'show_box_image',
				[
					'label'        => __( 'Show Box Image ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'bilalmghl' ),
					'label_off'    => __( 'Hide', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'		=> 'before',
				]
			);

			// Image 
			$this->add_control(
				'box_image',
				[
					'label'   => __( 'Box Image', 'bilalmghl' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'show_box_image' => 'yes',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name'      => 'box_image_size',
					'exclude'   => [ 'custom' ],
					'default'   => 'large',
					'condition' => [
						'show_box_image' => 'yes',
					],
				]
			);
			$this->add_control(
				'box_image_postion',
				[
					'label'   => __( 'Image Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'before',
					'options' => [
						'before'  => __( 'Before Content', 'bilalmghl' ),
						'after' => __( 'After Content', 'bilalmghl' ),
					],
					'condition' => [
						'show_box_image' => 'yes',
					],
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
					'separator'		=> 'before',
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
						'value'   => 'fas fa-star',
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

			$this->add_control(
				'show_hover_icon',
				[
					'label'        => __( 'Show Hover Icon ?', 'beaddon' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'beaddon' ),
					'label_off'    => __( 'Hide', 'beaddon' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'    => 'before',
				]
			);
			$this->add_control(
				'hover_font_icon',
				[
					'label'       => __( 'Hover Font Icons', 'beaddon' ),
					'type'        => Controls_Manager::ICONS,
					'label_block' => true,
					'default' => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
					'condition'   => [
						'icon_type'       => 'font_icon',
						'show_icon'       => 'yes',
						'show_hover_icon' => 'yes',
					],
				]
			);
			$this->add_control(
				'hover_image_icon',
				[
					'label'     => __( 'Hover Image Icon', 'beaddon' ),
					'type'      => Controls_Manager::MEDIA,
					'condition' => [
						'icon_type'       => 'image_icon',
						'show_icon'       => 'yes',
						'show_hover_icon' => 'yes',
					],
				]
			);

			// Title
			$this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Enter Your Title', 'bilalmghl' ),
					'separator'		=> 'before',
				]
			);

			// Title Tag
			$this->add_control(
				'title_tag',
				[
					'label'   => __( 'Title HTML Tag', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'options' => [
						'h1'   => 'H1',
						'h2'   => 'H2',
						'h3'   => 'H3',
						'h4'   => 'H4',
						'h5'   => 'H5',
						'h6'   => 'H6',
						'div'  => 'div',
						'span' => 'span',
						'p'    => 'p',
					],
					'default'   => 'h3',
					'condition' => [
						'title!' => '',
					],
				]
			);

			// Title Link
			$this->add_control(
				'title_link',
				[
					'label'         => __( 'Linked Title ?', 'bilalmghl' ),
					'type'          => Controls_Manager::URL,
					'placeholder'   => __( 'https://your-link.com', 'bilalmghl' ),
					'show_external' => true,
					'default'       => [
						'url'         => '',
						'is_external' => false,
						'nofollow'    => false,
					],
					'condition' => [
						'title!' => '',
					],
				]
			);

			// Subtitle
			$this->add_control(
				'subtitle',
				[
					'label'       => __( 'Subtitle', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Subtitle', 'bilalmghl' ),
					'separator'		=> 'before',
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

			// Description
			$this->add_control(
				'description',
				[
					'label'       => __( 'Description', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXTAREA,
					'placeholder' => __( 'Description.', 'bilalmghl' ),
					'separator'		=> 'before',
				]
			);

			// Button Toggle
			$this->add_control(
				'show_button',
				[
					'label'        => __( 'Show Button ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'bilalmghl' ),
					'label_off'    => __( 'Hide', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'		=> 'before',
				]
			);

			// Button Title
			$this->add_control(
				'button_text',
				[
					'label'       => __( 'Button Title', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Button Text', 'bilalmghl' ),
					'condition'   => ['show_button' => 'yes'],
				]
			);

			// Button Link
			$this->add_control(
				'button_link',
				[
					'label'         => __( 'Button Link', 'bilalmghl' ),
					'type'          => Controls_Manager::URL,
					'placeholder'   => __( 'https://your-link.com', 'bilalmghl' ),
					'show_external' => true,
					'default'       => [
						'url'         => '',
						'is_external' => false,
						'nofollow'    => false,
					],
					'condition' => ['show_button' => 'yes'],
				]
			);

			// Button Icon Picker
			$this->add_control(
				'button_icon',
				[
					'label'       => __( 'Icon', 'bilalmghl' ),
					'type'        => Controls_Manager::ICONS,
					'label_block' => true,
					'condition'   => ['show_button' => 'yes'],
				]
			);

			// Button Icon Align
			$this->add_control(
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
						'button_icon!' => '',
						'show_button' => 'yes',
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
						'button_icon!' => '',
						'show_button' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .btn .btn_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .btn .btn_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();
		/*********************************
		 		STYLE SECTION
		**********************************/
		/*----------------------------
			ICON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'icon_style_section',
			[
				'label' => __( 'Icon', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);
			// Icon Typgraphy
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'      => 'icon_typography',
					'selector'  => '{{WRAPPER}} .icon-box',
					'condition' => [
						'icon_type' => ['font_icon']
					],
				]
			);

			// Icon Image Size
			$this->add_responsive_control(
				'icon_image_size',
				[
					'label'      => __( 'Icon Image Size (Width)', 'beaddon' ),
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
						'{{WRAPPER}} .icon-box img' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .icon-box svg' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_type' => ['image_icon','font_icon']
					],
				]
			);

			// Icon Image Size
			$this->add_responsive_control(
				'icon_image_size_height',
				[
					'label'      => __( 'Icon Image Size (Height)', 'beaddon' ),
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
						'{{WRAPPER}} .icon-box img' => 'max-height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .icon-box svg' => 'max-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_type' => ['image_icon','font_icon']
					],
				]
			);

            $this->add_responsive_control(
                'icon_content_custom_css',
                [
                    'label'     => esc_html__( 'Icon Inner Custom CSS', 'beaddon' ),
                    'type'      => Controls_Manager::CODE,
                    'rows'      => 20,
                    'language'  => 'css',
                    'selectors' => [
						'{{WRAPPER}} .icon-box img' => '{{VALUE}};',
						'{{WRAPPER}} .icon-box svg' => '{{VALUE}};',
						'{{WRAPPER}} .icon-box i' => '{{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

			// Icon Hr
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
					// Icon Image Filter
					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'icon_image_filters',
							'selector'  => '{{WRAPPER}} .icon-box img',
							'condition' => [
								'icon_type' => ['image_icon']
							],
							'separator' => 'before',
						]
					);

					// Icon Color
					$this->add_control(
						'icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .icon-box' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);

					// Icon Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .icon-box',
						]
					);

					// Icon Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'icon_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .icon-box',
							'separator' => 'before',
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
								'{{WRAPPER}} .icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
					// Icon Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'icon_shadow',
							'selector' => '{{WRAPPER}} .icon-box',
						]
					);

					// Icon Width
					$this->add_control(
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
								'{{WRAPPER}} .icon-box' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);

					// Icon Height
					$this->add_control(
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
								'{{WRAPPER}} .icon-box' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					// Icon Display;
					$this->add_responsive_control(
						'icon_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
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
								'{{WRAPPER}} .icon-box' => 'text-align: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					// Icon Postion
					$this->add_responsive_control(
						'icon_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
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
								'{{WRAPPER}} .icon-box' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
							],
							'separator' => 'before',
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
								'{{WRAPPER}} .icon-box' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .icon-box' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .icon-box' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .icon-box,{{WRAPPER}} .icon-box img' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
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
								'{{WRAPPER}} .icon-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'hover_icon_margin',
						[
							'label'      => __( 'Hover Icon Margin', 'beaddon' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box .hover_image_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .icon-box .hover_font_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
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
								'{{WRAPPER}} .icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'main_icon_opacity',
						[
							'label'      => __( 'Main Icon Opacity', 'beaddon' ),
							'type'       => Controls_Manager::SLIDER,
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1,
									'step' => 0.1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb .icon-box i' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .services-thumb .icon-box img' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'box_hover_main_icon_opacity',
						[
							'label'      => __( 'Box Hover Main Icon Opacity', 'beaddon' ),
							'type'       => Controls_Manager::SLIDER,
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1,
									'step' => 0.1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:hover .icon-box i' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .services-thumb:hover .icon-box img' => 'opacity: {{SIZE}};',
							],
						]
					);
					$this->add_control(
						'hover_icon_opacity',
						[
							'label'      => __( 'Hover Icon Opacity', 'beaddon' ),
							'type'       => Controls_Manager::SLIDER,
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1,
									'step' => 0.1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb .icon-box i.hover_font_icon' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .services-thumb .icon-box img.hover_image_icon' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_box_hover_icon_opacity',
						[
							'label'      => __( 'Box Hover : Hover Icon Opacity', 'beaddon' ),
							'type'       => Controls_Manager::SLIDER,
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1,
									'step' => 0.1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:hover .icon-box i.hover_font_icon' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .services-thumb:hover .icon-box img.hover_image_icon' => 'opacity: {{SIZE}};',
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
							'selector'  => '{{WRAPPER}} :hover .icon-box img',
							'condition' => [
								'icon_type' => ['image_icon']
							],
							'separator' => 'before',
						]
					);

					// Box Hover Icon Color
					$this->add_control(
						'hover_icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} :hover .icon-box, {{WRAPPER}} :focus .icon-box' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);

					// Box Hover Icon Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} :hover .icon-box,{{WRAPPER}} :focus .icon-box',
						]
					);

					// Icon Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_icon_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} :hover .icon-box,{{WRAPPER}} :hover .icon-box',
							'separator' => 'before',
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
								'{{WRAPPER}} :hover .icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					// Icon Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_icon_shadow',
							'selector' => '{{WRAPPER}} :hover .icon-box',
						]
					);

					// Icon Hover Animation
					$this->add_control(
						'icon_hover_animation',
						[
							'label'    => __( 'Hover Animation', 'bilalmghl' ),
							'type'     => Controls_Manager::HOVER_ANIMATION,
							'selector' => '{{WRAPPER}} :hover .icon-box',
							'separator' => 'before',
						]
					);
					$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			ICON STYLE END
		-----------------------------*/

		/*----------------------------
			ICON BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'icon_before_after_style_section',
			[
				'label' => __( 'Icon ( Before / After )', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);
			$this->start_controls_tabs( 'icon_before_after_tab_style' );
				$this->start_controls_tab(
					'icon_before_tab',
					[
						'label' => __( 'BEFORE', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'icon_before_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .icon-box:before',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_before_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box:before' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_before_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box:before' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_before_position_from_left',
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
								'{{WRAPPER}} .icon-box:before' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_before_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_before_position_from_right',
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
								'{{WRAPPER}} .icon-box:before' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'icon_before_position_from_top',
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
								'{{WRAPPER}} .icon-box:before' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'icon_before_position_from_bottom',
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
								'{{WRAPPER}} .icon-box:before' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'icon_before_align',
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
			                'separator' => 'before',
							'selectors' => [
								'{{WRAPPER}} .icon-box:before' => '{{VALUE}};',
							],
						]
					);
					$this->add_responsive_control(
						'icon_before_width',
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
			                'separator' => 'before',
							'selectors' => [
								'{{WRAPPER}} .icon-box:before' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_responsive_control(
						'icon_before_height',
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
								'{{WRAPPER}} .icon-box:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'icon_before_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .icon-box:before',
			                'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_before_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'icon_before_shadow',
							'selector' => '{{WRAPPER}} .icon-box:before',
						]
					);
					$this->add_responsive_control(
						'icon_before_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_before_opacity',
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
			                'separator' => 'before',
							'selectors' => [
								'{{WRAPPER}} .icon-box:before' => 'opacity: {{SIZE}};',
							],
						]
					);
					$this->add_control(
						'icon_before_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .icon-box:before' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_before_transition',
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
								'{{WRAPPER}} .icon-box:before' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_before_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
						$this->add_control(
							'icon_before_scale',
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
									'{{WRAPPER}} .icon-box:before' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'icon_before_rotate',
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
									'{{WRAPPER}} .icon-box:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{icon_before_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();

					/*----------------
						BEFORE HOVER
					-------------------*/
					$this->add_control(
						'hover_icon_before_hr',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);
			        $this->add_control(
			            'hover_icon_before_heading',
			            [
			                'label'     => __( 'Before Hover', 'bilalmghl' ),
			                'type'      => Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_icon_before_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover .icon-box:before',
						]
					);
					$this->add_responsive_control(
						'hover_icon_before_width',
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
								'{{WRAPPER}} .services-thumb:hover .icon-box:before' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'hover_icon_before_height',
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
								'{{WRAPPER}} .services-thumb:hover .icon-box:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'hover_icon_before_opacity',
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
								'{{WRAPPER}} .services-thumb:hover .icon-box:before' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_icon_before_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover .icon-box:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_icon_before_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);

					$this->start_popover();
						$this->add_control(
							'hover_icon_before_scale',
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
									'{{WRAPPER}} .services-thumb:hover .icon-box:before' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'hover_icon_before_rotate',
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
									'{{WRAPPER}} .services-thumb:hover .icon-box:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{icon_before_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();
				$this->end_controls_tab();
				$this->start_controls_tab(
					'icon_after_tab',
					[
						'label' => __( 'AFTER', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'icon_after_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .icon-box:after',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_after_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box:after' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_after_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box:after' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_after_position_from_left',
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
								'{{WRAPPER}} .icon-box:after' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_after_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_after_position_from_right',
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
								'{{WRAPPER}} .icon-box:after' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'icon_after_position_from_top',
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
								'{{WRAPPER}} .icon-box:after' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'icon_after_position_from_bottom',
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
								'{{WRAPPER}} .icon-box:after' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'icon_after_align',
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
								'{{WRAPPER}} .icon-box:after' => '{{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_after_width',
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
								'{{WRAPPER}} .icon-box:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_after_height',
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
								'{{WRAPPER}} .icon-box:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'icon_after_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .icon-box:after',
			                'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_after_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'icon_after_shadow',
							'selector' => '{{WRAPPER}} .icon-box:after',
						]
					);
					$this->add_responsive_control(
						'icon_after_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_after_opacity',
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
								'{{WRAPPER}} .icon-box:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_after_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .icon-box:after' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_after_transition',
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
								'{{WRAPPER}} .icon-box:after' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'icon_after_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
						$this->add_control(
							'icon_after_scale',
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
									'{{WRAPPER}} .icon-box:after' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'icon_after_rotate',
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
									'{{WRAPPER}} .icon-box:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{icon_after_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();

					/*----------------
						AFTER HOVER
					-------------------*/
					$this->add_control(
						'hover_icon_after_hr',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);
			        $this->add_control(
			            'hover_icon_after_heading',
			            [
			                'label'     => __( 'After Hover', 'bilalmghl' ),
			                'type'      => Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_icon_after_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover .icon-box:after',
						]
					);
					$this->add_responsive_control(
						'hover_icon_after_width',
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
								'{{WRAPPER}} .services-thumb:hover .icon-box:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'hover_icon_after_height',
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
								'{{WRAPPER}} .services-thumb:hover .icon-box:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'hover_icon_after_opacity',
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
								'{{WRAPPER}} .services-thumb:hover .icon-box:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_icon_after_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover .icon-box:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'after_hover_icon_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
						$this->add_control(
							'hover_icon_after_scale',
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
									'{{WRAPPER}} .services-thumb:hover .icon-box:after' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'hover_icon_after_rotate',
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
									'{{WRAPPER}} .services-thumb:hover .icon-box:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{hover_icon_after_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			ICON BEFORE / AFTER END
		-----------------------------*/

		/*----------------------------
			BOX BG ICON TEXXT STYLE
		-----------------------------*/
		$this->start_controls_section(
			'bg_icon_text_style_section',
			[
				'label' => __( 'BG ( Icon / Text )', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'=>[
					'show_box_bg_text_or_icon' => 'yes'
				]
			]
		);
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'      => 'bg_icon_text_typography',
					'selector'  => '{{WRAPPER}} .icon-box-bg',
				]
			);
			$this->add_responsive_control(
				'bg_icon_text_image_size',
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
						'{{WRAPPER}} .icon-box-bg img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'bg_icon_text_hr1',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);
			$this->start_controls_tabs( 'bg_icon_text_tab_style' );
				$this->start_controls_tab(
					'bg_icon_text_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);
					// Icon Image Filter
					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'bg_icon_text_image_filters',
							'selector'  => '{{WRAPPER}} .icon-box-bg img',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'bg_icon_text_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .icon-box-bg' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'bg_icon_text_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .icon-box-bg',
						]
					);
					$this->add_control(
						'bg_icon_text_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'bg_icon_text_shadow',
							'selector' => '{{WRAPPER}} .icon-box-bg',
						]
					);
					$this->add_control(
						'bg_icon_text_width',
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
								'{{WRAPPER}} .icon-box-bg' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'bg_icon_text_height',
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
								'{{WRAPPER}} .icon-box-bg' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box-bg' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'bg_icon_text_align',
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
								'{{WRAPPER}} .icon-box-bg' => 'text-align: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box-bg' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_position_from_left',
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
								'{{WRAPPER}} .icon-box-bg' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'bg_icon_text_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_position_from_right',
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
								'{{WRAPPER}} .icon-box-bg' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'bg_icon_text_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_position_from_top',
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
								'{{WRAPPER}} .icon-box-bg' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'bg_icon_text_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_position_from_bottom',
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
								'{{WRAPPER}} .icon-box-bg' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'bg_icon_text_position!' => ['']
							],
						]
					);
					$this->add_control(
						'bg_icon_text_transition',
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
								'{{WRAPPER}} .icon-box-bg,{{WRAPPER}} .icon-box-bg img' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'bg_icon_text_opacity',
						[
							'label'      => __( 'Opacity', 'bilalmghl' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1,
									'step' => 0.1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 0.1,
							],
							'selectors' => [
								'{{WRAPPER}} .icon-box-bg' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'bg_icon_text_padding',
						[
							'label'      => __( 'Padding', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .icon-box-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				$this->start_controls_tab(
					'bg_icon_text_hover_tab',
					[
						'label' => __( 'Hover', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'hover_bg_icon_text_image_filters',
							'selector'  => '{{WRAPPER}} :hover .icon-box-bg img',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_bg_icon_text_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} :hover .icon-box-bg, {{WRAPPER}} :focus .icon-box-bg' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_bg_icon_text_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} :hover .icon-box-bg,{{WRAPPER}} :focus .icon-box-bg',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_bg_icon_text_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} :hover .icon-box-bg,{{WRAPPER}} :hover .icon-box-bg',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'bg_icon_text_hover_opacity',
						[
							'label'      => __( 'Opacity', 'bilalmghl' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1,
									'step' => 0.1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 0.1,
							],
							'selectors' => [
								'{{WRAPPER}} :hover .icon-box-bg' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BOX BG ICON TEXXT STYLE END
		-----------------------------*/

		/*----------------------------
			BOX BIG IMG
		-----------------------------*/
		$this->start_controls_section(
			'big_img_style_section',
			[
				'label' => __( 'Box Image', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'=>[
					'show_box_image' => 'yes'
				]
			]
		);
			$this->add_group_control(
				Group_Control_Css_Filter:: get_type(),
				[
					'name'      => 'big_img_filters',
					'selector'  => '{{WRAPPER}} .box__big__thumb img',
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'big_img_background',
					'label'    => __( 'Background', 'bilalmghl' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .box__big__thumb',
					'separator' => 'before',
				]
			);
			$this->add_control(
				'big_img_radius',
				[
					'label'      => __( 'Border Radius', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .box__big__thumb,{{WRAPPER}} .box__big__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'big_img_shadow',
					'selector' => '{{WRAPPER}} .box__big__thumb',
				]
			);
			$this->add_responsive_control(
				'big_img_margin',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .box__big__thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'big_img_padding',
				[
					'label'      => __( 'Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .box__big__thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();
		/*----------------------------
			BOX BIG IMG END
		-----------------------------*/

		/*----------------------------
			TITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				],
			]
		);
			$this->start_controls_tabs( 'title_tab_style' );
				$this->start_controls_tab(
					'title_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);
					// Title Color
					$this->add_control(
						'title_text_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .title, {{WRAPPER}} .title a' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					
					// Title Typography
					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
							'name'     => 'title_typography',
							'selector' => '{{WRAPPER}} .title',
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
								'{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();
				$this->start_controls_tab(
					'title_hover_tab',
					[
						'label' => __( 'Hover', 'bilalmghl' ),
					]
				);

					// Title Hover Link Color
					$this->add_control(
						'hover_title_color',
						[
							'label'     => __( 'Link Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .title a:hover, {{WRAPPER}} .title a:focus' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);

					// Box Hover Title Color
					$this->add_control(
						'box_hover_title_color',
						[
							'label'     => __( 'Box Hover Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} :hover .title a, {{WRAPPER}} :focus .title a, {{WRAPPER}} :hover .title' => 'color: {{VALUE}};',
							],
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			TITLE STYLE END
		-----------------------------*/

		/*----------------------------
			TITLE BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'title_before_after_style_section',
			[
				'label' => __( 'Title ( Before / After )', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				],
			]
		);
			$this->start_controls_tabs( 'title_before_after_tab_style' );
				$this->start_controls_tab(
					'title_before_tab',
					[
						'label' => __( 'BEFORE', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'title_before_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .title:before',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_before_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .title:before' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_before_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,			
							'default' => '',	
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .title:before' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_before_position_from_left',
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
								'{{WRAPPER}} .title:before' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_before_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_before_position_from_right',
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
								'{{WRAPPER}} .title:before' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'title_before_position_from_top',
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
								'{{WRAPPER}} .title:before' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'title_before_position_from_bottom',
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
								'{{WRAPPER}} .title:before' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'title_before_align',
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
			                'separator' => 'before',
							'selectors' => [
								'{{WRAPPER}} .title:before' => '{{VALUE}};',
							],
						]
					);
					$this->add_responsive_control(
						'title_before_width',
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
								'{{WRAPPER}} .title:before' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_before_height',
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
								'{{WRAPPER}} .title:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'title_before_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .title:before',
			                'separator' => 'before',
						]
					);
					$this->add_control(
						'title_before_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .title:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'title_before_shadow',
							'selector' => '{{WRAPPER}} .title:before',
						]
					);
					$this->add_responsive_control(
						'title_before_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .title:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_before_opacity',
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
								'{{WRAPPER}} .title:before' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_before_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .title:before' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_before_transition',
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
								'{{WRAPPER}} .title:before' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_before_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
						$this->add_control(
							'title_before_scale',
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
									'{{WRAPPER}} .title:before' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'title_before_rotate',
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
									'{{WRAPPER}} .title:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{title_before_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();

					/*----------------
						BEFORE HOVER
					-------------------*/
					$this->add_control(
						'hover_title_before_hr',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);
			        $this->add_control(
			            'hover_title_before_heading',
			            [
			                'label'     => __( 'Before Hover', 'bilalmghl' ),
			                'type'      => Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_title_before_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover .title:before',
						]
					);
					$this->add_responsive_control(
						'hover_title_before_width',
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
								'{{WRAPPER}} .services-thumb:hover .title:before' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'hover_title_before_height',
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
								'{{WRAPPER}} .services-thumb:hover .title:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'hover_title_before_opacity',
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
								'{{WRAPPER}} .services-thumb:hover .title:before' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_title_before_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover .title:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_title_before_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);

					$this->start_popover();
						$this->add_control(
							'hover_title_before_scale',
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
									'{{WRAPPER}} .services-thumb:hover .title:before' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'hover_title_before_rotate',
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
									'{{WRAPPER}} .services-thumb:hover .title:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{title_before_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();
				$this->end_controls_tab();
				$this->start_controls_tab(
					'title_after_tab',
					[
						'label' => __( 'AFTER', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'title_after_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .title:after',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .title:after' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .title:after' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_position_from_left',
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
								'{{WRAPPER}} .title:after' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_after_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_position_from_right',
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
								'{{WRAPPER}} .title:after' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'title_after_position_from_top',
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
								'{{WRAPPER}} .title:after' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'title_after_position_from_bottom',
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
								'{{WRAPPER}} .title:after' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'title_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'title_after_align',
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
								'{{WRAPPER}} .title:after' => '{{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_width',
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
								'{{WRAPPER}} .title:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_height',
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
								'{{WRAPPER}} .title:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'title_after_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .title:after',
			                'separator' => 'before',
						]
					);
					$this->add_control(
						'title_after_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .title:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'title_after_shadow',
							'selector' => '{{WRAPPER}} .title:after',
						]
					);
					$this->add_responsive_control(
						'title_after_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .title:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_after_opacity',
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
								'{{WRAPPER}} .title:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_after_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .title:after' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_after_transition',
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
								'{{WRAPPER}} .title:after' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'title_after_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
						$this->add_control(
							'title_after_scale',
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
									'{{WRAPPER}} .title:after' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'title_after_rotate',
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
									'{{WRAPPER}} .title:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{title_after_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();

					/*----------------
						AFTER HOVER
					-------------------*/
					$this->add_control(
						'hover_title_after_hr',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);
			        $this->add_control(
			            'hover_title_after_heading',
			            [
			                'label'     => __( 'After Hover', 'bilalmghl' ),
			                'type'      => Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_title_after_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover .title:after',
						]
					);
					$this->add_responsive_control(
						'hover_title_after_width',
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
								'{{WRAPPER}} .services-thumb:hover .title:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'hover_title_after_height',
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
								'{{WRAPPER}} .services-thumb:hover .title:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'hover_title_after_opacity',
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
								'{{WRAPPER}} .services-thumb:hover .title:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_title_after_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover .title:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'after_hover_title_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
						$this->add_control(
							'hover_title_after_scale',
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
									'{{WRAPPER}} .services-thumb:hover .title:after' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
						$this->add_control(
							'hover_title_after_rotate',
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
									'{{WRAPPER}} .services-thumb:hover .title:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{hover_title_after_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			TITLE BEFORE / AFTER END
		-----------------------------*/

		/*----------------------------
			SUBTITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_style_section',
			[
				'label' => __( 'Subtitle', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				],
			]
		);
			// Subtitle Typography
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'subtitle_typography',
					'selector' => '{{WRAPPER}} .subtitle',
				]
			);

			// Subtitle Color
			$this->add_control(
				'subtitle_color',
				[
					'label'  => __( 'Color', 'bilalmghl' ),
					'type'   => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} :hover .subtitle' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
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
				'condition' => [
					'show_button' => 'yes',
				],
			]
		);
			$this->start_controls_tabs( 'button_tab_style' );
				$this->start_controls_tab(
					'button_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'button_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} a.btn, {{WRAPPER}} .btn' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
							'name'     => 'button_typography',
							'selector' => '{{WRAPPER}} .btn',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'button_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .btn',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'button_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .btn',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'button_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'button_shadow',
							'selector' => '{{WRAPPER}} .btn',
						]
					);
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
								'{{WRAPPER}} .btn' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .btn' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_responsive_control(
						'button_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,			
							'default' => '',	
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .btn' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_vertical_position',
						[
							'label'      => __( 'Position Vertical', 'bilalmghl' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px' => [
									'min'  => -1000,
									'max'  => 1000,
									'step' => 1,
								],
								'%' => [
									'min' => -100,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .btn' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_horizontal_position',
						[
							'label'      => __( 'Position Horizontal', 'bilalmghl' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px' => [
									'min'  => -1000,
									'max'  => 1000,
									'step' => 1,
								],
								'%' => [
									'min' => -100,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .btn' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'button_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_padding',
						[
							'label'      => __( 'Padding', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					$this->add_control(
						'hover_button_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .btn:hover, {{WRAPPER}} a.btn:focus, {{WRAPPER}} .btn:focus' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_button_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .btn:hover,{{WRAPPER}} .btn:focus',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_button_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .btn:hover,{{WRAPPER}} .btn:focus',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_button_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_button_shadow',
							'selector' => '{{WRAPPER}} .btn:hover',
						]
					);
					$this->add_control(
						'button_hover_animation',
						[
							'label'    => __( 'Hover Animation', 'bilalmghl' ),
							'type'     => Controls_Manager::HOVER_ANIMATION,
							'selector' => '{{WRAPPER}} .btn:hover',
							'separator' => 'before',
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BUTTON STYLE END
		-----------------------------*/

		/*----------------------------
			BOX STYLE
		-----------------------------*/
		$this->start_controls_section(
			'box_style_section',
			[
				'label' => __( 'Box', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs( 'box_tab_style' );
				$this->start_controls_tab(
					'box_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'box_color',
						[
							'label'  => __( 'Color', 'bilalmghl' ),
							'type'   => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .services-thumb' => 'color: {{VALUE}}',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
							'name'     => 'typography',
							'selector' => '{{WRAPPER}} .services-thumb',
						]
					);
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'box_background',
							'label' => __( 'Background', 'bilalmghl' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb',
						]
					);
					$this->add_responsive_control(
						'box_align',
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
								'{{WRAPPER}} .services-thumb' => 'text-align: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'box_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .services-thumb',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'box_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'box_shadow',
							'selector' => '{{WRAPPER}} .services-thumb',
						]
					);
					$this->add_control(
						'box_transition',
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
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'box_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,			
							'default' => '',		
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'box_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'box_padding',
						[
							'label'      => __( 'Padding', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'box_height',
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
								'{{WRAPPER}} .services-thumb' => 'height: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);

					$this->add_responsive_control(
						'box_overflow',
						[
							'label'   => __( 'Overflow', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'options' => [
								'default'  => __( 'default', 'bilalmghl' ),
								'hidden' => __( 'hidden', 'bilalmghl' ),
								'visible' => __( 'Visible', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb' => 'overflow: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
				$this->end_controls_tab();
				$this->start_controls_tab(
					'box_hover_tab',
					[
						'label' => __( 'Hover', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'hover_box_color',
						[
							'label'  => __( 'Color', 'bilalmghl' ),
							'type'   => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .services-thumb:hover' => 'color: {{VALUE}}',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_box_button_color',
						[
							'label'  => __( 'Button Color', 'bilalmghl' ),
							'type'   => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .services-thumb:hover .btn' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'hover_box_background',
							'label' => __( 'Background', 'bilalmghl' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_box_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .services-thumb:hover',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_box_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_box_shadow',
							'selector' => '{{WRAPPER}} .services-thumb:hover',
						]
					);
					$this->add_control(
						'box_hover_height',
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
								'{{WRAPPER}} .services-thumb:hover' => 'height: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_box_transform',
						[
							'label'      => __( 'Transform Vartically', 'bilalmghl' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range'      => [
								'px' => [
									'min'  => -100,
									'max'  => 100,
									'step' => 1,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:hover' => 'transform: translateY({{SIZE}}{{UNIT}});',
							],
							'separator' => 'before',
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BOX STYLE END
		-----------------------------*/

		/*----------------------------
			BOX BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'box_before_after_style_section',
			[
				'label' => __( 'Box ( Before / After )', 'bilalmghl' ),
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
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'before_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:before',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'before_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:before' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'before_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,			
							'default' => '',	
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:before' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'before_position!' => ['']
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'before_position!' => ['']
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'before_position!' => ['']
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'before_position!' => ['']
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => '{{VALUE}};',
							],
							'default' => 'text-align:left',
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'before_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .services-thumb:before',
			                'separator' => 'before',
						]
					);
					$this->add_control(
						'before_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'before_shadow',
							'selector' => '{{WRAPPER}} .services-thumb:before',
						]
					);
					$this->add_responsive_control(
						'before_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'before_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .services-thumb:before' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:before' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'before_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
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
									'{{WRAPPER}} .services-thumb:before' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
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
									'{{WRAPPER}} .services-thumb:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();

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
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_before_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover:before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:hover:before' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:hover:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:hover:before' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_before_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'before_hover_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);

					$this->start_popover();
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
									'{{WRAPPER}} .services-thumb:hover:before' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
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
									'{{WRAPPER}} .services-thumb:hover:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();
				$this->end_controls_tab();
				$this->start_controls_tab(
					'after_tab',
					[
						'label' => __( 'AFTER', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'after_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:after',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'after_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''      => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:after' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'after_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''  => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .services-thumb:after' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'after_position!' => ['']
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'after_position!' => ['']
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'after_position!' => ['']
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'after_position!' => ['']
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => '{{VALUE}};',
							],
							'default' => 'text-align:left',
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'after_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .services-thumb:after',
			                'separator' => 'before',
						]
					);
					$this->add_control(
						'after_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'after_shadow',
							'selector' => '{{WRAPPER}} .services-thumb:after',
						]
					);
					$this->add_responsive_control(
						'after_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'after_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .services-thumb:after' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:after' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'after_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
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
									'{{WRAPPER}} .services-thumb:after' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
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
									'{{WRAPPER}} .services-thumb:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();

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
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_after_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .services-thumb:hover:after',
						]
					);
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
								'{{WRAPPER}} .services-thumb:hover:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
								'{{WRAPPER}} .services-thumb:hover:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
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
								'{{WRAPPER}} .services-thumb:hover:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_after_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .services-thumb:hover:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'after_hover_popover_toggle',
						[
							'label' => __( 'Transform', 'bilalmghl' ),
							'type' => Controls_Manager::POPOVER_TOGGLE,
							'separator' => 'before',
						]
					);
					$this->start_popover();
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
									'{{WRAPPER}} .services-thumb:hover:after' => 'transform: scale({{SIZE}}{{UNIT}});',
								],
							]
						);
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
									'{{WRAPPER}} .services-thumb:hover:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
								],
							]
						);
					$this->end_popover();
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BOX BEFORE / AFTER END
		-----------------------------*/
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();

		/*-------------------------
			Title Link Attr
		--------------------------*/
		if ( ! empty( $settings['title_link']['url'] ) ) {
			$this->add_render_attribute( 'title_link', 'href', $settings['title_link']['url'] );

			if ( $settings['title_link']['is_external'] ) {
				$this->add_render_attribute( 'title_link', 'target', '_blank' );
			}

			if ( $settings['title_link']['nofollow'] ) {
				$this->add_render_attribute( 'title_link', 'rel', 'nofollow' );
			}
		}

		/*--------------------------
			Button Link Attr
		---------------------------*/
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_render_attribute( 'more_button', 'href', $settings['button_link']['url'] );

			if ( $settings['button_link']['is_external'] ) {
				$this->add_render_attribute( 'more_button', 'target', '_blank' );
			}

			if ( $settings['button_link']['nofollow'] ) {
				$this->add_render_attribute( 'more_button', 'rel', 'nofollow' );
			}
		}
		
		/*-------------------------
			Button animation
		---------------------------*/
		if ( $settings['button_hover_animation'] ) {
			$button_animation = 'elementor-animation-' . $settings['button_hover_animation'];
		}else{
			$button_animation = '';
		}

		/*--------------------------
			Icon Animation
		---------------------------*/
		if ( $settings['icon_hover_animation'] ) {
			$icon_animation = 'elementor-animation-' . $settings['icon_hover_animation'];
		}else{
			$icon_animation = '';
		}

		/*---------------------------
			Icon Condition
		----------------------------*/
		if ( 'yes' == $settings['show_icon'] ) {
			if ( 'font_icon' == $settings['icon_type'] ) {

				if( !empty( $settings['hover_font_icon'] ) ){

					$icon = '<div class="icon-box '. esc_attr( $icon_animation ) .'">'.bilalmghl_render_icons( $settings['font_icon'] ).''.bilalmghl_render_icons( $settings['hover_font_icon'], 'hover_font_icon' ).'</div>';

				}else{

					$icon = '<div class="icon-box '. esc_attr( $icon_animation ) .'">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>';
				}


			}elseif( 'image_icon' == $settings['icon_type'] ){
				
				if( !empty( $settings['hover_image_icon'] ) ){

					$icon_array = $settings['image_icon'];
					$icon_link  = wp_get_attachment_image_url( $icon_array['id'], 'full' );

					$hover_icon_array = $settings['hover_image_icon'];
					$hover_icon_link  = wp_get_attachment_image_url( $hover_icon_array['id'], 'full' );

					$icon       = '<div class="icon-box '. esc_attr( $icon_animation ) .'"><img src="'. esc_url( $icon_link ) .'" alt="" /><img class="hover_image_icon" src="'. esc_url( $hover_icon_link ) .'" alt="" /></div>';

				}else{
					$icon_array = $settings['image_icon'];
					$icon_link  = wp_get_attachment_image_url( $icon_array['id'], 'full' );
					$icon       = '<div class="icon-box '. esc_attr( $icon_animation ) .'"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
				}
			}
		}else{
			$icon = '';
		}

		/*---------------------------
			Title Tag
		-----------------------------*/
		if ( !empty( $settings['title_tag'] ) ) {
			$title_tag = $settings['title_tag'];
		}else{
			$title_tag = 'h3';
		}

		/*---------------------------
			Title
		----------------------------*/
		if ( !empty( $settings['title'] ) ) {
			if ( !empty( $settings['title_link'] ) && !empty( $this->get_render_attribute_string( 'title_link' ) ) ) {
				$title = '<'.$title_tag.' class="title"><a '.$this->get_render_attribute_string( 'title_link' ).'>'.esc_html( $settings['title'] ).'</a></'.$title_tag.'>';
			}else{
				$title = '<'.$title_tag.' class="title">'.esc_html( $settings['title'] ).'</'.$title_tag.'>';
			}
		}else{
			$title = '';
		}

		/*----------------------------
			Subtitle
		-----------------------------*/
		if ( !empty( $settings['subtitle'] ) ) {
			$subtitle = '<div class="subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
		}else{
			$subtitle = '';
		}

		/*----------------------------
			Description
		-----------------------------*/
		if ( !empty( $settings['description'] ) ) {
			$description = '<div class="box__description">'.wpautop( $settings['description'] ).'</div>';
		}else{
			$description = '';
		}
		
		/*----------------------------
			BUTTON
		-----------------------------*/
		if ( 'yes' == $settings['show_button'] && ( !empty($settings['button_text'] ) && !empty($settings['button_link'] ) ) ) {
			$button = '<a class="btn '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'>'. esc_html( $settings['button_text'] ) .'</a>';
		}else{
			$button = '';
		}

		/*-----------------------------
			BUTTON WITH ICON
		------------------------------*/
		if ( !empty( $settings['button_icon'] ) ) {
			if ( 'left' == $settings['button_icon_align'] ) {
				$button = '<a class="btn ' . esc_attr( $button_animation ) . '" ' . $this->get_render_attribute_string( 'more_button' ) . '>' . bilalmghl_render_icons( $settings['button_icon'], 'btn_icon_left' ) . esc_html( $settings['button_text'] ) . '</a>';
			} elseif ( 'right' == $settings['button_icon_align'] ) {
				$button = '<a class="btn ' . esc_attr( $button_animation ) . '" ' . $this->get_render_attribute_string( 'more_button' ) . '>' . esc_html( $settings['button_text'] ) . bilalmghl_render_icons( $settings['button_icon'], 'btn_icon_right' ) . '</a>';
			}
		}

		/*----------------------------
			TITLE CONDITION
		------------------------------*/
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

		if ( 'yes' == $settings['show_box_image'] ) {
			$box_big_img = Group_Control_Image_Size::get_attachment_image_html( $settings, 'box_image_size', 'box_image' );
			$box_image = '<div class="box__big__thumb">'.$box_big_img.'</div>';
		}else{
			$box_image = '';
		}

		/*------------------------------
			BOX BACKGROUND ICON OR TEXT
		--------------------------------*/
		if ( 'yes' == $settings['show_box_bg_text_or_icon'] ) {
			if ( 'font_icon' == $settings['box_bg_icon_type'] && !empty( $settings['box_bg_font_icon'] ) ) {
				$box_iocn_or_text = '<div class="icon-box-bg">'.bilalmghl_render_icons( $settings['box_bg_font_icon'] ).'</div>';
			}elseif( 'image_icon' == $settings['box_bg_icon_type'] && !empty( $settings['box_bg_image_icon'] ) ){
				$icon_array = $settings['box_bg_image_icon'];
				$icon_link = wp_get_attachment_image_url( $icon_array['id'], 'full' );
				$box_iocn_or_text = '<div class="icon-box-bg"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
			}elseif( 'simple_text' == $settings['box_bg_icon_type'] && !empty( $settings['box_bg_text'] ) ){
				$box_iocn_or_text = '<div class="icon-box-bg">'. esc_html( $settings['box_bg_text'] ) .'</div>';
			}
		}else{
			$box_iocn_or_text = '';
		}

		$this->add_render_attribute( 'box_wrap_style_attr', 'class', 'sevices-thumb_wrap wrap__'.$settings['box_layout_style'] );
		$this->add_render_attribute( 'box_style_attr', 'class', 'sevices-thumb' );
		if ( 'sevices-thumb-custom' != $settings['box_layout_style'] ) {
			$this->add_render_attribute( 'box_style_attr', 'class', $settings['box_layout_style'] );
		}

		if ( 'yes' == $settings['show_box_image'] ) {
			if ( 'before' == $settings['box_image_postion'] ) {
				echo'
					<div '.$this->get_render_attribute_string('box_wrap_style_attr').'>
						'.( isset( $box_image ) ? $box_image : '' ).'
						<div '.$this->get_render_attribute_string('box_style_attr').'>
							'.( isset( $box_iocn_or_text ) ? $box_iocn_or_text : '' ).'
							'.( isset( $icon ) ? $icon : '' ).'
							'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
							'.( isset( $description ) ? $description : '' ).'
							'.( isset( $button ) ? $button : '' ).'
						</div>
					</div>
				';
			}elseif ( 'after' == $settings['box_image_postion'] ) {
				echo'
					<div '.$this->get_render_attribute_string('box_wrap_style_attr').'>
						<div '.$this->get_render_attribute_string('box_style_attr').'>
							'.( isset( $box_iocn_or_text ) ? $box_iocn_or_text : '' ).'
							'.( isset( $icon ) ? $icon : '' ).'
							'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
							'.( isset( $description ) ? $description : '' ).'
							'.( isset( $button ) ? $button : '' ).'
						</div>
						'.( isset( $box_image ) ? $box_image : '' ).'
					</div>
				';
			}
		}else{
			echo'
				<div '.$this->get_render_attribute_string('box_style_attr').'>
					'.( isset( $box_iocn_or_text ) ? $box_iocn_or_text : '' ).'
					'.( isset( $icon ) ? $icon : '' ).'
					'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
					'.( isset( $description ) ? $description : '' ).'
					'.( isset( $button ) ? $button : '' ).'
				</div>
			';
		}
	}
	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Box_Widget() );