<?php
/**
 * Database Configuration
 * PDO ile güvenli veritabanı bağlantısı
 */

// Local defaults (XAMPP). Production'da bu dosyayı düzenlemek yerine
// includes/db-config.local.php oluşturup oradan override edilmesi önerilir.
$host     = getenv('DB_HOST')     ?: 'localhost';
$db_name  = getenv('DB_NAME')     ?: 'portfolio_db';
$user     = getenv('DB_USER')     ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';

// Production override (gitignore'lı dosya, repoya gitmez)
$localConfig = __DIR__ . '/db-config.local.php';
if (file_exists($localConfig)) {
    include $localConfig;
}

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database Connection Error: " . $e->getMessage());
}

// Session başlat
session_start();
