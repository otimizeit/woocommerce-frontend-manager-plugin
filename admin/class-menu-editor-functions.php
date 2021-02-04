<?php

class Admin_Panel_Menu_Editor_Functions {

    static function menu_options() {
        global $menu;
        $adminMenu = $menu;
        $menuTitles = array();
        $options = get_option( 'admin_panel_menu_editor_option' );
        $shop_manager_capabilities = get_role('shop_manager')->capabilities;

        foreach ( $adminMenu as $mkey => $m) {
            if( array_key_exists( $m[1], $shop_manager_capabilities ) ) {
                $menuTitle = $m[0];
                if ( !strlen( $menuTitle ) ) {
                    $menuTitle = 'Divisor com prioridade '. $mkey;
                }
                array_push( $menuTitles, $menuTitle );
            }
        }


		echo '<ul>';
	    foreach( $menuTitles as $menuOption ) {
		
		    $menuOption = preg_replace('#<span.*>$#i','', $menuOption);
		    printf('<li><input type="checkbox" id="%1$s" name="admin_panel_menu_editor_option[%1$s]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', $menuOption, checked( 1, isset($options[$menuOption]), false));
		
	    }

	    echo '</ul>';
		
    }


    static function admin_panel_menu_editor_section( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'In this section it\'s possible choose the menu options that will appear for the roles of selected users.', 'admin-panel-editor' ); ?></p>
		<?php
        
    }

}
?>