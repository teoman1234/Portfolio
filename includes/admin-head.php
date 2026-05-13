<?php
/**
 * Admin sayfaları için ortak <head> içeriği
 * $adminPageTitle değişkeni include öncesinde tanımlanmalı
 */
$pageTitle = isset($adminPageTitle) ? $adminPageTitle . ' - Portfolio Admin' : 'Portfolio Admin';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#1f3a5f">
<meta name="robots" content="noindex, nofollow">
<title><?php echo htmlspecialchars($pageTitle); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Source+Sans+3:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/PortfolioProject/css/style.css?v=<?php echo time(); ?>">
<script>
    // FOUC önleme: dark mode class'ını JS yüklenmeden önce uygula
    (function() {
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark-mode-pending');
        }
    })();
</script>
