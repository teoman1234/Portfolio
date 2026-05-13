<?php
/**
 * Base Configuration
 * Base URL ve path configuration
 */

// Base URL configuration
define('BASE_URL', getenv('BASE_URL') ?: '');
define('BASE_PATH', dirname(__DIR__));

// API endpoints
define('API_PROJECTS', BASE_URL . '/api/get-projects.php');
define('API_SUBMIT_CONTACT', BASE_URL . '/api/submit-contact.php');
define('API_GET_MESSAGES', BASE_URL . '/api/get-messages.php');

// Admin pages
define('ADMIN_LOGIN', BASE_URL . '/admin/login.php');
define('ADMIN_DASHBOARD', BASE_URL . '/admin/dashboard.php');
define('ADMIN_LOGOUT', BASE_URL . '/admin/logout.php');
define('ADMIN_ADD_PROJECT', BASE_URL . '/admin/add-project.php');
define('ADMIN_EDIT_PROJECT', BASE_URL . '/admin/edit-project.php');
define('ADMIN_DELETE_PROJECT', BASE_URL . '/admin/delete-project.php');

// Assets
define('CSS_PATH', BASE_URL . '/css');
define('JS_PATH', BASE_URL . '/js');
define('IMG_PATH', BASE_URL . '/images');
