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

    public function load_shortcode()
    {?>

        <div class="simple-contact-form">
                <h2>Send us an email</h2>
                <p>Please fill the below form</p>

            <form id="contact-form"> 

                <input name="name" type="text" placeholder="Name">
                <input name="email" type="email" placeholder="Email">
                <input name="phone" type="tel" placeholder="Phone">

                <textarea name="message" placeholder="type your message"></textarea>
                
                <button class="contact-form-btn">Send Message</button>

            </form>
        </div>

    <?php }

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
    }


}

new SimpleContactForm;