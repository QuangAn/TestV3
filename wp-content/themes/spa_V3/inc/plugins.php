<?php
function quangan_plugin_activation() {
 
        // Khai bao plugin can cai dat
        $plugins = array(
                array(
                        'name' => 'Redux Framework',
                        'slug' => 'redux-framework',
                        'required' => true
                ),
				array(
                        'name' => 'Contact form 7',
                        'slug' => 'contact-form-7',
                        'required' => true
                )
        );
 

        $configs = array(
                'menu' => 'tp_plugin_install',
                'has_notice' => true,
                'dismissable' => false,
                'is_automatic' => true
        );
        tgmpa( $plugins, $configs );
 
}
add_action('tgmpa_register', 'quangan_plugin_activation');
