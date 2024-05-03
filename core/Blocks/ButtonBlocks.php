<?php
/**
 * Register Blocks for Member Stories Page
 *
 * @package  Tec_Library
 */
namespace Studio14\Blocks;

use Studio14\Base\BaseController;

/**
 * Handle all the blocks required for the Member Story Page
 */

class ButtonBlocks extends BaseController {
	
	/**
	 * Register function is called by default to get the class running
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		add_action( 'init' , [ $this, 'create_button_block_init']);
	}
	
	
	/**
	 * Get member story info is a render callback for the dynamic block - document list.
	 * Returns a formatted list for Gutenberg block
	 *
	 * @param $attr
	 * @param $content
	 * @return string
	 */
	public function get_button_block_info($attr, $content) {
		$attr = wp_parse_args($attr, [
			'buttonText' => 'Sample Text',
			'buttonURL' => '#',
			'buttonTarget' => '_self',
		]);
		
		
		
		$classes = ''; // parent classes
		
		$id = isset( $block['anchor'] ) ? $block['anchor'] : '';
		
		$post_list_formatted  = '<div ' . ( !empty( $id ) ? 'id="' . $id . '" ' : '') . 'class="block-button-group ' . $classes . '">';
		
		$post_list_formatted .= '<a href="' . esc_url( $attr['buttonURL'] ) . '" class="button primary-button ' . $classes . '" target="'.esc_attr($attr['buttonTarget']). '">' . esc_attr( $attr['buttonText'] ) . '</a>';
		
		$post_list_formatted .= '</div>';
		
		//Return formatted string to dynamic block
		return $post_list_formatted;
	}
	
	/**
	 * Register block function called by init hook
	 *
	 * @return void
	 */
	public function create_button_block_init() {
		register_block_type_from_metadata( $this->theme_path. '/build/button-block/'  , [
			'render_callback' => [ $this, 'get_button_block_info'],
		] );
		register_block_type( $this->theme_path . '/build/button-block/block.json' );
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