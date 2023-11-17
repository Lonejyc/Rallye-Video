function toggleMenu() {
    const nav = document.querySelector('.navbar');
    const burger = document.querySelector('.burger');
    const navLink = document.querySelectorAll('.nav_link a');

    burger.addEventListener('click', () => {
        nav.classList.toggle('show_nav');
    });
    navLink.forEach((link) => {
        link.addEventListener('click', () => {
            nav.classList.remove('show_nav');
            console.log('clicked');
        });
    });
}
toggleMenu();