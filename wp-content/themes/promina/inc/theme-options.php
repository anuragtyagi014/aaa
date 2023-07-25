<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'promina' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[ $key ] = sprintf( esc_html__( 'Form %s', 'promina' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = promina_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('Elementor_Theme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'promina'),
    'page_title'           => esc_html__('Theme Options', 'promina'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('Elementor_Theme_Core') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => get_template_directory() . '/inc/templates/redux/'
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'promina'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'promina'),
            'default' => ''
        ),
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'promina'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'promina'),
            'default'  => false
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'promina'),
            'description' => 'no minimize , generate css over time...',
            'default'  => false
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'promina'),
    'icon'   => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'promina'),
            'subtitle' => esc_html__('Select a layout for header.', 'promina'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'promina'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'promina'),
            'default'  => false
        ),
        array(
            'id'       => 'search_on',
            'type'     => 'switch',
            'title'    => esc_html__('Search Icon', 'promina'),
            'default'  => false
        ),
        array(
            'id' => 'h_phone',
            'type' => 'text',
            'title' => esc_html__('Phone Number', 'promina'),
            'default' => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Top Bar', 'promina'),
    'icon'       => 'el el-website',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'phone_label',
            'type'    => 'text',
            'title'   => esc_html__('Phone Label', 'promina'),
            'default' => '',
            'force_output' => true
        ),
        array(
            'id'      => 'phone_number',
            'type'    => 'text',
            'title'   => esc_html__('Phone Number', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'email_label',
            'type'    => 'text',
            'title'   => esc_html__('Email Label', 'promina'),
            'default' => '',
            'force_output' => true
        ),
        array(
            'id'      => 'email_address',
            'type'    => 'text',
            'title'   => esc_html__('Email Address', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'time_label',
            'type'    => 'text',
            'title'   => esc_html__('Time Label', 'promina'),
            'default' => '',
            'force_output' => true
        ),
        array(
            'id'      => 'time',
            'type'    => 'text',
            'title'   => esc_html__('Time', 'promina'),
            'default' => '',
        ),
        array(
            'title' => esc_html__('Social', 'promina'),
            'type'  => 'section',
            'id' => 'header_social',
            'indent' => true,
        ),

        array(
            'id'      => 'h_social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'promina'),
            'default' => '#',
        ),
        array(
            'id'      => 'h_social_inkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'promina'),
            'default' => '#',
        ),
        array(
            'id'      => 'h_social_google_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'promina'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'promina'),
            'default' => '#',
        ),
        array(
            'title' => esc_html__('Navigation', 'promina'),
            'type'  => 'section',
            'id' => 'header_nav',
            'indent' => true,
        ),
        array(
            'id' => 'top_bar_text1',
            'type' => 'text',
            'title' => esc_html__('Link Text 1', 'promina'),
            'default' => '',
            'desc' => 'Ex: New & Media'
        ),
        array(
            'id' => 'top_bar_link_type1',
            'type' => 'button_set',
            'title' => esc_html__('Link 1', 'promina'),
            'options' => array(
                'page_link' => esc_html__('Page Link', 'promina'),
                'custom_link' => esc_html__('Custom Link', 'promina'),
            ),
            'default' => 'page_link',
        ),
        array(
            'id' => 'top_bar_page_link1',
            'type' => 'select',
            'title' => esc_html__('Page Link 1', 'promina'),
            'data' => 'page',
            'args' => array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            ),
            'required' => array(0 => 'top_bar_link_type1', 1 => 'equals', 2 => 'page_link'),
            'force_output' => true
        ),
        array(
            'id' => 'top_bar_custom_link1',
            'type' => 'text',
            'title' => esc_html__('Custom Link 1', 'promina'),
            'default' => '',
            'required' => array(0 => 'top_bar_link_type1', 1 => 'equals', 2 => 'custom_link'),
            'force_output' => true
        ),

        array(
            'id' => 'top_bar_text2',
            'type' => 'text',
            'title' => esc_html__('Link Text 2', 'promina'),
            'default' => '',
            'desc' => 'Ex: Careers'
        ),
        array(
            'id' => 'top_bar_link_type2',
            'type' => 'button_set',
            'title' => esc_html__('Link 2', 'promina'),
            'options' => array(
                'page_link' => esc_html__('Page Link', 'promina'),
                'custom_link' => esc_html__('Custom Link', 'promina'),
            ),
            'default' => 'page_link',
        ),
        array(
            'id' => 'top_bar_page_link2',
            'type' => 'select',
            'title' => esc_html__('Page Link 2', 'promina'),
            'data' => 'page',
            'args' => array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            ),
            'required' => array(0 => 'top_bar_link_type2', 1 => 'equals', 2 => 'page_link'),
            'force_output' => true
        ),
        array(
            'id' => 'top_bar_custom_link2',
            'type' => 'text',
            'title' => esc_html__('Custom Link 2', 'promina'),
            'default' => '',
            'required' => array(0 => 'top_bar_link_type2', 1 => 'equals', 2 => 'custom_link'),
            'force_output' => true
        ),
        array(
            'id' => 'top_bar_text3',
            'type' => 'text',
            'title' => esc_html__('Link Text 3', 'promina'),
            'default' => '',
            'desc' => 'Ex: Contacts'
        ),
        array(
            'id' => 'top_bar_link_type3',
            'type' => 'button_set',
            'title' => esc_html__('Link 3', 'promina'),
            'options' => array(
                'page_link' => esc_html__('Page Link', 'promina'),
                'custom_link' => esc_html__('Custom Link', 'promina'),
            ),
            'default' => 'page_link',
        ),
        array(
            'id' => 'top_bar_page_link3',
            'type' => 'select',
            'title' => esc_html__('Page Link 3', 'promina'),
            'data' => 'page',
            'args' => array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            ),
            'required' => array(0 => 'top_bar_link_type3', 1 => 'equals', 2 => 'page_link'),
            'force_output' => true
        ),
        array(
            'id' => 'top_bar_custom_link3',
            'type' => 'text',
            'title' => esc_html__('Custom Link 3', 'promina'),
            'default' => '',
            'required' => array(0 => 'top_bar_link_type3', 1 => 'equals', 2 => 'custom_link'),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'promina'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'promina'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'promina'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo_mobile',
            'type'     => 'media',
            'title'    => esc_html__('Logo Tablet & Mobile', 'promina'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height', 'promina'),
            'subtitle' => esc_html__('Enter number.', 'promina'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height Tablet & Mobile', 'promina'),
            'subtitle' => esc_html__('Enter number.', 'promina'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'promina'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => true,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('.primary-menu > li > a, body .primary-menu .sub-menu li a'),
            'units'       => 'px',
        ),
        array(
            'id'       => 'menu_font_size',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'promina'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_text_transform',
            'type'     => 'select',
            'title'    => esc_html__('Text Transform', 'promina'),
            'options'  => array(
                '' => esc_html__('Default', 'promina'),
                'uppercase' => esc_html__('Uppercase', 'promina'),
                'capitalize'  => esc_html__('Capitalize', 'promina'),
                'lowercase'  => esc_html__('Lowercase', 'promina'),
                'initial'  => esc_html__('Initial', 'promina'),
                'inherit'  => esc_html__('Inherit', 'promina'),
                'none'  => esc_html__('None', 'promina'),
            ),
            'default'  => ''
        ),
        array(
            'title' => esc_html__('Main Menu', 'promina'),
            'type'  => 'section',
            'id' => 'main_menu',
            'indent' => true
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Color', 'promina'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Sticky Menu', 'promina'),
            'type'  => 'section',
            'id' => 'sticky_menu',
            'indent' => true
        ),
        array(
            'id'      => 'sticky_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Color', 'promina'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Button Navigation', 'promina'),
            'type'  => 'section',
            'id' => 'button_navigation',
            'indent' => true
        ),
        array(
            'id'       => 'h_btn_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Show/Hide Button', 'promina'),
            'options'  => array(
                'show'  => esc_html__('Show', 'promina'),
                'hide'  => esc_html__('Hide', 'promina')
            ),
            'default'  => 'hide',
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'promina'),
            'default' => '',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'promina'),
            'options'  => array(
                'page'  => esc_html__('Page', 'promina'),
                'custom'  => esc_html__('Custom', 'promina')
            ),
            'default'  => 'page',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'promina' ),
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'promina'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'promina'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'promina'),
                '_blank'  => esc_html__('Blank', 'promina')
            ),
            'default'  => '_self',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'promina'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(

        array(
            'id'           => 'pagetitle',
            'type'         => 'button_set',
            'title'        => esc_html__( 'Page Title', 'promina' ),
            'options'      => array(
                'show'  => esc_html__( 'Show', 'promina' ),
                'hide'  => esc_html__( 'Hide', 'promina' ),
            ),
            'default'      => 'show',
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'promina'),
            'subtitle' => esc_html__('Page title background.', 'promina'),
            'output'   => array('body #pagetitle'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
            'background-image' => false,
            'background-position' => false,
            'background-size' => false,
            'background-attachment' => false,
            'background-repeat' => false,
            'transparent' => false,
        ),

        array(
            'id'       => 'ptitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'promina'),
            'subtitle' => esc_html__('Page title color.', 'promina'),
            'output'   => array('body #pagetitle h1.page-title', 'body #pagetitle .page-title-inner .cms-breadcrumb'),
            'default'  => '',
            'transparent' => false,
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Breadcrumb', 'promina'),
            'type' => 'section',
            'id' => 'pt_breadcrumb',
            'indent' => true
        ),
        array(
            'id' => 'breadcrumb_on',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'promina'),
            'default' => false
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'promina'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'promina'),
            'subtitle' => esc_html__('Content background color.', 'promina'),
            'output' => array('background-color' => 'body')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'promina'),
            'desc'           => esc_html__('Default: Top-90px, Bottom-90px', 'promina'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'promina'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'promina'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Archive', 'promina'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'promina'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'promina'),
            'options'  => array(
                'left'  => esc_html__('Left', 'promina'),
                'right' => esc_html__('Right', 'promina'),
                'none'  => esc_html__('Disabled', 'promina')
            ),
            'default'  => 'left'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'promina'),
            'subtitle' => esc_html__('Show author name on each post.', 'promina'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'promina'),
            'subtitle' => esc_html__('Show date posted on each post.', 'promina'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'promina'),
            'subtitle' => esc_html__('Show category names on each post.', 'promina'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'promina'),
            'subtitle' => esc_html__('Show comments count on each post.', 'promina'),
            'type'     => 'switch',
            'default'  => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'promina'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'post_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Content Background Color', 'promina'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'single_post_layout', 1 => 'equals', 2 => 'real-estate' ),
            'force_output' => true
        ),
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'promina'),
            'subtitle' => esc_html__('Select a sidebar position', 'promina'),
            'options'  => array(
                'left'  => esc_html__('Left', 'promina'),
                'right' => esc_html__('Right', 'promina'),
                'none'  => esc_html__('Disabled', 'promina')
            ),
            'default'  => 'left'
        ),
        array(
            'id' => 'post_title_on',
            'title' => esc_html__('Title', 'promina'),
            'subtitle' => esc_html__('Show title on single post.', 'promina'),
            'type' => 'switch',
            'default' => false
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'promina'),
            'subtitle' => esc_html__('Show author name on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_author_info_on',
            'title'    => esc_html__('Author Info', 'promina'),
            'subtitle' => esc_html__('Show author info name on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'promina'),
            'subtitle' => esc_html__('Show date on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'promina'),
            'subtitle' => esc_html__('Show category names on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'promina'),
            'subtitle' => esc_html__('Show tag names on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'promina'),
            'subtitle' => esc_html__('Show comments count on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'promina'),
            'subtitle' => esc_html__('Show social share on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_navigation_on',
            'title'    => esc_html__('Navigation', 'promina'),
            'subtitle' => esc_html__('Show navigation on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'promina'),
            'subtitle' => esc_html__('Show comments form on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'promina'),
            'subtitle' => esc_html__('Show feature image on single post.', 'promina'),
            'type'     => 'switch',
            'default'  => true
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'promina'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'promina'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'promina'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'promina'),
                    'right' => esc_html__('Right', 'promina'),
                    'none'  => esc_html__('Disabled', 'promina')
                ),
                'default'  => 'left'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'promina'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'promina'),
                'default' => 8,
                'min'  => 4,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'promina'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_bg',
            'type'     => 'background',
            'title'    => esc_html__('Footer Background Color', 'promina'),
            'subtitle' => esc_html__('Footer background color.', 'promina'),
            'output'   => array('body .site-footer'),
            'background-image' => false,
            'background-position' => false,
            'background-size' => false,
            'background-attachment' => false,
            'background-repeat' => false,
            'transparent' => false,
        ),
        array(
            'title' => esc_html__('Footer Top', 'promina'),
            'type'  => 'section',
            'id' => 'footer_top',
            'indent' => true,
        ),
        array(
            'id'       => 'footer_top_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Columns', 'promina'),
            'options'  => array(
                '2'  => esc_html__('2 Column', 'promina'),
                '3'  => esc_html__('3 Column', 'promina'),
                '4'  => esc_html__('4 Column', 'promina'),
            ),
            'default'  => '4',
        ),
        array(
            'id'    => 'footer_top_color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'promina'),
            'output'   => array('.top-footer')
        ),
        array(
            'id'      => 'footer_top_link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Links Color', 'promina'),
            'regular' => true,
            'hover'   => true,
            'active'  => true,
            'visited' => true,
            'output'  => array('.top-footer a'),
        ),

        array(
            'title' => esc_html__('Footer Bottom', 'promina'),
            'type'  => 'section',
            'id' => 'footer_bottom',
            'indent' => true,
        ),

        array(
            'id'=>'footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'promina'),
            'validate' => 'html_custom',
            'default' => '',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            )
        ),
    )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'promina'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'promina'),
            'transparent' => false,
            'default'     => '#fe5a0e'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'promina'),
            'transparent' => false,
            'default'     => '#1b1a1a'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'promina'),
            'default' => array(
                'regular' => '#fe5a0e',
                'hover'   => '#fe5a0e',
                'active'  => '#fe5a0e'
            ),
            'output'  => array('a')
        )
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::getOption($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'promina'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'promina'),
            'options'  => array(
                'Roboto'  => esc_html__('Default', 'promina'),
                'Google-Font'  => esc_html__('Google Font', 'promina'),
            ),
            'default'  => 'Roboto',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'promina'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'promina'),
            'options'  => array(
                'Barlow'  => esc_html__('Default', 'promina'),
                'Google-Font'  => esc_html__('Google Font', 'promina'),
            ),
            'default'  => 'Barlow',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'promina'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'promina'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'promina'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'promina'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'promina'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'promina'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'promina'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'promina'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'promina'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'promina'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'promina'),
            'validate' => 'no_html'
        )
    )
));

/* Google Maps /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Google Maps', 'promina'),
    'icon'   => 'el el-map-marker',
    'fields' => array(
        array(
            'id'       => 'gm_api_key',
            'type'     => 'text',
            'title'    => esc_html__('API Key', 'promina'),
            'default' => 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM',
            'desc' => esc_html__('Register a Google Maps Api key then put it in here.', 'promina')
        ),
    ),
));

/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'promina'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(
        array(
            'id'       => 'content_404_page',
            'type'     => 'textarea',
            'title'    => esc_html__('Content', 'promina'),
            'default' => '',
        ),
        array(
            'id'       => 'btn_text_404_page',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'promina'),
            'default' => '',
            'desc' => esc_html__('Default: Take me go back home', 'promina')
        ),
        array(
            'id'       => 'bg_404_page',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'promina'),
            'output'   => array('body.error404 .error-404'),
            'background-color' => false
        ),
    ),
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'promina'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'promina'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'promina'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'promina'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'promina'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'promina'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'promina')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'promina'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'promina'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));