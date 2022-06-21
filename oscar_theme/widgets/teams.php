<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class bilalmghl_Teams extends Widget_Base {

	public function get_name() {
		return 'bilalmghlTeams';
	}

	public function get_title() {
		return __( 'Ul Teams', 'bilalmghl' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return array('bilalmghl-addons');
	}

	public function get_script_depends() {
		return[
			'owl-carousel',
			'bilalmghl-core',
		];
	}
	public function get_style_depends() {
		return[
			'owl-carousel',
		];
	}

	public function get_keywords() {
        return[
            'teams',
            'teams slider',
            'team',
            'team member',
        ];
    }

	public static function team_style(){
		return [
			'team__style__1'      => 'Team Style 1',
			'team__style__2'      => 'Team Style 2',
			'team__style__3'      => 'Team Style 3',
			'team__style__4'      => 'Team Style 4',
			'team__style__5'      => 'Team Style 5',
			'team__style__6'      => 'Team Style 6',
			'team__style__7'      => 'Team Style 7',
			'team__style__8'      => 'Team Style 8',
			'team__style__9'      => 'Team Style 9',
			'team__style__10'     => 'Team Style 10',
			'team__custom__style' => 'Team Custom Style',
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
			'team_style',
			[
				'label'   => __( 'Team Style', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'team_style_1',
				'options' => self::team_style(),
			]
		);

		$repeater = new Repeater();

		// Member Name
		$repeater->add_control(
			'member_thumb',
			[
				'label'   => __( 'Member Thumb', 'bilalmghl' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size:: get_type(),
			[
				'name'    => 'member_thumb_size',
				'default' => 'full',
			]
		);

		// Member Name
		$repeater->add_control(
			'member_name',
			[
				'label'       => __( 'Member Name', 'bilalmghl' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Member Name', 'bilalmghl' ),
			]
		);

		// Member Designation
		$repeater->add_control(
			'designation',
			[
				'label'       => __( 'Designation', 'bilalmghl' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Designation Or Company', 'bilalmghl' ),
			]
		);

		// Description
		$repeater->add_control(
			'description',
			[
				'label'       => __( 'Description', 'bilalmghl' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description.', 'bilalmghl' ),
			]
		);

		// Socials
		$repeater->add_control(
			'add_social',
			[
				'label'        => __( 'Add Social ?', 'bilalmghl' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'bilalmghl' ),
				'label_off'    => __( 'No', 'bilalmghl' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator' => 'before',
			]
		);

		// Facebook
		$repeater->add_control(
			'facebook_url',
			[
				'label'         => __( 'Facebook Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://facebook.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'facebook_icon',
			[
				'label'       => __( 'Facebook Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);	

		// Twitter
		$repeater->add_control(
			'twitter_url',
			[
				'label'         => __( 'Twitter Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://twitter.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'twitter_icon',
			[
				'label'       => __( 'Twitter Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);

		// Google
		$repeater->add_control(
			'google_url',
			[
				'label'         => __( 'Google Plus Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://plus.google.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'google_icon',
			[
				'label'       => __( 'Google+ Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-google-plus-g',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);	

		// Youtube
		$repeater->add_control(
			'youtube_url',
			[
				'label'         => __( 'Youtube Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://youtube.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'youtube_icon',
			[
				'label'       => __( 'YouTube Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-youtube',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);

		// vimeo
		$repeater->add_control(
			'vimeo_url',
			[
				'label'         => __( 'Vimeo Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://vimeo.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'vimeo_icon',
			[
				'label'       => __( 'Vimeo Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-vimeo-v',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);

		// Instagram
		$repeater->add_control(
			'instagram_url',
			[
				'label'         => __( 'Instagram Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://instagram.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'instagram_icon',
			[
				'label'       => __( 'Instagram Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);

		// linkedin
		$repeater->add_control(
			'linkedin_url',
			[
				'label'         => __( 'Linkedin Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://linkedin.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'linkedin_icon',
			[
				'label'       => __( 'Linkedin Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-linkedin-in',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);

		// pinterest
		$repeater->add_control(
			'pinterest_url',
			[
				'label'         => __( 'Pinterest Url', 'bilalmghl' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://pinterest.com/mehedidb', 'bilalmghl' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				],
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'pinterest_icon',
			[
				'label'       => __( 'Pinterest Icon', 'bilalmghl' ),
				'type'      => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-pinterest-p',
					'library' => 'brands',
				],
				'condition'   => [
					'add_social' => 'yes',
				],
			]
		);

		// Items
		$this->add_control(
			'team_content',
			[
				'label'   => __( 'Members Items', 'bilalmghl' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'member_name' => __( 'Mehdi Hasan', 'bilalmghl' ),
						'designation' => __( 'Web Developer' ),
					],
					[
						'member_name' => __( 'Niloy Khan', 'bilalmghl' ),
						'designation' => __( 'Web Developer' ),
					],
					[
						'member_name' => __( 'Abdur Rohman', 'bilalmghl' ),
						'designation' => __( 'CEO' ),
					],
					[
						'member_name' => __( 'Imon Ahmed', 'bilalmghl' ),
						'designation' => __( 'Research Specialist' ),
					],
				],
				'title_field' => '{{{ member_name }}}',
			]
		);

		$this->add_control(
			'slider_on',
			[
				'label'        => __( 'Slider On ?', 'bilalmghl' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'bilalmghl' ),
				'label_off'    => __( 'No', 'bilalmghl' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'separator'    => 'before',
			]
		);

		$this->end_controls_section();


		/******************************
		 * 	SLIDER OPTIONS SECTION
		 ******************************/
		$this->start_controls_section(
			'options_section',
			[
				'label' => __( 'Slider Options', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'slider_on' => 'yes',
				]
			]
		);

			// Item On Large ( 1920px )
			$this->add_control(
				'item_on_large',
				[
					'label'      => __( 'Item In large Device', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'size' => 3,
					],
				]
			);

			// Item On Medium ( 1200px )
			$this->add_control(
				'item_on_medium',
				[
					'label'      => __( 'Item In Medium Device', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'size' => 3,
					],
				]
			);

			// Item On Tablet ( 780px )
			$this->add_control(
				'item_on_tablet',
				[
					'label'      => __( 'Item In Tablet Device', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'size' => 2,
					],
				]
			);

			// Item On Large ( 480px )
			$this->add_control(
				'item_on_mobile',
				[
					'label'      => __( 'Item In Mobile Device', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 1,
						],
					],
					'default' => [
						'size' => 1,
					],
				]
			);

			// Stage Padding
			$this->add_control(
				'stage_padding',
				[
					'label'      => __( 'Stage Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'size' => 0,
					],
				]
			);

			// Item Margin
			$this->add_control(
				'item_margin',
				[
					'label'      => __( 'Item Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],
					],
					'default' => [
						'size' => 0,
					],
				]
			);

			// Slide Autoplay
			$this->add_control(
				'autoplay',
				[
					'label'   => __( 'Slide Autoplay', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'true',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Autoplay Timeout
			$this->add_control(
				'autoplaytimeout',
				[
					'label'      => __( 'Autoplay Timeout', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 500,
							'max'  => 10000,
							'step' => 100,
						],
					],
					'default' => [
						'size' => 3000,
					],
				]
			);

			// Slide Speed
			$this->add_control(
				'slide_speed',
				[
					'label'      => __( 'Slide Speed', 'bilalmghl' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 500,
							'max'  => 10000,
							'step' => 100,
						],
					],
					'default' => [
						'size' => 1000,
					],
				]
			);

			// Slide Animation
			$this->add_control(
				'slide_animation',
				[
					'label'   => __( 'Slide Animation', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'no',
					'options' => [
						'yes' => __( 'Yes', 'bilalmghl' ),
						'no'  => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Slide In Animation
			$this->add_control(
				'slide_animate_in',
				[
					'label'   => __( 'Slide Animate In', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'fadeIn',
					'options' => [
						'bounce'             => __('bounce','bilalmghl'),
						'flash'              => __('flash','bilalmghl'),
						'pulse'              => __('pulse','bilalmghl'),
						'rubberBand'         => __('rubberBand','bilalmghl'),
						'shake'              => __('shake','bilalmghl'),
						'headShake'          => __('headShake','bilalmghl'),
						'swing'              => __('swing','bilalmghl'),
						'tada'               => __('tada','bilalmghl'),
						'wobble'             => __('wobble','bilalmghl'),
						'jello'              => __('jello','bilalmghl'),
						'heartBeat'          => __('heartBeat','bilalmghl'),
						'bounceIn'           => __('bounceIn','bilalmghl'),
						'bounceInDown'       => __('bounceInDown','bilalmghl'),
						'bounceInLeft'       => __('bounceInLeft','bilalmghl'),
						'bounceInRight'      => __('bounceInRight','bilalmghl'),
						'bounceInUp'         => __('bounceInUp','bilalmghl'),
						'bounceOut'          => __('bounceOut','bilalmghl'),
						'bounceOutDown'      => __('bounceOutDown','bilalmghl'),
						'bounceOutLeft'      => __('bounceOutLeft','bilalmghl'),
						'bounceOutRight'     => __('bounceOutRight','bilalmghl'),
						'bounceOutUp'        => __('bounceOutUp','bilalmghl'),
						'fadeIn'             => __('fadeIn','bilalmghl'),
						'fadeInDown'         => __('fadeInDown','bilalmghl'),
						'fadeInDownBig'      => __('fadeInDownBig','bilalmghl'),
						'fadeInLeft'         => __('fadeInLeft','bilalmghl'),
						'fadeInLeftBig'      => __('fadeInLeftBig','bilalmghl'),
						'fadeInRight'        => __('fadeInRight','bilalmghl'),
						'fadeInRightBig'     => __('fadeInRightBig','bilalmghl'),
						'fadeInUp'           => __('fadeInUp','bilalmghl'),
						'fadeInUpBig'        => __('fadeInUpBig','bilalmghl'),
						'fadeOut'            => __('fadeOut','bilalmghl'),
						'fadeOutDown'        => __('fadeOutDown','bilalmghl'),
						'fadeOutDownBig'     => __('fadeOutDownBig','bilalmghl'),
						'fadeOutLeft'        => __('fadeOutLeft','bilalmghl'),
						'fadeOutLeftBig'     => __('fadeOutLeftBig','bilalmghl'),
						'fadeOutRight'       => __('fadeOutRight','bilalmghl'),
						'fadeOutRightBig'    => __('fadeOutRightBig','bilalmghl'),
						'fadeOutUp'          => __('fadeOutUp','bilalmghl'),
						'fadeOutUpBig'       => __('fadeOutUpBig','bilalmghl'),
						'flip'               => __('flip','bilalmghl'),
						'flipInX'            => __('flipInX','bilalmghl'),
						'flipInY'            => __('flipInY','bilalmghl'),
						'flipOutX'           => __('flipOutX','bilalmghl'),
						'flipOutY'           => __('flipOutY','bilalmghl'),
						'lightSpeedIn'       => __('lightSpeedIn','bilalmghl'),
						'lightSpeedOut'      => __('lightSpeedOut','bilalmghl'),
						'rotateIn'           => __('rotateIn','bilalmghl'),
						'rotateInDownLeft'   => __('rotateInDownLeft','bilalmghl'),
						'rotateInDownRight'  => __('rotateInDownRight','bilalmghl'),
						'rotateInUpLeft'     => __('rotateInUpLeft','bilalmghl'),
						'rotateInUpRight'    => __('rotateInUpRight','bilalmghl'),
						'rotateOut'          => __('rotateOut','bilalmghl'),
						'rotateOutDownLeft'  => __('rotateOutDownLeft','bilalmghl'),
						'rotateOutDownRight' => __('rotateOutDownRight','bilalmghl'),
						'rotateOutUpLeft'    => __('rotateOutUpLeft','bilalmghl'),
						'rotateOutUpRight'   => __('rotateOutUpRight','bilalmghl'),
						'hinge'              => __('hinge','bilalmghl'),
						'jackInTheBox'       => __('jackInTheBox','bilalmghl'),
						'rollIn'             => __('rollIn','bilalmghl'),
						'rollOut'            => __('rollOut','bilalmghl'),
						'zoomIn'             => __('zoomIn','bilalmghl'),
						'zoomInDown'         => __('zoomInDown','bilalmghl'),
						'zoomInLeft'         => __('zoomInLeft','bilalmghl'),
						'zoomInRight'        => __('zoomInRight','bilalmghl'),
						'zoomInUp'           => __('zoomInUp','bilalmghl'),
						'zoomOut'            => __('zoomOut','bilalmghl'),
						'zoomOutDown'        => __('zoomOutDown','bilalmghl'),
						'zoomOutLeft'        => __('zoomOutLeft','bilalmghl'),
						'zoomOutRight'       => __('zoomOutRight','bilalmghl'),
						'zoomOutUp'          => __('zoomOutUp','bilalmghl'),
						'slideInDown'        => __('slideInDown','bilalmghl'),
						'slideInLeft'        => __('slideInLeft','bilalmghl'),
						'slideInRight'       => __('slideInRight','bilalmghl'),
						'slideInUp'          => __('slideInUp','bilalmghl'),
						'slideOutDown'       => __('slideOutDown','bilalmghl'),
						'slideOutLeft'       => __('slideOutLeft','bilalmghl'),
						'slideOutRight'      => __('slideOutRight','bilalmghl'),
						'slideOutUp'         => __('slideOutUp','bilalmghl'),
					],
					'condition' => [
						'slide_animation' => 'yes',
					]
				]
			);

			// Slide Out Animation
			$this->add_control(
				'slide_animate_out',
				[
					'label'   => __( 'Slide Animate Out', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'fadeOut',
					'options' => [
						'bounce'             => __('bounce','bilalmghl'),
						'flash'              => __('flash','bilalmghl'),
						'pulse'              => __('pulse','bilalmghl'),
						'rubberBand'         => __('rubberBand','bilalmghl'),
						'shake'              => __('shake','bilalmghl'),
						'headShake'          => __('headShake','bilalmghl'),
						'swing'              => __('swing','bilalmghl'),
						'tada'               => __('tada','bilalmghl'),
						'wobble'             => __('wobble','bilalmghl'),
						'jello'              => __('jello','bilalmghl'),
						'heartBeat'          => __('heartBeat','bilalmghl'),
						'bounceIn'           => __('bounceIn','bilalmghl'),
						'bounceInDown'       => __('bounceInDown','bilalmghl'),
						'bounceInLeft'       => __('bounceInLeft','bilalmghl'),
						'bounceInRight'      => __('bounceInRight','bilalmghl'),
						'bounceInUp'         => __('bounceInUp','bilalmghl'),
						'bounceOut'          => __('bounceOut','bilalmghl'),
						'bounceOutDown'      => __('bounceOutDown','bilalmghl'),
						'bounceOutLeft'      => __('bounceOutLeft','bilalmghl'),
						'bounceOutRight'     => __('bounceOutRight','bilalmghl'),
						'bounceOutUp'        => __('bounceOutUp','bilalmghl'),
						'fadeIn'             => __('fadeIn','bilalmghl'),
						'fadeInDown'         => __('fadeInDown','bilalmghl'),
						'fadeInDownBig'      => __('fadeInDownBig','bilalmghl'),
						'fadeInLeft'         => __('fadeInLeft','bilalmghl'),
						'fadeInLeftBig'      => __('fadeInLeftBig','bilalmghl'),
						'fadeInRight'        => __('fadeInRight','bilalmghl'),
						'fadeInRightBig'     => __('fadeInRightBig','bilalmghl'),
						'fadeInUp'           => __('fadeInUp','bilalmghl'),
						'fadeInUpBig'        => __('fadeInUpBig','bilalmghl'),
						'fadeOut'            => __('fadeOut','bilalmghl'),
						'fadeOutDown'        => __('fadeOutDown','bilalmghl'),
						'fadeOutDownBig'     => __('fadeOutDownBig','bilalmghl'),
						'fadeOutLeft'        => __('fadeOutLeft','bilalmghl'),
						'fadeOutLeftBig'     => __('fadeOutLeftBig','bilalmghl'),
						'fadeOutRight'       => __('fadeOutRight','bilalmghl'),
						'fadeOutRightBig'    => __('fadeOutRightBig','bilalmghl'),
						'fadeOutUp'          => __('fadeOutUp','bilalmghl'),
						'fadeOutUpBig'       => __('fadeOutUpBig','bilalmghl'),
						'flip'               => __('flip','bilalmghl'),
						'flipInX'            => __('flipInX','bilalmghl'),
						'flipInY'            => __('flipInY','bilalmghl'),
						'flipOutX'           => __('flipOutX','bilalmghl'),
						'flipOutY'           => __('flipOutY','bilalmghl'),
						'lightSpeedIn'       => __('lightSpeedIn','bilalmghl'),
						'lightSpeedOut'      => __('lightSpeedOut','bilalmghl'),
						'rotateIn'           => __('rotateIn','bilalmghl'),
						'rotateInDownLeft'   => __('rotateInDownLeft','bilalmghl'),
						'rotateInDownRight'  => __('rotateInDownRight','bilalmghl'),
						'rotateInUpLeft'     => __('rotateInUpLeft','bilalmghl'),
						'rotateInUpRight'    => __('rotateInUpRight','bilalmghl'),
						'rotateOut'          => __('rotateOut','bilalmghl'),
						'rotateOutDownLeft'  => __('rotateOutDownLeft','bilalmghl'),
						'rotateOutDownRight' => __('rotateOutDownRight','bilalmghl'),
						'rotateOutUpLeft'    => __('rotateOutUpLeft','bilalmghl'),
						'rotateOutUpRight'   => __('rotateOutUpRight','bilalmghl'),
						'hinge'              => __('hinge','bilalmghl'),
						'jackInTheBox'       => __('jackInTheBox','bilalmghl'),
						'rollIn'             => __('rollIn','bilalmghl'),
						'rollOut'            => __('rollOut','bilalmghl'),
						'zoomIn'             => __('zoomIn','bilalmghl'),
						'zoomInDown'         => __('zoomInDown','bilalmghl'),
						'zoomInLeft'         => __('zoomInLeft','bilalmghl'),
						'zoomInRight'        => __('zoomInRight','bilalmghl'),
						'zoomInUp'           => __('zoomInUp','bilalmghl'),
						'zoomOut'            => __('zoomOut','bilalmghl'),
						'zoomOutDown'        => __('zoomOutDown','bilalmghl'),
						'zoomOutLeft'        => __('zoomOutLeft','bilalmghl'),
						'zoomOutRight'       => __('zoomOutRight','bilalmghl'),
						'zoomOutUp'          => __('zoomOutUp','bilalmghl'),
						'slideInDown'        => __('slideInDown','bilalmghl'),
						'slideInLeft'        => __('slideInLeft','bilalmghl'),
						'slideInRight'       => __('slideInRight','bilalmghl'),
						'slideInUp'          => __('slideInUp','bilalmghl'),
						'slideOutDown'       => __('slideOutDown','bilalmghl'),
						'slideOutLeft'       => __('slideOutLeft','bilalmghl'),
						'slideOutRight'      => __('slideOutRight','bilalmghl'),
						'slideOutUp'         => __('slideOutUp','bilalmghl'),
					],
					'condition' => [
						'slide_animation' => 'yes',
					]
				]
			);

			// Slide Navigation
			$this->add_control(
				'nav',
				[
					'label'   => __( 'Show Navigation', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Navigation Position
			$this->add_control(
				'nav_position',
				[
					'label'   => __( 'Navigation Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'outside_vertical_center_nav',
					'options' => [
						'inside_vertical_center_nav'  => __( 'Inside Vertical Center', 'bilalmghl' ),
						'outside_vertical_center_nav' => __( 'Outside Vertical Center', 'bilalmghl' ),
						'inside_center_nav'           => __( 'Inside Center', 'bilalmghl' ),
						'top_left_nav'                => __( 'Top Left', 'bilalmghl' ),
						'top_center_nav'              => __( 'Top Center', 'bilalmghl' ),
						'top_right_nav'               => __( 'Top Right', 'bilalmghl' ),
						'bottom_left_nav'             => __( 'Bottom Left', 'bilalmghl' ),
						'bottom_center_nav'           => __( 'Bottom Center', 'bilalmghl' ),
						'bottom_right_nav'            => __( 'Bottom Right', 'bilalmghl' ),
					],
					'condition' => [
						'nav' => 'true',
					],
				]
			);

			// Slide Prev Icon
			$this->add_control(
				'prev_icon',
				[
					'label'       => __( 'Nav Prev Icon', 'bilalmghl' ),
                    'type'      => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-angle-left',
                        'library' => 'solid',
                    ],
					'condition'   => [
						'nav' => 'true',
					],
				]
			);
			
			// Slide Next Icon
			$this->add_control(
				'next_icon',
				[
					'label'       => __( 'Nav Next Icon', 'bilalmghl' ),
                    'type'      => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-angle-right',
                        'library' => 'solid',
                    ],
					'condition'   => [
						'nav' => 'true',
					],
				]
			);

			// Slide Dots
			$this->add_control(
				'dots',
				[
					'label'   => __( 'Slide Dots', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Slide Loop
			$this->add_control(
				'loop',
				[
					'label'   => __( 'Slide Loop', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'true',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Slide Loop
			$this->add_control(
				'hover_pause',
				[
					'label'   => __( 'Pause On Hover', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'true',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Slide Center
			$this->add_control(
				'center',
				[
					'label'   => __( 'Slide Center Mode', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

			// Slide Center
			$this->add_control(
				'rtl',
				[
					'label'   => __( 'Direction RTL', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'bilalmghl' ),
						'false' => __( 'No', 'bilalmghl' ),
					],
				]
			);

		$this->end_controls_section();

		/*----------------------------
			SLIDER NAV WARP
		-----------------------------*/
		$this->start_controls_section(
			'slider_control_warp_style_section',
			[
				'label' => __( 'Slider Nav Warp Style', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

			// Background
			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'slider_nav_warp_background',
					'label'    => __( 'Background', 'bilalmghl' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav',
				]
			);

			// Border
			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'     => 'slider_nav_warp_border',
					'label'    => __( 'Border', 'bilalmghl' ),
					'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
				]
			);

			// Border Radius
			$this->add_control(
				'slider_nav_warp_radius',
				[
					'label'      => __( 'Border Radius', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Shadow
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'slider_nav_warp_shadow',
					'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
				]
			);

			// Display;
			$this->add_responsive_control(
				'slider_nav_warp_display',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'display: {{VALUE}};',
					],
				]
			);

			// Before Postion
			$this->add_responsive_control(
				'slider_nav_warp_position',
				[
					'label'   => __( 'Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',
					
					'options' => [
						'initial'  => __( 'Initial', 'bilalmghl' ),
						'absolute' => __( 'Absulute', 'bilalmghl' ),
						'relative' => __( 'Relative', 'bilalmghl' ),
						'static'   => __( 'Static', 'bilalmghl' ),
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'position: {{VALUE}};',
					],
				]
			);

			// Postion From Left
			$this->add_responsive_control(
				'slider_nav_warp_position_from_left',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Postion From Right
			$this->add_responsive_control(
				'slider_nav_warp_position_from_right',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Postion From Top
			$this->add_responsive_control(
				'slider_nav_warp_position_from_top',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Postion From Bottom
			$this->add_responsive_control(
				'slider_nav_warp_position_from_bottom',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Align
			$this->add_responsive_control(
				'slider_nav_warp_align',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'text-align: {{VALUE}};',
					],
					'default' => '',
				]
			);

			// Width
			$this->add_responsive_control(
				'slider_nav_warp_width',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Height
			$this->add_responsive_control(
				'slider_nav_warp_height',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Opacity
			$this->add_control(
				'slider_nav_warp_opacity',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'opacity: {{SIZE}};',
					],
				]
			);

			// Z-Index
			$this->add_control(
				'slider_nav_warp_zindex',
				[
					'label'     => __( 'Z-Index', 'bilalmghl' ),
					'type'      => Controls_Manager::NUMBER,
					'min'       => -99,
					'max'       => 99,
					'step'      => 1,
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'z-index: {{SIZE}};',
					],
				]
			);

			// Margin
			$this->add_responsive_control(
				'slider_nav_warp_margin',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Padding
			$this->add_responsive_control(
				'slider_nav_warp_padding',
				[
					'label'      => __( 'Margin', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/*----------------------------
			SLIDER NAV WARP END
		-----------------------------*/

		/*----------------------------
			CONTROL BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'slider_control_style_section',
			[
				'label' => __( 'Slider Nav Button Style', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
			// Typgraphy
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'slide_button_typography',
					'selector'  => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
				]
			);

			// Hr
			$this->add_control(
				'slide_button_hr1',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			$this->start_controls_tabs( 'slide_button_tab_style' );
				$this->start_controls_tab(
					'slide_button_normal_tab',
					[
						'label' => __( 'Normal', 'bilalmghl' ),
					]
				);

					// Color
					$this->add_control(
						'slide_button_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'default'   => '',
							'selectors' => [
								'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'color: {{VALUE}};',
							],
						]
					);

					// Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'slide_button_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
						]
					);

					// Hr
					$this->add_control(
						'slide_button_hr2',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);

					// Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'slide_button_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
						]
					);

					// Radius
					$this->add_control(
						'slide_button_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
					// Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'slide_button_shadow',
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
						]
					);

					// Hr
					$this->add_control(
						'slide_button_hr3',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'slide_button_hover_tab',
					[
						'label' => __( 'Hover', 'bilalmghl' ),
					]
				);

					// Hover Color
					$this->add_control(
						'hover_slide_button_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .sldier-content-area .owl-nav > div:hover' => 'color: {{VALUE}};',
							],
						]
					);

					// Hover Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_slide_button_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
						]
					);	

					// Hr
					$this->add_control(
						'slide_button_hr4',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);

					// Hover Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_slide_button_border',
							'label'    => __( 'Border', 'bilalmghl' ),
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
						]
					);

					// Hover Radius
					$this->add_control(
						'hover_slide_button_radius',
						[
							'label'      => __( 'Border Radius', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .sldier-content-area .owl-nav > div:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					// Hover Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_slide_button_shadow',
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
						]
					);

					// Hover Animation
					/*$this->add_control(
						'slide_button_hover_animation',
						[
							'label'    => __( 'Hover Animation', 'bilalmghl' ),
							'type'     => Controls_Manager::HOVER_ANIMATION,
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
						]
					);*/

					$this->add_control(
						'slide_button_hr9',
						[
							'type' => Controls_Manager::DIVIDER,
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

			// Width
			$this->add_control(
				'slide_button_width',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Height
			$this->add_control(
				'slide_button_height',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Hr
			$this->add_control(
				'slide_button_hr5',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Display;
			$this->add_responsive_control(
				'slide_button_display',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'display: {{VALUE}};',
					],
				]
			);

			// Alignment
			$this->add_control(
				'slide_button_align',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'text-align: {{VALUE}};',
					],
					'default' => '',
				]
			);

			// Hr
			$this->add_control(
				'slide_button_hr6',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);


			// Postion
			$this->add_responsive_control(
				'slide_button_position',
				[
					'label'   => __( 'Position', 'bilalmghl' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',				
					'options' => [
						'initial'  => __( 'Initial', 'bilalmghl' ),
						'absolute' => __( 'Absulute', 'bilalmghl' ),
						'relative' => __( 'Relative', 'bilalmghl' ),
						'static'   => __( 'Static', 'bilalmghl' ),
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'position: {{VALUE}};',
					],
				]
			);

			/*$this->start_controls_tabs( 'slide_button_item_tab_style', [
				'condition' => [
					'slide_button_position' => ['absolute','relative']
				],
			] );*/
			$this->start_controls_tabs( 'slide_button_item_tab_style');
				$this->start_controls_tab(
					'slide_button_left_nav_tab',
					[
						'label' => __( 'Left Button', 'bilalmghl' ),
					]
				);

					// Postion From Left
					$this->add_responsive_control(
						'slide_button_position_from_left',
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
								'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'slide_button_position' => ['absolute','relative']
							],
						]
					);

					// Postion Bottom Top
					$this->add_responsive_control(
						'slide_button_position_from_bottom',
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
								'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-prev' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'slide_button_position' => ['absolute','relative']
							],
						]
					);

					// Margin
					$this->add_responsive_control(
						'slide_button_left_margin',
						[
							'label'      => __( 'Margin Left Button', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .sldier-content-area .owl-nav > div.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();
				$this->start_controls_tab(
					'slide_button_right_nav_tab',
					[
						'label' => __( 'Right Button', 'bilalmghl' ),
					]
				);


					// Postion From Right
					$this->add_responsive_control(
						'slide_button_position_from_right',
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
								'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-next' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'slide_button_position' => ['absolute','relative']
							],
						]
					);

					// Postion From Top
					$this->add_responsive_control(
						'slide_button_position_from_top',
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
								'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-next' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'slide_button_position' => ['absolute','relative']
							],
						]
					);

					// Margin
					$this->add_responsive_control(
						'slide_button_right_margin',
						[
							'label'      => __( 'Margin Right Button', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .sldier-content-area .owl-nav > div.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

			// Hr
			$this->add_control(
				'slide_button_hr7',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Transition
			$this->add_control(
				'slide_button_transition',
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
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'transition: {{SIZE}}s;',
					],
				]
			);


			// Hr
			$this->add_control(
				'slide_button_hr8',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Padding
			$this->add_responsive_control(
				'slide_button_padding',
				[
					'label'      => __( 'Padding', 'bilalmghl' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/*----------------------------
			CONTROL BUTTON STYLE END
		-----------------------------*/

		/*----------------------------
			DOTS BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'slide_dots_button_style_section',
			[
				'label' => __( 'Slide Dots Style', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->start_controls_tabs( 'button_tab_style' );
		$this->start_controls_tab(
			'slide_dots_normal_tab',
			[
				'label' => __( 'Normal', 'bilalmghl' ),
			]
		);

		// Button Width
		$this->add_control(
			'slide_dots_width',
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
					'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Height
		$this->add_control(
			'slide_dots_height',
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
					'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'slide_dots_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div',
			]
		);

		// Button Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'slide_dots_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div',
			]
		);

		// Button Radius
		$this->add_control(
			'slide_dots_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Button Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'slide_dots_shadow',
				'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'slide_dots_hover_tab',
			[
				'label' => __( 'Hover & Active', 'bilalmghl' ),
			]
		);
		// Button Width
		$this->add_control(
			'hover_slide_dots_width',
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
					'{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Height
		$this->add_control(
			'hover_slide_dots_height',
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
					'{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Hover BG
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_slide_dots_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active',
			]
		);	

		// Button Radius
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_slide_dots_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active',
			]
		);

		// Button Hover Radius
		$this->add_control(
			'hover_slide_dots_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Hover Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_slide_dots_shadow',
				'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Button Hr
		$this->add_control(
			'slide_dots_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Alignment
		$this->add_control(
			'slide_dots_align',
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
					'{{WRAPPER}} .sldier-content-area .owl-dots' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		// Transition
		$this->add_control(
			'slide_dots_transition',
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
					'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'slide_dots_margin',
			[
				'label'      => __( 'Dot Item Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'slide_dots_warp_margin',
			[
				'label'      => __( 'Dot Warp Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sldier-content-area .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			DOTS BUTTON STYLE END
		-----------------------------*/

		/*********************************
		 * 		STYLE SECTION
		 *********************************/

		/*----------------------------
			THUMB STYLE
		-----------------------------*/
		$this->start_controls_section(
			'thumb_style_section',
			[
				'label' => __( 'Author Thumb', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'thumb_style_tab'
		);

		$this->start_controls_tab(
			'thum_image_warp_tab',
			[
				'label' => __( 'Tumb Warp', 'bilalmghl' ),
			]
		);

		// Width
		$this->add_responsive_control(
			'thumb_width',
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
					'{{WRAPPER}} .member__thumb' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'thumb_height',
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
					'{{WRAPPER}} .member__thumb' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'thumb_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__thumb',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'thumb_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .member__thumb',
			]
		);

		// Radius
		$this->add_control(
			'thumb_border_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'thumb_shadow',
				'selector' => '{{WRAPPER}} .member__thumb',
			]
		);

		// Display;
		$this->add_responsive_control(
			'thumb_display',
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
					'{{WRAPPER}} .member__thumb' => 'display: {{VALUE}};',
				],
			]
		);

		// Postion
		$this->add_responsive_control(
			'thumb_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'thumb_position_from_left',
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
					'{{WRAPPER}} .member__thumb' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'thumb_position_from_right',
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
					'{{WRAPPER}} .member__thumb' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'thumb_position_from_top',
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
					'{{WRAPPER}} .member__thumb' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'thumb_position_from_bottom',
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
					'{{WRAPPER}} .member__thumb' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'thumb_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'thumb_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'thumb_image_tab',
			[
				'label' => __( 'Thumb Image', 'bilalmghl' ),
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'thumb_image_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .member__thumb img',
			]
		);

		// Radius
		$this->add_control(
			'thumb_image_border_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'thumb_image_shadow',
				'selector' => '{{WRAPPER}} .member__thumb img',
			]
		);

		// Width
		$this->add_responsive_control(
			'thumb_image_width',
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
					'{{WRAPPER}} .member__thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'thumb_image_height',
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
					'{{WRAPPER}} .member__thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			THUMB STYLE END
		-----------------------------*/

		/*----------------------------
			CONTENT WRAPER STYLE
		-----------------------------*/
		$this->start_controls_section(
			'content_warp_style_section',
			[
				'label' => __( 'Content Warp', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Width
		$this->add_responsive_control(
			'content_warp_width',
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
					'{{WRAPPER}} .member__content__wrap' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'content_warp_height',
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
					'{{WRAPPER}} .member__content__wrap' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'content_warp_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__content__wrap',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'content_warp_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .member__content__wrap',
			]
		);

		// Radius
		$this->add_control(
			'content_warp_border_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__content__wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'content_warp_shadow',
				'selector' => '{{WRAPPER}} .member__content__wrap',
			]
		);

		// Display;
		$this->add_responsive_control(
			'content_warp_display',
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
					'{{WRAPPER}} .member__content__wrap' => 'display: {{VALUE}};',
				],
			]
		);


		// Postion
		$this->add_responsive_control(
			'content_warp_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'content_warp_position_from_left',
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
					'{{WRAPPER}} .member__content__wrap' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'content_warp_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'content_warp_position_from_right',
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
					'{{WRAPPER}} .member__content__wrap' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'content_warp_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'content_warp_position_from_top',
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
					'{{WRAPPER}} .member__content__wrap' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'content_warp_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'content_warp_position_from_bottom',
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
					'{{WRAPPER}} .member__content__wrap' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'content_warp_position' => ['absolute','relative']
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'content_warp_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__content__wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'content_warp_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__content__wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			CONTENT WRAPER STYLE
		-----------------------------*/


















		/*----------------------------
			NAME STYLE
		-----------------------------*/
		$this->start_controls_section(
			'name_style_section',
			[
				'label' => __( 'Name', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .member__name',
			]
		);

		// Color
		$this->add_control(
			'name_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member__name' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Color
		$this->add_control(
			'box_hover_name_color',
			[
				'label'  => __( 'Box Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single__team:hover .member__name' => 'color: {{VALUE}}',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'name_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			NAME STYLE END
		-----------------------------*/

		/*----------------------------
			DESIGNATION STYLE
		-----------------------------*/
		$this->start_controls_section(
			'designation_style_section',
			[
				'label' => __( 'Designation Or Company', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'designation_typography',
				'selector' => '{{WRAPPER}} .member__designation',
			]
		);

		// Color
		$this->add_control(
			'designation_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member__designation' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Color
		$this->add_control(
			'box_hover_designation_color',
			[
				'label'  => __( 'Box Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single__team:hover .member__designation' => 'color: {{VALUE}}',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'designation_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			DESIGNATION STYLE END
		-----------------------------*/

		/*----------------------------
			DESCRIPTION STYLE
		-----------------------------*/
		$this->start_controls_section(
			'description_style_section',
			[
				'label' => __( 'Description', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .member__description',
			]
		);

		// Subtitle Color
		$this->add_control(
			'description_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Subtitle Color
		$this->add_control(
			'box_hover_description_color',
			[
				'label'  => __( 'Box Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single__team:hover .member__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Subtitle Margin
		$this->add_responsive_control(
			'description_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			DESCRIPTION STYLE END
		-----------------------------*/

		/*----------------------------
			SOCIAL WRAPPER STYLE
		-----------------------------*/
		$this->start_controls_section(
			'social_wrap_style_section',
			[
				'label' => __( 'Social Warp', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Width
		$this->add_responsive_control(
			'social_wrap_width',
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
					'{{WRAPPER}} .member__socials' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'social_wrap_height',
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
					'{{WRAPPER}} .member__socials' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'social_wrap_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__socials',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'social_wrap_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .member__socials',
			]
		);

		// Radius
		$this->add_control(
			'social_wrap_border_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'social_wrap_shadow',
				'selector' => '{{WRAPPER}} .member__socials',
			]
		);

		// Display;
		$this->add_responsive_control(
			'social_wrap_display',
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
					'{{WRAPPER}} .member__socials' => 'display: {{VALUE}};',
				],
			]
		);


		// Postion
		$this->add_responsive_control(
			'social_wrap_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'social_wrap_position_from_left',
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
					'{{WRAPPER}} .member__socials' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'social_wrap_position_from_right',
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
					'{{WRAPPER}} .member__socials' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'social_wrap_position_from_top',
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
					'{{WRAPPER}} .member__socials' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'social_wrap_position_from_bottom',
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
					'{{WRAPPER}} .member__socials' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'social_wrap_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'social_wrap_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SOCIAL WRAPPER STYLE
		-----------------------------*/

		/*----------------------------
			SOCIAL ICON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'icon_style_section',
			[
				'label' => __( 'Social Icons', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'icon_typography',
				'selector'  => '{{WRAPPER}} .member__socials a',
			]
		);

		// Hr
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

		// Color
		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'color: {{VALUE}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'icon_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__socials a',
			]
		);

		// Hr
		$this->add_control(
			'icon_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'icon_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .member__socials a',
			]
		);

		// Border Radius
		$this->add_control(
			'icon_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'icon_shadow',
				'selector' => '{{WRAPPER}} .member__socials a',
			]
		);

		// Hr
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

		// Hover Color
		$this->add_control(
			'hover_icon_color',
			[
				'label'     => __( 'Color', 'bilalmghl' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member__socials a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// Hover Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_icon_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);	

		// Hr
		$this->add_control(
			'icon_hr4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Hover Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_icon_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);

		// Hover Radius
		$this->add_control(
			'hover_icon_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hover Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_icon_shadow',
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);

		// Hover Animation
		$this->add_control(
			'icon_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'bilalmghl' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .member__socials a:hover',
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

		// Width
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
					'{{WRAPPER}} .member__socials a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
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
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Hr
		$this->add_control(
			'icon_hr5',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Display;
		$this->add_responsive_control(
			'icon_display',
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
					'{{WRAPPER}} .member__socials a' => 'display: {{VALUE}};',
				],
			]
		);

		// Alignment
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
					'{{WRAPPER}} .member__socials a' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		// Hr
		$this->add_control(
			'icon_hr6',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Postion
		$this->add_responsive_control(
			'icon_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .member__socials a' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
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
					'{{WRAPPER}} .member__socials a' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
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
					'{{WRAPPER}} .member__socials a' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
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
					'{{WRAPPER}} .member__socials a' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
				],
			]
		);

		// Transition
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
					'{{WRAPPER}} .member__socials a' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Hr
		$this->add_control(
			'icon_hr7',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Margin
		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hr
		$this->add_control(
			'icon_hr8',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Padding
		$this->add_responsive_control(
			'icon_padding',
			[
				'label'      => __( 'Padding', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SOCIAL ICON STYLE END
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
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		$this->start_controls_tabs('box_style_tabs');
		$this->start_controls_tab(
			'box_style_normal_tab',
			[
				'label' => __( 'Normal', 'bilalmghl' ),
			]
		);

		// Box Default Color
		$this->add_control(
			'box_color',
			[
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single__team' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'box_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		// Border Radius
		$this->add_control(
			'box_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'box_box_shadow',
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'box_style_hover_tab',
			[
				'label' => __( 'Hover', 'bilalmghl' ),
			]
		);

		// Box Hover Color
		$this->add_control(
			'hover_box_color',
			[
				'label'  => __( 'Box Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single__team:hover' => 'color: {{VALUE}}',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_box_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team:hover',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_box_border',
				'label'    => __( 'Border', 'bilalmghl' ),
				'selector' => '{{WRAPPER}} .single__team:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'hover_box_radius',
			[
				'label'      => __( 'Border Radius', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_box_box_shadow',
				'selector' => '{{WRAPPER}} .single__team:hover',
			]
		);		

		$this->end_controls_tab();
		$this->end_controls_tabs();

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
					'{{WRAPPER}} .single__team' => 'text-align: {{VALUE}};',
				],
				'default' => '',
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
					'{{WRAPPER}} .single__team' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Postion
		$this->add_responsive_control(
			'box_position',
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
					'{{WRAPPER}} .single__team' => 'position: {{VALUE}};',
				],
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
					'{{WRAPPER}} .single__team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .single__team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

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
				'label' => __( 'Before / After', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'box_before_after_tab_style' );
		$this->start_controls_tab(
			'box_before_tab',
			[
				'label' => __( 'BEFORE', 'bilalmghl' ),
			]
		);

		// Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'box_before_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team:before,{{WRAPPER}} .member__thumb:before',
			]
		);

		// Before Display;
		$this->add_responsive_control(
			'box_before_display',
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
					'{{WRAPPER}} .single__team:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Before Postion
		$this->add_responsive_control(
			'box_before_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'box_before_position_from_left',
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
					'{{WRAPPER}} .single__team:before' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'box_before_position_from_right',
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
					'{{WRAPPER}} .single__team:before' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'box_before_position_from_top',
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
					'{{WRAPPER}} .single__team:before' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'box_before_position_from_bottom',
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
					'{{WRAPPER}} .single__team:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Before Align
		$this->add_responsive_control(
			'box_before_align',
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
					'{{WRAPPER}} .single__team:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Before Width
		$this->add_responsive_control(
			'box_before_width',
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
					'{{WRAPPER}} .single__team:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Height
		$this->add_responsive_control(
			'box_before_height',
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
					'{{WRAPPER}} .single__team:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Opacity
		$this->add_control(
			'box_before_opacity',
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
					'{{WRAPPER}} .single__team:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Before Z-Index
		$this->add_control(
			'box_before_zindex',
			[
				'label'     => __( 'Z-Index', 'bilalmghl' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Before Margin
		$this->add_responsive_control(
			'box_before_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_after_tab',
			[
				'label' => __( 'AFTER', 'bilalmghl' ),
			]
		);

		// After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'box_after_background',
				'label'    => __( 'Background', 'bilalmghl' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team:after',
			]
		);

		// After Display;
		$this->add_responsive_control(
			'box_after_display',
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
					'{{WRAPPER}} .single__team:after' => 'display: {{VALUE}};',
				],
			]
		);

		// After Postion
		$this->add_responsive_control(
			'box_after_position',
			[
				'label'   => __( 'Position', 'bilalmghl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'bilalmghl' ),
					'absolute' => __( 'Absulute', 'bilalmghl' ),
					'relative' => __( 'Relative', 'bilalmghl' ),
					'static'   => __( 'Static', 'bilalmghl' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'box_after_position_from_left',
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
					'{{WRAPPER}} .single__team:after' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'box_after_position_from_right',
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
					'{{WRAPPER}} .single__team:after' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'box_after_position_from_top',
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
					'{{WRAPPER}} .single__team:after' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'box_after_position_from_bottom',
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
					'{{WRAPPER}} .single__team:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// After Align
		$this->add_responsive_control(
			'box_after_align',
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
					'{{WRAPPER}} .single__team:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// After Width
		$this->add_responsive_control(
			'box_after_width',
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
					'{{WRAPPER}} .single__team:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Height
		$this->add_responsive_control(
			'box_after_height',
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
					'{{WRAPPER}} .single__team:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Opacity
		$this->add_control(
			'box_after_opacity',
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
					'{{WRAPPER}} .single__team:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		// After Z-Index
		$this->add_control(
			'box_after_zindex',
			[
				'label'     => __( 'Z-Index', 'bilalmghl' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// After Margin
		$this->add_responsive_control(
			'box_after_margin',
			[
				'label'      => __( 'Margin', 'bilalmghl' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$settings = $this->get_settings_for_display();

		/*-----------------------------
			CONTENT WITH FOREACH LOOP
		------------------------------*/
		$team_content = '';
		if ($settings['team_content']) {

			foreach( $settings['team_content'] as $team ){

				$team_content .='
				<div class="single__team">';

					if( !empty( $team['member_thumb'] ) ){

						if ( !empty( $team['member_thumb'] ) ) {
							$thumb_array = $team['member_thumb'];
							$thumb_link  = wp_get_attachment_image_url( $thumb_array['id'], 'full' );
							$thumb_link  = Group_Control_Image_Size::get_attachment_image_src( $thumb_array['id'], 'member_thumb_size', $team );
							if ( !empty( $thumb_link ) ) {
								$team_content .='<div class="member__thumb"><img src="'. esc_url( $thumb_link ) .'" alt="'.esc_attr( get_the_title() ).'" /></div>';
							}else{
								$team_content .='<div class="member__thumb"><img src="'. esc_url( $team['member_thumb']['url'] ) .'" alt="" /></div>';
							}
						}
				    }

				    $team_content .='
				    <div class="member__content__wrap">';
						if( !empty( $team['member_name'] ) ){

							$team_content .='
							<div class="member__name__designation">';
								if( !empty( $team['member_name'] ) ){
									$team_content .='
									<h4 class="member__name">'.esc_html( $team['member_name'] ).'</h4>';
								}
								if( !empty( $team['designation'] ) ){
									$team_content .='
									<p class="member__designation">'.esc_html( $team['designation'] ).'</p>';
								}

								$team_content .='
							</div>';
						}

						if( !empty( $team['description'] ) ){

							/*$team_content .='<div class="member__content">';*/
								$team_content .='<div class="member__description">'.wpautop( $team['description'] ).'</div>';
							/*$team_content .='</div>';*/
						}

						if ( 'yes' == $team['add_social'] && 'team__style__9' != $settings['team_style'] ) {
							$team_content .='
							<div class="member__socials">';

								$facebook_url  = $team['facebook_url'];
								$twitter_url   = $team['twitter_url'];
								$google_url    = $team['google_url'];
								$youtube_url   = $team['youtube_url'];
								$vimeo_url     = $team['vimeo_url'];
								$instagram_url = $team['instagram_url'];
								$linkedin_url  = $team['linkedin_url'];
								$pinterest_url = $team['pinterest_url'];

								// FACEBOOK
								if ( !empty($facebook_url['url']) ) {
									$attribute[] = 'href="'.$facebook_url['url'].'"';
									if ( $facebook_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $facebook_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['facebook_icon']).'</a>';
									$attribute = array();
								}

								// TWITTER
								if ( !empty($twitter_url['url']) ) {
									$attribute[] = 'href="'.$twitter_url['url'].'"';
									if ( $twitter_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $twitter_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['twitter_icon']).'</a>';
									$attribute = array();
								}

								// GOOGLE PLUS
								if ( !empty($google_url['url']) ) {
									$attribute[] = 'href="'.$google_url['url'].'"';
									if ( $google_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $google_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['google_icon']).'</a>';
									$attribute = array();
								}

								// YOUTUBE
								if ( !empty($youtube_url['url']) ) {
									$attribute[] = 'href="'.$youtube_url['url'].'"';
									if ( $youtube_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $youtube_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['youtube_icon']).'</a>';
									$attribute = array();
								}

								// VIMEO
								if ( !empty($vimeo_url['url']) ) {
									$attribute[] = 'href="'.$vimeo_url['url'].'"';
									if ( $vimeo_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $vimeo_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['vimeo_icon']).'</a>';
									$attribute = array();
								}

								// INSTAGRAM
								if (  !empty($instagram_url['url']) ) {
									$attribute[] = 'href="'.$instagram_url['url'].'"';
									if ( $instagram_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $instagram_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['instagram_icon']).'</a>';
									$attribute = array();
								}

								// LINKEDIN
								if (  !empty($linkedin_url['url']) ) {
									$attribute[] = 'href="'.$linkedin_url['url'].'"';
									if ( $linkedin_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $linkedin_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['linkedin_icon']).'</a>';
									$attribute = array();
								}

								// PINTEREST
								if (  !empty($pinterest_url['url'])  ) {
									$attribute[] = 'href="'.$pinterest_url['url'].'"';
									if ( $pinterest_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $pinterest_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['pinterest_icon']).'</a>';
									$attribute = array();
								}
								$team_content .='
							</div>';
						}
					$team_content .='
					</div>';

					if ( 'team__style__8' == $settings['team_style'] || 'team__style__9' == $settings['team_style'] ) :
					$team_content .='
					<div class="team__hover__content">';

						if( !empty( $team['member_thumb'] ) ){

							if ( !empty( $team['member_thumb'] ) ) {
								$thumb_array = $team['member_thumb'];
								$thumb_link  = wp_get_attachment_image_url( $thumb_array['id'], 'full' );
								$thumb_link  = Group_Control_Image_Size::get_attachment_image_src( $thumb_array['id'], 'member_thumb_size', $team );
								if ( !empty( $thumb_link ) ) {
									$team_content .='<div class="member__thumb"><img src="'. esc_url( $thumb_link ) .'" alt="'.esc_attr( get_the_title() ).'" /></div>';
								}else{
									$team_content .='<div class="member__thumb"><img src="'. esc_url( $team['member_thumb']['url'] ) .'" alt="" /></div>';
								}
							}
					    }
						if( !empty( $team['member_name'] ) ){

							$team_content .='
							<div class="member__name__designation">';
								if( !empty( $team['member_name'] ) ){
									$team_content .='
									<h4 class="member__name">'.esc_html( $team['member_name'] ).'</h4>';
								}
								if( !empty( $team['designation'] ) ){
									$team_content .='
									<p class="member__designation">'.esc_html( $team['designation'] ).'</p>';
								}

								$team_content .='
							</div>';
						}

						if ( 'team__style__9' == $settings['team_style'] ) {
							$team_content .='
							<div class="member__socials">';

								$facebook_url  = $team['facebook_url'];
								$twitter_url   = $team['twitter_url'];
								$google_url    = $team['google_url'];
								$youtube_url   = $team['youtube_url'];
								$vimeo_url     = $team['vimeo_url'];
								$instagram_url = $team['instagram_url'];
								$linkedin_url  = $team['linkedin_url'];
								$pinterest_url = $team['pinterest_url'];

								// FACEBOOK
								if ( !empty($facebook_url['url']) ) {
									$attribute[] = 'href="'.$facebook_url['url'].'"';
									if ( $facebook_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $facebook_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['facebook_icon']).'</a>';
									$attribute = array();
								}

								// TWITTER
								if ( !empty($twitter_url['url']) ) {
									$attribute[] = 'href="'.$twitter_url['url'].'"';
									if ( $twitter_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $twitter_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['twitter_icon']).'</a>';
									$attribute = array();
								}

								// GOOGLE PLUS
								if ( !empty($google_url['url']) ) {
									$attribute[] = 'href="'.$google_url['url'].'"';
									if ( $google_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $google_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['google_icon']).'</a>';
									$attribute = array();
								}

								// YOUTUBE
								if ( !empty($youtube_url['url']) ) {
									$attribute[] = 'href="'.$youtube_url['url'].'"';
									if ( $youtube_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $youtube_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['youtube_icon']).'</a>';
									$attribute = array();
								}

								// VIMEO
								if ( !empty($vimeo_url['url']) ) {
									$attribute[] = 'href="'.$vimeo_url['url'].'"';
									if ( $vimeo_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $vimeo_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['vimeo_icon']).'</a>';
									$attribute = array();
								}

								// INSTAGRAM
								if (  !empty($instagram_url['url']) ) {
									$attribute[] = 'href="'.$instagram_url['url'].'"';
									if ( $instagram_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $instagram_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['instagram_icon']).'</a>';
									$attribute = array();
								}

								// LINKEDIN
								if (  !empty($linkedin_url['url']) ) {
									$attribute[] = 'href="'.$linkedin_url['url'].'"';
									if ( $linkedin_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $linkedin_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['linkedin_icon']).'</a>';
									$attribute = array();
								}

								// PINTEREST
								if (  !empty($pinterest_url['url'])  ) {
									$attribute[] = 'href="'.$pinterest_url['url'].'"';
									if ( $pinterest_url['is_external'] ) {
										$attribute[] = 'target="_blank"';
									}
									if ( $pinterest_url['nofollow'] ) {
										$attribute[] = 'rel="nofollow"';
									}
									$team_content .='<a '.implode(' ', $attribute ).'>'.bilalmghl_render_icons($team['pinterest_icon']).'</a>';
									$attribute = array();
								}
								
								$team_content .='
							</div>';
						}


					$team_content .='
					</div>';
					endif;

				$team_content .='
				</div>';
			}
		}

		// Slider Attr
		$this->add_render_attribute( 'team_carousel_attr', 'class', 'bilalmghl-team-carousel' );
		if ( count( $settings['team_content'] ) > 1 && 'yes' == $settings['slider_on'] ) {
			$this->add_render_attribute( 'team_carousel_attr', 'class', 'bilalmghl-carousel-active' );

			// SLIDER OPTIONS
			$options = [
				'item_on_large'     => $settings['item_on_large']["size"],
				'item_on_medium'    => $settings['item_on_medium']["size"],
				'item_on_tablet'    => $settings['item_on_tablet']["size"],
				'item_on_mobile'    => $settings['item_on_mobile']["size"],
				'stage_padding'     => $settings['stage_padding']["size"],
				'item_margin'       => $settings['item_margin']["size"],
				'autoplay'          => ('true' == $settings['autoplay']) ? true : false,
				'autoplaytimeout'   => $settings['autoplaytimeout']["size"],
				'slide_speed'       => $settings['slide_speed']["size"],
				'slide_animation'   => $settings['slide_animation'],
				'slide_animate_in'  => $settings['slide_animate_in'],
				'slide_animate_out' => $settings['slide_animate_out'],
				'nav'               => ( 'true' == $settings['nav'] ) ? true : false,
				'nav_position'      => $settings['nav_position'],
				'next_icon'         => $settings['next_icon']['value'],
				'prev_icon'         => $settings['prev_icon']['value'],
				'dots'              => ( 'true' == $settings['dots'] ) ? true : false,
				'loop'              => ( 'true' == $settings['loop'] ) ? true : false,
				'hover_pause'       => ( 'true' == $settings['hover_pause'] ) ? true : false,
				'center'            => ( 'true' == $settings['center'] ) ? true : false,
				'rtl'               => ( 'true' == $settings['rtl'] ) ? true : false,
			];

			$this->add_render_attribute( 'team_carousel_attr', 'data-settings', wp_json_encode( $options ) );
		}else{
			$this->add_render_attribute( 'team_carousel_attr', 'class', 'team-normal-grid' );
		}

		// Parent Attr.
		if ( 'true' == $settings['nav'] || 'true' == $settings['dots'] ) {
			$this->add_render_attribute('sldier_parent_attr','class','sldier-content-area');
		}

		$this->add_render_attribute('sldier_parent_attr','class',$settings['team_style']);
		$this->add_render_attribute('sldier_parent_attr','class',$settings['nav_position']);
	?>

	<div <?php echo $this->get_render_attribute_string('sldier_parent_attr'); ?>>
		<div <?php echo $this->get_render_attribute_string('team_carousel_attr'); ?> >
			<?php echo ( isset( $team_content ) ? $team_content : '' ); ?>
		</div>
	</div>

	<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Teams() );