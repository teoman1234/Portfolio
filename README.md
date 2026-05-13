# 🎯 Full-Stack Web Portfolio

Teoman Yüce - 21091000130 - Halic University 4th Year - Software Engineering Student

A comprehensive full-stack web portfolio built with **HTML5, CSS3, JavaScript, PHP & MySQL**.

---

## 📋 Project Overview

This portfolio showcases my skills and experience as a full-stack developer with:
- Dynamic web applications
- Modern responsive design
- Secure backend systems
- Database management
- Admin dashboard with CRUD operations

---

## 🛠️ Technical Stack

### Frontend
- **HTML5** - Semantic markup with proper structure
- **CSS3** - Responsive design (Flexbox/Grid, Mobile-first)
- **JavaScript** - Client-side validation and DOM manipulation
- **Dark Mode** - Theme toggle with localStorage persistence

### Backend
- **PHP** - Server-side logic and business logic
- **MySQL** - Relational database management
- **PDO** - Secure database access with prepared statements
- **Sessions** - Admin authentication and authorization

### Security Features
- PDO prepared statements (SQL Injection protection)
- Password hashing (bcrypt)
- Session-based authentication
- Input validation (client & server-side)
- CORS considerations

---

## 📁 Project Structure

```
PortfolioProject/
├── index.php                 # Home page (main entry point)
├── router.php                # URL routing for PHP server
├── Dockerfile                # Docker configuration for Railway deployment
├── .htaccess                 # URL rewriting rules
├── admin/
│   ├── login.php             # Admin login authentication
│   ├── dashboard.php         # Admin panel (view all projects & messages)
│   ├── add-project.php       # Add new projects
│   ├── edit-project.php      # Edit existing projects
│   ├── delete-project.php    # Delete projects
│   └── logout.php            # Session logout
├── api/
│   ├── get-projects.php      # AJAX: Fetch all projects (JSON response)
│   ├── get-messages.php      # AJAX: Fetch contact messages (JSON response)
│   └── submit-contact.php    # AJAX: Submit contact form
├── includes/
│   ├── db-config.php         # Database configuration (PDO setup)
│   ├── base.php              # Base HTML template (head, meta tags)
│   ├── admin-head.php        # Admin-specific header includes
│   ├── header.php            # Page header component
│   ├── nav.php               # Navigation bar component
│   └── footer.php            # Footer component
├── css/
│   └── style.css             # Responsive styles (Flexbox/Grid)
├── js/
│   ├── main.js               # DOM manipulation & AJAX logic
│   ├── validation.js         # Client-side form validation
│   ├── dark-mode.js          # Dark/Light theme toggle
│   ├── i18n.js               # Internationalization (multi-language support)
│   └── cookie-consent.js     # Cookie consent banner
├── sql/
│   └── database.sql          # MySQL schema & sample data
├── images/                   # Project images & assets
└── README.md                 # Project documentation
```

---

## 🚀 Features

### Home Page
- ✅ Hero section with profile image
- ✅ About section (Education, Experience, Skills)
- ✅ Projects showcase (dynamically loaded via AJAX)
- ✅ Contact form with client-side validation
- ✅ Dark mode toggle
- ✅ Responsive navigation bar

### Admin Dashboard
- ✅ Secure login system (session-based authentication)
- ✅ Add new projects with image upload
- ✅ Edit existing projects (update content & metadata)
- ✅ Delete projects (with confirmation)
- ✅ View all projects (with pagination)
- ✅ View contact messages from visitors
- ✅ Protected routes (session validation on all admin pages)
- ✅ Logout functionality with session cleanup

### Technical Features
- ✅ AJAX integration (Fetch API)
- ✅ Form validation (JavaScript)
- ✅ Responsive design (mobile-first)
- ✅ Semantic HTML5
- ✅ PDO prepared statements
- ✅ Dark/Light theme toggle

---

## 📊 Database Schema

### Users Table
```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

### Projects Table
```sql
CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    technologies VARCHAR(255),
    link VARCHAR(255)
);
```

### Messages Table
```sql
CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL
);
```

---


## � Live Demo & GitHub

- **Live Demo:** https://portfolio-production-2508.up.railway.app
- **GitHub Repository:** https://github.com/teoman1234/Portfolio
- **Source Code:** PortfolioProject.zip (available in submission)

---

## 📋 How to Use

### 1. Database Setup
```bash
# Import the database
mysql -u root < sql/database.sql

# Or via PHPMyAdmin
# Create database: portfolio_db
# Import: sql/database.sql
```

### 2. Run Locally (XAMPP)
1. Place the folder in `htdocs` (XAMPP installation folder)
2. Start Apache and MySQL from XAMPP Control Panel
3. Visit `http://localhost/PortfolioProject`
4. Admin panel: `http://localhost/PortfolioProject/admin/login.php`

### 3. Run with Docker & Railway (Production)
```bash
# Build Docker image
docker build -t portfolio .

# Run Docker container
docker run -p 8080:8080 portfolio

# Deploy to Railway
# 1. Push code to GitHub
# 2. Connect Railway to GitHub repository
# 3. Railway auto-deploys on push (uses Dockerfile)
# 4. Access live app via Railway URL
```

### 4. Admin Panel Features
- **Login:** Enter admin credentials
- **Manage Projects:** Add, edit, or delete projects
- **View Messages:** See all contact form submissions
- **Dashboard:** Overview of all activities

### 5. Visitor Features
- **Browse Projects:** View all portfolio projects
- **Contact Form:** Send inquiries (messages stored in DB)
- **Dark Mode:** Toggle theme preference
- **Responsive Design:** Works on desktop, tablet, mobile

---

## 🎨 Responsive Design

- ✅ Desktop (1200px+)
- ✅ Tablet (768px - 1199px)
- ✅ Mobile (< 768px)

All layouts tested and optimized for different screen sizes using CSS3 Flexbox and Grid.

---

## 🔒 Security Implementation

1. **PDO Prepared Statements**
   ```php
   $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
   $stmt->execute([$username]);
   ```

2. **Password Hashing (bcrypt)**
   ```php
   password_verify($password, $user['password'])
   ```

3. **Input Validation**
   - Client-side (JavaScript regex & HTML5 validation)
   - Server-side (PHP validation before database operations)

4. **Session Management**
   ```php
   session_start();
   if (!isset($_SESSION['admin_id'])) { 
       header('Location: login.php');
   }
   ```

5. **Database Security**
   - Environment variables for credentials (.env)
   - .gitignore prevents db-config.local.php from being committed

---

## 🎓 Education & Experience

**Institution:** Haliç University  
**Year:** 4th Year  
**Major:** Software Engineering  
**Specialization:** Web Development & Backend Development

**Internship:**  
- **Company:** Kodiks Yazılım
- **Role:** Backend Development Intern
- **Technologies:** ASP.NET Core, Entity Framework Core

---

## 📜 License

This project is created for educational purposes as part of the Halic University Software Engineering curriculum.

---

**Built with using HTML5, CSS3, JavaScript, PHP & MySQL**

