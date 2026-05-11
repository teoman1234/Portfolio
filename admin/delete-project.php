<?php
/**
 * Admin - Delete Project
 */

include '../includes/db-config.php';

// Session kontrolü
if (!isset($_SESSION['admin_id'])) {
    header('Location: /PortofiloProject/admin/login.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: /PortofiloProject/admin/dashboard.php');
    exit;
}

$id = intval($_GET['id']);

try {
    $stmt = $pdo->prepare('DELETE FROM projects WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: dashboard.php');
    exit;
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
