# 📋 Full-Stack Portföy Projesi - Detaylı Plan & Mimari

**Deadline:** 14 Mayıs 2026 (3 gün)  
**Ağırlık:** Final Project/Lab %20

---

## 1. PROJE MİMARİSİ

### Dizin Yapısı
```
PortfolioProject/
├── index.php                    # Ana sayfa (giriş)
├── contact.php                  # İletişim formu işleme
├── admin/
│   ├── dashboard.php            # Admin paneli (login korumalı)
│   ├── add-project.php          # Proje ekleme
│   ├── edit-project.php         # Proje düzenleme
│   ├── delete-project.php       # Proje silme
│   ├── login.php                # Admin login
│   └── logout.php               # Çıkış
├── api/
│   ├── get-projects.php         # AJAX: Projeleri getir
│   ├── get-messages.php         # AJAX: Mesajları getir
│   └── submit-contact.php       # AJAX: Mesaj gönder
├── css/
│   └── style.css                # Responsive CSS (Flexbox/Grid)
├── js/
│   ├── main.js                  # DOM manipulation
│   ├── validation.js            # Form validasyonu
│   ├── slider.js                # Image slider
│   └── dark-mode.js             # Dark mode toggle
├── images/
│   └── [proje görselleri]
├── includes/
│   ├── db-config.php            # Veritabanı bağlantısı (PDO)
│   ├── header.php               # Semantic header
│   ├── nav.php                  # Navigation menu
│   └── footer.php               # Semantic footer
├── sql/
│   └── database.sql             # Veritabanı export
└── PROJECT_PLAN.md              # Bu dosya
```

---

## 2. TEKNİK GEREKLILIKLER (KONTROL LİSTESİ)

### ✅ HTML5 Semantik Yapı
- [ ] `<header>` - Site başlığı
- [ ] `<nav>` - Navigasyon menüsü
- [ ] `<main>` - Ana içerik
- [ ] `<section>` - Bölümler (Hakkında, Projeler, İletişim)
- [ ] `<article>` - Proje kartları
- [ ] `<footer>` - Site altı

### ✅ CSS Responsive Design
- [ ] Flexbox veya Grid layout
- [ ] Mobile-first approach (@media queries)
- [ ] Consistent branding (renkler, fontlar)
- [ ] Dark mode toggle

### ✅ JavaScript Interactivity
- [ ] Form validation (boş alan, email formatı)
- [ ] Image slider
- [ ] Dark mode toggle
- [ ] DOM manipulation

### ✅ PHP/MySQL Güvenlik
- [ ] PDO prepared statements
- [ ] SQL injection koruması
- [ ] Session management (admin)
- [ ] Password hashing (admin login)

### ✅ AJAX Integration
- [ ] Fetch API ile veri yükleme
- [ ] Dinamik proje listesi
- [ ] İletişim formu (reload olmadan)

### ✅ Admin Dashboard
- [ ] Login sistemi (session korumalı)
- [ ] Proje ekleme/düzenleme/silme
- [ ] Mesaj görüntüleme

---

## 3. VERİTABANI ŞEMASI

### `projects` tablosu
```sql
CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    technologies VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### `messages` tablosu
```sql
CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### `users` tablosu (Admin)
```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 4. İÇERİK PLANI

### Ana Sayfa Bölümleri
1. **Hero Section** - Profil fotoğrafı + kısa bio
2. **Hakkında** - Eğitim (Haliç Ünv. 4. sınıf) + staj deneyimi
3. **Projeler** - 3 proje (AJAX ile dinamik yükle)
   - Live Performance Analytics (FastAPI/React)
   - GraphRAG Öneri Motoru (Python)
   - Klinik Yönetim Paneli (Next.js/Prisma)
4. **İletişim** - Form + AJAX gönderimi
5. **Admin** - Şifre korumalı dashboard

---

## 5. TESLIM EDILECEKLER

### ✅ ZIP Dosyası (LMS)
- Tüm kaynak kodlar
- SQL export
- Project Report (README.md)

### ✅ GitHub Repository
- Step-by-step commit geçmişi
- Public access
- Dokümentasyon

### ✅ Live Demo
- 000webhost veya InfinityFree
- Çalışan link (demo amaçlı)

### ✅ SQL Export
- Veritabanı yedeği (.sql)

---

## 6. GELIŞTIRME SIRALAMASI

**Gün 1 (11 Mayıs - Bugün):**
- [ ] Proje yapısı oluştur
- [ ] Veritabanı şeması oluştur
- [ ] Temel HTML5 yapısı
- [ ] CSS Responsive tasarım

**Gün 2 (12 Mayıs):**
- [ ] PHP backend (PDO, prepared statements)
- [ ] Admin login sistemi
- [ ] AJAX endpoints

**Gün 3 (13 Mayıs):**
- [ ] JavaScript validasyon
- [ ] Admin dashboard CRUD
- [ ] Test & debugging

**Gün 4 (14 Mayıs - Deadline):**
- [ ] Hosting (000webhost/InfinityFree)
- [ ] GitHub push
- [ ] ZIP hazırlanması + upload

---

## 7. NOTLAR

- **AI Kullanımı Teşvik Edildi**: Tasarım, debug, refinement için kullan
- **Özgünlük Önemli**: Portfolyonu unique ve profesyonel yap
- **Grading**: %50 teknik, %50 Q&A
- **Responsibility**: Her satır koddan sorumlusunuz
