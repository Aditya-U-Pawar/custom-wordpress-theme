<?php
/**
 * Header template for Noval Design Agency theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Noval Design Agency - Innovative, bioclimatic office designs and branding solutions in Bengaluru.">
    <meta name="keywords" content="office design, bioclimatic architecture, interior design, Noval, Bengaluru">
    <meta name="author" content="Your Name">
    <meta property="og:title" content="<?php bloginfo('name'); ?> - Modern Office Design">
    <meta property="og:description" content="Transform your workspace with Noval's innovative office design solutions.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/Component 160.jpg">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/Novel Logo.png" alt="Noval Design Logo" loading="lazy"></a>

            <button class="menu-toggle" aria-label="Toggle Menu">
                <span class="hamburger-icon"><span></span></span>
                <span class="close-icon" style="display: none;"></span>
            </button>
        </div>
        <nav class="popup-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb' => function() {
                    // Fallback menu linking to homepage sections
                    echo '<ul class="nav-menu">';
                    echo '<li><a href="' . home_url('#hero') . '">Home</a></li>';
                    echo '<li><a href="' . home_url('#services') . '">Services</a></li>';
                    echo '<li><a href="' . home_url('#portfolio') . '">Portfolio</a></li>';
                    echo '<li><a href="' . home_url('#testimonials') . '">Testimonials</a></li>';
                    echo '<li><a href="' . home_url('#team') . '">Team</a></li>';
                    echo '<li><a href="' . home_url('#gallery') . '">Gallery</a></li>';
                    echo '<li><a href="' . home_url('#clients') . '">Clients</a></li>';
                    echo '<li><a href="' . home_url('#cta') . '">CTA</a></li>';
                    echo '</ul>';
                },
            ]);
            ?>
        </nav>
    </header>