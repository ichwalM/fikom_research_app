const backgroundImages = [
    'https://fikom.umi.ac.id/wp-content/uploads/2025/09/ICEEIE-2025-1-2048x1223.webp',
    'https://fikom.umi.ac.id/wp-content/uploads/2025/08/Workshop-Nvidia-1-2048x1223.webp',
    '../../images/hero1.jpg',
    '../../images/hero2.jpg',
];

let currentImageIndex = 0;
const heroSection = document.querySelector('.hero-bg');

function changeBackground() {
    heroSection.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
    currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
}

// Set initial background
changeBackground();

// Change background every 3 seconds
setInterval(changeBackground, 3000);

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add scroll effect to navbar
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('nav');
    if (window.scrollY > 100) {
        navbar.classList.add('bg-dark-charcoal/98');
    } else {
        navbar.classList.remove('bg-dark-charcoal/98');
    }
});