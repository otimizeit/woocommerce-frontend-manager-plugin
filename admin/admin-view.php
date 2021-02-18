<?php

// check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 	die('Sem permissões');
 }
 
 // add error/update messages
 
 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 	// add settings saved message with the class of "updated"
 	add_settings_error( 'admin_editor_messages', ',admin_editor_message', __( 'Settings Saved', 'admin-editor' ), 'updated' );
 }
 
 // show error/update messages
 settings_errors( 'admin_editor_messages' );
 
 ?>
 <div class="wrap">
	 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	 
	 <form action="options.php" method="post">
		 <?php
		 // output security fields for the registered setting "wporg"
		 settings_fields( 'admin_editor' );
		 // output setting sections and their fields
		 // (sections are registered for "wporg", each field is registered to a specific section)
		 do_settings_sections( 'admin_editor' );
		 // output save settings button
		 submit_button( 'Save Settings' );
		 ?>
	 </form>

	 <?php 
	 $options = get_option( 'admin_editor_options' );

	 if( isset( $options['admin_editor_field_pill'] ) ) {
	 	echo 'My Plugin Option: ' . $options['admin_editor_field_pill'];
	 }

	 // print_r( $options ); ?>

	 

 </div>
 <?php