<?php
/**
 * @package Studio14
 */
namespace Studio14\Base;

class BaseController {
	
	public $theme_path;
	public $theme_url;
	
	public function __construct() {
		$this->theme_path = trailingslashit( get_template_directory() );
		$this->theme_url  = trailingslashit( get_template_directory_uri());
	}
	
}