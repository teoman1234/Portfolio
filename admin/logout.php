<?php
/**
 * Admin - Logout
 */

include '../includes/db-config.php';

session_destroy();
header('Location: /');
exit;
