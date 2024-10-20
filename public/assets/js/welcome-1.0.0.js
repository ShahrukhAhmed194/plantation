const hamburger = document.getElementById('hamburger');
const navLinks = document.querySelector('.nav-links');
const navLi = document.querySelector('nav ul');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('show');

    if (navLinks.classList.contains('show')) {
        navLi.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    } else {
        navLi.style.backgroundColor = '';
    }
});
