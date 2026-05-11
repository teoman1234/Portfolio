/**
 * Dark Mode Toggle
 * Tema değiştirme işlevselliği
 */

const darkModeToggle = document.getElementById('darkModeToggle');

// Dark mode durumunu localStorage'dan kontrol et
const isDarkMode = localStorage.getItem('darkMode') === 'true';

if (isDarkMode) {
    document.body.classList.add('dark-mode');
    darkModeToggle.textContent = '☀️';
}

// Dark mode toggle
darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');

    localStorage.setItem('darkMode', isDark);
    darkModeToggle.textContent = isDark ? '☀️' : '🌙';
});
