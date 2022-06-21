<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class bilalmghl_Area_Title extends Widget_Base {

	public function get_name() {
		return 'bilalmghlAreaTitle';
	}

	public function get_title() {
		return __( 'Ul Area Title & Content', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return array('bilalmghl-addons');
	}

	public function get_keywords() {
        return[
            'title',
            'area title',
			'section title'
        ];
    }

	public static function title_before_style(){
		return [
			'set_title_before'       => 'Set Title Before',
			'set_subtitle_before'    => 'Set Subtitle Before',
			'set_description_before' => 'Set Description Before',
			'set_box_before'         => 'Set Box Before',
			'set_container_before'   => 'Set Container Before',
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
			$this->add_control(
				'font_icon',
				[
					'label'   => __( 'Font Icons', 'bilalmghl' ),
					'type'    => Controls_Manager::ICONS,
					'default' => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
					'label_block' => true,
					'condition'   => [
						'icon_type' => 'font_icon',
						'show_icon' => 'yes',
					],
				]
			);
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
				'show_bg_icon',
				[
					'label'        => __( 'Show Background Icon ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'bilalmghl' ),
					'label_off'    => __( 'Hide', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'    => 'before',
				]
			);
			$this->add_control(
				'bg_icon_type',
				[
					'label'   => __( 'Background Icon Type', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'font_icon',
					'options' => [
						'font_icon'  => __( 'Font Icon', 'bilalmghl' ),
						'image_icon' => __( 'Image Icon', 'bilalmghl' ),
					],
					'condition' => [
						'show_bg_icon' => 'yes',
					],
				]
			);
			$this->add_control(
				'bg_font_or_svg',
				[
					'label'       => __( 'Font Icon', 'bilalmghl' ),
					'type'        => Controls_Manager::ICONS,
					'label_block' => true,
					'condition'   => [
						'show_bg_icon' => 'yes',
						'bg_icon_type' => 'font_icon',
					],
				]
			);
			$this->add_control(
				'bg_image_icon',
				[
					'label'   => __( 'Upload Image OR SVG Icon', 'bilalmghl' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'show_bg_icon' => 'yes',
						'bg_icon_type' => 'image_icon',
					],
				]
			);
			$this->add_control(
				'show_bg_text',
				[
					'label'        => __( 'Show Background Text ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'bilalmghl' ),
					'label_off'    => __( 'Hide', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'    => 'before',
				]
			);
			$this->add_control(
				'title_bg_text',
				[
					'label'       => __( 'Title Background Text', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Background Text', 'bilalmghl' ),
					'condition'   => [
						'show_bg_text' => 'yes',
					],
				]
			);
			$this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'bilalmghl' ),
					'type'        => Controls_Manager::WYSIWYG,
					'placeholder' => __( 'Title', 'bilalmghl' ),
					'separator'   => 'before',
				]
			);
			$this->add_control(
				'title_tag',
				[
					'label'   => __( 'Title HTML Tag', 'elementor' ),
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
					'separator' => 'before',
				]
			);
			$this->add_control(
				'subtitle',
				[
					'label'       => __( 'Subtitle', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Subtitle', 'bilalmghl' ),
					'separator'   => 'before',
				]
			);
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
			$this->add_control(
				'description',
				[
					'label'       => __( 'Description', 'bilalmghl' ),
					'type'        => Controls_Manager::WYSIWYG,
					'placeholder' => __( 'Description.', 'bilalmghl' ),
					'separator'   => 'before',
				]
			);
			$this->add_control(
				'show_button',
				[
					'label'        => __( 'Show Button ?', 'bilalmghl' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'Show', 'bilalmghl' ),
					'label_off'    => __( 'Hide', 'bilalmghl' ),
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'    => 'before',
				]
			);
			$this->add_control(
				'button_text',
				[
					'label'       => __( 'Button Title', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Button Text', 'bilalmghl' ),
					'condition'   => ['show_button' => 'yes'],
				]
			);
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
			$this->add_control(
				'button_icon',
				[
					'label'       => __( 'Icon', 'bilalmghl' ),
					'type'        => Controls_Manager::ICONS,
					'label_block' => true,
					'condition'   => [
						'show_button' => 'yes'
					],
				]
			);
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
						'show_button'  => 'yes',
					],
				]
			);
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
						'show_button'  => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .area__button .area__button_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .area__button .area__button_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
					],
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
				'label'     => __( 'Icon', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);
			$this->start_controls_tabs( 'icon_tab_style' );
				$this->start_controls_tab(
					'icon_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'default'   => '',
							'selectors' => [
								'{{WRAPPER}} .area__icon' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
							'name'      => 'icon_typography',
							'selector'  => '{{WRAPPER}} .area__icon',
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
							],
							'selectors' => [
								'{{WRAPPER}} .area__icon img' => 'width: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .area__icon svg' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_type' => ['image_icon','font_icon']
							],
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .area__icon',
						]
					);
					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'icon_image_filters',
							'selector'  => '{{WRAPPER}} .area__icon img',
							'condition' => [
								'icon_type' => ['image_icon']
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'icon_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .area__icon',
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
								'{{WRAPPER}} .area__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'icon_shadow',
							'selector' => '{{WRAPPER}} .area__icon',
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
								'size' => 80,
							],
							'selectors' => [
								'{{WRAPPER}} .area__icon' => 'width: {{SIZE}}{{UNIT}};',
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
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 80,
							],
							'selectors' => [
								'{{WRAPPER}} .area__icon' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_responsive_control(
						'icon_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'inline-block',
							'options' => [
								''             => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__icon' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
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
								'{{WRAPPER}} .area__icon' => 'text-align: {{VALUE}};',
							],
							'default'   => 'center',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'icon_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''         => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__icon' => 'position: {{VALUE}};',
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
								'{{WRAPPER}} .area__icon' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .area__icon' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .area__icon' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .area__icon' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'icon_position!' => ['']
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
								'{{WRAPPER}} .area__icon,{{WRAPPER}} .area__icon img' => 'transition: {{SIZE}}s;',
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
								'{{WRAPPER}} .area__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .area__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					$this->add_control(
						'hover_icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} :hover .area__icon, {{WRAPPER}} :focus .area__icon' => 'color: {{VALUE}};',
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
							'selector' => '{{WRAPPER}} :hover .area__icon,{{WRAPPER}} :focus .area__icon',
						]
					);
					$this->add_group_control(
						Group_Control_Css_Filter:: get_type(),
						[
							'name'      => 'hover_icon_image_filters',
							'selector'  => '{{WRAPPER}} :hover .area__icon img',
							'condition' => [
								'icon_type' => ['image_icon']
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'hover_icon_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} :hover .area__icon,{{WRAPPER}} :hover .area__icon',
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
								'{{WRAPPER}} :hover .area__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_icon_shadow',
							'selector' => '{{WRAPPER}} .area__icon:hover',
						]
					);
					$this->add_control(
						'icon_hover_animation',
						[
							'label'     => __( 'Hover Animation', 'bilalmghl' ),
							'type'      => Controls_Manager::HOVER_ANIMATION,
							'selector'  => '{{WRAPPER}} :hover .area__icon',
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
			BACKGROUND ICON
		-----------------------------*/
		$this->start_controls_section(
			'bgicon_style_section',
			[
				'label'     => __( 'Background Icon', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_bg_icon' => 'yes',
				],
			]
		);
			$this->add_control(
				'bgicon_text_color',
				[
					'label'     => __( 'Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .area__content .title__bg__icon' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'bgicon_typography',
					'selector' => '{{WRAPPER}} .area__content .title__bg__icon',
				]
			);
			$this->add_responsive_control(
				'bgicon_image_size',
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
					],
					'selectors' => [
						'{{WRAPPER}} .area__content .title__bg__icon img' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .area__content .title__bg__icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'bgicon_text_width',
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
						'size' => '100'
					],
					'selectors' => [
						'{{WRAPPER}} .area__content .title__bg__icon' => 'width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'bgicon_margin',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .area__content .title__bg__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'bgicon_padding',
				[
					'label'      => __( 'Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .area__content .title__bg__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'bgicon_opacity',
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
						'{{WRAPPER}} .area__content .title__bg__icon' => 'opacity: {{SIZE}};',
					],
					'separator' => 'before',
				]
			);
		$this->end_controls_section();
		/*----------------------------
			BACKGROUND ICON END
		-----------------------------*/

		/*----------------------------
			BACKGROUND TEXT
		-----------------------------*/
		$this->start_controls_section(
			'bgtext_style_section',
			[
				'label'     => __( 'Background Text', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_bg_text' => 'yes',
				],
			]
		);
			$this->add_control(
				'bgtext_text_color',
				[
					'label'     => __( 'Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .area__content .title__bg__text' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'bgtext_typography',
					'selector' => '{{WRAPPER}} .area__content .title__bg__text',
				]
			);
			$this->add_responsive_control(
				'bgtext_margin',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .area__content .title__bg__text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'bgtext_padding',
				[
					'label'      => __( 'Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .area__content .title__bg__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'bgtext_opacity',
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
						'{{WRAPPER}} .area__content .title__bg__text' => 'opacity: {{SIZE}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_control(
				'bgtext_before_zindex',
				[
					'label'     => __( 'Z-Index', 'bilalmghl' ),
					'type'      => Controls_Manager::NUMBER,
					'min'       => -99,
					'max'       => 99,
					'step'      => 1,
					'selectors' => [
						'{{WRAPPER}} .area__content .title__bg__text' => 'z-index: {{SIZE}};',
					],
					'separator' => 'before',
				]
			);
		$this->end_controls_section();
		/*----------------------------
			BACKGROUND TEXT END
		-----------------------------*/

		/*----------------------------
			TITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'title_style_section',
			[
				'label'     => __( 'Title', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				]
			]
		);
			$this->start_controls_tabs( 'title_tab_style' );
				$this->start_controls_tab(
					'title_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'title_text_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'default'   => '',
							'selectors' => [
								'{{WRAPPER}} .area__title, {{WRAPPER}} .area__title a' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
							'name'     => 'title_typography',
							'selector' => '{{WRAPPER}} .area__title',
						]
					);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'title_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .area__title',
						]
					);
					$this->add_responsive_control(
						'title_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''             => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__title' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
			        $this->add_group_control(
			            Group_Control_Border:: get_type(),
			            [
			                'name'      => 'title_border',
			                'label'     => __( 'Border', 'bilalmghl' ),
			                'selector'  => '{{WRAPPER}} .area__title',
			                'separator' => 'before',
			            ]
			        );
			        $this->add_responsive_control(
			            'title_border_radius',
			            [
			                'label'      => __( 'Border Radius', 'bilalmghl' ),
			                'type'       => Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', '%', 'em' ],
			                'selectors'  => [
			                    '{{WRAPPER}} .area__title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );
					$this->add_responsive_control(
						'title_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .area__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_padding',
						[
							'label'      => __( 'Padding', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .area__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					$this->add_control(
						'hover_title_color',
						[
							'label'     => __( 'Link Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .area__title a:hover, {{WRAPPER}} .area__title a:focus' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'box_hover_title_color',
						[
							'label'     => __( 'Box Hover Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} :hover .area__title a, {{WRAPPER}} :focus .area__title a, {{WRAPPER}} :hover .area__title' => 'color: {{VALUE}};',
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
				'label'     => __( 'Title Before / After', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				]
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
							'selector' => '{{WRAPPER}} .area__title:before',
						]
					);
					$this->add_responsive_control(
						'title_before_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''             => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__title:before' => 'display: {{VALUE}};',
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
								''         => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__title:before' => 'position: {{VALUE}};',
							],
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
								'{{WRAPPER}} .area__title:before' => 'left: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:before' => 'right: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:before' => 'top: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:before' => 'bottom: {{SIZE}}{{UNIT}};',
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
							'selectors' => [
								'{{WRAPPER}} .area__title:before' => '{{VALUE}};',
							],
							'default'   => 'text-align:left',
							'separator' => 'before',
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
								'{{WRAPPER}} .area__title:before' => 'width: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:before' => 'height: {{SIZE}}{{UNIT}};',
							],
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
								'{{WRAPPER}} .area__title:before' => 'opacity: {{SIZE}};',
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
								'{{WRAPPER}} .area__title:before' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_before_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .area__title:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
							'name'      => 'title_after_background',
							'label'     => __( 'Background', 'bilalmghl' ),
							'types'     => [ 'classic', 'gradient' ],
							'selector'  => '{{WRAPPER}} .area__title:after',
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
								''             => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__title:after' => 'display: {{VALUE}};',
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
								''         => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__title:after' => 'position: {{VALUE}};',
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
								'{{WRAPPER}} .area__title:after' => 'left: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:after' => 'right: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:after' => 'top: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:after' => 'bottom: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:after' => '{{VALUE}};',
							],
							'default'   => 'text-align:left',
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
								'{{WRAPPER}} .area__title:after' => 'width: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__title:after' => 'height: {{SIZE}}{{UNIT}};',
							],
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
								'{{WRAPPER}} .area__title:after' => 'opacity: {{SIZE}};',
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
								'{{WRAPPER}} .area__title:after' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'title_after_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .area__title:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
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
				'label'     => __( 'Subtitle', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				]
			]
		);
			$this->add_control(
				'subtitle_color',
				[
					'label'     => __( 'Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .area__subtitle' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'box_hover_subtitle_color',
				[
					'label'     => __( 'Box Hover Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} :hover .area__subtitle' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'subtitle_typography',
					'selector' => '{{WRAPPER}} .area__subtitle',
				]
			);
			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'subtitle_background',
					'label'    => __( 'Background', 'bilalmghl' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .area__subtitle',
				]
			);
			$this->add_responsive_control(
				'subtitle_display',
				[
					'label'   => __( 'Display', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',
					
					'options' => [
						''             => __( 'Default', 'bilalmghl' ),
						'initial'      => __( 'Initial', 'bilalmghl' ),
						'block'        => __( 'Block', 'bilalmghl' ),
						'inline-block' => __( 'Inline Block', 'bilalmghl' ),
						'flex'         => __( 'Flex', 'bilalmghl' ),
						'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
						'none'         => __( 'none', 'bilalmghl' ),
					],
					'selectors' => [
						'{{WRAPPER}} .area__subtitle' => 'display: {{VALUE}};',
					],
					'separator' => 'before',
				]
			);
	        $this->add_group_control(
	            Group_Control_Border:: get_type(),
	            [
	                'name'      => 'subtitle_border',
	                'label'     => __( 'Border', 'bilalmghl' ),
	                'selector'  => '{{WRAPPER}} .area__subtitle',
	                'separator' => 'before',
	            ]
	        );
	        $this->add_responsive_control(
	            'subtitle_border_radius',
	            [
	                'label'      => __( 'Border Radius', 'bilalmghl' ),
	                'type'       => Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px', '%', 'em' ],
	                'selectors'  => [
	                    '{{WRAPPER}} .area__subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );
			$this->add_responsive_control(
				'subtitle_margin',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .area__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'subtitle_padding',
				[
					'label'      => __( 'Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .area__subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();
		/*----------------------------
			SUBTITLE STYLE END
		-----------------------------*/

		/*----------------------------
			SUBTITLE BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_before_after_style_section',
			[
				'label'     => __( 'Subtitle Before / After', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				]
			]
		);
			$this->start_controls_tabs( 'subtitle_before_after_tab_style' );
				$this->start_controls_tab(
					'subtitle_before_tab',
					[
						'label' => __( 'BEFORE', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'      => 'subtitle_before_background',
							'label'     => __( 'Background', 'bilalmghl' ),
							'types'     => [ 'classic', 'gradient' ],
							'selector'  => '{{WRAPPER}} .area__subtitle:before',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''             => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__subtitle:before' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''         => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__subtitle:before' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_position_from_left',
						[
							'label'      => __( 'From Left', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:before' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_before_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_position_from_right',
						[
							'label'      => __( 'From Right', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:before' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'subtitle_before_position_from_top',
						[
							'label'      => __( 'From Top', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:before' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'subtitle_before_position_from_bottom',
						[
							'label'      => __( 'From Bottom', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:before' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_before_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'subtitle_before_align',
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
								'{{WRAPPER}} .area__subtitle:before' => '{{VALUE}};',
							],
							'default'   => 'text-align:left',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_width',
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
								'{{WRAPPER}} .area__subtitle:before' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_height',
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
								'{{WRAPPER}} .area__subtitle:before' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'subtitle_before_opacity',
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
								'{{WRAPPER}} .area__subtitle:before' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'subtitle_before_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .area__subtitle:before' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_before_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .area__subtitle:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
				$this->end_controls_tab();
				$this->start_controls_tab(
					'subtitle_after_tab',
					[
						'label' => __( 'AFTER', 'bilalmghl' ),
					]
				);
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'      => 'subtitle_after_background',
							'label'     => __( 'Background', 'bilalmghl' ),
							'types'     => [ 'classic', 'gradient' ],
							'selector'  => '{{WRAPPER}} .area__subtitle:after',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''             => __( 'Default', 'bilalmghl' ),
								'initial'      => __( 'Initial', 'bilalmghl' ),
								'block'        => __( 'Block', 'bilalmghl' ),
								'inline-block' => __( 'Inline Block', 'bilalmghl' ),
								'flex'         => __( 'Flex', 'bilalmghl' ),
								'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
								'none'         => __( 'none', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__subtitle:after' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_position',
						[
							'label'   => __( 'Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '',
							'options' => [
								''         => __( 'Default', 'bilalmghl' ),
								'absolute' => __( 'Absulute', 'bilalmghl' ),
								'relative' => __( 'Relative', 'bilalmghl' ),
							],
							'selectors' => [
								'{{WRAPPER}} .area__subtitle:after' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_position_from_left',
						[
							'label'      => __( 'From Left', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:after' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_after_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_position_from_right',
						[
							'label'      => __( 'From Right', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:after' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'subtitle_after_position_from_top',
						[
							'label'      => __( 'From Top', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:after' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'subtitle_after_position_from_bottom',
						[
							'label'      => __( 'From Bottom', 'bilalmghl' ),
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
								'{{WRAPPER}} .area__subtitle:after' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'subtitle_after_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'subtitle_after_align',
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
								'{{WRAPPER}} .area__subtitle:after' => '{{VALUE}};',
							],
							'default'   => 'text-align:left',
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_width',
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
								'{{WRAPPER}} .area__subtitle:after' => 'width: {{SIZE}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_height',
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
								'{{WRAPPER}} .area__subtitle:after' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					$this->add_control(
						'subtitle_after_opacity',
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
								'{{WRAPPER}} .area__subtitle:after' => 'opacity: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'subtitle_after_zindex',
						[
							'label'     => __( 'Z-Index', 'bilalmghl' ),
							'type'      => Controls_Manager::NUMBER,
							'min'       => -99,
							'max'       => 99,
							'step'      => 1,
							'selectors' => [
								'{{WRAPPER}} .area__subtitle:after' => 'z-index: {{SIZE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'subtitle_after_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .area__subtitle:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			SUBTITLE BEFORE / AFTER END
		-----------------------------/*

		/*----------------------------
			BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'button_style_section',
			[
				'label'     => __( 'Button', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_button' => 'yes'
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
							'default'   => '',
							'selectors' => [
								'{{WRAPPER}} a.area__button, {{WRAPPER}} .area__button' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
							'name'     => 'button_typography',
							'selector' => '{{WRAPPER}} .area__button',
						]
					);

					$this->add_responsive_control(
						'button_icon_size',
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
								'{{WRAPPER}} .area__button i' => 'font-size: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .area__button svg' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'button_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .area__button',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'button_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .area__button',
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
								'{{WRAPPER}} .area__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'button_shadow',
							'selector' => '{{WRAPPER}} .area__button',
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
								'{{WRAPPER}} .area__button' => 'width: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__button' => 'height: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .area__button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .area__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .area__button:hover, {{WRAPPER}} a.area__button:focus, {{WRAPPER}} .area__button:focus' => 'color: {{VALUE}};',
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
							'selector' => '{{WRAPPER}} .area__button:hover,{{WRAPPER}} .area__button:focus',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'hover_button_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .area__button:hover,{{WRAPPER}} .area__button:focus',
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
								'{{WRAPPER}} .area__button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_button_shadow',
							'selector' => '{{WRAPPER}} .area__button:hover',
						]
					);
					$this->add_control(
						'button_hover_animation',
						[
							'label'     => __( 'Hover Animation', 'bilalmghl' ),
							'type'      => Controls_Manager::HOVER_ANIMATION,
							'selector'  => '{{WRAPPER}} .area__button:hover',
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
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'typography',
					'selector' => '{{WRAPPER}} .area__content',
				]
			);
			$this->add_control(
				'box_color',
				[
					'label'     => __( 'Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .area__content' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'hover_box_color',
				[
					'label'     => __( 'Box Hover Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} :hover .area__content' => 'color: {{VALUE}}',
					],
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
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
					'default'   => 'center',
					'separator' => 'before',
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
						'{{WRAPPER}}' => 'transition: {{SIZE}}s;',
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
						''         => __( 'Default', 'bilalmghl' ),
						'absolute' => __( 'Absulute', 'bilalmghl' ),
						'relative' => __( 'Relative', 'bilalmghl' ),
					],
					'selectors' => [
						'{{WRAPPER}}' => 'position: {{VALUE}};',
					],
					'separator' => 'before',
				]
			);
		$this->end_controls_section();
		/*----------------------------
			BOX STYLE END
		-----------------------------*/
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

		/*Button Link Attr*/
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_render_attribute( 'more_button', 'href', $settings['button_link']['url'] );

			if ( $settings['button_link']['is_external'] ) {
				$this->add_render_attribute( 'more_button', 'target', '_blank' );
			}

			if ( $settings['button_link']['nofollow'] ) {
				$this->add_render_attribute( 'more_button', 'rel', 'nofollow' );
			}
		}
		
		/*Button animation*/
		if ( $settings['button_hover_animation'] ) {
			$button_animation = 'elementor-animation-' . $settings['button_hover_animation'];
		}else{
			$button_animation = '';
		}

		/*Icon Animation*/
		if ( $settings['icon_hover_animation'] ) {
			$icon_animation = 'elementor-animation-' . $settings['icon_hover_animation'];
		}else{
			$icon_animation = '';
		}

		/*Icon Condition*/
		if ( 'yes' == $settings['show_icon'] ) {
			if ( 'font_icon' == $settings['icon_type'] && !empty( $settings['font_icon'] ) ) {
				$icon = '<div class="area__icon '. esc_attr( $icon_animation ) .'">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>';
			}elseif( 'image_icon' == $settings['icon_type'] && !empty( $settings['image_icon'] ) ){
				$icon_array = $settings['image_icon'];
				$icon_link  = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
				$icon       = '<div class="area__icon '. esc_attr( $icon_animation ) .'"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
			}
		}else{
			$icon = '';
		}

		/*Title Background Text*/
		if ( !empty($settings['title_bg_text']) ) {
			$title_bg_text = '<div class="title__bg__text">'.esc_html( $settings['title_bg_text'] ).'</div>';
		}else{
			$title_bg_text = '';
		}

		/*Title Background Icon*/
		/*if ( 'yes' == $settings['show_bg_icon'] ) {

			if ( 'font_icon' == $settings['bg_icon_type'] && !empty($settings['bg_font_or_svg']) ) {

				$title_bg_icon = '<div class="title__bg__icon">'.bilalmghl_render_icons( $settings['bg_font_or_svg'] ).'</div>';

			}elseif ( 'image_icon' == $settings['bg_icon_type'] && !empty($settings['bg_image_icon']) ) {

				$icon_array    = $settings['bg_image_icon'];
				$icon_link     = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
				$title_bg_icon = '<div class="title__bg__icon"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';

			}
		}else{
			$title_bg_icon = '';
		}*/

		/*Title Tag*/
		if ( !empty( $settings['title_tag'] ) ) {
			$title_tag = $settings['title_tag'];
		}else{
			$title_tag = 'h3';
		}

		/*Title*/
		if ( !empty( $settings['title'] ) ) {
			$title = '<'.$title_tag.' class="area__title">'.wpautop( $settings['title'] ).'</'.$title_tag.'>';
		}else{
			$title = '';
		}

		/*Subtitle*/
		if ( !empty( $settings['subtitle'] ) ) {
			$subtitle = '<div class="area__subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
		}else{
			$subtitle = '';
		}

		/*Description*/
		if ( !empty( $settings['description'] ) ) {
			$description = '<div class="area__description">'.wpautop( $settings['description'] ).'</div>';
		}else{
			$description = '';
		}
		
		/*Button*/
		if ( 'yes' == $settings['show_button'] && ( !empty($settings['button_text'] ) && !empty($settings['button_link'] ) ) ) {
			$button = '<a class="area__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'>'. esc_html( $settings['button_text'] ) .'</a>';
		}

		/*Button With Icon*/
		if ( !empty( $settings['button_icon'] ) ) {
			if ( 'left' == $settings['button_icon_align'] ) {
				$button = '<a class="area__button ' . esc_attr( $button_animation ) . '" ' . $this->get_render_attribute_string( 'more_button' ) . '>' . bilalmghl_render_icons( $settings['button_icon'], 'area__button_icon_left' ) . esc_html( $settings['button_text'] ) . '</a>';
			} elseif ( 'right' == $settings['button_icon_align'] ) {
				$button = '<a class="area__button ' . esc_attr( $button_animation ) . '" ' . $this->get_render_attribute_string( 'more_button' ) . '>' . esc_html( $settings['button_text'] ) . bilalmghl_render_icons( $settings['button_icon'], 'area__button_icon_right' ) . '</a>';
			}
		}

		/*Title Condition*/
		if ( 'before_title' == $settings['subtitle_position'] ) {
			$title_subtitle = $subtitle . $title;
		}elseif( 'after_title' == $settings['subtitle_position'] ){
			$title_subtitle = $title . $subtitle;
		}elseif( empty($settings['subtitle']) ){
			$title_subtitle = $title . $subtitle;
		}

		echo'<div class="area__content">'; ?>
			<?php if ( 'yes' == $settings['show_bg_icon'] ) :  ?>
				<?php if ( 'font_icon' == $settings['bg_icon_type'] && !empty($settings['bg_font_or_svg']) ) : ?>
					<div class="title__bg__icon"><?php echo bilalmghl_render_icons( $settings['bg_font_or_svg']); ?></div>
				<?php elseif ( 'image_icon' == $settings['bg_icon_type'] && !empty($settings['bg_image_icon']) ) : ?>
					<?php
						$icon_array = $settings['bg_image_icon'];
						$icon_link  = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
						echo '<div class="title__bg__icon"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>'; 
					?>
				<?php endif; ?>
			<?php endif;
			echo''.( isset( $title_bg_text ) ? $title_bg_text : '' ).'
				'.( isset( $icon ) ? $icon : '' ).'
				'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
				'.( isset( $description ) ? $description : '' ).'
				'.( isset( $button ) ? $button : '' ).'';
		echo'</div>';
	}
	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Area_Title() );