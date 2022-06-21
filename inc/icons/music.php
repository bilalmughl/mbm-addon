<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function bilalmghl_music_sets(){
	$icons = array(
		'music-001-drum',
		'music-002-equalizer-1',
		'music-003-microphone-1',
		'music-004-ipod-1',
		'music-005-speaker-2',
		'music-006-cassette',
		'music-007-speaker-1',
		'music-008-record-player',
		'music-009-piano',
		'music-010-earphones-1',
		'music-011-music',
		'music-012-equalizer',
		'music-013-settings-1',
		'music-014-cd',
		'music-015-microphone',
		'music-016-ipod',
		'music-017-earphones',
		'music-018-settings',
		'music-019-speaker',
		'music-020-headphones',
	);
	return $icons;
}

class bilalmghl_Add_Music_Icons {
    
    public function __construct() { 
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'bilalmghl_enqueue_music' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'bilalmghl_enqueue_music' ] );    
		add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'bilalmghl_elementor_music_setup' ] );
	}
    
    public function bilalmghl_enqueue_music(){
        wp_enqueue_style( 'music', BILALMGHL_ADDONS_ROOT_ICON . 'music/music.css', array(), '1.0.1' );
    }

	public function bilalmghl_elementor_music_setup( $tabs = array()){

		$new_icons = bilalmghl_music_sets();

		$tabs['music'] = array(
			'name'          => 'music',
			'label'         => esc_html__( 'Music Icons', 'bilalmghl' ),
			'labelIcon'     => 'music-011-music',
			'prefix'        => '',
			'displayPrefix' => 'music',
			'url'           => BILALMGHL_ADDONS_ROOT_ICON . 'music/music.css',
			'icons'         => $new_icons,
			'ver'           => '1.0.0',
		);
		return $tabs;
	}

}
new bilalmghl_Add_Music_Icons();