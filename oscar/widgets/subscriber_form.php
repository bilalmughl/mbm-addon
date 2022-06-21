<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Oscar_Subscriber_Widget extends Widget_Base {

	public function get_name() {
		return 'Oscar_Subscriber_Widget';
	}

	public function get_title() {
		return __( 'OS Subscribe Form', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-mailchimp';
	}

	public function get_categories() {
		return array('oscar-addons');
	}


	public function get_script_depends() {
		return[
			'ajaxchimp',
			'bilalmghl-core',
		];
	}
	public function get_keywords() {
        return[
            'mailchimp',
            'subscribe box',
			'subscribe form',
			'mailchimp subscriber form',
        ];
    }
    static function content_layout_style(){
        return[
            'form-style-1'      => esc_html__( 'Default Style', 'bilalmghl' ),
            'form-style-2'      => esc_html__( 'Form Style 2', 'bilalmghl' ),
            'form-style-3'      => esc_html__( 'Form Style 3', 'bilalmghl' ),
            'form-style-1-custom' => esc_html__( 'Custom Style', 'bilalmghl' ),
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
            'content_layout_style',
            [
                'label'     => esc_html__( 'Form Style', 'bilalmghl' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'form-style-1',
                'options'   => self::content_layout_style(),
                'separator' => 'before',
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
				'default'   => [
					'default' => 'fa fa-check',
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

		// Title
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bilalmghl' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Title', 'bilalmghl' ),
			]
		);

		// Title Tag
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

		// Description
		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'bilalmghl' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description.', 'bilalmghl' ),
			]
		);

		// MailChimp Subscribe Form Post Url
		$this->add_control(
			'mailchimp_post_url',
			[
				'label'       => __( 'MailChimp Post Url', 'bilalmghl' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'MailChimp Post Url Here.', 'bilalmghl' ),
				'description'   => wp_kses_post( '(<a href="'.esc_url('https://www.tassos.gr/blog/how-to-get-mailchimp-form-submit-url').'" target="_blank">See How To Get Post Url</a>)', 'bilalmghl' ),
			]
		);

		// MailChimp Subscribe Form Post Url
		$this->add_control(
			'placeholder_text',
			[
				'label'       => __( 'Email Placeholder Text', 'bilalmghl' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'mail@example.com', 'bilalmghl' ),
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
				'default'      => 'subscribe',
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
				'default' => 'left',
				'options' => [
					'left'  => __( 'Before', 'bilalmghl' ),
					'right' => __( 'After', 'bilalmghl' ),
				],
				'condition' => [
					'button_icon!' => '',
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
				],
				'selectors' => [
					'{{WRAPPER}} .oscar-btn .oscar-btn_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .oscar-btn .oscar-btn_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
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
				'label' => __( 'Icon', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Icon Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'icon_typography',
				'selector'  => '{{WRAPPER}} .box__icon',
				'condition' => [
					'icon_type' => ['font_icon']
				],
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
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_type' => ['image_icon']
				],
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
				'selector'  => '{{WRAPPER}} .box__icon img',
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
					'{{WRAPPER}} .box__icon' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .box__icon',
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
				'selector' => '{{WRAPPER}} .box__icon',
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
					'{{WRAPPER}} .box__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'icon_shadow',
				'selector' => '{{WRAPPER}} .box__icon',
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr3',
			[
				'type' => Controls_Manager::DIVIDER,
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
				'selector'  => '{{WRAPPER}} :hover .box__icon img',
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
					'{{WRAPPER}} :hover .box__icon, {{WRAPPER}} :focus .box__icon' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} :hover .box__icon,{{WRAPPER}} :focus .box__icon',
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
				'selector' => '{{WRAPPER}} :hover .box__icon,{{WRAPPER}} :hover .box__icon',
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
					'{{WRAPPER}} :hover .box__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_icon_shadow',
				'selector' => '{{WRAPPER}} :hover .box__icon',
			]
		);

		// Icon Hover Animation
		$this->add_control(
			'icon_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'bilalmghl' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} :hover .box__icon',
			]
		);

		$this->add_control(
			'icon_hr9',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

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
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon' => 'width: {{SIZE}}{{UNIT}};',
				],
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr5',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Display;
		$this->add_responsive_control(
			'icon_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'inline-block',
				
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .box__icon' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
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
					'{{WRAPPER}} .box__icon' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .box__icon' => 'left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon,{{WRAPPER}} .box__icon img' => 'transition: {{SIZE}}s;',
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
					'{{WRAPPER}} .box__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

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
				'selector' => '{{WRAPPER}} .box__title',
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
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .box__title, {{WRAPPER}} .box__title a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .box__title a:hover, {{WRAPPER}} .box__title a:focus' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} :hover .box__title a, {{WRAPPER}} :focus .box__title a, {{WRAPPER}} :hover .box__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Title Margin
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

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
				'label' => __( 'Before / After', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'title_before_after_tab_style' );
		$this->start_controls_tab(
			'title_before_tab',
			[
				'label' => __( 'BEFORE', 'bilalmghl' ),
			]
		);

		// Title Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'before_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .box__title:before',
			]
		);

		// Title Before Display;
		$this->add_responsive_control(
			'title_before_display',
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
					'{{WRAPPER}} .box__title:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Title Before Postion
		$this->add_responsive_control(
			'before_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'relative',
				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .box__title:before' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .box__icon' => 'left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Title Before Align
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
					'{{WRAPPER}} .box__title:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Title Before Width
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
					'{{WRAPPER}} .box__title:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title Before Height
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
					'{{WRAPPER}} .box__title:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title Before Opacity
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
					'{{WRAPPER}} .box__title:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Title Before Z-Index
		$this->add_control(
			'before_zindex',
			[
				'label'     => __( 'Z-Index', 'bilalmghl' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .box__title:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Title Before Margin
		$this->add_responsive_control(
			'title_before_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__title:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_after_tab',
			[
				'label' => __( 'AFTER', 'bilalmghl' ),
			]
		);

		// Title After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'after_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .box__title:after',
			]
		);

		// Title After Display;
		$this->add_responsive_control(
			'title_after_display',
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
					'{{WRAPPER}} .box__title:after' => 'display: {{VALUE}};',
				],
			]
		);

		// Title After Postion
		$this->add_responsive_control(
			'after_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'relative',
				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .box__title:after' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .box__icon' => 'left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .box__icon' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Title After Align
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
					'{{WRAPPER}} .box__title:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Title After Width
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
					'{{WRAPPER}} .box__title:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title After Height
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
					'{{WRAPPER}} .box__title:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title After Opacity
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
					'{{WRAPPER}} .box__title:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Title After Z-Index
		$this->add_control(
			'after_zindex',
			[
				'label'     => __( 'Z-Index', 'bilalmghl' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .box__title:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Title After Margin
		$this->add_responsive_control(
			'title_after_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__title:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				'label' => __( 'Subtitle', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .box__subtitle',
			]
		);

		// Subtitle Color
		$this->add_control(
			'subtitle_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .box__subtitle' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} :hover .box__subtitle' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .box__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SUBTITLE STYLE END
		-----------------------------*/

		/*----------------------------
			INPUT STYLE
		-----------------------------*/
		$this->start_controls_section(
			'input_style_section',
			[
				'label' => __( 'Input', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Display;
		$this->add_responsive_control(
			'input_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'inline-block',
				
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .form-control' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'input_float',
			[
				'label'   => __( 'Float', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left'  =>  __( 'Left', 'bilalmghl' ),
					'right' =>  __( 'Right', 'bilalmghl' ),
					'none'  =>  __( 'None', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .form-control' => 'float:{{VALUE}};',
				],
			]
		);

		// Button Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'input_typography',
				'selector' => '{{WRAPPER}} .form-control',
			]
		);

		// Button Hr
		$this->add_control(
			'normal_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);


		$this->start_controls_tabs( 'input_tab_style' );
		$this->start_controls_tab(
			'input_normal_tab',
			[
				'label' => __( 'Normal', 'bilalmghl' ),
			]
		);

		// Button Color
		$this->add_control(
			'input_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} a.form-control, {{WRAPPER}} .form-control' => 'color: {{VALUE}};',
				],
			]
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'input_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .form-control',
			]
		);

		// Button Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'input_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .form-control',
			]
		);

		// Button Radius
		$this->add_control(
			'input_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Button Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'input_shadow',
				'selector' => '{{WRAPPER}} .form-control',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'input_hover_tab',
			[
				'label' => __( 'Hover', 'bilalmghl' ),
			]
		);

		// Button Hover Color
		$this->add_control(
			'hover_input_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .form-control:hover, {{WRAPPER}} a.form-control:focus, {{WRAPPER}} .form-control:focus' => 'color: {{VALUE}};',
				],
			]
		);

		// Button Hover BG
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_input_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .form-control:hover,{{WRAPPER}} .form-control:focus',
			]
		);	

		// Button Radius
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_input_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .form-control:hover,{{WRAPPER}} .form-control:focus',
			]
		);

		// Button Hover Radius
		$this->add_control(
			'hover_input_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .form-control:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Hover Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_input_shadow',
				'selector' => '{{WRAPPER}} .form-control:hover',
			]
		);

		// Button Hover Animation
		$this->add_control(
			'input_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'bilalmghl' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .form-control:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Button Hr
		$this->add_control(
			'input_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Width
		$this->add_responsive_control(
			'input_width',
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
					'{{WRAPPER}} .form-control' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'input_height',
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
					'{{WRAPPER}} .form-control' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Hr
		$this->add_control(
			'input_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Button Margin
		$this->add_responsive_control(
			'input_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .form-control' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Padding
		$this->add_responsive_control(
			'input_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .form-control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			INPUT STYLE END
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

		// Display;
		$this->add_responsive_control(
			'button_display',
			[
				'label'   => __( 'Display', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'inline-block',
				
				'options' => [
					'initial'      => __( 'Initial', 'bilalmghl' ),
					'block'        => __( 'Block', 'bilalmghl' ),
					'inline-block' => __( 'Inline Block', 'bilalmghl' ),
					'flex'         => __( 'Flex', 'bilalmghl' ),
					'inline-flex'  => __( 'Inline Flex', 'bilalmghl' ),
					'none'         => __( 'none', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .oscar-btn' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_float',
			[
				'label'   => __( 'Float', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left'  =>  __( 'Left', 'bilalmghl' ),
					'right' =>  __( 'Right', 'bilalmghl' ),
					'none'  =>  __( 'None', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .oscar-btn' => 'float:{{VALUE}};',
				],
			]
		);
		// Button Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .oscar-btn',
			]
		);

		// Button Hr
		$this->add_control(
			'btn_hr',
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
					'{{WRAPPER}} a.oscar-btn, {{WRAPPER}} .oscar-btn' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .oscar-btn',
			]
		);

		// Button Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'button_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .oscar-btn',
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
					'{{WRAPPER}} .oscar-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Button Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'button_shadow',
				'selector' => '{{WRAPPER}} .oscar-btn',
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
					'{{WRAPPER}} .oscar-btn:hover, {{WRAPPER}} a.oscar-btn:focus, {{WRAPPER}} .oscar-btn:focus' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .oscar-btn:hover,{{WRAPPER}} .oscar-btn:focus',
			]
		);	

		// Button Radius
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_button_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .oscar-btn:hover,{{WRAPPER}} .oscar-btn:focus',
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
					'{{WRAPPER}} .oscar-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Hover Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_button_shadow',
				'selector' => '{{WRAPPER}} .oscar-btn:hover',
			]
		);

		// Button Hover Animation
		$this->add_control(
			'button_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'bilalmghl' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .oscar-btn:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Button Hr
		$this->add_control(
			'button_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Width
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
					'{{WRAPPER}} .oscar-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
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
					'{{WRAPPER}} .oscar-btn' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .oscar-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .oscar-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

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

		// Box Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} .mailchimp_from__box',
			]
		);

		// Box Default Color
		$this->add_control(
			'box_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mailchimp_from__box' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Color
		$this->add_control(
			'hover_box_color',
			[
				'label'  => __( 'Box Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} :hover .mailchimp_from__box' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Align
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
				'default' => 'center',
			]
		);

		// Box Transition
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
			]
		);

		// Postion
		$this->add_responsive_control(
			'box_position',
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
					'{{WRAPPER}}' => 'position: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			BOX STYLE END
		-----------------------------*/
		
	}
	
	protected function render() {

		$r_id = rand(5655,5874);

		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'form_outer', 'class', $settings['content_layout_style'] );

		// Button Link Attr
		if ( 'yes' == $settings['show_button'] ) {
			$this->add_render_attribute( 'submit_button', 'class', 'oscar-btn' );
			if ( !empty( $settings['button_hover_animation'] ) ) {
				$this->add_render_attribute( 'submit_button', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
			}
			$this->add_render_attribute( 'submit_button', 'type', 'submit' );
		}
		
		// Button animation
		if ( $settings['button_hover_animation'] ) {
			$button_animation = 'elementor-animation-' . $settings['button_hover_animation'];
		}else{
			$button_animation = '';
		}


		// Icon Animation
		if ( $settings['icon_hover_animation'] ) {
			$icon_animation = 'elementor-animation-' . $settings['icon_hover_animation'];
		}else{
			$icon_animation = '';
		}

		// Icon Condition
		if ( 'yes' == $settings['show_icon'] ) {
			if ( 'font_icon' == $settings['icon_type'] && !empty( $settings['font_icon'] ) ) {
				$icon = '<div class="box__icon '. esc_attr( $icon_animation ) .'">'.bilalmghl_render_icons( $settings['font_icon'] ).'</div>';
			}elseif( 'image_icon' == $settings['icon_type'] && !empty( $settings['image_icon'] ) ){
				$icon_array = $settings['image_icon'];
				$icon_link = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
				$icon = '<div class="box__icon '. esc_attr( $icon_animation ) .'"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
			}
		}else{
			$icon = '';
		}

		// Title Tag
		if ( !empty( $settings['title_tag'] ) ) {
			$title_tag = $settings['title_tag'];
		}else{
			$title_tag = 'div';
		}

		// Title
		if ( !empty( $settings['title'] ) ) {
			$title = '<'.$title_tag.' class="box__title">'.wpautop( $settings['title'] ).'</'.$title_tag.'>';	
		}else{
			$title = '';
		}

		// Subtitle
		if ( !empty( $settings['subtitle'] ) ) {
			$subtitle = '<div class="box__subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
		}else{
			$subtitle = '';
		}

		// Description
		if ( !empty( $settings['description'] ) ) {
			$description = '<div class="box__description">'.wpautop( $settings['description'] ).'</div>';
		}
		
		// Button
		if ( 'yes' == $settings['show_button'] && !empty($settings['button_text'] )  ) {
			$button = '<button '.$this->get_render_attribute_string( 'submit_button' ).'>'. esc_html( $settings['button_text'] ) .'</button>';
		}

		// Button With Icon
		if ( !empty(  $settings['button_icon'] ) ) {
			if (  'left' == $settings['button_icon_align'] ) {
				$button = '<button '.$this->get_render_attribute_string( 'submit_button' ).'>' . bilalmghl_render_icons( $settings['button_icon'], 'oscar-btn_icon_left' ) . esc_html( $settings['button_text'] ) .'</button>';
			}elseif( 'right' == $settings['button_icon_align'] ){
				$button = '<button '.$this->get_render_attribute_string( 'submit_button' ).'>'. esc_html( $settings['button_text'] ) . bilalmghl_render_icons( $settings['button_icon'], 'oscar-btn_icon_right' ) . '</button>';
			}
		}

		// Title Condition
		if ( 'before_title' == $settings['subtitle_position'] ) {
			$title_subtitle = $subtitle . $title;
		}elseif( 'after_title' == $settings['subtitle_position'] ){
			$title_subtitle = $title . $subtitle;
		}elseif( empty($settings['subtitle']) ){
			$title_subtitle = $title . $subtitle;
		}

		if( !empty( $settings['mailchimp_post_url'] ) ){
			$post_url = $settings['mailchimp_post_url'];
		}else{
			$post_url = 'http://intimissibd.us14.list-manage.com/subscribe/post?u=a77a312486b6e42518623c58a&amp;id=4af1f9af4c';
		}

		if ( !empty( $settings['placeholder_text'] ) ) {
			$placeholder_text = $settings['placeholder_text'];
		}else{
			$placeholder_text = 'email@example.com';
		}

		$parse_data = array(
			'random_id'   => $r_id,
			'post_url'    => $post_url,
			'placeholder' => $placeholder_text,
		);

		$form = '
		<form id="mc__form__'.$r_id.'" class="mailchimp-subscriber-form">
			<label class="subscribe__label" for="mc__email__'.$r_id.'"></label>
	        <input class="form-control" type="email" id="mc__email__'.$r_id.'" placeholder="'.esc_attr( $placeholder_text ).'">
	        '.( isset( $button ) ? $button : '' ).'
		</form>';

		$this->add_render_attribute( 'subscriber-form-attr', 'class', 'mailchimp_from__box' );
		$this->add_render_attribute( 'subscriber-form-attr', 'data-value', wp_json_encode( $parse_data ) );

		echo'
		<div '.$this->get_render_attribute_string('form_outer').'>	
			<div '.$this->get_render_attribute_string('subscriber-form-attr').'>				
				'.( isset( $icon ) ? $icon : '' ).'
				'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
				'.( isset( $description ) ? $description : '' ).'
				'.( isset( $form ) ? $form : '' ).'
			</div>
		</div>
		';
	}

	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Oscar_Subscriber_Widget() );