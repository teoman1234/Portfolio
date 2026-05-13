<?php
/**
 * Admin - Login
 */

include '../includes/db-config.php';

// Zaten giriş yapmışsa dashboard'a yönlendir
if (isset($_SESSION['admin_id'])) {
    header('Location: /admin/dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($username) || empty($password)) {
        $error = 'Username and password are required';
    } else {
        try {
            $stmt = $pdo->prepare('SELECT id, password FROM users WHERE username = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $username;

                // "Remember Me": kullanıcı adını 30 gün boyunca cookie'de tut (sadece form auto-fill için)
                if (!empty($_POST['remember'])) {
                    setcookie('remember_username', $username, [
                        'expires'  => time() + 60 * 60 * 24 * 30,
                        'path'     => '/',
                        'httponly' => true,
                        'samesite' => 'Lax',
                    ]);
                } else {
                    setcookie('remember_username', '', time() - 3600, '/');
                }

                header('Location: /admin/dashboard.php');
                exit;
            } else {
                $error = 'Invalid username or password';
            }
        } catch (PDOException $e) {
            $error = 'Database error. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $adminPageTitle = 'Login'; include '../includes/admin-head.php'; ?>
</head>
<body class="admin-page">
    <?php include '../includes/nav.php'; ?>

    <main class="admin-main">
        <div class="login-container">
            <div class="login-form">
                <h2 data-i18n="admin.login.title">Admin Login</h2>
                <?php if ($error): ?>
                    <div class="login-error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <form method="POST" class="admin-form">
                    <?php
                        $rememberedUser = $_POST['username'] ?? $_COOKIE['remember_username'] ?? '';
                        $isRemembered   = !empty($_COOKIE['remember_username']);
                    ?>
                    <div class="form-group">
                        <label for="username" data-i18n="admin.login.username">Username</label>
                        <input type="text" id="username" name="username"
                               value="<?php echo htmlspecialchars($rememberedUser); ?>"
                               required autofocus autocomplete="username">
                    </div>
                    <div class="form-group">
                        <label for="password" data-i18n="admin.login.password">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="current-password">
                    </div>
                    <div class="form-group form-check">
                        <label class="checkbox-label">
                            <input type="checkbox" id="remember" name="remember" value="1" <?php echo $isRemembered ? 'checked' : ''; ?>>
                            <span data-i18n="admin.login.remember">Remember me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" data-i18n="admin.login.submit">Login</button>
                </form>
                <div class="login-footer">
                    <a href="/" data-i18n="admin.login.backHome">← Back to Home</a>
                </div>
            </div>
        </div>
    </main>

    <script src="/js/i18n.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/dark-mode.js"></script>
</body>
</html>
