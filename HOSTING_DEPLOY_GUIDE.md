# 🚀 Hosting Deploy Guide

**Deadline:** 14 Mayıs 2026  
**Live Demo Requirement:** İşlev gören canlı link (000webhost/InfinityFree)

---

## **Option 1: InfinityFree (Tavsiye Edilir)**

### Adım 1: Hesap Oluştur
1. https://www.infinityfree.net/ ziyaret et
2. "Sign Up" → Email ve şifre gir
3. Email doğrulaması yap

### Adım 2: Hosting Seç
1. **Free Hosting** → "Get Started" tıkla
2. **Domain Adı Seç:** `yourname-portfolio.infinityfreeapp.com`
3. **Account Password** belirle
4. Şartları kabul et → **Create Account**

### Adım 3: FTP Upload
1. **Control Panel** → "FTP File Manager" aç
2. **public_html** klasörüne gir
3. **ZIP Dosyası Yükle:** `Portfolio.zip`
4. **Extract/Unzip** → Dosyalar açılacak
5. **Portfolio klasörü** yeni klasöre taşı (optional)

### Adım 4: Veritabanı Oluştur
1. **Control Panel** → "Databases" (MySQL)
2. **New Database** oluştur
   - DB Name: `portfolio_db`
   - Username: `root` (default)
   - Password: `root` (InfinityFree default)
3. **Create Database**

### Adım 5: SQL Import
1. **phpmyadmin** aç (Control Panel → Database Manager)
2. `portfolio_db` seç
3. **Import** → `sql/database.sql` dosyasını yükle
4. **Go/Execute**

### Adım 6: config.php Ayarla
1. FTP'de `includes/db-config.php` düzenle
2. Şu satırları kontrol et:
```php
$host = 'localhost';
$db_name = 'portfolio_db';
$user = 'root';
$password = 'root'; // InfinityFree'de genellikle bu
```

### Adım 7: Live Demo Link
```
https://yourname-portfolio.infinityfreeapp.com
```

---

## **Option 2: 000WebHost**

### Adım 1: Hesap Oluştur
1. https://www.000webhost.com/ ziyaret et
2. Email ve şifre gir
3. Domain adı seç: `yourname-portfolio.000webhostapp.com`

### Adım 2: FTP Upload
1. **File Manager** → **public_html**
2. ZIP dosyasını yükle ve extract et
3. Dosyaları organize et

### Adım 3: Veritabanı
1. **Databases** → MySQL oluştur
2. **phpmyadmin** ile SQL import'u yap
3. DB credentials'ı not et

### Adım 4: Config Dosyası
`db-config.php` dosyasını host bilgilerine göre düzenle

### Adım 5: Live Link
```
https://yourname-portfolio.000webhostapp.com
```

---

## **Sorun Giderme**

### "500 Internal Server Error"
- ✅ PHP version uyumlu mu? (PHP 7.4+)
- ✅ `db-config.php` doğru mu?
- ✅ Veritabanı bağlantısı var mı?

### "Cannot connect to database"
- ✅ MySQL username/password doğru mu?
- ✅ Database adı doğru mu?
- ✅ Host adresi doğru mu?

### "AJAX veri yüklemiyor"
- ✅ API endpoints (`/api/get-projects.php`) erişilebilir mi?
- ✅ Database'de proje var mı?
- ✅ Browser console'da hata var mı?

---

## **Admin Panel Testi**

Hosting'e deploy ettikten sonra:

1. **Admin Login:** `/admin/login.php`
2. **Username:** `admin`
3. **Password:** `admin123`
4. **Dashboard:** Projeleri ekle/sil/düzenle

---

## **Final Checklist**

- [ ] ZIP dosyası indir ve öğretmene gönder
- [ ] GitHub repo link çalışıyor mu?
- [ ] Live demo link çalışıyor mu?
- [ ] Admin panel login çalışıyor mu?
- [ ] Projeler AJAX'tan yükleniyor mu?
- [ ] Contact form çalışıyor mu?
- [ ] Dark mode toggle çalışıyor mu?
- [ ] Responsive tasarım mobile'da çalışıyor mu?

---

## **Submission Gereklilikler** ✅

### 1. ZIP (LMS'ye Upload)
```
Portfolio.zip
├── PortofiloProject/
│   ├── index.php
│   ├── admin/
│   ├── api/
│   ├── css/
│   ├── js/
│   ├── includes/
│   ├── sql/
│   ├── README.md
│   └── database.sql
```

### 2. GitHub Repository
```
https://github.com/teoman1234/Protofilo
(Step-by-step commit geçmişi)
```

### 3. Live Demo Link
```
https://yourname-portfolio.infinityfreeapp.com
veya
https://yourname-portfolio.000webhostapp.com
```

---

**Tüm 3 item sunumda olmalıdır. Aksi takdirde teslim kabul edilmeyecektir!**

---

*Son güncelleme: 11 Mayıs 2026*
