<?php
function my_theme_setup() {
    // Add support for menus
    register_nav_menus(['primary' => 'Primary Menu']);
    // Add support for Block Editor and featured images
    add_theme_support('wp-block-styles');
    add_theme_support('post-thumbnails');
    // Add SEO support
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_theme_setup');

function my_theme_enqueue_scripts() {
    // Enqueue Google Fonts (Roboto)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap', [], null);
    // Enqueue CSS
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/style.css', [], '1.2', 'all');
    // Enqueue GSAP
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', [], '3.12.2', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', ['gsap'], '3.12.2', true);
    // Enqueue JS (defer loading)
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/script.js', ['jquery', 'gsap', 'gsap-scrolltrigger'], '1.2', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function create_testimonial_cpt() {
    register_post_type('testimonial', [
        'labels' => [
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'create_testimonial_cpt');
?>