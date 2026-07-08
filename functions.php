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
    // Box1 area
         $wp_customize->add_section( 'sekcja_box1', array(
            'title'    => 'Box1',
            'priority' => 32,
        ) );
        $wp_customize->add_setting( 'obrazek_box', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'obrazek_box_control1', array(
            'label'    => 'Wybrał obrazek',
            'section'  => 'sekcja_box1',
            'settings' => 'obrazek_box',
        ) ) );
        $wp_customize->add_setting( 'obrazek_box_alt', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'obrazek_box_alt_control1', array(
            'label'    => 'Tekst alternatywny obrazka ALT',
            'section'  => 'sekcja_box1',
            'settings' => 'obrazek_box_alt',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( 'naglowek_box', array(
            'default'           => 'Domyślny naglowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'naglowek_box_control1', array(
            'label'    => 'Tekst naglowka boxa',
            'section'  => 'sekcja_box1',
            'settings' => 'naglowek_box',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( 'tekst_box', array(
            'default'           => 'Domyslny_tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_box_control1', array(
            'label'    => 'Tekst boxa',
            'section'  => 'sekcja_box1',
            'settings' => 'tekst_box',
            'type'     => 'text',
        ) );
    // box2 area
        $wp_customize->add_section( 'sekcja_box2', array(
            'title'    => 'Box2',
            'priority' => 33,
        ) );
        $wp_customize->add_setting( 'obrazek_box2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'obrazek_box_control2', array(
            'label'    => 'Wybrał obrazek',
            'section'  => 'sekcja_box2',
            'settings' => 'obrazek_box2',
        ) ) );
        $wp_customize->add_setting( 'obrazek_box_alt2', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'obrazek_box_alt_control2', array(
            'label'    => 'Tekst alternatywny obrazka ALT',
            'section'  => 'sekcja_box2',
            'settings' => 'obrazek_box_alt2',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( 'naglowek_box2', array(
            'default'           => 'Domyślny naglowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'naglowek_box_control2', array(
            'label'    => 'Tekst naglowka boxa',
            'section'  => 'sekcja_box2',
            'settings' => 'naglowek_box2',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( 'tekst_box2', array(
            'default'           => 'Domyslny_tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_box_control2', array(
            'label'    => 'Tekst boxa',
            'section'  => 'sekcja_box2',
            'settings' => 'tekst_box2',
            'type'     => 'text',
        ) );
    // box3 area
         $wp_customize->add_section( 'sekcja_box3', array(
            'title'    => 'Box3',
            'priority' => 34,
        ) );
        $wp_customize->add_setting( 'obrazek_box3', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'obrazek_box_control3', array(
            'label'    => 'Wybrał obrazek',
            'section'  => 'sekcja_box3',
            'settings' => 'obrazek_box3',
        ) ) );
        $wp_customize->add_setting( 'obrazek_box_alt3', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'obrazek_box_alt_control3', array(
            'label'    => 'Tekst alternatywny obrazka ALT',
            'section'  => 'sekcja_box3',
            'settings' => 'obrazek_box_alt3',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( 'naglowek_box3', array(
            'default'           => 'Domyślny naglowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'naglowek_box_control3', array(
            'label'    => 'Tekst naglowka boxa',
            'section'  => 'sekcja_box3',
            'settings' => 'naglowek_box3',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( 'tekst_box3', array(
            'default'           => 'Domyslny_tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_box_control3', array(
            'label'    => 'Tekst boxa',
            'section'  => 'sekcja_box3',
            'settings' => 'tekst_box3',
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
    // About_us_content
        // Naglowek
        $wp_customize->add_section( 'sekcja_about_us_content', array(
            'title'    => 'Sekcja_about_us_content',
            'priority' => 35,
        ) );
         $wp_customize->add_setting( 'naglowek_about_us_content', array(
            'default'           => 'Domyślny naglowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'naglowek_about_us_content_control', array(
            'label'    => 'Tekst naglowka',
            'section'  => 'sekcja_about_us_content',
            'settings' => 'naglowek_about_us_content',
            'type'     => 'text',
        ) );
        // content
         $wp_customize->add_setting( 'tekst_about_us_content', array(
            'default'           => 'Domyślny tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_about_us_content_control', array(
            'label'    => 'Tekst w content',
            'section'  => 'sekcja_about_us_content',
            'settings' => 'tekst_about_us_content',
            'type'     => 'text',
        ) );
    // content place
        // Naglowek
        $wp_customize->add_section( 'sekcja_content_place_content', array(
            'title'    => 'Sekcja_content_place_content',
            'priority' => 35,
        ) );
         $wp_customize->add_setting( 'naglowek_content_place_content', array(
            'default'           => 'Domyślny naglowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'naglowek_content_place_content_control', array(
            'label'    => 'Tekst naglowka',
            'section'  => 'sekcja_content_place_content',
            'settings' => 'naglowek_content_place_content',
            'type'     => 'text',
        ) );
        // content
         $wp_customize->add_setting( 'tekst_content_place_content', array(
            'default'           => 'Domyślny tekst',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_content_place_content_control', array(
            'label'    => 'Tekst w content',
            'section'  => 'sekcja_content_place_content',
            'settings' => 'tekst_content_place_content',
            'type'     => 'text',
        ) );
    }
    add_action( 'customize_register', 'moj_motyw_przyciski_customizer' );
?>
