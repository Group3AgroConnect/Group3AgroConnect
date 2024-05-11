// Swiper Initialization
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    speed: 800,
});

// Smooth Scrolling
$("nav a").on("click", function (e) {
    if (this.hash !== "") {
        e.preventDefault(); // Prevent the default jump to anchor
        const hash = this.hash; // Get the target section ID from the href attribute

        $("html, body").animate(
            {
                scrollTop: $(hash).offset().top, // Smooth scroll to the target section
            },
            800 // Duration in milliseconds
        );
    }
});

// Handling Multi-Page Form Navigation
const nextBtns = document.querySelectorAll("#next-btn"); // Select all next buttons
const prevBtns = document.querySelectorAll("#prev-btn"); // Select all previous buttons
const pages = document.querySelectorAll(".page"); // Select all form pages
const progressBars = document.querySelectorAll(".progress-bar"); // Select all progress bars

let currentPageIndex = 0; // Track the current page index

// Function to update the visibility of pages based on the current index
function updatePageVisibility() {
    pages.forEach((page, index) => {
        if (index === currentPageIndex) {
            page.classList.add("active");
        } else {
            page.classList.remove("active");
        }
    });

    progressBars.forEach((progress, index) => {
        if (index <= currentPageIndex) {
            progress.classList.add("active");
        } else {
            progress.classList.remove("active");
        }
    });
}

// Event Handlers for Next and Previous Buttons
nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        if (currentPageIndex < pages.length - 1) { // Ensure there's a next page
            currentPageIndex++;
            updatePageVisibility(); // Update page visibility and progress
        }
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        if (currentPageIndex > 0) { // Ensure there's a previous page
            currentPageIndex--;
            updatePageVisibility(); // Update page visibility and progress
        }
    });
});

// Initialize with the correct visibility on page load
updatePageVisibility(); // Set the initial active page and progress