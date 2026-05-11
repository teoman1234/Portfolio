/**
 * Main JavaScript
 * DOM manipulation, Projects loading via AJAX
 */

// Load projects from database via AJAX
const loadProjects = async () => {
    try {
        const response = await fetch('/PortofiloProject/api/get-projects.php');
        const projects = await response.json();

        const projectsContainer = document.getElementById('projectsContainer');
        projectsContainer.innerHTML = '';

        if (projects.length === 0) {
            projectsContainer.innerHTML = '<p>No projects available yet.</p>';
            return;
        }

        projects.forEach(project => {
            const projectCard = document.createElement('article');
            projectCard.className = 'project-card';

            const techTags = project.technologies
                .split(',')
                .map(tech => `<span class="tech-tag">${tech.trim()}</span>`)
                .join('');

            projectCard.innerHTML = `
                <div class="project-image">📱</div>
                <div class="project-content">
                    <h3>${project.title}</h3>
                    <p>${project.description}</p>
                    <div class="project-tech">
                        ${techTags}
                    </div>
                    ${project.link ? `<a href="${project.link}" target="_blank" class="project-link">View Project →</a>` : ''}
                </div>
            `;

            projectsContainer.appendChild(projectCard);
        });
    } catch (error) {
        console.error('Error loading projects:', error);
        document.getElementById('projectsContainer').innerHTML = '<p>Error loading projects</p>';
    }
};

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    loadProjects();
});

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
