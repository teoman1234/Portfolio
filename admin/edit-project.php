<?php
/**
 * Admin - Edit Project
 */

include '../includes/db-config.php';

// Session kontrolü
if (!isset($_SESSION['admin_id'])) {
    header('Location: /PortofiloProject/admin/login.php');
    exit;
}

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($project_id === 0) {
    header('Location: /PortofiloProject/admin/dashboard.php');
    exit;
}

// Projeyi getir
try {
    $stmt = $pdo->prepare('SELECT id, title, description, technologies, link FROM projects WHERE id = ?');
    $stmt->execute([$project_id]);
    $project = $stmt->fetch();

    if (!$project) {
        header('Location: /PortofiloProject/admin/dashboard.php');
        exit;
    }
} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
}

// Form submit
$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $technologies = isset($_POST['technologies']) ? trim($_POST['technologies']) : '';
    $link = isset($_POST['link']) ? trim($_POST['link']) : null;

    if (empty($title) || empty($description)) {
        $error = 'Title and description are required';
    } else {
        try {
            $stmt = $pdo->prepare('UPDATE projects SET title = ?, description = ?, technologies = ?, link = ? WHERE id = ?');
            $stmt->execute([$title, $description, $technologies, $link, $project_id]);
            $success = true;
            
            // Güncellenen veriyi getir
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .admin-header {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .edit-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .form-section {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e5e7eb;
            border-radius: 5px;
            font-family: inherit;
            font-size: 1rem;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2563eb;
        }
        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            flex: 1;
        }
        .btn-save {
            background: #10b981;
            color: white;
        }
        .btn-cancel {
            background: #e5e7eb;
            color: #1f2937;
        }
        .error {
            color: #ef4444;
            background: #fee2e2;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .success {
            color: #10b981;
            background: #dcfce7;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>Edit Project</h1>
        <a href="logout.php" style="color: white; text-decoration: none;">Logout</a>
    </div>

    <div class="edit-container">
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success">✅ Project updated successfully!</div>
        <?php endif; ?>

        <div class="form-section">
            <form method="POST">
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="5" required><?php echo htmlspecialchars($project['description']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="technologies">Technologies</label>
                    <input type="text" id="technologies" name="technologies" placeholder="e.g. PHP, MySQL, JavaScript" value="<?php echo htmlspecialchars($project['technologies']); ?>">
                </div>

                <div class="form-group">
                    <label for="link">Project Link (optional)</label>
                    <input type="url" id="link" name="link" value="<?php echo htmlspecialchars($project['link'] ?? ''); ?>">
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-save">Save Changes</button>
                    <a href="/PortofiloProject/admin/dashboard.php" class="btn btn-cancel" style="text-decoration: none; display: flex; align-items: center; justify-content: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
