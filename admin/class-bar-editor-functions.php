<?php

class Admin_Panel_Bar_Editor_Functions {

    static function bar_options() {
        
        $options = get_option( 'admin_panel_bar_editor_option' );

      // print_r($options);
        echo '<ul>';
        $options['user-actions'] = 1;
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[wp-logo]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'Wordpress Logo', 'admin-panel-editor' ), checked( 1, isset($options['wp-logo']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[new-content]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'New Content', 'admin-panel-editor' ), checked( 1, isset($options['new-content']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[comments]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'Comments', 'admin-panel-editor' ), checked( 1, isset($options['comments']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[site-name]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'Site Name', 'admin-panel-editor' ), checked( 1, isset($options['site-name']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[top-secondary]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'My account', 'admin-panel-editor' ), checked( 1, isset($options['top-secondary']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[edit-profile]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'Edit Profile', 'admin-panel-editor' ), checked( 1, isset($options['edit-profile']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[logout]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'Logout', 'admin-panel-editor' ), checked( 1, isset($options['logout']), false));
        printf('<li><input type="checkbox" id="%1$s" name="admin_panel_bar_editor_option[user-actions]" value="1" %2$s/><label for="%1$s">%1$s</label></li>', __( 'User Actions', 'admin-panel-editor' ), checked( 1, isset($options['user-actions']), false));
        echo '</ul>';

    }

    static function admin_panel_bar_editor_section( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'In this section it\'s possible to set admin bar options.', 'admin-panel-editor' ); ?></p>
		<?php
        
    }

}
?>