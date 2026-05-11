<?php
/**
 * API - Get Messages (Admin)
 * Gelen mesajları getir
 */

include '../includes/db-config.php';

header('Content-Type: application/json');

// Admin session kontrolü
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC');
    $stmt->execute();
    $messages = $stmt->fetchAll();

    echo json_encode($messages);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
