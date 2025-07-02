<?php get_header(); ?>
<main>
    <!-- Hero Section with Slideshow -->
    <section class="hero" id="hero">
        <div class="hero-slideshow">
            <div class="hero-slide active" style="background-image: url('<?php echo get_template_directory_uri(); ?> /images/Component 160.jpg');"></div>
            <div class="hero-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?> /images/hero-image.png');"></div>
            <div class="hero-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?> /images/Component 160.png');"></div>
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <!-- <img src="<?php echo get_template_directory_uri(); ?> /images/hero-image.png"> -->
            <h1 class="hero-title">Transform Your Workspace</h1>
            <p class="hero-subtitle">Novel crafts bioclimatic, innovative office designs in Bengaluru.</p>
            <a href="#portfolio" class="btn btn-primary" style="opacity: 1;">Discover Our Projects</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="services-content">
            <h2>Our Expertise</h2>
            <p>Delivering sustainable, modern office solutions tailored to your needs.</p>
            <div class="services-grid">
                <div class="service-item">
                    <img src="<?php echo get_template_directory_uri(); ?> /images/Component 99.png" loading="lazy">
                    <h3>Bioclimatic Design</h3>
                    <p>Sustainable architecture for energy-efficient offices.</p>
                </div>
                <div class="service-item">
                    <img src="<?php echo get_template_directory_uri(); ?> /images/Component 100-1.png" alt="Interior Design" loading="lazy">
                    <h3>Interior Design</h3>
                    <p>Elegant and functional office interiors.</p>
                </div>
                <div class="service-item">
                    <img src="<?php echo get_template_directory_uri(); ?> /images/Component 100-2.png" alt="Branding" loading="lazy">
                    <h3>Branding</h3>
                    <p>Unique visual identities for your workspace.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
<section class="portfolio" id="portfolio">
    <h2>Signature Projects</h2>
    <div class="portfolio-grid">
        <?php 
        // Get all image files in the "images" folder (use file system path)
        $image_dir = get_template_directory() . '/images/projects/'; // Path to your theme's image directory
        $images = glob($image_dir . '*.png'); // Modify this pattern to include other formats like *.jpg, *.jpeg, etc.

        // Loop through each image
        foreach ($images as $index => $image) : ?>
            <div class="portfolio-item">
                <img src="<?php echo get_template_directory_uri() . '/images/projects/' . basename($image); ?>" alt="Project <?php echo $index + 1; ?>" loading="lazy">
                <div class="portfolio-overlay">
                    <h3>Project <?php echo $index + 1; ?></h3>
                    <p>2025 - Bengaluru</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>



    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <h2>Client Stories</h2>
        <div class="testimonial-grid">
            <?php
            $testimonials = new WP_Query(['post_type' => 'testimonial', 'posts_per_page' => 4]);
            if ($testimonials->have_posts()) : while ($testimonials->have_posts()) : $testimonials->the_post();
            ?>
                <article class="testimonial" itemscope itemtype="https://schema.org/Review">
                    <meta itemprop="itemReviewed" content="Novel Office Design Services">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy" class="testimonial-image" itemprop="image">
                    <h3 itemprop="author"><?php the_title(); ?></h3>
                    <div class="testimonial-content" itemprop="reviewBody"><?php the_content(); ?></div>
                    <meta itemprop="reviewRating" content="5">
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Team Member 1" loading="lazy">
                <h3>John Doe</h3>
                <p>Lead Architect</p>
            </div>
            <div class="team-member">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7" alt="Team Member 2" loading="lazy">
                <h3>Jane Smith</h3>
                <p>Interior Designer</p>
            </div>
            <div class="team-member">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb" alt="Team Member 3" loading="lazy">
                <h3>Michael Lee</h3>
                <p>Branding Expert</p>
            </div>
        </div>
    </section>

<!-- Gallery Section -->
<section class="gallery" id="gallery">
    <h2>Inspiration Gallery</h2>
    <div class="gallery-grid">
        <?php 
        // Define the path to the images folder (using file system path)
        $image_dir = get_template_directory() . '/images/projects/'; // Ensure your images are in the 'images/gallery/' folder within your theme
        $images = glob($image_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE); // Get all image files in the folder
        
        // Loop through each image
        foreach ($images as $index => $image) : ?>
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri() . '/images/projects/' . basename($image); ?>" alt="Gallery Image <?php echo $index + 1; ?>" loading="lazy">
            </div>
        <?php endforeach; ?>
    </div>
</section>


    <!-- Clients Section -->
    <section class="clients" id="clients">
        <h2>Trusted By</h2>
        <div class="clients-grid">
            <!-- <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Client Logo 1" loading="lazy">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Client Logo 2" loading="lazy">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Client Logo 3" loading="lazy">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Client Logo 4" loading="lazy"> -->
            <img src="<?php echo get_template_directory_uri(); ?> /images/Frame 1000003773.png" alt='Client logo'>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="cta">
        <h2>Ready to Redefine Your Office?</h2>
        <p>Contact Novel Design to bring your vision to life.</p>
        <a href="#contact" class="btn btn-primary">Get Started</a>
    </section>
</main>
<?php get_footer(); ?>