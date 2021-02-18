<?php

class Admin_Panel_Editor_i18n {

    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            'admin-panel-editor',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

    }

}
?>