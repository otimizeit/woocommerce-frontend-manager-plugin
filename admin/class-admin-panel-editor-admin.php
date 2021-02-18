<?php
class Admin_Panel_Editor_Admin {
    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    }
    
    public function options_page() {

		// Add top level menu page
		add_menu_page(
			'Admin Editor Options',
			'Admin Editor',
			'manage_options',
			'admin_editor',
			array( $this, 'admin_editor_options_page_html' )
		);
    }
    
    function settings_init() {
		/* Users Selector */
		register_setting(
			'admin_editor',
			'admin_panel_users_selector_option'
        );
        
		if( false == get_option( 'admin_panel_users_selector_option' ) ) {
            add_option( 'admin_panel_users_selector_option' );
		}

		add_settings_section(
			'admin_panel_users_selector_section',
			'Users Selector',
			array( 'Admin_Panel_Users_Selector_Functions', 'admin_panel_users_selector_section' ),
			'admin_editor'
		);

		add_settings_field(
			'Users Options',
			'Users Options',
			array( 'Admin_Panel_Users_Selector_Functions', 'users_options' ),
			'admin_editor',
			'admin_panel_users_selector_section'
		);
		/* -------------------- */

		/* Setting menu options */
		register_setting(
			'admin_editor',
			'admin_panel_menu_editor_option'
        );
        
		if( false == get_option( 'admin_panel_menu_editor_option' ) ) {
            add_option( 'admin_panel_menu_editor_option' );
		}

		add_settings_section(
			'admin_panel_menu_editor_section',
			'Menu Editor',
			array( 'Admin_Panel_Menu_Editor_Functions', 'admin_panel_menu_editor_section' ),
			'admin_editor'
		);

		add_settings_field(
			'Menu Options',
			'Menu Options',
			array( 'Admin_Panel_Menu_Editor_Functions', 'menu_options' ),
			'admin_editor',
			'admin_panel_menu_editor_section'
		);
		/* -------------------- */

		/* Setting notices */
		register_setting(
			'admin_editor',
			'admin_panel_notices_editor_option'
        );
        
		if( false == get_option( 'admin_panel_notices_editor_option' ) ) {
            add_option( 'admin_panel_notices_editor_option' );
		}

		add_settings_section(
			'admin_panel_notices_editor_section',
			'Notices Editor',
			array( 'Admin_Panel_Notices_Editor_Functions', 'admin_panel_notices_editor_section' ),
			'admin_editor'
		);

		add_settings_field(
			'Notices Options',
			'Notices Options',
			array( 'Admin_Panel_Notices_Editor_Functions', 'notices_options' ),
			'admin_editor',
			'admin_panel_notices_editor_section'
		);
		/* -------------------- */

		/* Setting colors */
		register_setting(
			'admin_editor',
			'admin_panel_colors_editor_option'
        );
        
		if( false == get_option( 'admin_panel_colors_editor_option' ) ) {
            add_option( 'admin_panel_colors_editor_option' );
		}

		add_settings_section(
			'admin_panel_colors_editor_section',
			'Colors Editor',
			array( 'Admin_Panel_Colors_Editor_Functions', 'admin_panel_colors_editor_section' ),
			'admin_editor'
		);

		add_settings_field(
			'Colors Options',
			'Colors Options',
			array( 'Admin_Panel_Colors_Editor_Functions', 'colors_options' ),
			'admin_editor',
			'admin_panel_colors_editor_section'
		);
		/* -------------------- */

		/* Setting admin bar */
		register_setting(
			'admin_editor',
			'admin_panel_bar_editor_option'
        );
        
		if( false == get_option( 'admin_panel_bar_editor_option' ) ) {
            add_option( 'admin_panel_bar_editor_option' );
		}

		add_settings_section(
			'admin_panel_bar_editor_section',
			'Admin Bar Editor',
			array( 'Admin_Panel_Bar_Editor_Functions', 'admin_panel_bar_editor_section' ),
			'admin_editor'
		);

		add_settings_field(
			'Admin Bar Options',
			'Admin Bar Options',
			array( 'Admin_Panel_Bar_Editor_Functions', 'bar_options' ),
			'admin_editor',
			'admin_panel_bar_editor_section'
		);
		/* -------------------- */

		

	}
    
    function admin_editor_options_page_html() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-view.php';
    }
    
}
?>