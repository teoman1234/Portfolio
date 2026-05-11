<?php
/**
 * Admin - Edit Project
 */

include '../includes/db-config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: /PortfolioProject/admin/login.php');
    exit;
}

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($project_id === 0) {
    header('Location: /PortfolioProject/admin/dashboard.php');
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id, title, description, technologies, link FROM projects WHERE id = ?');
    $stmt->execute([$project_id]);
    $project = $stmt->fetch();

    if (!$project) {
        header('Location: /PortfolioProject/admin/dashboard.php');
        exit;
    }
} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
}

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $technologies = isset($_POST['technologies']) ? trim($_POST['technologies']) : '';
    $link = isset($_POST['link']) ? trim($_POST['link']) : null;
    $link = $link === '' ? null : $link;

    if (empty($title) || empty($description)) {
        $error = 'Title and description are required';
    } else {
        try {
            $stmt = $pdo->prepare('UPDATE projects SET title = ?, description = ?, technologies = ?, link = ? WHERE id = ?');
            $stmt->execute([$title, $description, $technologies, $link, $project_id]);
            $success = true;

            $stmt = $pdo->prepare('SELECT id, title, description, technologies, link FROM projects WHERE id = ?');
            $stmt->execute([$project_id]);
            $project = $stmt->fetch();
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $adminPageTitle = 'Edit Project'; include '../includes/admin-head.php'; ?>
</head>
<body class="admin-page">
    <?php include '../includes/nav.php'; ?>

    <div class="admin-header">
        <div>
            <h1 data-i18n="admin.edit.title">Edit Project</h1>
        </div>
    </div>

    <div class="admin-container">
        <div style="max-width: 700px; margin: 0 auto;">
            <?php if ($error): ?>
                <div class="login-error" style="margin-bottom: var(--spacing-2xl);"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div style="display:flex; align-items:center; gap:8px; color: var(--success-color); background-color: rgba(22, 163, 74, 0.1); border: 1px solid var(--success-color); padding: var(--spacing-lg); border-radius: var(--radius-lg); margin-bottom: var(--spacing-2xl);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                    <span data-i18n="admin.edit.success">Project updated successfully!</span>
                </div>
            <?php endif; ?>

            <div style="background: var(--bg-white); padding: var(--spacing-2xl); border-radius: var(--radius-xl); box-shadow: var(--shadow-lg);">
                <form method="POST" class="admin-form">
                    <div class="form-group">
                        <label for="title" data-i18n="admin.form.title">Title *</label>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description" data-i18n="admin.form.description">Description *</label>
                        <textarea id="description" name="description" rows="5" required><?php echo htmlspecialchars($project['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="technologies" data-i18n="admin.form.technologies">Technologies</label>
                        <input type="text" id="technologies" name="technologies" value="<?php echo htmlspecialchars($project['technologies']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="link" data-i18n="admin.form.link">Project Link (optional)</label>
                        <input type="url" id="link" name="link" value="<?php echo htmlspecialchars($project['link'] ?? ''); ?>">
                    </div>
                    <div class="admin-form-actions">
                        <a href="/PortfolioProject/admin/dashboard.php" class="btn btn-secondary" data-i18n="admin.action.cancel">Cancel</a>
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                            <span data-i18n="admin.edit.save">Save Changes</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/PortfolioProject/js/i18n.js"></script>
    <script src="/PortfolioProject/js/main.js"></script>
    <script src="/PortfolioProject/js/dark-mode.js"></script>
</body>
</html>
