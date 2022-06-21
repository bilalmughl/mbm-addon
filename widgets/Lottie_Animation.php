<?php

    namespace Elementor;

    class bilalmghl_Lottie_Animation extends Widget_Base {

        public function get_name() {
            return 'bilalmghl_Lottie_Animation';
        }

        public function get_title() {
            return esc_html__( 'Ul Lottie Animation', 'bilalmghl' );
        }

        public function get_icon() {
            return 'eicon-lottie';
        }

        public function get_categories() {
            return ['bilalmghl-addons'];
        }

        public function get_keywords() {
            return ['Lottie', 'gif', 'file', 'Animation'];
        }

        public function get_script_depends() {
            return ['lottie-player', 'lottie-interactivity'];
        }

        public function get_style_depends() {
            return [];
        }

        protected function _register_controls() {

            $this->start_controls_section(
                '_content',
                [
                    'label' => __( 'Lotte Content', 'bilalmghl' ),
                ]
            );

				$this->add_control(
					'lottie_file_type',
					[
						'label'   => __( 'Lottie File Type', 'bilalmghl' ),
						'type'    => Controls_Manager::SELECT,
						'default' => 'file_upload',
						'options' => [
							'file_upload'  => __( 'Upload JSON File', 'bilalmghl' ),
							'file_url' => __( 'JSON File URL', 'bilalmghl' ),
						],
					]
				);

				$this->add_control(
					'file_link',
					[
						'label'       => esc_html__( 'Select File', 'bilalmghl' ),
						'type'        => Custom_Controls_Manager::MEDIAFILE,
						'description' => __( 'Go to <a href="https://lottiefiles.com/44373-girl-cycling"> Lottie Site</a> and copy json file and upload the JSON file', 'bilalmghl' ),
						'condition'   => [
							'lottie_file_type' => 'file_upload',
						],
						'separator'    => 'before',
					]
				);

				$this->add_control(
					'lottie_file_url',
					[
						'label'       => __( 'Lottie Json URL', 'bilalmghl' ),
						'type'        => Controls_Manager::URL,
						'placeholder' => __( 'Paste Json Url Here.', 'bilalmghl' ),
						'description' => __( 'Go to <a href="https://lottiefiles.com/44373-girl-cycling"> Lottie Site</a> and copy json file URL and paste here.', 'bilalmghl' ),
						'condition'   => [
							'lottie_file_type' => 'file_url',
						],
						'separator'    => 'before',
					]
				);
			
			$this->end_controls_section();

			$this->start_controls_section(
                '_settings',
                [
                    'label' => __( 'Lotte Settings', 'bilalmghl' ),
                ]
            );
				$this->add_control(
					'control',
					[
						'label'        => __( 'Controls', 'bilalmghl' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => __( 'Show', 'bilalmghl' ),
						'label_off'    => __( 'Hide', 'bilalmghl' ),
						'return_value' => 'yes',
						'default'      => 'yes',
						'separator'    => 'before',
					]
				);

				$this->add_control(
					'loop',
					[
						'label'        => __( 'Enable Loop', 'bilalmghl' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => __( 'Yes', 'bilalmghl' ),
						'label_off'    => __( 'No', 'bilalmghl' ),
						'return_value' => 'yes',
						'default'      => 'yes',
						'separator'    => 'before',
					]
				);

				$this->add_control(
					'autoplay',
					[
						'label'        => __( 'Enable Autoplay', 'bilalmghl' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => __( 'Yes', 'bilalmghl' ),
						'label_off'    => __( 'No', 'bilalmghl' ),
						'return_value' => 'yes',
						'default'      => 'yes',
						'separator'    => 'before',
					]
				);

				$this->add_control(
					'speed',
					[
						'label'     => __( 'Speed', 'bilalmghl' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => ['px'],
						'range'      => [
							'px' => [
								'min'  => 0.1,
								'max'  => 100,
								'step' => 0.1,
							],
						],
                        'default' => [
                            'unit' => 'px',
                            'size' => 1,
                        ],
						'separator' => 'before',
					]
				);

				$this->add_control(
					'height',
					[
						'label'      => __( 'Height', 'bilalmghl' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'range'      => [
							'px' => [
								'min'  => 0,
								'max'  => 1900,
								'step' => 5,
							],
							'%'  => [
								'min' => 0,
								'max' => 100,
							],
						],
						'separator'  => 'before',

					]
				);

				$this->add_control(
					'width',
					[
						'label'      => __( 'Width', 'bilalmghl' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'range'      => [
							'px' => [
								'min'  => 0,
								'max'  => 1900,
								'step' => 5,
							],
							'%'  => [
								'min' => 0,
								'max' => 100,
							],
						],

					]
				);
				
				$this->add_control(
					'bg_color',
					[
						'label'     => esc_html__( 'Background Color', 'bilalmghl' ),
						'type'      => Controls_Manager::COLOR,
						'separator' => 'before',
					]
				);

            $this->end_controls_section();

        }

        protected function render() {

            $settings  = $this->get_settings_for_display();
            $random_id = $this->get_id();
            $bg_color  = $settings['bg_color'];
            $width     = $settings['width'];
            $height    = $settings['height'];
            $width     = $width['size'] . $width['unit'].';';
            $height    = $height['size'] . $height['unit'].';';

			if ( 'file_url' == $settings['lottie_file_type'] && $settings['lottie_file_url']['url'] ) {
				$this->add_render_attribute( 'player_attr', 'src', $settings['lottie_file_url']['url'] );
			}elseif( 'file_upload' == $settings['lottie_file_type'] && $settings['file_link'] ){
				$this->add_render_attribute( 'player_attr', 'src', $settings['file_link'] );
			}

			if ( $settings['bg_color'] ) {
				$this->add_render_attribute( 'player_attr', 'background', $settings['bg_color'] );
			}
			if ( $settings['speed'] ) {
				$this->add_render_attribute( 'player_attr', 'speed', $settings['speed']['size'] );
			}
			if ( $settings['width']['size'] ) {
				$this->add_render_attribute( 'player_attr', 'style', 'width:'.$width );
			}
			if ( $settings['height']['size'] ) {
				$this->add_render_attribute( 'player_attr', 'style', 'height:'.$height );
			}

			if ( $settings['loop'] == 'yes' ) {
				$this->add_render_attribute( 'player_attr', 'loop' );
			}

			if ( $settings['autoplay'] == 'yes' ) {
				$this->add_render_attribute( 'player_attr', 'autoplay' );
			}

			if ( $settings['control'] == 'yes' ) {
				$this->add_render_attribute( 'player_attr', 'controls' );
			}

    	?>
    		<lottie-player <?php echo $this->get_render_attribute_string('player_attr'); ?>></lottie-player>
    	<?php
		}
	}

    Plugin::instance()->widgets_manager->register_widget_type( new bilalmghl_Lottie_Animation() );