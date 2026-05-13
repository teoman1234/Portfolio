<?php
/**
 * Admin - Dashboard
 */

include '../includes/db-config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: /PortfolioProject/admin/login.php');
    exit;
}

$projects = [];
$messages = [];
try {
    $stmt = $pdo->prepare('SELECT id, title, description, technologies FROM projects ORDER BY created_at DESC');
    $stmt->execute();
    $projects = $stmt->fetchAll();

    $stmtMsg = $pdo->prepare('SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC');
    $stmtMsg->execute();
    $messages = $stmtMsg->fetchAll();
} catch (PDOException $e) {
    $dbError = 'Database error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $adminPageTitle = 'Dashboard'; include '../includes/admin-head.php'; ?>
</head>
<body class="admin-page">
    <?php include '../includes/nav.php'; ?>

    <?php if (isset($dbError)): ?>
        <div style="background: var(--error-light); color: var(--error-color); padding: var(--spacing-lg); text-align: center;">
            <?php echo htmlspecialchars($dbError); ?>
        </div>
    <?php endif; ?>

    <div class="admin-header">
        <div>
            <h1 data-i18n="admin.dashboard.title">Admin Dashboard</h1>
            <div class="user-info">
                <span data-i18n="admin.dashboard.loggedAs">Logged in as:</span>
                <strong><?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?></strong>
            </div>
        </div>
    </div>

    <div class="admin-container">
        <!-- Projects Section -->
        <div class="dashboard-section">
            <h2 class="dashboard-section-title" data-i18n="admin.dashboard.projects">Projects Management</h2>
            <button class="btn btn-success" onclick="openAddModal()" style="margin-bottom: var(--spacing-2xl);">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <span data-i18n="admin.dashboard.addProject">Add New Project</span>
            </button>

            <div class="dashboard-grid">
                <?php foreach ($projects as $project): ?>
                    <div class="admin-card">
                        <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><?php echo htmlspecialchars($project['description']); ?></p>
                        <p style="font-size: 0.875rem; color: var(--text-light);">
                            <strong data-i18n="admin.dashboard.technologies">Technologies:</strong>
                            <?php echo htmlspecialchars($project['technologies']); ?>
                        </p>
                        <div class="admin-actions">
                            <button class="btn btn-primary btn-small" onclick="editProject(<?php echo intval($project['id']); ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                <span data-i18n="admin.action.edit">Edit</span>
                            </button>
                            <button class="btn btn-danger btn-small" onclick="deleteProject(<?php echo intval($project['id']); ?>)" style="background-color: #ef4444; border-color: #ef4444;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                <span data-i18n="admin.action.delete">Delete</span>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if (empty($projects)): ?>
                    <p style="color: var(--text-light); padding: var(--spacing-2xl);" data-i18n="admin.dashboard.noProjects">No projects yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Messages Section -->
        <div class="dashboard-section">
            <h2 class="dashboard-section-title" data-i18n="admin.dashboard.messages">Messages Received</h2>
            <?php if (count($messages) > 0): ?>
                <div style="overflow-x: auto;">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th data-i18n="admin.table.date">Date</th>
                                <th data-i18n="admin.table.name">Name</th>
                                <th data-i18n="admin.table.email">Email</th>
                                <th data-i18n="admin.table.message">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $msg): ?>
                                <tr>
                                    <td style="white-space: nowrap;"><?php echo htmlspecialchars(date('d M Y, H:i', strtotime($msg['created_at']))); ?></td>
                                    <td><?php echo htmlspecialchars($msg['name']); ?></td>
                                    <td><a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>" style="color: var(--primary-color); text-decoration: none;"><?php echo htmlspecialchars($msg['email']); ?></a></td>
                                    <td><?php echo nl2br(htmlspecialchars($msg['message'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p style="color: var(--text-light); text-align: center; padding: var(--spacing-2xl);" data-i18n="admin.dashboard.noMessages">No messages received yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div id="projectModal" class="admin-modal">
        <div class="admin-modal-content">
            <div class="admin-modal-header">
                <span id="modalTitle" data-i18n="admin.modal.addTitle">Add New Project</span>
                <button class="admin-modal-close" onclick="closeModal()" aria-label="Close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <form id="projectForm" class="admin-form" onsubmit="handleProjectSubmit(event)">
                <div class="form-group">
                    <label for="projectTitle" data-i18n="admin.form.title">Project Title *</label>
                    <input type="text" id="projectTitle" name="title" required>
                </div>
                <div class="form-group">
                    <label for="projectDescription" data-i18n="admin.form.description">Description *</label>
                    <textarea id="projectDescription" name="description" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="projectTech" data-i18n="admin.form.technologies">Technologies *</label>
                    <input type="text" id="projectTech" name="technologies" required>
                </div>
                <div class="form-group">
                    <label for="projectLink" data-i18n="admin.form.link">Project Link (optional)</label>
                    <input type="url" id="projectLink" name="link">
                </div>
                <div class="admin-form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()" data-i18n="admin.action.cancel">Cancel</button>
                    <button type="submit" class="btn btn-primary" data-i18n="admin.form.save">Save Project</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/PortfolioProject/js/i18n.js"></script>
    <script src="/PortfolioProject/js/main.js"></script>
    <script src="/PortfolioProject/js/dark-mode.js"></script>
    <script>
        let editingProjectId = null;

        function openAddModal() {
            editingProjectId = null;
            const modalTitle = document.getElementById('modalTitle');
            modalTitle.textContent = (typeof i18n !== 'undefined') ? i18n.t('admin.modal.addTitle') : 'Add New Project';
            document.getElementById('projectForm').reset();
            document.getElementById('projectModal').classList.add('active');
            document.getElementById('projectTitle').focus();
        }

        function closeModal() {
            document.getElementById('projectModal').classList.remove('active');
        }

        function editProject(id) {
            window.location.href = '/PortfolioProject/admin/edit-project.php?id=' + id;
        }

        function deleteProject(id) {
            const msg = (typeof i18n !== 'undefined') ? i18n.t('admin.confirm.delete') : 'Are you sure you want to delete this project?';
            if (confirm(msg)) {
                window.location.href = '/PortfolioProject/admin/delete-project.php?id=' + id;
            }
        }

        async function handleProjectSubmit(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('projectForm'));

            try {
                const response = await fetch('/PortfolioProject/admin/add-project.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    alert((typeof i18n !== 'undefined') ? i18n.t('admin.alert.saved') : 'Project saved successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert((typeof i18n !== 'undefined') ? i18n.t('admin.alert.error') : 'An error occurred');
            }
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });

        document.getElementById('projectModal').addEventListener('click', (e) => {
            if (e.target.id === 'projectModal') closeModal();
        });
    </script>
</body>
</html>
