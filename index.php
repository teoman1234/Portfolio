<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Full-Stack Web Developer Portfolio">
    <title>My Portfolio - Full-Stack Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Source+Sans+3:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <img src="/PortfolioProject/images/profile.jpg" alt="Profile Picture" class="hero-image">
                    <h1 data-i18n="hero.title">Hi, I'm a full-stack developer.</h1>
                    <p data-i18n="hero.subtitle">Focused on clean UI, solid APIs, and fast delivery.</p>
                    <p class="subtitle-small" data-i18n="hero.education">Haliç University, 4th year Software Engineering</p>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <div class="container">
                <h2 data-i18n="about.title">About Me</h2>
                <div class="about-grid">
                    <article class="about-card">
                        <h3 data-i18n="about.education.title">Education</h3>
                        <p>
                            <strong data-i18n="about.education.university">Haliç University</strong><br>
                            <span data-i18n="about.education.degree">4th Year - Software Engineering</span><br>
                            <em data-i18n="about.education.specialization">Focused on web development and data systems</em>
                        </p>
                    </article>
                    <article class="about-card">
                        <h3 data-i18n="about.experience.title">Internship Experience</h3>
                        <p>
                            <strong data-i18n="about.experience.company">Kodiks Yazılım</strong><br>
                            <span data-i18n="about.experience.position">Backend Development Intern</span><br>
                            <em data-i18n="about.experience.tech">ASP.NET Core & Entity Framework Core</em>
                        </p>
                    </article>
                    <article class="about-card">
                        <h3 data-i18n="about.skills.title">Skills</h3>
                        <ul>
                            <li data-i18n="about.skills.frontend">Frontend: HTML5, CSS3, JavaScript, React</li>
                            <li data-i18n="about.skills.backend">Backend: PHP, ASP.NET Core, Python, FastAPI</li>
                            <li data-i18n="about.skills.database">Database: MySQL, PostgreSQL, Prisma ORM</li>
                            <li data-i18n="about.skills.tools">Tools: Git, Docker, VS Code</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="projects">
            <div class="container">
                <h2 data-i18n="projects.title">Projects</h2>
                <div class="projects-grid" id="projectsContainer">
                    <p class="loading" data-i18n="loading">Loading projects...</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <h2 data-i18n="contact.title">Get In Touch</h2>
                <form id="contactForm" class="contact-form">
                    <div class="form-group">
                        <label for="name" data-i18n="contact.form.name">Name *</label>
                        <input type="text" id="name" name="name" required>
                        <span class="error-message" id="nameError"></span>
                    </div>

                    <div class="form-group">
                        <label for="email" data-i18n="contact.form.email">Email *</label>
                        <input type="email" id="email" name="email" required>
                        <span class="error-message" id="emailError"></span>
                    </div>

                    <div class="form-group">
                        <label for="message" data-i18n="contact.form.message">Message *</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                        <span class="error-message" id="messageError"></span>
                    </div>

                    <button type="submit" class="btn btn-primary" data-i18n="contact.form.submit">Send Message</button>
                    <p id="successMessage" class="success-message" style="display:none;" data-i18n="contact.form.success">Message sent successfully!</p>
                </form>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="/PortfolioProject/js/i18n.js"></script>
    <script src="/PortfolioProject/js/validation.js"></script>
    <script src="/PortfolioProject/js/main.js"></script>
    <script src="/PortfolioProject/js/dark-mode.js"></script>
    <script src="/PortfolioProject/js/cookie-consent.js"></script>
</body>
</html>
