/**
 * Dark Mode Toggle
 */

// FOUC önleme: sayfa yüklenmeden önce dark mode uygula
(function() {
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
})();

document.addEventListener('DOMContentLoaded', () => {
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (!darkModeToggle) return;

    const toggleLabel = darkModeToggle.querySelector('.toggle-label');
    const isDark = document.body.classList.contains('dark-mode');
    if (toggleLabel) toggleLabel.textContent = isDark ? 'Light' : 'Dark';

    darkModeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const nowDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', nowDark);
        if (toggleLabel) toggleLabel.textContent = nowDark ? 'Light' : 'Dark';
    });
});
