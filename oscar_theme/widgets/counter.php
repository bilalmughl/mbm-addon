<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor counter widget.
 *
 * Elementor widget that displays stats and numbers in an escalating manner.
 *
 * @since 1.0.0
 */
class bilalmghl_Counter_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'counter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Ul Counter Up Box', 'bilalmghl' );
	}
    
        
	public function get_categories() {
		return [ 'bilalmghl-addons' ];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-counter';
	}

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jquery-numerator' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'counter', 'count', 'counterup' ];
	}

	/**
	 * Register counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		/*---------------------------
			CONTENT SECTION
		----------------------------*/
		$this->start_controls_section(
			'section_counter',
			[
				'label' => __( 'Counter', 'bilalmghl' ),
			]
		);
        
			$this->add_control(
				'show_icon',
				[
					'label'     => __( 'Show Icon ?', 'bilalmghl' ),
					'type'      => Controls_Manager::SWITCHER,
					'default'   => 'no',
					'label_on'  => __( 'Show', 'bilalmghl' ),
					'label_off' => __( 'Hide', 'bilalmghl' ),
				]
			);
	        $this->add_control(
	            'counter_icon_type',
	            [
	                'label'   => __('Icon Type','bilalmghl'),
	                'type'    => Controls_Manager::CHOOSE,
	                'options' => [                    
	                    'icon' =>[
	                        'title' => __('Icon','bilalmghl'),
	                        'icon'  => 'fa fa-info',
	                    ],
	                    'img' =>[
	                        'title' => __('Image','bilalmghl'),
	                        'icon'  => 'fa fa-picture-o',
	                    ]
	                ],
	                'default'   => 'icon',
	                'condition' => [
	                    'show_icon' => 'yes',
	                ]
	            ]
	        );
	        $this->add_control(
	            'icon_image',
	            [
	                'label'   => __('Image Icon','bilalmghl'),
	                'type'    => Controls_Manager::MEDIA,
	                'default' => [
	                    'url' => Utils::get_placeholder_image_src(),
	                ],
	                'condition' => [
	                    'counter_icon_type' => 'img',
	                    'show_icon'         => 'yes',
	                ]
	            ]
	        );
	        $this->add_group_control(
	            Group_Control_Image_Size:: get_type(),
	            [
	                'name'      => 'icon_imagesize',
	                'default'   => 'large',
	                'separator' => 'none',
	                'condition' => [
	                    'counter_icon_type' => 'img',
	                    'show_icon'         => 'yes',
	                ]
	            ]
	        );
	        $this->add_control(
	            'icon_font',
	            [
	                'label'       => esc_html__('Icon','bilalmghl'),
	                'type'        => Controls_Manager::ICONS,
	                'label_block' => true,
	                'default'     => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
	                'condition' => [
	                    'counter_icon_type' => 'icon',
	                    'show_icon'         => 'yes',
					],
	            ]
	        );
			$this->add_control(
				'starting_number',
				[
					'label'     => __( 'Starting Number', 'bilalmghl' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 0,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'ending_number',
				[
					'label'   => __( 'Ending Number', 'bilalmghl' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 100,
				]
			);
			$this->add_control(
				'prefix',
				[
					'label'       => __( 'Number Prefix', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => '',
					'placeholder' => 1,
					'separator'   => 'before',
				]
			);
			$this->add_control(
				'suffix',
				[
					'label'       => __( 'Number Suffix', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => '',
					'placeholder' => __( 'Plus', 'bilalmghl' ),
				]
			);
			$this->add_control(
				'duration',
				[
					'label'     => __( 'Animation Duration', 'bilalmghl' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 2000,
					'min'       => 100,
					'step'      => 100,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'thousand_separator',
				[
					'label'     => __( 'Thousand Separator', 'bilalmghl' ),
					'type'      => Controls_Manager::SWITCHER,
					'default'   => 'yes',
					'label_on'  => __( 'Show', 'bilalmghl' ),
					'label_off' => __( 'Hide', 'bilalmghl' ),
				]
			);
			$this->add_control(
				'thousand_separator_char',
				[
					'label'     => __( 'Separator', 'bilalmghl' ),
					'type'      => Controls_Manager::SELECT,
					'condition' => [
						'thousand_separator' => 'yes',
					],
					'options' => [
						''  => 'Default',
						'.' => 'Dot',
						' ' => 'Space',
					],
				]
			);
			$this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => __( 'Cool Number', 'bilalmghl' ),
					'placeholder' => __( 'Cool Number', 'bilalmghl' ),
					'separator'   => 'before',
				]
			);
			$this->add_control(
				'view',
				[
					'label'   => __( 'View', 'bilalmghl' ),
					'type'    => Controls_Manager::HIDDEN,
					'default' => 'traditional',
				]
			);
		$this->end_controls_section();
		/*---------------------------
			CONTENT SECTION END
		----------------------------*/
        
        /*---------------------------
			STYLE SECTION
        -----------------------------*/
        $this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);

			$this->add_control(
				'icon_color',
				[
					'label'     => __( 'Icon Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .counter__icon' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'typography_icon',
					'selector' => '{{WRAPPER}} .counter__icon',
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
						'{{WRAPPER}} .counter__icon img' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .counter__icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'icon_background',
					'label'    => __( 'Background', 'bilalmghl' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .counter__icon',
				]
			);

			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'      => 'icon_border',
					'label'     => __( 'Border', 'bilalmghl' ),
					'selector'  => '{{WRAPPER}} .counter__icon',
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'icon_radius',
				[
					'label'      => __( 'Border Radius', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .counter__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'icon_shadow',
					'selector' => '{{WRAPPER}} .counter__icon',
				]
			);

			$this->add_responsive_control(
				'icon_float',
				[
					'label'   => __( 'Float', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'options' => [
						'left'  => __( 'Left', 'bilalmghl' ),
						'right' => __( 'Right', 'bilalmghl' ),
						'none'  => __( 'None', 'bilalmghl' ),
					],
					'selectors' => [
						'{{WRAPPER}} .counter__icon' => 'float:{{VALUE}};',
					],
					'separator' => 'before',
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
						'{{WRAPPER}} .counter__icon' => 'display: {{VALUE}};',
					],
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
						'{{WRAPPER}} .counter__icon' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .counter__icon' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

	        $this->add_responsive_control(
	            'icon_margin',
	            [
	                'label'      => __( 'Margin', 'bilalmghl' ),
	                'type'       => Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px', '%', 'em' ],
	                'selectors'  => [
	                    '{{WRAPPER}} .counter__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],                
	                'default' => [
	                    'top'      => '0',
	                    'right'    => '0',
	                    'bottom'   => '0',
	                    'left'     => '0',
	                    'isLinked' => false
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
						'{{WRAPPER}} .counter__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
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
						'{{WRAPPER}} .counter__icon' => 'text-align: {{VALUE}};',
					],
					'separator' => 'before',
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
						'{{WRAPPER}} .counter__icon,{{WRAPPER}} .counter__icon img' => 'transition: {{SIZE}}s;',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'icon_opacity',
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
					],
					'selectors' => [
						'{{WRAPPER}} .counter__icon,{{WRAPPER}} .counter__icon img' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_control(
				'icon_z_index',
				[
					'label'      => __( 'Z Index', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .counter__icon,{{WRAPPER}} .counter__icon img' => 'z-index: {{SIZE}};',
					],
				]
			);

			$this->add_control(
			    'icon_hover_hidding',
			    [
			        'label'     => __( 'Icon Hover', 'bilalmghl' ),
			        'type'      => Controls_Manager::HEADING,
			        'separator' => 'before',
			    ]
			);

			$this->add_control(
			'icon_hover_hr',
			    [
			        'type' => Controls_Manager::DIVIDER,
			    ]
			);

			$this->add_control(
				'icon_hover_color',
				[
					'label'     => __( 'Icon Hover Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single__counter:hover .counter__icon' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'icon_hover_background',
					'label'    => __( 'Background', 'bilalmghl' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .single__counter:hover .counter__icon',
				]
			);

		$this->end_controls_section();
		/*---------------------------
			ICON STYLE END
		-----------------------------*/

		/*----------------------------
			COUNTE NUMBER STYLE
		-----------------------------*/
		$this->start_controls_section(
			'section_number',
			[
				'label' => __( 'Number', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'number_color',
				[
					'label'     => __( 'Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .counter__number__wrapper' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'number_hover_color',
				[
					'label'     => __( 'Counter Hover Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single__counter:hover .counter__number__wrapper' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'typography_number',
					'selector' => '{{WRAPPER}} .counter__number__wrapper',
				]
			);
	        $this->add_responsive_control(
	            'number_margin',
	            [
	                'label'      => __( 'Margin', 'bilalmghl' ),
	                'type'       => Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px', '%', 'em' ],
	                'selectors'  => [
	                    '{{WRAPPER}} .counter__number__wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],                
	                'default' => [
	                    'top'      => '0',
	                    'right'    => '0',
	                    'bottom'   => '0',
	                    'left'     => '0',
	                    'isLinked' => false
	                ],
	                'separator' => 'before',
	            ]
	        );

			$this->add_control(
				'number_transition',
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
						'{{WRAPPER}} .counter__number__wrapper' => 'transition: {{SIZE}}s;',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'number_opacity',
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
					],
					'selectors' => [
						'{{WRAPPER}} .counter__number__wrapper' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_control(
				'number_z_index',
				[
					'label'      => __( 'Z Index', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .counter__number__wrapper' => 'z-index: {{SIZE}};',
					],
				]
			);
		$this->end_controls_section();
		/*---------------------------
			COUNTER NUMBER STYLE END
		-----------------------------*/

		/*---------------------------
			TITLE STYLE
		----------------------------*/
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label'     => __( 'Text Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .counter__title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_hover_color',
				[
					'label'     => __( 'Title Hover Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single__counter:hover .counter__title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'typography_title',
					'selector' => '{{WRAPPER}} .counter__title',
				]
			);
	        $this->add_responsive_control(
	            'title_margin',
	            [
	                'label'      => __( 'Margin', 'bilalmghl' ),
	                'type'       => Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px', '%', 'em' ],
	                'selectors'  => [
	                    '{{WRAPPER}} .counter__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],                
	                'default' => [
	                    'top'      => '0',
	                    'right'    => '0',
	                    'bottom'   => '0',
	                    'left'     => '0',
	                    'isLinked' => false
	                ],
	                'separator' => 'before',
	            ]
	        );
		$this->end_controls_section();
		/*---------------------------
			TITLE STYLE END
		----------------------------*/

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

			$this->start_controls_tabs( 'box_tabs_style' );
				$this->start_controls_tab(
					'box_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);

					// Icon Color
					$this->add_control(
						'box_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'default'   => '',
							'selectors' => [
								'{{WRAPPER}} .single__counter' => 'color: {{VALUE}};',
							],
						]
					);

					// Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'box_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .single__counter',
						]
					);

					// Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'box_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .single__counter',
							'separator' => 'before',
						]
					);

					// Radius
					$this->add_responsive_control(
						'box_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .single__counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
					// Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'box_shadow',
							'selector' => '{{WRAPPER}} .single__counter',
						]
					);

					// Margin
					$this->add_responsive_control(
						'box_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .single__counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'separator' => 'before',
						]
					);

					// Padding
					$this->add_responsive_control(
						'box_padding',
						[
							'label'      => __( 'Padding', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .single__counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .single__counter' => 'text-align: {{VALUE}};',
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

					//Hover Color
					$this->add_control(
						'hover_box_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} :hover .single__counter, {{WRAPPER}} :focus .single__counter' => 'color: {{VALUE}};',
							],
						]
					);

					// Hover Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_box_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} :hover .single__counter,{{WRAPPER}} :focus .single__counter',
						]
					);	

					// Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_box_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} :hover .single__counter,{{WRAPPER}} :hover .single__counter',
						]
					);

					// Radius
					$this->add_responsive_control(
						'hover_box_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} :hover .single__counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					// Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_box_shadow',
							'selector' => '{{WRAPPER}} :hover .single__counter',
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BOX STYLE END
		-----------------------------*/
	}

	/**
	 * Render counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'counter', [
			'class'         => 'elementor-counter-number',
			'data-duration' => $settings['duration'],
			'data-to-value' => $settings['ending_number'],
		] );

		$counter_image = Group_Control_Image_Size::get_attachment_image_html( $settings, 'icon_imagesize', 'icon_image' );
		if ( $settings['counter_icon_type'] == 'icon' && !empty( $settings['icon_font'] ) ) {
			$counter_icon = '<div class="counter__icon">' . bilalmghl_render_icons( $settings['icon_font'] ) . '</div>';
		} elseif ( $settings['counter_icon_type'] == 'img' && !empty( $counter_image ) ) {
			$counter_icon = '<div class="counter__icon">' . $counter_image . '</div>';
		} else {
			$counter_icon = '';
		}
		if ( ! empty( $settings['thousand_separator'] ) ) {
			$delimiter = empty( $settings['thousand_separator_char'] ) ? ',' : $settings['thousand_separator_char'];
			$this->add_render_attribute( 'counter', 'data-delimiter', $delimiter );
		}

		?>
        <div class="single__counter">
            <?php echo($counter_icon ); ?>
            <h3 class="counter__number__wrapper">
                <span class="counter__number__prefix"><?php echo $settings['prefix']; ?></span>
                <span <?php echo $this->get_render_attribute_string( 'counter' ); ?>><?php echo $settings['starting_number']; ?></span>
                <span class="counter__number__suffix"><?php echo $settings['suffix']; ?></span>
            </h3>
            <?php if ( $settings['title'] ) : ?>
            	<div class="counter__title"><?php echo $settings['title']; ?></div>
            <?php endif; ?>
        </div>
	<?php 
	} 
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Counter_Widget() );