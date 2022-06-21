<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class bilalmghl_Positions_Element extends Widget_Base {

	public function get_name() {
		return 'PositionElement';
	}

	public function get_title() {
		return __( 'Ul Position Element', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-drag-n-drop';
	}

	public function get_categories() {
		return array('bilalmghl-addons');
	}

    public function get_keywords() {
        return[
            'postion element',
            'position',
            'element',
            'shape',
        ];
    }

	public static function get_animation_style(){
		return [
			'Zoom_In_Out animated'        => __('Zoom_In_Out', 'bilalmghl'),
			'Circle_Large animated'       => __('Circle_Large', 'bilalmghl'),
			'Fade_In_Out animated'        => __('Fade_In_Out', 'bilalmghl'),
			'littleCircle animated'       => __('littleCircle', 'bilalmghl'),
			'bigCircle animated'          => __('bigCircle', 'bilalmghl'),
			'Hoop animated'               => __('Hoop', 'bilalmghl'),
			'triAngle animated'           => __('triAngle', 'bilalmghl'),
			'littleSquare animated'       => __('littleSquare', 'bilalmghl'),
			'bigSquare animated'          => __('bigSquare', 'bilalmghl'),
			'fadeInRotate animated'       => __('fadeInRotate', 'bilalmghl'),
			'fadeInBack animated'         => __('fadeInBack', 'bilalmghl'),
			'blurFadeIn animated'         => __('blurFadeIn', 'bilalmghl'),
			'blurFadeInOut animated'      => __('blurFadeInOut', 'bilalmghl'),
			'ballBounce animated'         => __('ballBounce', 'bilalmghl'),
			'zoomBounce animated'         => __('zoomBounce', 'bilalmghl'),
			'FramesOne animated'          => __('FramesOne', 'bilalmghl'),
			'FramesTwo animated'          => __('FramesTwo', 'bilalmghl'),
			'FramesThree animated'        => __('FramesThree', 'bilalmghl'),
			'FramesFour animated'         => __('FramesFour', 'bilalmghl'),
			'FramesFive animated'         => __('FramesFive', 'bilalmghl'),
			'scaleUpOne animated'         => __('scaleUpOne', 'bilalmghl'),
			'scaleUpOne animated'         => __('scaleUpOne', 'bilalmghl'),
			'scaleUpTwo animated'         => __('scaleUpTwo', 'bilalmghl'),
			'scaleUpThree animated'       => __('scaleUpThree', 'bilalmghl'),
			'prettyFade animated'         => __('prettyFade', 'bilalmghl'),
			'fade_in animated'            => __('fade_in', 'bilalmghl'),
			'scaleRight animated'         => __('scaleRight', 'bilalmghl'),
			'scaleUpOne animated'         => __('scaleUpOne', 'bilalmghl'),
			'bigSpin animated'            => __('bigSpin', 'bilalmghl'),
			'rotated animated'            => __('rotated', 'bilalmghl'),
			'rotatedHalf animated'        => __('rotatedHalf', 'bilalmghl'),
			'rotatedHalfTwo animated'     => __('rotatedHalfTwo', 'bilalmghl'),
			'jump animated'               => __('jump', 'bilalmghl'),
			'imageBgAnim animated'        => __('imageBgAnim', 'bilalmghl'),
			'bgMove animated'             => __('bgMove', 'bilalmghl'),
			'gradientBG animated'         => __('gradientBG', 'bilalmghl'),
			'rippleOutOne animated'       => __('rippleOutOne', 'bilalmghl'),
			'rippleOuTwo animated'        => __('rippleOuTwo', 'bilalmghl'),
			'bounce animated'             => __('bounce','bilalmghl'),
			'flash animated'              => __('flash','bilalmghl'),
			'pulse animated'              => __('pulse','bilalmghl'),
			'rubberBand animated'         => __('rubberBand','bilalmghl'),
			'shake animated'              => __('shake','bilalmghl'),
			'headShake animated'          => __('headShake','bilalmghl'),
			'swing animated'              => __('swing','bilalmghl'),
			'tada animated'               => __('tada','bilalmghl'),
			'wobble animated'             => __('wobble','bilalmghl'),
			'jello animated'              => __('jello','bilalmghl'),
			'heartBeat animated'          => __('heartBeat','bilalmghl'),
			'bounceIn animated'           => __('bounceIn','bilalmghl'),
			'bounceInDown animated'       => __('bounceInDown','bilalmghl'),
			'bounceInLeft animated'       => __('bounceInLeft','bilalmghl'),
			'bounceInRight animated'      => __('bounceInRight','bilalmghl'),
			'bounceInUp animated'         => __('bounceInUp','bilalmghl'),
			'bounceOut animated'          => __('bounceOut','bilalmghl'),
			'bounceOutDown animated'      => __('bounceOutDown','bilalmghl'),
			'bounceOutLeft animated'      => __('bounceOutLeft','bilalmghl'),
			'bounceOutRight animated'     => __('bounceOutRight','bilalmghl'),
			'bounceOutUp animated'        => __('bounceOutUp','bilalmghl'),
			'fadeIn animated'             => __('fadeIn','bilalmghl'),
			'fadeInDown animated'         => __('fadeInDown','bilalmghl'),
			'fadeInDownBig animated'      => __('fadeInDownBig','bilalmghl'),
			'fadeInLeft animated'         => __('fadeInLeft','bilalmghl'),
			'fadeInLeftBig animated'      => __('fadeInLeftBig','bilalmghl'),
			'fadeInRight animated'        => __('fadeInRight','bilalmghl'),
			'fadeInRightBig animated'     => __('fadeInRightBig','bilalmghl'),
			'fadeInUp animated'           => __('fadeInUp','bilalmghl'),
			'fadeInUpBig animated'        => __('fadeInUpBig','bilalmghl'),
			'fadeOut animated'            => __('fadeOut','bilalmghl'),
			'fadeOutDown animated'        => __('fadeOutDown','bilalmghl'),
			'fadeOutDownBig animated'     => __('fadeOutDownBig','bilalmghl'),
			'fadeOutLeft animated'        => __('fadeOutLeft','bilalmghl'),
			'fadeOutLeftBig animated'     => __('fadeOutLeftBig','bilalmghl'),
			'fadeOutRight animated'       => __('fadeOutRight','bilalmghl'),
			'fadeOutRightBig animated'    => __('fadeOutRightBig','bilalmghl'),
			'fadeOutUp animated'          => __('fadeOutUp','bilalmghl'),
			'fadeOutUpBig animated'       => __('fadeOutUpBig','bilalmghl'),
			'flip animated'               => __('flip','bilalmghl'),
			'flipInX animated'            => __('flipInX','bilalmghl'),
			'flipInY animated'            => __('flipInY','bilalmghl'),
			'flipOutX animated'           => __('flipOutX','bilalmghl'),
			'flipOutY animated'           => __('flipOutY','bilalmghl'),
			'lightSpeedIn animated'       => __('lightSpeedIn','bilalmghl'),
			'lightSpeedOut animated'      => __('lightSpeedOut','bilalmghl'),
			'rotateIn animated'           => __('rotateIn','bilalmghl'),
			'rotateInDownLeft animated'   => __('rotateInDownLeft','bilalmghl'),
			'rotateInDownRight animated'  => __('rotateInDownRight','bilalmghl'),
			'rotateInUpLeft animated'     => __('rotateInUpLeft','bilalmghl'),
			'rotateInUpRight animated'    => __('rotateInUpRight','bilalmghl'),
			'rotateOut animated'          => __('rotateOut','bilalmghl'),
			'rotateOutDownLeft animated'  => __('rotateOutDownLeft','bilalmghl'),
			'rotateOutDownRight animated' => __('rotateOutDownRight','bilalmghl'),
			'rotateOutUpLeft animated'    => __('rotateOutUpLeft','bilalmghl'),
			'rotateOutUpRight animated'   => __('rotateOutUpRight','bilalmghl'),
			'hinge animated'              => __('hinge','bilalmghl'),
			'jackInTheBox animated'       => __('jackInTheBox','bilalmghl'),
			'rollIn animated'             => __('rollIn','bilalmghl'),
			'rollOut animated'            => __('rollOut','bilalmghl'),
			'zoomIn animated'             => __('zoomIn','bilalmghl'),
			'zoomInDown animated'         => __('zoomInDown','bilalmghl'),
			'zoomInLeft animated'         => __('zoomInLeft','bilalmghl'),
			'zoomInRight animated'        => __('zoomInRight','bilalmghl'),
			'zoomInUp animated'           => __('zoomInUp','bilalmghl'),
			'zoomOut animated'            => __('zoomOut','bilalmghl'),
			'zoomOutDown animated'        => __('zoomOutDown','bilalmghl'),
			'zoomOutLeft animated'        => __('zoomOutLeft','bilalmghl'),
			'zoomOutRight animated'       => __('zoomOutRight','bilalmghl'),
			'zoomOutUp animated'          => __('zoomOutUp','bilalmghl'),
			'slideInDown animated'        => __('slideInDown','bilalmghl'),
			'slideInLeft animated'        => __('slideInLeft','bilalmghl'),
			'slideInRight animated'       => __('slideInRight','bilalmghl'),
			'slideInUp animated'          => __('slideInUp','bilalmghl'),
			'slideOutDown animated'       => __('slideOutDown','bilalmghl'),
			'slideOutLeft animated'       => __('slideOutLeft','bilalmghl'),
			'slideOutRight animated'      => __('slideOutRight','bilalmghl'),
			'slideOutUp animated'         => __('slideOutUp','bilalmghl'),
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

			// Icon Type
			$this->add_control(
				'postion_element_type',
				[
					'label'   => __( 'Element Type', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'postion_element_font_or_svg_icon',
					'options' => [
						'postion_element_font_or_svg_icon' => __( 'Font Icon / SVG', 'bilalmghl' ),
						'postion_element_image'            => __( 'Image Icon / Image', 'bilalmghl' ),
						'postion_element_text'             => __( 'Simple Text', 'bilalmghl' ),
						'postion_element_shape'            => __( 'Blank Shape', 'bilalmghl' ),
					],
				]
			);

			// Font Icon
			$this->add_control(
				'postion_element_font_or_svg_icon',
				[
					'label'       => __( 'Font Icons', 'bilalmghl' ),
					'type'        => Controls_Manager::ICONS,
					'label_block' => true,
					'default'     => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
						'postion_element_type' => 'postion_element_font_or_svg_icon',
					],
				]
			);

			// Image Icon
			$this->add_control(
				'postion_element_image',
				[
					'label'   => __( 'Image Icon / Image', 'bilalmghl' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'postion_element_type' => 'postion_element_image',
					],
				]
			);

			// Image size
			$this->add_group_control(
				Group_Control_Image_Size:: get_type(),
				[
					'name'      => 'postion_element_image_size',
					'default'   => 'thumbnail',
					'condition' => [
						'postion_element_type' => 'postion_element_image',
					],
				]
			);

			// Title
			$this->add_control(
				'title',
				[
					'label'       => __( 'Text', 'bilalmghl' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Title', 'bilalmghl' ),
					'condition'   => [
						'postion_element_type' => 'postion_element_text',
					],
				]
			);

			// Animation
			$this->add_control(
				'element_animation',
				[
					'label'   => __( 'Element Animation', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'no',
					'options' => [
						'yes' => __( 'Yes', 'bilalmghl' ),
						'no'  => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Custom Animate
			$this->add_control(
				'element_animation_type',
				[
					'label'     => __( 'Custom Animate Type', 'bilalmghl' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'fadeIn',
					'options'   => self::get_animation_style(),
					'condition' => [
						'element_animation' => 'yes',
					]
				]
			);

			// Speed
			$this->add_control(
				'element_animation_speed',
				[
					'label'   => __( 'Animation Speed', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'no',
					'options' => [
						'fast'   => __( 'Fast', 'bilalmghl' ),
						'faster' => __( 'Faster', 'bilalmghl' ),
						'slow'   => __( 'Slow', 'bilalmghl' ),
						'slower' => __( 'Slower', 'bilalmghl' ),
					],
					'condition' => [
						'element_animation' => 'yes',
					]
				]
			);

			// Infinite
			$this->add_control(
				'element_animation_infinite',
				[
					'label'   => __( 'Infine Animation', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'no',
					'options' => [
						'infinite' => __( 'Yes', 'bilalmghl' ),
						'normal'   => __( 'No', 'bilalmghl' ),
					],
					'condition' => [
						'element_animation' => 'yes',
					]
				]
			);

			// Mode
			$this->add_control(
				'element_animation_direction',
				[
					'label'   => __( 'Animation Direction', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'normal',
					'options' => [
						'normal'            => __( 'Normal', 'bilalmghl' ),
						'alternate'         => __( 'Alternate', 'bilalmghl' ),
						'reverse'           => __( 'Reverse', 'bilalmghl' ),
						'alternate-reverse' => __( 'Alternate Reverse', 'bilalmghl' ),
					],
					'condition' => [
						'element_animation' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .posiion__element__wrap' => '-webkit-animation-direction: {{VALUE}};  animation-direction: {{VALUE}};',
					],
				]
			);

			// Mode
			$this->add_control(
				'element_animation_custom_speed',
				[
					'label' => __( 'Animation Custom Duration', 'bilalmghl' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min'  => 0.5,
							'max'  => 100,
							'step' => 0.5,
						],
					],
					'default' => [
						'size' => 1,
					],
					'selectors' => [
						'{{WRAPPER}} .posiion__element__wrap' => '-webkit-animation-duration: {{SIZE}}s;  animation-duration: {{SIZE}}s;',
					],
					'condition' => [
						'element_animation' => 'yes',
					]
				]
			);

		$this->end_controls_section();

		/*********************************
		 * 		STYLE SECTION
		 *********************************/

		/*----------------------------
			ELEMENT STYLE
		-----------------------------*/
		$this->start_controls_section(
			'element_style_section',
			[
				'label' => __( 'Position Element', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			/* $this->add_responsive_control(
				'_element_width',
				[
					'label'   => __( 'Width', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'auto',
					'options' => [
						''        => __( 'Default', 'bilalmghl' ),
						'inherit' => __( 'Full Width', 'bilalmghl' ) . ' (100%)',
						'auto'    => __( 'Inline', 'bilalmghl' ) . ' (auto)',
						'initial' => __( 'Custom', 'bilalmghl' ),
					],
					'selectors_dictionary' => [
						'inherit' => '100%',
					],
					'prefix_class' => 'elementor-widget%s__width-',
					'selectors'    => [
						'{{WRAPPER}}' => 'width: {{VALUE}}; max-width: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'_element_custom_width',
				[
					'label' => __( 'Custom Width', 'bilalmghl' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'max'  => 100,
							'step' => 1,
						],
					],
					'condition' => [
						'_element_width' => 'initial',
					],
					'device_args' => [
						Controls_Stack::RESPONSIVE_TABLET => [
							'condition' => [
								'_element_width_tablet' => [ 'initial' ],
							],
						],
						Controls_Stack::RESPONSIVE_MOBILE => [
							'condition' => [
								'_element_width_mobile' => [ 'initial' ],
							],
						],
					],
					'size_units' => [ 'px', '%', 'vw' ],
					'selectors'  => [
						'{{WRAPPER}}' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'_element_vertical_align',
				[
					'label'   => __( 'Vertical Align', 'bilalmghl' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => __( 'Start', 'bilalmghl' ),
							'icon'  => 'eicon-v-align-top',
						],
						'center' => [
							'title' => __( 'Center', 'bilalmghl' ),
							'icon'  => 'eicon-v-align-middle',
						],
						'flex-end' => [
							'title' => __( 'End', 'bilalmghl' ),
							'icon'  => 'eicon-v-align-bottom',
						],
					],
					'condition' => [
						'_element_width!' => '',
						'_position'       => '',
					],
					'selectors' => [
						'{{WRAPPER}}' => 'align-self: {{VALUE}}',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'_position_description',
				[
					'raw'             => '<strong>' . __( 'Please note!', 'bilalmghl' ) . '</strong> ' . __( 'Custom positioning is not considered best practice for responsive web design and should not be used too frequently.', 'bilalmghl' ),
					'type'            => Controls_Manager::RAW_HTML,
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
					'render_type'     => 'ui',
					'condition'       => [
						'_position!' => '',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'_position',
				[
					'label'   => __( 'Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',
					'options' => [
						''         => __( 'Default', 'bilalmghl' ),
						'absolute' => __( 'Absolute', 'bilalmghl' ),
						'relative' => __( 'Relative', 'bilalmghl' ),
						'fixed'    => __( 'Fixed', 'bilalmghl' ),
					],
					'prefix_class'       => 'elementor-',
					'frontend_available' => true,
					'separator'          => 'before',
				]
			);

			$start = is_rtl() ? __( 'Right', 'bilalmghl' ) : __( 'Left', 'bilalmghl' );
			$end   = ! is_rtl() ? __( 'Right', 'bilalmghl' ) : __( 'Left', 'bilalmghl' );

			$this->add_control(
				'_offset_orientation_h',
				[
					'label'   => __( 'Horizontal Orientation', 'bilalmghl' ),
					'type'    => Controls_Manager::CHOOSE,
					'toggle'  => false,
					'default' => 'start',
					'options' => [
						'start' => [
							'title' => $start,
							'icon'  => 'eicon-h-align-left',
						],
						'end' => [
							'title' => $end,
							'icon'  => 'eicon-h-align-right',
						],
					],
					'classes'     => 'elementor-control-start-end',
					'render_type' => 'ui',
					'condition'   => [
						'_position!' => '',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'_offset_x',
				[
					'label' => __( 'Offset', 'bilalmghl' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -200,
							'max' => 200,
						],
						'vw' => [
							'min' => -200,
							'max' => 200,
						],
						'vh' => [
							'min' => -200,
							'max' => 200,
						],
					],
					'default' => [
						'size' => '0',
					],
					'size_units' => [ 'px', '%', 'vw', 'vh' ],
					'selectors'  => [
						'body:not(.rtl) {{WRAPPER}}' => 'left: {{SIZE}}{{UNIT}}',
						'body.rtl {{WRAPPER}}'       => 'right: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'_offset_orientation_h!' => 'end',
						'_position!'             => '',
					],
				]
			);

			$this->add_responsive_control(
				'_offset_x_end',
				[
					'label' => __( 'Offset', 'bilalmghl' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 0.1,
						],
						'%' => [
							'min' => -200,
							'max' => 200,
						],
						'vw' => [
							'min' => -200,
							'max' => 200,
						],
						'vh' => [
							'min' => -200,
							'max' => 200,
						],
					],
					'default' => [
						'size' => '0',
					],
					'size_units' => [ 'px', '%', 'vw', 'vh' ],
					'selectors'  => [
						'body:not(.rtl) {{WRAPPER}}' => 'right: {{SIZE}}{{UNIT}}',
						'body.rtl {{WRAPPER}}'       => 'left: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'_offset_orientation_h' => 'end',
						'_position!'            => '',
					],
				]
			);

			$this->add_control(
				'_offset_orientation_v',
				[
					'label'   => __( 'Vertical Orientation', 'bilalmghl' ),
					'type'    => Controls_Manager::CHOOSE,
					'toggle'  => false,
					'default' => 'start',
					'options' => [
						'start' => [
							'title' => __( 'Top', 'bilalmghl' ),
							'icon'  => 'eicon-v-align-top',
						],
						'end' => [
							'title' => __( 'Bottom', 'bilalmghl' ),
							'icon'  => 'eicon-v-align-bottom',
						],
					],
					'render_type' => 'ui',
					'condition'   => [
						'_position!' => '',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'_offset_y',
				[
					'label' => __( 'Offset', 'bilalmghl' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -200,
							'max' => 200,
						],
						'vh' => [
							'min' => -200,
							'max' => 200,
						],
						'vw' => [
							'min' => -200,
							'max' => 200,
						],
					],
					'size_units' => [ 'px', '%', 'vh', 'vw' ],
					'default'    => [
						'size' => '0',
					],
					'selectors' => [
						'{{WRAPPER}}' => 'top: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'_offset_orientation_v!' => 'end',
						'_position!'             => '',
					],
				]
			);

			$this->add_responsive_control(
				'_offset_y_end',
				[
					'label' => __( 'Offset', 'bilalmghl' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -200,
							'max' => 200,
						],
						'vh' => [
							'min' => -200,
							'max' => 200,
						],
						'vw' => [
							'min' => -200,
							'max' => 200,
						],
					],
					'size_units' => [ 'px', '%', 'vh', 'vw' ],
					'default'    => [
						'size' => '0',
					],
					'selectors' => [
						'{{WRAPPER}}' => 'bottom: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'_offset_orientation_v' => 'end',
						'_position!'            => '',
					],
				]
			); */



			$this->add_responsive_control(
				'postion_element_width',
				[
					'label'      => __( 'Element Fixed Width', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px','vw','%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
						'vw' => [
							'min'  => -100,
							'max'  => 100,
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
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'postion_element_height',
				[
					'label'      => __( 'Element Fixed Height', 'bilalmghl' ),
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

			$this->add_responsive_control(
				'warapper_width',
				[
					'label'      => __( 'Content Warapper Width', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'vw' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 2000,
							'step' => 1,
						],
						'%' => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],
						'vw' => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .posiion__element__item' => 'width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'warapper_height',
				[
					'label'      => __( 'Content Warapper Height', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'vw' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 2000,
							'step' => 1,
						],
						'%' => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],
						'vw' => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .posiion__element__item' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'postion_element_image_size_width',
				[
					'label'      => __( 'Image Width', 'bilalmghl' ),
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
						'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'postion_element_type' => ['postion_element_image']
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'postion_element_image_size_height',
				[
					'label'      => __( 'Image Height', 'bilalmghl' ),
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
						'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'postion_element_type' => ['postion_element_image']
					],
				]
			);

			$this->add_group_control(
				Group_Control_Css_Filter:: get_type(),
				[
					'name'      => 'position_element_image_filters',
					'label'     => __( 'Image Filter', 'bilalmghl' ),
					'selector'  => '{{WRAPPER}} img',
					'condition' => [
						'postion_element_type' => ['postion_element_image']
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'position_element_color',
				[
					'label'     => __( 'Color', 'bilalmghl' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .posiion__element__item' => 'color: {{VALUE}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'      => 'position_element_typography',
					'selector'  => '{{WRAPPER}} .posiion__element__item',
					'condition' => [
						'postion_element_type' => ['postion_element_font_or_svg_icon','postion_element_text']
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'position_element_background',
					'label'    => __( 'Background', 'bilalmghl' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .posiion__element__item',
				]
			);

			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'      => 'position_element_border',
					'label'     => __( 'Border', 'bilalmghl' ),
					'selector'  => '{{WRAPPER}} .posiion__element__item',
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'position_element_radius',
				[
					'label'      => __( 'Border Radius', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .posiion__element__item, {{WRAPPER}} .posiion__element__item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'position_element_shadow',
					'selector' => '{{WRAPPER}} .posiion__element__item',
				]
			);
			
			$this->add_responsive_control(
				'position_element_display',
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
						'{{WRAPPER}}' => 'display: {{VALUE}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'position_element_align',
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

			$this->add_control(
				'position_element_zindex',
				[
					'label'     => __( 'Z-Index', 'bilalmghl' ),
					'type'      => Controls_Manager::NUMBER,
					'min'       => -99,
					'max'       => 99,
					'step'      => 1,
					'selectors' => [
						'{{WRAPPER}}' => 'z-index: {{SIZE}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'position_element_opacity',
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
						'{{WRAPPER}}' => 'opacity: {{SIZE}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'postion_elemnent_margin',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .posiion__element__item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'postion_elemnent_padding',
				[
					'label'      => __( 'Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .posiion__element__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/*----------------------------
			ICON STYLE END
		-----------------------------*/		
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'posiion__element__wrap_attr', 'class', 'posiion__element__wrap' );
		$this->add_render_attribute( 'posiion__element__wrap_attr', 'class', $settings['element_animation_type'] );
		$this->add_render_attribute( 'posiion__element__wrap_attr', 'class', $settings['element_animation_infinite'] );
		$this->add_render_attribute( 'posiion__element__wrap_attr', 'class', $settings['element_animation_speed'] );
		$this->add_render_attribute( 'posiion__element__wrap_attr', 'class', $settings['element_animation_infinite'] );

		// Icon Condition
		if ( 'postion_element_font_or_svg_icon' == $settings['postion_element_type'] && !empty( $settings['postion_element_font_or_svg_icon'] ) ) {
			$element = '<div class="posiion__element__item">'.bilalmghl_render_icons( $settings['postion_element_font_or_svg_icon'] ).'</div>';
		}elseif( 'postion_element_image' == $settings['postion_element_type'] && !empty( $settings['postion_element_image'] ) ){
			$element_array = $settings['postion_element_image'];
			$element_link  = wp_get_attachment_image_url( $element_array['id'], 'thumbnail' );
			$image         = Group_Control_Image_Size::get_attachment_image_html( $settings, 'postion_element_image_size', 'postion_element_image');
			$element       = '<div class="posiion__element__item">'.$image.'</div>';
		}elseif ( 'postion_element_text' == $settings['postion_element_type'] && !empty( $settings['title'] ) ) {
			$element = '<div class="posiion__element__item">'.esc_html( $settings['title'] ).'</div>';
		}elseif ( 'postion_element_shape' == $settings['postion_element_type'] ) {
			$element = '<div class="posiion__element__item"></div>';
		}else{
			$element = '';
		}

		echo '<div '.$this->get_render_attribute_string('posiion__element__wrap_attr').'>
				'.( isset( $element ) ? $element : '' ).'
			</div>';

	}

	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Positions_Element() );