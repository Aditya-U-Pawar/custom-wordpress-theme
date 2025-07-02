# Noval Design Agency WordPress Theme

## Overview

The Noval Design Agency theme is a modern, responsive WordPress theme designed for an office design agency based in Bengaluru, India. It showcases innovative, bioclimatic office designs and branding solutions with a clean, professional aesthetic. The theme features a dynamic hero slideshow, an animated pop-up navigation menu, and multiple sections for services, portfolio, testimonials, team, gallery, clients, and a call-to-action (CTA). Built with performance and accessibility in mind, it uses GSAP for animations and WordPress best practices for extensibility.

## Features

- **Hero Section**: Full-screen slideshow with three images (`Component 160.jpg`, `hero-image.png`, `Component 160.png`) that transition every 5 seconds using GSAP animations. Includes a gradient overlay, bold title ("Transform Your Workspace"), subtitle, and a CTA button.
- **Navigation Menu**: Fixed header with a logo and hamburger toggle. Clicking the hamburger opens a full-width, 60% height pop-up menu with smooth GSAP animations. Links to homepage sections: Home (#hero), Services, Portfolio, Testimonials, Team, Gallery, Clients, and CTA. The hamburger toggles to a close (X) icon when open.
- **Sections**:
  - **Services**: Displays three expertise areas (Bioclimatic Design, Interior Design, Branding) with images and hover effects.
  - **Portfolio**: Dynamically loads images from the `/images/projects/` directory with an overlay for project details.
  - **Testimonials**: Supports a custom post type (`testimonial`) with images, names, and reviews.
  - **Team**: Showcases three team members with placeholder images and roles.
  - **Gallery**: Dynamically loads images from the `/images/projects/` directory with zoom hover effects.
  - **Clients**: Displays a client logo with hover opacity transition.
  - **CTA**: Encourages visitors to contact the agency with a prominent button.
- **Footer**: Dark-themed footer with copyright notice, email link (`info@bynovel.net`), and location (Bengaluru, India).
- **Responsive Design**: Fully responsive with tailored styles for screens down to 480px, ensuring usability on mobile and tablet devices.
- **Performance**: Uses lazy loading for images and optimized GSAP animations. Target Lighthouse performance score &gt;90.
- **Animations**: GSAP-powered animations for hero content, menu toggle, and section elements (fade, slide, scale, and parallax effects).

## File Structure

```
noval-theme/
├── images/
│   ├── Novel Logo.png           # Header logo
│   ├── Component 160.jpg        # Hero slideshow image
│   ├── hero-image.png           # Hero slideshow image
│   ├── Component 160.png        # Hero slideshow image
│   ├── Component 99.png         # Services image
│   ├── Component 100-1.png      # Services image
│   ├── Component 100-2.png      # Services image
│   ├── Frame 1000003773.png     # Clients logo
│   └── projects/                # Folder for Portfolio and Gallery images (*.png, *.jpg, etc.)
├── front-page.php               # Homepage template with all sections
├── header.php                   # Header with logo and animated pop-up menu
├── footer.php                   # Footer with copyright and contact info
├── style.css                    # Main stylesheet for theme styling
├── script.js                    # JavaScript for smooth scrolling and GSAP animations
└── functions.php                # Theme setup, scripts, and custom post types
```

## Setup Instructions

1. **Install WordPress**:
   - Set up a local or hosted WordPress environment (e.g., Local by Flywheel, XAMPP, or a hosting provider).
2. **Install Theme**:
   - Copy the `noval-theme` folder to `wp-content/themes/`.
   - In WordPress admin, go to `Appearance > Themes` and activate "Noval Design Agency".
3. **Configure Menu**:
   - Go to `Appearance > Menus` in WordPress admin.
   - Create a "Primary Menu" with custom links:
     - Home (`#hero`)
     - Services (`#services`)
     - Portfolio (`#portfolio`)
     - Testimonials (`#testimonials`)
     - Team (`#team`)
     - Gallery (`#gallery`)
     - Clients (`#clients`)
     - CTA (`#cta`)
   - Assign the menu to the "Primary Menu" location.
   - Note: A fallback menu is included in `header.php` if no primary menu is set.
4. **Add Images**:
   - Place all required images in the `noval-theme/images/` directory, ensuring paths match those in `front-page.php` and `header.php`.
   - Add portfolio and gallery images to `noval-theme/images/projects/`.
   - Compress images (&lt;100KB) using tools like TinyPNG for optimal performance.
5. **Set Up Testimonials**:
   - In WordPress admin, create posts under the "Testimonial" custom post type with a featured image, title (author name), and content (review text).
6. **Test**:
   - Verify the hero slideshow, menu toggle, and section scrolling work on desktop and mobile.
   - Check console logs (F12 → Console) for errors, especially for menu toggle (`'Menu toggle clicked'`).
   - Run Lighthouse to ensure a performance score &gt;90.
7. **Deploy**:
   - Upload the theme to your production WordPress site if needed.

## Dependencies

- **WordPress**: Version 5.0 or higher.
- **GSAP**: Included via CDN (`gsap.min.js` and `ScrollTrigger.min.js`) for animations. Enqueued in `functions.php`.
- **Roboto Font**: Included via Google Fonts in `style.css`.

## Notes

- Ensure the `/images/` and `/images/projects/` directories contain all referenced images.
- The theme uses a custom post type (`testimonial`) for client stories. Register it in `functions.php` if not already present:

  ```php
  function register_testimonial_post_type() {
      register_post_type('testimonial', [
          'labels' => [
              'name' => 'Testimonials',
              'singular_name' => 'Testimonial',
          ],
          'public' => true,
          'supports' => ['title', 'editor', 'thumbnail'],
          'has_archive' => true,
      ]);
  }
  add_action('init', 'register_testimonial_post_type');
  ```
- If the menu toggle doesn’t work, check console logs for errors like `'Menu elements not found'` or `'GSAP or ScrollTrigger not loaded'`. Verify `script.js` and GSAP scripts are loaded.

## Author

Aditya Ugalal Pawar

## License

© 2025 Noval Design Agency. All rights reserved.