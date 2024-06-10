document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-images');
    const slides = document.querySelectorAll('.carousel-image');
    const nextButton = document.querySelector('.carousel .next');
    const prevButton = document.querySelector('.carousel .prev');

    let currentSlideIndex = 0;
    let totalWidthOfSlides = 0;

    // Calculate the total width of all slides
    slides.forEach(slide => {
        totalWidthOfSlides += slide.offsetWidth + parseInt(window.getComputedStyle(slide).marginRight, 10);
    });

    function updateCarousel() {
        const carouselViewportWidth = carousel.offsetWidth;
        const maxScrollableWidth = totalWidthOfSlides - carouselViewportWidth;

        // Calculate the width of a single slide move
        const singleSlideMove = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginRight, 10);
        // Calculate the current offset
        const currentOffset = currentSlideIndex * singleSlideMove;
        
        // Update the carousel transform
        carousel.style.transform = `translateX(-${currentOffset}px)`;

        // Disable prev button if at the start
        prevButton.disabled = currentSlideIndex === 0;
        // Disable next button if at the end
        nextButton.disabled = currentOffset >= maxScrollableWidth;
    }

    nextButton.addEventListener('click', () => {
        // Ensure moving next won't go beyond the total width
        const singleSlideMove = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginRight, 10);
        const potentialNewOffset = (currentSlideIndex + 1) * singleSlideMove;
        const maxScrollableWidth = totalWidthOfSlides - carousel.offsetWidth;

        if (potentialNewOffset <= maxScrollableWidth) {
            currentSlideIndex += 1;
            updateCarousel();
        }
    });

    prevButton.addEventListener('click', () => {
        if (currentSlideIndex > 0) {
            currentSlideIndex -= 1;
            updateCarousel();
        }
    });

    // Initial setup
    updateCarousel();

    // Adjust on resize to ensure functionality remains correct
    window.addEventListener('resize', () => {
        // Recalculate the total width of all slides as the carousel width might have changed
        totalWidthOfSlides = 0;
        slides.forEach(slide => {
            totalWidthOfSlides += slide.offsetWidth + parseInt(window.getComputedStyle(slide).marginRight, 10);
        });
        updateCarousel();
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // Mendefinisikan fungsi filterCards
    function filterCards(status) {
        let hasVisibleCards = false;
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            if (status === 'all' || card.getAttribute('data-status') === status) {
                card.style.display = 'block';
                hasVisibleCards = true;
            } else {
                card.style.display = 'none';
            }
        });

        // Menampilkan atau menyembunyikan pesan tidak ada kecocokan
        const noMatchMessage = document.querySelector('.no-match-message');
        if (noMatchMessage) {
            noMatchMessage.style.display = hasVisibleCards ? 'none' : 'block';
        }
    }

    // Membuat pesan tidak ada kecocokan jika belum ada
    let noMatchMessage = document.querySelector('.no-match-message');
    if (!noMatchMessage) {
        noMatchMessage = document.createElement('p');
        noMatchMessage.className = 'no-match-message';
        noMatchMessage.textContent = 'No events match your filter.';
        noMatchMessage.style.display = 'none';
        noMatchMessage.style.color = 'white'; 
        document.querySelector('.card-container').appendChild(noMatchMessage);
    }

    // Menangani perubahan pada dropdown filter
    const eventFilterDropdown = document.getElementById('eventFilter');
    if (eventFilterDropdown) {
        eventFilterDropdown.addEventListener('change', function() {
            filterCards(this.value);
        });
    }
});







document.querySelectorAll('.filter-button').forEach(button => {
    button.addEventListener('click', function() {
        filterCards(this.getAttribute('data-filter'));
    });
    
    // Handle keyboard events for accessibility
    button.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
        filterCards(this.getAttribute('data-filter'));
        }
    });
});
