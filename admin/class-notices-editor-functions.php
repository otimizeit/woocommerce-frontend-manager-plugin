<?php

class Admin_Panel_Notices_Editor_Functions {

    static function notices_options() {
        
        $options = get_option( 'admin_panel_notices_editor_option' );
        
        printf( '<ul><li><input type="checkbox" id="hide_notices_option" name="admin_panel_notices_editor_option[hide_notices_option]" value="1" %1$s/><label for="hide_notices_option">%2$s</label></li></ul>',checked( 1, isset($options['hide_notices_option']), false), __( 'Do you want to hide all notices from shop manager panel?', 'admin-panel-editor' ) );
       
    }


    static function admin_panel_notices_editor_section( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'In this section it\'s possible to set notices options.', 'admin-panel-editor' ); ?></p>
		<?php
        
    }

}
?>