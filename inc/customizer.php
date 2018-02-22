<?php
/**
 * recantoalternativo Theme Customizer
 *
 * @package recantoalternativo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function recantoalternativo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'recantoalternativo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'recantoalternativo_customize_partial_blogdescription',
		) );
	}

	/* Front Page Section
	───────────────────────────────────────────────────────*/

	// Section
	$wp_customize->add_section( 'front_page', array(
		'title'		=>	__( 'Front Page', 'recantoalternativo' ),
		'priority'	=>	30,
	) );

	// Settings
	$wp_customize->add_setting( 'frontpage_about-title', array(
		'capability'	=>	'edit_theme_options',
		'type'			=>	'theme_mod',
	) );
	$wp_customize->add_setting( 'frontpage_about-text', array(
		'capability'	=>	'edit_theme_options',
		'type'			=>	'theme_mod',
	) );
	$wp_customize->add_setting( 'frontpage_about-img', array(
		'capability'	=>	'edit_theme_options',
		'type'			=>	'theme_mod',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'about-title', array(
		'label'			=>	_('Titulo'),
		'description'	=>	_('Titulo para a primeira seção da página inicial. Padrão: "Sobre" '),
		'section'		=>	'front_page',
		'type'			=>	'text',
		'settings'		=>	'frontpage_about-title'
	) ) );

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'about-text', array(
		'label'			=>	_('Texto'),
		'description'	=>	_('Texto para a primeira seção da página inicial.'),
		'section'		=>	'front_page',
		'type'			=>	'textarea',
		'settings'		=>	'frontpage_about-text'
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'about-img', array(
		'label'			=>	_('Imagem'),
		'description'	=>	_('Imagem para a seção sobre da página inicial'),
		'section'		=>	'front_page',
		'settings'		=>	'frontpage_about-img'
	) ) );
}
add_action( 'customize_register', 'recantoalternativo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function recantoalternativo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function recantoalternativo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function recantoalternativo_customize_preview_js() {
	wp_enqueue_script( 'recantoalternativo-customizer', get_template_directory_uri() . '/dist/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'recantoalternativo_customize_preview_js' );
