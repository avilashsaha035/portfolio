$(document).ready(function() {
    // Mobile menu toggle
    $('#mobile-menu-button').click(function() {
        $('#mobile-menu').slideToggle(300);
    });

    // Close mobile menu when clicking a link
    $('.nav-link').click(function() {
        $('#mobile-menu').slideUp(300);
    });

    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#back-to-top').css({
                'opacity': '1',
                'transform': 'translateY(0)'
            });
        } else {
            $('#back-to-top').css({
                'opacity': '0',
                'transform': 'translateY(10px)'
            });
        }
    });

    $('#back-to-top').click(function() {
        $('html, body').animate({scrollTop: 0}, 300);
    });

    // Smooth scrolling for anchor links
    $('a[href*="#"]').on('click', function(e) {
        if (this.hash !== '') {
            e.preventDefault();

            const hash = this.hash;

            $('html, body').animate(
                {
                    scrollTop: $(hash).offset().top - 80,
                },
                800
            );

            // Update active nav link
            $('.nav-link').removeClass('nav-active');
            $(`.nav-link[href="${hash}"]`).addClass('nav-active');
        }
    });

    // Update active nav link on scroll
    $(window).scroll(function() {
        const scrollPosition = $(window).scrollTop();

        $('section').each(function() {
            const sectionId = $(this).attr('id');
            const sectionTop = $(this).offset().top - 100;
            const sectionBottom = sectionTop + $(this).outerHeight();

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                $('.nav-link').removeClass('nav-active');
                $(`.nav-link[href="#${sectionId}"]`).addClass('nav-active');
            }
        });
    });

    // Animate skill bars when they come into view
    function animateSkillBars() {
        $('.skill-progress').each(function() {
            const elementPosition = $(this).offset().top;
            const windowHeight = $(window).height();
            const scrollPosition = $(window).scrollTop() + windowHeight - 100;

            if (scrollPosition > elementPosition) {
                const width = $(this).data('width');
                $(this).css('width', width + '%');
            }
        });
    }

    // Animate elements on scroll
    function animateOnScroll() {
        $('.fade-in').each(function() {
            const elementPosition = $(this).offset().top;
            const windowHeight = $(window).height();
            const scrollPosition = $(window).scrollTop() + windowHeight - 100;

            if (scrollPosition > elementPosition) {
                $(this).addClass('visible');
            }
        });

        animateSkillBars();
    }

    // Initial check for elements in view
    animateOnScroll();

    // Check on scroll
    $(window).scroll(function() {
        animateOnScroll();
    });

    // Form submission
    $('#contact-form').submit(function(e) {
        e.preventDefault();

        // Simple form validation
        const name = $('#name').val();
        const email = $('#email').val();
        const message = $('#message').val();

        if (name && email && message) {
            // In a real application, you would send this data to your Laravel backend
            $('button[type="submit"]').html('<i class="fas fa-check mr-2"></i> Message Sent!');
            $('button[type="submit"]').addClass('bg-secondary');

            setTimeout(() => {
                $('button[type="submit"]').html('<i class="fas fa-paper-plane mr-2"></i> Send Message');
                $('button[type="submit"]').removeClass('bg-secondary');
            }, 3000);

            $('#contact-form')[0].reset();
        } else {
            alert('Please fill in all fields.');
        }
    });

    // Trigger initial animations
    setTimeout(() => {
        $('.fade-in').each(function(index) {
            const $element = $(this);
            setTimeout(() => {
                $element.addClass('visible');
            }, index * 100);
        });
    }, 500);
});
