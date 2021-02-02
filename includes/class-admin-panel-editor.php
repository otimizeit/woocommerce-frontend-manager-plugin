<?php
class Admin_Panel_Editor {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
		if ( defined( 'ADMIN_PANEL_EDITOR_VERSION' ) ) {
			$this->version = ADMIN_PANEL_EDITOR_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'admin-panel-editor';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();

    }
    
    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin-panel-editor-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-menu-editor-functions.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-notices-editor-functions.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-colors-editor-functions.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-shop-manager-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-admin-panel-editor-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-admin-panel-editor-i18n.php';

        $this->loader = new Admin_Panel_Editor_Loader();
    }

    private function set_locale() {

		$plugin_i18n = new Admin_Panel_Editor_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    private function define_admin_hooks() {
        /*
        $users_roles = wp_roles();
        
        foreach( $users_roles->roles as $function => $capabilities ) {
            print_r( $function );
        }
        */
        
        $plugin_admin = new Admin_Panel_Editor_Admin( $this->get_plugin_name(), $this->get_version() );
        $plugin_shop_manager_admin = new Shop_Manager_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'options_page' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'settings_init');

        $this->loader->add_action( 'admin_head', $plugin_shop_manager_admin, 'is_shop_manager' );
        
    }

    public function run() {
		$this->loader->run();
    }
    
    public function get_plugin_name() {
		return $this->plugin_name;
    }
    
    public function get_loader() {
		return $this->loader;
    }
    
    public function get_version() {
		return $this->version;
	}
}
?>