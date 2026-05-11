<?php
/**
 * Admin - Add Project
 */

include '../includes/db-config.php';

header('Content-Type: application/json');

// Session kontrolü
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';
$technologies = isset($_POST['technologies']) ? trim($_POST['technologies']) : '';
$link = isset($_POST['link']) ? trim($_POST['link']) : null;

if (empty($title) || empty($description)) {
    echo json_encode(['success' => false, 'message' => 'Title and description are required']);
    exit;
}

try {
    $stmt = $pdo->prepare('INSERT INTO projects (title, description, technologies, link) VALUES (?, ?, ?, ?)');
    $stmt->execute([$title, $description, $technologies, $link]);

    echo json_encode(['success' => true, 'message' => 'Project added successfully']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
