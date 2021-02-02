<?php
class Shop_Manager_Admin{
    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    }

    function is_shop_manager() {
        
        $user = wp_get_current_user();

        if( in_array( 'shop_manager', (array) $user->roles ) ) {
            $this->shop_manager_menu_settings();
            $this->shop_manager_notices_settings();
        }
    }

    function shop_manager_menu_settings() {

        global $menu;
        $user = wp_get_current_user();
        $options = get_option( 'admin_panel_menu_editor_option' );
        
        foreach ( $menu as $mkey => $m ) {
            if( !array_key_exists( $m[0], $options) ) {
                unset( $menu[$mkey] ); 
            }
        }
        remove_menu_page( 'woocommerce' );
        add_menu_page( __( 'WooCommerce', 'woocommerce' ), 'Loja', 'edit_others_shop_orders', 'woocommerce', null, 'dashicons-cart', '55.5' );
    
    }

    function shop_manager_notices_settings() {

        $options = (array) get_option( 'admin_panel_notices_editor_option' );
        
        if( array_key_exists( 'hide_notices_option', $options) ) {
            remove_all_actions( 'admin_notices' );
        }

    }
}
?>