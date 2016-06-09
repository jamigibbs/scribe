<?php
/**
 * Scribe Theme Customizer.
 *
 * @package scribe
 */

/**
 * Defind the settings, sections, and controls for the customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scribe_register_theme_customizer( $wp_customize ) {

	/**
	 * Add postMessage support for site title and description
	 */
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Sitewide Link Color
	 */
	$wp_customize->add_setting(
		'scribe_link_color',
		array(
			'default'		=> '#262626',
			'transport'	=> 'postMessage',
			'sanitize_callback'	=> 'scribe_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'scribe_link_color',
			array(
				'label'			=> __( 'Links Sitewide', 'scribe' ),
				'section'		=> 'colors',
				'settings'	=> 'scribe_link_color'
			)
		)
	);

	/**
	 * Link Hover Color
	 */
	$wp_customize->add_setting(
		'scribe_link_hover_color',
		array(
			'default' 	=> '#FF3300',
			'transport'	=> 'postMessage',
			'sanitize_callback'	=> 'scribe_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'scribe_link_hover_color',
			array(
					'label'			=> __('Links Hover Sitewide', 'scribe'),
					'section'		=> 'colors',
					'settings'	=> 'scribe_link_hover_color'
			)
		)
	);

	/**
	 * Navigation Link Color
	 */
	$wp_customize->add_setting(
		'scribe_nav_link_color',
		array(
			'default' 	=> '#ffffff',
			'transport'	=> 'postMessage',
			'sanitize_callback'	=> 'scribe_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'scribe_nav_link_color',
			array(
					'label'			=> __('Navigation Links', 'scribe'),
					'section'		=> 'colors',
					'settings'	=> 'scribe_nav_link_color'
			)
		)
	);

	/**
	 * Home & Blog Main Image
	 */
	$wp_customize->add_setting(
	'scribe_primary_image',
		array(
			'priority'					=> 50,
			'sanitize_callback'	=> 'scribe_sanitize_file_url'
		)
	);

	$wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'scribe_primary_image',
      array(
        'label' 		=> 'Home & Blog Background Image',
        'section' 	=> 'background_image',
        'settings' 	=> 'scribe_primary_image'
      )
    )
	);

	/**
	 * Home & Blog Header Image Overlay
	 */
	$wp_customize->add_setting(
    'scribe_primary_image_overlay',
    array(
      'default' => false,
			'sanitize_callback'	=>  'scribe_sanitize_checkbox'
    )
	);

	$wp_customize->add_control(
    'scribe_primary_image_overlay',
    array(
      'type' 			=>	'checkbox',
      'label' 		=>	'Remove Home &amp; Blog Image Overlay',
      'section' 	=>	'background_image'
    )
	);

	/**
	 * Home & Blog Header Image Background Attachment
	 */
	$wp_customize->add_setting(
    'scribe_primary_img_bg_attachment',
    array(
      'default' => 'fixed',
			'sanitize_callback'	=> 'scribe_sanitize_text'
    )
	);

	$wp_customize->add_control(
    'scribe_primary_img_bg_attachment',
    array(
      'type' 			=>	'radio',
      'label' 		=>	'Background Attachment',
      'section' 	=>	'background_image',
			'choices'		=>	array(
				'fixed'		=>	'Fixed',
				'scroll'	=>	'Scroll'
			)
    )
	);

	/**
	 * Pages & Posts Section
	 */
	$wp_customize->add_section(
		'scribe_pages_posts',
		array(
			'title'				=> 	'Pages &amp; Posts',
			'description'	=>	'Settings for inner pages and posts',
			'priority'		=> 	80
		)
	);

	/**
	 * Featured Image Overlay
	 */
	$wp_customize->add_setting(
    'scribe_featured_img_overlay',
    array(
      'default' => false,
			'sanitize_callback'	=>  'scribe_sanitize_checkbox'
    )
	);

	$wp_customize->add_control(
    'scribe_featured_img_overlay',
    array(
      'type' 			=>	'checkbox',
      'label' 		=>	'Remove Featured Image Overlay',
      'section' 	=>	'scribe_pages_posts'
    )
	);

	/**
	 * Page & Post Image Background Attachment
	 */
	$wp_customize->add_setting(
    'scribe_featured_img_bg_attachment',
    array(
      'default' => 'fixed',
			'sanitize_callback'	=> 'scribe_sanitize_text'
    )
	);

	$wp_customize->add_control(
    'scribe_featured_img_bg_attachment',
    array(
      'type' 			=>	'radio',
      'label' 		=>	'Background Attachment',
      'section' 	=>	'scribe_pages_posts',
			'choices'		=>	array(
				'fixed'		=>	'Fixed',
				'scroll'	=>	'Scroll'
			)
    )
	);

	/**
	 * Title Color
	 */
	$wp_customize->add_setting(
		'scribe_page_post_title_color',
		array(
			'default' 	=> '#ffffff',
			'sanitize_callback'	=> 'scribe_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'scribe_page_post_title_color',
			array(
				'label'			=> __('Title Color', 'scribe'),
				'section'		=> 'scribe_pages_posts',
				'settings'	=> 'scribe_page_post_title_color'
			)
		)
	);

	/**
	 * Subtitle Color
	 */
	$wp_customize->add_setting(
		'scribe_page_post_subtitle_color',
		array(
			'default' 	=> '#808080',
			'sanitize_callback'	=> 'scribe_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'scribe_page_post_subtitle_color',
			array(
				'label'			=> __('Subtitle Color', 'scribe'),
				'section'		=> 'scribe_pages_posts',
				'settings'	=> 'scribe_page_post_subtitle_color'
			)
		)
	);

	/**
	 * Meta Color
	 */
	$wp_customize->add_setting(
		'scribe_page_post_meta_color',
		array(
			'default' 	=> '#ffffff',
			'sanitize_callback'	=> 'scribe_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'scribe_page_post_meta_color',
			array(
				'label'			=> __('Meta Color', 'scribe'),
				'section'		=> 'scribe_pages_posts',
				'settings'	=> 'scribe_page_post_meta_color'
			)
		)
	);

	/**
	 * Footer Section
	 */
	$wp_customize->add_section(
		'scribe_footer_section',
		array(
			'title' 			=> 'Footer',
			'description' => 'Settings for the footer area',
			'priority' 		=> 120
		)
	);

	/**
	 * Footer Text
	 */
	$wp_customize->add_setting(
    'scribe_footer_text',
    array(
      'default' 	=> 'The Scribe WordPress Theme by <a href="http://jamigibbs.com">Jami Gibbs</a>',
			'transport'	=> 'postMessage',
			'sanitize_callback'	=> 'scribe_sanitize_text'
    )
	);

	$wp_customize->add_control(
    'scribe_footer_text',
    array(
      'type' 			=> 'textarea',
      'label' 		=> 'Footer Text',
      'section' 	=> 'scribe_footer_section'
    )
	);

}
add_action( 'customize_register', 'scribe_register_theme_customizer' );
