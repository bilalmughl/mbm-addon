<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class bilalmghl_Pricing_Table extends Widget_Base {

    public function get_name() {
        return 'bilalmghl_Pricing_Table';
    }
    
    public function get_title() {
        return __( 'Ul Price Table', 'bilalmghl' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }
    
    public function get_categories() {
        return [ 'bilalmghl-addons' ];
    }

    public function get_keywords() {
        return [ 'Price Table', 'Price', 'Price List', 'Price Box' ];
    }

    public function content_layout_style() {
        return apply_filters( 'bilalmghl_price_table_style_presets', [
            '1'  => esc_html__( 'Style One', 'bilalmghl' ),
            '2'  => esc_html__( 'Style Two', 'bilalmghl' ),
        ]);
    }

    protected function _register_controls() {

        /*---------------------------
            PRICE LAYOUT
        -----------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_layout',
            [
                'label' => esc_html__( 'Layout', 'bilalmghl' ),
            ]
        );
            $this->add_control(
                'content_layout_style',
                [
                    'label'   => esc_html__( 'Style', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => $this->content_layout_style(),
                ]
            );
            $this->add_control(
                'bilalmghl_show_features_icon',
                [
                    'label'        => esc_html__( 'Show Features Icon', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'bilalmghl_active_price',
                [
                    'label'        => esc_html__( 'Active Price Plan', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'no',
                    'separator'    => 'before',
                ]
            );
        $this->end_controls_section();
        /*----------------------------
            LAYOUT TAB END
        -----------------------------*/

        /*----------------------------
            PRICE RIBBON
        -----------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_ribbon',
            [
                'label' => esc_html__( 'Ribbon', 'bilalmghl' ),
            ]
        );
            $this->add_control(
                'bilalmghl_ribon_pricing_table',
                [
                    'label'        => esc_html__( 'Ribon', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );
            $this->add_control(
                'ribon_type',
                [
                    'label'   => esc_html__('Ribon Type','bilalmghl'),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'text' =>[
                            'title' => esc_html__('Text','bilalmghl'),
                            'icon'  => 'fa fa-font',
                        ],
                        'img' =>[
                            'title' => esc_html__('Image','bilalmghl'),
                            'icon'  => 'fa fa-picture-o',
                        ],
                        'font' =>[
                            'title' => esc_html__('Font Icon','bilalmghl'),
                            'icon'  => 'fa fa-info',
                        ],
                    ],
                    'default'   => 'text',
                    'condition' => [
                        'bilalmghl_ribon_pricing_table' => 'yes'
                    ]
                ]
            );
            $this->add_control(
                'ribon_font_icon',
                [
                    'label'   => esc_html__( 'Font Icons', 'bilalmghl' ),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
                    'condition' => [
                        'ribon_type'                   => 'font',
                        'bilalmghl_ribon_pricing_table' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'ribon_image_icon',
                [
                    'label'   => esc_html__( 'Image Icon / Image', 'bilalmghl' ),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'ribon_type'                   => 'img',
                        'bilalmghl_ribon_pricing_table' => 'yes',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Image_Size:: get_type(),
                [
                    'name'      => 'ribon_image_size',
                    'default'   => 'thumbnail',
                    'condition' => [
                        'ribon_type'                   => 'img',
                        'bilalmghl_ribon_pricing_table' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'ribon_text_icon',
                [
                    'label'     => esc_html__( 'Ribon Text', 'bilalmghl' ),
                    'type'      => Controls_Manager::TEXT,
                    'condition' => [
                        'ribon_type'                   => 'text',
                        'bilalmghl_ribon_pricing_table' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'bilalmghl_ribon_position',
                [
                    'label'   => esc_html__('Ribon Position','bilalmghl'),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' =>[
                            'title' => esc_html__('left','bilalmghl'),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' =>[
                            'title' => esc_html__('Center','bilalmghl'),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right' =>[
                            'title' => esc_html__('Right','bilalmghl'),
                            'icon'  => 'fa fa-align-right',
                        ]
                    ],
                    'default'   => '',
                    'condition' => [
                        'bilalmghl_ribon_pricing_table' => 'yes'
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*----------------------------
            RIBBON TAB END
        ------------------------------*/

        /*----------------------------
            HEADER FIELDS TAB START
        ------------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_header',
            [
                'label' => esc_html__( 'Header', 'bilalmghl' ),
            ]
        );
        
            $this->add_control(
                'pricing_title',
                [
                    'label'       => esc_html__( 'Title', 'bilalmghl' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'Standard', 'bilalmghl' ),
                    'default'     => esc_html__( 'Standard', 'bilalmghl' ),
                    'title'       => esc_html__( 'Enter your service title', 'bilalmghl' ),
                ]
            );
            $this->add_control(
                'subtitle',
                [
                    'label'       => esc_html__( 'Subtitle', 'bilalmghl' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'Subtitle', 'bilalmghl' ),
                    'separator'   => 'before',
                ]
            );
            $this->add_control(
                'subtitle_position',
                [
                    'label'   => esc_html__( 'Subtitle Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'after_title',
                    'options' => [
                        'before_title' => esc_html__( 'Before title', 'bilalmghl' ),
                        'after_title'  => esc_html__( 'After Title', 'bilalmghl' ),
                    ],
                    'condition' => [
                        'subtitle!' => '',
                    ]
                ]
            );

            $this->add_control(
                'bilalmghl_header_icon_type',
                [
                    'label'   => esc_html__('Image or Icon','bilalmghl'),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'img' =>[
                            'title' => esc_html__('Image','bilalmghl'),
                            'icon'  => 'fa fa-picture-o',
                        ],
                        'icon' =>[
                            'title' => esc_html__('Icon','bilalmghl'),
                            'icon'  => 'fa fa-info',
                        ]
                    ],
                    'default'   => 'img',
                    'condition' => [
                        'content_layout_style' => ['2','13'],
                    ]
                ]
            );

            $this->add_control(
                'headerimage',
                [
                    'label'   => esc_html__('Image','bilalmghl'),
                    'type'    => Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    
                    'condition' => [
                        'content_layout_style'      => ['2','13'],
                        'bilalmghl_header_icon_type' => 'img',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size:: get_type(),
                [
                    'name'      => 'headerimagesize',
                    'default'   => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'content_layout_style'      => ['2','13'],
                        'bilalmghl_header_icon_type' => 'img',
                    ]
                ]
            );

            $this->add_control(
                'headericon',
                [
                    'label'   => esc_html__('Icon','bilalmghl'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
						'value'   => 'fas fa-star',
						'library' => 'solid',
					],
                    'condition' => [
                        'content_layout_style'      => ['2','13'],
                        'bilalmghl_header_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section();
        /*---------------------------
            HEADER FIELDS TAB END
        ------------------------------*/

        /*----------------------------
           PRICING FIELDS TAB START
        ------------------------------*/

        $this->start_controls_section(
            'bilalmghl_pricing_price',
            [
                'label' => esc_html__( 'Pricing', 'bilalmghl' ),
            ]
        );
            
            $this->add_control(
                'bilalmghl_custom_product_id',
                [
                    'label' => esc_html__( 'Custom Product id (optional)', 'bilalmghl' ),
                    'type'  => Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'bilalmghl_price',
                [
                    'label'    => esc_html__( 'Price', 'bilalmghl' ),
                    'type'     => Controls_Manager::TEXT,
                    'default'  => '35.50',
                    'separtor' => 'before',
                ]
            );

            $this->add_control(
                'bilalmghl_offer_price',
                [
                    'label'        => esc_html__( 'Offer', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );

            $this->add_control(
                'bilalmghl_original_price',
                [
                    'label'     => esc_html__( 'Original Price', 'bilalmghl' ),
                    'type'      => Controls_Manager::NUMBER,
                    'default'   => '49',
                    'condition' => [
                        'bilalmghl_offer_price' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_currency_symbol',
                [
                    'label'   => esc_html__( 'Currency Symbol', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        ''             => esc_html__( 'None', 'bilalmghl' ),
                        'dollar'       => '&#36; ' . esc_html__( 'Dollar', 'bilalmghl' ),
                        'euro'         => '&#128; ' . esc_html__( 'Euro', 'bilalmghl' ),
                        'baht'         => '&#3647; ' . esc_html__( 'Baht', 'bilalmghl' ),
                        'franc'        => '&#8355; ' . esc_html__( 'Franc', 'bilalmghl' ),
                        'guilder'      => '&fnof; ' . esc_html__( 'Guilder', 'bilalmghl' ),
                        'krona'        => 'kr ' . esc_html__( 'Krona', 'bilalmghl' ),
                        'lira'         => '&#8356; ' . esc_html__( 'Lira', 'bilalmghl' ),
                        'peseta'       => '&#8359 ' . esc_html__( 'Peseta', 'bilalmghl' ),
                        'peso'         => '&#8369; ' . esc_html__( 'Peso', 'bilalmghl' ),
                        'pound'        => '&#163; ' . esc_html__( 'Pound Sterling', 'bilalmghl' ),
                        'real'         => 'R$ ' . esc_html__( 'Real', 'bilalmghl' ),
                        'ruble'        => '&#8381; ' . esc_html__( 'Ruble', 'bilalmghl' ),
                        'rupee'        => '&#8360; ' . esc_html__( 'Rupee', 'bilalmghl' ),
                        'indian_rupee' => '&#8377; ' . esc_html__( 'Rupee (Indian)', 'bilalmghl' ),
                        'shekel'       => '&#8362; ' . esc_html__( 'Shekel', 'bilalmghl' ),
                        'yen'          => '&#165; ' . esc_html__( 'Yen/Yuan', 'bilalmghl' ),
                        'won'          => '&#8361; ' . esc_html__( 'Won', 'bilalmghl' ),
                        'custom'       => esc_html__( 'Custom', 'bilalmghl' ),
                    ],
                    'default' => 'dollar',
                ]
            );

            $this->add_control(
                'bilalmghl_currency_position',
                [
                    'label'   => esc_html__( 'Currency Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'left'  => esc_html__( 'Left', 'bilalmghl' ),
                        'right' => esc_html__( 'Right', 'bilalmghl' ),
                    ],
                    'default' => 'left',
                ]
            );

            $this->add_control(
                'bilalmghl_currency_symbol_custom',
                [
                    'label'     => esc_html__( 'Custom Symbol', 'bilalmghl' ),
                    'type'      => Controls_Manager::TEXT,
                    'condition' => [
                        'bilalmghl_currency_symbol' => 'custom',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_period',
                [
                    'label'   => esc_html__( 'Period', 'bilalmghl' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( '/Monthly', 'bilalmghl' ),
                ]
            );

        $this->end_controls_section();
        /*----------------------------
           PRICING FIELDS TAB END
        ------------------------------*/
        
        /*---------------------------
            PRICE DESCRIPTION
        -----------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_desc',
            [
                'label' => esc_html__( 'Description', 'bilalmghl' ),
            ]
        );
            $this->add_control(
                'pricing_desc',
                [
                    'label' => esc_html__( 'Price Description', 'bilalmghl' ),
                    'type'  => Controls_Manager::WYSIWYG,
                ]
            );
        $this->end_controls_section();
        /*----------------------------
            DESCRIPTION TAB END
        -----------------------------*/

        /*----------------------------
           FEATURES TAB START
        ------------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_features',
            [
                'label' => esc_html__( 'Features', 'bilalmghl' ),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'bilalmghl_features_title',
                [
                    'label'       => esc_html__( 'Title', 'bilalmghl' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__( 'Features Tilte', 'bilalmghl' ),
                    'description' => sprintf( esc_html__( 'If you want to bold content just use %s in before and use %s after the word. and if you want to border use %s before the word use %s after the word. and if you want content right use %s before the word and use %s after the word.', 'bilalmghl' ),'<mark>[</mark>','<mark>]</mark>','<mark>{</mark>','<mark>}</mark>','<mark>(RIGHT)</mark>','<mark>(/RIGHTEND)</mark>' ),
                ]
            );

            $repeater->add_control(
                'bilalmghl_old_features',
                [
                    'label'        => esc_html__( 'Old Features', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );

            $repeater->add_control(
                'features_icon_type',
                [
                    'label'   => esc_html__('Add Features Icon','bilalmghl'),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'img' =>[
                            'title' => esc_html__('Image Icon','bilalmghl'),
                            'icon'  => 'fa fa-picture-o',
                        ],
                        'font' =>[
                            'title' => esc_html__('SVG / Font Icon','bilalmghl'),
                            'icon'  => 'fa fa-info',
                        ],
                    ],
                    'default' => 'font',
                ]
            );

            $repeater->add_control(
                'bilalmghl_features_icon',
                [
                    'label'       => esc_html__( 'SVG / Font Icon', 'bilalmghl' ),
                    'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
                    'default'     => [
                        'value'   => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition'   => [
                        'features_icon_type' => 'font',
                    ],
                ]
            );
            $repeater->add_control(
                'features_image_icon',
                [
                    'label'   => esc_html__( 'Image Icon / SVG', 'bilalmghl' ),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'features_icon_type' => 'img',
                    ],
                ]
            );

            $repeater->add_control(
                'bilalmghl_features_icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'bilalmghl_features_icon!' => '',
                    ]
                ]
            );

            $this->add_control(
                'bilalmghl_features_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'bilalmghl_features_title' => esc_html__( 'Features Title One', 'bilalmghl' ),
                            'bilalmghl_features_icon'  => 'fa fa-angle-double-right',
                        ],

                        [
                            'bilalmghl_features_title' => esc_html__( 'Features Title Two', 'bilalmghl' ),
                            'bilalmghl_features_icon'  => 'fa fa-angle-double-right',
                        ],

                        [
                            'bilalmghl_features_title' => esc_html__( 'Features Title Three', 'bilalmghl' ),
                            'bilalmghl_features_icon'  => 'fa fa-angle-double-right',
                        ],
                    ],
                    'title_field' => '{{{ bilalmghl_features_title }}}',
                ]
            );

        $this->end_controls_section();
        /*----------------------------
           FEATURES FIELDS TAB END
        ------------------------------*/

        /*----------------------------
            FOOTER TAB START
        ------------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_footer',
            [
                'label' => esc_html__( 'Footer', 'bilalmghl' ),
            ]
        );

            $this->add_control(
                'bilalmghl_price_button',
                [
                    'label'        => esc_html__( 'Show Price Button', 'bilalmghl' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'default'      => 'yes',
                    'return_value' => 'yes',
                ]
            );
            
            $this->add_control(
                'bilalmghl_button_text',
                [
                    'label'     => esc_html__( 'Button Text', 'bilalmghl' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__( 'Purchase Now', 'bilalmghl' ),
                    'condition' => [
                        'bilalmghl_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_button_link',
                [
                    'label'       => esc_html__( 'Link', 'bilalmghl' ),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => 'http://your-link.com',
                    'default'     => [
                        'url' => '#',
                    ],
                    'condition'=> [
                        'bilalmghl_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_button_icon',
                [
                    'label'       => esc_html__( 'Button Icon', 'bilalmghl' ),
                    'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
                    'condition'   => [
                        'bilalmghl_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_button_icon_alignment',
                [
                    'label'   => esc_html__( 'Icon Position', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'left',
                    'options' => [
                        'left'  => esc_html__( 'Before', 'bilalmghl' ),
                        'right' => esc_html__( 'After', 'bilalmghl' ),
                    ],
                    'condition' => [
                        'bilalmghl_button_icon!' => '',
                        'bilalmghl_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'bilalmghl_button_icon_indent',
                [
                    'label' => esc_html__( 'Icon Spacing', 'bilalmghl' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max' => 60,
                        ],
                    ],
                    'condition' => [
                        'bilalmghl_button_icon!' => '',
                        'bilalmghl_price_button' => 'yes',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .price_btn i.price_btn_icon_left'  => 'margin-right: {{SIZE}}px;',
                        '{{WRAPPER}} .price_btn i.price_btn_icon_right' => 'margin-left: {{SIZE}}px;',
                    ],
                ]
            );

        $this->end_controls_section();
        /*------------------------------
            FOOTER FIELDS TAB END
        -------------------------------*/

        /*-------------------------------
            HEADER STYLE TAB START
        --------------------------------*/
        $this->start_controls_section(
            'bilalmghl_header_style',
            [
                'label' => esc_html__( 'Header', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'pricing_header_area_style',
                [
                    'label' => esc_html__( 'Header Area', 'bilalmghl' ),
                    'type'  => Controls_Manager::HEADING,
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'pricing_header_border',
                    'label'    => esc_html__( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__price__header',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_header_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'pricing_header_hover_heading_title',
                [
                    'label'     => esc_html__( 'Header Area Hover Background', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'      => 'pricing_header_hover_background',
                    'label'     => esc_html__( 'Background', 'bilalmghl' ),
                    'types'     => [ 'classic', 'gradient' ],
                    'separator' => 'before',
                    'selector'  => '{{WRAPPER}} .single__price:hover .single__price__header',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'pricing_header_hover_border',
                    'label'    => esc_html__( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__price:hover .single__price__header',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_hover_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .single__price__header' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_control(
                'pricing_header_heading_title',
                [
                    'label'     => esc_html__( 'Title', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_title_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__title h3' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_header_title_hover_color',
                [
                    'label'     => esc_html__( 'Hover Title Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .price__title h3' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_title_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .price__title h3',
                    
                ]
            );

            $this->add_responsive_control(
                'pricing_header_title_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__title h3' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_control(
                'pricing_header_subheading_title',
                [
                    'label'     => esc_html__( 'Subtitle', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_subtitle_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__subtitle' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_header_subtitle_hover_color',
                [
                    'label'     => esc_html__( 'Hover Title Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .price__subtitle' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_subtitle_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .price__subtitle',
                    
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_subtitle_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header .price__subtitle',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_subtitle_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__subtitle' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_header_subtitle_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__subtitle' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_header_subtitle_padding',
                [
                    'label'     => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__subtitle' => 'padding: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_control(
                'pricing_header_heading_price',
                [
                    'label'     => esc_html__( 'Price', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_price_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .new__price'    => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .new__price' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_control(
                'pricing_header_price_hover_color',
                [
                    'label'     => esc_html__( 'Price Hover Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .new__price'            => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .new__price:hover' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_price_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .new__price,{{WRAPPER}} .single__price__style__11 .new__price',
                    
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_price_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header .new__price,{{WRAPPER}} .single__price__style__11 .new__price,',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'pricing_header_price_border',
                    'label'    => esc_html__( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__price__header .new__price,{{WRAPPER}} .single__price__style__11 .new__price,',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_price_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .new__price'    => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .single__price__style__11 .new__price' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_header_price_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__rate h3'    => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .single__price__style__11 .price__rate h3' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            /*-------------------------
                OFFER PRICE
            --------------------------*/
            $this->add_control(
                'pricing_offer_heading_price',
                [
                    'label'     => esc_html__( 'Offer Price', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_offer_price_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .old__price'    => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .old__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_header_offer_price_hover_color',
                [
                    'label'     => esc_html__( 'Hover Offer Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .old__price'            => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .old__price:hover' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_offer_price_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .old__price,{{WRAPPER}} .single__price__style__11 .old__price',
                    
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_offer_price_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header .old__price,{{WRAPPER}} .single__price__style__11 .old__price',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'pricing_header_offer_price_border',
                    'label'    => esc_html__( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__price__header .old__price,{{WRAPPER}} .single__price__style__11 .old__price',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_offer_price_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .old__price'    => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .single__price__style__11 .old__price' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            /*---------------------------
                PRICE CURRENCY
            ----------------------------*/
            $this->add_control(
                'pricing_currency_heading_title',
                [
                    'label'     => esc_html__( 'Currency', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_currency_title_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__currency'    => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .price__currency' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_currency_title_hover_color',
                [
                    'label'     => esc_html__( 'Hover Currency Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .price__currency'            => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .price__currency:hover' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_currency_title_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .price__currency,{{WRAPPER}} .single__price__style__11 .price__currency',
                    
                ]
            );

            $this->add_responsive_control(
                'pricing_currency_title_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__currency'    => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .single__price__style__11 .price__currency' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            /*---------------------------
                PERIOD STYLE
            ----------------------------*/
            $this->add_control(
                'pricing_period_heading_title',
                [
                    'label'     => esc_html__( 'Period', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_period_title_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .period__price'    => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .period__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_period_title_hover_color',
                [
                    'label'     => esc_html__( 'Hover Preiord Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .period__price'            => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single__price__style__11 .period__price:hover' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_period_title_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .period__price,{{WRAPPER}} .single__price__style__11 .period__price',
                    
                ]
            );

            $this->add_responsive_control(
                'pricing_period__display',
                [
                    'label'   => esc_html__( 'Display', 'bilalmghl' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'initial',
                    'options' => [
                        'initial'      => esc_html__( 'Initial', 'bilalmghl' ),
                        'block'        => esc_html__( 'Block', 'bilalmghl' ),
                        'inline-block' => esc_html__( 'Inline Block', 'bilalmghl' ),
                        'flex'         => esc_html__( 'Flex', 'bilalmghl' ),
                        'inline-flex'  => esc_html__( 'Inline Flex', 'bilalmghl' ),
                        'none'         => esc_html__( 'none', 'bilalmghl' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .period__price'    => 'display: {{VALUE}};',
                        '{{WRAPPER}} .single__price__style__11 .period__price' => 'display: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_period_title_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .period__price'    => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .single__price__style__11 .period__price' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

        $this->end_controls_section();
        /*---------------------------
            HEADER STYLE TAB END
        -----------------------------*/

        /*-------------------------------
            HEADER RIBON START
        --------------------------------*/
        $this->start_controls_section(
            'ribon_style_section',
            [
                'label'     => esc_html__( 'Ribon Style', 'bilalmghl' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'bilalmghl_ribon_pricing_table' => 'yes'
                ],
            ]
        );
            $this->start_controls_tabs(
                'ribon_style_tabs'
            );
                $this->start_controls_tab(
                    'ribon_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'bilalmghl' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'      => 'ribon_typography',
                            'selector'  => '{{WRAPPER}} .single__price__ribon',
                            'condition' => [
                                'ribon_type' => ['font','text']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_image_width',
                        [
                            'label'      => esc_html__( 'Image Width', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price__ribon img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'ribon_type' => ['img']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_image_height',
                        [
                            'label'      => esc_html__( 'Image Height', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price__ribon img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'ribon_type' => ['img']
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Css_Filter:: get_type(),
                        [
                            'name'      => 'ribon_image_filters',
                            'label'     => esc_html__( 'Image Filter', 'bilalmghl' ),
                            'selector'  => '{{WRAPPER}} .single__price__ribon img',
                            'condition' => [
                                'ribon_type' => ['img']
                            ],
                        ]
                    );
                    $this->add_control(
                        'ribon_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} .single__price__ribon' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'ribon_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price__ribon',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'      => 'ribon_border',
                            'label'     => esc_html__( 'Border', 'bilalmghl' ),
                            'selector'  => '{{WRAPPER}} .single__price__ribon',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'ribon_radius',
                        [
                            'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__ribon, {{WRAPPER}} .single__price__ribon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'ribon_shadow',
                            'selector' => '{{WRAPPER}} .single__price__ribon',
                        ]
                    );
                    $this->add_control(
                        'ribon_width',
                        [
                            'label'      => esc_html__( 'Width', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price__ribon' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'ribon_height',
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
                                '{{WRAPPER}} .single__price__ribon' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'ribon_display',
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
                                '{{WRAPPER}} .single__price__ribon' => 'display: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'ribon_align',
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
                                '{{WRAPPER}} .single__price__ribon' => 'text-align: {{VALUE}};',
                            ],
                            'default' => '',
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_position',
                        [
                            'label'   => esc_html__( 'Position', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'options' => [
                                'inherit'  => esc_html__( 'Inherit', 'bilalmghl' ),
                                'initial'  => esc_html__( 'Initial', 'bilalmghl' ),
                                'absolute' => esc_html__( 'Absulute', 'bilalmghl' ),
                                'relative' => esc_html__( 'Relative', 'bilalmghl' ),
                                'static'   => esc_html__( 'Static', 'bilalmghl' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price__ribon' => 'position: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_position_from_left',
                        [
                            'label'      => esc_html__( 'From Left Offset', 'bilalmghl' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', 'vw','%' ],
                            'range'      => [
                                'px' => [
                                    'min'  => -2000,
                                    'max'  => 2000,
                                    'step' => 1,
                                ],
                                'vw' => [
                                    'min'  => -100,
                                    'max'  => 100,
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
                                '{{WRAPPER}} .single__price__ribon' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                            'condition' => [
                                'ribon_position!' => ['inherit','initial','static']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_position_from_right',
                        [
                            'label'      => esc_html__( 'From Right Offset', 'bilalmghl' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', 'vw','%' ],
                            'range'      => [
                                'px' => [
                                    'min'  => -2000,
                                    'max'  => 2000,
                                    'step' => 1,
                                ],
                                'vw' => [
                                    'min'  => -100,
                                    'max'  => 100,
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
                                '{{WRAPPER}} .single__price__ribon' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'ribon_position!' => ['inherit','initial','static']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_position_from_top',
                        [
                            'label'      => esc_html__( 'From Top Offset', 'bilalmghl' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', 'vw','%' ],
                            'range'      => [
                                'px' => [
                                    'min'  => -2000,
                                    'max'  => 2000,
                                    'step' => 1,
                                ],
                                'vw' => [
                                    'min'  => -100,
                                    'max'  => 100,
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
                                '{{WRAPPER}} .single__price__ribon' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'ribon_position!' => ['inherit','initial','static']
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_position_from_bottom',
                        [
                            'label'      => esc_html__( 'From Bottom Offset', 'bilalmghl' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', 'vw','%' ],
                            'range'      => [
                                'px' => [
                                    'min'  => -2000,
                                    'max'  => 2000,
                                    'step' => 1,
                                ],
                                'vw' => [
                                    'min'  => -100,
                                    'max'  => 100,
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
                                '{{WRAPPER}} .single__price__ribon' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'ribon_position!' => ['inherit','initial','static']
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'ribon_zindex',
                        [
                            'label'     => esc_html__( 'Z-Index', 'bilalmghl' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => -99,
                            'max'       => 99,
                            'step'      => 1,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__ribon' => 'z-index: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_opacity',
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
                                '{{WRAPPER}} .single__price__ribon' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__ribon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'ribon_padding',
                        [
                            'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__ribon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'ribon_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'bilalmghl' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'      => 'hover_ribon_typography',
                            'selector'  => '{{WRAPPER}} .single__price:hover .single__price__ribon',
                            'condition' => [
                                'ribon_type' => ['font','text']
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Css_Filter:: get_type(),
                        [
                            'name'      => 'hover_ribon_image_filters',
                            'label'     => esc_html__( 'Image Filter', 'bilalmghl' ),
                            'selector'  => '{{WRAPPER}} .single__price:hover .single__price__ribon img',
                            'condition' => [
                                'ribon_type' => ['img']
                            ],
                        ]
                    );
                    $this->add_control(
                        'hover_ribon_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} .single__price:hover .single__price__ribon' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_ribon_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:hover .single__price__ribon',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'      => 'hover_ribon_border',
                            'label'     => esc_html__( 'Border', 'bilalmghl' ),
                            'selector'  => '{{WRAPPER}} .single__price:hover .single__price__ribon',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'hover_ribon_radius',
                        [
                            'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:hover .single__price__ribon, {{WRAPPER}} .single__price:hover .single__price__ribon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'hover_ribon_shadow',
                            'selector' => '{{WRAPPER}} .single__price:hover .single__price__ribon',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_ribon_zindex',
                        [
                            'label'     => esc_html__( 'Z-Index', 'bilalmghl' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => -99,
                            'max'       => 99,
                            'step'      => 1,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:hover .single__price__ribon' => 'z-index: {{SIZE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_ribon_opacity',
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
                                '{{WRAPPER}} .single__price:hover .single__price__ribon' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*-------------------------------
            HEADER RIBON END
        --------------------------------*/

        /*---------------------------
            FEATURES STYLE TAB START
        -----------------------------*/
        $this->start_controls_section(
            'bilalmghl_features_style',
            [
                'label' => esc_html__( 'Features', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

          
            $this->add_responsive_control(
                'main_section_bilalmghl_yu_custom_css',
                [
                    'label'     => esc_html__( 'Custom CSS', 'bilalmghl' ),
                    'type'      => Controls_Manager::CODE,
                    'rows'      => 20,
                    'language'  => 'css',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__body' => '{{VALUE}};',
                    
                    ],
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'pricing_features_area_heading_title',
                [
                    'label' => esc_html__( 'Features Area', 'bilalmghl' ),
                    'type'  => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'      => 'pricing_features_area_background',
                    'label'     => esc_html__( 'Background', 'bilalmghl' ),
                    'types'     => [ 'classic', 'gradient' ],
                    'selector'  => '{{WRAPPER}} .single__price__body',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'eler_feature_box_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__price__body',
                ]
            );

            $this->add_responsive_control(
                'pricing_features_area_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_area_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'pricing_features_area_hover_heading_title',
                [
                    'label'     => esc_html__( 'Features Area Hover Background', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'      => 'pricing_features_hover_background',
                    'label'     => esc_html__( 'Background', 'bilalmghl' ),
                    'types'     => [ 'classic', 'gradient' ],
                    'separator' => 'before',
                    'selector'  => '{{WRAPPER}} .single__price:hover .single__price__body',
                ]
            );

            $this->add_control(
                'pricing_features_heading_title',
                [
                    'label'     => esc_html__( 'Features Items', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
            'features_hr',
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_features_item_typography',
                    'selector' => '{{WRAPPER}} .single__price__body ul li',
                    
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_features_item_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__body ul li' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_item_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_item_padding',
                [
                    'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_control(
                'pricing_features_icon_title',
                [
                    'label'     => esc_html__( 'Features Icon Style', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'pricing_features_icon_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__body ul li i' => 'color: {{VALUE}}',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'pricing_features_icon_hover_color',
                [
                    'label'     => esc_html__( 'Hover Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .single__price__body ul li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_features_icon_typography',
                    'selector' => '{{WRAPPER}} .single__price__body ul li i',
                    
                ]
            );
            $this->add_responsive_control(
                'pricing_features_icon_margin',
                [
                    'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body ul li i,{{WRAPPER}} .single__price__body ul li img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        /*---------------------------
            FEATURES STYLE TAB END
        ----------------------------*/
        
        /*---------------------------
            FOOTER STYLE TAB START
        -----------------------------*/
        $this->start_controls_section(
            'bilalmghl_pricing_footer_style',
            [
                'label' => esc_html__( 'Footer', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'pricing_footer_heading_title',
                [
                    'label' => esc_html__( 'Footer Area', 'bilalmghl' ),
                    'type'  => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'      => 'pricing_footer_wrap_background',
                    'label'     => esc_html__( 'Background', 'bilalmghl' ),
                    'types'     => [ 'classic', 'gradient' ],
                    'selector'  => '{{WRAPPER}} .single__price__footer',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'footer_areabox_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .single__price__footer',
                ]
            );

            $this->add_responsive_control(
                'pricing_footer_wrap_margin',
                [
                    'label'     => esc_html__( 'Margin', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__footer' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_footer_wrap_padding',
                [
                    'label'     => esc_html__( 'Padding', 'bilalmghl' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__footer' => 'padding: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_control(
                'pricing_footer_hover_heading_title',
                [
                    'label'     => esc_html__( 'Footer Area Hover Background', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'      => 'pricing_footer_wrap_hover_background',
                    'label'     => esc_html__( 'Background', 'bilalmghl' ),
                    'types'     => [ 'classic', 'gradient' ],
                    'separator' => 'before',
                    'selector'  => '{{WRAPPER}} .single__price:hover .single__price__footer',
                ]
            );

            $this->add_control(
                'pricing_footer_button_heading_title',
                [
                    'label'     => esc_html__( 'Button', 'bilalmghl' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

                $this->start_controls_tabs( 
                    'pricing_footer_style_tabs',
                    [
                        'separator' => 'before',
                    ]
                );

                // Pricing Normal tab start
                $this->start_controls_tab(
                    'style_pricing_normal_tab',
                    [
                        'label'     => esc_html__( 'Normal', 'bilalmghl' ),
                        'separator' => 'after',
                    ]
                );

                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'pricing_footer_typography',
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
                            
                        ]
                    );

                    $this->add_control(
                        'pricing_footer_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_footer_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pricing_footer_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'pricing_footer_shadow',
							'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
						]
					);
                    $this->add_control(
                        'pricing_footer_width',
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
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'pricing_footer_height',
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
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'pricing_footer_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'pricing_footer_padding',
                        [
                            'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
                    $this->add_responsive_control(
                        'pricing_footer_padding_alignment',
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
                                    'title' => esc_html__( 'Justified', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'text-align: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                $this->end_controls_tab();
                /*------------------------
                    PRICING NORMAL TAB END
                --------------------------*/

                /*-------------------------
                    PRICING HOVER TAB START
                ---------------------------*/
                $this->start_controls_tab(
                    'style_pricing_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'bilalmghl' ),
                    ]
                );

                    $this->add_control(
                        'pricing_footer_hover_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn:hover'          => 'color: {{VALUE}}',
                                '{{WRAPPER}} .price__active .single__price__footer a.price_btn' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_footer_hover_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn:hover,{{WRAPPER}} .price__active .single__price__footer a.price_btn',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pricing_footer_hover_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn:hover,{{WRAPPER}} .price__active .single__price__footer a.price_btn',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_hover_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn:hover'          => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .price__active .single__price__footer a.price_btn' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'pricing_footer_hover_shadow',
							'selector' => '{{WRAPPER}} .single__price__footer a.price_btn:hover,{{WRAPPER}} .price__active .single__price__footer a.price_btn',
						]
					);

                $this->end_controls_tab();
                /*-----------------------
                    PRICING HOVER TAB END
                -------------------------*/

            $this->end_controls_tabs();

        $this->end_controls_section();
        /*---------------------------
            FOOTER STYLE TAB END
        ----------------------------*/

        /*---------------------------
            BOX STYLE SECTION START
        ----------------------------*/
        $this->start_controls_section(
            'pricing_style_section',
            [
                'label' => esc_html__( 'Box', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'box_style_tabs'
            );
                $this->start_controls_tab(
                    'box_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'bilalmghl' ),
                    ]
                );
                    $this->add_responsive_control(
                        'bilalmghl_price_text_align',
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
                                    'title' => esc_html__( 'Justified', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price' => 'text-align: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'pricing_table_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price' => 'color: {{VALUE}}',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'pricing_table_typography',
                            'selector' => '{{WRAPPER}} .single__price',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_table_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'      => 'pricing_table_border',
                            'label'     => esc_html__( 'Border', 'bilalmghl' ),
                            'selector'  => '{{WRAPPER}} .single__price',
                            'separator' => 'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'pricing_table_box_shadow',
                            'label'    => esc_html__( 'Box Shadow', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .single__price',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_padding',
                        [
                            'label'      => esc_html__( 'Padding', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
                $this->start_controls_tab(
                    'box_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'bilalmghl' ),
                    ]
                );
                    $this->add_control(
                        'pricing_table_hover_color',
                        [
                            'label'     => esc_html__( 'Color', 'bilalmghl' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:hover' => 'color: {{VALUE}}',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_table_hover_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:hover',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'      => 'pricing_table_hover_border',
                            'label'     => esc_html__( 'Border', 'bilalmghl' ),
                            'selector'  => '{{WRAPPER}} .single__price:hover',
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'pricing_table_hover_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'pricing_table_hover_box_shadow',
                            'label'    => esc_html__( 'Box Shadow', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .single__price:hover',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();

        $this->end_controls_section();
        /*-----------------------------
            BOX STYLE SECTION END 
        ------------------------------*/

        /*----------------------------
            BOX BEFORE / AFTER
        -----------------------------*/
        $this->start_controls_section(
            'box_before_after_style_section',
            [
                'label' => esc_html__( 'Before / After', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'before_after_tab_style' );
                $this->start_controls_tab(
                    'before_tab',
                    [
                        'label' => esc_html__( 'BEFORE', 'bilalmghl' ),
                    ]
                );

                    // Before Background
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'before_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:before',
                        ]
                    );

                    // Before Display;
                    $this->add_responsive_control(
                        'before_display',
                        [
                            'label'   => esc_html__( 'Display', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                ''      => esc_html__( 'Default', 'bilalmghl' ),
                                'initial'      => esc_html__( 'Initial', 'bilalmghl' ),
                                'block'        => esc_html__( 'Block', 'bilalmghl' ),
                                'inline-block' => esc_html__( 'Inline Block', 'bilalmghl' ),
                                'flex'         => esc_html__( 'Flex', 'bilalmghl' ),
                                'inline-flex'  => esc_html__( 'Inline Flex', 'bilalmghl' ),
                                'none'         => esc_html__( 'none', 'bilalmghl' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price:before' => 'display: {{VALUE}};',
                            ],
                        ]
                    );

                    // Before Postion
                    $this->add_responsive_control(
                        'before_position',
                        [
                            'label'   => esc_html__( 'Position', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                ''         => esc_html__( 'Default', 'bilalmghl' ),
                                'absolute' => esc_html__( 'Absulute', 'bilalmghl' ),
                                'relative' => esc_html__( 'Relative', 'bilalmghl' ),
                                'fixed'    => esc_html__( 'Fixed', 'bilalmghl' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price:before' => 'position: {{VALUE}};',
                            ],
                        ]
                    );

                    // Postion From Left
                    $this->add_responsive_control(
                        'before_position_from_left',
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
                                '{{WRAPPER}} .single__price:before' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'before_position!' => ['']
                            ],
                        ]
                    );

                    // Postion From Right
                    $this->add_responsive_control(
                        'before_position_from_right',
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
                                '{{WRAPPER}} .single__price:before' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'before_position!' => ['']
                            ],
                        ]
                    );

                    // Postion From Top
                    $this->add_responsive_control(
                        'before_position_from_top',
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
                                '{{WRAPPER}} .single__price:before' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'before_position!' => ['']
                            ],
                        ]
                    );

                    // Postion From Bottom
                    $this->add_responsive_control(
                        'before_position_from_bottom',
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
                                '{{WRAPPER}} .single__price:before' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'before_position!' => ['']
                            ],
                        ]
                    );

                    // Before Align
                    $this->add_responsive_control(
                        'before_align',
                        [
                            'label'   => esc_html__( 'Alignment', 'bilalmghl' ),
                            'type'    => Controls_Manager::CHOOSE,
                            'options' => [
                                'text-align:left' => [
                                    'title' => esc_html__( 'Left', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-left',
                                ],
                                'margin: 0 auto' => [
                                    'title' => esc_html__( 'Center', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-center',
                                ],
                                'float:right' => [
                                    'title' => esc_html__( 'Right', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-right',
                                ],
                                'text-align:justify' => [
                                    'title' => esc_html__( 'Justify', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price:before' => '{{VALUE}};',
                            ],
                            'default' => 'text-align:left',
                        ]
                    );

                    // Before Width
                    $this->add_responsive_control(
                        'before_width',
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
                                '{{WRAPPER}} .single__price:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Before Height
                    $this->add_responsive_control(
                        'before_height',
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
                                '{{WRAPPER}} .single__price:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Before Opacity
                    $this->add_control(
                        'before_opacity',
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
                                '{{WRAPPER}} .single__price:before' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'before_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .single__price:before',
                        ]
                    );
                    $this->add_control(
                        'before_radius',
                        [
                            'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'before_shadow',
                            'selector' => '{{WRAPPER}} .single__price:before',
                        ]
                    );

                    // Before Z-Index
                    $this->add_control(
                        'before_zindex',
                        [
                            'label'     => esc_html__( 'Z-Index', 'bilalmghl' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => -99,
                            'max'       => 99,
                            'step'      => 1,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:before' => 'z-index: {{SIZE}};',
                            ],
                        ]
                    );

                    // Before Margin
                    $this->add_responsive_control(
                        'before_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Transition
                    $this->add_control(
                        'before_transition',
                        [
                            'label'      => esc_html__( 'Transition', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:before' => 'transition: {{SIZE}}s;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'before_popover_toggle',
                        [
                            'label' => esc_html__( 'Transform', 'bilalmghl' ),
                            'type'  => Controls_Manager::POPOVER_TOGGLE,
                        ]
                    );

                    $this->start_popover();

                    // Scale
                    $this->add_control(
                        'before_scale',
                        [
                            'label'      => esc_html__( 'Scale', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:before' => 'transform: scale({{SIZE}}{{UNIT}});',
                            ],
                        ]
                    );

                    // Rotate
                    $this->add_control(
                        'before_rotate',
                        [
                            'label'      => esc_html__( 'Rotate', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
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
                            'label'     => esc_html__( 'Before Hover', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );

                    // Before Background
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_before_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:hover:before',
                        ]
                    );

                    // Before Width
                    $this->add_responsive_control(
                        'hover_before_width',
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
                                '{{WRAPPER}} .single__price:hover:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Before Height
                    $this->add_responsive_control(
                        'hover_before_height',
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
                                '{{WRAPPER}} .single__price:hover:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Before Opacity
                    $this->add_control(
                        'hover_before_opacity',
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
                                '{{WRAPPER}} .single__price:hover:before' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'hover_before_radius',
                        [
                            'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:hover:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'before_hover_popover_toggle',
                        [
                            'label' => esc_html__( 'Transform', 'bilalmghl' ),
                            'type'  => Controls_Manager::POPOVER_TOGGLE,
                        ]
                    );

                    $this->start_popover();
                    // Scale
                    $this->add_control(
                        'hover_before_scale',
                        [
                            'label'      => esc_html__( 'Scale', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:hover:before' => 'transform: scale({{SIZE}}{{UNIT}});',
                            ],
                        ]
                    );

                    // Rotate
                    $this->add_control(
                        'hover_before_rotate',
                        [
                            'label'      => esc_html__( 'Rotate', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:hover:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
                            ],
                        ]
                    );
                    $this->end_popover();

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'after_tab',
                    [
                        'label' => esc_html__( 'AFTER', 'bilalmghl' ),
                    ]
                );

                    // After Background
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'after_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:after',
                        ]
                    );

                    // After Display;
                    $this->add_responsive_control(
                        'after_display',
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
                                '{{WRAPPER}} .single__price:after' => 'display: {{VALUE}};',
                            ],
                        ]
                    );

                    // After Postion
                    $this->add_responsive_control(
                        'after_position',
                        [
                            'label'   => esc_html__( 'Position', 'bilalmghl' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                ''         => esc_html__( 'Default', 'bilalmghl' ),
                                'absolute' => esc_html__( 'Absulute', 'bilalmghl' ),
                                'relative' => esc_html__( 'Relative', 'bilalmghl' ),
                                'fixed'    => esc_html__( 'Fixed', 'bilalmghl' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price:after' => 'position: {{VALUE}};',
                            ],
                        ]
                    );

                    // Postion From Left
                    $this->add_responsive_control(
                        'after_position_from_left',
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
                                '{{WRAPPER}} .single__price:after' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'after_position!' => ['']
                            ],
                        ]
                    );

                    // Postion From Right
                    $this->add_responsive_control(
                        'after_position_from_right',
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
                                '{{WRAPPER}} .single__price:after' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'after_position!' => ['']
                            ],
                        ]
                    );

                    // Postion From Top
                    $this->add_responsive_control(
                        'after_position_from_top',
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
                                '{{WRAPPER}} .single__price:after' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'after_position!' => ['']
                            ],
                        ]
                    );

                    // Postion From Bottom
                    $this->add_responsive_control(
                        'after_position_from_bottom',
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
                                '{{WRAPPER}} .single__price:after' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'after_position!' => ['']
                            ],
                        ]
                    );

                    // After Align
                    $this->add_responsive_control(
                        'after_align',
                        [
                            'label'   => esc_html__( 'Alignment', 'bilalmghl' ),
                            'type'    => Controls_Manager::CHOOSE,
                            'options' => [
                                'text-align:left' => [
                                    'title' => esc_html__( 'Left', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-left',
                                ],
                                'margin: 0 auto' => [
                                    'title' => esc_html__( 'Center', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-center',
                                ],
                                'float:right' => [
                                    'title' => esc_html__( 'Right', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-right',
                                ],
                                'text-align:justify' => [
                                    'title' => esc_html__( 'Justify', 'bilalmghl' ),
                                    'icon'  => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price:after' => '{{VALUE}};',
                            ],
                            'default' => 'text-align:left',
                        ]
                    );

                    // After Width
                    $this->add_responsive_control(
                        'after_width',
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
                                '{{WRAPPER}} .single__price:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // After Height
                    $this->add_responsive_control(
                        'after_height',
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
                                '{{WRAPPER}} .single__price:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // After Opacity
                    $this->add_control(
                        'after_opacity',
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
                                '{{WRAPPER}} .single__price:after' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'after_border',
                            'label'    => esc_html__( 'Border', 'bilalmghl' ),
                            'selector' => '{{WRAPPER}} .single__price:after',
                        ]
                    );

                    $this->add_control(
                        'after_radius',
                        [
                            'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'after_shadow',
                            'selector' => '{{WRAPPER}} .single__price:after',
                        ]
                    );

                    // After Z-Index
                    $this->add_control(
                        'after_zindex',
                        [
                            'label'     => esc_html__( 'Z-Index', 'bilalmghl' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => -99,
                            'max'       => 99,
                            'step'      => 1,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:after' => 'z-index: {{SIZE}};',
                            ],
                        ]
                    );

                    // After Margin
                    $this->add_responsive_control(
                        'after_margin',
                        [
                            'label'      => esc_html__( 'Margin', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Transition
                    $this->add_control(
                        'after_transition',
                        [
                            'label'      => esc_html__( 'Transition', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:after' => 'transition: {{SIZE}}s;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'after_popover_toggle',
                        [
                            'label' => esc_html__( 'Transform', 'bilalmghl' ),
                            'type'  => Controls_Manager::POPOVER_TOGGLE,
                        ]
                    );

                    $this->start_popover();

                    // Scale
                    $this->add_control(
                        'after_scale',
                        [
                            'label'      => esc_html__( 'Scale', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:after' => 'transform: scale({{SIZE}}{{UNIT}});',
                            ],
                        ]
                    );

                    // Rotate
                    $this->add_control(
                        'after_rotate',
                        [
                            'label'      => esc_html__( 'Rotate', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
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
                            'label'     => esc_html__( 'After Hover', 'bilalmghl' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );

                    // After Background
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_after_background',
                            'label'    => esc_html__( 'Background', 'bilalmghl' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:hover:after',
                        ]
                    );

                    // after Width
                    $this->add_responsive_control(
                        'hover_after_width',
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
                                '{{WRAPPER}} .single__price:hover:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // after Height
                    $this->add_responsive_control(
                        'hover_after_height',
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
                                '{{WRAPPER}} .single__price:hover:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // after Opacity
                    $this->add_control(
                        'hover_after_opacity',
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
                                '{{WRAPPER}} .single__price:hover:after' => 'opacity: {{SIZE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'hover_after_radius',
                        [
                            'label'      => esc_html__( 'Border Radius', 'bilalmghl' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price:hover:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'after_hover_popover_toggle',
                        [
                            'label' => esc_html__( 'Transform', 'bilalmghl' ),
                            'type'  => Controls_Manager::POPOVER_TOGGLE,
                        ]
                    );

                    $this->start_popover();
                    // Scale
                    $this->add_control(
                        'hover_after_scale',
                        [
                            'label'      => esc_html__( 'Scale', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:hover:after' => 'transform: scale({{SIZE}}{{UNIT}});',
                            ],
                        ]
                    );

                    // Rotate
                    $this->add_control(
                        'hover_after_rotate',
                        [
                            'label'      => esc_html__( 'Rotate', 'bilalmghl' ),
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
                                '{{WRAPPER}} .single__price:hover:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
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

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        //$settings = $this->get_settings();
        

        $this->add_render_attribute( 'pricing_area_attr', 'class', 'single__price' );
        $this->add_render_attribute( 'pricing_area_attr', 'class', 'single__price__style__'.$settings['content_layout_style'] );
        if( $settings['bilalmghl_active_price'] == 'yes' ){
            $this->add_render_attribute( 'pricing_area_attr', 'class', 'price__active' );
        }
        if( $settings['bilalmghl_ribon_pricing_table'] == 'yes' ){
            $this->add_render_attribute( 'pricing_area_attr', 'class', 'price__ribon' );
        }
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'pricing_area_attr' ); ?> >

                <?php if( $settings['content_layout_style'] == 2 ): ?>
                    
                    <?php $this->bilalmghl_price_ribon(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_icon(); ?>
                        <?php $this->bilalmghl_price_title(); ?>
                        <?php $this->bilalmghl_price_rate(); ?>
                    </div>
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>

                <?php elseif( $settings['content_layout_style'] == 5 ) : ?>

                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_rate(); ?>
                        <div class="price__title__with__ribbon">
                            <?php $this->bilalmghl_price_single_title(); ?>
                            <?php $this->bilalmghl_price_ribon(); ?>
                        </div>
                        <?php $this->bilalmghl_price_single_subtitle(); ?>
                    </div>
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>

                <?php elseif( $settings['content_layout_style'] == 6 || $settings['content_layout_style'] == 9 ) : ?>

                    <?php $this->bilalmghl_price_ribon(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_rate(); ?>
                        <?php $this->bilalmghl_price_title(); ?>
                    </div>
                    <?php $this->bilalmghl_price_description(); ?>
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>
                
                <?php elseif( $settings['content_layout_style'] == 10 ) : ?>
                
                    <?php $this->bilalmghl_price_ribon(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_title(); ?>
                    </div>                    
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_description(); ?>
                    <?php $this->bilalmghl_price_rate(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>
                <?php elseif( $settings['content_layout_style'] == 11 ) : ?>

                    <?php $this->bilalmghl_price_ribon(); ?>
                    <?php $this->bilalmghl_price_rate(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_title(); ?>
                    </div>
                    <?php $this->bilalmghl_price_description(); ?>
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>

                <?php elseif( $settings['content_layout_style'] == 12 ) : ?>

                    <?php $this->bilalmghl_price_ribon(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_title(); ?>
                    </div>
                    <?php $this->bilalmghl_price_rate(); ?>
                    <?php $this->bilalmghl_price_description(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>      
                    <?php $this->bilalmghl_price_features(); ?>

                <?php elseif( $settings['content_layout_style'] == 13 ) : ?>

                    <?php $this->bilalmghl_price_ribon(); ?>
                    <?php $this->bilalmghl_price_icon(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_title(); ?>
                    </div>
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_description(); ?>
                    <?php $this->bilalmghl_price_rate(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>      

                <?php else: ?>

                    <?php $this->bilalmghl_price_ribon(); ?>
                    <div class="single__price__header">
                        <?php $this->bilalmghl_price_title(); ?>
                        <?php $this->bilalmghl_price_rate(); ?>
                    </div>
                    <?php $this->bilalmghl_price_features(); ?>
                    <?php $this->bilalmghl_price_footer(); ?>

                <?php endif; ?>
            </div>
        <?php
    }

    public function bilalmghl_price_icon(){
        $settings = $this->get_settings_for_display(); 
        
        print_r($settings['headerimagesize']);
        
        ?>
        <div class="price__icon">
            <?php
                if( $settings['bilalmghl_header_icon_type'] == 'img' ){  
                    echo Group_Control_Image_Size:: get_attachment_image_html( $settings, 'headerimagesize', 'headerimage' );
                }else{
                    echo bilalmghl_render_icons($settings['headericon']);
                }
            ?>
        </div>
        <?php
    }

    

    public function bilalmghl_price_ribon(){
        $settings = $this->get_settings_for_display();

        if ( 'font' == $settings['ribon_type'] && !empty( $settings['ribon_font_icon'] ) ) {
            $element = '<div class="single__price__ribon">'.bilalmghl_render_icons( $settings['ribon_font_icon'] ).'</div>';
        }elseif( 'img' == $settings['ribon_type'] && !empty( $settings['ribon_image_icon'] ) ){
            $bilalmghl_array = $settings['ribon_image_icon'];
            $bilalmghl_link  = wp_get_attachment_image_url( $bilalmghl_array['id'], 'thumbnail' );
            $image         = Group_Control_Image_Size::get_attachment_image_html( $settings, 'ribon_image_size', 'ribon_image_icon');
            $element       = '<div class="single__price__ribon">'.$image.'</div>';
        }elseif ( 'text' == $settings['ribon_type'] && !empty( $settings['ribon_text_icon'] ) ) {
            $element = '<div class="single__price__ribon">'.esc_html( $settings['ribon_text_icon'] ).'</div>';
        }else{
            $element = '';
        }
        echo wp_kses_post( $element );
    }

    public function bilalmghl_price_title(){
        $settings = $this->get_settings_for_display();

        /*---------------------------
            TITLE
        ----------------------------*/
        if( !empty($settings['pricing_title']) ){
            $title = '<div class="price__title"><h3>'.esc_html( $settings['pricing_title'] ).'</h3></div>';
        }else{
            $title = '';
        }

        /*----------------------------
            Subtitle
        -----------------------------*/
        if ( !empty( $settings['subtitle'] ) ) {
            $subtitle = '<div class="price__subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
        }else{
            $subtitle = '';
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
        echo wp_kses_post( $title_subtitle );
    }

    public function bilalmghl_price_single_title(){
        $settings = $this->get_settings_for_display();
        /*---------------------------
            TITLE
        ----------------------------*/
        if( !empty($settings['pricing_title']) ){
            echo '<div class="price__title"><h3>'.esc_html( $settings['pricing_title'] ).'</h3></div>';
        }
    }

    public function bilalmghl_price_single_subtitle(){
        $settings = $this->get_settings_for_display();
        /*----------------------------
            Subtitle
        -----------------------------*/
        if ( !empty( $settings['subtitle'] ) ) {
            echo '<div class="price__subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
        }
    }

    public function bilalmghl_price_description(){
        $settings = $this->get_settings_for_display();
        /*---------------------------
            TITLE
        ----------------------------*/
        if( !empty($settings['pricing_desc']) ){
            echo '<div class="price__desc">'.wp_kses( $settings['pricing_desc'], wp_kses_allowed_html( 'post' ) ).'</div>';
        }
    }

    private function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'dollar'       => '&#36;',
            'baht'         => '&#3647;',
            'euro'         => '&#128;',
            'franc'        => '&#8355;',
            'guilder'      => '&fnof;',
            'indian_rupee' => '&#8377;',
            'krona'        => 'kr',
            'lira'         => '&#8356;',
            'peseta'       => '&#8359',
            'peso'         => '&#8369;',
            'pound'        => '&#163;',
            'real'         => 'R$',
            'ruble'        => '&#8381;',
            'rupee'        => '&#8360;',
            'shekel'       => '&#8362;',
            'won'          => '&#8361;',
            'yen'          => '&#165;',
        ];
        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ]: '';
    }

    public function bilalmghl_price_rate(){

        $settings = $this->get_settings_for_display();
        
      
        // Currency symbol
        $currencysymbol = '';
        if ( ! empty( $settings['bilalmghl_currency_symbol'] ) ) {
            if ( $settings['bilalmghl_currency_symbol'] != 'custom' ) {
                $currencysymbol = '<span class="price__currency">'.$this->get_currency_symbol( $settings['bilalmghl_currency_symbol'] ).'</span>';
            } else {
                $currencysymbol = '<span class="price__currency">'.$settings['bilalmghl_currency_symbol_custom'].'</span>';
            }
        } ?>
        <div class="price__rate">
            <?php
                if( $settings['bilalmghl_offer_price'] == 'yes' && !empty( $settings['bilalmghl_original_price'] ) ){

                    if ( 'left' == $settings['bilalmghl_currency_position'] ) {
                        echo '<h3><span class="old__price">'.$currencysymbol.'<del>'.esc_attr__( $settings['bilalmghl_original_price'],'bilalmghl' ).'</del></span><span class="new__price">'.$currencysymbol.esc_attr__( $settings['bilalmghl_price'],'bilalmghl' ).'</span> <span class="period__price">'.esc_attr__( $settings['bilalmghl_period'],'bilalmghl' ).'</span></h3>';
                    }elseif ( 'right' == $settings['bilalmghl_currency_position'] ) {
                        echo '<h3><span class="old__price">'.'<del>'.esc_attr__( $settings['bilalmghl_original_price'],'bilalmghl' ).$currencysymbol.'</del></span><span class="new__price">'.esc_attr__( $settings['bilalmghl_price'],'bilalmghl' ).$currencysymbol.'</span> <span class="period__price">'.esc_attr__( $settings['bilalmghl_period'],'bilalmghl' ).'</span></h3>';
                    }
                }else{
                    if( !empty($settings['bilalmghl_price']) ){
                        if ( 'left' == $settings['bilalmghl_currency_position'] ) {
                            echo '<h3><span class="new__price">'.$currencysymbol.esc_attr__( $settings['bilalmghl_price'],'bilalmghl' ).'</span> <span class="period__price">'.esc_attr__( $settings['bilalmghl_period'],'bilalmghl' ).'</span></h3>';
                        }elseif ( 'right' == $settings['bilalmghl_currency_position'] ) {
                            echo '<h3><span class="new__price">'.esc_attr__( $settings['bilalmghl_price'],'bilalmghl' ).$currencysymbol.'</span> <span class="period__price">'.esc_attr__( $settings['bilalmghl_period'],'bilalmghl' ).'</span></h3>';
                        }
                    }
                }
            ?>
        </div>
    <?php 
    }

    public function bilalmghl_price_features(){
        $settings = $this->get_settings_for_display(); ?>

        <?php if( $settings['bilalmghl_features_list'] ): ?>
            <div class="single__price__body">
            <ul  class="price__features">
                    <?php foreach ( $settings['bilalmghl_features_list'] as $features ): ?>
                        <li class="<?php if( $features['bilalmghl_old_features'] == 'yes' ){ echo 'off'; }?> elementor-repeater-item-<?php echo $features['_id']; ?>" >
                            <?php $features_txt  = str_replace( ['{', '}', '[', ']','(RIGHT)','(/RIGHTEND)'], ['<span class="content__span">', '</span>','<b>', '</b>','<span style="float:right;">', '</span>'], $features['bilalmghl_features_title']); ?>
                            <?php
                                if( 'yes' == $settings['bilalmghl_show_features_icon'] ){
                                    
                                    if( !empty( $features['features_image_icon'] ) &&  'img' == $features['features_icon_type'] ){  
                                        echo Group_Control_Image_Size:: get_attachment_image_html( $features, 'full', 'features_image_icon' );
                                    }elseif( !empty( $features['bilalmghl_features_icon'] ) &&  'font' == $features['features_icon_type'] ){
                                        echo bilalmghl_render_icons( $features['bilalmghl_features_icon'] );
                                    }
                                }

                                echo wp_kses_post( $features_txt );
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;
    }

    public function bilalmghl_price_footer(){

        $settings = $this->get_settings_for_display();
     
        if ( ! empty( $settings['bilalmghl_button_link']['url'] ) ) {
            
            $this->add_render_attribute( 'url', 'class', 'price_btn' );
            
            if(isset($settings['bilalmghl_button_link']['custom_attributes'])){
                $this->add_render_attribute( 'url', 'class', $settings['bilalmghl_button_link']['custom_attributes']);   
            }
            
            if(isset($settings['price_woocommerce_product_id']) && $settings['price_woocommerce_product_id'] !='') {
                $this->add_render_attribute( 'url', 'data-wcid', $settings['price_woocommerce_product_id']);     
            }

            if(isset($settings['paddle_product']) && $settings['paddle_product'] !=''){
                $this->add_render_attribute( 'url', 'data-productid', $settings['paddle_product']); 
                $this->add_render_attribute( 'url', 'href', 'javascript:void(0)' );  
                $this->add_render_attribute( 'url', 'class', 'elements-ready-buy' );  
            }
           
            if($settings['bilalmghl_custom_product_id'] !=''){
                $this->add_render_attribute( 'url', 'data-product-id', $settings['bilalmghl_custom_product_id']);   
            }
           

            if(isset($settings['paddle_product']) && $settings['bilalmghl_button_link']['url'] =='#' && $settings['bilalmghl_custom_product_id'] !=''){
                $this->add_render_attribute( 'url', 'href', 'javascript:void(0)' );  
            }else{
                $this->add_render_attribute( 'url', 'href', $settings['bilalmghl_button_link']['url'] );
            }
            

            if ( $settings['bilalmghl_button_link']['is_external'] ) {
                $this->add_render_attribute( 'url', 'target', '_blank' );
            }

            if ( ! empty( $settings['bilalmghl_button_link']['nofollow'] ) ) {
                $this->add_render_attribute( 'url', 'rel', 'nofollow' );
            }
        }

        if ( 'yes' == $settings['bilalmghl_price_button'] ) {

                if( is_array($settings['bilalmghl_button_icon']['value']) ){
                    $icons_data = $settings['bilalmghl_button_icon']['value']['url'];
                }elseif($settings['bilalmghl_button_icon']['value']){
                    $icons_data = $settings['bilalmghl_button_icon']['value'];
                }

                if ( !empty( $icons_data ) ) {

                    if ( 'left'  == $settings['bilalmghl_button_icon_alignment'] ) {
                        echo '<div class="single__price__footer">'.sprintf( '<a %1$s>%2$s %3$s</a>', $this->get_render_attribute_string( 'url' ), bilalmghl_render_icons( $settings['bilalmghl_button_icon'], 'price_btn_icon_left' ), $settings['bilalmghl_button_text'] ).'</div>';
                    }elseif ( 'right'  == $settings['bilalmghl_button_icon_alignment'] ) {
                        echo '<div class="single__price__footer">'.sprintf( '<a %1$s>%2$s %3$s</a>', $this->get_render_attribute_string( 'url' ), $settings['bilalmghl_button_text'], bilalmghl_render_icons( $settings['bilalmghl_button_icon'], 'price_btn_icon_right' ) ).'</div>';
                    }
                }else{
                    echo '<div class="single__price__footer">'.sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $settings['bilalmghl_button_text'] ).'</div>';
                }
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Pricing_Table() );