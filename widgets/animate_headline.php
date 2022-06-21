<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class bilalmghl_Animate_Headline extends Widget_Base {

    public function get_name() {
        return 'bilalmghl_Animate_Headline';
    }
    
    public function get_title() {
        return __( 'Ul Animate Headline', 'bilalmghl' );
    }

    public function get_icon() {
        return 'eicon-animated-headline';
    }
    
	public function get_categories() {
		return [ 'bilalmghl-addons' ];
	}

    public function get_script_depends() {
        return [
            'animatedheadline',
            'bilalmghl-core',
        ];
    }

    public function get_style_depends() {
        return [
            'animatedheadline',
        ];
    }

    public function get_keywords() {
        return[
            'animate',
            'animate headline',
            'headline'
        ];
    }

    static function content_layout_style(){
        return [
            'clip'        => esc_html__('Clip Text','bilalmghl' ),
            'rotate-2'    => esc_html__('Letter Rotate','bilalmghl' ),
            'rotate-3'    => esc_html__('Letter Rotate 2','bilalmghl' ),
            'type'        => esc_html__('Letter Typeing','bilalmghl' ),
            'loading-bar' => esc_html__('Loading Bar','bilalmghl' ),
            'slide'       => esc_html__('Slide Text','bilalmghl' ),
            'zoom'        => esc_html__('Zoom Text','bilalmghl' ),
            'scale'       => esc_html__('Letter Scale','bilalmghl' ),
            'rotate-1'    => esc_html__('Text Rotate','bilalmghl' ),
            'push'        => esc_html__('Text Push','bilalmghl' ),
        ];
    }
    
    protected function _register_controls() {

        $this->start_controls_section(
            '_content_section',
            [
                'label' => esc_html__( 'Content', 'bilalmghl' ),
            ]
        );
            $this->add_control(
                'content_animate_layout',
                [
                    'label'       => esc_html__( 'Animate Style', 'bilalmghl' ),
                    'description' => esc_html__( 'Select a word animation type by default ( Clip Text ) is set. Note: It\'s not working if you not add ( Animated Words )', 'bilalmghl' ),
                    'type'        => Controls_Manager::SELECT,
                    'options'     => self::content_layout_style(),
                    'default'     => 'rotate-1',
                ]
            );

            $this->add_control(
                'animate_title_before',
                [
                    'label'     => esc_html__( 'Animate Title Before', 'bilalmghl' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => '',
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'animate_title_after',
                [
                    'label'     => esc_html__( 'Animate Title After', 'bilalmghl' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => '',
                    'separator' => 'before',
                ]
            );
        
            $repeater = new Repeater();
            $repeater->add_control(
                'animate_title',
                [
                    'label'   => esc_html__( 'Animate Title', 'bilalmghl' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '',
                ]
            );
            $this->add_control(
                'animate_text_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  =>  $repeater->get_controls() ,
                    'default' => [
                        [
                            'animate_title' => esc_html__('Title #1','bilalmghl'),
                        ],
                    ],
                    'title_field' => '{{{ animate_title }}}',
                    'separator'   => 'before',
                ]
            );
        $this->end_controls_section();

        /*----------------------------
            HEADLINE STYLE
        -----------------------------*/
        $this->start_controls_section(
            '_heading_style_section',
            [
                'label' => esc_html__( 'Heading', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                '_heading_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} .animate__text__headline h1' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => '_heading_typography',
                    'selector' => '{{WRAPPER}} .animate__text__headline h1',
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => '_heading_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .animate__text__headline',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => '_heading_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .animate__text__headline',
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_heading_radius',
                [
                    'label'      => __( 'Border Radius', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => '_heading_shadow',
                    'selector' => '{{WRAPPER}} .animate__text__headline',
                ]
            );
            $this->add_responsive_control(
                '_heading_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_heading_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                '_heading_align',
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
                        '{{WRAPPER}} .animate__text__headline' => 'text-align: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();
        /*----------------------------
            HEADLINE STYLE END
        -----------------------------*/

        /*----------------------------
            HEADLINE ANIMATE TEXT STYLE
        -----------------------------*/
        $this->start_controls_section(
            '_animate_text_style_section',
            [
                'label' => esc_html__( 'Animate Text', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                '_animate_text_color',
                [
                    'label'     => esc_html__( 'Color', 'bilalmghl' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => '_animate_text_typography',
                    'selector' => '{{WRAPPER}} .animate__text__headline h1 .animate__main__text',
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => '_animate_text_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .animate__text__headline h1 .animate__main__text',
                ]
            );
            
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => '_animate_text_border',
                    'label'    => __( 'Border', 'bilalmghl' ),
                    'selector' => '{{WRAPPER}} .animate__text__headline h1 .animate__main__text',
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_animate_text_radius',
                [
                    'label'      => __( 'Border Radius', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => '_animate_text_shadow',
                    'selector' => '{{WRAPPER}} .animate__text__headline h1 .animate__main__text',
                ]
            );
            $this->add_responsive_control(
                '_animate_text_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_animate_text_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        /*----------------------------
            HEADLINE ANIMATE TEXT STYLE END
        -----------------------------*/

        /*----------------------------
            ANIMATE BAR STYLE
        -----------------------------*/
        $this->start_controls_section(
            '_animate_bar_style_section',
            [
                'label' => esc_html__( 'Animate Bar', 'bilalmghl' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'content_animate_layout' => ['loading-bar', 'clip'],
                ],
            ]
        );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => '_animate_bar_background',
                    'label'    => esc_html__( 'Background', 'bilalmghl' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .animate__text__headline h1 .animate__main__text:after',
                ]
            );            
            $this->add_responsive_control(
                '_animate_bar_radius',
                [
                    'label'      => __( 'Border Radius', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_animate_bar_width',
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
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text:after' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                    'condition' => [
                        'content_animate_layout!' => 'loading-bar',
                    ],
                ]
            );
            $this->add_responsive_control(
                '_animate_bar_height',
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
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text:after' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_animate_bar_margin',
                [
                    'label'      => __( 'Margin', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                '_animate_bar_padding',
                [
                    'label'      => __( 'Padding', 'bilalmghl' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .animate__text__headline h1 .animate__main__text:after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        /*----------------------------
            ANIMATE BAR STYLE END
        -----------------------------*/
    }

    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( '_main_wrap_attr', 'class', 'animated__headline__area' );
        $this->add_render_attribute( '_animate_headline_active_attr', 'class', 'bilalmghl__animate__heading__activation' );

        $random_id        = rand(2564,1245);
        $animate_settings = [
            'random_id'    => $random_id,
            'animate_type' => $settings['content_animate_layout'],
        ];
        $this->add_render_attribute( '_animate_headline_active_attr', 'data-settings', wp_json_encode( $animate_settings ) );       

        $this->add_render_attribute( '_animate_headline_active_attr', 'class', 'animate__text__headline' );
        $this->add_render_attribute( '_animate_headline_active_attr', 'class', $settings['content_animate_layout'] );

        $this->add_render_attribute( '_animate_headline_active_attr', 'id', 'animate__text__headline__'.$random_id );
        ?>
        <div <?php echo $this->get_render_attribute_string('_main_wrap_attr'); ?>>
                <div <?php echo $this->get_render_attribute_string('_animate_headline_active_attr'); ?>>
                    <h1 class="ah-headline">
                        <?php if(!empty($settings['animate_title_before'])): ?>
                        <span class="animate__headline__before"><?php echo esc_html( $settings['animate_title_before'] ); ?></span>
                        <?php endif; ?>
                        <span class="ah-words-wrapper animate__main__text">
                            <?php foreach ( $settings['animate_text_list'] as $key => $single_text ): ?>
                                <?php if( $key == 0 ): ?>
                                    <b class="is-visible"><?php echo esc_html( $single_text['animate_title'] ); ?></b>
                                <?php else: ?>
                                    <b><?php echo esc_html( $single_text['animate_title'] ); ?></b>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </span>
                        <?php if(!empty($settings['animate_title_after'])): ?>
                        <span class="animate__headline__after"><?php echo esc_html( $settings['animate_title_after'] ); ?></span>
                        <?php endif; ?>
                    </h1>
                </div>
        </div>
    <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Animate_Headline() );