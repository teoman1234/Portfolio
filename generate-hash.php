<?php
/**
 * Password Hash Generator Utility
 * Admin şifreleri hash'lemek için kullan
 * 
 * Kullanım: http://localhost/PortofiloProject/generate-hash.php?password=admin123
 */

if (empty($_GET['password'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Password Hash Generator</title>
        <style>
            body { font-family: Arial; margin: 40px; }
            .container { max-width: 500px; margin: 0 auto; }
            input { padding: 10px; width: 100%; margin: 10px 0; }
            button { padding: 10px 20px; background: #2563eb; color: white; border: none; cursor: pointer; }
            .result { margin-top: 20px; padding: 15px; background: #e0e0e0; border-radius: 5px; }
            code { word-break: break-all; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>🔐 Password Hash Generator</h2>
            <form method="GET">
                <label>Enter Password:</label>
                <input type="text" name="password" placeholder="e.g., admin123" required>
                <button type="submit">Generate Hash</button>
            </form>
            <p style="color: #666; font-size: 0.9em;">
                <strong>⚠️ Security Note:</strong> Delete this file from your server after use!
            </p>
        </div>
    </body>
    </html>
    <?php
} else {
    $password = $_GET['password'];
    $hash = password_hash($password, PASSWORD_BCRYPT);
    
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Password Hash</title>
        <style>
            body { font-family: Arial; margin: 40px; }
            .container { max-width: 500px; margin: 0 auto; }
            .result { margin-top: 20px; padding: 15px; background: #d4edda; border-radius: 5px; border: 1px solid #28a745; }
            code { background: #f0f0f0; padding: 10px; display: block; word-break: break-all; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>✅ Password Hash Generated</h2>
            <p><strong>Password:</strong> <code><?php echo htmlspecialchars($password); ?></code></p>
            <p><strong>Hash (Bcrypt):</strong></p>
            <div class="result">
                <code><?php echo htmlspecialchars($hash); ?></code>
                <p style="margin: 10px 0 0 0; color: #666; font-size: 0.9em;">
                    👆 Bu hash'i SQL INSERT sorgunuzda kullanın
                </p>
            </div>
            <a href="generate-hash.php" style="display: inline-block; margin-top: 20px; color: #2563eb;">← Generate Another Hash</a>
            <p style="color: #666; font-size: 0.9em; margin-top: 20px;">
                <strong>⚠️ Security:</strong> Bu dosyayı production'dan sonra sil!
            </p>
        </div>
    </body>
    </html>
    <?php
}
