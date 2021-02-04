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
            $this->shop_manager_colors();
            add_action( 'wp_before_admin_bar_render', array($this, 'shop_manager_admin_bar'), 0 );
            add_filter( 'screen_options_show_screen', array( $this, 'remove_shop_manager_screen_options' ) );
            add_action( 'admin_head', array( $this, 'shop_manager_screen_settings' ) );
            add_action( 'add_meta_boxes', array( $this, 'sort_metaboxes_edit_product' ), 99 );
            add_filter( 'get_user_option_screen_layout_product', array( $this, 'shop_manager_screen_layout_product' ) );
       
        }
    }

    function shop_manager_screen_layout_product() {
        $user = wp_get_current_user();
        if ( in_array( 'shop_manager', (array) $user->roles ) ) { 
            return 1;
        }
    }

    function sort_metaboxes_edit_product() {
        $user = wp_get_current_user();
        if ( in_array( 'shop_manager', (array) $user->roles ) ) { 
            remove_meta_box( 'postimagediv','product','side' );
            remove_meta_box( 'product_catdiv', 'product', 'side' );
            remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
            remove_meta_box( 'woocommerce-product-images', __( 'Product gallery', 'woocommerce' ), 'WC_Meta_Box_Product_Images::output', 'product', 'side', 'low' );
            
            
            add_meta_box( 
                'postimagediv',
                'Imagem destaque',
                'post_thumbnail_meta_box',
                'product',
                'after_title',
                'high' 
            );
    
            add_meta_box( 
                'woocommerce-product-images', 
                __( 'Product gallery', 'woocommerce' ), 
                'WC_Meta_Box_Product_Images::output', 
                'product', 
                'after_title', 
                'high' 
            );
    
            add_meta_box( 
                'tagsdiv-product_tag', 
                'Tags de produto', 
                'post_tags_meta_box', 
                'product', 
                'after_title', 
                'high' 
            );
    
            add_meta_box(
                'product_catdiv',
                'Categorias de produto',
                'post_categories_meta_box',
                'product',
                'after_title',
                'high'
            );

            add_meta_box( 
                'submitdiv', 
                'Publicar', 
                'post_submit_meta_box', 
                'product', 
                'normal', 
                'low' 
            );
            
        }
    }

    function shop_manager_screen_settings() {
        get_current_screen()->remove_help_tabs();
    }

    function remove_shop_manager_screen_options() { 
            return false;
    }

    function shop_manager_admin_bar() {

        global $wp_admin_bar;
        $options = (array) get_option( 'admin_panel_bar_editor_option' );
        $admin_bar_nodes = $wp_admin_bar->get_nodes();
        
        foreach( $admin_bar_nodes as $node_key => $node ) {

            if( !array_key_exists( $node_key, $options ) && !array_key_exists( (string)$node->parent, $options ) ) {
                $wp_admin_bar->remove_menu( $node_key );
            }
                
        }
        
    }

    function shop_manager_menu_settings() {

        global $menu;
        $menu = (array) $menu;
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

    function shop_manager_colors() {

        $options = get_option( 'admin_panel_colors_editor_option' );
        
        wp_register_style( 'custom_style_admin', 'http://localhost/backupUpBShop/wp-content/plugins/otm_admin_editor/admin/shop-manager-css.php',);
        wp_enqueue_style( 'custom_style_admin' );
    }

}
?>