-- ===================================================
-- Portfolio Database Schema
-- Created: 11 May 2026
-- ===================================================

-- Create Database
CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- ===================================================
-- Users Table (Admin)
-- ===================================================
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===================================================
-- Projects Table
-- ===================================================
CREATE TABLE IF NOT EXISTS projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    technologies VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===================================================
-- Messages Table (Contact Form)
-- ===================================================
CREATE TABLE IF NOT EXISTS messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===================================================
-- Sample Data
-- ===================================================

-- Insert Sample Admin User (username: admin, password: admin123)
-- Password hash generated using PHP: password_hash('admin123', PASSWORD_BCRYPT)
INSERT INTO users (username, password) VALUES 
('admin', '$2y$10$VVpJ1c/hE6VXZvT7kXvVdOgV6vDXrXhZnMJQvLHVfEMsLDo0OUF0q');

-- Insert Sample Projects
INSERT INTO projects (title, description, technologies, link) VALUES
('Live Performance Analytics Portal', 'Real-time analytics dashboard for monitoring application performance. Built with FastAPI backend and React frontend with interactive charts and metrics.', 'FastAPI, React, Python, JavaScript', 'https://github.com'),
('GraphRAG Recommendation Engine', 'AI-powered recommendation system using Graph RAG technology. Processes user behavior patterns and generates personalized recommendations using machine learning algorithms.', 'Python, GraphRAG, Machine Learning, Neo4j', 'https://github.com'),
('Clinic Management System', 'Comprehensive clinic management platform with patient records, appointments, and billing. Built with modern tech stack for scalability and performance.', 'Next.js, Prisma, PostgreSQL, TypeScript', 'https://github.com');

-- Create Indexes for Better Performance
CREATE INDEX idx_projects_created_at ON projects(created_at);
CREATE INDEX idx_messages_created_at ON messages(created_at);
CREATE INDEX idx_users_username ON users(username);

-- ===================================================
-- End of Database Schema
-- ===================================================
