<?php

class Admin_Panel_Users_Selector_Functions {

    static function users_options() {

        $users = get_users();
        $options = get_option( 'admin_panel_users_selector_option' );

        echo '<ul>';
        foreach($users as $user) {

            printf('<li><input type="checkbox" id="%1$s" name="admin_panel_users_selector_option[%1$s]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', $user->user_login, checked( 1, isset($options[$user->user_login]), false));
            
        }
        echo '</ul>';
    }


    static function admin_panel_users_selector_section( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'In this section it\'s possible to set notices options.', 'admin-panel-editor' ); ?></p>
		<?php
        
    }

}
?>