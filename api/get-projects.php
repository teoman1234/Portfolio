<?php
/**
 * API - Get Projects
 * Veritabanından projeleri getir ve JSON döndür
 */

include '../includes/db-config.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare('SELECT id, title, description, technologies, link FROM projects ORDER BY created_at DESC');
    $stmt->execute();
    $projects = $stmt->fetchAll();

    echo json_encode($projects);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
