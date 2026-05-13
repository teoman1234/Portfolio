<?php
/**
 * Navigation
 */
?>
<nav class="navbar" id="navbar">
    <div class="container">
        <a href="/" class="nav-logo">Portfolio</a>

        <button class="nav-hamburger" id="navHamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="navMenu">
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
        </button>

        <div class="nav-menu" id="navMenu" role="dialog" aria-label="Navigation menu">
            <ul class="nav-links">
                <li><a href="/" class="nav-link" data-i18n="nav.home">Home</a></li>
                <li><a href="#about" class="nav-link" data-i18n="nav.about">About</a></li>
                <li><a href="#projects" class="nav-link" data-i18n="nav.projects">Projects</a></li>
                <li><a href="#contact" class="nav-link" data-i18n="nav.contact">Contact</a></li>
            </ul>

            <div class="nav-divider" aria-hidden="true"></div>

            <div class="nav-controls">
                <button class="dark-mode-toggle" id="darkModeToggle" aria-label="Toggle dark mode">
                    <span class="toggle-icon" aria-hidden="true">
                        <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z"/></svg>
                        <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                    </span>
                    <span class="toggle-label">Dark</span>
                </button>

                <button class="lang-toggle" id="langToggle" aria-label="Toggle language">
                    <span data-lang="en">EN</span> / <span data-lang="tr">TR</span>
                </button>

                <?php if (isset($_SESSION['admin_id'])): ?>
                    <a href="/admin/dashboard.php" class="nav-admin-btn" data-i18n="nav.admin">Admin</a>
                    <a href="/admin/logout.php" class="nav-admin-btn nav-admin-btn--danger" data-i18n="nav.logout">Logout</a>
                <?php else: ?>
                    <a href="/admin/login.php" class="nav-admin-btn" data-i18n="nav.login">Admin Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<div class="nav-overlay" id="navOverlay" aria-hidden="true"></div>
