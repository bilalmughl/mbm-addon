<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function bilalmghl_medical_sets(){
	$icons = array(
		'medical-001-ambulance',
		'medical-002-experiments',
		'medical-003-atom',
		'medical-004-bill',
		'medical-005-blood-bag',
		'medical-006-bone',
		'medical-007-book',
		'medical-008-book',
		'medical-009-bottle',
		'medical-010-cardiogram',
		'medical-011-chat',
		'medical-012-experiment',
		'medical-013-hospital',
		'medical-014-condom',
		'medical-015-crutch',
		'medical-016-date',
		'medical-017-dna',
		'medical-018-dropper',
		'medical-019-dropper',
		'medical-020-first-aid-kit',
		'medical-021-folder',
		'medical-022-heart-rate',
		'medical-023-hot-water-bottle',
		'medical-024-inbox',
		'medical-025-molecule',
		'medical-026-medicine',
		'medical-027-medicine',
		'medical-028-microscope',
		'medical-029-note',
		'medical-030-web',
		'medical-031-oxygen',
		'medical-032-place',
		'medical-033-presentation',
		'medical-034-report',
		'medical-035-weighing-machine',
		'medical-036-search',
		'medical-037-shield',
		'medical-038-stethoscope',
		'medical-039-stretcher',
		'medical-040-tablet',
		'medical-041-thermometer',
		'medical-042-wheelchair',
		'medical-043-lab',
	);
	return $icons;
}

class bilalmghl_Add_Medical_Icons {
    
    public function __construct() { 
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'bilalmghl_enqueue_medical' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'bilalmghl_enqueue_medical' ] );    
		add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'bilalmghl_elementor_medical_setup' ] );
	}
    
    public function bilalmghl_enqueue_medical(){
        wp_enqueue_style( 'medical', BILALMGHL_ADDONS_ROOT_ICON . 'medical/medical.css', array(), '1.0.1' );
    }

	public function bilalmghl_elementor_medical_setup( $tabs = array()){

		$new_icons = bilalmghl_medical_sets();

		$tabs['medical'] = array(
			'name'          => 'medical',
			'label'         => esc_html__( 'Medical Icons', 'bilalmghl' ),
			'labelIcon'     => 'medical-020-first-aid-kit',
			'prefix'        => '',
			'displayPrefix' => 'medical',
			'url'           => BILALMGHL_ADDONS_ROOT_ICON . 'medical/medical.css',
			'icons'         => $new_icons,
			'ver'           => '1.0.0',
		);
		return $tabs;
	}

}
new bilalmghl_Add_Medical_Icons();