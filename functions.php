<?php
// Require once the Composer Autoload.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}
/**
 * Initialize all the core classes of the plugin.
 */
Studio14\Init::get_instance();