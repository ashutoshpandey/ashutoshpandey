<?php
/**
 * Theme Customizer Options
 *
 * @since 1.0.1
 */

require_once 'customizer_constants.php';
require_once 'customizer_extended.php';

/**
 * Contains options array for theme customizer
 * 
 * @param string $type
 * @return array
 */
function decent_customizer_options($type){
    
    $options = array();
    $sections = array();
    $panels = array();
    
    $panels[] = array(
        'id' => 'decent_panel_general',
        'title' => __('General','decent'),
        'description' => '',
        'priority' => 20,
    );

    $panels[] = array(
        'id' => 'decent_panel_header',
        'title' => __('Header','decent'),
        'description' => '',
        'priority' => 40,
    );

    $sections[] = array(
        'id' => 'decent_section_header_logo',
        'title' => __('Site Logo','decent'),
        'description' => '',
        'panel' => 'decent_panel_header',
        'priority' => 100,
        'shortname' => 'section_header_logo',
    );

    $options[] = array(
        'id' => 'site_logo',
        'default' => '',
        'label' => __('Site Logo','decent'),
        'description' => '',
        'type' => 'media_upload',
        'sanitize_type' => 'media_upload',
        'section' => 'section_header_logo',
		'extended_class' => 'WP_Customize_Image_Control',
		'transport' => 'refresh'
    );

    $panels[] = array(
        'id' => 'decent_panel_layout',
        'title' => __('Layout','decent'),
        'description' => '',
        'priority' => 60,
    );

    $sections[] = array(
        'id' => 'decent_section_layout_header',
        'title' => __('Header','decent'),
        'description' => '',
        'panel' => 'decent_panel_layout',
        'priority' => 100,
        'shortname' => 'section_layout_header',
    );

    $options[] = array(
        'id' => 'disable_header',
        'default' => false,
        'label' => __('Hide Header','decent'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_header',
		'extended_class' => false,
		'transport' => 'refresh'
    );
    
    $options[] = array(
        'id' => 'disable_site_desc',
        'default' => false,
        'label' => __('Hide Site Description','decent'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_header',
		'extended_class' => false,
		'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'decent_section_layout_social',
        'title' => __('Social','decent'),
        'description' => '',
        'panel' => 'decent_panel_layout',
        'priority' => 110,
        'shortname' => 'section_layout_social',
    );

    $options[] = array(
        'id' => 'disable_social_section',
        'default' => false,
        'label' => __('Disable Social Section', 'decent'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_social',
		'extended_class' => false,
		'transport' => 'refresh'
    );

    $panels[] = array(
        'id' => 'decent_panel_colors',
        'title' => __('Colors','decent'),
        'description' => '',
        'priority' => 80,
    );

    $sections[] = array(
        'id' => 'decent_section_colors_global',
        'title' => __('Global','decent'),
        'description' => '',
        'panel' => 'decent_panel_colors',
        'priority' => 100,
        'shortname' => 'section_colors_global',
    );

    $sections[] = array(
        'id' => 'decent_section_colors_header',
        'title' => __('Header','decent'),
        'description' => '',
        'panel' => 'decent_panel_colors',
        'priority' => 101,
        'shortname' => 'section_colors_header',
    );

    $options[] = array(
        'id' => 'color_site_title',
        'default' => '#555555',
        'label' => __('Site Title Color','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_header',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );
    
    $options[] = array(
        'id' => 'color_site_desc',
        'default' => '#555555',
        'label' => __('Site Description Color','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_header',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $sections[] = array(
        'id' => 'decent_section_colors_post',
        'title' => __('Posts/Pages','decent'),
        'description' => '',
        'panel' => 'decent_panel_colors',
        'priority' => 102,
        'shortname' => 'section_colors_posts',
    );


    $options[] = array(
        'id' => 'color_p_title',
        'default' => '#000000',
        'label' => __('Post Title Color (Page/Post)','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_p_meta',
        'default' => '#000000',
        'label' => __('Post Meta Color (Page/Posts)','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_p_content',
        'default' => '#000000',
        'label' => __('Post Content Color (Page/Posts)','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $sections[] = array(
        'id' => 'decent_section_colors_blog',
        'title' => __('Blog','decent'),
        'description' => '',
        'panel' => 'decent_panel_colors',
        'priority' => 103,
        'shortname' => 'section_colors_blog',
    );

    $options[] = array(
        'id' => 'color_blog_p_title',
        'default' => '#444444',
        'label' => __('Post Title Color (Blog)','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_blog_p_meta',
        'default' => '#000000',
        'label' => __('Post Meta Color (Blog)','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_blog_p_content',
        'default' => '#000000',
        'label' => __('Post Content Color (Blog)','decent'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
		'extended_class' => 'WP_Customize_Color_Control',
		'transport' => 'postMessage'
    );

    $panels[] = array(
        'id' => 'decent_panel_social',
        'title' => __('Social','decent'),
        'description' => '',
        'priority' => 100,
    );

    $sections[] = array(
        'id' => 'decent_section_social_profiles',
        'title' => __('Social Profiles','decent'),
        'description' => '',
        'panel' => 'decent_panel_social',
        'priority' => 100,
        'shortname' => 'section_social_profiles',
    );

    $options[] = array(
        'id' => 'facebook',
        'default' => '',
        'label' => __('Facebook', 'decent'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
		'extended_class' => false,
		'transport' => 'refresh'
    );
    
    $options[] = array(
        'id' => 'twitter',
        'default' => '',
        'label' => __('Twitter','decent'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
		'extended_class' => false,
		'transport' => 'refresh'
    );
    
    $options[] = array(
        'id' => 'rss',
        'default' => '',
        'label' => __('RSS','decent'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
		'extended_class' => false,
		'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'decent_section_about',
        'title' => __('About Decent Theme','decent'),
        'description' => '',
        'panel' => '',
        'priority' => 120,
        'shortname' => 'section_about',
    );

    $options[] = array(
        'id' => 'important_links',
        'default' => '',
        'label' => __('','decent'),
        'description' => '',
        'type' => 'important_links',
        'sanitize_type' => 'none',
        'section' => 'section_about',
		'extended_class' => 'Decent_Customize_Important_Links_Control',
		'transport' => 'refresh'
    );


    switch($type):
        case 'panels':
            return $panels;
        case 'sections':
            return $sections;
        case 'options':
            return $options;
        default:
            return;
    endswitch;
}

/**
 * Build Theme Customizer Options
 * 
 * @param type $wp_customize
 */
function decent_customizer_setup($wp_customize) {
    
    /**
     * Exit if $wp_customize does not exist.
     */
    if( !isset($wp_customize)) {
        return;
    }
    
    $panels = decent_customizer_options('panels');
    $sections = decent_customizer_options('sections');
    $options = decent_customizer_options('options');
    
    foreach($panels as $panel) {
        $wp_customize->add_panel($panel['id'], array(
            'title' => $panel['title'],
            'description' => $panel['description'],
            'theme_supports' => '',
            'capability' => 'edit_theme_options',
            'priority' => $panel['priority'],
        ));
    }
    
    foreach($sections as $section) {
        $wp_customize->add_section($section['id'], array(
            'title' => $section['title'],
            'description' => $section['description'],
            'panel' => $section['panel'],
            'priority' => $section['priority'],
        ));
    }
    
    foreach($options as $option) {
        $wp_customize->add_setting('decent_theme_lite['.$option['id'].']', array(
            'type' => 'option',
            'default' => $option['default'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => decent_get_sanitize_filter($option['sanitize_type']),
			'transport' => $option['transport'],
        ));
        
		if(!$option['extended_class']) {
			$wp_customize->add_control('decent_theme_lite['.$option['id'].']', array(
				'label' => $option['label'],
				'description' => $option['description'],
				'type' => $option['type'],
				'section' => decent_get_sections($option['section']),
				'setting' => $option['id'],
			));
		} else {
			$wp_customize->add_control(new $option['extended_class'](
				$wp_customize, 'decent_theme_lite['.$option['id'].']', array(
					'label' => $option['label'],
					'description' => $option['description'],
					//'type' => $option['type'],
					'section' => decent_get_sections($option['section']),
					'setting' => $option['id'],
				)
			));

		}
    }
	
	// WP Defaults
	$wp_customize->get_section('title_tagline')->panel = 'decent_panel_general';
	$wp_customize->get_section('static_front_page')->panel = 'decent_panel_general';
	$wp_customize->get_control('background_color')->section = 'decent_section_colors_global';
	$wp_customize->get_control('background_image')->section = 'decent_section_colors_global';
	$wp_customize->remove_section('background_image');
	
}
add_action( 'customize_register', 'decent_customizer_setup' );



/**
 * Enqueue Customizer Live Preview Scripts
 * 
 * @todo complete this
 */
function decent_live_preview_scripts(){
    wp_enqueue_script('decent-themecustomizer-live-preview', DECENT_ADMIN_JS_URL . 'customizer.js', array('jquery', 'customize-preview'),'', true);
}
add_action('customize_preview_init','decent_live_preview_scripts');



/**
 * Enqueue admin panel CSS - (Primarily for customizer)
 *
 * @since 1.0
 */
function decent_admin_panel_style() {
	wp_enqueue_style( 'decent-admin-panel-css', DECENT_ADMIN_CSS_URL . 'admin.css' );
	wp_enqueue_script( 'decent-admin-panel-js', DECENT_ADMIN_JS_URL . 'admin.js', array('jquery'), '1.0.0', TRUE );
}
add_action( 'admin_enqueue_scripts', 'decent_admin_panel_style' );



/**
 * Gets the value of an option.
 * Also sets caching for default options.
 * 
 * @global array $decent_options Options cache.
 * @param string $id Option ID
 * @return string Option Value
 */
function decent_get_option($id = NULL) {
    global $decent_options;
    
    // Global array exists. Get value from memory
    if($decent_options && array_key_exists($id, $decent_options)) {
        //echo 'Decent Options exists';
        return $decent_options[$id];
    } else {
        
        // No value in Memory. Try fetching from DB
        $saved_options = get_option('decent_theme_lite');
        
        if($saved_options && array_key_exists($id, $saved_options)){
            
            //echo 'Decent Options got from DB';
            $decent_options = $saved_options;
            return $decent_options[$id];
            
        } else {
            
            // No value in Memory or DB. Get it from default options.
            //echo 'Decent Options got from SANE';
            $sane_options = decent_customizer_options('options');
            $decent_options = array();
            
            foreach($sane_options as $options) {
                if($id == $options['id'] ){
                    $decent_options[$options['id']] = $options['default'];
                    break;
                }                
            }

            return $decent_options[$id];

        }
    }
}


/**
 * Returns sanitization filter functions
 * 
 * @param string $type The type of input to be sanitized
 * @return string Sanitization function name
 */
function decent_get_sanitize_filter($type){
    $filters = array(
		'html' => 'decent_sanitize_html',
		'nohtml' => 'decent_sanitize_nohtml', // Only Text
        'url' => 'decent_sanitize_url',
        'checkbox' => 'decent_sanitize_checkbox',
		'color' => 'decent_sanitize_hex_color',
		'media_upload' => 'decent_sanitize_media_upload',
		'none' => 'decent_sanitize_none'
    );
    
    return $filters[$type];
}


/**
 * Returns the section based on shortname
 * 
 * @param string $shortname
 * @return string
 */
function decent_get_sections($shortname) {
    $sections = decent_customizer_options('sections');
    foreach ($sections as $section) {
        if($section['shortname'] == $shortname){
            return $section['id'];
        }
    }
}


/**
 * Sanitization Function for No HTML content (only text)
 *
 * @param string $nohtml
 * @return string
 */
function decent_sanitize_nohtml($nohtml) {
	return wp_filter_nohtml_kses( $nohtml );
}


/**
 * Sanitization Function for only HTML content
 *
 * @param string $html
 * @return string
 */
function decent_sanitize_html($html) {
	return wp_filter_post_kses( $html );
}


/**
 * Sanitization Function for URL
 * 
 * @param string $url
 * @return string
 */
function decent_sanitize_url($url){
    return esc_url_raw($url);
}


/**
 * Sanitization Function for Checkbox
 * 
 * @param boolean $checked
 * @return boolean
 */
function decent_sanitize_checkbox($checked){
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Sanitization Function for Hex Colors
 * 
 * @param string HEX color to sanitize
 * @param WP_Customize_Setting Setting instance
 */
function decent_sanitize_hex_color($hex_color, $setting){
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ( $hex_color ) ? $hex_color : $setting->default );
}


/**
 * Sanitization Function for Image Upload via Media Manager
 * 
 * @param string Image filename
 * @param WP_Customize_Setting Setting instance
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function decent_sanitize_media_upload( $image, $setting ) {

	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );

	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );

	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}


/**
 * Sanitizes nothing (Used for Theme Upgrade Text)
 */
function decent_sanitize_none(){
	return;
}