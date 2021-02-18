<?php
/*
* Plugin Name: Admin Panel Editor
* Description: This is easy way to edit the admin panel
* Version:     1.0.0
* Author:      Otimize - Talita Mota
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Domain Path: /languages/
* Text Domain: admin-panel-editor
*/


define( 'ADMIN_PANEL_EDITOR_VERSION', '1.0.0' );


register_activation_hook( __FILE__, 'admin_editor_activate' );

if( ! function_exists( 'admin_editor_activate' ) ) {

	function admin_editor_activate() {

		flush_rewrite_rules();

	}

}

register_deactivation_hook( __FILE__, 'admin_editor_deactivate' );

if( ! function_exists( 'admin_editor_deactivate' ) ) {
	
	function admin_editor_deactivate() {

		flush_rewrite_rules();
	}

}

register_uninstall_hook(__FILE__, 'admin_editor_uninstall');

if( ! function_exists( 'admin_editor_uninstall' ) ) {
	 
	 function admin_editor_uninstall() {
	 	return;
	 }
}

require plugin_dir_path( __FILE__ ) . 'includes/class-admin-panel-editor.php';

function run_admin_panel_editor() {

	$plugin = new Admin_Panel_Editor();
	$plugin->run();

}
run_admin_panel_editor();

?>