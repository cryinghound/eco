document.addEventListener("DOMContentLoaded", function () {
// MAIN PAGE - SLIDER
    const slides = document.querySelectorAll('.slide');
    const slidesContainer = document.querySelector('.slides');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    let currentSlide = 0;

    function updateSlider() {
        if (slides.length === 0 || !slidesContainer) {
            console.error("No slides found! Check your HTML.");
            return;
        }
        const slideWidth = slides[0].clientWidth;
        slidesContainer.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    }

    function changeSlide(direction) {
        if (slides.length === 0) {
            console.error("Slides are missing!");
            return;
        }
        currentSlide += direction;
        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        } else if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        updateSlider();
    }

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', () => changeSlide(-1));
        nextButton.addEventListener('click', () => changeSlide(1));
    } else {
        console.error("Slider navigation buttons not found!");
    }

    setInterval(() => changeSlide(1), 5000);
    updateSlider();

// SIDEBAR MENU
    const menuItems = document.querySelectorAll(".sidebar-menu li a");
    const contentSections = document.querySelectorAll(".content-section");

    console.log("Menu Items Found:", menuItems.length);
    console.log("Content Sections Found:", contentSections.length);

    if (menuItems.length === 0 || contentSections.length === 0) {
        console.error("Sidebar menu or content sections are missing!");
        return;
    }

    menuItems.forEach(menuItem => {
        menuItem.addEventListener("click", function (event) {
            event.preventDefault();
            console.log("Clicked:", this.getAttribute("data-content"));

            menuItems.forEach(link => link.classList.remove("active"));
            this.classList.add("active");

            contentSections.forEach(section => section.style.display = "none");
            const selectedSection = document.getElementById(this.getAttribute("data-content"));
            if (selectedSection) {
                selectedSection.style.display = "block";
            } else {
                console.error("Section not found:", this.getAttribute("data-content"));
            }
        });
    });
});

// LOGIN BUTTON
document.getElementById("login-btn").addEventListener("click", function () {
    window.location.href = "login.php"; });

// DONATE BUTTON
document.addEventListener("DOMContentLoaded", function () {
    const donateBtn = document.getElementById("donate-btn");
    const modal = document.getElementById("donation-modal");
    const closeBtn = document.querySelector(".close");

    if (donateBtn && modal) {
        donateBtn.addEventListener("click", function () {
            modal.style.display = "block"; // Show modal
        });

        closeBtn.addEventListener("click", function () {
            modal.style.display = "none"; // Hide modal
        });

        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none"; // Hide modal when clicking outside
            }
        });
    } else {
        console.error("Donate button or modal not found!");
    }
});

//Sign up Temp Btn

document.getElementById("signup-btn").addEventListener("click", function () {
    window.location.href = "signup.php"; });



