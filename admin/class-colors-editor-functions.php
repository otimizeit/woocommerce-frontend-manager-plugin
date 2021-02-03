<?php

class Admin_Panel_Colors_Editor_Functions {

    static function colors_options() {
        
        $options = get_option( 'admin_panel_colors_editor_option' );
        
        echo '<ul>';
        printf( '<li><label for="menu_text">%2$s</label><input type="text" id="menu_text" name="admin_panel_colors_editor_option[menu_text]" value="%1$s"/></li>', isset( $options[ 'menu_text' ] ) ? $options[ 'menu_text' ] : '' , __( 'Menu Text', 'admin-panel-editor' ) );
        printf( '<li><label for="menu_background">%2$s</label><input type="text" id="menu_background" name="admin_panel_colors_editor_option[menu_background]" value="%1$s"/></li>', isset( $options[ 'menu_background' ] ) ? $options[ 'menu_background' ] : '' , __( 'Menu Background', 'admin-panel-editor' ) );
        printf( '<li><label for="highlight">%2$s</label><input type="text" id="highlight" name="admin_panel_colors_editor_option[highlight]" value="%1$s"/></li>', isset( $options[ 'highlight' ] ) ? $options[ 'highlight' ] : '' , __( 'Highlight', 'admin-panel-editor' ) );
        printf( '<li><label for="notification">%2$s</label><input type="text" id="notification" name="admin_panel_colors_editor_option[notification]" value="%1$s"/></li>', isset( $options[ 'notification' ] ) ? $options[ 'notification' ] : '' , __( 'Notification', 'admin-panel-editor' ) );
        printf( '<li><label for="background">%2$s</label><input type="text" id="background" name="admin_panel_colors_editor_option[background]" value="%1$s"/></li>', isset( $options[ 'background' ] ) ? $options[ 'background' ] : '' , __( 'Background', 'admin-panel-editor' ) );
        printf( '<li><label for="background">%2$s</label><input type="text" id="links" name="admin_panel_colors_editor_option[links]" value="%1$s"/></li>', isset( $options[ 'links' ] ) ? $options[ 'links' ] : '' , __( 'Links', 'admin-panel-editor' ) );
        printf( '<li><label for="background">%2$s</label><input type="text" id="buttons" name="admin_panel_colors_editor_option[buttons]" value="%1$s"/></li>', isset( $options[ 'buttons' ] ) ? $options[ 'buttons' ] : '' , __( 'Buttons', 'admin-panel-editor' ) );
        printf( '<li><label for="background">%2$s</label><input type="text" id="forms_inputs" name="admin_panel_colors_editor_option[forms_inputs]" value="%1$s"/></li>', isset( $options[ 'forms_inputs' ] ) ? $options[ 'forms_inputs' ] : '' , __( 'Forms/Inputs', 'admin-panel-editor' ) );
        echo '</ul>';
    }


    static function admin_panel_colors_editor_section( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'In this section it\'s possible to set notices options.', 'admin-panel-editor' ); ?></p>
		<?php
        
    }

}
?>