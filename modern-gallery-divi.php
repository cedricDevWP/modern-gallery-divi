<?php
/*
Plugin Name: Modern Gallery Divi
Plugin URI:  
Description: Create modern galleries with Divi
Version:     1.0.0
Author:      Cédric Chevillard
Author URI:  https://www.cedricchevillard.fr/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mogd-modern-gallery-divi
Domain Path: /languages

Modern Gallery Divi is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Modern Gallery Divi is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Modern Gallery Divi. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'mogd_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function mogd_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/ModernGalleryDivi.php';
}
add_action( 'divi_extensions_init', 'mogd_initialize_extension' );
endif;
