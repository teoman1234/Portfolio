<?php
/**
 * Navigation - Semantic HTML5 Nav Komponenti
 */
?>
<nav class="navbar">
    <div class="container">
        <ul class="nav-menu">
            <li><a href="/PortofiloProject/" class="nav-link">Home</a></li>
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#projects" class="nav-link">Projects</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
            <?php if (isset($_SESSION['admin_id'])): ?>
                <li><a href="/PortofiloProject/admin/dashboard.php" class="nav-link admin-link">Admin</a></li>
                <li><a href="/PortofiloProject/admin/logout.php" class="nav-link logout-link">Logout</a></li>
            <?php else: ?>
                <li><a href="/PortofiloProject/admin/login.php" class="nav-link admin-link">Admin Login</a></li>
            <?php endif; ?>
        </ul>
        <button class="dark-mode-toggle" id="darkModeToggle">🌙</button>
    </div>
</nav>
