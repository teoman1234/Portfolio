/**
 * i18n - Internationalization Module
 * Türkçe (TR) ve İngilizce (EN) dil desteği
 */

const i18n = {
    currentLang: localStorage.getItem('language') || 'tr',

    translations: {
        tr: {
            // Navigation
            'nav.home': 'Anasayfa',
            'nav.about': 'Hakkımda',
            'nav.projects': 'Projeler',
            'nav.contact': 'İletişim',
            'nav.admin': 'Admin',
            'nav.logout': 'Çıkış',
            'nav.login': 'Admin Giriş',

            // Header

            // Hero
            'hero.kicker': 'Portfolyo',
            'hero.title': 'Merhaba, ben full-stack geliştiriciyim.',
            'hero.subtitle': 'Temiz arayüzler, sağlam API\'ler ve hızlı teslim odaklı çalışıyorum.',
            'hero.education': 'Haliç Üniversitesi, Yazılım Mühendisliği 4. sınıf',

            // About
            'about.title': 'Hakkımda',
            'about.education.title': 'Eğitim',
            'about.education.university': 'Haliç Üniversitesi',
            'about.education.degree': '4. Sınıf - Yazılım Mühendisliği',
            'about.education.specialization': 'Web geliştirme ve veri yönetimi odaklıyım',
            'about.experience.title': 'Staj Deneyimi',
            'about.experience.company': 'Kodiks Yazılım',
            'about.experience.position': 'Backend Geliştirme Stajyeri',
            'about.experience.tech': 'ASP.NET Core & Entity Framework Core',
            'about.skills.title': 'Yetenekler',
            'about.skills.frontend': 'Frontend: HTML5, CSS3, JavaScript, React',
            'about.skills.backend': 'Backend: PHP, ASP.NET Core, Python, FastAPI',
            'about.skills.database': 'Veritabanı: MySQL, PostgreSQL, Prisma ORM',
            'about.skills.tools': 'Araçlar: Git, Docker, VS Code',

            // Projects
            'projects.title': 'Projeler',
            'projects.technologies': 'Teknolojiler',
            'projects.viewProject': 'Projeyi İncele →',

            // Contact
            'contact.title': 'İletişim',
            'contact.form.name': 'Ad *',
            'contact.form.email': 'E-posta *',
            'contact.form.message': 'Mesaj *',
            'contact.form.submit': 'Mesaj Gönder',
            'contact.form.sending': 'Gönderiliyor...',
            'contact.form.success': 'Mesaj başarıyla gönderildi!',
            'contact.form.error.required': 'Bu alan zorunludur',
            'contact.form.error.email': 'Geçerli bir e-posta adresi girin',

            // Loading & Messages
            'loading': 'Projeler yükleniyor...',
            'error': 'Bir hata oluştu',
            'noData': 'Veri bulunamadı',

            // Admin - Login
            'admin.login.title': 'Admin Girişi',
            'admin.login.username': 'Kullanıcı Adı',
            'admin.login.password': 'Şifre',
            'admin.login.submit': 'Giriş Yap',
            'admin.login.backHome': '← Anasayfaya Dön',

            // Admin - Dashboard
            'admin.dashboard.title': 'Admin Paneli',
            'admin.dashboard.loggedAs': 'Giriş yapıldı:',
            'admin.dashboard.projects': 'Proje Yönetimi',
            'admin.dashboard.addProject': 'Yeni Proje Ekle',
            'admin.dashboard.technologies': 'Teknolojiler:',
            'admin.dashboard.messages': 'Gelen Mesajlar',
            'admin.dashboard.noProjects': 'Henüz proje yok.',
            'admin.dashboard.noMessages': 'Henüz mesaj gelmedi.',

            // Admin - Edit
            'admin.edit.title': 'Projeyi Düzenle',
            'admin.edit.success': 'Proje başarıyla güncellendi!',
            'admin.edit.save': 'Değişiklikleri Kaydet',

            // Admin - Table
            'admin.table.date': 'Tarih',
            'admin.table.name': 'İsim',
            'admin.table.email': 'E-posta',
            'admin.table.message': 'Mesaj',

            // Admin - Form
            'admin.form.title': 'Proje Başlığı *',
            'admin.form.description': 'Açıklama *',
            'admin.form.technologies': 'Teknolojiler *',
            'admin.form.link': 'Proje Linki (isteğe bağlı)',
            'admin.form.save': 'Projeyi Kaydet',

            // Admin - Actions
            'admin.action.edit': 'Düzenle',
            'admin.action.delete': 'Sil',
            'admin.action.cancel': 'İptal',
            'admin.modal.addTitle': 'Yeni Proje Ekle',
            'admin.confirm.delete': 'Bu projeyi silmek istediğinizden emin misiniz?',
            'admin.alert.saved': 'Proje başarıyla kaydedildi!',
            'admin.alert.error': 'Bir hata oluştu',
        },
        en: {
            // Navigation
            'nav.home': 'Home',
            'nav.about': 'About',
            'nav.projects': 'Projects',
            'nav.contact': 'Contact',
            'nav.admin': 'Admin',
            'nav.logout': 'Logout',
            'nav.login': 'Admin Login',

            // Header

            // Hero
            'hero.kicker': 'Portfolio',
            'hero.title': 'Hi, I\'m a full-stack developer.',
            'hero.subtitle': 'Focused on clean UI, solid APIs, and fast delivery.',
            'hero.education': 'Haliç University, 4th year Software Engineering',

            // About
            'about.title': 'About Me',
            'about.education.title': 'Education',
            'about.education.university': 'Haliç University',
            'about.education.degree': '4th Year - Software Engineering',
            'about.education.specialization': 'Focused on web development and data systems',
            'about.experience.title': 'Internship Experience',
            'about.experience.company': 'Kodiks Yazılım',
            'about.experience.position': 'Backend Development Intern',
            'about.experience.tech': 'ASP.NET Core & Entity Framework Core',
            'about.skills.title': 'Skills',
            'about.skills.frontend': 'Frontend: HTML5, CSS3, JavaScript, React',
            'about.skills.backend': 'Backend: PHP, ASP.NET Core, Python, FastAPI',
            'about.skills.database': 'Database: MySQL, PostgreSQL, Prisma ORM',
            'about.skills.tools': 'Tools: Git, Docker, VS Code',

            // Projects
            'projects.title': 'Projects',
            'projects.technologies': 'Technologies',
            'projects.viewProject': 'View Project →',

            // Contact
            'contact.title': 'Get In Touch',
            'contact.form.name': 'Name *',
            'contact.form.email': 'Email *',
            'contact.form.message': 'Message *',
            'contact.form.submit': 'Send Message',
            'contact.form.sending': 'Sending...',
            'contact.form.success': 'Message sent successfully!',
            'contact.form.error.required': 'This field is required',
            'contact.form.error.email': 'Please enter a valid email address',

            // Loading & Messages
            'loading': 'Loading projects...',
            'error': 'An error occurred',
            'noData': 'No data found',

            // Admin - Login
            'admin.login.title': 'Admin Login',
            'admin.login.username': 'Username',
            'admin.login.password': 'Password',
            'admin.login.submit': 'Login',
            'admin.login.backHome': '← Back to Home',

            // Admin - Dashboard
            'admin.dashboard.title': 'Admin Dashboard',
            'admin.dashboard.loggedAs': 'Logged in as:',
            'admin.dashboard.projects': 'Projects Management',
            'admin.dashboard.addProject': 'Add New Project',
            'admin.dashboard.technologies': 'Technologies:',
            'admin.dashboard.messages': 'Messages Received',
            'admin.dashboard.noProjects': 'No projects yet.',
            'admin.dashboard.noMessages': 'No messages received yet.',

            // Admin - Edit
            'admin.edit.title': 'Edit Project',
            'admin.edit.success': 'Project updated successfully!',
            'admin.edit.save': 'Save Changes',

            // Admin - Table
            'admin.table.date': 'Date',
            'admin.table.name': 'Name',
            'admin.table.email': 'Email',
            'admin.table.message': 'Message',

            // Admin - Form
            'admin.form.title': 'Project Title *',
            'admin.form.description': 'Description *',
            'admin.form.technologies': 'Technologies *',
            'admin.form.link': 'Project Link (optional)',
            'admin.form.save': 'Save Project',

            // Admin - Actions
            'admin.action.edit': 'Edit',
            'admin.action.delete': 'Delete',
            'admin.action.cancel': 'Cancel',
            'admin.modal.addTitle': 'Add New Project',
            'admin.confirm.delete': 'Are you sure you want to delete this project?',
            'admin.alert.saved': 'Project saved successfully!',
            'admin.alert.error': 'An error occurred',
        }
    },

    /**
     * Get translated text
     */
    t(key) {
        return this.translations[this.currentLang][key] || key;
    },

    /**
     * Set language
     */
    setLanguage(lang) {
        if (this.translations[lang]) {
            this.currentLang = lang;
            localStorage.setItem('language', lang);
            this.updateDOM();
            this.updateLangToggle();
        }
    },

    /**
     * Get current language
     */
    getLanguage() {
        return this.currentLang;
    },

    /**
     * Toggle language
     */
    toggleLanguage() {
        const newLang = this.currentLang === 'tr' ? 'en' : 'tr';
        this.setLanguage(newLang);
    },

    /**
     * Update all i18n elements in DOM
     */
    updateDOM() {
        // <html lang> attribute güncelle (SEO + erişilebilirlik)
        document.documentElement.lang = this.currentLang;
        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.getAttribute('data-i18n');
            const translation = this.t(key);

            if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                element.placeholder = translation;
            } else {
                element.textContent = translation;
            }
        });
    },

    /**
     * Update language toggle button styling
     */
    updateLangToggle() {
        const langToggle = document.getElementById('langToggle');
        if (langToggle) {
            const spans = langToggle.querySelectorAll('span[data-lang]');
            spans.forEach(span => {
                span.classList.remove('active');
                if (span.getAttribute('data-lang') === this.currentLang) {
                    span.classList.add('active');
                }
            });
        }
    },

    /**
     * Initialize i18n system
     */
    init() {
        this.updateDOM();
        this.updateLangToggle();
        this.attachEventListeners();
    },

    /**
     * Attach event listeners
     */
    attachEventListeners() {
        const langToggle = document.getElementById('langToggle');
        if (langToggle) {
            langToggle.addEventListener('click', () => {
                this.toggleLanguage();
                // Trigger custom event for other modules
                document.dispatchEvent(new CustomEvent('languageChanged', { 
                    detail: { language: this.currentLang } 
                }));
            });
        }
    }
};

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    i18n.init();
});
