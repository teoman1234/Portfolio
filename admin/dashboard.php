<?php
/**
 * Admin - Dashboard
 * Admin paneli - Projeler yönetimi
 */

include '../includes/db-config.php';

// Session kontrolü
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Projeler listesi
$projects = [];
try {
    $stmt = $pdo->prepare('SELECT id, title, description, technologies FROM projects ORDER BY created_at DESC');
    $stmt->execute();
    $projects = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = 'Database error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .admin-header {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .project-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .project-item h3 {
            color: #2563eb;
            margin-bottom: 10px;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-small {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            flex: 1;
        }
        .btn-edit {
            background: #3b82f6;
            color: white;
        }
        .btn-delete {
            background: #ef4444;
            color: white;
        }
        .btn-add {
            background: #10b981;
            color: white;
            padding: 12px 30px;
            margin-bottom: 30px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: white;
            padding: 40px;
            border-radius: 10px;
            max-width: 500px;
            width: 90%;
        }
        .close-btn {
            float: right;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6b7280;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #e5e7eb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>Admin Dashboard</h1>
        <a href="logout.php" style="color: white; text-decoration: none;">Logout</a>
    </div>

    <div class="admin-container">
        <h2>Projects Management</h2>
        <button class="btn-add" onclick="openAddModal()">+ Add New Project</button>

        <div class="dashboard-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-item">
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                    <p><strong>Tech:</strong> <?php echo htmlspecialchars($project['technologies']); ?></p>
                    <div class="btn-group">
                        <button class="btn-small btn-edit" onclick="editProject(<?php echo $project['id']; ?>)">Edit</button>
                        <button class="btn-small btn-delete" onclick="deleteProject(<?php echo $project['id']; ?>)">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeAddModal()">&times;</span>
            <h2>Add New Project</h2>
            <form id="addForm" onsubmit="handleAddProject(event)">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Technologies</label>
                    <input type="text" name="technologies" placeholder="e.g. PHP, MySQL, JavaScript">
                </div>
                <div class="form-group">
                    <label>Project Link (optional)</label>
                    <input type="url" name="link">
                </div>
                <button type="submit" class="btn-add">Add Project</button>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.add('active');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.remove('active');
        }

        async function handleAddProject(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('addForm'));

            try {
                const response = await fetch('/admin/add-project.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    alert('Project added successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred');
            }
        }

        function deleteProject(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                window.location.href = '/admin/delete-project.php?id=' + id;
            }
        }

        function editProject(id) {
            window.location.href = '/admin/edit-project.php?id=' + id;
        }
    </script>
</body>
</html>
