<?php
function css_file() {
    wp_enqueue_style( 'custom-theme-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'css_file' );
?>
<?php
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'Ustawienia motywu',
            'menu_title'    => 'Ustawienia motywu',
            'menu_slug'     => 'ustawienia-motywu',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
    function moj_motyw_przyciski_customizer( $wp_customize ) {
    // Przycisk
        $wp_customize->add_section( 'sekcja_przyciskow', array(
            'title'    => 'Przyciski Strony Głównej',
            'priority' => 31,
        ) );
        $wp_customize->add_setting( 'tekst_przycisku', array(
            'default'           => 'Domyślny Lewy',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_lewy_control', array(
            'label'    => 'Tekst przycisku',
            'section'  => 'sekcja_przyciskow',
            'settings' => 'tekst_przycisku',
            'type'     => 'text',
        ) );
         $wp_customize->add_setting( 'tekst_url', array(
            'default'           => 'Domyślny URL',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_url_control', array(
            'label'    => 'Tekst URL przycisku',
            'section'  => 'sekcja_przyciskow',
            'settings' => 'tekst_url',
            'type'     => 'text',
        ) );
    // Text nad przyciskiem
         $wp_customize->add_section( 'sekcja_span', array(
            'title'    => 'Span',
            'priority' => 30,
        ) );
        $wp_customize->add_setting( 'tekst_span', array(
            'default'           => 'Domyślny Span Lewy',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_span_control', array(
            'label'    => 'Tekst spana',
            'section'  => 'sekcja_span',
            'settings' => 'tekst_span',
            'type'     => 'text',
        ) );
    // page.php ad_content
    // obrazek dla ad_content
        $wp_customize->add_section( 'sekcja_ad_content', array(
            'title'    => 'Sekcja_ad_content',
            'priority' => 35,
        ) );
        $wp_customize->add_setting( 'obrazek_ad_content', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'obrazek_ad_content', array(
            'label'    => 'Wybierz obrazek dla ad',
            'section'  => 'sekcja_ad_content',
            'settings' => 'obrazek_ad_content',
        ) ) );
        $wp_customize->add_setting( 'alt_obrazek_ad_content', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'obrazek_ad_section_control', array(
            'label'    => 'Tekst alternatywny obrazka ALT',
            'section'  => 'sekcja_ad_content',
            'settings' => 'alt_obrazek_ad_content',
            'type'     => 'text',
        ) );
    // nagłowek dla ad_content
        $wp_customize->add_setting( 'naglowek_ad_content', array(
            'default'           => 'Domyślny nagłowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'naglowek_ad_content_control', array(
            'label'    => 'Tekst nagłowka',
            'section'  => 'sekcja_ad_content',
            'settings' => 'naglowek_ad_content',
            'type'     => 'text',
        ) );
    // text dla ad_content
        $wp_customize->add_setting( 'tekst_ad_content', array(
            'default'           => 'Domyślny tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_ad_content_control', array(
            'label'    => 'Tekst dla ad_content_span',
            'section'  => 'sekcja_ad_content',
            'settings' => 'tekst_ad_content',
            'type'     => 'text',
        ) );
    // text dla przycisku ad_section
        $wp_customize->add_setting( 'tekst_przycisku_ad_content', array(
            'default'           => 'Domyślny tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_przycisku_ad_content_control', array(
            'label'    => 'Tekst przycisku',
            'section'  => 'sekcja_ad_content',
            'settings' => 'tekst_przycisku_ad_content',
            'type'     => 'text',
        ) );
         $wp_customize->add_setting( 'tekst_url_przycisku_ad_content', array(
            'default'           => 'Domyślny URL',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_url_przycisku_ad_content_control', array(
            'label'    => 'Tekst URL przycisku',
            'section'  => 'sekcja_ad_content',
            'settings' => 'tekst_url_przycisku_ad_content',
            'type'     => 'text',
        ) );
    }
    add_action( 'customize_register', 'moj_motyw_przyciski_customizer' );
?>
<?php
// obrazek w single.php
function single_image() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'single_image' );
?>
<?php
// Tło w motywie
function add_theme_setup() {
    add_theme_support('custom-background');
}
add_action('after_setup_theme', 'add_theme_setup');
?>
<?php
// Logo w karcie
function logo_theme_setup() {
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_image_size('small-thumbnail', 180, 200, true);
}
add_action( 'after_setup_theme', 'logo_theme_setup' );
?>
<?php
// Menu nawigacyjne
function menu_setup() {
    register_nav_menus( array(
        'header-menu-left' => __( 'Left-menu-header', 'textdomain' ),
        'header-menu-right'  => __( 'Right-menu-header', 'textdomain' ),
    ) );
}
add_action( 'after_setup_theme', 'menu_setup' );
?>
<?php
// Znaczniki HTML5
function HTML5() {
    add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );
}
add_action( 'after_setup_theme', 'HTML5' );
?>
<?php 
function my_theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );
?>