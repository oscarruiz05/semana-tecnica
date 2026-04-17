// Back to top
const btn = document.getElementById('back-to-top');
window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto';
    } else {
        btn.style.opacity = '0';
        btn.style.pointerEvents = 'none';
    }
    updateActiveNav();
});

// Smooth scroll to section
function scrollToSection(id) {
    const el = document.getElementById(id);
    if (!el) return;
    const offset = 80; // navbar height
    const top = el.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top, behavior: 'smooth' });
}

// Nav links smooth scroll
document.querySelectorAll('a.nav-link').forEach(link => {
    link.addEventListener('click', e => {
        const href = link.getAttribute('href');
        if (!href.startsWith('#')) return;
        e.preventDefault();
        scrollToSection(href.slice(1));
    });
});

// Active nav highlight based on scroll position
const sections = ['agenda', 'speakers', 'ubicacion', 'nosotros'];
function updateActiveNav() {
    const scrollY = window.scrollY + 120;
    let current = '';

    sections.forEach(id => {
        const el = document.getElementById(id);
        if (el && el.offsetTop <= scrollY) current = id;
    });

    document.querySelectorAll('a.nav-link').forEach(link => {
        const href = link.getAttribute('href').slice(1);
        if (href === current) {
            link.classList.add('text-primary', 'border-b-2', 'border-primary', 'pb-1');
            link.classList.remove('text-on-surface');
        } else {
            link.classList.remove('text-primary', 'border-b-2', 'border-primary', 'pb-1');
            link.classList.add('text-on-surface');
        }
    });
}
