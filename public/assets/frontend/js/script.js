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

    // Copy to clipboard for contact details
    $('.copy-btn').click(function(e) {
        e.preventDefault();
        const text = $(this).data('copy');
        if (!text) return;

        const $btn = $(this);
        const originalHtml = $btn.html();

        function showSuccess() {
            $btn.html('<i class="fas fa-check text-secondary"></i> <span class="text-secondary font-medium">Copied!</span>');
            setTimeout(function() {
                $btn.html(originalHtml);
            }, 2000);
        }

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function() {
                showSuccess();
            }).catch(function() {
                fallbackCopy(text, showSuccess);
            });
        } else {
            fallbackCopy(text, showSuccess);
        }
    });

    function fallbackCopy(text, onSuccess) {
        const temp = $('<input>');
        $('body').append(temp);
        temp.val(text).select();
        try {
            document.execCommand('copy');
            if (typeof onSuccess === 'function') onSuccess();
        } catch (err) {
            console.error('Fallback copy failed', err);
        }
        temp.remove();
    }

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
