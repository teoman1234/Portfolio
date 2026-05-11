# 🎯 Full-Stack Web Portfolio

Halic University 4th Year - Software Engineering Student

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
├── index.php                 # Home page
├── admin/
│   ├── login.php             # Admin login
│   ├── dashboard.php         # Admin panel
│   ├── add-project.php       # Add projects
│   ├── delete-project.php    # Delete projects
│   └── logout.php            # Session logout
├── api/
│   ├── get-projects.php      # AJAX: Fetch projects
│   ├── get-messages.php      # AJAX: Fetch messages
│   └── submit-contact.php    # AJAX: Submit contact form
├── includes/
│   ├── db-config.php         # Database configuration (PDO)
│   ├── header.php            # Semantic header
│   ├── nav.php               # Navigation bar
│   └── footer.php            # Semantic footer
├── css/
│   └── style.css             # Responsive styles
├── js/
│   ├── main.js               # DOM manipulation & AJAX
│   ├── validation.js         # Form validation
│   └── dark-mode.js          # Theme toggle
├── sql/
│   └── database.sql          # Database schema & sample data
├── images/                   # Project images
└── PROJECT_PLAN.md           # Development plan
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
- ✅ Secure login system (session-based)
- ✅ Add new projects
- ✅ View all projects
- ✅ Delete projects
- ✅ View contact messages
- ✅ Protected routes (session validation)

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

## 🔐 Admin Credentials (Default)

**Username:** `admin`  
**Password:** `admin123`

⚠️ **Important:** Change these credentials in production!

---

## 📋 How to Use

### 1. Database Setup
```bash
# Import the database
mysql -u root < sql/database.sql
```

### 2. Run Locally
- Place the folder in `htdocs` (for XAMPP)
- Start Apache and MySQL
- Visit `http://localhost/PortofiloProject`

### 3. Admin Panel
- Navigate to `http://localhost/PortofiloProject/admin/login.php`
- Login with credentials above
- Manage projects (add/edit/delete)

### 4. Contact Form
- Fill out the contact form on the home page
- Messages are stored in the database
- View messages in the admin panel

---

## 🎨 Responsive Design

- ✅ Desktop (1200px+)
- ✅ Tablet (768px - 1199px)
- ✅ Mobile (< 768px)

All layouts tested and optimized for different screen sizes.

---

## 🔒 Security Implementation

1. **PDO Prepared Statements**
   ```php
   $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
   $stmt->execute([$username]);
   ```

2. **Password Hashing**
   ```php
   password_verify($password, $user['password'])
   ```

3. **Input Validation**
   - Client-side (JavaScript)
   - Server-side (PHP)

4. **Session Management**
   ```php
   session_start();
   if (!isset($_SESSION['admin_id'])) { /* redirect */ }
   ```

---

## 📝 Sample Projects

1. **Live Performance Analytics Portal**
   - Stack: FastAPI, React, Python, JavaScript
   - Real-time metrics dashboard

2. **GraphRAG Recommendation Engine**
   - Stack: Python, GraphRAG, Machine Learning
   - AI-powered recommendations

3. **Clinic Management System**
   - Stack: Next.js, Prisma, PostgreSQL
   - Patient and appointment management

---

## 🎓 Education & Experience

**Institution:** Haliç University  
**Year:** 4th Year  
**Major:** Software Engineering  
**Specialization:** Web Development & Database Management

**Internship:**  
- **Company:** Kodiks Yazılım
- **Role:** Backend Development Intern
- **Technologies:** ASP.NET Core, Entity Framework Core

---

## 📞 Contact

- **Email:** your.email@example.com
- **GitHub:** github.com/yourprofile
- **LinkedIn:** linkedin.com/in/yourprofile

---

## 📜 License

This project is created for educational purposes as part of the course curriculum.

---

**Built with ❤️ using HTML5, CSS3, JavaScript, PHP & MySQL**

*Last Updated: 11 May 2026*
