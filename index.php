<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Full-Stack Web Developer Portfolio">
    <title>My Portfolio - Full-Stack Developer</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/nav.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <img src="/images/profile.jpg" alt="Profile Picture" class="hero-image">
                    <h1>Hi, I'm a Full-Stack Developer</h1>
                    <p>Building modern web applications with HTML5, CSS3, JavaScript, PHP & MySQL</p>
                    <p class="subtitle-small">Currently: 4th Year Software Engineering @ Haliç University</p>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <div class="container">
                <h2>About Me</h2>
                <div class="about-grid">
                    <article class="about-card">
                        <h3>Education</h3>
                        <p><strong>Haliç University</strong><br>
                        4th Year - Software Engineering<br>
                        <em>Specialized in Web Development & Database Management</em></p>
                    </article>
                    <article class="about-card">
                        <h3>Internship Experience</h3>
                        <p><strong>Kodiks Yazılım</strong><br>
                        Backend Development Intern<br>
                        <em>ASP.NET Core & Entity Framework Core</em></p>
                    </article>
                    <article class="about-card">
                        <h3>Skills</h3>
                        <ul>
                            <li>Frontend: HTML5, CSS3, JavaScript, React</li>
                            <li>Backend: PHP, ASP.NET Core, Python, FastAPI</li>
                            <li>Database: MySQL, PostgreSQL, Prisma ORM</li>
                            <li>Tools: Git, Docker, VS Code</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="projects">
            <div class="container">
                <h2>Projects</h2>
                <div class="projects-grid" id="projectsContainer">
                    <!-- Projeler AJAX ile yüklenir -->
                    <p class="loading">Loading projects...</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <h2>Get In Touch</h2>
                <form id="contactForm" class="contact-form">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required>
                        <span class="error-message" id="nameError"></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                        <span class="error-message" id="emailError"></span>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                        <span class="error-message" id="messageError"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <p id="successMessage" class="success-message" style="display:none;">Message sent successfully!</p>
                </form>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="/js/validation.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/dark-mode.js"></script>
</body>
</html>
