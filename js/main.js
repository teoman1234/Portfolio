/**
 * Main JavaScript
 */

// ── Hamburger menu ────────────────────────────────────────────────────────────

const initNavMenu = () => {
    const hamburger = document.getElementById('navHamburger');
    const menu      = document.getElementById('navMenu');
    const overlay   = document.getElementById('navOverlay');

    if (!hamburger || !menu || !overlay) return;

    const open = () => {
        hamburger.classList.add('is-open');
        hamburger.setAttribute('aria-expanded', 'true');
        menu.classList.add('is-open');
        overlay.classList.add('is-visible');
        document.body.style.overflow = 'hidden';
    };

    const close = () => {
        hamburger.classList.remove('is-open');
        hamburger.setAttribute('aria-expanded', 'false');
        menu.classList.remove('is-open');
        overlay.classList.remove('is-visible');
        document.body.style.overflow = '';
    };

    hamburger.addEventListener('click', () => {
        hamburger.classList.contains('is-open') ? close() : open();
    });

    overlay.addEventListener('click', close);

    // Close on nav-link click (smooth scroll targets)
    menu.querySelectorAll('.nav-link[href^="#"]').forEach(link => {
        link.addEventListener('click', close);
    });

    // Close on Escape
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') close();
    });

    // Close if resized back to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) close();
    });
};

// ── Projects (AJAX) ───────────────────────────────────────────────────────────

const loadProjects = async () => {
    const container = document.getElementById('projectsContainer');
    if (!container) return;

    try {
        const response = await fetch('/PortfolioProject/api/get-projects.php');

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
        }

        const projects = await response.json();

        if (projects.error) {
            throw new Error(projects.error);
        }

        container.innerHTML = '';

        if (projects.length === 0) {
            container.innerHTML = `<p class="loading">${typeof i18n !== 'undefined' ? i18n.t('noData') : 'No projects found yet.'}</p>`;
            return;
        }

        projects.forEach((project, index) => {
            const card = document.createElement('article');
            card.className = 'project-card';
            card.style.animation = `slideIn 0.5s ease-out ${index * 0.1}s both`;

            const techTags = project.technologies
                .split(',')
                .map(t => `<span class="tech-tag">${t.trim()}</span>`)
                .join('');

            const viewLabel = typeof i18n !== 'undefined' ? i18n.t('projects.viewProject') : 'View Project →';

            card.innerHTML = `
                <div class="project-content">
                    <h3>${project.title}</h3>
                    <p>${project.description}</p>
                    <div class="project-tech">${techTags}</div>
                    ${project.link ? `<a href="${project.link}" target="_blank" rel="noopener noreferrer" class="project-link">${viewLabel}</a>` : ''}
                </div>
            `;

            container.appendChild(card);
        });
    } catch {
        const container = document.getElementById('projectsContainer');
        if (container) {
            container.innerHTML = `<p class="loading">${typeof i18n !== 'undefined' ? i18n.t('error') : 'An error occurred'}</p>`;
        }
    }
};

// ── Scroll effects ────────────────────────────────────────────────────────────

const updateScrollProgress = () => {
    const bar = document.getElementById('scrollProgress');
    if (!bar) return;
    const scrolled = window.scrollY;
    const total    = document.documentElement.scrollHeight - window.innerHeight;
    bar.style.width = total > 0 ? `${(scrolled / total) * 100}%` : '0';
};

const updateNavbarState = () => {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;
    navbar.classList.toggle('is-scrolled', window.scrollY > 20);
};

const updateActiveNav = () => {
    const sections  = document.querySelectorAll('main > section[id]');
    const navLinks  = document.querySelectorAll('.nav-links a[href^="#"]');
    let current = '';

    sections.forEach(section => {
        if (window.scrollY >= section.offsetTop - 200) {
            current = section.id;
        }
    });

    navLinks.forEach(link => {
        link.classList.toggle('active', link.getAttribute('href').slice(1) === current);
    });
};

const handleScroll = () => {
    updateActiveNav();
    updateScrollProgress();
    updateNavbarState();
};

// ── Scroll animations ─────────────────────────────────────────────────────────

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -100px 0px' });

// ── Smooth scroll ─────────────────────────────────────────────────────────────

const initSmoothScroll = () => {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
};

// ── Init ──────────────────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', () => {
    initNavMenu();
    loadProjects();
    initSmoothScroll();

    document.querySelectorAll('.about-card, .project-card, .contact-form, .section-title').forEach(el => {
        observer.observe(el);
    });

    handleScroll();
});

window.addEventListener('scroll', handleScroll, { passive: true });
window.addEventListener('load', handleScroll);

// Re-render projects on language change (button labels change)
document.addEventListener('languageChanged', () => {
    loadProjects();
});
