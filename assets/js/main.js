document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');

    menuToggle.addEventListener('click', function () {
        navMenu.classList.toggle('active');
        menuIcon.classList.toggle('active');
        closeIcon.classList.toggle('active');
    });
});