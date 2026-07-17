<?php
/**
 * Plugin Name: Simple Contact form
 * Description: Simple contact form
 * Author: Michal
 * Version: 1.0.0
 * Text Domain: simple-contact-form 
 */

if( !defined('ABSPATH') )
{
    echo 'What are you trying to do';
    exit;
}

class SimpleContactForm {

    public function __construct() 
    {
        // Create custom post type
        add_action('init', array($this, 'create_custom_post_type'));

        // Add assets (js, css), etc
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        // Add shortcode
        add_shortcode('contact-form', array($this, 'load_shortcode'));

        // Load javascript
        add_action('wp_footer', array($this, 'load_scripts'));

        // Register REST API
        add_action('rest_api_init', array($this, 'register_rest_api'));

        // 5. Panel Ustawień wewnątrz menu "Contact Form"
        add_action('admin_menu', array($this, 'add_settings_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function create_custom_post_type() 
    {
        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Contact Form',
                'singular_name' => 'Contact Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text',
            'show_in_menu' => true,
        );

        register_post_type('simple_contact_form', $args);
    }

    public function load_assets()
    {   
        wp_enqueue_script('jquery');

        wp_enqueue_style( 
            'simple-contact-form',
            plugin_dir_url(__FILE__) . 'css/simple-contact-form.css',
            array(),
            1,
            'all'
        );
    }

    public function add_settings_menu() {
        add_submenu_page(
            'edit.php?post_type=simple_contact_form',
            'Contact Form Settings',
            'Settings',
            'manage_options',
            'simple-contact-form-settings',
            array($this, 'render_settings_page')
        );
    }

    public function register_settings() {
        // naglowek h2
        register_setting('scf_settings_group', 'scf_title', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Send us an email'
        ));

        // tekst p
        register_setting('scf_settings_group', 'scf_subtitle', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Please fill the below form'
        ));

        // tekst
        register_setting('scf_settings_group', 'scf_button_text', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Send Message'
        ));
    }

    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>Contact Form Settings</h1>

            <form method="post" action="options.php">
                <?php
                settings_fields('scf_settings_group');
                do_settings_sections('scf_settings_group');

                $title       = get_option('scf_title', 'Send us an email');
                $subtitle    = get_option('scf_subtitle', 'Please fill the below form');
                $button_text = get_option('scf_button_text', 'Send Message');
                ?>

                <div class="scf-settings-container">
        
                    <div class="scf-field-group">
                        <label for="scf_title">Form Title (h2):</label>
                        <input type="text" id="scf_title" name="scf_title" value="<?php echo esc_attr($title); ?>" class="regular-text" />
                    </div>

                    <div class="scf-field-group">
                        <label for="scf_subtitle">Form Subtitle (P):</label>
                        <input type="text" id="scf_subtitle" name="scf_subtitle" value="<?php echo esc_attr($subtitle); ?>" class="regular-text" />
                    </div>

                    <div class="scf-field-group">
                        <label for="scf_button_text">Button Text:</label>
                        <input type="text" id="scf_button_text" name="scf_button_text" value="<?php echo esc_attr($button_text); ?>" class="regular-text" />
                    </div>

                </div>

                <?php submit_button('Save Settings'); ?>
            </form>
        </div>
        <?php
    }
    

    public function load_shortcode()
    {
        $title       = get_option('scf_title', 'Send us an email');
        $subtitle    = get_option('scf_subtitle', 'Please fill the below form');
        $button_text = get_option('scf_button_text', 'Send Message');
        
        ob_start();
        ?>

        <div class="simple-contact-form">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($subtitle); ?></p>

            <form id="contact-form"> 

                <input name="name" type="text" placeholder="Name">
                <input name="email" type="email" placeholder="Email">
                <input name="phone" type="tel" placeholder="Phone">

                <textarea name="message" placeholder="type your message"></textarea>
                
                <button class="contact-form-btn"><?php echo esc_html($button_text); ?></button>

            </form>
        </div>

    <?php
    return ob_get_clean(); 
    }

    public function load_scripts()
    {?>

        <script>

        let nonce = '<?php echo wp_create_nonce('wp_rest'); ?>';
            
        (function($){

            $('#contact-form').submit( function(e) {
                e.preventDefault();

                let form = $(this).serialize();

                console.log(form);

                $.ajax({
                    method:'post',
                    url: '<?php echo get_rest_url(null, 'simple-contact-form/v1/send-email'); ?>',
                    headers: { 'X-WP-Nonce': nonce },
                    data: form

                })

            });

        })(jQuery)

        </script>

    <?php }

    public function register_rest_api()
    {
        register_rest_route( 'simple-contact-form/v1', 'send-email', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_contact_form')
        ));
    }

    public function handle_contact_form($data)
    {
        $headers = $data->get_headers();
        $params = $data->get_params();
        $nonce = $headers['x_wp_nonce'][0];

        if(!wp_verify_nonce($nonce, 'wp_rest'))
        {
            return new WP_REST_Response('Message not sent', 422);
        }

        $post_id = wp_insert_post(array(
            'post_type' => 'simple_contact_form',
            'post_title' => 'Contact enquiry',
            'post_status' => 'publish'
        ));

        if($post_id)
        {
            return new WP_REST_Response('Thank you for your email', 200);    
        }
    }

}

new SimpleContactForm();