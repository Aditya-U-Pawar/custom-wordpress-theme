/* Smooth Scrolling */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

/* GSAP Animations */
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM fully loaded'); // Debug: Confirm DOMContentLoaded fires
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.error('GSAP or ScrollTrigger not loaded');
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // Menu Toggle Animation
    const menuToggle = document.querySelector('.menu-toggle');
    const popupMenu = document.querySelector('.popup-menu');
    const hamburgerIcon = document.querySelector('.hamburger-icon');
    const closeIcon = document.querySelector('.close-icon');
    const navLinks = document.querySelectorAll('.nav-menu li a');

    if (!menuToggle || !popupMenu || !hamburgerIcon || !closeIcon) {
        console.error('Menu elements not found:', {
            menuToggle: !!menuToggle,
            popupMenu: !!popupMenu,
            hamburgerIcon: !!hamburgerIcon,
            closeIcon: !!closeIcon
        });
        return;
    }

    console.log('Menu toggle found, attaching click event'); // Debug: Confirm element found
    menuToggle.addEventListener('click', () => {
        console.log('Menu toggle clicked'); // Debug: Confirm click event
        const isOpen = popupMenu.classList.contains('active');
        if (!isOpen) {
            popupMenu.style.opacity = 1;
            // Open menu
            gsap.timeline()
                .to(popupMenu, {
                    y: 0,
                    duration: 0.8,
                    ease: 'power4.out',
                    onStart: () => popupMenu.classList.add('active')
                })
                .fromTo(navLinks, 
                    { opacity: 0, y: 30, scale: 0.9 },
                    { opacity: 1, y: 0, scale: 1, stagger: 0.15, duration: 0.6, ease: 'power3.out' },
                    '-=0.5'
                );
            hamburgerIcon.style.display = 'none';
            closeIcon.style.display = 'block';
        } else {
            // Close menu
            gsap.timeline()
                .to(navLinks, { opacity: 0, y: 30, scale: 0.9, duration: 0.4, ease: 'power3.in' })
                .to(popupMenu, {
                    y: '-100%',
                    duration: 0.8,
                    ease: 'power4.in',
                    onComplete: () => popupMenu.classList.remove('active')
                }, '-=0.2');
            hamburgerIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    });

    // Close menu when a nav link is clicked
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            console.log('Nav link clicked'); // Debug: Confirm link click
            gsap.timeline()
                .to(navLinks, { opacity: 0, y: 30, scale: 0.9, duration: 0.4, ease: 'power3.in' })
                .to(popupMenu, {
                    y: '-100%',
                    duration: 0.8,
                    ease: 'power4.in',
                    onComplete: () => popupMenu.classList.remove('active')
                }, '-=0.2');
            hamburgerIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        });
    });

    // Hero Slideshow
    const slides = document.querySelectorAll('.hero-slide');
    let currentSlide = 0;

    function showNextSlide() {
        console.log('working')
        gsap.to(slides[currentSlide], { opacity: 0, duration: 1, ease: 'power2.inOut' });
        currentSlide = (currentSlide + 1) % slides.length;
        gsap.to(slides[currentSlide], { opacity: 1, duration: 1, ease: 'power2.inOut' });
        slides.forEach((slide, index) => {
            slide.classList.toggle('active', index === currentSlide);
        });
    }

    // Initial slide
    if (slides.length > 0) {
        gsap.set(slides[0], { opacity: 1 });
        slides[0].classList.add('active');
        setInterval(showNextSlide, 5000);
    } else {
        console.warn('No hero slides found');
    }

    // Hero Content Animation
    gsap.timeline()
        .from('.hero-title', { opacity: 0, y: 100, duration: 1.2, ease: 'power4.out' })
        .from('.hero-subtitle', { opacity: 0, y: 50, duration: 1, ease: 'power4.out' }, '-=0.8')
        .from('.hero .btn-primary', { opacity: 0, scale: 0.8, duration: 0.8, ease: 'back.out(1.7)' }, '-=0.6');

    // Parallax for Hero Slides
    gsap.to('.hero-slide', {
        scrollTrigger: {
            trigger: '.hero',
            scrub: 1,
            start: 'top top',
            end: 'bottom top'
        },
        y: '15%',
        scale: 1.3,
        ease: 'none'
    });

    // Services Section: Staggered Cards
    gsap.from('.service-item', {
        scrollTrigger: {
            trigger: '.services',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        y: 80,
        stagger: 0.3,
        duration: 1,
        ease: 'power3.out'
    });

    // Portfolio Section: Pinned Animation with Stagger
    gsap.from('.portfolio-item', {
        scrollTrigger: {
            trigger: '.portfolio',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        scale: 0.85,
        stagger: 0.2,
        duration: 1.2,
        ease: 'power3.out'
    });

    // Testimonials Section: Rotate and Fade
    gsap.from('.testimonial', {
        scrollTrigger: {
            trigger: '.testimonials',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        rotationY: 20,
        y: 50,
        stagger: 0.3,
        duration: 1,
        ease: 'power3.out'
    });

    // Team Section: Staggered Fade
    gsap.from('.team-member', {
        scrollTrigger: {
            trigger: '.team',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        y: 60,
        stagger: 0.3,
        duration: 1,
        ease: 'power3.out'
    });

    // Gallery Section: Zoom and Fade
    gsap.from('.gallery-item', {
        scrollTrigger: {
            trigger: '.gallery',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        scale: 0.9,
        stagger: 0.2,
        duration: 1,
        ease: 'power3.out'
    });

    // Clients Section: Fade In
    gsap.from('.clients-grid img', {
        scrollTrigger: {
            trigger: '.clients',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        scale: 0.8,
        stagger: 0.2,
        duration: 0.8,
        ease: 'power2.out'
    });

    // CTA Section: Bounce Effect
    gsap.from('.cta-section .btn-primary', {
        scrollTrigger: {
            trigger: '.cta-section',
            start: 'top 80%',
            toggleActions: 'play none none reset'
        },
        opacity: 0,
        scale: 0.8,
        duration: 1,
        ease: 'back.out(1.7)'
    });
});