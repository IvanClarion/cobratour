const navItems = document.querySelectorAll('.clickable');

// Get the current page from the URL path
const currentPage = window.location.pathname;

// Function to match the current page with the corresponding nav item
navItems.forEach((item) => {
    const anchor = item.querySelector('a');
    if (anchor.href.includes(currentPage)) {
        item.classList.add('clicked');
    }
});
