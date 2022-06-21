<?php

namespace Elementor;
abstract class Custom_Controls_Manager extends Controls_Manager {
    const RADIOIMAGE = 'radioimage';
    const MEDIAFILE = 'file-select';
} 

class bilalmghl_Control{

	public function __construct(){

		require_once( __DIR__ . '/fileselect/fileselect-control.php' );
	}
		
}

new bilalmghl_Control();