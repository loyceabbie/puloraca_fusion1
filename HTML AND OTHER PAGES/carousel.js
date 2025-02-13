document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.next');
    const prevButton = document.querySelector('.prev');
    const dotsNav = document.querySelector('.carousel-nav');
    const dots = Array.from(dotsNav.children);

    const slideWidth = slides[0].getBoundingClientRect().width;
    let currentIndex = 0;
    const slidesPerView = window.innerWidth > 1024 ? 3 : window.innerWidth > 768 ? 2 : 1;
    const maxIndex = slides.length - slidesPerView;

    // Arrange slides next to each other
    slides.forEach((slide, index) => {
        slide.style.left = slideWidth * index + 'px';
    });

    // Move slide
    const moveToSlide = (index) => {
        if (index < 0) index = 0;
        if (index > maxIndex) index = maxIndex;
        
        currentIndex = index;
        track.style.transform = `translateX(-${index * slideWidth}px)`;

        // Update dots
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === Math.floor(index / slidesPerView));
        });

        // Update buttons
        prevButton.style.opacity = index === 0 ? '0.5' : '1';
        nextButton.style.opacity = index === maxIndex ? '0.5' : '1';
    };

    // Click handlers
    nextButton.addEventListener('click', () => {
        moveToSlide(currentIndex + 1);
    });

    prevButton.addEventListener('click', () => {
        moveToSlide(currentIndex - 1);
    });

    dotsNav.addEventListener('click', e => {
        const targetDot = e.target.closest('button');
        if (!targetDot) return;

        const targetIndex = dots.findIndex(dot => dot === targetDot) * slidesPerView;
        moveToSlide(targetIndex);
    });

    // Auto-play
    let autoplayInterval;
    const startAutoplay = () => {
        autoplayInterval = setInterval(() => {
            const nextIndex = currentIndex === maxIndex ? 0 : currentIndex + 1;
            moveToSlide(nextIndex);
        }, 5000);
    };

    const stopAutoplay = () => {
        clearInterval(autoplayInterval);
    };

    // Start autoplay
    startAutoplay();

    // Pause on hover
    track.addEventListener('mouseenter', stopAutoplay);
    track.addEventListener('mouseleave', startAutoplay);

    // Handle window resize
    window.addEventListener('resize', () => {
        location.reload(); // Refresh page on resize to recalculate dimensions
    });
});