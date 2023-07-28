const navbar = document.querySelector(".nav-container");
navbar.classList.add("nav-main-container")
let mouseEnter = false;

// Function to toggle the navbar background when scrolling
checkMobileView();

function toggleNavbarBackground() {
    const scrollY = window.scrollY;
    let isMobileView = window.matchMedia("(max-width: 767px)").matches;

    if (!isMobileView) {
        if (scrollY > 200) {
            if (!navbar.classList.contains("show-background")) navbar.classList.add("show-background");
            mouseEnter = false;
        } else {
            if (mouseEnter) return;
            navbar.classList.remove("show-background");
        }
    } else {
        navbar.classList.add("show-background");
    }
}

function checkMobileView() {
    let isMobileView = window.matchMedia("(max-width: 991px)").matches;

    if (isMobileView) {
        // If in mobile view, always keep the background visible
        navbar.classList.add("show-background");
    } else {
        toggleNavbarBackground();
    }
}

// Event listener to trigger the function on scroll
window.addEventListener("scroll", toggleNavbarBackground);

// Add event listeners for mouseenter and mouseleave
navbar.addEventListener("mouseenter", function () {
    if (!navbar.classList.contains("show-background")) navbar.classList.add("show-background");
    mouseEnter = true;
});

navbar.addEventListener("mouseleave", function () {
    mouseEnter = false;
    toggleNavbarBackground();
});

window.addEventListener('resize', checkMobileView);
