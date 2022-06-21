<?php

/*----------------------
	COMMON
------------------------*/
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;



/*---------------------------
	INCLUDE FILE WITH trait
----------------------------*/
trait Slide_Control{
	function slide_opt(){

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
				'label'  => __( 'Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .counter__number__wrapper' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'number_hover_color',
			[
				'label'  => __( 'Counter Hover Color', 'bilalmghl' ),
				'type'   => Controls_Manager::COLOR,
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
	}
}

/*----------------------------
	USE IN WIDGET
------------------------------*/
require_once BILALMGHL_ADDONS_ROOT . '/inc/slide_opt.php';
/*-------------------------
	USE IN WIDGET
--------------------------*/
//use \Slide_Control;

/*------------------------
	USE IN SECTION
-------------------------*/
//$this->slide_opt();

/*---------------------------
	INCLUDE FILE WITH HOOK
----------------------------*/

function example_opt( $object, $widget_name ){
	/*----------------------------
		COUNTE NUMBER STYLE
	-----------------------------*/
	$object->start_controls_section(
		'section_number',
		[
			'label' => __( 'Number', 'bilalmghl' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		]
	);

	$object->add_control(
		'number_color',
		[
			'label'  => __( 'Color', 'bilalmghl' ),
			'type'   => Controls_Manager::COLOR,
            'selectors' => [
				'{{WRAPPER}} .counter__number__wrapper' => 'color: {{VALUE}};',
			],
		]
	);

	$object->add_control(
		'number_hover_color',
		[
			'label'  => __( 'Counter Hover Color', 'bilalmghl' ),
			'type'   => Controls_Manager::COLOR,
            'selectors' => [
				'{{WRAPPER}} .single__counter:hover .counter__number__wrapper' => 'color: {{VALUE}};',
			],
		]
	);

	$object->add_group_control(
		Group_Control_Typography:: get_type(),
		[
			'name'     => 'typography_number',
			'selector' => '{{WRAPPER}} .counter__number__wrapper',
		]
	);
    $object->add_responsive_control(
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

	$object->add_control(
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
		]
	);

	$object->add_control(
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

	$object->add_control(
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
	$object->end_controls_section();
	/*---------------------------
		COUNTER NUMBER STYLE END
	-----------------------------*/
}
add_action( 'elementor_example_opt', 'example_opt', 10, 2 );


/*----------------------------
	USE IN WIDGET
------------------------------*/
require_once BILALMGHL_ADDONS_ROOT . '/inc/slide_opt.php';
do_action( 'elementor_example_opt', $this, $this->get_name() );