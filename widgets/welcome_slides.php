<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Bilalmghl_Welcome_Slides_Widget extends Widget_Base {

    public function get_name() {
        return 'Bilalmghl_Welcome_Slides_Widget';
    }
    
    public function get_title() {
        return __( 'mb Welcome Slides', 'bilalmghl' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }
    
	public function get_categories() {
        return [ 'bilalmghl-addons' ];
    }


    public function get_script_depends() {
        return [
            'slick',
            'modal-video',
            'bilalmghl-core',

        ];
    }

    public function get_style_depends() {
        return[
            'slick',
            'modal-video',
        ];
    }

	public function get_keywords() {
        return[
            'slider',
            'welcome',
            'bilalmghl slider',
            'welcome section',
            'slides',
        ];
    }

    static function content_layout_style(){
        return[
            'main_slider'      => esc_html__( 'Default Slider', 'bilalmghl' ),
            'travel_banner'      => esc_html__( 'Travel Slider', 'bilalmghl' ),
            'travel_destinations'      => esc_html__( 'Travel Destinations', 'bilalmghl' ),
            'welcome__slides__layout__custom' => esc_html__( 'Custom Style', 'bilalmghl' ),
        ];
    }

    /**
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
    
    protected function _register_controls() {

        /*---------------------------
            CONTENT SECTION
        -----------------------------*/
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content Section & Layout', 'bilalmghl' ),
            ]
        );
            $this->add_control(
                'content_style_heading',
                [
                    'label' => esc_html__( 'Slides Layout Style', 'bilalmghl' ),
                    'type'  => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'content_layout_style',
                [
                    'label'     => esc_html__( 'Content Style', 'bilalmghl' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'main_slider',
                    'options'   => self::content_layout_style(),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'content_slider_heading',
                [
                    'label'     => esc_html__( 'Slider Settings', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'slider_on',
                [
                    'label'        => esc_html__( 'Slider On', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'On', 'bilalmghl' ),
                    'label_off'    => esc_html__( 'Off', 'bilalmghl' ),
                    'return_value' => 'yes',
                    'default'      => 'no',
                    'separator'    => 'before',
                ]
            );

            $this->add_control(
                'content_items_heading',
                [
                    'label'     => esc_html__( 'Slides Items', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater = new Repeater();
			$repeater->start_controls_tabs(
				'slide_tabs'
			);
                $repeater->start_controls_tab(
                    'slide_content_tab',
                    [
                        'label' => __( 'Content', 'bilalmghl' ),
                    ]
                );
                    $repeater->add_control(
                        'content_source',
                        [
                            'label'   => esc_html__( 'Select Content Source', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default'    => esc_html__( 'Default', 'bilalmghl' ),
                                'elementor' => esc_html__( 'Elementor Library', 'bilalmghl' ),
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'template_id',
                        [
                            'label'     => __( 'Content', 'bilalmghl' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '0',
                            'options'   => $this->bilalmghl_elementor_template(),
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'elementor'
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'content_subtitle',
                        [
                            'label'     => esc_html__( 'Subtitle', 'bilalmghl' ),
                            'type'      => Controls_Manager::TEXT,
                            'default'   => esc_html__('world trip','bilalmghl'),
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'content_title',
                        [
                            'label'     => esc_html__( 'Title', 'bilalmghl' ),
                            'type'      => Controls_Manager::TEXTAREA,
                            'default'   => esc_html__('Keep The ','bilalmghl'),
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
                        ]
                    );
                     $repeater->add_control(
                        'content_title2',
                        [
                            'label'     => esc_html__( 'Title 2', 'bilalmghl' ),
                            'type'      => Controls_Manager::TEXTAREA,
                            'default'   => esc_html__('World In Your Hand','bilalmghl'),
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'content_description',
                        [
                            'label'     => esc_html__( 'Description', 'bilalmghl' ),
                            'type'      => Controls_Manager::TEXTAREA,
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
                        ]
                    );

                    /* BUTTON PROPERTY */
                    $repeater->add_control(
                        'button_1_heading',
                        [
                            'label'     => __( 'Button One', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
						'show_button_1',
						[
							'label'        => __( 'Show Button?', 'bilalmghl' ),
							'type'         => Controls_Manager::SWITCHER,
							'label_on'     => __( 'Show', 'bilalmghl' ),
							'label_off'    => __( 'Hide', 'bilalmghl' ),
							'return_value' => 'yes',
							'default'      => 'no',
							'separator'    => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
						]
					);
					$repeater->add_control(
						'button_1_type',
						[
							'label'   => __( 'Button Type', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'default',
							'options' => [
								'default' => __( 'Default', 'bilalmghl' ),
								'video'   => __( 'Video Popup', 'bilalmghl' ),
							],
                            'condition' => [
                                'show_button_1' => 'yes',
                                'content_source' => 'default',
                            ],
							'separator' => 'before',
						]
					);

                    /* GENERAL BUTTON CONTENT */
                    $repeater->add_control(
						'button_1_title',
						[
							'label'       => __( 'Button Title', 'bilalmghl' ),
							'type'        => Controls_Manager::TEXT,
							'placeholder' => __( 'Title', 'bilalmghl' ),
							'condition'   => [
                                'show_button_1' => 'yes',
                                'content_source' => 'default',
                            ],
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'button_1_link',
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
                            'condition' => [
                                'show_button_1' => 'yes',
                                'button_1_type' => 'default',
                                'content_source' => 'default',
                            ],
						]
					);

                    /* VIDEO BUTTON CONTENT */
                    $repeater->add_control(
                        'button_1_get_video_from',
                        [
                            'label'   => __( 'Get Video Id From', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'youtube',
                            'options' => [
                                'youtube' => __('YouTube', 'bilalmghl'),
                                'vimeo'   => __('Vimeo', 'bilalmghl'),
                            ],
                            'condition' => [
                                'show_button_1' => 'yes',
                                'button_1_type' => 'video',
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'button_1_youtube_video_id',
                        [
                            'label'         => __( 'Youtube Video Id', 'bilalmghl' ),
                            'type'          => Controls_Manager::TEXT,
                            'show_external' => true,
                            'default'       => '84eiDiiLg2Y',
                            'placeholder'   => 'pWOv9xcoMeY',
                            'condition'     => [
                                'show_button_1'           => 'yes',
                                'button_1_get_video_from' => 'youtube',
                                'button_1_type'           => 'video',
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'button_1_vimeo_video_id',
                        [
                            'label'         => __( 'Vimeo Video Id', 'bilalmghl' ),
                            'type'          => Controls_Manager::TEXT,
                            'show_external' => true,
                            'default'       => '123051260',
                            'condition'     => [
                                'show_button_1'           => 'yes',
                                'button_1_get_video_from' => 'vimeo',
                                'button_1_type'           => 'video',
                                'content_source' => 'default',
                            ],
                        ]
                    );

                    /* BUTTON ICONS */
					$repeater->add_control(
						'button_1_icon',
						[
							'label'       => __( 'Font Icons', 'bilalmghl' ),
							'type'        => Controls_Manager::ICONS,
							'label_block' => true,
							'condition'   => [
                                'show_button_1' => 'yes',
                                'content_source' => 'default',
                            ],
                            'separator' => 'before',
						]
					);
					$repeater->add_control(
						'button_1_icon_align',
						[
							'label'   => __( 'Icon Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'right',
							'options' => [
								'left'  => __( 'Left', 'bilalmghl' ),
								'right' => __( 'Right', 'bilalmghl' ),
							],
                            'condition' => [
                                'show_button_1' => 'yes',
                                'content_source' => 'default',
                            ],
						]
					);

                    /* BUTTON TWO PROPERTY */
                    $repeater->add_control(
                        'button_2_heading',
                        [
                            'label'     => __( 'Button Two', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
                        ]
                    );
					$repeater->add_control(
						'show_button_2',
						[
							'label'        => __( 'Show Button?', 'bilalmghl' ),
							'type'         => Controls_Manager::SWITCHER,
							'label_on'     => __( 'Show', 'bilalmghl' ),
							'label_off'    => __( 'Hide', 'bilalmghl' ),
							'return_value' => 'yes',
							'default'      => 'no',
							'separator'    => 'before',
                            'condition' => [
                                'content_source' => 'default',
                            ],
						]
					);
					$repeater->add_control(
						'button_2_type',
						[
							'label'   => __( 'Button Type', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'default',
							'options' => [
								'default' => __( 'Default', 'bilalmghl' ),
								'video'   => __( 'Video Popup', 'bilalmghl' ),
							],
                            'condition' => [
                                'show_button_2' => 'yes',
                                'content_source' => 'default',
                            ],
							'separator' => 'before',
						]
					);

                    /* GENERAL BUTTON CONTENT */
                    $repeater->add_control(
						'button_2_title',
						[
							'label'       => __( 'Button Title', 'bilalmghl' ),
							'type'        => Controls_Manager::TEXT,
							'placeholder' => __( 'Title', 'bilalmghl' ),
							'condition'   => [
                                'show_button_2' => 'yes',
                                'content_source' => 'default',
                            ],
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'button_2_link',
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
                            'condition' => [
                                'show_button_2' => 'yes',
                                'button_2_type' => 'default',
                                'content_source' => 'default',
                            ],
						]
					);

                    /* VIDEO BUTTON CONTENT */
                    $repeater->add_control(
                        'button_2_get_video_from',
                        [
                            'label'   => __( 'Get Video Id From', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'youtube',
                            'options' => [
                                'youtube' => __('YouTube', 'bilalmghl'),
                                'vimeo'   => __('Vimeo', 'bilalmghl'),
                            ],
                            'condition' => [
                                'show_button_2' => 'yes',
                                'button_2_type' => 'video',
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'button_2_youtube_video_id',
                        [
                            'label'         => __( 'Youtube Video Id', 'bilalmghl' ),
                            'type'          => Controls_Manager::TEXT,
                            'show_external' => true,
                            'default'       => '84eiDiiLg2Y',
                            'placeholder'   => 'pWOv9xcoMeY',
                            'condition'     => [
                                'show_button_2'           => 'yes',
                                'button_2_get_video_from' => 'youtube',
                                'button_2_type'           => 'video',
                                'content_source' => 'default',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'button_2_vimeo_video_id',
                        [
                            'label'         => __( 'Vimeo Video Id', 'bilalmghl' ),
                            'type'          => Controls_Manager::TEXT,
                            'show_external' => true,
                            'default'       => '123051260',
                            'condition'     => [
                                'show_button_2'           => 'yes',
                                'button_2_get_video_from' => 'vimeo',
                                'button_2_type'           => 'video',
                                'content_source' => 'default',
                            ],
                        ]
                    );

                    /* BUTTON ICONS */
					$repeater->add_control(
						'button_2_icon',
						[
							'label'       => __( 'Font Icons', 'bilalmghl' ),
							'type'        => Controls_Manager::ICONS,
							'label_block' => true,
							'condition'   => [
                                'show_button_2' => 'yes',
                                'content_source' => 'default',
                            ],
                            'separator' => 'before',
						]
					);
					$repeater->add_control(
						'button_2_icon_align',
						[
							'label'   => __( 'Icon Position', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'right',
							'options' => [
								'left'  => __( 'Left', 'bilalmghl' ),
								'right' => __( 'Right', 'bilalmghl' ),
							],
                            'condition' => [
                                'show_button_2' => 'yes',
                                'content_source' => 'default',
                            ],
						]
					);


                $repeater->end_controls_tab();
                $repeater->start_controls_tab(
                    'slide_style_tab',
                    [
                        'label' => __( 'Style', 'bilalmghl' ),
                    ]
                );
                    $repeater->add_control(
                        'current_slide_height_heading',
                        [
                            'label'     => __( 'Slide Align', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_responsive_control(
                        'current_slide_height',
                        [
                            'name'      => 'current_slide_height',
                            'label'   => esc_html__( 'Slider Height', 'bilalmghl' ),
                            'label_block' => true,
                            'type'       => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                                'range'      => [
                                    'px' => [
                                        'min'  => 0,
                                        'max'  => 9999,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'unit' => 'px',
                                    'size' => 500,
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .container' => 'min-height: {{SIZE}}{{UNIT}};',
                                ],
                            'separator' => 'before',
                            'responsive' => true,
                        ]
                    );


                    $repeater->add_control(
                        'current_slide_align_heading',
                        [
                            'label'     => __( 'Slide Align', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_responsive_control(
                        'current_slide_horizontal_align',
                        [
                            'name'      => 'current_slide_horizontal_align',
                            'label'   => esc_html__( 'Justify Content', 'bilalmghl' ),
                            'label_block' => true,
                            'type'    => Controls_Manager::CHOOSE,
                            
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html_x( 'Flex Start', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-align-start-v',
                                ],
                                'center' => [
                                    'title' => esc_html_x( 'Center', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-align-center-v',
                                ],
                                'flex-end' => [
                                    'title' => esc_html_x( 'Flex End', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-align-end-v',
                                ],
                                'stretch' => [
                                    'title' => esc_html_x( 'Stretch', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-align-stretch-v',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .container' => 'justify-content: {{VALUE}};',
                            ],
                            'separator' => 'before',
                            'responsive' => true,
                        ]
                    );
                    $repeater->add_responsive_control(
                        'current_slide_vertical_align',
                        [
                            'name'      => 'current_slide_vertical_align',
                            'label'   => esc_html__( 'Align Items', 'bilalmghl' ),
                            'label_block' => true,
                            'type'    => Controls_Manager::CHOOSE,
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html_x( 'Flex Start', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-justify-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html_x( 'Center', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-justify-center-h',
                                ],
                                'flex-end' => [
                                    'title' => esc_html_x( 'Flex End', 'Flex Container Control', 'bilalmghl' ),
                                    'icon' => 'eicon-flex eicon-justify-end-h',
                                ],
                                // 'space-between' => [
                                //     'title' => esc_html_x( 'Space Between', 'Flex Container Control', 'bilalmghl' ),
                                //     'icon' => 'eicon-flex eicon-justify-space-between-h',
                                // ],
                                // 'space-around' => [
                                //     'title' => esc_html_x( 'Space Around', 'Flex Container Control', 'bilalmghl' ),
                                //     'icon' => 'eicon-flex eicon-justify-space-around-h',
                                // ],
                                // 'space-evenly' => [
                                //     'title' => esc_html_x( 'Space Evenly', 'Flex Container Control', 'bilalmghl' ),
                                //     'icon' => 'eicon-flex eicon-justify-space-evenly-h',
                                // ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .container' => 'align-items: {{VALUE}};',
                            ],
                            'separator' => 'before',
                            'responsive' => true,
                        ]
                    );
                    $repeater->add_responsive_control(
                        'current_slide_content_align',
                        [
                            'label'   => __( 'Text Alignment', 'bilalmghl' ),
                            'label_block' => true,
                            'type'    => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'bilalmghl' ),
                                    'icon'  => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'bilalmghl' ),
                                    'icon'  => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'bilalmghl' ),
                                    'icon'  => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => __( 'Justify', 'bilalmghl' ),
                                    'icon'  => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide' => 'text-align:{{VALUE}};',
                            ],
                            'default'   => '',
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_slide_content_box_heading',
                        [
                            'label'     => __( 'Content Box', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    // $repeater->add_control(
                    //     'current_slide_content_box',
                    //     [
                    //         'label'     => __( 'Content Box', 'bilalmghl' ),
                    //         'type'      => Controls_Manager::HEADING,
                    //         'separator' => 'before',
                    //     ]
                    // );
                    $repeater->add_responsive_control(
                        'current_slide_content_box',
                        [
                            'name'      => 'current_slide_content_box',
                            'label'      => __( 'Padding', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'current_slide_background_heading',
                        [
                            'label'     => __( 'Slide Background', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'      => 'current_slide_background',
                            'label'     => __( 'Background', 'bilalmghl' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide',
                            'default' => [
                                'url' => BILALMGHL_ADDONS_ROOT_IMG . 'urban-sprite.png' ,
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_slide_overlay_heading',
                        [
                            'label'     => __( 'Slide Overlay', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'      => 'current_slide_overlay',
                            'label'     => __( 'Background', 'bilalmghl' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .main-banner-overlay,
                                {{WRAPPER}} {{CURRENT_ITEM}}.single-slide .main-banner-overlay',
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_slide_overlay_opacity',
                        [
                            'label' => __( 'Overlay Opacity', 'bilalmghl' ),
                            'type'  => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'max'  => 1,
                                    'min'  => 0.10,
                                    'step' => 0.01,
                                ],
                            ],
							'default' => [
								'unit' => 'px',
								'size' => 0.6,
							],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .main-banner-overlay' => 'opacity: {{SIZE}};',
                                '{{WRAPPER}} {{CURRENT_ITEM}}.single-slide .main-banner-overlay'  => 'opacity: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    /* BUTTON STYLE */
                    $repeater->add_control(
                        'current_subtitle_before_display_heading',
                        [
                            'label'     => __( 'Sub Title Before Display ON/OFF', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_responsive_control(
                        'current_subtitle_before_display',
                        [
            
                            'name'      => 'current_subtitle_before_display',
                            'label'   => __( 'Before None', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'block',
                            'options' => [
                                ''             => __( 'Default', 'bilalmghl' ),
                                'block'        => __( 'Block', 'bilalmghl' ),
                                'none'         => __( 'none', 'bilalmghl' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .small-title:before' => 'display: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_control(
                        'current_subtitle_after_display_heading',
                        [
                            'label'     => __( 'Sub Title After Display ON/OFF', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_responsive_control(
                        'current_subtitle_after_display',
                        [   
                            'name'  => 'current_subtitle_after_display',
                            'label'   => __( 'Display', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'block',
                            'options' => [
                                ''             => __( 'Default', 'bilalmghl' ),
                                'block'        => __( 'Block', 'bilalmghl' ),
                                'none'         => __( 'none', 'bilalmghl' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .small-title:after' => 'display: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    /* BUTTON STYLE */
                    $repeater->add_control(
                        'current_button_normal_style_heading',
                        [
                            'label'     => __( 'Button 2 Style', 'bilalmghl' ),
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
                                '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2 .oscar__btn_icon' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'     => 'current_button_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'     => 'current_button_border',
                            'label'    => __( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2',
                        ]
                    );
                    
                    $repeater->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'current_button_shadow',
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2',
                        ]
                    );

                    $repeater->add_control(
                        'current_button_hover_style_heading',
                        [
                            'label' => __( 'Button 2 Hover Style', 'bilalmghl' ),
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
                                '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2:hover .oscar__btn_icon' => 'color: {{VALUE}} !important;',
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
                                '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2:hover' => 'color: {{VALUE}} !important;',
                            ],
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'     => 'current_button_hover_background',
                            'label'    => __( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2:hover',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'     => 'current_button_hover_border',
                            'label'    => __( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2:hover',
                            'separator' => 'before',
                        ]
                    );
                    $repeater->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'current_button_hover_shadow',
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .banner-caption .welcome_slide_button_2:hover',
                        ]
                    );

                $repeater->end_controls_tab();
            $repeater->end_controls_tabs();		
            $this->add_control(
                'content_slide_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'content_subtitle' => esc_html__('world trip','bilalmghl'),
                        ],
                    ],
                    'title_field' => '{{{ content_subtitle }}}',
                    'separator'   => 'before',
                ]
            );
            $this->add_control(
                'content_slide_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'content_title' => esc_html__('Keep The ','bilalmghl'),
                        ],
                    ],
                    'title_field' => '{{{ content_title }}}',
                    'separator'   => 'before',
                ]
            );
            $this->add_control(
                'content_slide_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'content_title2' => esc_html__('World In Your Hand','bilalmghl'),
                        ],
                    ],
                    'title_field' => '{{{ content_title2 }}}',
                    'separator'   => 'before',
                ]
            );

            $this->add_control(
                'link_click_event',
                [
                    'label'   => esc_html__( 'Click Event', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'        => esc_html__( 'None', 'bilalmghl' ),
                        'lightbox'    => esc_html__( 'Lightbox', 'bilalmghl' ),
                        'custom_link' => esc_html__( 'Custom Link', 'bilalmghl' ),
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'content_options_heading',
                [
                    'label'     => esc_html__( 'Content Options', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'show_content',
                [
                    'label'        => esc_html__( 'Show Content ?', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'On', 'bilalmghl' ),
                    'label_off'    => esc_html__( 'Off', 'bilalmghl' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'show_title',
                [
                    'label'        => esc_html__( 'Show Title ?', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'On', 'bilalmghl' ),
                    'label_off'    => esc_html__( 'Off', 'bilalmghl' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                    'condition'    => [
                        'show_content' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'show_title2',
                [
                    'label'        => esc_html__( 'Show Medium Title ?', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'On', 'bilalmghl' ),
                    'label_off'    => esc_html__( 'Off', 'bilalmghl' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                    'condition' => [
                        'content_layout_style' => 'travel_destinations'
                    ],
                    // 'condition'    => [
                    //     'show_content' => 'yes',
                    // ],
                ]
            );
            $this->add_control(
                'show_subtitle',
                [
                    'label'        => esc_html__( 'Show Subtitle', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'On', 'bilalmghl' ),
                    'label_off'    => esc_html__( 'Off', 'bilalmghl' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                    'condition'    => [
                        'show_content' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'show_description',
                [
                    'label'        => esc_html__( 'Show Description ?', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'On', 'bilalmghl' ),
                    'label_off'    => esc_html__( 'Off', 'bilalmghl' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                    'condition'    => [
                        'show_content' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'content_size',
                [
                    'label'     => esc_html__( 'Content Total Words', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 50,
                    'step'      => 1,
                    'default'   => 10,
                    'condition' => [
                        'show_description' => 'yes',
                        'show_content'     => 'yes',
                    ],
                ]
            );
        $this->end_controls_section();
        /*---------------------------
            CONTENT SECTION END
        -----------------------------*/

        /*---------------------------
            CAROUSEL SETTING
        -----------------------------*/
        $this->start_controls_section(
            'slider_option',
            [
                'label'     => esc_html__( 'Carousel Option', 'bilalmghl' ),
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

            $this->add_control(
                'slitems',
                [
                    'label'     => esc_html__( 'Slider Items', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 20,
                    'step'      => 1,
                    'default'   => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slrows',
                [
                    'label'     => esc_html__( 'Slider Rows', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 0,
                    'max'       => 5,
                    'step'      => 1,
                    'default'   => 0,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_responsive_control(
                'slitemmargin',
                [
                    'label'     => esc_html__( 'Slider Item Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1,
                    'default'   => 1,
                    'selectors' => [
                        '{{WRAPPER}} .single-slide' => 'margin: calc( {{VALUE}}px / 2 );',
                        '{{WRAPPER}} .slick-list'                     => 'margin: calc( -{{VALUE}}px / 2 );',
                    ],
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label'        => esc_html__( 'Slider Arrow', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'yes',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'arrows_styles',
                [
                    'label'   => esc_html__( 'Arrow Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'arrows_styles_1',
                    'options' => [
                        'arrows_styles_1'  => esc_html__( 'Arrows Styles 1', 'bilalmghl' ),
                        'arrows_styles_2' => esc_html__( 'Arrows Styles 2', 'bilalmghl' ),
                        'arrows_styles_3'                => esc_html__( 'Arrows Styles 3', 'bilalmghl' ),
                    ],
                    'condition' => [
                        'slarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'nav_position',
                [
                    'label'   => esc_html__( 'Arrow Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'inside_vertical_center_nav',
                    'options' => [
                        'inside_vertical_center_nav'  => esc_html__( 'Inside Vertical Center', 'bilalmghl' ),
                        'outside_vertical_center_nav' => esc_html__( 'Outside Vertical Center', 'bilalmghl' ),
                        'top_left_nav'                => esc_html__( 'Top Left', 'bilalmghl' ),
                        'top_center_nav'              => esc_html__( 'Top Center', 'bilalmghl' ),
                        'top_right_nav'               => esc_html__( 'Top Right', 'bilalmghl' ),
                        'bottom_left_nav'             => esc_html__( 'Bottom Left', 'bilalmghl' ),
                        'bottom_center_nav'           => esc_html__( 'Bottom Center', 'bilalmghl' ),
                        'bottom_right_nav'            => esc_html__( 'Bottom Right', 'bilalmghl' ),
                    ],
                    'condition' => [
                        'slarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slprevicon',
                [
                    'label'       => __( 'Previous icon', 'bilalmghl' ),
                    'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default'     => [
                        'value'   => 'fas fa-angle-left',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'slider_on' => 'yes',
                        'slarrows'  => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slnexticon',
                [
                    'label'       => __( 'Next icon', 'bilalmghl' ),
                    'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default'     => [
                        'value'   => 'fas fa-angle-right',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'slider_on' => 'yes',
                        'slarrows'  => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'nav_visible',
                [
                    'label'        => esc_html__( 'Arrow Visibility', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'visibility:visible;opacity:1;',
                    'default'      => 'no',
                    'selectors'    => [
                        '{{WRAPPER}} .oscar-nav > div' => '{{VALUE}}',
                    ],
                    'condition'   => [
                        'slarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label'        => esc_html__( 'Slider dots', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slpause_on_hover',
                [
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__('No', 'bilalmghl'),
                    'label_on'     => esc_html__('Yes', 'bilalmghl'),
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'yes',
                    'label'        => esc_html__('Pause on Hover?', 'bilalmghl'),
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slcentermode',
                [
                    'label'        => esc_html__( 'Center Mode', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slcenterpadding',
                [
                    'label'     => esc_html__( 'Center padding', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 0,
                    'max'       => 500,
                    'step'      => 1,
                    'default'   => 50,
                    'condition' => [
                        'slider_on'    => 'yes',
                        'slcentermode' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slfade',
                [
                    'label'        => esc_html__( 'Slider Fade', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slfocusonselect',
                [
                    'label'        => esc_html__( 'Focus On Select', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slvertical',
                [
                    'label'        => esc_html__( 'Vertical Slide', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slinfinite',
                [
                    'label'        => esc_html__( 'Infinite', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'yes',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slrtl',
                [
                    'label'        => esc_html__( 'RTL Slide', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautolay',
                [
                    'label'        => esc_html__( 'Slider auto play', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'no',
                    'condition'    => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautoplay_speed',
                [
                    'label'     => esc_html__('Autoplay speed', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'default'   => 3000,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'slanimation_speed',
                [
                    'label'     => esc_html__('Autoplay animation speed', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'default'   => 300,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slscroll_columns',
                [
                    'label'     => esc_html__('Slider item to scroll', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 10,
                    'step'      => 1,
                    'default'   => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'heading_tablet',
                [
                    'label'     => esc_html__( 'Tablet', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sltablet_display_columns',
                [
                    'label'     => esc_html__('Slider Items', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 8,
                    'step'      => 1,
                    'default'   => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sltablet_scroll_columns',
                [
                    'label'     => esc_html__('Slider item to scroll', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 8,
                    'step'      => 1,
                    'default'   => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sltablet_width',
                [
                    'label'       => esc_html__('Tablet Resolution', 'bilalmghl'),
                    'description' => esc_html__('The resolution to tablet.', 'bilalmghl'),
                    'type'        => Controls_Manager::NUMBER,
                    'default'     => 750,
                    'condition'   => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'heading_mobile',
                [
                    'label'     => esc_html__( 'Mobile Phone', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slmobile_display_columns',
                [
                    'label'     => esc_html__('Slider Items', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 4,
                    'step'      => 1,
                    'default'   => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slmobile_scroll_columns',
                [
                    'label'     => esc_html__('Slider item to scroll', 'bilalmghl'),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => 1,
                    'max'       => 4,
                    'step'      => 1,
                    'default'   => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slmobile_width',
                [
                    'label'       => esc_html__('Mobile Resolution', 'bilalmghl'),
                    'description' => esc_html__('The resolution to mobile.', 'bilalmghl'),
                    'type'        => Controls_Manager::NUMBER,
                    'default'     => 480,
                    'condition'   => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

        $this->end_controls_section();
        /*-----------------------
            SLIDER OPTIONS END
        -------------------------*/     
        
        /*----------------------------
            SLIDER NAV WARP
        -----------------------------*/
        $this->start_controls_section(
            'slider_control_warp_style_section',
            [
                'label'     => esc_html__( 'Slider Arrow Warp', 'bilalmghl' ),
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'slider_nav_warp_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .oscar-nav',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'slider_nav_warp_border',
                    'label'    => esc_html__( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .oscar-nav',
                ]
            );
            $this->add_control(
                'slider_nav_warp_radius',
                [
                    'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'slider_nav_warp_shadow',
                    'selector' => '{{WRAPPER}} .oscar-nav',
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_display',
                [
                    'label'   => esc_html__( 'Display', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        'initial'      => esc_html__( 'Initial', 'bilalmghl' ),
                        'block'        => esc_html__( 'Block', 'bilalmghl' ),
                        'inline-block' => esc_html__( 'Inline Block', 'bilalmghl' ),
                        'flex'         => esc_html__( 'Flex', 'bilalmghl' ),
                        'inline-flex'  => esc_html__( 'Inline Flex', 'bilalmghl' ),
                        'none'         => esc_html__( 'none', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav' => 'display: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_position',
                [
                    'label'   => esc_html__( 'Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '',
                    
                    'options' => [
                        'initial'  => esc_html__( 'Initial', 'bilalmghl' ),
                        'absolute' => esc_html__( 'Absulute', 'bilalmghl' ),
                        'relative' => esc_html__( 'Relative', 'bilalmghl' ),
                        'static'   => esc_html__( 'Static', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav' => 'position: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_position_from_left',
                [
                    'label'      => esc_html__( 'From Left', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_nav_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_position_from_right',
                [
                    'label'      => esc_html__( 'From Right', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_nav_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_position_from_top',
                [
                    'label'      => esc_html__( 'From Top', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_nav_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_position_from_bottom',
                [
                    'label'      => esc_html__( 'From Bottom', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_nav_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_align',
                [
                    'label'   => esc_html__( 'Alignment', 'bilalmghl' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => esc_html__( 'Justify', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav' => 'text-align: {{VALUE}};',
                    ],
                    'default' => '',
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_width',
                [
                    'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_height',
                [
                    'label'      => esc_html__( 'Height', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'slider_nav_warp_opacity',
                [
                    'label' => esc_html__( 'Opacity', 'bilalmghl' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max'  => 1,
                            'min'  => 0.10,
                            'step' => 0.01,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav' => 'opacity: {{SIZE}};',
                    ],
                ]
            );
            $this->add_control(
                'slider_nav_warp_zindex',
                [
                    'label'     => esc_html__( 'Z-Index', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => -99,
                    'max'       => 99,
                    'step'      => 1,
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav' => 'z-index: {{SIZE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_nav_warp_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();
        /*----------------------------
            SLIDER NAV WARP END
        -----------------------------*/

        /*------------------------
            ARROW STYLE
        --------------------------*/
        $this->start_controls_section(
            'slider_arrow_style',
            [
                'label'     => esc_html__( 'Arrow', 'bilalmghl' ),
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );
            $this->start_controls_tabs( 'slider_arrow_style_tabs' );
                $this->start_controls_tab(
                    'slider_arrow_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'bilalmghl' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_arrow_fontsize',
                        [
                            'label'      => esc_html__( 'Font Size', 'bilalmghl' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range'      => [
                                'px' => [
                                    'min'  => 0,
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
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'slider_arrow_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-arrow',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'slider_arrow_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'slider_arrow_shadow',
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_arrow_height',
                        [
                            'label'      => esc_html__( 'Height', 'bilalmghl' ),
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
                                'size' => 40,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_arrow_width',
                        [
                            'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                                'size' => 46,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_arrow_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_arrow_padding',
                        [
                            'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_position_from_left',
                        [
                            'label'      => esc_html__( 'Left Arrow Position From Left', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav > div.oscar-prev' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_position_from_bottom',
                        [
                            'label'      => esc_html__( 'Left Arrow Position From Top', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav > div.oscar-prev' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_position_from_right',
                        [
                            'label'      => esc_html__( 'Right Arrow Position From Right', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav > div.oscar-next' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_position_from_top',
                        [
                            'label'      => esc_html__( 'Right Arrow Position From Top', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav > div.oscar-next' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'slider_arrow_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'bilalmghl' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_hover_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'slider_arrow_hover_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-arrow:hover',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'slider_arrow_hover_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-arrow:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_arrow_hover_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'slider_arrow_hover_shadow',
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-arrow:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_left',
                        [
                            'label'      => esc_html__( 'Left Arrow Position From Left', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav:hover .owl-nav > div.oscar-prev' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_bottom',
                        [
                            'label'      => esc_html__( 'Left Arrow Position From Top', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav:hover .owl-nav > div.oscar-prev' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_right',
                        [
                            'label'      => esc_html__( 'Right Arrow Position From Right', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav:hover .owl-nav > div.oscar-next' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_top',
                        [
                            'label'      => esc_html__( 'Right Arrow Position From Top', 'bilalmghl' ),
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
                                '{{WRAPPER}} .oscar-nav:hover .owl-nav > div.oscar-next' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*------------------------
             ARROW STYLE END
        --------------------------*/

        /*----------------------------
            SLIDER DOTS WARP
        -----------------------------*/
        $this->start_controls_section(
            'slider_dots_warp_style_section',
            [
                'label'     => esc_html__( 'Slider Dots Warp', 'bilalmghl' ),
                'condition' => [
                    'slider_on' => 'yes',
                    'sldots'    => 'yes',
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'slider_dots_warp_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .oscar-nav .owl-dots',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'slider_dots_warp_border',
                    'label'    => esc_html__( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .oscar-nav .owl-dots',
                ]
            );
            $this->add_control(
                'slider_dots_warp_radius',
                [
                    'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'slider_dots_warp_shadow',
                    'selector' => '{{WRAPPER}} .oscar-nav .owl-dots',
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_display',
                [
                    'label'   => esc_html__( 'Display', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        'initial'      => esc_html__( 'Initial', 'bilalmghl' ),
                        'block'        => esc_html__( 'Block', 'bilalmghl' ),
                        'inline-block' => esc_html__( 'Inline Block', 'bilalmghl' ),
                        'flex'         => esc_html__( 'Flex', 'bilalmghl' ),
                        'inline-flex'  => esc_html__( 'Inline Flex', 'bilalmghl' ),
                        'none'         => esc_html__( 'none', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'display: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_position',
                [
                    'label'   => esc_html__( 'Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '',
                    
                    'options' => [
                        'initial'  => esc_html__( 'Initial', 'bilalmghl' ),
                        'absolute' => esc_html__( 'Absulute', 'bilalmghl' ),
                        'relative' => esc_html__( 'Relative', 'bilalmghl' ),
                        'static'   => esc_html__( 'Static', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'position: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_position_from_left',
                [
                    'label'      => esc_html__( 'From Left', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_dots_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_position_from_right',
                [
                    'label'      => esc_html__( 'From Right', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_dots_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_position_from_top',
                [
                    'label'      => esc_html__( 'From Top', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_dots_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_position_from_bottom',
                [
                    'label'      => esc_html__( 'From Bottom', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_dots_warp_position' => ['absolute','relative']
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_align',
                [
                    'label'   => esc_html__( 'Alignment', 'bilalmghl' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => esc_html__( 'Justify', 'bilalmghl' ),
                            'icon'  => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav .owl-dots,{{WRAPPER}} .oscar-nav .slick-dots' => 'text-align: {{VALUE}};',
                    ],
                    'default' => '',
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_width',
                [
                    'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'width: {{SIZE}}{{UNIT}} !important;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_height',
                [
                    'label'      => esc_html__( 'Height', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'slider_dots_warp_opacity',
                [
                    'label' => esc_html__( 'Opacity', 'bilalmghl' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max'  => 1,
                            'min'  => 0.10,
                            'step' => 0.01,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'opacity: {{SIZE}};',
                    ],
                ]
            );
            $this->add_control(
                'slider_dots_warp_zindex',
                [
                    'label'     => esc_html__( 'Z-Index', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'min'       => -99,
                    'max'       => 99,
                    'step'      => 1,
                    'selectors' => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'z-index: {{SIZE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_dots_warp_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav .owl-dots' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'pagination_active_content_wrap_heading',
                [
                    'label'     => esc_html__( 'Slide Content Wrap', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'pagination_active_content_wrap_margin',
                [
                    'label'      => esc_html__( 'Content Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'separator'  => 'before',
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-nav .slick-dotted.slick-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();
        /*----------------------------
            SLIDER DOTS WARP END
        -----------------------------*/

        /*------------------------
             DOTS STYLE
        --------------------------*/
        $this->start_controls_section(
            'post_slider_pagination_style_section',
            [
                'label'     => esc_html__( 'Pagination', 'bilalmghl' ),
                'condition' => [
                    'slider_on' => 'yes',
                    'sldots'    => 'yes',
                ],
            ]
        );
            $this->start_controls_tabs('pagination_style_tabs');
                $this->start_controls_tab(
                    'pagination_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'bilalmghl' ),
                    ]
                );
                    $this->add_responsive_control(
                        'slider_pagination_width',
                        [
                            'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_pagination_height',
                        [
                            'label'      => esc_html__( 'Height', 'bilalmghl' ),
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
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pagination_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-dots li',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pagination_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-dots li',
                        ]
                    );
                    $this->add_responsive_control(
                        'pagination_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'pagination_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'pagination_style_active_tab',
                    [
                        'label' => esc_html__( 'Active', 'bilalmghl' ),
                    ]
                );
                    $this->add_responsive_control(
                        'slider_pagination_hover_width',
                        [
                            'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li:hover, {{WRAPPER}} .oscar-nav .slick-dots li.slick-active' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'slider_pagination_hover_height',
                        [
                            'label'      => esc_html__( 'Height', 'bilalmghl' ),
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
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li:hover, {{WRAPPER}} .oscar-nav .slick-dots li.slick-active' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pagination_hover_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-dots li:hover, {{WRAPPER}} .oscar-nav .slick-dots li.slick-active',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pagination_hover_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .oscar-nav .slick-dots li:hover, {{WRAPPER}} .oscar-nav .slick-dots li.slick-active',
                        ]
                    );
                    $this->add_responsive_control(
                        'pagination_hover_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .oscar-nav .slick-dots li.slick-active' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .oscar-nav .slick-dots li:hover'        => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*------------------------
             DOTS STYLE END
        --------------------------*/

        /*-------------------------
            AREA STYLE
        --------------------------*/
        $this->start_controls_section(
            'items_area_style_section',
            [
                'label'     => esc_html__( 'Main Area Style', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                // 'condition' => [
                //     'slider_on' => 'yes',
                // ],
            ]
        );
            $this->add_responsive_control(
                'slide_area_height',
                [
                    'label'      => esc_html__( 'height', 'bilalmghl' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw', 'vh' ],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 9999,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 500,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single-slide .container' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slide_area_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single-slide' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'slide_area_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();   
        /*-------------------------
            AREA STYLE END
        --------------------------*/

        /*-------------------------
            CONTENT AREA STYLE
        --------------------------*/
        $this->start_controls_section(
            'box_style_section',
            [
                'label'     => esc_html__( 'Content Area Style', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_content' => 'yes'
                ],
            ]
        );
            $this->add_responsive_control(
                'box_max_width',
                [
                    'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .banner-caption' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'      => 'box_border',
                    'label'     => esc_html__( 'Border', 'bilalmghl' ),
                    'selector'  => '{{WRAPPER}} .banner-caption',
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'box_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .banner-caption' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
            $this->add_group_control(
                 Group_Control_Box_Shadow:: get_type(),
                 [
                     'name'     => 'box_box_shadow',
                     'label'    => esc_html__( 'Box Shadow', 'bilalmghl' ),
                     'selector' => '{{WRAPPER}} .banner-caption',
                 ]
             );
            $this->add_responsive_control(
                'box_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .banner-caption' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .banner-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // $this->add_control(
            //     'box_item_vertical_align',
            //     [
            //         'label'   => esc_html__( 'Vertical Align', 'bilalmghl' ),
            //         'type'    => Controls_Manager::SELECT,
            //         'default' => 'center;',
            //         'options' => [
            //             'flex-start;' => esc_html__( 'Start', 'bilalmghl' ),
            //             'center;'     => esc_html__( 'Center', 'bilalmghl' ),
            //             'flex-end;'   => esc_html__( 'End', 'bilalmghl' ),
            //         ],
            //         'selectors' => [
            //             '{{WRAPPER}} .banner-caption' => 'display: flex; align-items: {{VALUE}}',
            //         ],
            //         'separator' => 'before',
            //     ]
            // );
            // $this->add_responsive_control(
            //     'box_item_horizontal_align',
            //     [
            //         'label'   => esc_html__( 'Horizontal Alignment', 'bilalmghl' ),
            //         'type'    => Controls_Manager::CHOOSE,
            //         'options' => [
            //             'flex-start' => [
            //                 'title' => esc_html__( 'Left', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-left',
            //             ],
            //             'center' => [
            //                 'title' => esc_html__( 'Center', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-center',
            //             ],
            //             'flex-end' => [
            //                 'title' => esc_html__( 'Right', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-right',
            //             ],
            //             'justify' => [
            //                 'title' => esc_html__( 'Justify', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-justify',
            //             ],
            //         ],
            //         'selectors' => [
            //             '{{WRAPPER}} .banner-caption' => 'justify-content: {{VALUE}};',
            //         ],
            //         'separator' => 'before',
            //     ]
            // );
            // $this->add_responsive_control(
            //     'box_item_text_align',
            //     [
            //         'label'   => __( 'Alignment', 'bilalmghl' ),
            //         'type'    => Controls_Manager::CHOOSE,
            //         'options' => [
            //             'left' => [
            //                 'title' => __( 'Left', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-left',
            //             ],
            //             'center' => [
            //                 'title' => __( 'Center', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-center',
            //             ],
            //             'right' => [
            //                 'title' => __( 'Right', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-right',
            //             ],
            //             'justify' => [
            //                 'title' => __( 'Justify', 'bilalmghl' ),
            //                 'icon'  => 'fa fa-align-justify',
            //             ],
            //         ],
            //         'selectors' => [
            //             '{{WRAPPER}} .banner-caption' => 'text-align: {{VALUE}};',
            //         ],
            //         'separator' => 'before',
            //     ]
            // );
        $this->end_controls_section();
        /*-------------------------
            CONTENT AREA STYLE END
        --------------------------*/

        /*-------------------------
            INNER CONTENT STYLE
        --------------------------*/
        $this->start_controls_section(
            'box_inner_style_section',
            [
                'label'     => esc_html__( 'Innter Content Style', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_content' => 'yes'
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'box_inner_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .banner-caption',
                ]
            );
            $this->add_responsive_control(
                'box_inner_max_width',
                [
                    'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .banner-caption' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'      => 'box_inner_border',
                    'label'     => esc_html__( 'Border', 'bilalmghl' ),
                    'selector'  => '{{WRAPPER}} .banner-caption',
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'box_inner_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .banner-caption' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
            $this->add_group_control(
                 Group_Control_Box_Shadow:: get_type(),
                 [
                     'name'     => 'box_inner_shadow',
                     'label'    => esc_html__( 'Box Shadow', 'bilalmghl' ),
                     'selector' => '{{WRAPPER}} .banner-caption',
                 ]
             );
            $this->add_responsive_control(
                'box_inner_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .banner-caption' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'box_inner_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .banner-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_inner_text_align',
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
                        '{{WRAPPER}} .banner-caption' => 'text-align: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*-------------------------
            INNER CONTENT STYLE END
        --------------------------*/
        
        /*-------------------------
            TITLE STYLE
        --------------------------*/
        $this->start_controls_section(
            'title_section_style',
            [
                'label'     => esc_html__( 'Title', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .oscar-main-banner .title',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .oscar-main-banner .title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'title_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .oscar-main-banner .title',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-main-banner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'title_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-main-banner .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'title_max_width',
                [
                    'label'      => esc_html__( 'Max Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-main-banner .title' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*-------------------------
            TITLE STYLE END
        --------------------------*/
        /*-------------------------
            TITLE STYLE
        --------------------------*/
        $this->start_controls_section(
            'title2_section_style',
            [
                'label'     => esc_html__( 'Title', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_title2' => 'yes'
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'title2_typography',
                    'selector' => '{{WRAPPER}} .oscar-main-banner .title2',
                ]
            );
            $this->add_control(
                'title2_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .oscar-main-banner .title2' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'title2_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .oscar-main-banner .title2',
                ]
            );
            $this->add_responsive_control(
                'title2_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-main-banner .title2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'title2_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .oscar-main-banner .title2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'title2_max_width',
                [
                    'label'      => esc_html__( 'Max Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .oscar-main-banner .title2' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*-------------------------
            TITLE STYLE END
        --------------------------*/
        /*----------------------------
            Title Medium BEFORE / AFTER
        -----------------------------*/
        $this->start_controls_section(
            'title2_before_after_style_section',
            [
                'label'     => __( 'Title Medium Before / After', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_title2' => 'yes',
                ],
            ]
        );
            $this->start_controls_tabs( 'title2_before_after_tab_style' );
                $this->start_controls_tab(
                    'title2_before_tab',
                    [
                        'label' => __( 'BEFORE', 'bilalmghl' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'      => 'title2_before_background',
                            'label'     => __( 'Background', 'bilalmghl' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} .title2:before',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_display',
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
                                '{{WRAPPER}} .title2:before' => 'display: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_position',
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
                                '{{WRAPPER}} .title2:before' => 'position: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_position_from_left',
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
                                '{{WRAPPER}} .title2:before' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_before_position!' => ['']
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_position_from_right',
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
                                '{{WRAPPER}} .title2:before' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_before_position!' => ['']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_position_from_top',
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
                                '{{WRAPPER}} .title2:before' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_before_position!' => ['']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_position_from_bottom',
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
                                '{{WRAPPER}} .title2:before' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_before_position!' => ['']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_align',
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
                                '{{WRAPPER}} .title2:before' => '{{VALUE}};',
                            ],
                            'default'   => 'text-align:left',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_width',
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
                                '{{WRAPPER}} .title2:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_height',
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
                                '{{WRAPPER}} .title2:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'title2_before_opacity',
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
                                '{{WRAPPER}} .title2:before' => 'opacity: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'title2_before_zindex',
                        [
                            'label'     => __( 'Z-Index', 'bilalmghl' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => -99,
                            'max'       => 99,
                            'step'      => 1,
                            'selectors' => [
                                '{{WRAPPER}} .title2:before' => 'z-index: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_before_margin',
                        [
                            'label'      => __( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .title2:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'title2_after_tab',
                    [
                        'label' => __( 'AFTER', 'bilalmghl' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'      => 'title2_after_background',
                            'label'     => __( 'Background', 'bilalmghl' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} .title2:after',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_display',
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
                                '{{WRAPPER}} .title2:after' => 'display: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_position',
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
                                '{{WRAPPER}} .title2:after' => 'position: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_position_from_left',
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
                                '{{WRAPPER}} .title2:after' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_after_position!' => ['']
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_position_from_right',
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
                                '{{WRAPPER}} .title2:after' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_after_position!' => ['']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_position_from_top',
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
                                '{{WRAPPER}} .title2:after' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_after_position!' => ['']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_position_from_bottom',
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
                                '{{WRAPPER}} .title2:after' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'title2_after_position!' => ['']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_align',
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
                                '{{WRAPPER}} .title2:after' => '{{VALUE}};',
                            ],
                            'default'   => 'text-align:left',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_width',
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
                                '{{WRAPPER}} .title2:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_height',
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
                                '{{WRAPPER}} .title2:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'title2_after_opacity',
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
                                '{{WRAPPER}} .title2:after' => 'opacity: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'title2_after_zindex',
                        [
                            'label'     => __( 'Z-Index', 'bilalmghl' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => -99,
                            'max'       => 99,
                            'step'      => 1,
                            'selectors' => [
                                '{{WRAPPER}} .title2:after' => 'z-index: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'title2_after_margin',
                        [
                            'label'      => __( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .title2:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*----------------------------
            Title Medium BEFORE / AFTER END
        -----------------------------/*
        /*-------------------------
            SUBTITLE
        --------------------------*/
        $this->start_controls_section(
            'subtitle_section_style',
            [
                'label'     => esc_html__( 'Subtitle', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
					'show_subtitle' => 'yes',
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'subtitle_typography',
                    'selector' => '{{WRAPPER}} .small-title',
                ]
            );
            $this->add_control(
                'subtitle_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .small-title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'subtitle_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .small-title',
                ]
            );
            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .small-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'subtitle_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .small-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
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
                        '{{WRAPPER}} .small-title' => 'display: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*-------------------------
            SUBTITLE END
        --------------------------*/

		/*----------------------------
			SUBTITLE BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_before_after_style_section',
			[
				'label'     => __( 'Subtitle Before / After', 'bilalmghl' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_subtitle' => 'yes',
                ],
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
							'selector'  => '{{WRAPPER}} .small-title:before',
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
								'{{WRAPPER}} .small-title:before' => 'display: {{VALUE}};',
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
								'{{WRAPPER}} .small-title:before' => 'position: {{VALUE}};',
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
								'{{WRAPPER}} .small-title:before' => 'left: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:before' => 'right: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:before' => 'top: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:before' => 'bottom: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:before' => '{{VALUE}};',
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
								'{{WRAPPER}} .small-title:before' => 'width: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:before' => 'height: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:before' => 'opacity: {{SIZE}};',
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
								'{{WRAPPER}} .small-title:before' => 'z-index: {{SIZE}};',
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
								'{{WRAPPER}} .small-title:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'selector'  => '{{WRAPPER}} .small-title:after',
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
								'{{WRAPPER}} .small-title:after' => 'display: {{VALUE}};',
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
								'{{WRAPPER}} .small-title:after' => 'position: {{VALUE}};',
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
								'{{WRAPPER}} .small-title:after' => 'left: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:after' => 'right: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:after' => 'top: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:after' => 'bottom: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:after' => '{{VALUE}};',
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
								'{{WRAPPER}} .small-title:after' => 'width: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:after' => 'height: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .small-title:after' => 'opacity: {{SIZE}};',
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
								'{{WRAPPER}} .small-title:after' => 'z-index: {{SIZE}};',
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
								'{{WRAPPER}} .small-title:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            DESCRIPTION STYLE
        -----------------------------*/
        $this->start_controls_section(
            'description_style_section',
            [
                'label'     => __( 'Description', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_content' => 'yes'
                ],
            ]
        );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'description_typography',
                    'selector' => '{{WRAPPER}} .main_slider .description',
                ]
            );
            $this->add_control(
                'description_color',
                [
                    'label'     => __( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} .main_slider .description' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'description_background',
                    'label'    => __( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .main_slider .description',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'description_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .main_slider .description',
                ]
            );
            $this->add_responsive_control(
                'description_radius',
                [
                    'label'      => __( 'Border Radius', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .main_slider .description' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'description_shadow',
                    'selector' => '{{WRAPPER}} .main_slider .description',
                ]
            );
            $this->add_responsive_control(
                'description_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .main_slider .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'description_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .main_slider .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'description_display',
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
                        '{{WRAPPER}} .main_slider .description' => 'display: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'description_max_width',
                [
                    'label'      => esc_html__( 'Max Width', 'bilalmghl' ),
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
                        '{{WRAPPER}} .main_slider .description' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*----------------------------
            DESCRIPTION STYLE END
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
						'label' => __( 'Button', 'bilalmghl' ),
					]
				);
                    $this->add_control(
                        'button_color',
                        [
                            'label'     => __( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} .oscar-btn' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'button_typography',
                            'selector' => '{{WRAPPER}} .oscar-btn',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                            [
							'name'     => 'button_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .oscar-btn',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'button_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .oscar-btn',
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
								'{{WRAPPER}} .oscar-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'button_shadow',
							'selector' => '{{WRAPPER}} .oscar-btn',
						]
					);
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
							'separator' => 'before',
						]
					);
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
					$this->add_responsive_control(
						'button_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
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
								'{{WRAPPER}} .oscar-btn' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
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
								'{{WRAPPER}} .oscar-btn' => 'text-align: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_position',
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
								'{{WRAPPER}} .oscar-btn' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_position_from_left',
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
								'{{WRAPPER}} .oscar-btn' => 'left: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'button_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_position_from_right',
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
								'{{WRAPPER}} .oscar-btn' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'button_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'button_position_from_top',
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
								'{{WRAPPER}} .oscar-btn' => 'top: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'button_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'button_position_from_bottom',
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
								'{{WRAPPER}} .oscar-btn' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'button_position!' => ['']
							],
						]
					);
					$this->add_control(
						'button_transition',
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
								'{{WRAPPER}} .oscar-btn,{{WRAPPER}} .oscar-btn img' => 'transition: {{SIZE}}s;',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'button_margin',
						[
							'label'      => __( 'Margin', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .oscar-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .oscar-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .oscar-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .oscar-btn:hover' => 'color: {{VALUE}};',
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
							'selector' => '{{WRAPPER}} .oscar-btn:hover',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'hover_button_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .oscar-btn:hover',
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
								'{{WRAPPER}} .oscar-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_button_shadow',
							'selector' => '{{WRAPPER}} .oscar-btn:hover',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'button_icon_tab',
					[
						'label' => __( 'Icon', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'button_icon_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .oscar__btn_icon' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
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
                                '{{WRAPPER}} .oscar__btn_icon i'   => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .oscar__btn_icon img' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .oscar__btn_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
					$this->add_control(
						'hover_button_icon_color',
						[
							'label'     => __( 'Hover Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .oscar-btn:hover i' => 'color: {{VALUE}};',
							],
						]
					);
                    $this->add_responsive_control(
                        'button_icon_margin',
                        [
                            'label'      => __( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .oscar__btn_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
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
			VIDEO BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'video_button_icon_style_section',
			[
				'label' => __( 'Video Button', 'bilalmghl' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs( 'video_button_icon_tab_style' );
				$this->start_controls_tab(
					'video_button_icon_normal_tab',
					[
						'label' => __( 'Icon', 'bilalmghl' ),
					]
				);
                    $this->add_control(
                        'video_button_icon_color',
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
                    $this->add_responsive_control(
                        'video_button_icon_size',
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
                                'size' => '22',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .button__icon i'   => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .button__icon img' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .button__icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
							'name'     => 'video_button_icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .button__icon,{{WRAPPER}} .button__icon:before',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'video_button_icon_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .button__icon',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'video_button_icon_radius',
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
							'name'     => 'video_button_icon_shadow',
							'selector' => '{{WRAPPER}} .button__icon',
						]
					);
					$this->add_responsive_control(
						'video_button_icon_width',
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
						'video_button_icon_height',
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
						'video_button_icon_display',
						[
							'label'   => __( 'Display', 'bilalmghl' ),
							'type'    => Controls_Manager::SELECT,
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
								'{{WRAPPER}} .button__icon' => 'display: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'video_button_icon_align',
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
						'video_button_icon_position',
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
								'{{WRAPPER}} .button__icon' => 'position: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'video_button_icon_position_from_left',
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
								'video_button_icon_position!' => ['']
							],
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'video_button_icon_position_from_right',
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
								'video_button_icon_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'video_button_icon_position_from_top',
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
								'video_button_icon_position!' => ['']
							],
						]
					);
					$this->add_responsive_control(
						'video_button_icon_position_from_bottom',
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
								'video_button_icon_position!' => ['']
							],
						]
					);
					$this->add_control(
						'video_button_icon_transition',
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
						'video_button_icon_margin',
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
						'video_button_icon_padding',
						[
							'label'      => __( 'Padding', 'bilalmghl' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .button__icon i'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .button__icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'video_button_icon_hover_tab',
					[
						'label' => __( 'Hover Icon', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'hover_video_button_icon_color',
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
							'name'     => 'hover_video_button_icon_background',
							'label'    => __( 'Background', 'bilalmghl' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .video__popup__button:hover .button__icon,{{WRAPPER}} .video__popup__button:hover .button__icon:before',
						]
					);
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'      => 'hover_video_button_icon_border',
							'label'     => __( 'Border', 'bilalmghl' ),
							'selector'  => '{{WRAPPER}} .video__popup__button:hover .button__icon,{{WRAPPER}} .video__popup__button:hover .button__icon',
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_video_button_icon_radius',
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
							'name'     => 'hover_video_button_icon_shadow',
							'selector' => '{{WRAPPER}} .video__popup__button:hover .button__icon',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'video_button_icon_text_tab',
					[
						'label' => __( 'Title', 'bilalmghl' ),
					]
				);
					$this->add_control(
						'video_button_text_color',
						[
							'label'     => __( 'Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .video__popup__button .button__text' => 'color: {{VALUE}};',
							],
							'separator' => 'before',
						]
					);
					$this->add_control(
						'hover_video_button_text_color',
						[
							'label'     => __( 'Hover Color', 'bilalmghl' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .video__popup__button:hover .button__text' => 'color: {{VALUE}};',
							],
						]
					);
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'video_button_text_typography',
                            'selector' => '{{WRAPPER}} .video__popup__button .button__text',
                        ]
                    );

                    $this->add_responsive_control(
                        'video_button_text_margin',
                        [
                            'label'      => __( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .video__popup__button .button__text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
							'separator' => 'before',
                        ]
                    );

				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			VIDEO BUTTON STYLE END
		-----------------------------*/

    }

    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();
        $gallery_id = $this->get_id();
        // Carousel Aea Atrribute
        // $this->add_render_attribute( 'oscar_content_main_wrap', 'class', 'oscar-nav' );    
        $this->add_render_attribute( 'oscar_content_main_wrap', 'class', $settings['nav_position'] );

        // Slier Main Content Area Class
        $this->add_render_attribute( 'oscar_content_main_wrap', 'class', 'oscar-main-banner' );

        if( $settings['slider_on'] == 'yes' ){

            $this->add_render_attribute( 'oscar_content_wrap_attr', 'class', 'oscar-carousel-activation' );
            $slideid = rand(2564,1245);

            $slider_settings = [
                'gallery_id'      => $gallery_id,
                'slideid'         => $slideid,
                'arrows'          => ('yes' === $settings['slarrows']),
                'arrow_prev_txt'  => $settings['slprevicon']['value'],
                'arrow_next_txt'  => $settings['slnexticon']['value'],
                'dots'            => ('yes' === $settings['sldots']),
                'autoplay'        => ('yes' === $settings['slautolay']),
                'autoplay_speed'  => absint($settings['slautoplay_speed']),
                'animation_speed' => absint($settings['slanimation_speed']),
                'pause_on_hover'  => ('yes' === $settings['slpause_on_hover']),
                'center_mode'     => ( 'yes' === $settings['slcentermode']),
                'center_padding'  => absint($settings['slcenterpadding']),
                'rows'            => absint($settings['slrows']),
                'fade'            => ( 'yes' === $settings['slfade']),
                'focusonselect'   => ( 'yes' === $settings['slfocusonselect']),
                'vertical'        => ( 'yes' === $settings['slvertical']),
                'rtl'             => ( 'yes' === $settings['slrtl']),
                'infinite'        => ( 'yes' === $settings['slinfinite']),
            ];

            $slider_responsive_settings = [
                'display_columns'        => $settings['slitems'],
                'scroll_columns'         => $settings['slscroll_columns'],
                'tablet_width'           => $settings['sltablet_width'],
                'tablet_display_columns' => $settings['sltablet_display_columns'],
                'tablet_scroll_columns'  => $settings['sltablet_scroll_columns'],
                'mobile_width'           => $settings['slmobile_width'],
                'mobile_display_columns' => $settings['slmobile_display_columns'],
                'mobile_scroll_columns'  => $settings['slmobile_scroll_columns'],
            ];

            $slider_settings = array_merge( $slider_settings, $slider_responsive_settings );
            $this->add_render_attribute( 'oscar_content_wrap_attr', 'data-settings', wp_json_encode( $slider_settings ) );
        }else{
            $this->add_render_attribute( 'oscar_content_wrap_attr', 'class', 'oscar-welcome-area' );
        }

        // Slider Item Main Class
        $this->add_render_attribute( 'oscar_carousel_item_parent_attr', 'class', 'single-slide',);
        $this->add_render_attribute( 'oscar_carousel_item_parent_attr', 'class', $settings['content_layout_style'] );

        // Item Content Class
        $this->add_render_attribute( 'oscar_carousel_item_attr', 'class', 'banner-caption' );

        /*  <?php echo esc_attr( 'elementor-repeater-item-'.$_single['_id'] ) ?> */

    ?>
        <div <?php echo $this->get_render_attribute_string('oscar_content_main_wrap'); ?>>

            <div <?php echo $this->get_render_attribute_string('oscar_content_wrap_attr'); ?>>
                <?php foreach ( $settings['content_slide_list'] as $_single ): ?>

                    <?php
                        $slide_item_attribute = [
                            'single-slide',
                            $settings['content_layout_style'],
                            'elementor-repeater-item-'.$_single['_id']
                        ];
                    ?>

                    <div class="<?php echo esc_attr( implode(' ', $slide_item_attribute ) ); ?>">

                    <?php if( 'elementor' == $_single['content_source'] ) : ?>
                        
                        <?php echo Plugin::instance()->frontend->get_builder_content_for_display( $_single['template_id'] ); ?>

                    <?php else : ?>
                        <!-- <div class="slidr-container">  -->

                        <div class="main-banner-overlay"></div>
                        <div <?php echo $this->get_render_attribute_string('oscar_carousel_item_attr'); ?>>

                            <?php if( 'yes' == $settings['show_content'] ) : ?>
                                <div class="container">

                                    <?php if( 'yes' == $settings['show_subtitle'] && !empty($_single['content_subtitle']) ): ?>
                                        <h6 class="small-title"><?php echo esc_html( $_single['content_subtitle'] ); ?></h6>
                                    <?php endif; ?>

                                    <?php if( $settings['show_title'] == 'yes' && !empty($_single['content_title']) ): ?>
                                        <h3 class="title"><?php echo oscar_kses($_single['content_title']); ?></h3>
                                    <?php endif; ?>




<?php if( 
    $settings['content_layout_style'] == 'travel_destinations' && 
    $settings['show_title2'] == 'yes' 
    && !empty($_single['content_title2']) 
): ?>
<h4 class="title2"><?php echo oscar_kses($_single['content_title2']); ?></h4>
<?php endif; ?>





                                    <?php if( 'yes' == $settings['show_description'] && !empty($_single['content_description']) ): ?>
                                        <?php $description = wp_trim_words( $_single['content_description'], $settings['content_size'] ); ?>
                                        <div class="description"><?php echo esc_html( $description ); ?></div>
                                    <?php endif; ?>
                                    <?php if( 'yes' == $_single['show_button_1'] || 'yes' == $_single['show_button_2'] ) : ?>

                                        <div class="oscar-btn-group">
                                            <?php if( 'yes' == $_single['show_button_1'] ) : ?>
                                                <?php
                                                    /* BUTTON 1 CONTENT */
                                                    if( 'default' == $_single['button_1_type'] ){

                                                        $button_1_attribute = array();
                                                        $button_1_attribute[] = 'class="oscar-btn"';
                                                        if ( !empty( $_single['button_1_link']['url'] ) ) {

                                                            $button_1_attribute[] = 'href="' . $_single['button_1_link']['url'] . '"';
                                                            if ( $_single['button_1_link']['is_external'] ) {
                                                                $button_1_attribute[] = 'target="_blank"';
                                                            }
                                                            if ( $_single['button_1_link']['nofollow'] ) {
                                                                $button_1_attribute[] = 'rel="nofollow"';
                                                            }
                                                        }

                                                        if ( !empty( $_single['button_1_title'] ) && !empty( $_single['button_1_link'] ) ) {
                                                            $button = '<a ' . implode( ' ', $button_1_attribute ) . '><div class="button__title">' . $_single['button_1_title']. '</div></a>';
                                                        } else {
                                                            $button = '';
                                                        }

                                                        if ( !empty( $_single['button_1_icon'] ) ) {

                                                            if ( 'left' == $_single['button_1_icon_align'] ) {

                                                                $button = '<a ' . implode( ' ', $button_1_attribute ) . '>
                                                                        <div class="oscar__btn_icon">' . oscar_render_icons( $_single['button_1_icon'] ) . '</div>
                                                                        <div class="button__title">' . $_single['button_1_title'] . '</div>
                                                                    </a>';

                                                            } elseif ( 'right' == $_single['button_1_icon_align'] ) {

                                                                $button = '<a ' . implode( ' ', $button_1_attribute ) . '>
                                                                        <div class="button__title">' . $_single['button_1_title'] . '</div>
                                                                        <div class="oscar__btn_icon">' . oscar_render_icons( $_single['button_1_icon'] ) . '</div>
                                                                    </a>';
                                                            }
                                                        }
                                                        $button_1_attribute = array();

                                                    }elseif( 'video' == $_single['button_1_type'] ){

                                                        $button_1_attribute = array();
                                                        $button_1_attribute[] = 'class="video__popup__button"';
                                                        $button_1_attribute[] = 'data-channel="'.$_single['button_1_get_video_from'].'"';
                                                        
                                                        $random_id_1 = preg_replace('/[^0-9]/', '', $_single['_id']. 1 );
                                                        $random_id_1 = $random_id_1 + 1;

                                                        $button_1_parse_data = array(
                                                            'random_id'    => $random_id_1,
                                                            'channel_type' => $_single['button_1_get_video_from'],
                                                        );
                                                        $button_1_attribute[] = 'data-value=' . wp_json_encode( $button_1_parse_data ) . '';
                                                        $button_1_attribute[] = 'id="video__popup__button'.$random_id_1.'"';
                                                
                                                        if ( 'youtube' == $_single['button_1_get_video_from'] ) {
                                                            if ( ! empty( $_single['button_1_youtube_video_id'] ) ) {
                                                                $button_1_attribute[] = 'data-video-id="' . $_single['button_1_youtube_video_id'] . '"';
                                                            }
                                                        }elseif ( 'vimeo' == $_single['button_1_get_video_from'] ) {
                                                            if ( ! empty( $_single['button_1_vimeo_video_id'] ) ) {
                                                                $button_1_attribute[] = 'data-video-id="' . $_single['button_1_vimeo_video_id'] . '"';
                                                            }
                                                        }
                                                
                                                        if (  !empty($_single['button_1_title'] ) || !empty($_single['button_1_youtube_video_id']) || !empty($_single['button_1_vimeo_video_id'] )  ) {
                                                            $button = '<div '.implode( ' ', $button_1_attribute ).'><div class="button__text">'. $_single['button_1_title'] .'</div></div>';
                                                        }else{
                                                            $button = '';
                                                        }                                            
                                                
                                                        if ( !empty( $_single['button_1_icon'] ) ) {
                                            
                                                            if (  'left' == $_single['button_1_icon_align'] ) {
                                            
                                                                $button = '<div '.implode( ' ', $button_1_attribute ).'>
                                                                    <div class="button__icon video__button_icon_left">'.oscar_render_icons( $_single['button_1_icon'] ).'</div>
                                                                    <div class="button__text">'. $_single['button_1_title'] .'</div>
                                                                </div>';
                                            
                                                            }elseif( 'right' == $_single['button_1_icon_align'] ){
                                            
                                                                $button = '<div '.implode( ' ', $button_1_attribute ).'>
                                                                    <div class="button__text">'. $_single['button_1_title'] .'</div>
                                                                    <div class="button__icon video__button_icon_right">'.oscar_render_icons( $_single['button_1_icon'] ).'</div>
                                                                </div>';
                                                            }
                                                        }
                                                        $button_1_attribute = array();

                                                    }else{
                                                        $button = '';
                                                    }
                                                    echo''.( isset( $button ) ? $button : '' ).'';
                                                ?>                                            
                                            <?php endif; ?>
                                            <?php if( 'yes' == $_single['show_button_2'] ) : ?>
                                                <?php
                                                    /* BUTTON 1 CONTENT */
                                                    if( 'default' == $_single['button_2_type'] ){
                                                        $button_2_attribute = array();
                                                        $button_2_attribute[] = 'class="oscar-btn welcome_slide_button_2"';
                                                        if ( !empty( $_single['button_2_link']['url'] ) ) {

                                                            $button_2_attribute[] = 'href="' . $_single['button_2_link']['url'] . '"';
                                                            if ( $_single['button_2_link']['is_external'] ) {
                                                                $button_2_attribute[] = 'target="_blank"';
                                                            }
                                                            if ( $_single['button_2_link']['nofollow'] ) {
                                                                $button_2_attribute[] = 'rel="nofollow"';
                                                            }
                                                        }

                                                        if ( !empty( $_single['button_2_title'] ) && !empty( $_single['button_2_link'] ) ) {
                                                            $button_2 = '<a ' . implode( ' ', $button_2_attribute ) . '><div class="button__title">' . $_single['button_2_title']. '</div></a>';
                                                        } else {
                                                            $button_2 = '';
                                                        }

                                                        if ( !empty( $_single['button_2_icon'] ) ) {

                                                            if ( 'left' == $_single['button_2_icon_align'] ) {

                                                                $button_2 = '<a ' . implode( ' ', $button_2_attribute ) . '>
                                                                        <div class="oscar__btn_icon">' . oscar_render_icons( $_single['button_2_icon'] ) . '</div>
                                                                        <div class="button__title">' . $_single['button_2_title'] . '</div>
                                                                    </a>';

                                                            } elseif ( 'right' == $_single['button_2_icon_align'] ) {

                                                                $button_2 = '<a ' . implode( ' ', $button_2_attribute ) . '>
                                                                        <div class="button__title">' . $_single['button_2_title'] . '</div>
                                                                        <div class="oscar__btn_icon">' . oscar_render_icons( $_single['button_2_icon'] ) . '</div>
                                                                    </a>';
                                                            }
                                                        }
                                                        $button_2_attribute = array();

                                                    }elseif( 'video' == $_single['button_2_type'] ){


                                                        $button_2_attribute = array();
                                                        $button_2_attribute[] = 'class="video__popup__button"';
                                                        $button_2_attribute[] = 'data-channel="'.$_single['button_2_get_video_from'].'"';
                                                        
                                                        $random_id_2 = preg_replace('/[^0-9]/', '', $_single['_id'] );
                                                        $random_id_2 = $random_id_2 + 2;

                                                        $button_2_parse_data = array(
                                                            'random_id'    => $random_id_2,
                                                            'channel_type' => $_single['button_2_get_video_from'],
                                                        );
                                                        $button_2_attribute[] = 'data-value=' . wp_json_encode( $button_2_parse_data ) . '';
                                                        $button_2_attribute[] = 'id="video__popup__button'.$random_id_2.'"';
                                                
                                                        if ( 'youtube' == $_single['button_2_get_video_from'] ) {
                                                            if ( ! empty( $_single['button_2_youtube_video_id'] ) ) {
                                                                $button_2_attribute[] = 'data-video-id="' . $_single['button_2_youtube_video_id'] . '"';
                                                            }
                                                        }elseif ( 'vimeo' == $_single['button_2_get_video_from'] ) {
                                                            if ( ! empty( $_single['button_2_vimeo_video_id'] ) ) {
                                                                $button_2_attribute[] = 'data-video-id="' . $_single['button_2_vimeo_video_id'] . '"';
                                                            }
                                                        }
                                                
                                                        if (  !empty($_single['button_2_title'] ) || !empty($_single['button_2_youtube_video_id']) || !empty($_single['button_2_vimeo_video_id'] )  ) {
                                                            $button_2 = '<div '.implode( ' ', $button_2_attribute ).'><div class="button__text">'. $_single['button_2_title'] .'</div></div>';
                                                        }else{
                                                            $button_2 = '';
                                                        }                                            
                                                
                                                        if ( !empty( $_single['button_2_icon'] ) ) {
                                            
                                                            if (  'left' == $_single['button_2_icon_align'] ) {
                                            
                                                                $button_2 = '<div '.implode( ' ', $button_2_attribute ).'>
                                                                    <div class="button__icon video__button_icon_left">'.oscar_render_icons( $_single['button_2_icon'] ).'</div>
                                                                    <div class="button__text">'. $_single['button_2_title'] .'</div>
                                                                </div>';
                                            
                                                            }elseif( 'right' == $_single['button_2_icon_align'] ){
                                            
                                                                $button_2 = '<div '.implode( ' ', $button_2_attribute ).'>
                                                                    <div class="button__text">'. $_single['button_2_title'] .'</div>
                                                                    <div class="button__icon video__button_icon_right">'.oscar_render_icons( $_single['button_2_icon'] ).'</div>
                                                                </div>';
                                                            }
                                                        }
                                                        $button_2_attribute = array();

                                                    }else{
                                                        $button_2 = '';
                                                    }
                                                    echo''.( isset( $button_2 ) ? $button_2 : '' ).'';

                                                ?>
                                            <?php endif; ?>
                                            
                                        </div>

                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    <!-- </div> -->

                    <?php endif; ?>

                    </div>

                <?php endforeach; ?>
            </div>

            <?php if( ( $settings['slarrows'] == 'yes' || $settings['sldots'] == 'yes' ) && 'yes' == $settings['slider_on'] ) : ?>
                <!-- CUSTOM SLIDER CONTROL -->
                <div <?php echo $this->get_render_attribute_string('oscar-nav'); ?>>
                <?php if( $settings['slarrows'] == 'yes' ) : ?>
                    <div class="oscar-carousel-nav<?php echo esc_attr( $slideid ); ?> oscar-nav <?php echo esc_html( $settings['arrows_styles'] ); ?>"></div>
                <?php endif; ?>
                <?php if( $settings['sldots'] == 'yes' ) : ?>
                    <div class="oscar-carousel-dots<?php echo esc_attr( $slideid ); ?> oscar-dots"></div>
                <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Bilalmghl_Welcome_Slides_Widget() );