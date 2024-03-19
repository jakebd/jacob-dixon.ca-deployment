const hamburger = document.querySelector('nav .hamburger');
const navMenu = document.querySelector('nav .menuItems');
const submenu = document.querySelector('nav ul.submenu')

hamburger.addEventListener("click", ()=>{
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active')

    if (navMenu.classList.contains('active')) {
        navMenu.style.display = 'flex';
            navMenu.style.opacity = 1;
    } else {
        navMenu.style.opacity = 0;
            navMenu.style.display = 'none';
    }
})

document.querySelectorAll('nav-link').forEach(n => n.addEventListener("click", ()=>{
    hamburger.classList.remove("active")
    navMenu.classList.remove("active")

    if (!navMenu.classList.contains('active')) {
        navMenu.style.opacity = 0;
            navMenu.style.display = 'none';
    } else {
        navMenu.style.display = 'flex';
            navMenu.style.opacity = 1;
    }
}))

// Show menuItems when screen size increases
window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
        navMenu.style.display = 'inline-flex';
        navMenu.style.opacity = 1;
    } else {
        navMenu.style.display = 'none';
    }
});