<?php
/**
 * Initialize classes in the get_services method.
 *
 * @package  Studio14.
 */

namespace Studio14;

use Studio14\Blocks\ButtonBlocks;
use Studio14\Blocks\CardBlocks;

class Init {
	
	public function __construct() {
		$this->initialize_classes();
	}
	
	public function initialize_classes() {
		// Blocks
		ButtonBlocks::get_instance();
		CardBlocks::get_instance();
	}
	
	
	/**
	 * @return self
	 */
	public static function get_instance( ) {
		static $instance = null;
		
		if (is_null($instance)) {
			$instance = new self();
		}
		
		return $instance;
	}
}