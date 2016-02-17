<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "Kit_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'Kit_options',
        'use_cdn' => TRUE,
        'display_name' => 'KIT-Instagram Settings',
        'display_version' => FALSE,
        'page_slug' => 'kit-opt',
        'page_title' => 'KIT-Insta Settings',
        'update_notice' => FALSE,
        'intro_text' => 'Setting page for KIT Instagram',
        'footer_text' => 'This plugin is built by: Kiperweb',
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'KIT-Instagram options',
        'menu_icon' => 'http://plugins.yukiichiban.com/icons/icon.png',
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => '5',
        'customizer' => FALSE,
        'default_mark' => '*',
        'class' => 'kit-redux-container',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => FALSE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Options for KIT Instagram', 'redux-framework-demo' ),
        'id'     => 'kit-intsta-options',
        'desc'   => __( 'Setting page for KIT Instagram.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
        'fields' => array(
			array(
			'id'       => 'insta-opt',
			'type'     => 'switch', 
			'title'    => __('Switch On', 'redux-framework-demo'),
			'subtitle' => __('Look, it\'s on!', 'redux-framework-demo'),
			'default'  => true,
            ),
		array(
			'id'       => 'opt_select',
			'type'     => 'select',
			'title'    => __('Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options'  => array(
					'2' => 'instagram user',
					'3' => 'hashtag',
			),
			'default'  => '2',
		),

            array(
                'id'       => 'opt-hashtag',
                'type'     => 'text',
                'title'    => __( 'HashTag', 'redux-framework-demo' ),
                'desc'     => __( 'The hashtag without the "#".', 'redux-framework-demo' ),
                'subtitle' => __( 'load all picture with hashtag.', 'redux-framework-demo' ),
            )
        )

        
    ) );


    /*
     * <--- END SECTIONS
     */
?>