<?php
function css_file() {
    wp_enqueue_style( 'custom-theme-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'css_file' );
function js_file() {
    wp_enqueue_script( 'custom-theme-script', get_template_directory_uri() . '/js/script.js',
    array(), '1.0.0',
    array( 'in_footer' => true ) 
    );
}
add_action( 'wp_enqueue_scripts', 'js_file' );
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
    // naglowek nad sekcja_posts
        $wp_customize->add_section( 'sekcja_naglowku_posts', array(
            'title'    => 'Naglowek_posts',
            'priority' => 36,
        ) );
        $wp_customize->add_setting( 'tekst_naglowku', array(
            'default'           => 'Naglowek',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_naglowku_control', array(
            'label'    => 'Tekst przycisku',
            'section'  => 'sekcja_naglowku_posts',
            'settings' => 'tekst_naglowku',
            'type'     => 'text',
        ) );
    // przyciski do nawigacji postami
         $wp_customize->add_section( 'sekcja_nawigacji_postami', array(
            'title'    => 'Navigation_posts',
            'priority' => 37,
        ) );
        $wp_customize->add_setting( 'tekst_lewej_nawigacji', array(
            'default'           => 'Poprzednie',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_nawigacji_lewej_control', array(
            'label'    => 'Tekst przycisku lewego',
            'section'  => 'sekcja_nawigacji_postami',
            'settings' => 'tekst_lewej_nawigacji',
            'type'     => 'text',
        ) );
         $wp_customize->add_setting( 'tekst_prawej_nawigacji', array(
            'default'           => 'Nastepne',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'tekst_nawigacji_prawej_control', array(
            'label'    => 'Tekst przycisku prawego',
            'section'  => 'sekcja_nawigacji_postami',
            'settings' => 'tekst_prawej_nawigacji',
            'type'     => 'text',
        ) );
    }
    add_action( 'customize_register', 'moj_motyw_przyciski_customizer' );
// obrazek w single.php
function single_image() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'single_image' );
// Tło w motywie
function moj_motyw_setup() {
    add_theme_support( 'custom-background', array(
        'default-color'      => 'ffffff',
        'default-image'      => '',
        'default-position-x' => 'center',
        'default-attachment' => 'fixed',
    ) );
}
add_action( 'after_setup_theme', 'moj_motyw_setup' );
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
// Menu nawigacyjne
function menu_setup() {
    register_nav_menus( array(
        'header-menu-left' => __( 'Left-menu-header', 'textdomain' ),
        'header-menu-right'  => __( 'Right-menu-header', 'textdomain' ),
    ) );
}
add_action( 'after_setup_theme', 'menu_setup' );
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
function my_theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );
// dodanie google fonts
function moj_motyw_dodaj_google_fonts() {
    wp_enqueue_style( 
        'google-fonts-oswald',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Yuyu&display=swap',
        array(), 
        null 
    );
}
add_action( 'wp_enqueue_scripts', 'moj_motyw_dodaj_google_fonts' );
// podpiecie Swipera
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function register_styles(){

    wp_enqueue_style(
        'swiper-css', 
        get_template_directory_uri() . '/css/swiper-bundle.css', 
        array(), 
        '11.0.0'
    );

    wp_enqueue_style('style', get_stylesheet_uri(), array('swiper-css'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'register_styles');
function load_my_js(){
    wp_enqueue_script(
        'swiper-js', 
        get_template_directory_uri() . '/js/swiper-bundle.min.js', 
        array(), 
        '11.0.0', 
        true
    );

    wp_enqueue_script(
        'moj-skrypt-galerii',
        get_template_directory_uri() . '/js/script.js',
        array('swiper-js'), 
        '1.0.0',
        true
    );

    wp_localize_script('moj-skrypt-galerii', 'themeData', array(
        'themeUrl' => get_template_directory_uri()
    ));
}
// modyfikacja tytułu wpisu
add_filter( 'the_title', 'custom_title' );
function custom_title( $title ) {
    if (in_the_loop() && is_main_query() && is_single() ) {
        return '✨' . $title;
    }
    return $title;
}
// modyfikacja menu logowania WP
add_action('login_enqueue_scripts', 'custom_login_styles');
function custom_login_styles() {
    $background_url = get_stylesheet_directory_uri() . '/headerbackground.png';
    $logo_url = get_stylesheet_directory_uri() . '/mugshot.jpg';
    ?>
    <style type="text/css">
        body {
            background-image: url('<?php echo $background_url ?>') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #loginform {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            background-image:linear-gradient(to bottom, #ffffff, #919191) ; 
            color: #000000;
        }
        .login #wp-submit {
            background-color: #d3d3d3;
            color: #000000;
            border-radius: 5px;
            border: none;
        }
        .login form input {
            border: none;
        }
        .login #wp-submit:hover{
            background-color: #535353;
            color: #ffffff;
            border: none;
        }
        #login-message{
            background-image: linear-gradient(to bottom, #afafaf, #ffffff);
            color: #000000;
            box-shadow: 1px 1px 50px #ffffff;
            border-left-color: transparent;
        }
        #nav{
            color: #000000;
        }
        input .button{
            background-color: #000000;
            color: #ffffff;
        }
        body.login .language-switcher input{
            color: #ffffff !important;
            background-color: #5c5c5c;
            border: none;
        }
        .login #nav a, .login #backtoblog a{
            color: #ffffff !important; 
        }
        .language-switcher label .dashicons{
            color: #ffffff !important;
        }
        #login .wp-login-logo a{
            background-image: url('<?php echo $logo_url ?>') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <?php
}
// Dodanie portfolio
function moj_register_portfolio_cpt() {
    $labels = array(
        'name'               => 'Portfolio',
        'singular_name'      => 'Projekt',
        'add_new_item'       => 'Dodaj nowy projekt',
        'edit_item'          => 'Edytuj projekt',
        'all_items'          => 'Portfolio',
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-portfolio',
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'moj_register_portfolio_cpt');
// Dodanie zakładki zespół
function moj_register_zespol_cpt() {
    $labels = array(
        'name'               => 'Zespół',
        'singular_name'      => 'Ludzie zespołu',
        'add_new_item'       => 'Dodaj nową osobe zespołu',
        'edit_item'          => 'Edytuj osoby zespołu',
        'all_items'          => 'Zespół',
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'zespol'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-groups',
    );
    register_post_type('zespol', $args);
}
add_action('init', 'moj_register_zespol_cpt');
// dodanie zakładki opinie
function moj_register_opinie_cpt() {
    $labels = array(
        'name'               => 'Opinie',
        'singular_name'      => 'Opinie',
        'add_new_item'       => 'Dodaj nową opinie',
        'edit_item'          => 'Edytuj opinie',
        'all_items'          => 'Opinie',
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'opinie'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-star-filled',
    );
    register_post_type('opinie', $args);
}
add_action('init', 'moj_register_opinie_cpt');
?>