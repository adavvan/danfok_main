function slideInOnScroll(entries) {
    entries.forEach((entry) => {
      const target = entry.target;
      if (entry.isIntersecting) {
        anime({
          targets: target,
          translateX: ['-100px', '0'], // Slide in from the left
          opacity: [0, 1], // Fade in
          easing: 'easeInOutSine', // Set the easing function
          duration: 1300, // Animation duration in milliseconds
          complete: () => {
            // Remove the Intersection Observer entry once the animation is done
            scrollObserver.unobserve(target);
          }
        });
      }
    });
  }

  const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll');
  const scrollObserver = new IntersectionObserver(slideInOnScroll, { rootMargin: '-50px' });
  animateOnScrollElements.forEach((element) => scrollObserver.observe(element));

  // Function to fade in the elements using Anime.js when they are in the viewport
function fadeInOnScroll(entries) {
    entries.forEach((entry) => {
        const target = entry.target;
        if (entry.isIntersecting) {
            anime({
                targets: target,
                opacity: [0, 1], // Fade in
                easing: 'easeInOutSine', // Set the easing function
                duration: 1000, // Animation duration in milliseconds
                complete: () => {
                    // Remove the Intersection Observer entry once the animation is done
                    observer.unobserve(target);
                }
            });
        }
    });
}

const animateFadeInElements = document.querySelectorAll('.animate-fade-in');
const observer = new IntersectionObserver(fadeInOnScroll, { rootMargin: '-50px' });
animateFadeInElements.forEach((element) => observer.observe(element));