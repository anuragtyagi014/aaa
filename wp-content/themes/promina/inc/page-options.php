<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CMS_Post_Metabox $metabox
 */

add_action( 'cms_post_metabox_register', 'promina_page_options_register' );

function promina_page_options_register( $metabox ) {

	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'promina' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Product Settings', 'promina' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => promina_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'promina' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_audio' ) ) {
		$metabox->set_args( 'cms_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'promina' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_link' ) ) {
		$metabox->set_args( 'cms_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'promina' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_quote' ) ) {
		$metabox->set_args( 'cms_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'promina' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_video' ) ) {
		$metabox->set_args( 'cms_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'promina' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_gallery' ) ) {
		$metabox->set_args( 'cms_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'promina' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/* Extra Post Type */

	if ( ! $metabox->isset_args( 'project' ) ) {
		$metabox->set_args( 'project', array(
			'opt_name'            => 'project_option',
			'display_name'        => esc_html__( 'Project Settings', 'promina' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'service' ) ) {
		$metabox->set_args( 'service', array(
			'opt_name'            => 'service_option',
			'display_name'        => esc_html__( 'Service Settings', 'promina' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'Post Settings', 'promina' ),
		'icon'   => 'el el-refresh',
		'fields' => array(
			array(
				'id'             => 'post_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-post #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'promina' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'promina' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'promina' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'promina' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'promina' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'promina'),
	                'right' => esc_html__('Right', 'promina'),
	                'none'  => esc_html__('Disabled', 'promina')
				),
				'default'      => 'left',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */
	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'promina' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'promina' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'promina' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'promina' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'promina' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
					'3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
                    '4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
				),
				'default'      => promina_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'promina' ),
		'icon'   => 'el el-indent-left',
		'fields' => array(
			array(
				'id'           => 'custom_pagetitle',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Page Title', 'promina' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'promina' ),
					'show'  => esc_html__( 'Custom', 'promina' ),
					'hide'  => esc_html__( 'Hide', 'promina' ),
				),
				'default'      => 'themeoption',
			),

			array(
				'id'           => 'custom_title',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Title', 'promina' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'promina' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'promina' ),
		'desc'   => esc_html__( 'Settings for content area.', 'promina' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'promina' ),
				'subtitle' => esc_html__( 'Content background color.', 'promina' ),
				'output'   => array( 'background-color' => 'body' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'promina' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'promina' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'promina' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'promina' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'promina' ),
					'right' => esc_html__( 'Right', 'promina' ),
				),
				'default'      => 'left',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'product', array(
		'title'  => esc_html__( 'Header', 'promina' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'promina' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'promina' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'promina' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'promina' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
					'3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
					'4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
				),
				'default'      => promina_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
		)
	) );


	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'cms_pf_video', array(
		'title'  => esc_html__( 'Video', 'promina' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'promina' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'promina' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'promina' ),
				'desc'  => esc_html__( 'Upload video file', 'promina' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'promina' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'promina' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'promina' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'promina' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'promina' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'promina' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'promina' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'promina' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'promina' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'promina' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_link', array(
		'title'  => esc_html__( 'Link', 'promina' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'promina' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'promina' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'promina' )
			)
		)
	) );

	/**
	 * Config Project meta options
	 *
	 */
	$metabox->add_section( 'project', array(
		'title'  => esc_html__( 'General', 'promina' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
            array(
                'id' => 'project_icon',
                'type' => 'media',
                'title' => esc_html__('Project Icon Image', 'promina'),
            ),
			array(
				'id'             => 'project_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-project #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'promina' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'promina' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'promina' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );
	$metabox->add_section( 'project', array(
		'title'  => esc_html__( 'Header', 'promina' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'promina' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'promina' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'promina' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'promina' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
				),
				'default'      => promina_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
		)
	) );
	$metabox->add_section( 'project', array(
		'title'  => esc_html__( 'Page Title', 'promina' ),
		'icon'   => 'el el-indent-left',
		'fields' => array(
			array(
				'id'           => 'custom_pagetitle',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Page Title', 'promina' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'promina' ),
					'show'  => esc_html__( 'Custom', 'promina' ),
					'hide'  => esc_html__( 'Hide', 'promina' ),
				),
				'default'      => 'themeoption',
			),

			array(
				'id'           => 'custom_title',
				'type'         => 'text',
				'title'        => esc_html__( 'Title', 'promina' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'promina' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
		)
	) );

	/**
	 * Config service meta options
	 *
	 */
	$metabox->add_section( 'service', array(
		'title'  => esc_html__( 'General', 'promina' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'service_icon',
	            'type'     => 'media',
	            'title'    => esc_html__('Icon Image', 'promina'),
	            'default' => ''
	        ),
			array(
				'id'             => 'project_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-service #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'promina' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'promina' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'promina' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );
	$metabox->add_section( 'service', array(
		'title'  => esc_html__( 'Header', 'promina' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'promina' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'promina' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'promina' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'promina' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
				),
				'default'      => promina_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
		)
	) );
	$metabox->add_section( 'service', array(
		'title'  => esc_html__( 'Page Title', 'promina' ),
		'icon'   => 'el el-indent-left',
		'fields' => array(
			array(
				'id'           => 'custom_pagetitle',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Page Title', 'promina' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'promina' ),
					'show'  => esc_html__( 'Custom', 'promina' ),
					'hide'  => esc_html__( 'Hide', 'promina' ),
				),
				'default'      => 'themeoption',
			),
		)
	) );

}

function promina_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( promina_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}